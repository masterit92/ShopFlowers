<?php

class Admin_Models_tblAbout extends Libs_Model {

    private $libQuery;

    public function __construct() {
        parent::__construct();
        $this->libQuery = new Libs_QueryUnit();
    }

    private $about_id;
    private $title;
    private $content;

    /**
     * @param mixed $about_id
     */
    public function setAboutId($about_id) {
        $this->about_id = $about_id;
    }

    /**
     * @return mixed
     */
    public function getAboutId() {
        return $this->about_id;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content) {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getContent() {
        return $this->content;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * 
     * @param type $row
     */

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