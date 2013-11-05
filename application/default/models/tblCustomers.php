<?php
class Default_Models_tblCustomers extends  Models_tblCustomers{
     public function __construct() {
        parent::__construct();
        $this->queryUnit= new Libs_QueryUnit();
    }
    private $queryUnit;

    public function insertCustomer(Default_Models_tblCustomers $cus){
        $execute= $this->queryUnit->getInsert('tbl_customers', $this->getColumnAndValue($cus));
        if($execute){
            return TRUE;
        }
        return FALSE;
    }
    public function updateCustomer(Default_Models_tblCustomers $cus){
        $execute= $this->queryUnit->getUpdate('tbl_customers', $this->getColumnAndValue($cus, True), "cus_id='".$cus->getCusId()."'");
        if($execute){
            return TRUE;
        }
        return FALSE;
    }
    public function checkLogin($email, $pass){
        $cus= null;
        if(!empty($email) && !empty($pass)){
            $execute= $this->queryUnit->getSelect('tbl_customers', "email='$email' and password='$pass'");
            if(mysql_num_rows($execute)>0){
                $row= mysql_fetch_assoc($execute);
                $this->setCustomerValue($row);
            }
        }
        return $cus;
    }
}