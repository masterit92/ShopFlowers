<?php

class Default_Models_tblContact extends Models_tblContact {

    private $libQuery;

    public function __construct() {
        parent::__construct();
        $this->libQuery = new Libs_QueryUnit();
    }

    public function getContactByID($contact_id) {
        $execute = $this->libQuery->getSelect('tbl_contact', "con_id='$contact_id'");
        if (mysql_num_rows($execute) > 0) {
            while ($row = mysql_fetch_assoc($execute)) {
                $listCon[] = $row;
            }
        }
        return $listCon;
    }

    public function getColumnAndValue(Default_Models_tblContact $con, $isKey = FALSE) {
        $arr_con = array();
        if ($isKey) {
            $arr_con['con_id'] = $con->getConId();
        }
        $arr_con['full_name'] = $con->getFullName();
        $arr_con['email'] = $con->getEmail();
        $arr_con['content'] = $con->getContent();
        $arr_con['post_date'] = $con->getPostDate();
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
