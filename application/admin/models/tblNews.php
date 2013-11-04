<?php

/**
 * @desc: logic of News
 * 
 * @author: ThaiNV
 * @since: 04-11-2013
 */
class Admin_Models_tblNews extends Models_tblNews {

    protected $_queryUnit;

    public function __construct() {
        parent::__construct();
        $this->_queryUnit = new Libs_QueryUnit();
    }

    /**
     * @desc: get list data of news
     * 
     * @author: ThaiNV
     * @since: 04-11-2013
     */
    public function getListNews(&$aryResult, $aryCondition) {
        try {
            //Build data to get list
            $aryData = array(
                'news_id',
                'news_title',
                'news_content',
                'news_start_date',
                'news_end_date',
                'news_image'
            );
            $orderBy = 'news_id DESC';
            //Get query
            $query = $this->_queryUnit->getSelect('tbl_news', null, $orderBy);
            //Get result
            $aryResult = mysql_fetch_assoc($query);
            $intIsOk = 1;
        } catch (Exception $e) {
            echo $e->getMessage();
            $intIsOk = -1;
        }
        return $intIsOk;
    }

}
