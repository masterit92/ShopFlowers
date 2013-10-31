<?php
@session_start();
class Admin_Controllers_Index extends Libs_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $model_user = new Admin_Models_tblUsers();
        $flag = false;
        if (isset($_COOKIE['ck_user_admin']) && isset($_COOKIE['ck_pass_admin'])) {
            $admin = $model_user->checkLogin($_COOKIE['ck_user_admin'], $_COOKIE['ck_pass_admin']);
            $flag = true;
        }
        if (isset($_POST['btnLogin'])) {
            if (isset($_POST['confirm']) && $_POST['confirm'] != $_SESSION['security_code']) {
                $this->view->render('index/index');
            }
            $admin = $model_user->checkLogin($_POST['txtUser'], $_POST['txtPass']);
            if (isset($_POST['cbRe']) && $_POST['cbRe'] == 'on') {
                setcookie('ck_user_admin', $admin->getEmail(), time() + 24 * 60 * 60);
                setcookie('ck_pass_admin', $admin->getPassword(), time() + 24 * 60 * 60);
            }
            $flag = true;
        }
        if ($flag) {
            if ($admin != null) {
                $_SESSION['user_admin'] = $admin->getEmail();
                $_SESSION['full_name_admin'] = $admin->getFullName();
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
    public function logout(){
        session_destroy();
        session_unset();
        setcookie('ck_user_admin');
        setcookie('ck_pass_admin');
        $this->view->render('index/logout');
    }
    public function home(){
        $model_user = new Admin_Models_tblUsers();
        $this->view->listAllUser = $model_user->getAllUsers();
        $this->view->render('index/home');
    }
}