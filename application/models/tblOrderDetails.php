<?php

class Models_tblOrderDetails extends Libs_Model {

    public function __construct() {
        parent::__construct();
    }

    private $order_id;
    private $cus_id;
    private $pro_id;
    private $quantity;
    private $price;

    public function getOrder_id() {
        return $this->order_id;
    }

    public function setOrder_id($order_id) {
        $this->order_id = $order_id;
    }

    public function getCus_id() {
        return $this->cus_id;
    }

    public function setCus_id($cus_id) {
        $this->cus_id = $cus_id;
    }

    public function getPro_id() {
        return $this->pro_id;
    }

    public function setPro_id($pro_id) {
        $this->pro_id = $pro_id;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getDetailByOrderID($order_id) {
        
    }

    public function getDetailByProID($pro_id) {
        
    }

    public function getDetailByCusID($cus_id) {
        
    }

    public function getDetail($cus_id, $order_id) {
        
    }

}