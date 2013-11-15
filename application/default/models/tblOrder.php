<?php

class Default_Models_tblOrder extends Models_tblOrder {

    protected $_queryUnit;

    function __construct() {
        parent::__construct();
        $this->_queryUnit = new Libs_QueryUnit();
    }

    /**
     * @desc save order info
     * 
     * @author ThaiNV
     * @since 14/11/2013
     */
    public function saveOrder($aryReceived, $payId, $cusEmail = null) {
        //reBuild data
        $lastId = '';
        if ($cusEmail != null) {
            $cusInfo = $this->checkExistCustom($cusEmail);
        }
        if (!empty($cusInfo)) {
            $cusId = $cusInfo['cus_id'];
        } else {
            $cusId = 1;
        }
        $aryDataInsert = array(
            'cus_id' => $cusId,
            'pay_id' => $payId,
            'order_date' => date('Y-m-d H:i:s'),
            'delivery_date' => date('Y-m-d H:i:s', strtotime($aryReceived['date'])),
            'requirement' => $aryReceived['requirement'],
            'name_recipient' => $aryReceived['name'],
            'address_recipient' => $aryReceived['adress'],
            'email_recipient' => $aryReceived['email'],
            'phone_recipient' => $aryReceived['phone'],
        );
        $this->_queryUnit->getInsert('tbl_orders', $aryDataInsert, $lastId);
        return $lastId;
    }

    /**
     * @desc check existing of customer
     * 
     * @author ThaiNV
     * @since 14/11/2013
     */
    public function checkExistCustom($email) {
        if (isset($email)) {
            $condition = 'email = ' . '"' . $email . '"';
            $res = $this->_queryUnit->getSelect('tbl_customers', $condition);
            $cusInfo = $this->_queryUnit->fetchOne($res);
        }
        return $cusInfo;
    }

}