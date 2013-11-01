<?php
class Default_Controllers_About extends Libs_Controller
{
    public function __construct(){
        parent::__construct();
    }
    public function index()
    {
        echo 'test';
        $this->view->render('about/index');
    }
}