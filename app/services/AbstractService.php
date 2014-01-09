<?php
/**
 * ComplySec Short Description
 *
 * ComplySec Long description
 *
 * PHP version 5.5
 * PHALCON version 1.2.1
 *
 * @author Oliver Bayes-Shelton <oliver.bayes-shelton@randomstorm.com>
 *
 * @copyright 2013 RandomStorm Limited <www.randomstorm.com>
 * @license None
 *
 * @version 1.0
 * @link http://docs.complysec.net
 */

namespace Services;


abstract class AbstractService implements \Phalcon\DI\InjectionAwareInterface
{
    /**
     * @var \Phalcon\DI\FactoryDefault
     */
    protected $DI;

    /**
     * setDI sets the DI property in object storage
     *
     * @param \Phalcon\DI\FactoryDefault $DI
     * @throws \InvalidArgumentException
     * @return AbstractService
     */
    public function setDI($DI)
    {
        if (empty($DI))
        {
            throw new \InvalidArgumentException(__METHOD__ . ' cannot accept an empty DI');
        }
        $this->DI = $DI;
        return $this;
    }

    /**
     * getDI returns the DI from the object
     *
     * @return \Phalcon\DI\FactoryDefault
     */
    public function getDI()
    {
        if(!$this->DI instanceof \Phalcon\DI\FactoryDefault)
        {
            throw new \RuntimeException(__METHOD__ . ' does not have a factoryDefault. Was service not loaded by DIC?');
        }
        return $this->DI;
    }

    /**
     * @return \Phalcon\Mvc\Model\Manager
     */
    protected function getModelManager()
    {
        $dependencyContainer = $this->getDI();

        if(!is_object($dependencyContainer))
        {
            $callers = debug_backtrace();


            throw new \RuntimeException(
                __METHOD__ . ' could not get the ModelManager, the DIC is empty, perhaps the service was loaded outside of the DI?'
                . ' I am a part of ' . get_class($this) . ' and was called by: ' . $callers[1]['function'] . ' which was called by: ' . $callers[1]['function']
            );
        }

        $manager = $dependencyContainer->get('modelsManager');

        return $manager;
    }

    public function getConfig()
    {
        $config = $this->getDI()->get('config');

        if(!is_null($config))
        {
            return $config;
        }

        throw new \RuntimeException(__METHOD__ . ' could not find the config in the DIC!');
    }

    public function getRequest()
    {
        $request = $this->getDI()->get('remoteRequest');

        if(!$request instanceof \Remote\Request)
        {
            throw new \RuntimeException(__METHOD__ . ' could not find an instance of the request library within the DIC!');
        }

        return $request;
    }

}