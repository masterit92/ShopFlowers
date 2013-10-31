<?php
class Models_tblPaymentMethod extends  Libs_Model{
   public function __construct(){
       parent::__construct();
   }
    private $pay_id;
    private $name;
    private $image;
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
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
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

    public function getAllPay(){

    }
    public function getPayByID($pay_id){

    }

}