<?php

@session_start();

/**
 * @description process sale product with shopping cart
 *
 * @author ThaiNV 
 * @since 09/11/2013
 */
class Default_Controllers_ShoppingCart extends Libs_Controller {

    protected $_logic;

    public function __construct() {
        parent::__construct();
        $this->_logic = new Default_Models_tblProducts();
    }

    /**
     * @description update qty of products in cart
     *
     * @author ThaiNV 
     * @since 09/11/2013
     */
    public function index() {
        if (isset($_POST['Ok'])) {
            foreach ($_POST['qty'] as $key => $value) {
                if (($value == 0) and (is_numeric($value))) {
                    unset($_SESSION['cart'][$key]);
                } elseif (($value > 0) and (is_numeric($value))) {
                    $_SESSION['cart'][$key] = $value;
                    $_SESSION['totalMoney'] = $this->renderViewCart();
                }
            }
        }
        $this->view->render('shoppingCart/index');
        $loadJS = $this->loadJsFunction('DefaultController.showCart()');
        echo $loadJS;
    }

    /**
     * @description add product and caculator quantity
     *
     * @author ThaiNV 
     * @since 09/11/2013
     */
    public function addProToCart() {
        $proId = $_POST['proId'];
        if (isset($_SESSION['cart'][$proId])) {
            $qty = $_SESSION['cart'][$proId] + 1;
        } else {
            $qty = 1;
        }
        $_SESSION['cart'][$proId] = $qty;
    }

