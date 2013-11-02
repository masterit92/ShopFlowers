<?php
class Default_Models_tblPaymentMethod extends Models_tblPaymentMethod{
    private $libQuery;
    public function __construct() {
        parent::__construct();
        $this->libQuery = new Libs_QueryUnit() ;
    }
    /**
     * 
     * @return du lieu tu bang tbl_payment_method
     */
    public function getPayment(){
        $obj = $this->libQuery->getSelect('tbl_payment_method');
        //chuyen du lieu tu dang obj sang array
        if(mysql_num_rows($obj) > 0){
            while ($row = mysql_fetch_assoc($obj)) {
                $arrPayment[] = $row;
            }
        }
        return $arrPayment;
    }
}