<?php
class Admin_Models_tblSales extends  Models_tblSales{
    public function __construct() {
        parent::__construct();
    }

    public function getDateEndSale($date_end){

    }
    public function insertSale(Admin_Models_tblSales $sale){
        $execute=$this->queryUnit->getInsert('tbl_sales', $this->getColumnAndValue($sale));
        if($execute){
            return true;
        }
        return false;
    }
    public function updateSale(Admin_Models_tblSales $sale, $sale_id){
        $execute=$this->queryUnit->getUpdate('tbl_sales', $this->getColumnAndValue($sale),"sale_id='$sale_id'");
        if($execute){
            return true;
        }
        return false;
    }
    public function deleteSale($sale_id){
        $execute= $this->queryUnit->getDelete('tbl_sales',"sale_id='$sale_id'");
        if($execute){
            return true;
        }
        return false;
    }
}