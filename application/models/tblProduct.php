<?php
class Models_tblProduct extends  Libs_Model{
   public function __construct(){
       parent::__construct();
   }
    private $pro_id;
    private $name;
    private $thumb;
    private $cat_id;
    private $description;
    private $price;
    private $status;
    private $post_date;

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
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
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
     * @param mixed $post_date
     */
    public function setPostDate($post_date)
    {
        $this->post_date = $post_date;
    }

    /**
     * @return mixed
     */
    public function getPostDate()
    {
        return $this->post_date;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $pro_id
     */
    public function setProId($pro_id)
    {
        $this->pro_id = $pro_id;
    }

    /**
     * @return mixed
     */
    public function getProId()
    {
        return $this->pro_id;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $thumb
     */
    public function setThumb($thumb)
    {
        $this->thumb = $thumb;
    }

    /**
     * @return mixed
     */
    public function getThumb()
    {
        return $this->thumb;
    }

    public function getAllProduct(){

    }
    public function getProByID($id_pro){

    }
    public function getProByCatID($cat_id){

    }
    public function getProOrderByPrice($price){

    }
}