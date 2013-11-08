<?php

class Default_Controllers_Products extends Libs_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $listPro = new Default_Models_tblProducts();
        $this->view->listAllPro= $listPro->getAllProduct();
        $this->view->render("products/index");
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
