<?php

class Default_Models_tblService extends Models_tblService{
    private $libQuery;

    public function __construct() {
        parent::__construct();
        $this->libQuery = new Libs_QueryUnit();
    }
}

?>
