<?php

class Admin_Models_tblProduct extends  Models_tblProduct{
    public function __construct() {
        parent::__construct();
    }
    public function insertProduct(Admin_Models_tblProduct $pro){
        $execute= $this->queryUnit->getInsert('tbl_products', $this->getColumnAndValue($pro));
        if($execute){
            return TRUE;
        }
        return FALSE;
    }
    public function updateProduct(Admin_Models_tblProduct $pro){
        $execute= $this->queryUnit->getUpdate('tbl_products', $this->getColumnAndValue($pro, TRUE), " pro_id='".$pro->getProId()."'");
        if($execute){
            return TRUE;
        }
        return FALSE;
    }
    public function deleteProduct($pro_id){
        $exxcute= $this->queryUnit->getDelete('tbl_products', "pro_id= '$pro_id'");
        if($exxcute){
            return TRUE;
        }
        return FALSE;
    }
    public function delListPro($listID){
        $condition = 'pro_id IN (' . $listID . ')';
        $exxcute= $this->queryUnit->getDelete('tbl_products', $condition);
        if($exxcute){
            return TRUE;
        }
        return FALSE;
    }
}