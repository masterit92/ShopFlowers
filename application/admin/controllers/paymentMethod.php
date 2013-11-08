<?php

class Admin_Controllers_PaymentMethod extends Libs_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $obj = new Admin_Models_tblPaymentMethod();
        //hi?n th? ra b?ng pay
        $this->view->listpay = $obj->getAllPay();
        //ð? ra view
        $this->view->render('paymentMethod/index');
    }

    public function loadForm() {
        //l?y id
        $pay_id = $_GET['id'];
        //l?y b?n ghi theo id
        $obj = new Admin_Models_tblPaymentMethod();
        $array = $obj->getPayByID($pay_id);
        //ð? ra view
        $this->view->listpay = $array;
        $this->view->render('paymentMethod/form');
    }

    public function insertPayAction() {
        $obj = new Admin_Models_tblPaymentMethod();

        $obj->setPayName($_POST['pay_name']);
        $obj->setPayImg($_POST['pay_img']);
        $obj->setPayContent($_POST['pay_content']);

        if ($obj->insertPayment($obj)) {
            header("location: paymentMethod.php");
        }
    }

    public function editPayAction() {
        //l?y id
        $pay_id = $_POST['pay_id'];
        $obj = new Admin_Models_tblPaymentMethod();
        //l?y giá tr? ? form
        $obj->setPayName($_POST['pay_name']);
        $obj->setPayImg($_POST['pay_img']);
        $obj->setPayContent($_POST['pay_content']);

        if ($obj->updatePayment($obj, $pay_id)) {
            header('location: paymentMethod.php');
        }
    }

    public function deletePayment() {
        //l?y id
        $pay_id = $_GET['id'];
        $obj = new Admin_Models_tblPaymentMethod();
        if ($obj->deletePayment($pay_id)) {
            //th?c hi?n câu l?nh thành công th? tr? v? trang hi?n th?
            header('location: paymentMethod.php');
        }
    }

}