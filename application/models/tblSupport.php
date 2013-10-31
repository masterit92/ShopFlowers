<?php
class Models_tblSupport extends  Libs_Model{
   public function __construct(){
       parent::__construct();
   }
    private $sup_id;
    private $name;
    private $nick_name;
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
     * @param mixed $nick_name
     */
    public function setNickName($nick_name)
    {
        $this->nick_name = $nick_name;
    }

    /**
     * @return mixed
     */
    public function getNickName()
    {
        return $this->nick_name;
    }

    /**
     * @param mixed $sup_id
     */
    public function setSupId($sup_id)
    {
        $this->sup_id = $sup_id;
    }

    /**
     * @return mixed
     */
    public function getSupId()
    {
        return $this->sup_id;
    }
}