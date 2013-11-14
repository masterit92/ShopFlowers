<?php

class Admin_Models_tblContact extends Models_tblContact {

    private $libQuery;

    public function __construct() {
        parent::__construct();
        $this->libQuery = new Libs_QueryUnit();
    }

    public function getAllContact() {
        $execute = $this->libQuery->getSelect('tbl_contact');
        if (mysql_num_rows($execute) > 0) {
            while ($row = mysql_fetch_assoc($execute)) {
                $listCon[] = $row;
            }
        }
        return $listCon;
    }

    public function deleteContact($contact_id) {
        $execute = $this->libQuery->getDelete('tbl_contact', "con_id='$contact_id'");
        if ($execute) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}