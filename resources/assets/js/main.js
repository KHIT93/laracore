$('.select2').select2({
    placeholder: 'Choose'
});
$('.select2-basic').select2({
    minimumResultsForSearch: Infinity
});
/*$('input[type="checkbox"].checkbox').checkbox({
    buttonStyle: 'btn-link btn-large',
    checkedClass: 'icon-check',
    uncheckedClass: 'icon-check-empty'
});*/
$('div.alert').not('.alert-important').delay(5000).fadeOut(300);
$('#flash-overlay-modal').modal();
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});