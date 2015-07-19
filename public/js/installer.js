//AJAX call to submit and install
$(document).ready(function(){
    $.ajaxPrefilter(function(options, originalOptions, jqXHR){
        if (options['type'].toLowerCase() === "post") {
            jqXHR.setRequestHeader('X-CSRF-TOKEN', $('input[name="_token"]').attr('value'));
        }
    });
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