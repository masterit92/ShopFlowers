<?php

class Default_Models_tblOrderDetails extends Models_tblOrderDetails {

    protected $_queryUnit;

    function __construct() {
        parent::__construct();
        $this->_queryUnit = new Libs_QueryUnit();
    }

    /**
     * @description save order detail
     * 
     * @author ThaiNV 
     * @since 09/11/2013
     */
    public function addOrderDetail($aryQty, $orderId) {
        $valInsert = '';
        foreach ($aryQty as $key => $value) {
            $condition = 'pro_id = ' . $key;
            $sql = "SELECT price FROM tbl_products WHERE " . $condition;
            $res = $this->_queryUnit->executeQuery($sql);
            while ($aryData = $this->_queryUnit->fetchOne($res)) {
                $valInsert .= '(' . $orderId . ',' . $key . ',' . $value . ',' . $aryData['price'] . ')' . ',';
            }
        }
        $valueOrder = rtrim($valInsert, ',');
        $query = 'INSERT INTO tbl_order_details ( order_id, pro_id, quantity, price ) VALUES ' . $valueOrder;
        $this->_queryUnit->executeQuery($query);
    }

}