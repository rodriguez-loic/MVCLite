<?php declare(strict_types=1);

namespace Controller;

use Core\Template;

class IndexController extends AbstractController
{
    public function __construct($session, $template = '')
    {
        parent::__construct($session, $template);
    }

    public function indexAction()
    {
        return parent::getView(
            'index',
            [
                'title' => APP_NAME.' - Home',
                'header' => APP_NAME,
                'auth' => $this->session->get('auth')
            ]
        );
    }
}
