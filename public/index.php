<?php declare(strict_types=1);

require_once dirname(__DIR__) . '/app/config.php';
require_once dirname(__DIR__) . '/vendor/autoload.php';
 
use Core\Request;
use Core\Template;

$request = new Request($_SERVER, $_POST, $_GET, $_FILES);
 
try {
    $controllerData = $request->getController();
    $controller = $controllerData['controller'];
    $method = $request->getMethod($controller);
    $params = $request->getParams($controller, $method);

    $controller = new $controller($controllerData['template']);
    if (!empty($params)) {
        echo call_user_func_array(array($controller, $method), $params);
    } else {
        echo $controller->$method();
    }
} catch (Exception $e) {
    $template = new Template();
    echo $template->getView('error', [
        'title' => APP_NAME.' - Home',
        'header' => APP_NAME,
        'errorCode' => $e->getCode(),
        'errorMessage' => $e->getMessage(),
        'errorFile' => $e->getFile(),
        'errorLine' => $e->getLine()
    ]);
}