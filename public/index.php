<?php declare(strict_types=1);

require_once dirname(__DIR__) . '/app/config.php';
require_once dirname(__DIR__) . '/vendor/autoload.php';

// Spot2 ORM Configuration
function spot() {
    static $spot;
    if ($spot === null) {
      $cfg = new \Spot\Config();
      $cfg->addConnection(DB_ENGINE, [
          'dbname' => DB_NAME,
          'user' => DB_USER,
          'password' => DB_PASS,
          'host' => DB_HOST,
          'driver' => 'pdo_' . DB_ENGINE, // https://www.php.net/manual/pdo.drivers.php
      ]);
      $spot = new \Spot\Locator($cfg);
    }

    return $spot;
}

use Core\Request;
use Core\SessionHandler;
use Core\Template;

$request = new Request($_SERVER, $_POST, $_GET, $_FILES);
$session = new SessionHandler();

try {
    $controllerData = $request->getController();
    $controller = $controllerData['controller'];
    $method = $request->getMethod($controller);
    $params = $request->getParams($controller, $method);

    $controller = new $controller($session, $controllerData['template']);
    if (!empty($params)) {
        echo call_user_func_array(array($controller, $method), $params);
    } else {
        echo $controller->$method();
    }
} catch (Exception $e) {
    $template = new Template();
    echo $template->getView('errors/exception', [
        'title' => APP_NAME.' - Fatal Error',
        'header' => APP_NAME,
        'errorCode' => $e->getCode(),
        'errorMessage' => $e->getMessage(),
        'errorFile' => $e->getFile(),
        'errorLine' => $e->getLine(),
        'auth' => isset($_SESSION['auth']) ? $_SESSION['auth'] : false
    ]);
}
