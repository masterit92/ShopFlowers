<?php

@session_start();

class Admin_Controllers_Sale extends Libs_Controller {

    public function index() {
        $model = new Admin_Models_tblSales();
        if (isset($_GET['pro_id'])) {
            $this->view->listSale = $model->getListSaleByProID($_GET['pro_id']);
            $this->view->render('sale/index');
        }else{
            header("location: ".URL_BASE.'/admin/products');
        }

    }

    public function getCreate() {
        $this->view->create = true;
        $this->view->render('sale/form');
    }

    public function getEdit() {
        $sale_id = $_GET['id'];
        $model = new Admin_Models_tblSales();

        $this->view->sale = $model->getSaleByID($sale_id);
        $this->view->render('sale/form');
    }

    public function postCreate() {
        
        $sale = new Admin_Models_tblSales();

        $sale->setContent($_POST['content']);
        $sale->setPercentDecrease($_POST['percent']);
        $sale->setProId($_POST['pro_id']);


        $date_start = new DateTime($_POST['date_start']);
        $format_date_start = $date_start->format('Y-m-d');
        $sale->setDateStart($format_date_start);

        $date_end = new DateTime($_POST['date_end']);
        $format_date_end = $date_end->format('Y-m-d');
        $sale->setDateEnd($format_date_end);



        $sale->insertSale($sale);
        header("location:".URL_BASE.'/admin/sale?pro_id='.$_POST['pro_id']);
    }

    public function postEdit() {
        $sale_id = $_POST['saleId'];
        $sale = new Admin_Models_tblSales();

        $sale->setContent($_POST['content']);
        $sale->setPercentDecrease($_POST['percent']);
        $sale->setProId($_POST['pro_id']);

        $date_start = new DateTime($_POST['date_start']);
        $format_date_start = $date_start->format('Y-m-d');
        $sale->setDateStart($format_date_start);

        $date_end = new DateTime($_POST['date_end']);
        $format_date_end = $date_end->format('Y-m-d');
        $sale->setDateEnd($format_date_end);
        $sale->updateSale($sale, $sale_id);
        header("location:".URL_BASE.'/admin/sale?pro_id='.$_POST['pro_id']);
    }

    public function postDelete() {
        $sale_id = $_GET['id'];
        $model = new Admin_Models_tblSales();
        $model->deleteSale($sale_id);

        header("location:".URL_BASE.'/admin/sale?pro_id='.$_GET['pro_id']);
    }

}