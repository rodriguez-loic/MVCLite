<?php

// Get the different URL parts
$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'],'/')) : '/';

// Route differently accordingto the controller name
switch($url[0]) {
    case '/':
        /**
         * In case we are in the index of the website, we can do it manually
         */

        // Loading Controller
        require_once(__DIR__ . '/Controllers/MainController.php');
        require_once(__DIR__ . '/Controllers/IndexController.php');

        // Loading Model
        require_once(__DIR__ . '/Models/MainModel.php');
        require_once(__DIR__ . '/Models/IndexModel.php');

        // Initialisation of the model
        $indexModel = new Imaginarium\IndexModel();

        // Initialisation of the controller
        $indexController = new Imaginarium\IndexController($indexModel);

        // Load the main action which should return the view
        $indexController->indexAction();
        break;
    case 'main':
        // We protect this specific route as it would direct to our MainController
        header('HTTP/1.1 404 Not Found');
        die('404 - Sorry, it looks like I lost my way...');
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

        // Now that we have these information we can check the controller and model paths are valid        
        $ctrlPath = __DIR__ . '/Controllers/' . $ucFirstreqCtrllr . 'Controller.php';
        $mdlPath = __DIR__ . '/Models/' . $ucFirstreqCtrllr . 'Model.php';

        // If any of them are invalid we return a 404 not found error
        if (!file_exists($ctrlPath)) {
            header('HTTP/1.1 404 Not Found');
            die('404 - Sorry, I couldn\'t find my route...');
        }
        if (!file_exists($mdlPath)) {
            header('HTTP/1.1 404 Not Found');
            die('404 - Oops, I probably turned to the wrong corner...');
        }

        // Loading Controllers files
        require_once(__DIR__ . '/Controllers/MainController.php');
        require_once(__DIR__ . '/Controllers/' . $ucFirstreqCtrllr . 'Controller.php');

        // Loading Models files
        require_once(__DIR__ . '/Models/MainModel.php');
        require_once(__DIR__ . '/Models/' . $ucFirstreqCtrllr . 'Model.php');

 
        $modelName      = 'Imaginarium\\' . $ucFirstreqCtrllr . 'Model';
        $controllerName = 'Imaginarium\\' . $ucFirstreqCtrllr . 'Controller';

        // Initialisation of the controller
        $controllerObj  = new $controllerName($modelName);

        // If there is a requested action we load it along with parameters
        // Else we just load the default action of the given controller
        if ($requestedAction != '') {
            // Check the number of arguments match
            $reflection = new ReflectionMethod($controllerObj, $requestedAction . 'Action');

            // Get the minimum number of arguments required for the method called
            $minimumArgNumber = $reflection->getNumberOfRequiredParameters();
            // Get the total number of arguments for the method called
            $maximumArgNumber = $reflection->getNumberOfParameters();
            // Get the count of passed parameters
            $givenArgNumber = count($requestedParams);

            // Clean the count of passed parameters if it's an empty string
            // And be sure to do it only if there is only 1 parameter
            // Eg: localhost/test (controller)/index (method)/ (empty param)
            if ($givenArgNumber === 1
                && $requestedParams[0] === '') {
                $givenArgNumber = 0;
            }

            // If the given number of parameters doesn't match, return error
            if ($givenArgNumber < $minimumArgNumber
                || $givenArgNumber > $maximumArgNumber) {
                header('HTTP/1.1 404 Not Found');
                die('404 - I was going to ' . $controllerName . ' but this is a dead-end :(');
            }

            // If there is parameters, pass them to the method
            // Else call the method with empty params
            if ($givenArgNumber > 0) {
                call_user_func_array(array($controllerObj, $requestedAction . 'Action'), $requestedParams);
            } else {
                $controllerObj->{$requestedAction . 'Action'}();
            }
        } else {
            // As for the previous lines, we check the number of params for the default action
            // And return errors in case some params are mandatory
            $reflection = new ReflectionMethod($controllerObj, 'indexAction');
            $minimumArgNumber = $reflection->getNumberOfRequiredParameters();
            $maximumArgNumber = $reflection->getNumberOfParameters();
            $givenArgNumber = count($requestedParams);

            if ($givenArgNumber < $minimumArgNumber
                || $givenArgNumber > $maximumArgNumber) {
                header('HTTP/1.1 404 Not Found');
                die('404 - I feel like a fish trying to fly up to the clouds.');
            }

            $controllerObj->indexAction();
        }
}
