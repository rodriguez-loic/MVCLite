<?php declare(strict_types=1);

namespace Core;
 
use Exception;
 
class Request
{
    private $server;
    private $post;
    private $get;
    private $files;
 
    public function __construct(
        array $server = [],
        array $post = [],
        array $get = [],
        array $files = []
    ) {
        $this->server = $server;
        $this->post = $post;
        $this->get = $get;
        $this->files = $files;
    }
 
    public function getServer($index = null)
    {
        return !is_null($index) && isset($this->server[$index]) ? $this->server[$index] : null;
    }
 
    public function getPost()
    {
        return $this->post;
    }
 
    public function getGet()
    {
        return $this->get;
    }
 
    public function getFiles()
    {
        return $this->files;
    }
 
    public function getController()
    {

        $urlParts = $this->getUrlParts();
 
        // If controller name is not set in URL return default one
        /*if (!isset($urlParts[0])) {
            return APP_CONTROLLER_NAMESPACE.APP_DEFAULT_CONTROLLER;
        }*/

        $route = Router::getRoute($urlParts[0]);
 
        // If controller exists in system then return it
        if (class_exists(APP_CONTROLLER_NAMESPACE.$route)) {
            return APP_CONTROLLER_NAMESPACE.$route;
        }
 
        // Otherwise
        http_response_code(404);
        throw new Exception(sprintf('Controller cannot be found: [%s]', APP_CONTROLLER_NAMESPACE.$urlParts[0]), 404);
    }
 
    public function getMethod($controller)
    {
        $urlParts = $this->getUrlParts();
 
        // If controller method is not set in URL return default one
        if (!isset($urlParts[1]) || $urlParts[1] === '') {
            return APP_DEFAULT_CONTROLLER_METHOD.APP_CONTROLLER_METHOD_SUFFIX;
        }
 
        // If controller method name pattern is invalid
        if (!preg_match('/^[a-z\-]+$/', $urlParts[1])) {
            http_response_code(400);
            throw new Exception(sprintf('Invalid method: [%s]', $urlParts[1]), 400);
        }
 
        // If controller method exists in system then return it
        $method = $this->constructMethod($urlParts[1]);
        if (method_exists($controller, $method)) {
            return $method;
        }
 
        // Otherwise
        http_response_code(404);
        throw new Exception(sprintf('Method cannot be found: [%s:%s]', $controller, $method), 404);
    }
 
    public function getParams($controller, $method)
    {
        $urlParts = $this->getUrlParts();

        if ($urlParts == '/') {
            return [];
        }

        $requestedParams = array_slice($urlParts, 2);
 
        $reflection = new \ReflectionMethod($controller, $method);

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
            http_response_code(404);
            throw new Exception(sprintf('Problem with parameters of method: [%s:%s]. %s parameters given, should be between %s and %s',
                $controller,
                $method,
                $givenArgNumber,
                $minimumArgNumber,
                $maximumArgNumber
            ), 404);
        }

        return $requestedParams;
    }
 
    private function getUrlParts()
    {
        //$url = str_replace(APP_INNER_DIRECTORY, null, $this->getServer('REQUEST_URI'));

        $urlParts = $this->getServer('PATH_INFO') ? explode('/', ltrim($this->getServer('PATH_INFO'),'/')) : '/';

        /*$urlParts = explode('/', ltrim($this->getServer('PATH_INFO')));
        $urlParts = array_filter($urlParts);
        $urlParts = array_values($urlParts);*/
 
        return $urlParts;
    }
 
    private function constructMethod($part)
    {
        $method = null;
 
        $parts = explode('-', $part);
        foreach ($parts as $part) {
            if (!$method) {
                $method = $part;
            } else {
                $method .= ucfirst($part);
            }
        }
 
        return $method.APP_CONTROLLER_METHOD_SUFFIX;
    }
}
