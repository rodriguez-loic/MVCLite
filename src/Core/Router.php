<?php declare(strict_types=1);

namespace Core;
 
class Router
{
    public static function getMethod() {
        return filter_input(\INPUT_SERVER, 'REQUEST_METHOD', \FILTER_SANITIZE_SPECIAL_CHARS);
    }

    public static function getRoute($route = '/') {
        require_once(APP_ROOT . '/public/routes.php');

        if (isset($routes['*'][$route])) {
            return $routes['*'][$route];
        } else if (isset($routes[self::getMethod()][$route])) {
            return $routes[self::getMethod()][$route];
        } else {
            print '404: route not found';
            exit;
        }
    }
}
