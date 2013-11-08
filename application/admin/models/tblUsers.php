<?php
class Admin_Models_tblUsers extends Libs_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->queryUnit = new Libs_QueryUnit();
    }

    private $user_id;
    private $email;
    private $password;
    private $phone;
    private $full_name;

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $full_name
     */
    public function setFullName($full_name)
    {
        $this->full_name = $full_name;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->full_name;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = intval($phone);
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
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

    private function setUserValues($row)
    {
        $admin = new Admin_Models_tblUsers();
        $admin->setUserId($row['user_id']);
        $admin->setEmail($row['email']);
        $admin->setPassword($row['password']);
        $admin->setFullName($row['full_name']);
        $admin->setPhone($row['phone']);
        return $admin;
    }

    private function getColumnAndValue(Admin_Models_tblUsers $user, $isKey = false)
    {
        $arr_data= array();
        if ($isKey) {
            $arr_data['user_id']=$user->getUserId();
        }
        $arr_data['email']=$user->getEmail();
        $arr_data['password']=$user->getPassword();
        $arr_data['full_name']=$user->getFullName();
        $arr_data['phone']=$user->getPhone();
        return $arr_data;
    }

    public function checkLogin($email, $password)
    {
        $admin = null;
        if (!empty($email) && !empty($password)) {
            $execute = $this->queryUnit->getSelect("tbl_users", "email='$email' and password='$password'");
            if (mysql_num_rows($execute) > 0) {
                while ($row = mysql_fetch_assoc($execute)) {
                    $admin = $this->setUserValues($row);
                }
            }
        }
        return $admin;
    }

    public function getSearchUsers($keyword)
    {
        $listAdmin = array();
        $execute = $this->queryUnit->getSelect('tbl_users',"email='$keyword' OR full_name='$keyword' ");
        if (mysql_num_rows($execute) > 0) {
            while ($row = mysql_fetch_assoc($execute)) {
                $admin = $this->setUserValues($row);
                $listAdmin[] = $admin;
            }
        }
        return $listAdmin;
    }

    public function getAllUsers()
    {
        $listAdmin = array();
        $execute = $this->queryUnit->getSelect('tbl_users');
        if (mysql_num_rows($execute) > 0) {
            while ($row = mysql_fetch_assoc($execute)) {
                $admin = $this->setUserValues($row);
                $listAdmin[] = $admin;
            }
        }
        return $listAdmin;
    }

    public function getUserByID($user_id)
    {
        $admin = null;
        //if (!empty($email) && !empty($password)) {
            $execute = $this->queryUnit->getSelect("tbl_users", "user_id='$user_id'");
            if (mysql_num_rows($execute) > 0) {
                while ($row = mysql_fetch_assoc($execute)) {
                    $admin = $this->setUserValues($row);
                }
            }
        //}
        return $admin;
    }
    public function getUserByEmail($email)
    {
        $admin = null;
            $execute = $this->queryUnit->getSelect("tbl_users", "email='$email'");
            if (mysql_num_rows($execute) > 0) {
                while ($row = mysql_fetch_assoc($execute)) {
                    $admin = $this->setUserValues($row);
                }
            }
        return $admin;
    }

    public function insertUser(Admin_Models_tblUsers $user)
    {
        $execute=$this->queryUnit->getInsert('tbl_users', $this->getColumnAndValue($user));
        if($execute){
            return true;
        }
        return false;
    }

    public function updateUser(Admin_Models_tblUsers $user, $user_id)
    {
        $execute=$this->queryUnit->getUpdate('tbl_users', $this->getColumnAndValue($user),"user_id='$user_id'");
        if($execute){
            return true;
        }
        return false;
    }

    public function deleteUser($user_id)
    {
        $execute= $this->queryUnit->getDelete('tbl_users',"user_id='$user_id'");
        if($execute){
            return true;
        }
        return false;
    }
}