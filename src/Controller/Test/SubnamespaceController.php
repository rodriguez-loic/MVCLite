<?php declare(strict_types=1);

namespace Controller\Test;

use \Controller\AbstractController;
Use \Model\UserModel;
use \Core\Template;


class SubnamespaceController extends AbstractController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction($foo, $bar = 'optional')
    {

        return parent::getView(
            'test/index',
            [
                'title' => APP_NAME.' - Home',
                'header' => 'Welcome to '. APP_NAME,
                'foo' => $foo,
                'bar' => $bar
            ]
        );
    }
}
