<?php
class Admin_Controllers_About extends Libs_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $this->getAbout();
        $this->view->render('about/index');
    }
    public function getAbout(){
        $obj = new Admin_Models_tblAbout();
        $listAbout = $obj->getAllAbout();
        $this->view->listAbout = $listAbout;
    }
}