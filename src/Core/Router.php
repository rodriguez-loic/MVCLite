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
            if (is_array($routes['*'][$route]) && isset($routes['*'][$route]['controller'])) {
                return $routes['*'][$route];
            } else if (!is_array($routes['*'][$route])) {
                return [
                    'controller' => $routes['*'][$route],
                    'template' => ''
                ];
            } else {
                http_response_code(404);
                throw new Exception(sprintf('Route not found found: [%s]', $route), 404);
            }
        } else if (isset($routes[self::getMethod()][$route])) {
            if (is_array($routes[self::getMethod()][$route]) && isset($routes[self::getMethod()][$route]['controller'])) {
                return $routes[self::getMethod()][$route];
            } else if (!is_array($routes[self::getMethod()][$route])) {
                return [
                    'controller' => $routes[self::getMethod()][$route],
                    'template' => ''
                ];
            } else {
                http_response_code(404);
                throw new Exception(sprintf('Route not found found: [%s]', $route), 404);
            }
        } else {
            http_response_code(404);
            throw new Exception(sprintf('Route not found found: [%s]', $route), 404);
        }
    }
}
