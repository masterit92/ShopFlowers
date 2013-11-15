<?php

class Models_tblProduct extends Libs_Model {

    protected $queryUnit;

    public function __construct() {
        parent::__construct();
        $this->queryUnit = new Libs_QueryUnit();
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
    public function setCatId($cat_id) {
        $this->cat_id = $cat_id;
    }

    /**
     * @return mixed
     */
    public function getCatId() {
        return $this->cat_id;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param mixed $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param mixed $post_date
     */
    public function setPostDate($post_date) {
        $this->post_date = $post_date;
    }

    /**
     * @return mixed
     */
    public function getPostDate() {
        return $this->post_date;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price) {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getPrice() {
        return $this->price;
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
     * @param mixed $status
     */
    public function setStatus($status) {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * @param mixed $thumb
     */
    public function setThumb($thumb) {
        $this->thumb = $thumb;
    }

    /**
     * @return mixed
     */
    public function getThumb() {
        return $this->thumb;
    }

    protected function setCustomerValue($row, $isKey = TRUE) {
        $pro = new Models_tblProduct();
        if ($isKey) {
            $pro->setProId($row['pro_id']);
        }
        $pro->setCatId($row['cat_id']);
        $pro->setDescription($row['description']);
        $pro->setName($row['name']);
        $pro->setPostDate($row['post_date']);
        $pro->setPrice($row['price']);
        $pro->setStatus($row['status']);
        $pro->setThumb($row['thumb']);
        return $pro;
    }

    protected function getColumnAndValue(Models_tblProduct $pro, $isKey = FALSE) {
        $arr_data = array();
        if ($isKey) {
            $arr_data['pro_id'] = $pro->getProId();
        }
        $arr_data['name'] = $pro->getName();
        $arr_data['thumb'] = $pro->getThumb();
        $arr_data['post_date'] = $pro->getPostDate();
        $arr_data['price'] = $pro->getPrice();
        $arr_data['status'] = $pro->getStatus();
        $arr_data['description'] = $pro->getDescription();
        $arr_data['cat_id'] = $pro->getCatId();
        return $arr_data;
    }

    public function getAllProduct() {
        $listPro = array();
        $execute = $this->queryUnit->getSelect('tbl_products', NULL, 'post_date DESC');
        if (mysql_num_rows($execute) > 0) {
            while ($row = mysql_fetch_assoc($execute)) {
                $listPro[] = $this->setCustomerValue($row);
            }
        }
        return $listPro;
    }

    public function getProByID($id_pro) {
        $pro = null;
        $execute = $this->queryUnit->getSelect('tbl_products', "pro_id='$id_pro'");
        if (mysql_num_rows($execute) > 0) {
            $row = mysql_fetch_assoc($execute);
            $pro = $this->setCustomerValue($row);
        }
        return $pro;
    }

    public function getProByCatID($cat_id) {
        $listPro = array();
        $execute = $this->queryUnit->getSelect('tbl_products', " cat_id='$cat_id'");
        if (mysql_num_rows($execute) > 0) {
            while ($row = mysql_fetch_assoc($execute)) {
                $listPro[] = $this->setCustomerValue($row);
            }
        }
        return $listPro;
    }

    public function getProOrderByPrice($order) {
        $listPro = array();
        $execute = $this->queryUnit->getSelect('tbl_products', null, " price $order");
        if (mysql_num_rows($execute) > 0) {
            while ($row = mysql_fetch_assoc($execute)) {
                $listPro[] = $this->setCustomerValue($row);
            }
        }
        return $listPro;
    }

    public function getSearch($ProName) {
        $listPro = array();

        $execute = $this->queryUnit->getSelect('tbl_products', "name Like '%" . $ProName . "%'");
        if (mysql_num_rows($execute) > 0) {
            while ($row = mysql_fetch_assoc($execute)) {
                $listPro[] = $this->setCustomerValue($row);
            }
        }
        return $listPro;
    }

    public function getProByPrice($price, $condition) {
        $listPro = array();

        $execute = $this->queryUnit->getSelect('tbl_products', " price $condition $price or price= $price");
        if (mysql_num_rows($execute) > 0) {
            while ($row = mysql_fetch_assoc($execute)) {
                $listPro[] = $this->setCustomerValue($row);
            }
        }
        return $listPro;
    }

}