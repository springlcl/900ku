/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    CKEDITOR.config.width = 'auto';
    CKEDITOR.config.height = 300;

    config.toolbar = 'Full';

    config.toolbar_Full = [
        ['Undo','Redo','-'],['Format'],
        ['Bold','Italic','Underline','RemoveFormat','-',],
        ['TextColor','BGColor'],
        ['NumberedList','BulletedList','-','Blockquote'],
        ['JustifyLeft','JustifyCenter','JustifyRight'],
        ['Link','Unlink'], ['Image','Table']
    ];
    config.enterMode = CKEDITOR.ENTER_BR //可选：CKEDITOR.ENTER_P或CKEDITOR.ENTER_DIV
    config.pasteFromWordIgnoreFontFace = true; //默认为忽略格式
    config.pasteFromWordRemoveStyle = false;
    config.image_previewText=' '; //图片预览区域显示内容
    config.filebrowserImageUploadUrl= "upload"; //待会要上传的action或servlet
    //config.filebrowserImageUploadUrl= "http://localhost/llsd/res/ckeditor/ImgUpload.action"; //要上传的action或servlet

};
