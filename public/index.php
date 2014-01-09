<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


    /**
     * Read the configuration
     */
    $config = include __DIR__ . "/../app/config/config.php";

    /**
     * Read auto-loader
     */
    include __DIR__ . "/../app/config/loader.php";

    /**
     * Read services
     */
    include __DIR__ . "/../app/config/services.php";


    /**
	 * Handle the request
	 */
	$application = new \Phalcon\Mvc\Application();
	$application->setDI($di);

try {

	echo $application->handle()->getContent();

} catch (Phalcon\Exception $e) {
    var_dump($e->getMessage());exit;
    //header('Location:/fourofour');
// DO SOME LOGGING
} catch (PDOException $e) {
    var_dump($e->getMessage());exit;
    //header('Location:/fourofour');
// DO SOME LOGGING
} catch (RuntimeException $e) {
    var_dump($e->getMessage());exit;
    //header('Location:/fourofour');
}