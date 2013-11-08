<?php
@session_start();
class Admin_Controllers_Ads extends Libs_Controller
{
    public function index(){
        $model= new Admin_Models_tblAds();

        $this->view->listAds = $model->getAllAds();
        $this->view->render('ads/index');
        
    }
    public function getCreate(){
        $this->view->create = true;
        $this->view->render('ads/form');
    }
    public function getEdit(){
    	$ads_id = $_GET['id'];

    	$model= new Admin_Models_tblAds();
    	$this->view->ads = $model->getAdsByID($ads_id);
        $this->view->render('ads/form');
    }    
    public function postCreate(){
    	$ads= new Admin_Models_tblAds();

        $ads->setName($_POST['name']);
        $ads->setUrl($_POST['ads_url']);
        

        $date_start = new DateTime($_POST['date_start']);
        $format_date_start = $date_start->format('Y-m-d');
        $ads->setDateStart($format_date_start);

        $date_end = new DateTime($_POST['date_end']);
        $format_date_end = $date_end->format('Y-m-d');
        $ads->setDateEnd($format_date_end);

        $checkImage = new Libs_uploadImg();
        $url_img = "templates/admin/images";
        $img = $checkImage->addImg($url_img,'image',$_FILES["image"]["name"]);

        $ads->setImage($img[0]);
        //Up Anh
        /*
        $file_path = file_exists($_FILES["image"]["name"]);
        if(file_exists($file_path)){
            $this->view->msg = "This file already exists";
            header("location:ads/form");
        }else{
            $resieImage = new Libs_SimpleImage();
            $resieImage->load($_FILES['image']['tmp_name']);
            $resieImage->resizeToWidth(70);
            $resieImage->resizeToHeight(70);
            $resieImage->save($_FILES['image']['tmp_name']);

            move_uploaded_file($_FILES["image"]["tmp_name"],'images/'.$_FILES["image"]["name"]);
        }
        //
        */
        $ads->insertAds($ads);
        header("location:index");
    }
    public function postEdit(){
        $ads_id = $_POST['adsId'];
        $ads= new Admin_Models_tblAds();

        $ads->setName($_POST['name']);
        $ads->setUrl($_POST['ads_url']);       

        $date_start = new DateTime($_POST['date_start']);
        $format_date_start = $date_start->format('Y-m-d');
        $ads->setDateStart($format_date_start);

        $date_end = new DateTime($_POST['date_end']);
        $format_date_end = $date_end->format('Y-m-d');
        $ads->setDateEnd($format_date_end);

        $checkImage = new Libs_uploadImg();
        $url_img = "templates/admin/images";
        $img = $checkImage->addImg($url_img,'image',$_FILES["image"]["name"]);
        $ads->setImage($img[0]);

        $ads->updateAds($ads,$ads_id);
        header("location:index");
    }

    public function postDelete(){
    	$ads_id = $_GET['id'];
        $url_img = "templates/admin/images";

		$model= new Admin_Models_tblAds();
        $url_img = $model->getAdsByID($ads_id)->getImage();
        unlink($url_img);
        //print_r($url_img);die;
        $model->deleteAds($ads_id);	

        header("location:index");
    }
}