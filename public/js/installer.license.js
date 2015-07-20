$(document).ready(function(){
    $("#application_license").change(function()
    {
        if(this.checked)
        {
            $("#btn_next").removeAttr("disabled");
        }
        else
        {
            $("#btn_next").attr("disabled", "disabled");
        }
    });
});