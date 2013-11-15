<?php

include '../models/tblOrder.php';

class Admin_Controllers_Shoppingcart extends Libs_Controller {

    protected $_logic;

    public function __construct() {
        parent::__construct();
        $this->_logic = new Admin_Models_tblOrder();
    }

    public function index() {
        $aryBill = $this->getOrder();
        $this->view->aryData = $aryBill;
//        echo '<pre>';var_dump($aryBill);die;
        $this->view->render('shoppingcart/index');
    }

    public function getOrder() {
        $aryBill = array();
        $intIsOk = $this->_logic->getBill($aryBill);
        if ($intIsOk == 1) {
            return $aryBill;
        }
    }

    public function changeStatus() {
        $aryId = $_POST['aryId'];
        $intIsOk = $this->_logic->updateStatus($aryId);
        echo json_encode(array('intIsOk' => $intIsOk));
        exit();
    }

}