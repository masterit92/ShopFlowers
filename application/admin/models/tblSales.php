<?php
class Admin_Models_tblSales extends  Models_tblSales{

    public function getAllSale(){
        $listSale = array();
        $execute = $this->queryUnit->getSelect('tbl_sales');
        if (mysql_num_rows($execute) > 0) {
            while ($row = mysql_fetch_assoc($execute)) {
                $sale = $this->setSaleValues($row);
                $listSale[] = $sale;
            }
        }
        return $listSale;
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