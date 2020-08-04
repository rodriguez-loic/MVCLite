<?php

namespace Imaginarium;

class TestController extends MainController
{
    public function __construct($model)
    {
        parent::__construct($model);
    }

    public function indexAction($foo, $bar = 'optional')
    {
        print $this->loadView('test/index', ['foo' => $foo, 'bar' => $bar]);
    }
}
