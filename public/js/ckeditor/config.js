/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'en';
	// config.uiColor = '#AADC6E';
    config.filebrowserBrowseUrl = '/elfinder/ckeditor';
};
CKEDITOR.on( 'dialogDefinition', function( ev ) {
    // Take the dialog name and its definition from the event data.
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;

    // Check if the definition is from the dialog window you are interested in (the "Link" dialog window).
    if ( dialogName == 'image' ) {
        // Get a reference to the "Link Info" tab.
        var advancedTab = dialogDefinition.getContents( 'advanced' );

        // Set the default value for the URL field.
        var classField = advancedTab.get( 'txtGenClass' );
        classField[ 'default' ] = 'img-responsive';
    }
});