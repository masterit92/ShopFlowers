<?php

@session_start();

class Admin_Controllers_Index extends Libs_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $model_user = new Admin_Models_tblUsers();

        if (isset($_POST['btnLogin'])) {
            if (isset($_POST['confirm']) && $_POST['confirm'] != $_SESSION['security_code']) {
                $this->view->render('index/index');
            }

            $admin = $model_user->checkLogin($_POST['txtUser'],md5( $_POST['txtPass']) );

            if ($admin != null) {
                $_SESSION['user_id'] = $admin->getUserId();
                $_SESSION['user_admin'] = $admin->getEmail();
                $_SESSION['full_name_admin'] = $admin->getFullName();
                header("location: admin/home");
            } else {
                if (!isset($_SESSION['confirm'])) {
                    $_SESSION['confirm'] = 1;
                } else {
                    $_SESSION['confirm'] += 1;
                }
            }
        }

        $this->view->render('index/index');
    }

    public function logout() {
        session_destroy();
        session_unset();
        $this->view->render('index/logout');
    }

    public function home() {
        $model_user = new Admin_Models_tblUsers();
        $this->view->listAllUser = $model_user->getAllUsers();
        $this->view->render('index/home');
    }

//    public function searchPublic() {
//        $controller = $_GET['controller'];
//        $keyWord = $_GET['keyWord'];
//        switch ($controller) {
//            case 'news':
//                $newsObj = new Admin_Controllers_News();
//                if ($newsObj->listNews($keyWord)) {
//                    header("location: news.php ");
//                }
//                break;
//        }
//    }

}