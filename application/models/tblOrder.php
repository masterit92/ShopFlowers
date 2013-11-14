<?php
class Models_tblOrder extends  Libs_Model{
   public function __construct(){
       parent::__construct();
   }
    private $order_id;
    private $cus_id;
    private $pay_id;
    private $order_date;
    private $delivery_date;
    private $name_recipient;
    private $address_recipient;
    private $requirement;
    private $email_recipient;
    private $phone_recipient;
    private $status;

    /**
     * @param mixed $address_recipient
     */
    public function setAddressRecipient($address_recipient)
    {
        $this->address_recipient = $address_recipient;
    }

    /**
     * @return mixed
     */
    public function getAddressRecipient()
    {
        return $this->address_recipient;
    }

    /**
     * @param mixed $cus_id
     */
    public function setCusId($cus_id)
    {
        $this->cus_id = $cus_id;
    }

    /**
     * @return mixed
     */
    public function getCusId()
    {
        return $this->cus_id;
    }

    /**
     * @param mixed $delivery_date
     */
    public function setDeliveryDate($delivery_date)
    {
        $this->delivery_date = $delivery_date;
    }

    /**
     * @return mixed
     */
    public function getDeliveryDate()
    {
        return $this->delivery_date;
    }

    /**
     * @param mixed $email_recipient
     */
    public function setEmailRecipient($email_recipient)
    {
        $this->email_recipient = $email_recipient;
    }

    /**
     * @return mixed
     */
    public function getEmailRecipient()
    {
        return $this->email_recipient;
    }

    /**
     * @param mixed $name_recipient
     */
    public function setNameRecipient($name_recipient)
    {
        $this->name_recipient = $name_recipient;
    }

    /**
     * @return mixed
     */
    public function getNameRecipient()
    {
        return $this->name_recipient;
    }

    /**
     * @param mixed $order_date
     */
    public function setOrderDate($order_date)
    {
        $this->order_date = $order_date;
    }

    /**
     * @return mixed
     */
    public function getOrderDate()
    {
        return $this->order_date;
    }

    /**
     * @param mixed $order_id
     */
    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * @param mixed $pay_id
     */
    public function setPayId($pay_id)
    {
        $this->pay_id = $pay_id;
    }

    /**
     * @return mixed
     */
    public function getPayId()
    {
        return $this->pay_id;
    }

    /**
     * @param mixed $phone_recipient
     */
    public function setPhoneRecipient($phone_recipient)
    {
        $this->phone_recipient = $phone_recipient;
    }

    /**
     * @return mixed
     */
    public function getPhoneRecipient()
    {
        return $this->phone_recipient;
    }

    /**
     * @param mixed $requirement
     */
    public function setRequirement($requirement)
    {
        $this->requirement = $requirement;
    }

    /**
     * @return mixed
     */
    public function getRequirement()
    {
        return $this->requirement;
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
    public function getAllOrder(){

    }
    public function getOrderByID($order_id){

    }
    public function getListOrderByCusID($cus_id){

    }
    public function insertOrder(Models_tblOrder $order){

    }
    public function updateOrderByStatus(Models_tblOrder $order){

    }
}