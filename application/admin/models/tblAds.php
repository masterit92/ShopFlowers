<?php
class Admin_Models_tblAds extends  Models_tblAds{

    public function __construct()
    {
        parent::__construct();
        $this->queryUnit = new Libs_QueryUnit();
    }	
    	
    public function insertAds(Admin_Models_tblAds $ads){
        $execute=$this->queryUnit->getInsert('tbl_ads', $this->getColumnAndValue($ads));
        if($execute){
            return true;
        }
        return false;
    }
    public function updateAds(Admin_Models_tblAds $ads){
        $execute=$this->queryUnit->getUpdate('tbl_ads', $this->getColumnAndValue($ads),"ads_id='$ads_id'");
        if($execute){
            return true;
        }
        return false;
    }
    public function deleteAds($ads_id){
        $execute= $this->queryUnit->getDelete('tbl_ads',"ads_id='$ads_id'");
        if($execute){
            return true;
        }
        return false;
    }
}