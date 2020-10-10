<?php declare(strict_types=1);

namespace Controller;

Use Model\UserModel;
use Core\Template;
use Exception;

class UserController extends AbstractController
{
    public function __construct($session, $template = '')
    {
        parent::__construct($session, $template);
    }

    public function indexAction()
    {
        if ($this->auth === null || $this->auth === false) {
            print parent::getView('errors/general', [
                'title' => APP_NAME.' - Error',
                'header' => APP_NAME,
                'message' => 'Access forbidden',
                'auth' => $this->auth
            ]);
            exit;
        }
    }

    public function signinAction()
    {
        try {
            if ($this->auth !== null
                && $this->auth !== false) {
                throw new Exception('You\'re already logged in');
            }

            if ($this->isPost() === false) {
                throw new Exception('You can\'t access this URL');
            }

            $userMapper = spot()->mapper('Model\UserModel');
            $user = $userMapper->where([
                'username' => $this->post('username'),
            ])->first();

            if ($user === false) {
                throw new Exception('Account not found.');
            } else {
                if (password_verify($this->post('password'), $user->password)) {
                    $this->session->set('auth', [
                        'id' => $user->id,
                        'username' => $this->post('username'),
                        'email' => $this->post('email'),
                        'created_at' => $user->created_at
                    ]);

                    header('Location: /');
                } else {
                    throw new Exception('Wrong password.');
                }
            }

        } catch (Exception $e) {
            return parent::getView('errors/general', [
                'title' => APP_NAME.' - Error',
                'header' => APP_NAME,
                'message' => $e->getMessage(),
                'auth' => $this->session->get('auth')
            ]);
        }
    }

    public function signupAction()
    {
        try {
            if ($this->auth !== null
                && $this->auth !== false) {
                throw new Exception('You\'re already logged in');
            }

            if ($this->isPost() === false) {
                return parent::getView(
                    'user/signup',
                    [
                        'title' => APP_NAME.' - Create an account',
                        'header' => APP_NAME,
                        'auth' => $this->session->get('auth')
                    ]
                );
            } else {
                $userMapper = spot()->mapper('Model\UserModel');

                $user = $userMapper->where([
                    'username' => $this->post('username')
                ])->first();

                $email = $userMapper->where([
                    'email' => $this->post('email')
                ])->first();

                if ($user !== false
                || $email !== false) {
                    throw new Exception('This account already exist.');
                }

                $entity = $userMapper->create([
                    'username' => $this->post('username'),
                    'email' => $this->post('email'),
                    'password' => password_hash($this->post('password'), PASSWORD_DEFAULT)
                ]);

                if ($entity) {
                    $this->session->set('auth', [
                        'id' => $user->id,
                        'username' => $this->post('username'),
                        'email' => $this->post('email'),
                        'created_at' => $user->created_at
                    ]);

                    header('Location: /');
                }
            }

        } catch (Exception $e) {
            return parent::getView('errors/general', [
                'title' => APP_NAME.' - Error',
                'header' => APP_NAME,
                'message' => $e->getMessage(),
                'auth' => $this->session->get('auth')
            ]);
        }
    }

    public function logoutAction()
    {
        $this->session->stop();

        header('Location: /');
    }
}
