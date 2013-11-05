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
            $where = '1 = 1';
            if (isset($aryCondition['keyWord']) && $aryCondition['keyWord'] != '') {
                $where .= 'news_title LIKE "%' . $aryCondition['keyWord'] . '%"';
            }
            $orderBy = 'news_id DESC';
            //Get query
            $query = $this->_queryUnit->getSelect('tbl_news', $where, $orderBy);
            //Get result
            $aryResult = $this->_queryUnit->fetchAll($query);
            $intIsOk = 1;
        } catch (Exception $e) {
            echo $e->getMessage();
            $intIsOk = -1;
        }
        return $intIsOk;
    }

}
