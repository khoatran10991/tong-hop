<?php 
 function get_widget($id,$location = "",$options = "") {
	// widget san pham moi nhat
	extract($options);
	if($id == "productsnew") {
		$saveID = $id."-".$location;
		$html = '<div class="form-group">';
		$html .= '<label for="usr">Tiêu đề:</label>';
		$html .= '<input type="text" class="form-control" id="title-'.$id.'-'.$location.'" value="'.$title.'">';
		$html .= '</div>';
		$html .= '<div class="form-group">';
		$html .= '<label for="usr">Số sản phẩm hiển thị:</label>';
		$html .= '<input type="number" class="form-control" id="display-'.$id.'-'.$location.'" value="'.$display.'">';
		$html .= '</div>';
		$html .= '<div class="form-group" style="text-align:right">';
		$html .= '<a class="delete" onclick=delwidget("'.$saveID.'") href="javascript:void()">Xóa bỏ</a> ';
		
		$html .= '<button  id="'.$id.'" onclick=savechange("'.$saveID.'") class="btn btn-default" role="button">Lưu thay đổi</button>';
		$html .= '</div>';
	} else if ($id == "html") {
		$saveID = $id."-".$location;
		$html = '<div class="form-group">';
		$html .= '<label for="usr">Tiêu đề:</label>';
		$html .= '<input type="text" class="form-control" id="title-'.$id.'-'.$location.'" value="'.$title.'">';
		$html .= '</div>';
		$html .= '<div class="form-group">';
		$html .= '<label for="usr">Nội dung:</label>';
		$html .= '<textarea class="form-control" rows="5" id="content-'.$id.'-'.$location.'">'.$content.'</textarea>';
		$html .= '</div>';
		$html .= '<div id="1" class="form-group" style="text-align:right">';
		$html .= '<a class="delete" onclick=delwidget("'.$saveID.'") href="javascript:void()">Xóa bỏ</a> ';
		
		$html .= '<button id="'.$id.'" onclick=savechange("'.$saveID.'") class="btn btn-default" role="button">Lưu thay đổi</button>';
		$html .= '</div>';
	} else if ($id == "newspost") {
		$saveID = $id."-".$location;
		$html = '<div class="form-group">';
		$html .= '<label for="usr">Tiêu đề:</label>';
		$html .= '<input type="text" class="form-control" id="title-'.$id.'-'.$location.'" value="'.$title.'">';
		$html .= '</div>';
		$html .= '<div class="form-group">';
		$html .= '<label for="usr">Số bài viết hiển thị:</label>';
		$html .= '<input type="number" class="form-control" id="display-'.$id.'-'.$location.'" value="'.$display.'">';
		$html .= '</div>';
		$html .= '<div class="form-group">';
		if($thumnail == 1)
			$check = "checked";
		else 
			$check = "";
		
		$html .= '<label><input '.$check.' name="thumnail" id="thumnail" type="checkbox" value=""> Hiển thị thumnail</label>';
		$html .= '</div>';
		$html .= '<div class="form-group" style="text-align:right">';
		$html .= '<a class="delete" onclick=delwidget("'.$saveID.'") href="javascript:void()">Xóa bỏ</a> ';
		
		$html .= '<button  id="'.$id.'" onclick=savechange("'.$saveID.'") class="btn btn-default" role="button">Lưu thay đổi</button>';
		$html .= '</div>';
	} else {
		$html = "";
	}

	return $html;


}
?>
<script type="text/javascript" src="<?php echo $url_site ?>/template/backend/1/js/jquery-ui.min.js" ></script>
<script type="text/javascript">
var loading = '<i class="fa fa-refresh fa-spin"></i>';
function savechange(saveid) {
	//var id = $(this).attr('id');
	var arraykey = saveid.split("-");
	// arraykey[0] -> id
    // arraykey[1] -> location
    // arraykey[2] -> number
	

	$("#" + arraykey[1]).animate({
        
        opacity: '0.4'
   
     
    });
    
	$("#loading" + arraykey[1]).html(loading);	
	
    var widgetTitle = $("#widgettitle-" + arraykey[0] + "-" + arraykey[1] + "-" + arraykey[2]).html();
    
    var title = $("#title-" + arraykey[0] + "-" + arraykey[1] + "-" + arraykey[2]).val();
    var display = $("#display-" + arraykey[0] + "-" + arraykey[1] + "-" + arraykey[2]).val();
    var content = $("#content-" + arraykey[0] + "-" + arraykey[1] + "-" + arraykey[2]).val();
    var thumnail = "0";

    if ($("#thumnail-" + arraykey[0] + "-" + arraykey[1] + "-" + arraykey[2]).is(':checked')) {
    	thumnail = "1";
    }    
    
    
	$.post("<?php echo $url_site ?>/dashboard/template/savechangeAjax.html", {
		widget : arraykey[0],
		location :arraykey[1],
		title : title,
		display: display,
		content: content,
		widgetTitle : widgetTitle,
		thumnail : thumnail,
		number : arraykey[2]
		
	}, function(data) {
			  alert(data);



			$("#" + arraykey[1]).animate({
		        
		        opacity: '1'
		   
		     
		    });
			$("#loading" + arraykey[1]).html("");
	  
		});
	
}
function delwidget(boxID) {
	alert(boxID);
	var arraykey = boxID.split("-");
	
	$("#" + arraykey[1]).animate({
        
        opacity: '0.4'
   
     
    });
    
	$("#loading" + arraykey[1]).html(loading);	
	
	$.post("<?php echo $url_site ?>/dashboard/template/savechangeAjax.html", {
		type : "remove",
		widget : arraykey[0],
		location : arraykey[1]
		
	}, function(data) {
		$("#" + arraykey[1]).animate({
	        
	        opacity: '1'
	   
	     
	    });
	    
		$("#loading" + arraykey[1]).html("");	
		
			$("#box-" + arraykey[0] + "-" + arraykey[1]).remove();
		});
}

