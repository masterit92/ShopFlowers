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
     * @desc: insert news to database
     * 
     * @author: ThaiNV
     * @since: 04-11-2013
     */
    public function saveNews($aryParams) {
        try {
            $aryData = array(
                'news_start_date' => date('Y-m-d', strtotime($aryParams['txtDate_start'])),
                'news_end_date' => date('Y-m-d', strtotime($aryParams['txtDate_end'])),
                'news_title' => $aryParams['txtNews_title'],
                'news_content' => $aryParams['txtNews_content']
            );
            if ($aryParams['news_id'] !== null) {
                $condition = 'news_id = ' . $aryParams['news_id'];
                $this->_queryUnit->getUpdate('tbl_news', $aryData, $condition);
            } else {
                $this->_queryUnit->getInsert('tbl_news', $aryData);
            }
            $intIsOk = 1;
        } catch (Exception $e) {
            echo $e->getMessage();
            $intIsOk = -1;
        }
        return $intIsOk;
    }

    /**
     * @desc: delete record of tblnews
     * 
     * @author: ThaiNV
     * @since: 04-11-2013
     */
    public function delNews($listId) {
        try {
            $condition = 'news_id IN (' . $listId . ')';
            $this->_queryUnit->getDelete('tbl_news', $condition);
            $intIsOk = 1;
        } catch (Exception $e) {
            echo $e->getMessage();
            $intIsOk = -1;
        }
        return $intIsOk;
    }

    /**
     * @desc: get list data of news with paginator
     * 
     * @author: ThaiNV
     * @since: 04-11-2013
     */
    public function paging(&$aryData, $aryCondition) {
        $paging = new Libs_Paging();
        $limit = 1;
        // Tổng số bản ghi
        $paging->findTotal('tbl_news');
        // Tổng số trang
        $paging->findPages($limit);
        // Bắt đầu từ bản ghi
        $start = $paging->rowStart($limit);
        // Trang hiện tại
        $curpage = ($start / $limit) + 1;
        //data
        $where = '1 = 1';
        if (isset($aryCondition['keyWord']) && $aryCondition['keyWord'] != '') {
            $where .= ' AND news_title LIKE "%' . $aryCondition['keyWord'] . '%"';
        }
        if (isset($aryCondition['newsId']) && $aryCondition['newsId'] != '') {
            $where .= ' AND news_id = ' . $aryCondition['newsId'];
        }
        $orderBy = 'news_id DESC';
        $sql = "SELECT * FROM tbl_news 
                WHERE $where
                ORDER BY $orderBy
                LIMIT $start,$limit";
        $rs = $this->_queryUnit->executeQuery($sql);
        $aryData = $this->_queryUnit->fetchAll($rs);
        $pages_list = $paging->pagesList($curpage, 'admin', 'news');
        return $pages_list;
    }

}
