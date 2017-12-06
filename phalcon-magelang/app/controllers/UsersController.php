<?php

class UsersController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $data_user = Users::find();
        $this->view->data_user = $data_user;
    }

    public function addUserAction()
    {
        $user = new Users();

        if ($this->request->isPost()) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $type = $this->request->getPost('type');

            $user->assign(array(
                'username' => $username,
                'password' => $password,
                'type' => $type
            ));

            if ($user->save()) {
                $notif['title']="Success";
                $notif['text']="Data Telah Berhasil di Simpan!";
                $notif['type']="Success";
            }else {
                $pesan_error = $user->getMessages();
                $data_pesan_error ='';
                foreach ( $pesan_error as $pesanError) {
                    $data_pesan_error="$pesanError";
                }
                $notif['title']="Error";
                $notif['text']="Data Tidak Berhasil di Simpan!";
                $notif['type']="Error";
            }
            echo json_encode($notif);
            die();
        }
    }

    public function editUserAction()
    {
        

        if ($this->request->isPost()) {
            $id = $this->request->getPost('id');
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $type = $this->request->getPost('type');

            $user = Users::findFirst("id='$id'");

            $user->assign(array(
                'id' => $id,
                'username' => $username,
                'password' => $password,
                'type' => $type
            ));
 
            if ($user->save()) {
                $notif['title']="Success";
                $notif['text']="Data Telah Berhasil di Simpan!";
                $notif['type']="Success";
            }else {
                $pesan_error = $user->getMessages();
                $data_pesan_error ='';
                foreach ( $pesan_error as $pesanError) {
                    $data_pesan_error="$pesanError";
                }
                $notif['title']="Error";
                $notif['text']="Data Tidak Berhasil di Simpan!";
                $notif['type']="Error";
            }
            echo json_encode($notif);
            die();
        }
    }

}

