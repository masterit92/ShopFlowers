<?php

class Default_Controllers_PaymentMethod extends Libs_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->getPayment();
        $this->view->render('paymentMethod/index');
    }

    public function getPayment() {
        $obj = new Default_Models_tblPaymentMethod();
        $arrPayment = $obj->getAllPayment();
        $this->view->listPayment = $arrPayment;
    }

}