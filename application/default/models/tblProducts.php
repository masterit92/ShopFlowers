<?php

class Default_Models_tblProducts extends Models_tblProduct {

    public function __construct() {
        parent::__construct();
    }

    public function getListProNew() {
        $listPro = array();
        $execute = $this->queryUnit->getSelect('tbl_products', null, ' post_date DESC limit 0,6');
        if (mysql_num_rows($execute) > 0) {
            while ($row = mysql_fetch_assoc($execute)) {
                $listPro[] = $this->setCustomerValue($row);
            }
        }
        return $listPro;
    }

    public function getProRelated($cat_id, $price, $proID) {
        $listPro = array();
        $execute = $this->queryUnit->getSelect('tbl_products', "cat_id='" . $cat_id . "' AND `pro_id`<> $proID AND price <($price+5) AND price >($price-5) limit 0,3");
        if (mysql_num_rows($execute) > 0) {
            while ($row = mysql_fetch_assoc($execute)) {
                $listPro[] = $this->setCustomerValue($row);
            }
        }
        return $listPro;
    }

    /**
     * @description get product for cart
     * 
     * @author ThaiNV
     * @since 09/11/2013
     * @param type $aryProduct
     * @param type $strId
     * @return type 
     */
    public function getProducts(&$aryProduct, $strId) {
        try {
            $sql = "SELECT * FROM tbl_products WHERE pro_id IN ( $strId )";
            $res = $this->queryUnit->executeQuery($sql);
            $aryProduct = $this->queryUnit->fetchAll($res);
            $intIsOk = 1;
        } catch (Exception $e) {
            echo $e->getMessage();
            $intIsOk = -1;
        }
        return $intIsOk;
    }
    public function getProBestSellers(){
        $listPro=array();
        $sql= "SELECT * FROM tbl_products  inner join tbl_order_details  on tbl_products.pro_id=tbl_order_details.pro_id order by quantity DESC limit 0,3";
        $result= $this->queryUnit->executeQuery($sql);
        if(mysql_num_rows($result)>0){
            while ($row= mysql_fetch_assoc($result)){
                $listPro[]= $this->setCustomerValue($row);
            }
        }
        return $listPro;
    }

}

?>
