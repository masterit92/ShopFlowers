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

        //load template
        $this->view->render('news/index');
    }

    /**
     * @desc: get list news
     * 
     * @author: ThaiNV
     * @since: 04-11-2013
     */
    public function listNews() {
        $aryResult = array();
        $intIsOk = $this->_logic->getListNews($aryResult);
        $html = '<table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tiêu đề</th>
                        <th>Nội dung</th>
                        <th>Ngày đăng</th>
                        <th>Ngày hết hạn</th>
                    </tr>
                </thead>   
                <tbody>
                    <tr>
                        <td>David R</td>
                        <td class="center"></td>
                        <td class="center">Member</td>
                        <td class="center">
                            <span class="label label-success">Active</span>
                        </td>
                        <td class="center">
                            <a class="btn btn-success" href="#">
                                <i class="icon-zoom-in icon-white"></i>  
                                View                                            
                            </a>
                            <a class="btn btn-info" href="#">
                                <i class="icon-edit icon-white"></i>  
                                Edit                                            
                            </a>
                            <a class="btn btn-danger" href="#">
                                <i class="icon-trash icon-white"></i> 
                                Delete
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>';
        $aryRespone = array(
            'intIsOk' => $intIsOk,
            'html' => $html
        );
        echo json_encode($aryRespone);
        die;
    }

}