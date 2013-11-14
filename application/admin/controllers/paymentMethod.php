<?php

class Admin_Controllers_PaymentMethod extends Libs_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $obj = new Admin_Models_tblPaymentMethod();
        $this->view->listpay = $obj->getAllPay();

        $this->view->render('paymentMethod/index');
    }

    public function loadForm() {
        $pay_id = $_GET['id'];
        $obj = new Admin_Models_tblPaymentMethod();
        $array = $obj->getPayByID($pay_id);

        $this->view->listpay = $array;
        $this->view->render('paymentMethod/form');
    }

    public function insertPayAction() {
        $obj = new Admin_Models_tblPaymentMethod();
        $img = new Libs_uploadImg();

        $obj->setPayName($_POST['pay_name']);
        $obj->setPayContent($_POST['pay_content']);
        
        if(!empty($_FILES['pay_img']['name'])){
            $url_img = 'templates/admin/images';
            $pay_img = $img->addImg($url_img, 'pay_img', $_FILES['pay_img']['name']);
            $obj->setPayImg($pay_img);
        }
        if ($obj->insertPayment($obj)) {
            header("location: paymentMethod.php");
        }
    }

    public function editPayAction() {
        $pay_id = $_POST['pay_id'];
        $obj = new Admin_Models_tblPaymentMethod();

        $obj->setPayName($_POST['pay_name']);
        $obj->setPayImg($_POST['pay_img']);
        $obj->setPayContent($_POST['pay_content']);

        if ($obj->updatePayment($obj, $pay_id)) {
            header('location: paymentMethod.php');
        }
    }

    public function deletePayment() {
        $pay_id = $_GET['id'];
        $obj = new Admin_Models_tblPaymentMethod();

        if ($obj->deletePayment($pay_id)) {
            header('location: paymentMethod.php');
        }
    }

}