/**
 * Copyright (c) 2015 JNET.VN
 * Hieu ung chuyen dong cho div khi loading
 *
 * Tac gia : Sang Nguyen
 *
 * Mail: sangnguyendev@gmail.com
 * https://docs.jnet.vn/div-animated
 */

// Mo mot popup
CKEDITOR.dialog.add( 'abbrDialog', function( editor ) {
	return {

		// Tieu de va size cua popup
		title: 'Hiệu ứng loading',
		minWidth: 400,
		minHeight: 200,

		// Noi dung popup
		contents: [
			{
				// Noi dung tab setting
				id: 'tab-basic',
				label: 'Basic Settings',

				// The tab content.
				elements: [
					
					{
						// select
						type: 'select',
						id: 'title',
						label: 'Chọn hiệu ứng',
						items: [ [ 'bounce' ], [ 'flash' ], [ 'pulse' ], [ 'rubberBand' ] ],
						'default': 'bounce',
					
					}
				]
			},

			// Tab huong dan
			{
				id: 'tab-adv',
				label: 'Hướng dẫn',
				elements: [
					{
						// Noi dung huoong dan, co the dung the html
						type: 'html',
						id: 'id',
						html: '<h3>Để xem chi tiết về chức năng này vui lòng truy cập <a target="_blank" href="https://docs.jnet.vn/div-animated">https://docs.jnet.vn/div-animated</a></h3><br><center style="text-align: center;"><img src="https://jnet.vn/template/frontend-admin/1/images/logo-j-44.png"/><br><i>JNET.VN</i></center>'
					}
				]
			}
		],

		// Function khi user click Ok
		onOk: function() {

	
			// http://docs.ckeditor.com/#!/api/CKEDITOR.dialog
			var dialog = this;

			// tao mot the div
			var abbr = editor.document.createElement( 'div' );

			// lay doan text da boi den - Author: Sang Nguyen
			var select = editor.getSelectedHtml();
			
			// extract doan boi den
			var selected = editor.extractSelectedHtml(select);
			// alert(selected);		
			
			// set class cho noi dung da duoc boi den
	
		
			abbr.setAttribute( 'class', 'wow animated ' + dialog.getValueOf( 'tab-basic', 'title' ) );
		
			abbr.setText( selected );

			

			// Cuoi cung chen Element vao o soan thao :)
			
			editor.insertElement( abbr );
		}
	};
});