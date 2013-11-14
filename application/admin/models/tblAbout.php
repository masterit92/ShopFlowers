<?php

class Admin_Models_tblAbout extends Models_tblAbout{

    private $libQuery;

    public function __construct() {
        parent::__construct();
        $this->libQuery = new Libs_QueryUnit();
    }

    public function getColumnAndValue(Admin_Models_tblAbout $about, $isKey = false) {
        $arr_about = array();
        if ($isKey) {
            $arr_about['about_id'] = $about->getAboutId();
        }
        $arr_about['title'] = $about->getTitle();
        $arr_about['content'] = $about->getContent();
        return $arr_about;
    }

    public function getAllAbout() {
        $execute = $this->libQuery->getSelect('tbl_about');
        if (mysql_num_rows($execute) > 0) {
            while ($row = mysql_fetch_assoc($execute)) {
                $listAbout[] = $row;
            }
        }
        return $listAbout;
    }

    public function getAboutByID($about_id) {
        $execute = $this->libQuery->getSelect("tbl_about", "about_id='$about_id'");
        if (mysql_num_rows($execute) > 0) {
            while ($row = mysql_fetch_assoc($execute)) {
                $array[] = $row;
            }
        }
        return $array;
    }

    public function insertAbout(Admin_Models_tblAbout $about) {
        $execute = $this->libQuery->getInsert('tbl_about', $this->getColumnAndValue($about));
        if ($execute) {
            return true;
        }
        return false;
    }

    public function updateAbout(Admin_Models_tblAbout $about, $about_id) {
        $execute = $this->libQuery->getUpdate('tbl_about', $this->getColumnAndValue($about), "about_id='$about_id'");
        if ($execute) {
            return true;
        }
        return false;
    }

    public function deleteAbout($about_id) {
        $execute = $this->libQuery->getDelete('tbl_about', "about_id='$about_id'");
        if ($execute) {
            return true;
        }
        return false;
    }

}