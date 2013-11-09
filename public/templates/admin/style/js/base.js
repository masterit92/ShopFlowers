$(document).ready(function() {

});
/**
 *@desc: base javascript function
 *
 *@author: ThaiNV
 *@since: 06/11/2013 
 */
var BaseController = {
    /**
     * @desc: confirm to delete one record
     * 
     * @author: ThaiNV
     * @since: 06/11/2013
     */

    deleteOneRecord: function(msg, url) {
        if (confirm("Bạn có chắc chắn muốn xóa  " + msg + "?")) {
            window.location.href = url;
        }
    },
    /**
     * @desc: check all record
     * 
     * @author: ThaiNV
     * @since: 06/11/2013
     */
    checkAll: function() {
        var headCheck = document.getElementById('checkAll');
        var listCheck = document.getElementsByName('checkOne[]');
        if (headCheck.checked) {
            for (var i = 0; i < listCheck.length; i++) {
                listCheck[i].checked = true;
            }
        } else {
            for (i = 0; i < listCheck.length; i++) {
                listCheck[i].checked = false;
            }
        }
    },
    /**
     * @desc: confirm to delete multi record
     * 
     * @author: ThaiNV
     * @since: 06/11/2013
     */
    deleteMultiRecord: function(controller, action) {
        var isCheck = 0;
        var aryValue = new Array();
        var listCheck = document.getElementsByName('checkOne[]');
        for (var i = 0; i < listCheck.length; i++) {
            if (listCheck[i].checked === true) {
                isCheck = 1;
            }
        }
        if (isCheck === 0) {
            alert('Chưa có bản ghi nào được chọn');
            return false;
        } else {
            for (var j = 0; j < listCheck.length; j++) {
                if (listCheck[j].checked === true) {
                    var valueItems = listCheck[j].value;
                    aryValue.push(valueItems);
                }
            }
            var listRecordForDel = aryValue.join(',');
            if (listRecordForDel) {
                if (confirm('Bạn có chắc chắn muốn xóa các bản ghi đã chọn ?')) {
                    window.location.href = controller + '/' + action + '&listId=' + listRecordForDel;
                }
            }
        }
    },
    /**
     * @desc: process sending infomation to public search
     * 
     * @author: ThaiNV
     * @since: 06/11/2013
     */
    searchPublic: function(controller) {
        var keyWord = document.getElementById('publicKey_word').value;
        keyWord = (keyWord !== '') ? keyWord : '%';
        window.location.href = ROOT_URL + '/admin/index/searchPublic?controller=' + controller + '&keyWord=' + keyWord;
    },
    addClass: function() {
        $("#testMenu").addClass('active');
    }
};