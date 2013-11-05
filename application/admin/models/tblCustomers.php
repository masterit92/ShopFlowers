<?php
class Admin_Models_tblCustomers extends  Models_tblCustomers{
    private $queryUnit;
    public function __construct() {
        parent::__construct();
        $this->queryUnit= new Libs_QueryUnit();
    }
    public function getAllCustomer(){
         $listAllCus= array();
         $execute= $this->queryUnit->getSelect('tbl_Customers');
         if(mysql_num_rows($execute)>0){
             while ($row= mysql_fetch_assoc($execute)){
                 $listAllCus[]=$this->setCustomerValue($row);
             }
         }
         return $listAllCus;
    }
    public function deleteCustomer($cus_id){
        $execute= $this->queryUnit->getDelete('tbl_customers', "cus_id='$cus_id'");
        if($execute){
            return TRUE;
        }
        return FALSE;
    }
    public function getCustomerByID($cus_id)
    {
        $cus= NULL;
        $execute= $this->queryUnit->getSelect('tbl_customers', "cus_id='$cus_id'");
        if(mysql_num_rows($execute)>0){
            $row= mysql_fetch_assoc($execute);
            $cus= $this->setCustomerValue($row);
        }
        return $cus;
    }
}