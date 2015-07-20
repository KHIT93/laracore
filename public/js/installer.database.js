$(document).ready(function(){
    $("#sqlsrv_notes").hide();
    $("#sqlite_notes").hide();
    $('.DB_DRIVER').change(function()
    {
        if(this.checked)
        {
            if($(this).attr("value") == "sqlite")
            {
                $(":text").attr('disabled', 'disabled');
                $("#sqlite_notes").show();
                $("#sqlsrv_notes").hide();
            }
            else if($(this).attr("value") == "sqlsrv")
            {
                $(":text").removeAttr('disabled');
                $("#sqlsrv_notes").show();
                $("#sqlite_notes").hide();
            }
            else
            {
                $(":text").removeAttr('disabled');
                $("#sqlsrv_notes").hide();
                $("#sqlite_notes").hide();
            }
        }
    });
});