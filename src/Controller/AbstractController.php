<?php declare(strict_types=1);

namespace Controller;

use Core\Template;
use Core\Request;
use Core\SessionHandler;

class AbstractController
{
    protected $template;

    protected $session;

    protected $auth;

    private $request;

    public function __construct($session, $template = '')
    {
        $this->template = new Template($template);

        $this->session = $session;

        $this->request = new Request($_SERVER, $_POST, $_GET, $_FILES);

        $this->auth = $this->session->get('auth');
    }

    public function isPost()
    {
        $post = $this->request->getPost();
        if (empty($post)) {
            return false;
        } else {
            return true;
        }
    }

    public function isGet()
    {
        $get = $this->request->getGet();
        if (empty($get)) {
            return false;
        } else {
            return true;
        }
    }

    public function isAjax()
    {
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            return true;
        }

        return false;
    }

    public function post($name)
    {
        $post = $this->request->getPost();
        if (empty($post)) {
            return null;
        } else {
            return isset($post[$name]) ? $post[$name] : null;
        }
    }

    public function get($name)
    {
        $get = $this->request->getGet();
        if (empty($get)) {
            return null;
        } else {
            return isset($get[$name]) ? $get[$name] : null;
        }
    }

    protected function getView($controller, array $variables = [])
    {
        return $this->template->getView($controller, $variables);
    }
}
