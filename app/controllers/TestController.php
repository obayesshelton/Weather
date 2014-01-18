<?php

/**
 * ComplySec Short Description
 *
 * ComplySec Long description
 *
 * PHP version 5.5
 * PHALCON version 1.2.1
 *
 * @category Controllers
 * @package ComplySec
 * @subpackage Application
 * @author Oliver Bayes-Shelton <oliver.bayes-shelton@randomstorm.com>
 *
 * @copyright 2013 RandomStorm Limited <www.randomstorm.com>
 * @license None
 *
 * @version 1.0
 * @link http://docs.complysec.net
 */

use Phalcon\Mvc\Controller,
	Phalcon\Tag;

class IndexController extends BaseController
{
    public function initialize()
    {

    }

    public function indexAction()
    {
        $wunderground = $this->getDI()->get('Services\Wunderground'); /* @var \Service\Wunderground $qunderground */
        $history = $this->getDI()->get('Services\History'); /* @var \Service\Wunderground $qunderground */

        $this->view->historic = $history->gethistoricWeather(992);
        $this->view->today = $wunderground->getAllWeather();

        $this->view->date = date('d - m - Y');
    }

    public function testAction()
    {

    }

    public function fooAction()
    {

    }
    
    public function fourofourAction()
    {
    	Tag::setTitle('404');
    }    
}