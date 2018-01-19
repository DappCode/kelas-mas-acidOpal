<?php
use Phalcon\Mvc\view;
use Phalcon\Security;

class RekapharianController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $data_user = KeuRab::find();
        $this->view->data_user = $data_user;
    }

    public function getAjaxAction()
    {
        $rab = new KeuRab();
        $json_data = $rab->getDatabase();
        die(json_encode($json_data));
    }

    

}   

