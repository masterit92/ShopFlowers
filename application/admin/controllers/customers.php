<?php
@session_start();
class Admin_Controllers_Customers extends Libs_Controller
{
    public function index(){
        $model= new Admin_Models_tblCustomers();

        $keyword = trim($_GET['keyword']);
        if(empty($keyword)){
            $this->view->listAllCus = $model->getAllCustomer();
        }else{
            $this->view->listAllCus = $model->getSearchCustomers($keyword);
        }

        $this->view->keyword = $keyword;
        $this->view->render('customer/index');
    }
    
    public function postDelete(){
    	$cusId = $_GET['id'];

		$model= new Admin_Models_tblUsers();
        $model->deleteUser($cusId);	

        header("location:index");
    }


}