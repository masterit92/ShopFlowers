$(document).ready(function() {

});
/**
 * @desc: Manager infomation in client of News
 * 
 * @author: ThaiNV
 * @since: 04-11-2013
 */
var NewsController = {
    controller: 'news',
    /**
     * @desc: get list news
     * 
     * @author: ThaiNv
     * @since:04-11-2013
     */
    getListNews: function() {
        var url = ROOT_URL + '/admin/' + NewsController.controller + '/listNews';
        $.ajax({
            type: 'post',
            url: url,
            success: function(data) {
                var obj = $.parseJSON(data);
                $('#data-return').html(obj.html);
            }
        });
    }

};

