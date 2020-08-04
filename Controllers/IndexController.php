<?php

namespace Imaginarium;

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
