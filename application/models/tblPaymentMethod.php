<?php
class Models_tblPaymentMethod extends  Libs_Model{
   public function __construct(){
       parent::__construct();
   }
    private $pay_id;
    private $pay_name;
    private $pay_imge;
    private $pay_content;

    /**
     * @param mixed $content
     */
    public function setContent($pay_content)
    {
        $this->pay_content = $pay_content;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->pay_content;
    }

    /**
     * @param mixed $image
     */
    public function setImage($pay_imge)
    {
        $this->pay_img = $pay_imge;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->pay_img;
    }

    /**
     * @param mixed $name
     */
    public function setName($pay_name)
    {
        $this->pay_name = $pay_name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->pay_name;
    }
    public function setPayId($pay_id) {
        $this->pay_id = $pay_id;
    }
    public function getPayID(){
        return $this->pay_id;
    }    
}