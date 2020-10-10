<?php declare(strict_types=1);

namespace Core;

class SessionHandler
{
    public function __construct()
    {
        $this->start();

        if ($this->get('error') === null) {
            $this->set('error', false);
        }

        if ($this->get('auth') === null) {
            $this->set('auth', false);
        }
    }

    protected function start()
    {
        session_start();
    }

    public function debug()
    {
        return $_SESSION;
    }

    public function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function get($name)
    {
        return isset($_SESSION[$name]) ? $_SESSION[$name] : null;
    }

    public function stop()
    {
        session_unset();

        session_destroy();
    }
}

//session_start();