<?php
class Default_Controllers_Index extends Libs_Controller
{
    public function __construct(){
        parent::__construct();
    }
    public function index()
    {
        $pro= new Default_Models_tblProducts();
        $sale= new Models_tblSales();
        $this->view->listSale= $sale->getTopSale();
        $this->view->listProNew= $pro->getListProNew();
        $this->view->render('index/index');
    }
}