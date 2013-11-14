<?php

class Admin_Controllers_About extends Libs_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $obj = new Admin_Models_tblAbout();
        //show about table
        $this->view->listAbout = $obj->getAllAbout();
        //->view
        $this->view->render('about/index');
    }

    /**
     * load form
     */
    public function loadForm() {
        //get id
        $about_id = $_GET['id'];
        $obj = new Admin_Models_tblAbout();
        $array = $obj->getAboutByID($about_id);

        $this->view->listAbout = $array;
        $this->view->render('about/form');
    }

    /**
     * insert
     */
    public function insertAboutAction() {
        $obj = new Admin_Models_tblAbout();

        $obj->setTitle($_POST['title']);
        $obj->setContent($_POST['content']);

        if ($obj->insertAbout($obj)) {
            header("location: about.php");
        }
    }

    /**
     * edit
     */
    public function editAboutAction() {
        $about_id = $_POST['about_id'];

        $obj = new Admin_Models_tblAbout();
        $obj->setTitle($_POST['title']);
        $obj->setContent($_POST['content']);

        if ($obj->updateAbout($obj, $about_id)) {
            header("location: about.php");
        }
    }

    /**
     * del
     */
    public function deleteAbout() {
        $obj = new Admin_Models_tblAbout();
        $id = $_GET['id'];
        if ($obj->deleteAbout($id)) {

            header("location: about.php");
        }
    }

}