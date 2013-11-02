<?php
class Default_Models_tblAbout extends Models_tblAbout{
    private $libQuery;

    public function __construct() {
        parent::__construct();
        $this->libQuery = new Libs_QueryUnit();
    }
    /**
     * @return du lieu tu bang tbl_about
     */
    public function getAbout(){
        $obj = $this->libQuery->getSelect('tbl_about');
        //chuyen du lieu tu kieu obj sang array
        if(mysql_num_rows($obj) > 0){
            while ($row = mysql_fetch_assoc($obj)) {
                $arrAbout[] = $row;
            }
        }
        return $arrAbout;
    }
}