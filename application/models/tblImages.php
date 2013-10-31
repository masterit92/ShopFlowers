<?php
class Models_tblImages extends  Libs_Model{
   public function __construct(){
       parent::__construct();
   }
    private $img_id;
    private $pro_id;
    private $url;

    /**
     * @param mixed $img_id
     */
    public function setImgId($img_id)
    {
        $this->img_id = $img_id;
    }

    /**
     * @return mixed
     */
    public function getImgId()
    {
        return $this->img_id;
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
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    public function getAllImageByIDPro($pro_id){

    }
}