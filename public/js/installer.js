//AJAX call to submit and install
$(document).ready(function(){
    var formdata = '';
    //console.log(formdata);
    $.ajax({
        type: "POST",
        url: "/installer/run",
        data: formdata,
        dataType: "json",
        success: function(response) {
            window.location.href = "/installer/finish";
        },
        fail : function() {
            window.location.href = "/installer/fail";
        }
    });
});