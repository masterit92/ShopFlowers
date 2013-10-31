<?php
class Models_tblContact extends  Libs_Model{
   public function __construct(){
       parent::__construct();
   }
    private $con_id;
    private $full_name;
    private $email;
    private $content;
    private $post_date;

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
    private $status;

    /**
     * @param mixed $con_id
     */
    public function setConId($con_id)
    {
        $this->con_id = $con_id;
    }

    /**
     * @return mixed
     */
    public function getConId()
    {
        return $this->con_id;
    }

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
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $full_name
     */
    public function setFullName($full_name)
    {
        $this->full_name = $full_name;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->full_name;
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
    public function insertContact(Models_tblContact $contact){

    }

}