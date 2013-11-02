<?php

class Admin_Models_tblAbout extends Libs_Model {
    private $libQuery;
    public function __construct() {
        parent::__construct();
        $this->libQuery = new Libs_QueryUnit();
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
    
    public function setAboutValues($row) {
        $about = new Admin_Models_tblAbout();
        $about->setAboutId($row['about_id']);
        $about->setTitle($row['title']);
        $about->setContent($row['content']);
    }
    public function getAboutValues(Admin_Models_tblAbout $about){
        $arr_about = array();
        
        $arr_about['about_id']=$about->getAboutId();
        $arr_about['title']=$about->getTitle();
        $arr_about['content']=$about->getContent();
        return $arr_about;
        
    }
    public function getAllAbout(){
        $obj = $this->libQuery->getSelect('tbl_about');
        if(mysql_num_rows($obj) > 0){
            while ($row = mysql_fetch_assoc($obj)) {
                $listAbout[] = $row;
            }
        }
        return $listAbout;
    }

    public function insertAbout(Admin_Models_tblAbout $about) {
        
    }

    public function updateAbout(Admin_Models_tblAbout $about) {
        
    }

    public function deleteAbout($about_id) {
        
    }

}