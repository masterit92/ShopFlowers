<?php
class Default_Controllers_About extends Libs_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $this->getAbout();
        $this->view->render('about/index');
    }
    public function getAbout(){
        $obj = new Default_Models_tblAbout();
        $arrAbout = $obj->getAbout();
        $this->view->arrAbout = $arrAbout ;
    }
}