<?php

/**
 * @desc: Paging
 * 
 * @author ThaiNV <thainv@smartosc.com>
 * @since: 07-11-2013
 */
class Libs_Paging {

    protected $_total;
    protected $_pages;
    protected $_queryUnit;

    public function __construct() {
        $this->_queryUnit = new Libs_QueryUnit();
    }

    /**
     * @desc: get total of record
     * 
     * @author: ThaiNV
     * @since: 08/11/2013
     * @param type $table
     */
    public function findTotal($table) {
        if (isset($_GET['total'])) {
            $this->_total = $_GET['total'];
        } else {
            $sql = 'SELECT COUNT(*) AS total FROM ' . $table;
            $result = $this->_queryUnit->executeQuery($sql);
            $row = $this->_queryUnit->fetchAll($result);
            $this->_total = $row[0]['total'];
        }
    }

    /**
     * @desc: get total of page
     * 
     * @author: ThaiNV
     * $since: 08/11/2013
     * @param type $limit
     */
    public function findPages($limit) {
        $this->_pages = ceil($this->_total / $limit);
    }

    /**
     * @desc get position of record start in each page
     * 
     * @author ThaiNV 
     * @since 08/11/2013
     * @param type $limit
     * @return type
     */
    function rowStart($limit) {
        $_GET['page'] = ($_GET['page'] > 0) ? $_GET['page'] : 1;
        return (!isset($_GET['page'])) ? 0 : ($_GET['page'] - 1) * $limit;
    }

    /**
     * @desc: Get paging
     * 
     * @author ThaiNV 
     * @since 08/11/2013
     * @param type $curpage
     * @param type $module
     * @param type $controller
     * @return string
     */
    public function pagesList($curpage, $module, $controller) {
        $total = $this->_total;
        $pages = $this->_pages;
        $maxPage = 5;
        if ($pages <= 1) {
            return '';
        }
        $page_list = "";

        if ($curpage != 1) {
            $page_list .= '<a class="libsPaging" href="' . URL_BASE . '/' . $module . '/' . $controller . '?page=1&total=' . $total . '" title="trang đầu">First </a>';
        }
        if ($curpage > 1) {
            $page_list .= '<a class="libsPaging" href="' . URL_BASE . '/' . $module . '/' . $controller . '?page=' . ($curpage - 1) . '&total=' . $total . '" title="trang trước"><<</a>';
        }
        if ($pages <= $maxPage) {
            for ($i = 1; $i <= $pages; $i++) {
                if ($i == $curpage) {
                    $page_list .= "<a id='libsPaging-active'>" . $i . "</a>";
                } else {
                    $page_list .= '<a class="libsPaging" href="' . URL_BASE . '/' . $module . '/' . $controller . '?page=' . $i . '&total=' . $total . '" title="Trang ' . $i . '">' . $i . '</a>';
                }
                $page_list .= " ";
            }
        } else {
            if ($curpage > 0 && $curpage < $maxPage) {
                for ($i = 1; $i <= $maxPage; $i++) {
                    if ($i == $curpage) {
                        $page_list .= "<a id='libsPaging-active'>" . $i . "</a>";
                    } else {
                        $page_list .= '<a class="libsPaging" href="' . URL_BASE . '/' . $module . '/' . $controller . '?page=' . $i . '&total=' . $total . '" title="Trang ' . $i . '">' . $i . '</a>';
                    }
                    $page_list .= " ";
                }
            }
            if ($curpage >= $maxPage && $curpage + 2 < $pages) {
                for ($i = $curpage - 2; $i <= $curpage + 2; $i++) {
                    if ($i == $curpage) {
                        $page_list .= "<a id='libsPaging-active'>" . $i . "</a>";
                    } else {
                        $page_list .= '<a class="libsPaging" href="' . URL_BASE . '/' . $module . '/' . $controller . '?page=' . $i . '&total=' . $total . '" title="Trang ' . $i . '">' . $i . '</a>';
                    }
                    $page_list .= " ";
                }
            }
            if ($curpage >= $maxPage && $curpage + 2 >= $pages) {
                for ($i = $curpage - 2; $i <= $pages; $i++) {
                    if ($i == $curpage) {
                        $page_list .= "<a id='libsPaging-active'>" . $i . "</a>";
                    } else {
                        $page_list .= '<a class="libsPaging" href="' . URL_BASE . '/' . $module . '/' . $controller . '?page=' . $i . '&total=' . $total . '" title="Trang ' . $i . '">' . $i . '</a>';
                    }
                    $page_list .= " ";
                }
            }
        }

        if (($curpage + 1) <= $pages) {
            $page_list .= '<a class="libsPaging" href="' . URL_BASE . '/' . $module . '/' . $controller . '?page=' . ($curpage + 1) . '&total=' . $total . '" title="Đến trang sau"> >> </a>';
        }
        if (($curpage != $pages) && ($pages != 0)) {
            $page_list .= '<a class="libsPaging" href="' . URL_BASE . '/' . $module . '/' . $controller . '?page=' . $pages . '&total=' . $total . '" title="trang cuối"> Last</a>';
        }
        return $page_list;
    }

}
