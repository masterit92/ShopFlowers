<?php

class Default_Controllers_BuyingTip  extends Libs_Controller{
   public function __construct() {
        parent::__construct();
    }
    public function index(){
        $this->view->render('buyingtip/index');
    }
}

?>
