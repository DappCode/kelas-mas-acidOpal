<?php

class UserController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $data_user = Users::find();
        $this->view->data_user = $data_user;
    }

    public function getAjaxAction()
    {
        $user = new Users();
        $json_data = $user->getDataUser();
        die(json_encode($json_data));
    }
   
    public function addUserAction()
    {
        $user = new Users();

        if ($this->request->isPost()) {
            $cabang_id = $this->request->getPost('cabang_id');
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $type = $this->request->getPost('type');
            $id = "MGL".$username;

            $user->assign(array(
                'id' => $id,
                'cabang_id' => $cabang_id,
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
            $cabang_id = $this->request->getPost('cabang_id');
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $type = $this->request->getPost('type');

            $user = Users::findFirst("id='$id'");

            $user->assign(array(
                'id' => $id,
                'cabang_id' => $cabang_id,
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

    public function deleteUserAction()
    {
        if ($this->request->isPost()) {
            $id = $this->request->getPost('id');

            $user = Users::findFirst("id='$id'");
 
            if ($user->delete()) {
                $notif['title']="Success";
                $notif['text']="Data Telah Berhasil di hapus!";
                $notif['type']="Success";
            }else {
                $pesan_error = $user->getMessages();
                $data_pesan_error ='';
                foreach ( $pesan_error as $pesanError) {
                    $data_pesan_error="$pesanError";
                }
                $notif['title']="Error";
                $notif['text']="Data Tidak Berhasil di hapus!";
                $notif['type']="Error";
            }
            echo json_encode($notif);
            die();
        }

    }
    public function listUserAction()
    {
        $data_user = Users::find();
        $this->view->data_user = $data_user;
        $this->view->picl();
    }
}   

