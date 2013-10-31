<?php
class Admin_Models_tblRoleUser extends  Libs_Model{
   public function __construct(){
       parent::__construct();
   }
    private $user_id;
    private $role_id;

    /**
     * @param mixed $role_id
     */
    public function setRoleId($role_id)
    {
        $this->role_id = $role_id;
    }

    /**
     * @return mixed
     */
    public function getRoleId()
    {
        return $this->role_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }
    public function getRoleByUserID($user_id){

    }
    public function getUserIDByRole($role){

    }
    public function insertRoleUser(Admin_Models_tblRoleUser $roleUser){

    }
    public function updateRoleUser(Admin_Models_tblRoleUser $roleUser){

    }
    public function deleteRoleUser($user_id,$role_id){

    }
}