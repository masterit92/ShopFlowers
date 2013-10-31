<?php
class Models_tblCategories extends  Libs_Model{
   public function __construct(){
       parent::__construct();
   }
    private $cat_id;
    private $name;
    private $parent_id;

    /**
     * @param mixed $cat_id
     */
    public function setCatId($cat_id)
    {
        $this->cat_id = $cat_id;
    }

    /**
     * @return mixed
     */
    public function getCatId()
    {
        return $this->cat_id;
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
     * @param mixed $parent_id
     */
    public function setParentId($parent_id)
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @return mixed
     */
    public function getParentId()
    {
        return $this->parent_id;
    }
    public function getAllCategory(){

    }
    public function getCategoryByID($cat_id){

    }
    public function getCategoryByIDParent($parent_id){

    }
}