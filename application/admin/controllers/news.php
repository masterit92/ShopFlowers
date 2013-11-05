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
     * @desc: get list news
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
        $this->_logic->getListNews($aryResult, $aryCodition);

        $this->view->aryData = $aryResult;
        $this->view->keyword = $oldKeyWord;
        $this->view->render('news/listNews');
    }

    /**
     * @desc: load form data
     * 
     * @author: ThaiNV
     * @since: 04-11-2013
     */
    public function loadFormData() {
        $this->view->render('news/formData');
    }

}
