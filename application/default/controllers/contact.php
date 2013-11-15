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

        $obj->setFullName($_POST['full_name']);
        $obj->setEmail($_POST['email']);
        $obj->setTitle($_POST['title']);
        $obj->setContent($_POST['content']);
        if (isset($_POST['post_date'])) {
//            date_default_timezone_set('Asia/Ho_Chi_Minh');
//            $_POST['post_date'] = date("YmdHis", time());
            $_POST['post_date'] = date('d-m-Y');
            $obj->setPostDate($_POST['post_date']);
        }

        if ($obj->insertAction($obj)) {
            echo "<script>alert('Success!')</script>";
            $url = URL_BASE . '/contact';
            $this->redir($url);
        }
    }

}

?>
