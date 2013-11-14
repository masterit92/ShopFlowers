<?php

class Default_Models_tblPaymentMethod extends Models_tblPaymentMethod {

    private $libQuery;

    public function __construct() {
        parent::__construct();
        $this->libQuery = new Libs_QueryUnit();
    }

    public function getAllPayment() {
        $obj = $this->libQuery->getSelect('tbl_payment_method');
        if (mysql_num_rows($obj) > 0) {
            while ($row = mysql_fetch_assoc($obj)) {
                $arrPayment[] = $row;
            }
        }
        return $arrPayment;
    }

}