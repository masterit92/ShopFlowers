<?php
class Admin_Models_tblPaymentMethod extends  Models_tblPaymentMethod{
    
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

    public function getALLPayment(){
        $obj = $this->libQuery->getSelect('tbl_payment_method');
        if(mysql_num_rows($obj) > 0){
            while ($row = mysql_fetch_assoc($obj)) {
                $listPay[] = $row;
            }
        }
        return $listPay;
    }

    public function insertPayment(Admin_Models_tblPaymentMethod $pay){

    }
    public function updatePayment(Admin_Models_tblPaymentMethod $pay){

    }
    public function deletePayment(Admin_Models_tblPaymentMethod $pay){

    }
}