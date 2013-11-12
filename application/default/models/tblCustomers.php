<?php

class Default_Models_tblCustomers extends Models_tblCustomers {

    public function __construct() {
        parent::__construct();
        $this->queryUnit = new Libs_QueryUnit();
    }

    private $queryUnit;

    public function insertCustomer(Default_Models_tblCustomers $cus) {
        $execute = $this->queryUnit->getInsert('tbl_customers', $this->getColumnAndValue($cus));
        if ($execute) {
            return TRUE;
        }
        return FALSE;
    }

    public function updateCustomer(Default_Models_tblCustomers $cus) {
        $execute = $this->queryUnit->getUpdate('tbl_customers', $this->getColumnAndValue($cus, True), "cus_id='" . $cus->getCusId() . "'");
        if ($execute) {
            return TRUE;
        }
        return FALSE;
    }

    public function checkLogin($email, $pass) {
        $cus = null;
        if (!empty($email) && !empty($pass)) {
            $execute = $this->queryUnit->getSelect('tbl_customers', "email='$email' and password='$pass'");
            if (mysql_num_rows($execute) > 0) {
                $row = mysql_fetch_assoc($execute);
                $this->setCustomerValue($row);
            }
        }
        return $cus;
    }

    /**
     * @description save custom info
     * 
     * @author ThaiNV
     * @since 11/11/2013
     */
    public function saveCustomer($aryParams) {
        try {
            $aryDataInsert = array(
                'first_name' => $aryParams['txtCus_firtName'],
                'last_name' => $aryParams['txtCus_lastName'],
                'email' => $aryParams['txtCus_email'],
                'phone' => $aryParams['txtCus_phone'],
                'address' => $aryParams['txtCus_adrres'],
            );
            $this->queryUnit->getInsert('tbl_customers', $aryDataInsert);
            $intIsOk = 1;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            $intIsOk = -1;
        }
        return $intIsOk;
    }

    /**
     * @description build data to save order info
     * 
     * @author ThaiNV
     * @since 11/11/2013
     */
    public function buildDataOrder($aryParams) {
        $this->saveCustomer($aryParams);
        $aryReceived['name'] = ($aryParams['txtRec_name '] == '') ? $aryParams['txtCus_lastName '] . $aryParams['txtCus_firtName'] : $aryParams['txtRec_name'];
        $aryReceived['email'] = ($aryParams['txtRec_email'] == '') ? $aryParams['txtCus_email'] : $aryParams['txtRec_email'];
        $aryReceived['adress'] = ($aryParams['txtRec_adress'] == '') ? $aryParams['txtCus_adrres'] : $aryParams['txtRec_adress'];
        
    }

}