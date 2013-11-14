<?php

class Admin_Controllers_Contact extends Libs_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $obj = new Admin_Models_tblContact();
        $this->view->listCon = $obj->getAllContact();
        $this->view->render('contact/index');
    }
    public function deleteCon(){
        $obj = new Admin_Models_tblContact();
        $id = $_GET['id'];
        if($obj->deleteContact($id)){
            header('location: contact.php');
        }
    }
    
}

?>
