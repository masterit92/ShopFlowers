<?php

class Admin_Controllers_About extends Libs_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $obj = new Admin_Models_tblAbout();
        
        $this->view->listAbout = $obj->getAllAbout();
        $this->view->render('about/index');
    }

    /**
     * them noi dung about
     */
    public function loadDataInsert() {
        $this->view->render('about/insertAbout');
    }

    public function insertAboutAction() {
        $obj = new Admin_Models_tblAbout();
        //lay gia tri
        $obj->setTitle($_POST['title']);
        $obj->setContent($_POST['content']);
        //insert
        if ($obj->insertAbout($obj)) {
            header("location: about.php");
        }
    }

    /**
     * sua noi dung about
     */
    public function loadDataEdit() {
        //lay id
        $about_id = $_GET['id'];
        //lay mang ket qua theo id
    	$obj = new Admin_Models_tblAbout();
    	$this->view->listAbout = $obj->getAboutByID($about_id);
    	$this->view->render('about/editAbout');
    }
    public function editAboutAction() {
        $obj = new Admin_Models_tblAbout();
        
        $obj->setTitle($_POST['title']);
        $obj->setContent($_POST['content']);
        //insert
        if ($obj->updateAbout($obj)) {
            header("location: about.php");
        }
    }

    /**
     * xoa noi dung
     */
    public function deleteAbout() {
        $obj = new Admin_Models_tblAbout();
        $id = $_GET['id'];
        if ($obj->deleteAbout($id)) {
            //truy van vao db->lay du lieu ra do vao layout
            header("location: about.php");
        }
    }

}