<?php

$loader = new \Phalcon\Loader();

$loader->registerNamespaces(
    array(
        "Services" => $config->application->servicesDir,
        "Hashes"   => $config->application->libraryDir . '/Hashes/',
        "Forms"    => $config->application->formsDir,
    )
);

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
	array(
		$config->application->controllersDir,
		$config->application->pluginsDir,
        $config->application->routesDir,
        $config->application->libraryDir,
        $config->application->modelsDir,
        $config->application->viewsDir,
        $config->cache->cacheDir,
	)
)->register();