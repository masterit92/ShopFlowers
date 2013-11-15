<?php

class Default_Models_tblContact extends Models_tblContact {

    private $libQuery;

    public function __construct() {
        parent::__construct();
        $this->libQuery = new Libs_QueryUnit();
    }

    public function getColumnAndValue(Default_Models_tblContact $con) {
        $arr_con = array();
       
        $arr_con['full_name'] = $con->getFullName();
        $arr_con['email'] = $con->getEmail();
        $arr_con['title'] = $con->getTitle();
        $arr_con['content'] = $con->getContent();
        return $arr_con;
        var_dump($arr_con);die;
    }

    public function insertAction(Default_Models_tblContact $con) {
        $execute = $this->libQuery->getInsert('tbl_contact', $this->getColumnAndValue($con));
        if ($execute) {
            return TRUE;
        }
        return FALSE;
    }

}

?>
