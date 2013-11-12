<?php
@session_start();
class Admin_Controllers_User extends Libs_Controller
{
    public function index(){
        $model= new Admin_Models_tblUsers();

        $keyword = trim($_GET['keyword']);
        if(empty($keyword)){
            $this->view->listAllUser = $model->getAllUsers();
        }else{
            $this->view->listAllUser = $model->getSearchUsers($keyword);
        }

        $this->view->keyword = $keyword;
        $this->view->render('user/index');
    }

    public function getCreate(){
        $this->view->create = true;
        $roleModel = new Admin_Models_tblRoles();
        $this->view->roles = $roleModel->getAllRole();
        $this->view->render('user/form');
    }
    public function getEdit($user_id){
        $user_id = $_GET['id'];

        $roleModel = new Admin_Models_tblRoles();
        $this->view->roles = $roleModel->getAllRole();

        $roleUserModel = new Admin_Models_tblRoleUser();
        $this->view->rolesUserID = $roleUserModel->getAllRoleByID($user_id);

        $model= new Admin_Models_tblUsers();
        $this->view->users = $model->getUserByID($user_id);
        $this->view->render('user/form');
    }
    public function postCreate(){
        $user = new Admin_Models_tblUsers();

        $email = $_POST['email'];
        if($user->getUserByEmail($email) ){
            $this->view->msg = "Sorry, the email $email is taken.";
            $this->view->create = true;
            $roleModel = new Admin_Models_tblRoles();
            $this->view->roles = $roleModel->getAllRole();
            $this->view->render('user/form');
        }else{
            $user->setFullName($_POST['fullname']);
            $user->setEmail($_POST['email']);
            $user->setPhone($_POST['phone']);
            $user->setPassword( md5($_POST['pwd']) );        
            $user->insertUser($user);
            $user=$user->getUserByEmail($user->getEmail());

            $roleUserModel = new Admin_Models_tblRoleUser();
            foreach ($_POST['roleUser'] as $key => $value) {
                $roleUserModel->setRoleId($value);
                $roleUserModel->setUserId($user->getUserID());
                $roleUserModel->insertRoleUser($roleUserModel);            
            }        

            header("location:user/index");
        }
    }

    public function postEdit(){
        $userId = $_POST['userId'];
        $user = new Admin_Models_tblUsers();

        $user->setEmail($_POST['email']);
        $user->setFullName($_POST['fullname']);
        $user->setPhone($_POST['phone']); 

        if( empty($_POST['password']) ) {
            $user->setPassword( md5($_POST['pwd']) ); 
        }else{
            $user->setPassword( md5($_POST['password']) ); 
        }
         
        $roleUserModel = new Admin_Models_tblRoleUser();
        $roleUserModel->deleteRoleUser($userId);

        foreach ($_POST['roleUser'] as $key => $value) {
            $roleUserModel->setRoleId($value);
            $roleUserModel->setUserId($userId);
            $roleUserModel->insertRoleUser($roleUserModel);            
        }        

        $user->updateUser($user,$userId);   
        header("location:user/index"); 
    }
    public function postDelete(){
        $userId = $_GET['id'];

        $roleUserModel = new Admin_Models_tblRoleUser();
        $roleUserModel->deleteRoleUser($userId);

        $model= new Admin_Models_tblUsers();
        $model->deleteUser($userId);    

        header("location:user/index");
    }


}