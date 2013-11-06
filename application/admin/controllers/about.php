<?php

class Admin_Controllers_About extends Libs_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $obj = new Admin_Models_tblAbout();
        //hiển thị ra bảng about
        $this->view->listAbout = $obj->getAllAbout();
        $this->view->render('about/index');
    }

    /**
     * gọi tới form
     */
    public function loadForm() {
        //lấy id
        $about_id = $_GET['id'];
        //lấy bản ghi trong bảng theo id
        $obj = new Admin_Models_tblAbout();
        $array = $obj->getAboutByID($about_id);

        $this->view->listAbout = $array;
        $this->view->render('about/form');
    }

    /**
     * thêm bản ghi
     */
    public function insertAboutAction() {
        //lấy giá trị nhập vào
        $obj = new Admin_Models_tblAbout();
        $obj->setTitle($_POST['title']);
        $obj->setContent($_POST['content']);
        //thực hiện câu lệnh
        if ($obj->insertAbout($obj)) {
            header("location: about.php");
        }
    }

    /**
     * sửa bản ghi
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