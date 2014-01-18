<?php

use Phalcon\DI\FactoryDefault\CLI as CliDI,
    Phalcon\CLI\Console as ConsoleApp,
    Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;

ini_set("allow_url_fopen", 1);

define('VERSION', '1.0.0');

//Using the CLI factory default services container
$di = new CliDI();

/**
 * Read the configuration
 */
$config = include __DIR__ . "/../config/config.php";

/**
 * Register the autoloader and tell it to register the tasks directory
 */
$loader = new \Phalcon\Loader();
$loader->registerDirs(
    array(
        $config->application->tasksDir,
        $config->application->modelsDir,
    )
);

$loader->registerNamespaces(
    array(
        "Services" => $config->application->servicesDir,
    )
);

$loader->register();

$config = include __DIR__ . "/../config/config.php";
$di->set('config', $config);

$di->set('modelsManager', function() {
    return new Phalcon\Mvc\Model\Manager();
});

$di->set('db', function() use ($config) {
    return new DbAdapter(array(
        'host'     => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname'   => $config->database->dbname
    ));
});

//Create a console application
$console = new ConsoleApp();
$console->setDI($di);

/**
 * Process the console arguments
 */
$arguments = array();
$params = array();

foreach($argv as $k => $arg) {
    if($k == 1) {
        $arguments['task'] = $arg;
    } elseif($k == 2) {
        $arguments['action'] = $arg;
    } elseif($k >= 3) {
        $params[] = $arg;
    }
}
if(count($params) > 0) {
    $arguments['params'] = $params;
}

// define global constants for the current task and action
define('CURRENT_TASK', (isset($argv[1]) ? $argv[1] : null));
define('CURRENT_ACTION', (isset($argv[2]) ? $argv[2] : null));

try {
    // handle incoming arguments
    $console->handle($arguments);
}
catch (\Phalcon\Exception $e) {
    echo $e->getMessage();
    exit(255);
}