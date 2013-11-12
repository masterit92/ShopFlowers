<?php
class Default_Models_tblProducts extends Models_tblProduct{
    public function __construct() {
        parent::__construct();
    }
    public function getListProNew(){
        $listPro = array();
        $execute = $this->queryUnit->getSelect('tbl_products',null,' post_date DESC limit 0,8');
        if (mysql_num_rows($execute) > 0) {
            while ($row = mysql_fetch_assoc($execute)) {
                $listPro[] = $this->setCustomerValue($row);
            }
        }
        return $listPro;
    }
    public function getProRelated($cat_id,$price,$proID){
        $listPro = array();
        $execute = $this->queryUnit->getSelect('tbl_products',"cat_id='".$cat_id."' AND `pro_id`<> $proID AND price <($price+5) AND price >($price-5) limit 0,4");
        if (mysql_num_rows($execute) > 0) {
            while ($row = mysql_fetch_assoc($execute)) {
                $listPro[] = $this->setCustomerValue($row);
            }
        }
        return $listPro;
    }
}
?>
