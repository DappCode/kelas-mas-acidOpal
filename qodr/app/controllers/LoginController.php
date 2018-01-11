<?php
use Phalcon\Mvc\View;
use Phalcon\Securiy;

class LoginController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->pick("login/index");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function _registerSession(Users $user)
    {
        $this->session->set('auth', array(
            'cabang_id' => $user->cabang_id,
            'username' => $user->username,
            'type' => $user->type,
        ));
    }

    public function aksiLoginAction()
    {

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = Users::findFirst("username='$username'");

        // CEK USER
        if($user){
            if($this->security->checkHash(trim($password), trim($user->password))) {
                // CEK PASSWORD
                $this->_registerSession($user);
                return $this->response->redirect('user');
            } else {
                return $this->response->redirect('login');
            }
        } else {
            echo "Username tidak tersedia";
            return $this->response->redirect('login');
        }
    }
}

