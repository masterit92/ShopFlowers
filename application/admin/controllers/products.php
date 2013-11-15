<?php

class Admin_Controllers_Products extends Libs_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $listPro = new Default_Models_tblProducts();
        if (isset($_GET['search'])) {
            $this->view->listAllPro = $listPro->getSearch($_GET['search']);
            $this->view->render("products/index", FALSE);
        } else {
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

    public function imgByProID() {
        if (isset($_GET['pro_id'])) {
            $img = new Admin_Models_tblImages();
            $this->view->listImg = $img->getAllImageByIDPro($_GET['pro_id']);
            $this->view->render('products/imgByProID');
        }
        $this->view->render('products/index');
    }

    public function formData() {
        if (isset($_GET['pro_id'])) {
            $proByID = new Admin_Models_tblProduct();
            $pro = $proByID->getProByID($_GET['pro_id']);
            $this->view->pro = $pro;
        }
        $this->view->render('products/formData');
    }

    public function saveData() {
        $retult = FALSE;
        $pro = new Admin_Models_tblProduct();
        $upImg = new Libs_uploadImg();
        $pro->setName($_POST['txtName']);
        $pro->setDescription($_POST['txtDes']);
        if (!empty($_FILES["thumb"]["name"][0])) {
            if (isset($_POST['txtProID'])) {
                unlink($pro->getProByID($_POST['txtProID'])->getThumb());
            }
            $url_img = "templates/default/images";
            $img = $upImg->addImg($url_img, 'thumb', $_FILES["thumb"]["name"]);
            $pro->setThumb($img[0]);
        } else {
            if (isset($_POST['txtProID'])) {
                $img = $pro->getProByID($_POST['txtProID'])->getThumb();
                $pro->setThumb($img);
            } else {
                $pro->setThumb('No img');
            }
        }
        $pro->setPrice($_POST['txtPrice']);
        $pro->setCatId($_POST['catID']);
        $pro->setStatus($_POST['status']);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $pro->setPostDate(date("YmdHis", time()));
        if (isset($_POST['txtProID'])) {
            $pro->setProId($_POST['txtProID']);
            if ($pro->updateProduct($pro)) {
                $retult = TRUE;
            }
        } else if ($pro->insertProduct($pro)) {
            $retult = TRUE;
        }
        if ($retult) {
            echo "<script>alert('Success!')</script>";
        } else {
            echo "<script>alert('Fail!')</script>";
            $url = URL_BASE . '/admin/products/formData';
            if ($_POST['txtProID']) {
                $url.='?pro_id=' . $_POST['txtProID'];
            }
            $this->redir($url);
        }
        $this->redir(URL_BASE . '/admin/products');
    }

    public function delete() {
        if (isset($_GET["pro_id"])) {
            $pro = new Admin_Models_tblProduct();
            $img = new Admin_Models_tblImages();
            $url_img = $pro->getProByID($_GET['pro_id'])->getThumb();
            if ($pro->deleteProduct($_GET["pro_id"])) {
                unlink($url_img);
                echo "<script>alert('Delete Success!')</script>";
            } else {
                echo "<script>alert('Delete Fail!')</script>";
            }
        }
        $url = URL_BASE . '/admin/products';
        if (isset($_GET['page'])) {
            $url.='?page=' . $_GET['page'];
        } else {
            $url.='?page=1';
        }
        $this->redir($url);
    }

    public function delListPro() {
        if (isset($_GET['listId'])) {
            $listId = $_GET['listId'];
            $pro = new Admin_Models_tblProduct();
            $list_url_del = explode(',', $listId);
            if ($pro->delListPro($listId)) {
                foreach ($list_url_del as $key => $url_del) {
                    unlink($url_del);
                }
                echo "<script>alert('Delete Success!')</script>";
            } else {
                echo "<script>alert('Delete Fail!')</script>";
            }
        }
        $url = URL_BASE . '/admin/products';
        if (isset($_GET['page'])) {
            $url.='?page=' . $_GET['page'];
        } else {
            $url.='?page=1';
        }
        $this->redir($url);
    }

    public function saveImg() {
        if (isset($_GET['action'])) {
            $img = new Admin_Models_tblImages();
            $upImg = new Libs_uploadImg();
            $img->setProId($_GET['pro_id']);
            if (!empty($_FILES["img"]["name"][0])) {
                $url_img = "templates/default/images";
                $arr_img = $upImg->addImg($url_img, 'img', $_FILES['img']['name']);
                if ($_GET['action'] == 'insert') {
                    $numImg = $img->numImgByProID($_GET['pro_id']);

                    foreach ($arr_img as $key => $value) {
                        if ($numImg < 4) {
                            $img->setUrl($value);
                            if ($img->insertImg($img)) {
                                echo "<script>alert('Insert Success!')</script>";
                            } else {
                                echo "<script>alert('Insert Fail!')</script>";
                            }
                        } else {
                            echo "<script>alert('Album image exist max 4 image!')</script>";
                            break;
                        }
                        $numImg++;
                    }
                } else {
                    $img->setUrl($arr_img[0]);
                    $img->setImgId($_GET['img_id']);
                    unlink($img->getImgByID($_GET['img_id'])->getUrl());
                    if ($img->updateImg($img)) {
                        echo "<script>alert('Update Success!')</script>";
                    } else {
                        echo "<script>alert('Update Fail!')</script>";
                    }
                }
            }
        }

        $url = URL_BASE . '/admin/products/imgByProID?pro_id=' . $_GET['pro_id'];
        $this->redir($url);
    }

    public function deleteImg() {
        if (isset($_GET['img_id'])) {
            $img = new Admin_Models_tblImages();
            $url_del = $img->getImgByID($_GET['img_id'])->getUrl();
            if ($img->deleteImg($_GET['img_id'])) {
                unlink($url_del);
                echo "<script>alert('Delete Success!')</script>";
            } else {
                echo "<script>alert('Delete Fail!')</script>";
            }
        }
        $url = URL_BASE . '/admin/products/imgByProID?pro_id=' . $_GET['pro_id'];
        $this->redir($url);
    }

    public function delListImg() {
        print_r('aaa');
        die;
        if (isset($_GET['listId'])) {
            $listId = $_GET['listId'];
            $list_url_del = explode(',', $listId);
            $img = new Admin_Models_tblImages();
            if ($img->delListImg($listId)) {
                foreach ($list_url_del as $key => $url_del) {
                    unlink($url_del);
                }
                echo "<script>alert('Delete Success!')</script>";
            } else {
                echo "<script>alert('Delete Fail!')</script>";
            }
        }
        $url = URL_BASE . '/admin/products/imgByProID?pro_id=' . $_GET['pro_id'];
        $this->redir($url);
    }

}

?>