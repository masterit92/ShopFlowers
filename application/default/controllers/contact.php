<?php

class Default_Controllers_Contact extends Libs_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->render('contact/index');
    }

    public function insertAction() {
        $obj = new Default_Models_tblContact();

        $obj->getFullName();
        $obj->getContent();
        $obj->getEmail();
        $obj->getPostDate();

        $obj->insertAction($obj);
    }

}
?>
