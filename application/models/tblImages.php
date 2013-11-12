<?php

class Models_tblImages extends Libs_Model {

    protected $queryUnit;

    public function __construct() {
        parent::__construct();
        $this->queryUnit = new Libs_QueryUnit();
    }

    private $img_id;
    private $pro_id;
    private $url;

    /**
     * @param mixed $img_id
     */
    public function setImgId($img_id) {
        $this->img_id = $img_id;
    }

    /**
     * @return mixed
     */
    public function getImgId() {
        return $this->img_id;
    }

    /**
     * @param mixed $pro_id
     */
    public function setProId($pro_id) {
        $this->pro_id = $pro_id;
    }

    /**
     * @return mixed
     */
    public function getProId() {
        return $this->pro_id;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url) {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getUrl() {
        return $this->url;
    }

    public function setCustomerValue($row, $isKey = TRUE) {
        $img= new Models_tblImages();
        if($isKey){
            $img->setImgId($row['img_id']);
        }
        $img->setProId($row['pro_id']);
        $img->setUrl($row['url']);
        return $img;
    }
    public function getColumnAndValue(Models_tblImages $img, $isKey= FALSE){
        $arr_data= array();
        if($isKey){
            $arr_data["img_id"]= $img->getImgId();
        }
        $arr_data["pro_id"]= $img->getProId();
        $arr_data["url"]= $img->getUrl();
        return $arr_data;
    }

    public function getAllImageByIDPro($pro_id) {
        $listImg = array();
        $execute = $this->queryUnit->getSelect('tbl_images', " pro_id= '$pro_id'");
        if (mysql_num_rows($execute) > 0) {
            while ($row = mysql_fetch_assoc($execute)) {
                $listImg[]=$this->setCustomerValue($row);
            }
        }
        return $listImg;
    }

}