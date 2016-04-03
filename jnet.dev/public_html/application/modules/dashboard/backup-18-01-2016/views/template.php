<?php 
$user_session=$this->session->userdata('user_session');
?>
<script type="text/javascript">
<!--
	function changecate() {
		var cate = $("#cate_template").val();
		if(cate) {
			$("#templatesList").html("<div style='min-height: 200px;' class='col-sm-12 col-md-12 text-center'><i style='font-size: 40px;' class='fa fa-spinner fa-pulse'></i></div>");

			$.post("<?php echo $user_session['url'] ?>/dashboard/GetlistTemplate/get_by_id_cate", {
				cate : cate
			}, function(data) {
					if(data == 0) {
						$("#templatesList").html("Chưa có giao diện trong thể loại này.");
					} else {
						$("#templatesList").html(data);
					}	
				
			  
				});
	
		}
		
	}
	function changeTheme(idtheme) {
		// alert(idtheme);
		$("span#btn-active").html('<i class="fa fa-cog fa-spin"></i> Đang chuyển...');
	
	}	
//-->
</script>
<div class="bs-example" data-example-id="thumbnails-with-custom-content">
	<div class="row container">
		<div class="col-lg-2">
			<h3>Giao diện <span class="number-templates">5</span></h3>
		</div>
		<div class="col-lg-4">
	        <div class="input-group">
	          <input type="text" class="form-control" placeholder="Tìm kiếm giao diện">
	          <span class="input-group-btn">
	            <button class="btn btn-default" type="button">Go!</button>
	          </span>
	        </div><!-- /input-group -->
        </div>
        <div class="col-lg-4">
        	<div class="form-group">
		      <select onchange="changecate();" class="form-control" id="cate_template" name="cate_template">
		       <option value="0">Tất cả thể loại</option>
		       <?php 
		       	foreach ($cate_templates as $cate) {
		       ?>
		        <option value="<?php echo $cate->id_template ?>"><?php echo $cate->name_template ?></option>
		        
		        <?php 
		        }
		        ?>
		      </select>
		 
		    </div>
        </div>
	</div>
    <div class="row" id="templatesList">
	    <?php
	    	foreach ($templates as $tem) {		
	    ?>
	      <div class="col-sm-6 col-md-4">
	        <div class="thumbnail box-template">
	          <a data-toggle="modal" data-target="#themeModal<?php echo $tem->id_theme ?>" href="#themeModal<?php echo $tem->id_theme ?>">
	          	<img  class="img-responsive" data-src="<?php echo $tem->link_screenshot ?>screenshot.png" alt="100%x200" src="<?php echo  $tem->link_screenshot ?>screenshot.png" data-holder-rendered="true" style="height: 300px; width: 100%; display: block;">
	          </a>
	          <div class="caption">
	            <h4><?php echo $tem->name; ?></h4>
	            <span class="catelogy-templates"><i class="fa fa-tag"></i> Loại: Thương mại điện tử</span>
	            <p style="margin-top: 10px;">
	            	<button  id="1" data-toggle="modal" data-target="#themeModal<?php echo $tem->id_theme ?>" class="btn btn-primary" role="button">Sử dụng</button> 
	            	<button id="1" data-toggle="modal" data-target="#themeModal<?php echo $tem->id_theme ?>" class="btn btn-default" role="button">Chi tiết</button>
	            </p>
	          </div>
	        </div>
	      </div>
	      <!-- Modal -->
		  <div class="modal fade" id="themeModal<?php echo $tem->id_theme ?>" role="dialog">
		    <div class="modal-dialog modal-lg">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header" style="border-bottom: none;">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          
		        </div>
		        <div class="modal-body">
		          <div class="row">
		          	<div class="col-sm-12 col-sm-6">
		          		<img class="img-responsive" src="<?php echo $tem->link_screenshot ?>screenshot.png" />
		          	</div>
		          	<div class="col-sm-12 col-sm-6">
		          		<h2>Giao diện <?php echo $tem->name; ?></h2> <span class="catelogy-templates"> Phiên bản: 1.0</span> 
		          		<span class="hint">Bởi: JNET Theme team</span>
		          		<br>
		          			<?php echo $tem->description; ?>
		          		<br>
		          		<hr>
		          		<p>
			          		JNET sẽ hướng dẫn và hỗ trợ bạn sử dụng giao diện trong suốt thời gian vận hành website.
							<br>
							Bạn còn thắc mắc, vui lòng liên hệ 01225.335.001
							<br>
							Hoặc: <a href="mailto:websupport@jnet.vn">websupport@jnet.vn</a>
						</p>
		          	</div>
		          
		          </div>
		        </div>
		        <div class="modal-footer" style="text-align: center">
		          <button onclick="changeTheme(<?php echo $tem->id_theme ?>);"  class="btn btn-primary" role="button"><span id="btn-active">Kích hoạt</span></button>
		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      
		        </div>
		      </div>
		      
		    </div>
		  </div>
		  <!-- end Modal -->
	      
	      <?php 
	      	}
	      ?>
  
    </div>
 </div>
 