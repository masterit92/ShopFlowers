<?php
class Models_tblAbout extends  Libs_Model{
   public function __construct(){
       parent::__construct();
       $this->queryUnit = new Libs_QueryUnit();
   }
    private $about_id;
    private $title;
    private $content;

    /**
     * @param mixed $about_id
     */
    public function setAboutId($about_id)
    {
        $this->about_id = $about_id;
    }

    /**
     * @return mixed
     */
    public function getAboutId()
    {
        return $this->about_id;
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

    public function getAllAbout(){

    }
    public function getAboutByID($about_id){

    }
}