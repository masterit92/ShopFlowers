<?php
class Default_Controllers_Index extends Libs_Controller
{
    public function __construct(){
        parent::__construct();
    }
    public function index()
    {
        $this->view->render('index/index');
    }
}