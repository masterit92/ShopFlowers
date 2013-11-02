<?php
class Admin_Controllers_PaymentMethod extends Libs_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $this->getPayment();
        $this->view->render('paymentMethod/index') ;
    }
    public function getPayment(){
        $obj = new Admin_Models_tblPaymentMethod();
        $listPay = $obj->getALLPayment();
        $this->view->listPay = $listPay;
    }
}