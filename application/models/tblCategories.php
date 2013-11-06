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

    public function setCategoryValues($row)
    {
        $cat = new Models_tblCategories();
        $cat->setCatId($row['cat_id']);
        $cat->setName($row['name']);
        $cat->setParentId($row['parent_id']);
        return $cat;
    }

    public function getColumnAndValue(Models_tblCategories $cat, $isKey = false)
    {
        $arr_data= array();
        if ($isKey) {
            $arr_data['cat_id']=$cat->getCatId();
        }
        $arr_data['name']=$cat->getName();
        $arr_data['parent_id']=$cat->getParentId();
        return $arr_data;
    }

    public function getParentCat(){
        $cat_id = 0;
        $listCat = array();
        $execute = $this->queryUnit->getCatByParentId('tbl_categories',$cat_id);
        if (mysql_num_rows($execute) > 0) {
            while ($row = mysql_fetch_assoc($execute)) {
                $cat = $this->setCategoryValues($row);
                $listCat[] = $cat;
            }
        }
        return $listCat;
    }    
    public function getCatByParentId($cat_id){
        $listCat = array();
        $execute = $this->queryUnit->getCatByParentId('tbl_categories',$cat_id);
        if (mysql_num_rows($execute) > 0) {
            while ($row = mysql_fetch_assoc($execute)) {
                $cat = $this->setCategoryValues($row);
                $listCat[] = $cat;
            }
        }
        return $listCat;
    }
    public function getCatByID($cat_id){
        $cat = null;
            $execute = $this->queryUnit->getSelect("tbl_categories", "cat_id='$cat_id'");
            if (mysql_num_rows($execute) > 0) {
                while ($row = mysql_fetch_assoc($execute)) {
                    $cat = $this->setCategoryValues($row);
                }
            }
        return $cat;
    }    
}