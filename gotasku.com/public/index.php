<?php

error_reporting(E_ALL);

try {
    /**
     * Constants Declared Here (Satyan)
     */
    require __DIR__.'/../app/config/constants.php';

    require(__DIR__.'/../app/config/PHPMailerValues.php');
    require(__DIR__.'/../app/library/PHPMailer/PHPMailerAutoload.php');



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
    $application = new \Phalcon\Mvc\Application($di);

    echo $application->handle()->getContent();

} catch (\Exception $e) {
    echo $e->getMessage();
}
