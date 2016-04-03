$(function() {

    $('#side-menu').metisMenu();

});
$(function(){
	
	$('.column').sortable({
		connectWith: '.column',
		handle: 'h2',
		cursor: 'move',
		placeholder: 'placeholder',
		forcePlaceholderSize: true,
		opacity: 0.000000001,
		start: function( event, ui ) {
			$(ui.item).find('h2').click();
			
			//alert("Start");
			$('.column').css('border','1px dashed rgb(6, 217, 149)');
			$('#system_widgets').css('border','1px dashed red');
		},
		stop: function(event, ui){
			$('.system').css('opacity',0.5);
			$('.column').css('border','none');
			$('#system_widgets').css('border','none');
			$(ui.item).find('h2').click();
			var sortorder='';
			var layoutarray = new Array();
			$('.column').each(function(){
				var itemorder=$(this).sortable('toArray');
				var columnId=$(this).attr('id');
				//if(itemorder == "")
					//itemorder= "blank";
				sortorder+=columnId+'='+itemorder.toString()+'&';
			});
			
			
			
			//alert('SortOrder: '+sortorder);
			NProgress.start();
			$.get("dashboard/template/save_change_ajax_layout.html", {
			sortorder: sortorder
			
			}, function(data) {
				
				if(data != 1)
					jnetnotice('Không có sự thay đổi !');
				else 
					jnetnotice('Cập nhật bố cục trang web thành công !');		
				NProgress.done();
				$('.system').css('opacity',1 );		
		  
			});
		
			/*Pass sortorder variable to server using ajax to save state*/
		}
	})
	.disableSelection();
});
	
//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    var element = $('ul.nav a').filter(function() {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }).addClass('active').parent().parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }
});
