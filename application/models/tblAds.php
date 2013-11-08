<?php
class Models_tblAds extends  Libs_Model{
   public function __construct(){
       parent::__construct();
   }
    private $ads_id;
    private $name;
    private $url;
    private $image;
    private $date_start;
    private $date_end;
    private $content;

    /**
     * @param mixed $ads_id
     */
    public function setAdsId($ads_id)
    {
        $this->ads_id = $ads_id;
    }

    /**
     * @return mixed
     */
    public function getAdsId()
    {
        return $this->ads_id;
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
     * @param mixed $date_end
     */
    public function setDateEnd($date_end)
    {
        $this->date_end = $date_end;
    }

    /**
     * @return mixed
     */
    public function getDateEnd()
    {
        return $this->date_end;
    }

    /**
     * @param mixed $date_start
     */
    public function setDateStart($date_start)
    {
        $this->date_start = $date_start;
    }

    /**
     * @return mixed
     */
    public function getDateStart()
    {
        return $this->date_start;
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
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    public function setAdsValues($row)
    {
        $ads = new Models_tblAds();
        $ads->setAdsId($row['ads_id']);
        $ads->setName($row['name']);
        $ads->setUrl($row['url']);
        $ads->setImage($row['image']);
        $ads->setDateStart($row['date_start']);
        $ads->setDateEnd($row['date_end']);
        $ads->setContent($row['content']);
        return $ads;
    }

    public function getColumnAndValue(Models_tblAds $ads, $isKey = false)
    {
        $arr_data= array();
        if ($isKey) {
            $arr_data['ads_id']=$ads->getAdsId();
        }
        $arr_data['name']=$ads->getName();
        $arr_data['url']=$ads->getUrl();
        $arr_data['image']=$ads->getImage();
        $arr_data['date_start']=$ads->getDateStart();
        $arr_data['date_end']=$ads->getDateEnd();
        $arr_data['content']=$ads->getContent();
        return $arr_data;
    }

    public function getAllAds(){
        $listAds = array();
        $execute = $this->queryUnit->getSelect('tbl_ads');
        if (mysql_num_rows($execute) > 0) {
            while ($row = mysql_fetch_assoc($execute)) {
                $ads = $this->setAdsValues($row);
                $listAds[] = $ads;
            }
        }
        return $listAds;
    }
    public function getAdsByID($ads_id){
        $ads = null;
            $execute = $this->queryUnit->getSelect("tbl_ads", "ads_id='$ads_id'");
            if (mysql_num_rows($execute) > 0) {
                while ($row = mysql_fetch_assoc($execute)) {
                    $ads = $this->setAdsValues($row);
                }
            }
        return $ads;
    }

}