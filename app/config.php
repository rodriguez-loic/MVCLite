<?php
/**
     * DO NOT update this
     */
    define('APP_ROOT', dirname(__DIR__));

    /**
     * Update with your app information
     */
    define('APP_NAME', 'MVCLite - My App');
    define('APP_DOMAIN', 'localhost');

    /**
     * You can customize here your file structure and suffixes
     */
    define('APP_CONTROLLER_NAMESPACE', 'Controller\\');
    define('APP_MODEL_NAMESPACE', 'Model\\');
    define('APP_DEFAULT_CONTROLLER', 'IndexController');
    define('APP_DEFAULT_MODEL', 'IndexModel');
    define('APP_DEFAULT_CONTROLLER_METHOD', 'index');
    define('APP_CONTROLLER_METHOD_SUFFIX', 'Action');

    /**
     * Update DB configuration for your use
     */
    define('DB_ENGINE', 'mysql');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'mvclite');
    define('DB_USER', 'root');
    define('DB_PASS', '');
