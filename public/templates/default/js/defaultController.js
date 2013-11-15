$(document).ready(function() {
    DefaultController.getInfoCart();
});
/**
 * @description Base javascript controller of default
 *
 * @author ThaiNV 
 * @since 09/11/2013
 */

var DefaultController = {
    /**
     * @description get pro_id and sent to sever to get data return
     *
     * @author ThaiNV 
     * @since 09/11/2013
     */
    addToCart: function(proId) {
        var url = BASE_URL + '/ShoppingCart/addProToCart';
        var data = proId;
        $.ajax({
            type: "post",
            url: url,
            data: 'proId=' + data,
            success: function(data) {
                DefaultController.showCart();
            }
        });
    },
    /**
     * @description show shopping cart
     *
     * @author ThaiNV 
     * @since 09/11/2013
     */
    showCart: function() {
        var url = BASE_URL + '/ShoppingCart/showCart';
        $.ajax({
            type: 'post',
            url: url,
            success: function(data) {
                var obj = $.parseJSON(data);
                $(".left_content").html(obj.cart);
                $(".home_cart_content").html(obj.cartInfo);
            }
        });
    },
    getInfoCart: function() {
        var url = BASE_URL + '/ShoppingCart/getCartInfo';
        $.ajax({
            type: 'post',
            url: url,
            success: function(data) {
                var obj = $.parseJSON(data);
                $(".home_cart_content").html(obj.cartInfo);
            }
        });
    },
    /**
     * @description delete products from cart
     *
     * @author ThaiNV 
     * @since 09/11/2013
     */
    deleteCart: function(proId) {
        var url = BASE_URL + '/ShoppingCart/deleteCart';
        var data = proId;
        $.ajax({
            type: "post",
            url: url,
            data: "proId=" + data,
            success: function(data) {
                DefaultController.showCart();
            }
        });
    },
    /**
     * @description update cart
     *
     * @author ThaiNV 
     * @since 09/11/2013
     */
    updateCart: function() {
        var url = BASE_URL + '/ShoppingCart/updateCart';
        var data = $('#frmCart').serialize();
        $.ajax({
            type: "post",
            url: url,
            data: data,
            success: function(data) {
                DefaultController.showCart();
            }
        });
    },
    /**
     * @description load form customer
     *
     * @author ThaiNV 
     * @since 09/11/2013
     */
    loadFormCustom: function() {
        var url = BASE_URL + '/shoppingCart/loadFormInfo';
        var data = $('#frmCart').serialize();
        $.ajax({
            type: "post",
            url: url,
            data: data,
            success: function(data) {
                var obj = $.parseJSON(data);
                if (obj.intIsOk == -1) {
                    alert('Cart is empty');
                    DefaultController.showCart();
                    return false;
                } else {
                    $(".left_content").html(obj.form);
                    if (obj.view !== '') {
//                        $('.guestInfomartion').hide();
                        $('.guestInfomartion').empty();
                        $(".customerInformation").html(obj.view);
                    }
                }
            }
        });
    },
    /**
     * @description load payment method
     *
     * @author ThaiNV 
     * @since 09/11/2013
     */
    loadPaymentMethod: function() {
        var email = $('.txtCus_email').val();
        var phone = $('.txtCus_phone').val();
        var errMes = '';
        var doLoad = 1;
        var emailPattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
        var phonePattern = /^\+?\d{2}[- ]?\d{3}[- ]?\d{5}$/;
        if ($('.txtCus_firtName').val() === '') {
            errMes += 'First name must be not null\n';
            doLoad = -1;
        }
        if ($('.txtCus_lastName').val() === '') {
            errMes += 'Last name must be not null\n';
            doLoad = -1;
        }
        if (email === '') {
            errMes += 'Email must be not null\n';
            doLoad = -1;
        }
        if (email !== '' && !email.match(emailPattern)) {
            errMes += 'Email invalid\n';
            doLoad = -1;
        }
        if (phone === '') {
            errMes += 'Phone must be not null\n';
            doLoad = -1;
        }
        if (phone !== '' && !phone.match(phonePattern)) {
            errMes += 'Phone invalid\n';
            doLoad = -1;
        }
        if ($('.txtCus_adrres').val() === '') {
            errMes += 'Adress must be not null\n';
            doLoad = -1;
        }
        if ($('.txtDelivery_date').val() === '') {
            errMes += 'Delivery date must be not null\n';
            doLoad = -1;
        }
        if (doLoad === -1) {
            alert(errMes);
            return false;
        } else {
            var url = BASE_URL + '/shoppingCart/loadPaymentMethod';
            var data = $('#frm-Customer').serialize();
            $.ajax({
                type: "post",
                url: url,
                data: data,
                success: function(data) {
                    var obj = $.parseJSON(data);
                    $(".left_content").html(obj.view);
                }
            });
        }
    },
    /**
     * @description save customer information
     *
     * @author ThaiNV 
     * @since 09/11/2013
     */
    saveOrder: function() {
        var url = BASE_URL + '/shoppingCart/saveOrderInfo';
        //Lấy phương thức thanh toán
        var payId = $('input[name=methodName]:checked', '#frmPayMethod').val();
        $.ajax({
            type: "post",
            url: url,
            data: 'payId=' + payId,
            success: function(data) {
                var obj = $.parseJSON(data);
                $(".home_cart_content").html(obj.cartInfo);
                $(".left_content").html(obj.bill);
            }
        });
    }



};