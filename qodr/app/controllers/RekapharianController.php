<?php
use Phalcon\Mvc\view;
use Phalcon\Security;

class RekapharianController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    
        
    }

    public function getAjaxAction()
    {
        $rab = new KeuRab();
        $json_data = $rab->getDatabase();
        die(json_encode($json_data));
    }

    

}   

