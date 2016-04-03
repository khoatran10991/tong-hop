
<script type="text/javascript" >
$(function(){
	
	$('.column').sortable({
		connectWith: '.column',
		handle: 'h2',
		cursor: 'move',
		placeholder: 'placeholder',
		forcePlaceholderSize: true,
		opacity: 0.8,
		start: function( event, ui ) {
			//alert("Start");
		},
		stop: function(event, ui){
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
			$.get("<?php echo $url_site ?>/dashboard/template/save_change_ajax_layout.html", {
			sortorder: sortorder
			
			}, function(data) {
				
				if(data != 1)
					jnetnotice('Không có sự thay đổi !');
				else 
					jnetnotice('Cập nhật bố cục trang web thành công !');		
				NProgress.done();		
		  
			});
		
			/*Pass sortorder variable to server using ajax to save state*/
		}
	})
	.disableSelection();
});
	
</script>
<style>
	.panel-body {
    	padding: 5px;
	}
	.panel-default {
		border-color: #ddd;	
	}
	.panel-default:hover {
	   box-shadow: none;
	}
	.panel .panel-heading {
		text-align: center;	
	}
	.content-center {
		padding: 15px;
		text-align: center;
		min-height: 52px;
		cursor: no-drop;
	}
	.icon-edit-box:hover {
		cursor: pointer;
	}
	.fa {
		font-size: 15px;
	}
	
</style>

	<h4>Cấu hình hiển thị trang chủ</h4>
	<?php 
		//echo "<pre>";
		//	print_r($site_widgets);
		//echo "</pre>";
	 ?>
	<p style="color:rgba(51, 51, 51, 0.78);padding-bottom:20px">Để kích hoạt một box, kéo thả vào các hộp chứa giao diện trang chủ kế bên, để hủy kích hoạt kéo nó ra khỏi hộp chứa.</p>
	<div class="row" style="padding: 20px;">
		<div class="col-sm-3" style="border: 1px solid #ddd;padding-top:20px;padding-bottom:20px;margin-bottom: 20px">
			<b style="margin-top: 20px">Các chức năng hiện có</b><br>
			
			<div class="column panel-default" id="system_widgets">
				<?php 
					if(isset($site_widgets['system_widgets'])) :
						foreach($site_widgets['system_widgets'] as $system_widgets) : ?>
							<?php 
								if(isset($widgets)) :
									foreach($widgets as $box) : ?>
										<?php if($system_widgets == $box->id_widget) : ?>
												<div class="dragbox" id="<?php echo $box->id_widget ?>" >
													<h2 class="panel-title-box"><?php echo $box->name_widget ?> 
														<?php if($box->edit == 1) : ?>
														<?php if($box->linkEdit == NULL) : 
																$linkedit = $url_site."/dashboard/template/layout.html?editbox=".$box->id_widget;
																//$linkedit = "javascript:load_html('$box->id_widget')";
															  else :
															  	$linkedit = $url_site.$box->linkEdit;	
															  endif;	
														?>
														<span style="float: right"><a title="Chỉnh sửa hiển thị <?php echo $box->name_widget ?>" class="icon-edit-box" href="<?php echo $linkedit ?>"><i class="fa fa-pencil-square-o"></i></a>
														</span>
														<?php endif; ?>
													</h2>
												</div>
										<?php endif; ?>
							<?php		
									endforeach;
								
								endif;
							
							?>
				<?php 
						endforeach;
					endif;	
				?>	
				
			</div>
		</div>
		<div class="col-sm-9">
			<div class="col-sm-12">
				<div class="panel panel-default">
				  <div class="panel-heading">Trang chủ đang hiển thị</div>
				  <div class="panel-body column" id="trangchu" >
						<?php 
							if(isset($site_widgets['trencung'])) :
								foreach($site_widgets['trencung'] as $trencung) : ?>
								<?php
									foreach($widgets as $widget) :
										if($trencung == $widget->id_widget) :
								?>
								
								 
											<div class="dragbox" id="<?php echo $widget->id_widget ?>" >
												<h2 class="panel-title-box"><?php echo $widget->name_widget ?> 
													<?php if($widget->edit == 1) : ?>
													<?php if($widget->linkEdit == NULL) : 
															$linkedit = $url_site."/dashboard/template/layout.html?editbox=".$widget->id_widget;
														  else :
														  	$linkedit = $url_site.$widget->linkEdit;	
														  endif;	
													?>
													<span style="float: right"><a title="Chỉnh sửa hiển thị <?php echo $widget->name_widget ?>" class="icon-edit-box" href="<?php echo $linkedit ?>"><i class="fa fa-pencil-square-o"></i></a>
													</span>
													<?php endif; ?>
												</h2>
											</div>
								<?php 
									 	endif;
									endforeach;
									
									
								
								?>
								
						<?php		
								endforeach;
							
							endif;
							
							
						
						?>
				  	
				  </div>
				</div>
				
			</div>
			
				
			
	 </div>
</div>	


	