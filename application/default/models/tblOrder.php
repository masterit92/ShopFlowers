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
    public function saveOrder($aryReceived, $payId) {
        //reBuild data
        $aryDataInsert = array(
            'cus_id' => 1,
            'pay_id' => $payId,
            'order_date' => date('Y-m-d H:i:s'),
//            'delivery_date' => date('Y-m-d H:i:s'),
            'requirement' => 1,
            'name_recipient' => $aryReceived['name'],
            'address_recipient' => $aryReceived['adress'],
            'email_recipient' => $aryReceived['email'],
            'phone_recipient' => $aryReceived['phone'],
        );
        $this->_queryUnit->getInsert('tbl_orders', $aryDataInsert);
    }

}