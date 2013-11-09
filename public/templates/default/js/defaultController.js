$(document).ready(function() {

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
                DefaultController.callBackAddToCart(data);
            }
        });
    },
    /**
     * @description call back addToCart
     *
     * @author ThaiNV 
     * @since 09/11/2013
     */
    callBackAddToCart: function(data) {
        var obj = $.parseJSON(data);
        if (obj.intIsOk === 1) {
            $(".left_content").html(obj.cart);
        } else {
            $(".left_content").html('Error');
        }
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
                DefaultController.callBackShowCart(data);
            }
        });
    },
    /**
     * @description call back showCart
     *
     * @author ThaiNV 
     * @since 09/11/2013
     */
    callBackShowCart: function(data) {
        var obj = $.parseJSON(data);
        $(".left_content").html(obj.cart);

    }
};