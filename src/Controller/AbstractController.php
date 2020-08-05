<?php declare(strict_types=1);

namespace Controller;

use Core\Template;

class AbstractController
{
    protected $template;

    public function __construct($template = '')
    {
        $this->template = new Template($template);
    }

    protected function request($key) {
        if (isset($_POST[$key])) {
            return $_POST[$key];
        } elseif (isset($_GET[$key])) {
            return $_GET[$key];
        } else {
            return null;
        }
    }

    protected function getView($controller, array $variables = [])
    {
        return $this->template->getView($controller, $variables);
    }

    /**
     * Method used to load views with parameters
     */
    protected function loadView(string $viewName = 'index', array $params = [])
    {
        extract($params);

        $view_path = DIR_ROOT . 'Views/' . $viewName . '.php';

        if (!file_exists($view_path)) {
            header('HTTP/1.1 404 Not Found');
            die('404 - Sorry, it looks like I lost my way for  - ' . $viewName . '(' . $view_path . ')' . ' - view...');
        }

        require_once($view_path);
    }

    public static function loadHeader(string $headerName = 'main', array $params = [])
    {
        extract($params);

        $view_path = DIR_ROOT . 'Views/headers/' . $headerName . '.php';

        if (!file_exists($view_path)) {
            header('HTTP/1.1 404 Not Found');
            die('404 - Sorry, it looks like I lost my way for  - ' . $headerName . '(' . $view_path . ')' . ' - header...');
        }

        require_once($view_path);
    }

    public static function loadFooter(string $footerName = 'main', array $params = [])
    {
        extract($params);

        $view_path = DIR_ROOT . 'Views/footers/' . $footerName . '.php';

        if (!file_exists($view_path)) {
            header('HTTP/1.1 404 Not Found');
            die('404 - Sorry, it looks like I lost my way for  - ' . $footerName . '(' . $view_path . ')' . ' - footer...');
        }

        require_once($view_path);
    }
}