<?php
class Admin_Models_tblCategories extends Models_tblCategories
{
    public function __construct()
    {
        parent::__construct();
        $this->queryUnit = new Libs_QueryUnit();
    }   
    public function insertCat(Admin_Models_tblCategories $cat)
    {
        $execute=$this->queryUnit->getInsert('tbl_categories', $this->getColumnAndValue($cat));
        if($execute){
            return true;
        }
        return false;
    }

    public function updateCat(Admin_Models_tblCategories $cat, $cat_id)
    {
        $execute=$this->queryUnit->getUpdate('tbl_categories', $this->getColumnAndValue($cat),"cat_id='$cat_id'");
        if($execute){
            return true;
        }
        return false;
    }

    public function deleteCategory($cat_id){
        $execute= $this->queryUnit->getDelete('tbl_categories',"cat_id='$cat_id'");
        if($execute){
            return true;
        }
        return false;
    }
}