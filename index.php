<?php

    define('START_TIME', microtime(true));

    // For now we only handle the routing
    // This could be use to load the app configuration, autoload and so on
    require_once('./routes.php');
