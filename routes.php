<?php

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'],'/')) : '/';

switch($url[0]) {
    case '/':

        require_once(__DIR__ . '/Controllers/MainController.php');
        require_once(__DIR__ . '/Controllers/IndexController.php');

        require_once(__DIR__ . '/Models/MainModel.php');
        require_once(__DIR__ . '/Models/IndexModel.php');

        $indexModel = new Imaginarium\IndexModel();
        $indexController = new Imaginarium\IndexController($indexModel);
        $indexController->indexAction();
        break;
    case 'main':
        header('HTTP/1.1 404 Not Found');
        die('404 - Sorry, it looks like I lost my way.');
        break;
    default:

        /**
         * The way a MVC should work is:
         * https://my-website.com/<url[0]>/<url[1]>/<url[2+]
         * URL 0 refers to the controller
         * URL 1 refers to the action, in case it's not provided, we use default action
         * URL 2+ would be parameters for the action
         */
        $requestedController = strtolower($url[0]);
        $ucFirstreqCtrllr = ucfirst($requestedController);
        $requestedAction = isset($url[1])? $url[1] : 'index';
        $requestedParams = array_slice($url, 2);

        
        $ctrlPath = __DIR__ . '/Controllers/' . $ucFirstreqCtrllr . 'Controller.php';
        $mdlPath = __DIR__ . '/Models/' . $ucFirstreqCtrllr . 'Model.php';

        if (!file_exists($ctrlPath)) {
            header('HTTP/1.1 404 Not Found');
            die('404 - Sorry, it looks like I lost my way.');
        }

        if (!file_exists($mdlPath)) {
            header('HTTP/1.1 404 Not Found');
            die('404 - Sorry, it looks like I lost my way.');
        }

        require_once(__DIR__ . '/Controllers/MainController.php');
        require_once(__DIR__ . '/Controllers/' . $ucFirstreqCtrllr . 'Controller.php');
        require_once(__DIR__ . '/Models/MainModel.php');
        require_once(__DIR__ . '/Models/' . $ucFirstreqCtrllr . 'Model.php');

        $modelName      = $ucFirstreqCtrllr . 'Model';
        $controllerName = $ucFirstreqCtrllr . 'Controller';

        $controllerObj  = new $controllerName(new $modelName);

        if ($requestedAction != '') {
            $controllerObj->$requestedAction($requestedParams);
        } else {
            $controllerObj->indexAction();
        }
}
