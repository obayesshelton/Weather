<?php

use Phalcon\Events\Event,
	Phalcon\Mvc\User\Plugin,
	Phalcon\Mvc\Dispatcher,
	Phalcon\Acl;

/**
 * Hashes
 *
 * This is the security plugin which controls that users only have access to the modules they're assigned to
 */
class Auth extends Plugin
{
	public function __construct()
	{
	}

	public function getAcl() {
		if(property_exists($this->persistent, 'acl') && $this->persistent->acl instanceof Phalcon\Acl\Adapter\Memory) {
            return $this->persistent->acl;
        }

        $acl = new Phalcon\Acl\Adapter\Memory();
        // The default action is DENY access
        $acl->setDefaultAction(Phalcon\Acl::DENY);

        //Register roles
        $roles = array(
            'users'     => new Phalcon\Acl\Role('Users'),
            'guests'    => new Phalcon\Acl\Role('Guests')
        );

        foreach ($roles as $role) {
            $acl->addRole($role);
        }

        $privateResourcesArray = array();

        if($this->session->get("auth")) {
            $cache = $this->getDI()->get('cache');

            $cacheKey = 'users/user_' . $this->session->get("auth")['id'] . '.cache';
            $user    = $cache->get($cacheKey);

            if($user) {

                foreach($user->permissions as $key => $value) {
                    foreach($value as $ruleArray) {
                        if(property_exists($ruleArray, 'override')) {
                            if($ruleArray->type === 'allowed') {
                                $privateResourcesArray[$key][] = $ruleArray->action;
                            }
                        } else {
                            $privateResourcesArray[$key][] = $ruleArray->action;
                        }

                    }
                }

            }
        }

        //Private area resources
        $privateResources = $privateResourcesArray;

        foreach ($privateResources as $resource => $actions) {
            $acl->addResource(new Phalcon\Acl\Resource($resource), $actions);
        }

        //Grant access to private area to role Users
        foreach ($privateResources as $resource => $actions) {
            foreach ($actions as $action) {
                $acl->allow('Users', $resource, $action);
            }
        }

        //Public area resources
        $publicResources = array(
            'index'          => array('index'),
            'authentication' => array('login', 'logout'),
            'account'        => array('forgot-password', 'reset-check', 'reset-password')
        );

        foreach ($publicResources as $resource => $actions) {
            $acl->addResource(new Phalcon\Acl\Resource($resource), $actions);
        }

        //Grant access to public areas to both users and guests
        foreach ($roles as $role) {
            foreach ($publicResources as $resource => $actions) {
                $acl->allow($role->getName(), $resource, '*');
            }
        }

        //The acl is stored in session, APC would be useful here too
        $this->persistent->acl = $acl;

        return $acl;
	}

	/**
	 * This action is executed before execute any action in the application
	 */
	public function beforeDispatch(Event $event, Dispatcher $dispatcher) {
		$auth = $this->session->get('auth');
		
		if(!$auth) {
			$role = 'Guests';
		} else {
			$role = 'Users';
		}

		$controller = $dispatcher->getControllerName();
		$action = $dispatcher->getActionName();
		
		$acl = $this->getAcl();
		$allowed = $acl->isAllowed($role, $controller, $action);
		
		if ($allowed != Acl::ALLOW) {
			$this->flash->error("You don't have access to this module");
            $dispatcher->forward(array('controller' => 'authentication', 'action' => 'login'));
		}
	}
}