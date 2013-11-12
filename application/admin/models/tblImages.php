<?php
class Admin_Models_tblImages extends Models_tblImages {

    public function __construct() {
        parent::__construct();
    }

    public function insertImg(Admin_Models_tblImages $img) {
        $execute = $this->queryUnit->getInsert('tbl_images', $this->getColumnAndValue($img));
        if ($execute) {
            return TRUE;
        }
        return FALSE;
    }

    public function updateImg(Admin_Models_tblImages $img) {
        $execute = $this->queryUnit->getUpdate('tbl_images', $this->getColumnAndValue($img, TRUE), "img_id='" . $img->getImgId() . "'");
        if ($execute) {
            return TRUE;
        }
        return FALSE;
    }

    public function deleteImg($img_id) {
        $execute = $this->queryUnit->getDelete('tbl_images', "img_id='" . $img_id . "'");
        if ($execute) {
            return TRUE;
        }
        return FALSE;
    }

    public function getImgByID($img_id) {
        $img = null;
        $execute = $this->queryUnit->getSelect('tbl_images', " img_id= '$img_id'");
        if (mysql_num_rows($execute) > 0) {
            $row = mysql_fetch_assoc($execute);
            $img= $this->setCustomerValue($row);
        }
        return $img;
    }
    public function delListImg($listID){
        $condition = 'img_id IN (' . $listID . ')';
        $exxcute= $this->queryUnit->getDelete('tbl_images', $condition);
        if($exxcute){
            return TRUE;
        }
        return FALSE;
    }
    public function numImgByProID($pro_id){
        $execute= $this->queryUnit->executeQuery("SELECT COUNT(*) as total FROM `tbl_images` WHERE `pro_id`=".$pro_id);
        $numImg= mysql_fetch_assoc($execute);
        return  $numImg['total'];
    }

}