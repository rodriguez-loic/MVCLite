<?php declare(strict_types=1);

namespace Controller;

use Core\Template;
//use Core\SessionHandler;

class AbstractController
{
    protected $template;

    //protected $session;

    public function __construct($template = '')
    {
        $this->template = new Template($template);

        //$this->session = new SessionHandler();
    }

    protected function getView($controller, array $variables = [])
    {
        return $this->template->getView($controller, $variables);
    }
}
