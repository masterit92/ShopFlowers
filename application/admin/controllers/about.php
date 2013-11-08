<?php

class Admin_Controllers_About extends Libs_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $obj = new Admin_Models_tblAbout();
        //hi?n th? ra b?ng about
        $this->view->listAbout = $obj->getAllAbout();
        //ð? ra view
        $this->view->render('about/index');
    }

    /**
     * g?i t?i form
     */
    public function loadForm() {
        //l?y id
        $about_id = $_GET['id'];
        //l?y b?n ghi trong b?ng theo id
        $obj = new Admin_Models_tblAbout();
        $array = $obj->getAboutByID($about_id);
        //ð? ra view
        $this->view->listAbout = $array;
        $this->view->render('about/form');
    }

    /**
     * thêm b?n ghi
     */
    public function insertAboutAction() {
        $obj = new Admin_Models_tblAbout();
        //l?y giá tr? nh?p vào
        $obj->setTitle($_POST['title']);
        $obj->setContent($_POST['content']);
        //th?c hi?n câu l?nh
        if ($obj->insertAbout($obj)) {
            header("location: about.php");
        }
    }

    /**
     * s?a b?n ghi
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