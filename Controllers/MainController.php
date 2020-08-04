<?php

namespace Imaginarium;

class MainController
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Method used to load views with parameters
     */
    protected function loadView($viewName, $params)
    {
        $view_path = $_SERVER['DOCUMENT_ROOT'] . '/Views/' . $viewName . '.php';

        if (!file_exists($view_path)) {
            header('HTTP/1.1 404 Not Found');
            die('404 - Sorry, it looks like I lost my way for  - ' . $viewName . '(' . $view_path . ')' . ' - view...');
        }

        require_once($view_path);
    }
}