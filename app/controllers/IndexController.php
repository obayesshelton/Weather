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
        $this->view->date = date('ymd');
    }
    
    public function fourofourAction()
    {
    	Tag::setTitle('404');
    }    
}