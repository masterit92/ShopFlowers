<?php
class Admin_Models_tblRoleUser extends  Libs_Model{
   public function __construct(){
       parent::__construct();
       $this->queryUnit = new Libs_QueryUnit();
   }
    private $id;
    private $user_id;
    private $role_id;

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

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

    private function setRoleUserValues($row)
    {
        $roleUser = new Admin_Models_tblRoleUser();
        $roleUser->setId($row['id']);
        $roleUser->setUserId($row['user_id']);
        $roleUser->setRoleId($row['role_id']);

        return $roleUser;
    }

    private function getColumnAndValue(Admin_Models_tblRoleUser $roleUser, $isKey = false)
    {
        $arr_data= array();
        if ($isKey) {
            $arr_data['id']=$roleUser->getId();
        }
        $arr_data['user_id']=$roleUser->getUserId();
        $arr_data['role_id']=$roleUser->getRoleId();

        return $arr_data;
    }

    public function getAllRoleByID($user_id)
    {
        $listRole = array();
        $execute = $this->queryUnit->getSelect("tbl_role_user", "user_id='$user_id'");
        if (mysql_num_rows($execute) > 0) {
            while ($row = mysql_fetch_assoc($execute)) {
                $role = $this->setRoleUserValues($row);
                $listRole[] = $role;
            }
        }
        return $listRole;
    }

    public function insertRoleUser(Admin_Models_tblRoleUser $roleUser){
        $execute=$this->queryUnit->getInsert('tbl_role_user', $this->getColumnAndValue($roleUser));
        if($execute){
            return true;
        }
        return false;
    }
    public function updateRoleUser(Admin_Models_tblRoleUser $roleUser,$id){
        $execute=$this->queryUnit->getUpdate('tbl_role_user', $this->getColumnAndValue($roleUser),"id='$id'");
        if($execute){
            return true;
        }
        return false;
    }
    public function deleteRoleUser($user_id){
        $execute= $this->queryUnit->getDelete('tbl_role_user',"user_id='$user_id'");
        if($execute){
            return true;
        }
        return false;
    }
}