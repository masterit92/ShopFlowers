<?php
class Default_Controllers_Customers extends Libs_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $flag= FALSE;
        if(isset($_POST["btnLogin"])){
            $email= $_POST['txtUser'];
            $pass= $_POST["txtPass"];
            $model= new Default_Models_tblCustomers();
            if($model->checkLogin($email, $pass)){
                
            }
        }
        $this->view->render('customers/index');
    }
}
?>
