<?php

class Default_Models_tblBuyingTip extends Models_tblBuyingTip{
    private $libQuery;

    public function __construct() {
        parent::__construct();
        $this->libQuery = new Libs_QueryUnit();
    }
}

?>
