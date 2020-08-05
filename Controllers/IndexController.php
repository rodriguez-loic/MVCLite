<?php

namespace Controllers;

Use Models\IndexModel;

class IndexController extends MainController
{
    public function __construct($model)
    {
        parent::__construct($model);
    }

    public function indexAction()
    {
        $usernameDetails = $this->model->getUsernameDetails();

        print $this->loadView('index', $usernameDetails);
    }
}
