<?php
class Default_Controllers_Products extends Libs_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $listPro = new Default_Models_tblProducts();
        if (isset($_GET['search'])) {
            $search= ltrim($_GET['search']);
            $search= rtrim($_GET['search']);
            $this->view->listAllPro= $listPro->getSearch($search);
            $this->view->render("products/index", FALSE);
        } else if(isset($_GET['order'])){
            $this->view->listAllPro= $listPro->getProOrderByPrice($_GET['order']);
            $this->view->render("products/index", FALSE);
        }else if(isset ($_GET['cat_id'])){
            $this->view->listAllPro= $listPro->getProByCatID($_GET['cat_id']);
            $this->view->render("products/index", FALSE);
        }else if(isset ($_GET['price']) && isset($_GET['action'])){
             $this->view->listAllPro= $listPro->getProByPrice($_GET['price'], $_GET['action']);
            $this->view->render("products/index", FALSE);
        }
        else{
            $this->view->listAllPro = $listPro->getAllProduct();
            $this->view->render("products/index");
        }
    }

    public function detailPro() {
        if (isset($_GET['pro_id'])) {
            $pro = new Default_Models_tblProducts();
            $this->view->proByID = $pro->getProByID($_GET['pro_id']);
        }
        $this->view->render("products/detailPro");
    }

}

?>
