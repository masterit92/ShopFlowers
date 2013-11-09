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
                var obj = $.parseJSON(data);
                $(".left_content").html(obj.cart);
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
    }
};