function addwidget(widgetID) {
	var location = $("#select" + widgetID).val();

	
	var arraykey = widgetID.split("-");

	alert(arraykey);
	if(location == 0)
		return false;
	var saveID =  widgetID + "-" + location;
	
	// test
	$("#widget" + widgetID).animate({
        
        opacity: '0.3'
   
     
    });
	$.post("<?php echo $url_site ?>/dashboard/template/addwidget.html", {
		type : "add",
		widget : widgetID,
		location : location,
	
		
	}, function(data) {
		$("#widget" + widgetID).animate({
		        
		        opacity: '1'
		   
		     
		    });
	    
			// alert(data);

			$("#draggablePanel-" + location).append(data);

			$("#select" + widgetID).val("0");
			$("#" + location).collapse('show');
			$("#widget" + widgetID).collapse('hide');
			
			$('html,body').animate({
		        scrollTop: $("#box-" + widgetID + "-"+location).offset().top},
		        'slow');
			
			});

}


jQuery(function($) {
    var panelList = $('#draggablePanel-home');
	var sortorder='';
    panelList.sortable({
        // Only make the .panel-heading child elements support dragging.
        // Omit this to make then entire <li>...</li> draggable.
        handle: '.panel-heading', 
        update: function() {

        
            $('.panel', panelList).each(function(index, elem) {
           
            	var columnId=$(this).attr('id');
            	
            	
                 var $listItem = $(elem),
                     newIndex = $listItem.index();

                 // Persist the new indices.
                alert(columnId);
            });
            
        }
    });
});



</script> 
<?php 
// 	$home = array(
// 		"productnews" => array (
// 			"widget_title" => "Sản phẩm mới",
// 			"widget_id" => "productnews",
// 			"title" => "San pham moi",
// 			"display" => 12,
// 			"content" => ""

// 		),
// 		"html" =>  array (
// 			"widget_title" => "Văn bản",
// 			"widget_id" => "html",
// 			"title" => "Chinh sach giao hang",
// 			"display" => 1,
// 			"content" => "<b>Vui long thanh toan</b>"	
// 		)	
// 	);
	
	
	 $home = json_decode($panel_home[0]->options,true);
	 $footer = json_decode($panel_footer[0]->options,true);


?>
<style type="text/css">
    /* show the move cursor as the user moves the mouse over the panel header.*/
    #draggablePanelList .panel-heading  {
        cursor: move;
    }
