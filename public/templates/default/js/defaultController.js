$(document).ready(function() {
    $('#areaDelivery').hide();
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
                $(".left_content").html(obj.form);
            }
        });
    },
    /**
     * @description save customer information
     *
     * @author ThaiNV 
     * @since 09/11/2013
     */
    saveOrder: function() {
        var url = BASE_URL + '/shoppingCart/saveOrderInfo';
        var data = $('#frm-Customer').serialize();
        $.ajax({
            type: "post",
            url: url,
            data: data,
            success: function(data) {

            }
        });
    }
};