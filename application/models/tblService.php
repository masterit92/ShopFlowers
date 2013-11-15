<?php

class Models_tblService extends Libs_Model{
    public function __construct() {
        parent::__construct();
        $this->queryUnit = new Libs_QueryUnit;
    }
    
    
}

?>
