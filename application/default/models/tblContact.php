<?php

class Default_Models_tblContact extends Models_tblContact {

    private $libQuery;

    public function __construct() {
        parent::__construct();
        $this->libQuery = new Libs_QueryUnit();
    }

    public function getColumnAndValue(Default_Models_tblContact $con, $isKey = FALSE) {
        $arr_con = array();
        if ($isKey) {
            $arr_con['con_id'] = $con->getConId();
        }
        $arr_con['full_name'] = $con->getFullName();
        $arr_con['email'] = $con->getEmail();
        $arr_con['content'] = $con->getContent();
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
