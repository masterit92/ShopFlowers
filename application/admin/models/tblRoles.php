<?php
class Admin_Models_tblRoles extends Libs_Model
{
    public function __construct()
    {
        parent::__construct();
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

    public function getAllRole()
    {

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