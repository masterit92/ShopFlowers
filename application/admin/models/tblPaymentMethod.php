<?php
class Admin_Models_tblPaymentMethod extends Libs_Model{
    
    private $libQuery;
    public function __construct() {
        parent::__construct();
        $this->libQuery = new Libs_QueryUnit();
    }
    
    private $pay_id;
    private $pay_name;
    private $pay_img;
    private $pay_content;
    
    public function setPayId($pay_id) {
        $this->pay_id = $pay_id;
    }
    public function getPayID(){
        return $this->pay_id;
    }
    
    public function setPayName($pay_name){
        $this->pay_name = $pay_name;
    }
    public function getPayName(){
        return $this->pay_name;
    }
    
    public function setPayImg($pay_img){
        $this->pay_img = $pay_img;
    }
    public function getPayImg(){
        return $this->pay_img;
    }
    
    public function setPayContent($pay_content){
        $this->pay_content = $pay_content;
    }
    public function getsetPayContent(){
        return $this->pay_content;
    }

    public function getAllPay(){
        $obj = $this->libQuery->getSelect('tbl_payment_method');
        if(mysql_num_rows($obj) > 0){
            while ($row = mysql_fetch_assoc($obj)) {
                $listPay[] = $row;
            }
        }
        return $listPay;
    }
    public function getColumnAndValue(Admin_Models_tblPaymentMethod $payment, $isKey = false) {
        $arr_payment = array();
        if ($isKey) {
            $arr_payment['pay_id'] = $payment->getPayID();
        }
        $arr_payment['pay_name'] = $payment->getPayName();
        $arr_payment['pay_img'] = $payment->getPayImg();
        $arr_payment['pay_content'] = $payment->getsetPayContent();
        return $arr_payment;
    }
    public function getPayByID($pay_id){
        $obj = $this->libQuery->getSelect('tbl_payment_method', "pay_id='$pay_id'");
        if(mysql_num_rows($obj) > 0){
            while ($row = mysql_fetch_assoc($obj)) {
                $array[] = $row;
            }
        }
        return $array;
    }

    public function insertPayment(Admin_Models_tblPaymentMethod $pay){
        $obj = $this->libQuery->getInsert('tbl_payment_method', $this->getColumnAndValue($pay));
        if($obj){
            return TRUE;
        }
        return FALSE;
    }
    public function updatePayment(Admin_Models_tblPaymentMethod $pay, $pay_id){
        $obj = $this->libQuery->getUpdate('tbl_payment_method', $this->getColumnAndValue($pay), "pay_id='$pay_id'");
        if ($obj) {
            return TRUE;
        }
        return FALSE;
    }
    public function deletePayment($pay_id){
        $obj = $this->libQuery->getDelete('tbl_payment_method', "pay_id='$pay_id'");
        if($obj){
            return TRUE;
        }
        return FALSE;
    }
}