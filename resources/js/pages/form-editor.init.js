/*
Template Name: ZOPA - Food Drop
Author: Web Mahal Web Service
Website: https://webmahal.com/
Contact: webmahal@gmail.com
File: Form editor Init Js File
*/


ClassicEditor
    .create( document.querySelector( '#ckeditor-classic' ) )
    .then( function(editor) {
        editor.ui.view.editable.element.style.height = '200px';
    } )
    .catch( function(error) {
        console.error( error );
    } );


