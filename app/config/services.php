<?php

use Phalcon\DI\FactoryDefault,
	Phalcon\Mvc\View,
	Phalcon\Mvc\Url as UrlResolver,
	Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter,
	Phalcon\Mvc\View\Engine\Volt as VoltEngine,
    Phalcon\Cache\Frontend\Output as OutputFrontend,
	Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter,
	Phalcon\Session\Adapter\Files as SessionAdapter;

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new FactoryDefault();

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->set('url', function() use ($config) {
	$url = new UrlResolver();
	$url->setBaseUri($config->application->baseUri);
	return $url;
}, true);

/**
 * Setting up the view component
 */
$di->set('view', function() use ($config) {

	$view = new View();

	$view->setViewsDir($config->application->viewsDir);

	$view->registerEngines(array(
		'.volt' => function($view, $di) use ($config) {

			$volt = new VoltEngine($view, $di);

			// compileAlways should be disabled on production
			$volt->setOptions(array(
				'compiledPath'      => $config->cache->cacheDir . 'views/',
				'compiledSeparator' => '_',
				'compileAlways'     => true
			));
			
			$compiler = $volt->getCompiler();
			
			$compiler->addFunction('dump', 'print_r');
			
			return $volt;
		},
		'.phtml' => 'Phalcon\Mvc\View\Engine\Php' // Generate Template files uses PHP itself as the template engine
	));

	return $view;
}, true);

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->set('db', function() use ($config) {
	return new DbAdapter(array(
		'host'     => $config->database->host,
		'username' => $config->database->username,
		'password' => $config->database->password,
		'dbname'   => $config->database->dbname
	));
});

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->set('modelsMetadata', function() use ($config) {
	return new MetaDataAdapter();
});

/**
 * Start the session the first time some component request the session service
 */
$di->setShared('session', function()
{
    $session = new SessionAdapter();
    $session->start();
    return $session;
});

$di->set('dispatcher', function() use ($di) {
	$eventsManager = $di->getShared('eventsManager');

	$auth = new Auth($di);

	$eventsManager->attach('dispatch', $auth);

	$dispatcher = new Phalcon\Mvc\Dispatcher();
	$dispatcher->setEventsManager($eventsManager);

	return $dispatcher;
});

/**
 * Imports the routing into the DI
 * @todo check if this is the correct way to do it
 */
$di->set('router', function() {
	require __DIR__.'/../../app/config/routes.php';
	return $router;
});

$di->set('mail', function() {
    return new \Zend_Mail_Transport_Exception();
}, true);


/**
 * Set the config in the DIC
 */
$di->set('config', $config);

/**
 * Setup the request object.
 */
$di->set('remoteRequest', function() use($di)
{
    $sessionAdapter = $di->get('session');

    $auth = $sessionAdapter->get('auth');

    $xAuth = null;
    if(!is_null($auth) && isset($auth['token']))
    {
        $xAuth = $auth['token'];
    }

    /**
     * Setup a new request object and set that in the DIC
     */
    $remoteRequest = new Remote\Request($di->get('config')->complySec, $xAuth);

    return $remoteRequest;

});

$di->set('security', function(){

    $security = new Phalcon\Security();

    //Set the password hashing factor to 12 rounds
    $security->setWorkFactor(12);

    return $security;
}, true);

$di->set('cache', function() use ($config) {
    return new \Phalcon\Cache\Backend\File(
        new \Phalcon\Cache\Frontend\Data(array("lifetime" => $config->cache->lifetime)),
        array("cacheDir" => $config->cache->cacheDir)
    );
});