</style>

<div class="xs">
	<h4>Tùy chỉnh giao diện nâng cao</h4>
	<div class="row" style="padding-bottom: 50px;">
		<div class="col-sm-4" style="padding-top: 10px;">
			<b>Các box hiện có</b>
			<br>
			<p style="color:rgba(51, 51, 51, 0.78);padding-bottom:20px">Để kích hoạt một box, kéo thả vào các hộp chứa giao diện kế bên, để hủy kích hoạt kéo box đó ra khỏi hộp chứa.</p>
			
				<div class="panel-group" id="boxgroup">
				  <div class="panel panel-success boxitem">
				    <div class="panel-heading panel-jnet" data-toggle="collapse" data-parent="#boxgroup" href="#widgetnewspost">
				      <h4 class="panel-title">
				        
				        Bài viết mới nhất
				      </h4>
				    </div>
				    <div id="widgetnewspost" class="panel-collapse collapse ">
				      <div class="panel-body">
				      	<p>Hiển thị danh sách bài viết mới nhất, các chương trình khuyến mãi...</p>
				      	<div class="form-group">
						  <label for="sel1"><b>Thêm vào:</b></label>
						  <select class="form-control" id="selectnewspost" onchange="addwidget('newspost')">
						  	<option value="0">Chọn vị trí</option>
						    <option value="home">Trang chủ</option>
						    <option value="sidebarnews">Sidebar bài viết</option>
						    <option value="sidebarcate">Sidebar danh mục</option>
						    <option value="footer">Cuối trang</option>
						  </select>
						</div>
				      	
				      </div>
				    </div>
				  </div>
				  <div class="panel panel-success boxitem">
				    <div class="panel-heading panel-jnet" data-toggle="collapse" data-parent="#boxgroup" href="#widgetproductsnew">
				      <h4 class="panel-title">
				    
				        Danh sách sản phẩm
				      </h4>
				    </div>
				    <div id="widgetproductsnew" class="panel-collapse collapse">
				      <div class="panel-body">
				      	Hiển thị danh sách sản phẩm mới nhất, bán chạy nhất, hoặc theo 1 danh mục nào đó.
				      	<div class="form-group">
						  <label for="sel1"><b>Thêm vào:</b></label>
						  <select class="form-control" id="selectproductsnew" onchange="addwidget('productsnew')">
						  	<option value="0">Chọn vị trí</option>
						    <option value="home">Trang chủ</option>
						    <option value="sidebarnews">Sidebar bài viết</option>
						    <option value="sidebarcate">Sidebar danh mục</option>
						    <option value="footer">Cuối trang</option>
						  </select>
						</div>
				      </div>
				    </div>
				  </div>
				  <div class="panel panel-success boxitem">
				    <div class="panel-heading panel-jnet" data-toggle="collapse" data-parent="#boxgroup" href="#widgetfilter">
				      <h4 class="panel-title">
				      
				        Bộ lọc sản phẩm
				      </h4>
				    </div>
				    <div id="widgetfilter" class="panel-collapse collapse">
				      <div class="panel-body">
				      	Hiển thị bộ lọc sản phẩm theo giá, màu sắc, size...
				      </div>
				    </div>
				  </div>
				  <div class="panel panel-success boxitem">
				    <div class="panel-heading panel-jnet" data-toggle="collapse" data-parent="#boxgroup" href="#widgethtml">
				      <h4 class="panel-title">
				      
				        Văn bản
				      </h4>
				    </div>
				    <div id="widgethtml" class="panel-collapse collapse">
				      <div class="panel-body">
				      	Hiển thị một đoạn text hoặc mã HTML.
				      	<div class="form-group">
						  <label for="sel1"><b>Thêm vào:</b></label>
						  <select class="form-control" id="selecthtml" onchange="addwidget('html')">
						  	<option value="0">Chọn vị trí</option>
						    <option value="home">Trang chủ</option>
						    <option value="sidebarnews">Sidebar bài viết</option>
						    <option value="sidebarcate">Sidebar danh mục</option>
						    <option value="footer">Cuối trang</option>
						  </select>
						</div>
				      </div>
				    </div>
				  </div>
				</div>
		
		
		</div>
		<div class="col-sm-8">
			<div class="col-sm-6">
				<div class="panel-group" id="accordion">
				  <div class="panel panel-default panel-jnet">
				    
					    <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#home">
					    
					      <h3 class="panel-title location" >
					        
					        Trang chủ <span id="loadinghome"></span>
					      </h3>
					  
					    </div>
				    
				    <div id="home" class="panel-collapse collapse in">
				     	<ul id="draggablePanel-home" class="panel-group list-unstyled">
				     	
				     		<?php 
				     			foreach ($home as $box) :
				     			
				     		?>
						    <li class="panel panel-info" id="box-<?php echo $box['widget_id'] ?>-home">
						        <div id="widgettitle-<?php echo $box['widget_id'] ?>-home" class="panel-heading move" data-toggle="collapse" data-parent="#draggablePanel-home" href="<?php echo "#".$box['widget_id'] ?>"><?php echo $box['widget_title'] ?></div>
						        <div class="panel-body" id="<?php echo $box['widget_id'] ?>">
						        	<?php 
						        		$options = array(
						        			"title" => $box['title'],
											"display" => $box['display'],
											"content" => $box['content'],
											"thumnail" => $box['thumnail']		
						        		);
						        	?>
						        	<?php echo get_widget($box['widget_id'],"home",$options) ?>
						        
						        </div>
						    </li>
						    <?php 
						    	endforeach;
						    ?>
						 
						</ul>
				     
				    </div>
				  </div>
				  <div class="panel-group" id="accordion1">
					  <div class="panel panel-default panel-jnet">
					  	
						    <div class="panel-heading" data-toggle="collapse" data-parent="#accordion1" href="#sidebarpost">
						   	
						      <h3 class="panel-title location">
						        
						        Sidebar bài viết
						      </h3>
						     
						    </div>
					    
					    <div id="sidebarpost" class="panel-collapse collapse">
					      <div class="panel-body">
					      
					      
					      </div>
					    </div>
					  </div>
				  </div>
			
				</div>
			</div>
			<div class="col-sm-6">
				<div class="panel-group" id="accordion2">
					<div class="panel panel-default panel-jnet">
				  	
					    <div class="panel-heading" data-toggle="collapse" data-parent="#accordion2" href="#sidebarproduct">
					      
					      <h3 class="panel-title location">
					        
					        Sidebar danh mục
					      </h3>
					      
					    </div>
				    
				    <div id="sidebarproduct" class="panel-collapse collapse">
				      <div class="panel-body">
				      
				      
				      </div>
				    </div>
				  </div>
				</div>
			</div>
			
			<div class="col-sm-6">
				<div class="panel-group" id="boxfooter">
					<div class="panel panel-default panel-jnet">
				  	
					    <div class="panel-heading" data-toggle="collapse" data-parent="#footer" href="#footer">
					      
					      <h3 class="panel-title location">
					        
					        Cuối trang <span id="loadingfooter"></span>
					      </h3>
					      
					    </div>
				    
				    <div id="footer" class="panel-collapse collapse">
				       <ul id="draggablePanel-footer" class="panel-group list-unstyled">
				     	
				     		<?php 
				     			foreach ($footer as $box) :
				     			
				     		?>
						    <li class="panel panel-info" id="box-<?php echo $box['widget_id'] ?>-footer">
						        <div id="widgettitle-<?php echo $box['widget_id'] ?>-footer" class="panel-heading move" data-toggle="collapse" data-parent="#draggablePanelFooter" href="<?php echo "#Footer".$box['widget_id'] ?>"><?php echo $box['widget_title'] ?></div>
						        <div class="panel-body" id="<?php echo "Footer".$box['widget_id'] ?>">
						        	<?php 
						        		$options = array(
						        			"title" => $box['title'],
											"display" => $box['display'],
											"content" => $box['content'],
											"thumnail" => 1		
						        		);
						        	?>
						        	<?php echo get_widget($box['widget_id'],"footer",$options) ?>
						        
						        </div>
						    </li>
						    <?php 
						    	endforeach;
						    ?>
						  
						   
						</ul>
				    </div>
				  </div>
				</div>
			</div>
		
		
		
		</div>
	</div>
</div>

