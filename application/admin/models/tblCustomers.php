<?php
class Admin_Models_tblCustomers extends  Models_tblCustomers{
    public function __construct() {
        parent::__construct();
    }
    public function getSearchCustomers($keyword)
    {
        $listAllCus = array();
        $execute = $this->queryUnit->getSelect('tbl_Customers',"email LIKE '%$keyword%' ");
        if (mysql_num_rows($execute) > 0) {
            while ($row = mysql_fetch_assoc($execute)) {
                $cus = $this->setCustomerValue($row);
                $listAllCus[] = $cus;
            }
        }
        return $listAllCus;
    }    
    public function getAllCustomer(){
         $listAllCus= array();
         $execute= $this->queryUnit->getSelect('tbl_Customers');
         if(mysql_num_rows($execute)>0){
             while ($row= mysql_fetch_assoc($execute)){
                 $listAllCus[]=$this->setCustomerValue($row,true);
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
}