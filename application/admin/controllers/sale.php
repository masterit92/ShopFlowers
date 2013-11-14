<?php
@session_start();
class Admin_Controllers_Sale extends Libs_Controller
{
    public function index(){
        $model= new Admin_Models_tblSales();

        $this->view->listSale = $model->getAllSale();
        $this->view->render('sale/index');
        
    }
    public function getCreate(){
        $this->view->create = true;
        $this->view->render('sale/form');
    }
    public function getEdit(){
        $sale_id = $_GET['id'];
        $model= new Admin_Models_tblSales();

        $this->view->sale = $model->getSaleByID($sale_id);
        $this->view->render('sale/form');
    }    
    public function postCreate(){
        //$pro_id = $_GET['pro_id'];
        $sale= new Admin_Models_tblSales();

        $sale->setContent($_POST['content']);
        $sale->setPercentDecrease($_POST['percent']);
        

        $date_start = new DateTime($_POST['date_start']);
        $format_date_start = $date_start->format('Y-m-d');
        $sale->setDateStart($format_date_start);

        $date_end = new DateTime($_POST['date_end']);
        $format_date_end = $date_end->format('Y-m-d');
        $sale->setDateEnd($format_date_end);

        $checkImage = new Libs_uploadImg();
        $url_img = "templates/admin/images";
        $img = $checkImage->addImg($url_img,'image',$_FILES["image"]["name"]);

        $sale->setImage($img[0]);

        $sale->insertSale($sale);
        header("location:index");
    }
    public function postEdit(){
        $sale_id = $_POST['saleId'];
        $sale= new Admin_Models_tblSales();

        $sale->setContent($_POST['content']);
        $sale->setPercentDecrease($_POST['percent']);       

        $date_start = new DateTime($_POST['date_start']);
        $format_date_start = $date_start->format('Y-m-d');
        $sale->setDateStart($format_date_start);

        $date_end = new DateTime($_POST['date_end']);
        $format_date_end = $date_end->format('Y-m-d');
        $sale->setDateEnd($format_date_end);

        if(isset($_FILES["image"]["name"])){
            unlink($sale->getSaleByID($sale_id)->getImage());

            $checkImage = new Libs_uploadImg();
            $url_img = "templates/admin/images";
            $img = $checkImage->addImg($url_img,'image',$_FILES["image"]["name"]);
            $sale->setImage($img[0]);
        }else{
            //print_r($_POST['saleImage']);die;
            $img = $sale->getSaleByID($sale_id)->getImage();
            $sale->setImage($img); 
        }    

        $sale->updateSale($sale,$sale_id);
        header("location:index");
    }

    public function postDelete(){
        $sale_id = $_GET['id'];
        $url_img = "templates/admin/images";

        $model= new Admin_Models_tblSales();
        $url_img = $model->getSaleByID($sale_id)->getImage();
        unlink($url_img);

        $model->deleteSale($sale_id); 

        header("location:index");
    }
}