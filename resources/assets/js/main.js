$('#select2').select2({
    placeholder: 'Choose'
});
$('div.alert').not('.alert-important').delay(5000).fadeOut(300);
$('#flash-overlay-modal').modal();
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});