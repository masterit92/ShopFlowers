<?php

class Admin_Controllers_PaymentMethod extends Libs_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $obj = new Admin_Models_tblPaymentMethod();
        //hiển thị ra bảng pay
        $this->view->listpay = $obj->getAllPay();
        //đổ ra view
        $this->view->render('paymentMethod/index');
    }

    public function loadForm() {
        //lấy id
        $pay_id = $_GET['id'];
        //lấy bản ghi theo id
        $obj = new Admin_Models_tblPaymentMethod();
        $array = $obj->getPayByID($pay_id);
        //đổ ra view
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
        //lấy id
        $pay_id = $_POST['pay_id'];
        $obj = new Admin_Models_tblPaymentMethod();
        //lấy giá trị ở form
        $obj->setPayName($_POST['pay_name']);
        $obj->setPayImg($_POST['pay_img']);
        $obj->setPayContent($_POST['pay_content']);

        if ($obj->updatePayment($obj, $pay_id)) {
            header('location: paymentMethod.php');
        }
    }

    public function deletePayment() {
        //lấy id
        $pay_id = $_GET['id'];
        $obj = new Admin_Models_tblPaymentMethod();
        if ($obj->deletePayment($pay_id)) {
            //thực hiện câu lệnh thành công thì trở về trang hiển thị
            header('location: paymentMethod.php');
        }
    }

}