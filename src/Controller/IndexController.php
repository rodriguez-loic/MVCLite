<?php declare(strict_types=1);

namespace Controller;

Use Model\UserModel;
use Core\Template;

class IndexController extends AbstractController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction()
    {
        $user = new UserModel(1);

        return parent::getView(
            'index',
            [
                'title' => APP_NAME.' - Home',
                'header' => 'Welcome to ' . APP_NAME,
                'username' => $user->username
            ]
        );
    }
}
