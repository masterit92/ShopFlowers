<?php
class Models_tblNews extends  Libs_Model{
   public function __construct(){
       parent::__construct();
   }
    private $new_id;
    private $title;
    private $content;
    private $post_date;
    private $source;

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
     * @param mixed $new_id
     */
    public function setNewId($new_id)
    {
        $this->new_id = $new_id;
    }

    /**
     * @return mixed
     */
    public function getNewId()
    {
        return $this->new_id;
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
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }
    public function getAllNews(){

    }
    public function getNewByID($new_id){

    }
}