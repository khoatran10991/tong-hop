<style>
.panel-heading {
	    cursor: pointer;
}
</style>
<script src="template/backend/1/jquery-minicolors/jquery.minicolors.js"></script>
<link rel="stylesheet" href="template/backend/1/jquery-minicolors/jquery.minicolors.css">
<?php if(isset($message)&& $message != "") : ?>
	<p class="alert alert-success"><?php echo $message; ?></p>
	<?php endif; ?>
<div class="xs" style="margin-bottom:100px">

  	         <div class="tab-content" style="margin-left:20px">
  	         			<form action="" method="post">
  	         			<div class="col-sm-12">
  	         				<!-- logo -->
  	         				<div class="col-sm-8">
		  	         			<div class="panel-group">
								    <div class="panel panel-default">
								      <div class="panel-heading" data-toggle="collapse" href="#editlogo">
								        <h4 class="panel-title">
								          Thay Đổi Logo
								        </h4>
								      </div>
								      <div id="editlogo" class="panel-collapse collapse active collapse in">
								        <div class="panel-body">
								        	<div class="form-group">
												<div class="col-sm-2" id="logo-img">
													<?php 
														if(isset($layout['logo']) && $layout['logo'] != '') :
															echo '<img src="'.$layout['logo'].'"  class="img-responsive" />';
														endif;
													?>
													
												</div>
												<div class="col-sm-10">	
										        	<div class="row row-padding">
														
														<div class="content">
															<div class="form-group">
																
																<div class="col-sm-6">
																	<input name="upload_logo" type="text" class="form-control1" id="upload_logo" value="<?php echo (isset($layout['logo']) && $layout['logo'] != '') ? $layout['logo'] : "" ?>">
																</div>
																<div class="col-sm-6">
																	<div style="margin:10px 0px 0px 0px" title="Chọn ảnh" id="anhdaidien" onclick="openLibImages(this)" class="col-sm-12 col-sm-offset-2"><a href="javascript:void()">Chọn ảnh</a></div>
																</div>
																
															</div>
														</div>
													</div>
				
										        	<p class="help-block">Hỗ Trợ Các File PNG|GIF|JPG - Kích thước không quá 5MB.</p>
										  				
										        </div>
			
										     </div>
					
								        </div>
								        
								      </div>
								    </div>
							    </div>
							  </div>
							  <!-- / logo -->
							  <!-- Favicon -->
							  <div class="col-sm-8">
		  	         			<div class="panel-group">
								    <div class="panel panel-default">
								      <div class="panel-heading" data-toggle="collapse" href="#editfavicon">
								        <h4 class="panel-title">
								          Favicon
								        </h4>
								      </div>
								      <div id="editfavicon" class="panel-collapse collapse active collapse in">
								        <div class="panel-body">
								        	<div class="form-group">
												<div class="col-sm-2" id="favicon-img">
													<?php 
														if(isset($layout['favicon']) && $layout['favicon'] != '') :
															echo '<img src="'.$layout['favicon'].'"  class="img-responsive" />';
														endif;
													?>
													
												</div>
												<div class="col-sm-10">	
									        	<div class="row row-padding">
														
														<div class="content">
															<div class="form-group">
																
																<div class="col-sm-6">
																	<input name="upload_favicon" type="text" class="form-control1" id="upload_favicon" value="<?php echo (isset($layout['favicon']) && $layout['favicon'] != '') ? $layout['favicon'] : "" ?>">
																</div>
																<div class="col-sm-6">
																	<div style="margin:10px 0px 0px 0px" title="Chọn favicon" id="favicon" onclick="openLibImages2(this)" class="col-sm-12 col-sm-offset-2"><a href="javascript:void()">Chọn ảnh</a></div>
																</div>
																
															</div>
														</div>
													</div>
										        </div>
										     </div>  
					
								        </div>
								        
								      </div>
								    </div>
							    </div>
							  </div>
							  <!-- / favicon -->
							  <!-- home setting -->
							  <div class="col-sm-8">
		  	         			<div class="panel-group">
								    <div class="panel panel-default">
								      <div class="panel-heading" data-toggle="collapse" href="#edithome">
								        <h4 class="panel-title">
								          Trang chủ
								        </h4>
								      </div>
								      <div id="edithome" class="panel-collapse collapse active collapse in">
								        <div class="panel-body">
								        	<div class="form-group">
												
												<div class="col-sm-10">
													<div class="radio">
														<label><input checked class="layout" id="default" type="radio" name="homedisplay" value="default">Mặc định theo giao diện nâng cao</label>
													</div>
													<div class="radio">
														<label><input <?php echo ($layout['homedisplay'] == 'page' ? "checked" : "") ?> class="layout" id="page" type="radio" name="homedisplay" value="page">Một trang tĩnh</label>
													</div>
													<div class="row" id="select-page" style="display: <?php echo ($layout['homedisplay'] == 'page' ? "block" : "none") ?>">
														 <label for="sel1">Chọn trang:</label>
														  <select class="form-control" id="sel1" name="homepage">
														   	<?php 
														   		if($pages) :
															   		foreach ($pages as $page) :
															   			if($layout['homepage'] == $page->id_page)
															   				echo "<option selected value='".$page->id_page."'>".$page->page_name."</option>";
															   			else 
															   				echo "<option  value='".$page->id_page."'>".$page->page_name."</option>";
															   		endforeach;
														   		
														   		
														   		else :
														   			echo "<option disabled value='0'>Không có trang nào</option>";
														   		endif;
														   	?>
														  </select>
													</div>
															
												</div>
											
											</div>	
					
								        </div>
								        
								      </div>
								    </div>
							    </div>
							  </div>
							  <!-- / home setting -->
							  <!-- color settings -->
							  <div class="col-sm-8">
		  	         			<div class="panel-group">
								    <div class="panel panel-default">
								      <div class="panel-heading" data-toggle="collapse" href="#editcolor">
								        <h4 class="panel-title">
								          Màu sắc
								        </h4>
								      </div>
								      <div id="editcolor" class="panel-collapse collapse active collapse in">
								        <div class="panel-body">
								        	<div class="form-group">
												
												<div class="col-sm-10">
													<h5><b>Màu nền:</b></h5>
													<div class="radio">
														<label><input checked class="background" id="colordefault" type="radio" name="background" value="default">Mặc định theo giao diện</label>
													</div>
													<div class="radio">
														<label><input <?php echo ($layout['background'] == 'color' ? "checked" : "") ?> class="background" id="selectcolor" type="radio" name="background" value="color">Chọn màu</label>
													</div>
													<div class="radio">
														<label><input <?php echo ($layout['background'] == 'image' ? "checked" : "") ?> class="background" id="selectimage" type="radio" name="background" value="image">Ảnh nền</label>
													</div>
													<div class="row" id="select-color" style="display: <?php echo ($layout['background'] == 'color' ? "block" : "none") ?>">
														 <label for="sel1">Chọn màu:</label>
														  <input class="color minicolors-input" style="height: 30px;" type="text" name="chosecolor" value="<?php echo (isset($layout['bgcolor']) && $layout['bgcolor'] != '' ? $layout['bgcolor'] : "#274EBB") ?>">
													</div>
													<div class="row" id="select-image" style="display: <?php echo ($layout['background'] == 'image' ? "block" : "none") ?>">
														 
														  <div class="col-sm-8"> 	
														    <label for="sel1">Hình nền:</label>
														  	<input class="form-control1" type="text" id="choseimage" name="choseimage" value="<?php echo (isset($layout['bgimage']) && $layout['bgimage'] != '' ? $layout['bgimage'] : "") ?>">
														  </div>
														  <div class="col-sm-4">
																	<div style="margin:35px" title="Chọn ảnh nền" id="backgroundimage" onclick="openLibImages3(this)" class="col-sm-12 col-sm-offset-2"><a href="javascript:void()">Chọn ảnh</a></div>
														  </div>
													</div>
															
												</div>
											
											</div>	
					
								        </div>
								        
								      </div>
								    </div>
							    </div>
							  </div>
							  <!-- / color settings -->
  	         			  </div>
						  <div class="row" id="horizontal-form" style="margin-top: 10px">
							<div class="col-sm-2">
							</div>
							<div class="col-sm-10">
								<input type="submit" class="btn btn-primary" name="submit_save_change_353ff0ae11ewd" value="Áp dụng" style="">
							</div>
								
					
								
					     </div>
							
					</form>
  				</div>
 </div>
 <script>
 function openLibImages(div) {
	    window.KCFinder = {
	        callBack: function(url) {
	            var urlfull = "{url_site}" + "" + url;
	        
	            window.KCFinder = null;
	          
	            $("div#logo-img").html("<img src='" + urlfull + "' class='img-responsive' />");
	            $("#upload_logo").val(urlfull);
	           
	        }
	    };
	    window.open('{url_site}/editor/kcfinder/browse.php?type=images&lang=vi&dir=images/',
	        'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
	        'directories=0, resizable=1, scrollbars=0, width=800, height=600'
	    );
	}
 function openLibImages2(div) {
	    window.KCFinder = {
	        callBack: function(url) {
	            var urlfull = "{url_site}" + "" + url;
	         
	            window.KCFinder = null;
	          
	            $("div#favicon-img").html("<img src='" + urlfull + "' class='img-responsive' />");
	            $("#upload_favicon").val(urlfull);
	           
	        }
	    };
	    window.open('{url_site}/editor/kcfinder/browse.php?type=images&lang=vi&dir=images/',
	        'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
	        'directories=0, resizable=1, scrollbars=0, width=800, height=600'
	    );
	}
 function openLibImages3(div) {
	    window.KCFinder = {
	        callBack: function(url) {
	            var urlfull = "{url_site}" + "" + url;
	         
	            window.KCFinder = null;
	 
	            $("#choseimage").val(urlfull);
	           
	        }
	    };
	    window.open('{url_site}/editor/kcfinder/browse.php?type=images&lang=vi&dir=images/',
	        'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
	        'directories=0, resizable=1, scrollbars=0, width=800, height=600'
	    );
	}
 $(function(){
	    $('.layout').click(function(){
	        if ($("#page").is(':checked')) {
			  $("#select-page").show();	

		           
	           return true;
	        }  else {
	        	$("#select-page").hide();		
	        }    
	        
	   
	   })

	    
	});
 $(function(){
	   $('.background').click(function(){
	        if ($("#selectcolor").is(':checked')) {
			  $("#select-color").show();	
			  $("#select-image").hide();	
		           
	           return true;
	        }  else {
	        	$("#select-color").hide();		
	        }  
	        if ($("#selectimage").is(':checked')) {
				  $("#select-image").show();	
				  $("#select-color").hide();	
			           
		           return true;
		        }  else {
		        	$("#select-image").hide();		
		    }    
	        
	   
	   })
	 
	    
	});	
 $(document).ready( function() {

     $('.color').each( function() {
         //
         // Dear reader, it's actually very easy to initialize MiniColors. For example:
         //
         //  $(selector).minicolors();
         //
         // The way I've done it below is just for the demo, so don't get confused
         // by it. Also, data- attributes aren't supported at this time. Again,
         // they're only used for the purposes of this demo.
         //
         $(this).minicolors({
             control: $(this).attr('data-control') || 'hue',
             defaultValue: $(this).attr('data-defaultValue') || '',
             format: $(this).attr('data-format') || 'hex',
             keywords: $(this).attr('data-keywords') || '',
             inline: $(this).attr('data-inline') === 'true',
             letterCase: $(this).attr('data-letterCase') || 'lowercase',
             opacity: $(this).attr('data-opacity'),
             position: $(this).attr('data-position') || 'bottom left',
             change: function(hex, opacity) {
                 var log;
                 try {
                     log = hex ? hex : 'transparent';
                     if( opacity ) log += ', ' + opacity;
                     console.log(log);
                 } catch(e) {}
             },
             theme: 'default'
         });

     });

 });
 </script>