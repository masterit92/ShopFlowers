$(document).ready(function() {

});
var NewsController = {
    validateFormData: function() {
        var startDate = document.getElementById('date-start').value;
        var endDate = document.getElementById('date-end').value;
        var title = document.getElementById('news-title').value;
        var content = document.getElementById('news-content').value;
        var errMes = '';
        var intIsOk = 1;
        if (startDate === '') {
            errMes += 'Start date must be not null\n';
            intIsOk = -1;
        }
        if (endDate === '') {
            errMes += 'End date must be not null\n';
            intIsOk = -1;
        }
        if (Date.compare(startDate, endDate) === 1) {
            errMes += 'Start date must be less than end date\n';
            intIsOk = -1;
        }
        if (title === '') {
            errMes += 'Title must be not null\n';
            intIsOk = -1;
        }
        if (content === '') {
            errMes += 'Content must be not null\n';
            intIsOk = -1;
        }
        if (intIsOk === -1) {
            alert(errMes);
            return false;
        } else {
            return true;
        }
    },
};

