<?php
class Admin_Models_tblRoles extends Libs_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->queryUnit = new Libs_QueryUnit();
    }

    private $role_id;
    private $name;
    private $content;

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
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

    public function setRoleValues($row)
    {
        $role = new Admin_Models_tblRoles();
        $role->setRoleId($row['role_id']);
        $role->setName($row['name']);
        $role->setContent($row['content']);

        return $role;
    }

    public function getColumnAndValue(Admin_Models_tblRoles $role, $isKey = false)
    {
        $arr_data= array();
        if ($isKey) {
            $arr_data['role_id']=$role->getRoleId();
        }
        $arr_data['name']=$role->getName();
        $arr_data['content']=$role->getContent();

        return $arr_data;
    }

    public function getAllRole(){
        $listRole = array();
        $execute = $this->queryUnit->getSelect('tbl_roles');
        if (mysql_num_rows($execute) > 0) {
            while ($row = mysql_fetch_assoc($execute)) {
                $role = $this->setRoleValues($row);
                $listRole[] = $role;
            }
        }
        return $listRole;
    }

    public function getRoleByID($role_id)
    {

    }

    public function insertRole(Admin_Models_tblRoles $role)
    {

    }

    public function updateRole(Admin_Models_tblRoles $role)
    {

    }

    public function deleteRole($role_id)
    {

    }
}