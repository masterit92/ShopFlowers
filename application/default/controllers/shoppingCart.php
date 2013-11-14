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

    public function index() {
        
    }

    /**
     * @description update qty of products in cart
     *
     * @author ThaiNV 
     * @since 09/11/2013
     */
    public function updateCart() {
        $aryQty = $_POST['qty'];
        foreach ($aryQty as $key => $value) {
            if (($value == 0) and (is_numeric($value))) {
                unset($_SESSION['cart'][$key]);
            } elseif (($value > 0) and (is_numeric($value))) {
                $_SESSION['cart'][$key] = $value;
            }
        }
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
                $view .= '<td>' . "<input style='text-align: center; border: 1px black solid' type='text' size='5' maxlength='10'" . 'value=' . $_SESSION['cart'][$value['pro_id']] . " name='qty[" . $value['pro_id'] . "]' onchange='DefaultController.updateCart()'></input>" . '</td>';
                $view .= '<td>' . $value['description'] . '</td>';
                $view .= '<td>' . $_SESSION['cart'][$value['pro_id']] * $value['price'] . ' $' . '</td>';
                $view .= '<td><input type="button" onclick="DefaultController.deleteCart(' . $value["pro_id"] . ')" value="Delete"></td>';
                $view .= '<td><input type="hidden" name="id[' . $value["name"] . ']" value="' . $value["pro_id"] . '"></td>';
                $view .= '<td><input type="hidden" name="price[' . $value["name"] . ']" value="' . $value["price"] . '"></td>';
                $view .= '</tr>';
                $total += $_SESSION['cart'][$value['pro_id']] * $value['price'];
            }
            $view .= '<tr>';
            $view .= '<td colspan="4"></td>';
            $view .= ' <td colspan="1" class="cart_total"><span class="red">TOTAL: </span></td>';
            $view .= '<td>' . $total . ' $' . '</td>';
            $view .= '<td></td>';
            $view .= '</tr>';
        } else {
            $view .= '<tr>';
            $view .= '<td colspan="7"> Your cart is empty</td>';
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
        }
    }

    /**
     * @description show shopping cart
     * 
     * @author ThaiNV 
     * @since 09/11/2013
     */
    public function showCart() {
        $cart = $infoCart = '';
        $numItems = (count($_SESSION['cart']) == 0 ) ? 0 : count($_SESSION['cart']);
        $totalMoney = $this->renderViewCart($cart);
        $infoCart = $numItems . ' x items | <span class="red">TOTAL: ' . $totalMoney . ' $' . '</span>';
        echo json_encode(array('cart' => $cart, 'cartInfo' => $infoCart));
        exit();
    }

    /**
     * @description get cart information
     * 
     * @author ThaiNV 
     * @since 09/11/2013
     */
    public function getCartInfo() {
        $numItems = (count($_SESSION['cart']) == 0 ) ? 0 : count($_SESSION['cart']);
        $totalMoney = $this->renderViewCart();
        $infoCart = $numItems . ' x items | <span class="red">TOTAL: ' . $totalMoney . ' $' . '</span>';
        echo json_encode(array('cartInfo' => $infoCart));
        exit();
    }

    /**
     * @description load form customer information
     * 
     * @author ThaiNV 
     * @since 09/11/2013
     */
    public function loadFormInfo(&$aryQty) {
        //check if empty cart
        $inIsOk = 1;
        if (empty($_SESSION['cart'])) {
            $inIsOk = -1;
        }
        //Mảng số lượng
        $_SESSION['aryQty'] = $_POST['qty'];
        $form = file_get_contents('http://' . $_SERVER['SERVER_NAME'] . '/shopFlowers/application/default/views/shoppingCart/formInfo.php');
        echo json_encode(array('form' => $form));
        exit();
    }

    /**
     * @description load form customer information
     * 
     * @author ThaiNV 
     * @since 09/11/2013
     */
    public function loadPaymentMethod(&$aryCusInfo) {
        //Mảng thông tin khách hàng
        $_SESSION['aryCus'] = $_POST;
        
        $payView = $this->renderPayMethod();
        echo json_encode(array('view' => $payView));
        exit();
    }

    /**
     * @description render view of Payment Method
     * 
     * @author ThaiNV 
     * @since 09/11/2013
     */
    public function renderPayMethod() {
        //Mảng phương thức thanh toán
        $aryPayMethod = $this->getPayMethod();
        $payView = "<form id='frmPayMethod'>";
        $payView .= "<h1>Phuong thuc thanh toan</h1>";
        foreach ($aryPayMethod as $value) {
            $payView .= "<h3><input value='" . $value['pay_id'] . "' type='radio' name='methodName' id='" . $value['pay_id'] . "'>" . $value['name'] . "</h3>";
            $payView .= "<p>" . $value['content'] . "</p>";
            $payView .= "<p>" . $value['image'] . "</p>";
        }
        $payView .='<input type="button" class="register" value="Complete" onclick="DefaultController.saveOrder();" style="margin-right: 15px;" />';
        $payView .='<input type="button" class="register" value="Back" onclick="DefaultController.loadFormCustom();" style="margin-right: 15px;" />';
        $payView .= '</form>';
        return $payView;
    }

    /**
     * @description get list payment method
     * 
     * @author ThaiNV 
     * @since 09/11/2013
     */
    public function getPayMethod() {
        $payMethod = new Default_Models_tblPaymentMethod();
        $aryPayment = $payMethod->getPayment();
        return $aryPayment;
    }

    /**
     * @description save customer information
     * 
     * @author ThaiNV 
     * @since 09/11/2013
     */
    public function saveOrderInfo() {
        //Địa chỉ giao nhận
        $aryCusInfo = $_SESSION['aryCus'];
        //Kiểm tra lại địa chỉ nhận hàng
        $aryReceived = $this->reCheckCusInfo($aryCusInfo);
        
        //Thông tin sản phẩm
        $aryQty = $_SESSION['aryQty'];
        //Phương thức thanh toán
        $payId = $_POST['payId'];
        //Lưu hóa đơn
        $order = new Default_Models_tblOrder();
        $order->saveOrder($aryReceived, $payId);
    }

    /**
     * @description :kiểm tra xem người thanh toán và người nhận hàng 
     *               có là một không.
     * 
     * @author ThaiNV 
     * @since 09/11/2013
     */
    public function reCheckCusInfo($aryCusInfo) {
        $aryReceived['name'] = ($aryCusInfo['txtRec_name '] == '') ? $aryCusInfo['txtCus_firtName'] : $aryCusInfo['txtRec_name'];
        $aryReceived['email'] = ($aryCusInfo['txtRec_email'] == '') ? $aryCusInfo['txtCus_email'] : $aryCusInfo['txtRec_email'];
        $aryReceived['adress'] = ($aryCusInfo['txtRec_adress'] == '') ? $aryCusInfo['txtCus_adrres'] : $aryCusInfo['txtRec_adress'];
        $aryReceived['phone'] = ($aryCusInfo['txtRec_phone'] == '') ? $aryCusInfo['txtCus_phone'] : $aryCusInfo['txtRec_phone'];
        return $aryReceived;
    }

}