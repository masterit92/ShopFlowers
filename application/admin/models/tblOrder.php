<?php

class Admin_Models_tblOrder extends Models_tblOrder {

    public function getAllOrder() {
        
    }

    public function getOrderByStatus($status) {
        
    }

    public function updateStatusOrder($order_id) {
        
    }

    public function deleteOrder($order_id) {
        
    }

    /**
     * @description get bill
     * 
     * @author ThaiNV 
     * @since 09/11/2013
     */
    public function getBill(&$aryBill) {
        try {
            $sql = "SELECT O.*,D.*
               FROM tbl_orders AS O
               INNER JOIN tbl_order_details AS D
               ON O.order_id = D.order_id
               ";
            $_queryUnit = new Libs_QueryUnit();
            $rs = $_queryUnit->executeQuery($sql, $lastId);
            $aryBill = $_queryUnit->fetchAll($rs);
            $intIsOk = 1;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            $intIsOk = -1;
        }
        return $intIsOk;
    }

    public function updateStatus($aryId) {
        try {
            $sql = "UPDATE tbl_orders SET status = 1
                WHERE order_id IN($aryId)";
            $_queryUnit = new Libs_QueryUnit();
            $_queryUnit->executeQuery($sql);
            $intIsOk = 1;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            $intIsOk = -1;
        }
        return $intIsOk;
    }

}