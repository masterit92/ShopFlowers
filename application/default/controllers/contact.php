<?php

class Default_Controllers_Contact extends Libs_Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $this->view->render('contact/index');
    }
    public function insertAction(){
        
    }
    
}

?>