    /**
     * @description get list products order
     *
     * @author ThaiNV 
     * @since 09/11/2013
     */
    public function getProductsOrder(&$aryProduct) {
        $isEmpty = 1;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $k => $v) {
                if (isset($k)) {
                    $isEmpty = 0;
                }
            }
        }
        if ($isEmpty == 0) {
            $aryProduct = array();
            // get array id:
            foreach ($_SESSION['cart'] as $key => $value) {
                $item[] = $key;
            }
            // get string id:
            $strId = implode(",", $item);
            //get products:
            $intIsOk = $this->_logic->getProducts($aryProduct, $strId);
        }
        return $intIsOk;
    }

    /**
     * @description render view of cart
     * 
     * @author ThaiNV 
     * @since 09/11/2013
     */
    public function renderViewCart(&$view) {
        $aryProduct = array();
        $total = 0;
        $this->getProductsOrder($aryProduct);
        $view = '<div class="title"><span class="title_icon"><img src="' . URL_BASE . '/templates/default/images/bullet1.gif" alt="" /></span>My cart</div>';
        $view .= '<div class="feat_prod_box_details">';
        $view .= '<form name="frmCart" id="frmCart" method="post" action=' . URL_BASE . "/shoppingCart" . '>';

        $view .= '<table class="cart_table">'; //start Table
        //head
        $view .= '<tr class="cart_title">';
        $view .= '<td>Item pic</td>';
        $view .= '<td>Product name</td>';
        $view .= '<td>Price</td>';
        $view .= '<td>Qty</td>';
        $view .= '<td>Desc</td>';
        $view .= '<td>Total</td>';
        $view .= '<td>Action</td>';
        $view .= '</tr>';
        //content
        if (!empty($aryProduct)) {
            foreach ($aryProduct as $value) {
                $view .= '<tr>';
                $view .= '<td><a href=""><img src="images/cart_thumb.gif" alt="" border="0" class="cart_thumb" /></a></td>';
                $view .= '<td>' . $value['name'] . '</td>';
                $view .= '<td>' . $value['price'] . ' $' . '</td>';
                $view .= '<td>' . "<input style='text-align: center; border: 1px black solid' type='text' size='5' maxlength='10'" . 'value=' . $_SESSION['cart'][$value['pro_id']] . " name='qty[" . $value['pro_id'] . "]'></input>" . '</td>';
                $view .= '<td>' . $value['description'] . '</td>';
                $view .= '<td>' . $_SESSION['cart'][$value['pro_id']] * $value['price'] . ' $' . '</td>';
                $view .= '<td><input type="button" onclick="DefaultController.deleteCart(' . $value["pro_id"] . ')" value="Delete"></td>';
                $view .= '<td><input type="hidden" name="product[' . $value["name"] . ']" value="' . $value["pro_id"] . '"></td>';
                $view .= '</tr>';
                $total += $_SESSION['cart'][$value['pro_id']] * $value['price'];
            }
            $view .= '<tr>';
            $view .= '<td colspan="1"><input style=" color: white ; background: #8A181A; border: 1px #8A181A solid;border-radius: 5px;" type = "submit" value = "Save" name = "Ok"/></td>';
            $view .= '<td colspan="3"></td>';
            $view .= ' <td colspan="1" class="cart_total"><span class="red">TOTAL: </span></td>';
            $view .= '<td>' . $total . ' $' . '</td>';
            $view .= '<td></td>';
            $view .= '</tr>';
        } else {
            $view .= '<tr>';
            $view .= '<td colspan="7"> Your cart is empty</td>';
            $view .= '</tr>';
            $view .= '<tr>';
            $view .= '<td colspan="1"><input style=" color: white ; background: #8A181A; border: 1px #8A181A solid;border-radius: 5px;" type = "submit" value = "Save" name = "Ok"/></td>';
            $view .= '<td colspan="6"></td>';
            $view .= '</tr>';
        }

        $view .= '</table>';
        //end Table
        $view .= ' <a href="' . URL_BASE . '/products' . '" class="continue">&lt; continue</a> <a onclick="DefaultController.loadFormCustom()" style="cursor: pointer" class="checkout">checkout &gt;</a> </div>';
        $view .= '</form>';

        $view .= '</div>';
        return $total;
    }

    /**
     * @description delete product in cart
     * 
     * @author ThaiNV 
     * @since 09/11/2013
     */
    public function deleteCart() {
        $proId = $_POST['proId'];
        if ($proId == 0) {
            unset($_SESSION['cart']);
        } else {
            unset($_SESSION['cart'][$proId]);
            $_SESSION['totalMoney'] = $this->renderViewCart();
        }
    }

    /**
     * @description show shopping cart
     * 
     * @author ThaiNV 
     * @since 09/11/2013
     */
    public function showCart() {
        $cart = '';
        $_SESSION['totalMoney'] = $this->renderViewCart($cart);
        echo json_encode(array('cart' => $cart));
        exit();
    }

    /**
     * @description load javascript function
     * 
     * @author ThaiNV 
     * @since 09/11/2013
     */
    public function loadJsFunction($jsFuncName) {
        $script = '<script type="text/javascript" src="' . URL_BASE . '/templates/default/js/jquery-1.10.2.js"></script>';
        $script .= '<script type="text/javascript" src="' . URL_BASE . '/templates/default/js/defaultController.js"></script>';
        $script .= '<script type="text/javascript"> var BASE_URL = ' . '"' . URL_BASE . '"' . '</script>';
        $script .= '<script type="text/javascript">' . $jsFuncName . '</script>';
        return $script;
    }

    /**
     * @description load form customer
     * 
     * @author ThaiNV 
     * @since 09/11/2013
     */
    public function loadFormInfo() {
        $form = file_get_contents('http://' . $_SERVER['SERVER_NAME'] . '/shopFlowers/application/default/views/shoppingCart/formInfo.php');
//        $strId = join(',', $_POST['product']);
        echo json_encode(array('form' => $form));
        exit();
    }

    /**
     * @description save customer information
     * 
     * @author ThaiNV 
     * @since 09/11/2013
     */
    public function saveOrderInfo() {
        $aryParams = $_POST;
        $aryProduct = array();
        $this->getProductsOrder($aryProduct);
        $dbCus = new Default_Models_tblCustomers();
        $intIsOk = $dbCus->buildDataOrder($aryParams);
    }

}