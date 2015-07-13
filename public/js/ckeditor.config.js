CKEDITOR.editorConfig = function( config ) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';
    config.skin = 'bootstrapck';

};
$(document).ready(function(){
    CKEDITOR.replace( '.wysiwyg', {
        filebrowserBrowseUrl : '/elfinder/ckeditor',
        filebrowserImageBrowseUrl : '/elfinder/ckeditor'
    });
});