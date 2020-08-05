<?php

    define('START_TIME', microtime(true));
    define('DIR_ROOT', dirname(__DIR__) . '\\');

    // Here we could also create some app/config.php, app/db.php to be loaded in order to set the different constants

    require_once "../vendor/autoload.php";

    require_once('routes.php');
    