<?php

/**
 * @desc: Manager news
 * 
 * @author: ThaiNV
 * @since: 4-11-2013
 */
class Admin_Controllers_News extends Libs_Controller {

    protected $_logic;

    public function __construct() {
        parent::__construct();
        $this->_logic = new Admin_Models_tblNews();
    }

    public function index() {
        $this->listNews();
    }

    /**
     * @desc: list action
     * 
     * @author: ThaiNV
     * @since: 04-11-2013
     */
    public function listNews() {
        $aryResult = $aryCodition = array();
        $oldKeyWord = '';
        $keyword = $_POST['txtKey_word'];
        if (!empty($keyword)) {
            $oldKeyWord = $keyword;
            $aryCodition['keyWord'] = str_replace(' ', '%', $keyword);
        }
        $pages_list = $this->_logic->paging($aryResult, $aryCodition);

        $this->view->aryData = $aryResult;
        $this->view->keyword = $oldKeyWord;
        $this->view->pages_list = $pages_list;
        $this->view->render('news/listNews');
    }

    /**
     * @desc: load form data
     * 
     * @author: ThaiNV
     * @since: 04-11-2013
     */
    public function loadFormData() {
        $aryResult = array();
        $aryCondition['newsId'] = $_GET['id'];
        $intIsOk = $this->_logic->getListNews($aryResult, $aryCondition);
        if ($intIsOk == 1) {
            $this->view->aryData = $aryResult;
        }
        $this->view->render('news/formData');
    }

    /**
     * @desc: save action
     * 
     * @author: ThaiNV
     * @since: 06/11/2013
     */
    public function save() {
        $intIsOk = $this->_logic->saveNews($_POST);
        if ($intIsOk == 1) {
            $this->redir(URL_BASE . '/admin/news');
        }
    }

    /**
     * @desc: delete action
     * 
     * @author: ThaiNV
     * @since: 06/11/2013
     */
    public function delete() {
        $listId = $_GET['listId'];
        $intIsOk = $this->_logic->delNews($listId);
        if ($intIsOk == 1) {
            $this->redir(URL_BASE . '/admin/news');
        }
    }

}
