
<link rel="stylesheet" type="text/css" href="<?php echo $url_site ?>/template/backend/1/drappanel/styles.css" />
<script language=javascript1.2><!--
function disableselect(e){
return false
}
function reEnable(){
return true
}
//if IE4+
document.onselectstart=new Function ("return false")
//if NS6
if (window.sidebar){
document.onmousedown=disable-select
document.onclick=reEnable
}
//-->
</script>
<script type="text/javascript" >

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
<div class="xs" style="">



	<h4>Bố cục trang web </h4>
	<?php 
		//echo "<pre>";
		//	print_r($site_widgets);
		//echo "</pre>";
	 ?>
	<p style="color:rgba(51, 51, 51, 0.78);padding-bottom:20px">Để kích hoạt một box, kéo thả vào các hộp chứa giao diện kế bên, để hủy kích hoạt kéo box đó ra khỏi hộp chứa.</p>
	<div class="row" style="padding: 20px;">
		<div class="col-sm-3 system" style="border: 1px solid #ddd;padding-top:20px;padding-bottom:20px;margin-bottom: 20px">
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
																$linkedit = $url_site."/dashboard/template/widgets.html?".md5('editbox')."=".$box->id_widget;
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
			<!--banner trượt trái--->
			<div class="col-sm-6">
				<div class="panel panel-default">
				  <div class="panel-heading">Banner trượt trái</div>
				  <div class="panel-body column" id="truottrai" >
						<?php 
							if(isset($site_widgets['truottrai'])) :
								foreach($site_widgets['truottrai'] as $truottrai) : ?>
								<?php
									foreach($widgets as $widget) :
										if($truottrai == $widget->id_widget) :
								?>
								
								 
											<div class="dragbox" id="<?php echo $widget->id_widget ?>" >
												<h2 class="panel-title-box"><?php echo $widget->name_widget ?> 
													<?php if($widget->edit == 1) : ?>
													<?php if($widget->linkEdit == NULL) : 
															$linkedit = $url_site."/dashboard/template/widgets.html?".md5('editbox')."=".$widget->id_widget;
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
			<!--banner trượt phải--->
			
			<div class="col-sm-6">
				<div class="panel panel-default">
				  <div class="panel-heading">Banner trượt phải</div>
				  <div class="panel-body column" id="truotphai" >
						<?php 
							if(isset($site_widgets['truotphai'])) :
								foreach($site_widgets['truotphai'] as $truotphai) : ?>
								<?php
									foreach($widgets as $widget) :
										if($truotphai == $widget->id_widget) :
								?>
								
								 
											<div class="dragbox" id="<?php echo $widget->id_widget ?>" >
												<h2 class="panel-title-box"><?php echo $widget->name_widget ?> 
													<?php if($widget->edit == 1) : ?>
													<?php if($widget->linkEdit == NULL) : 
															$linkedit = $url_site."/dashboard/template/widgets.html?".md5('editbox')."=".$widget->id_widget;
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
			<!--kết thúc banner trượt 2 bên--->
			
			
			<div class="col-sm-12">
				<div class="panel panel-default">
				  <div class="panel-heading">Vị trí trên cùng</div>
				  <div class="panel-body column" id="trencung" >
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
															$linkedit = $url_site."/dashboard/template/widgets.html?".md5('editbox')."=".$widget->id_widget;
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
			<div class="col-sm-12">
				<div class="panel panel-default" >
				  <div class="panel-heading" style="padding: 0px;height: 20px;">Trình đơn</div>
				</div>
				
			</div>
			<div class="col-sm-12">
				<div class="panel panel-default">
				  <div class="panel-heading">Vị trí trên (Chỉ hiện trang chủ)</div>
				  <div class="panel-body " >
				  		<div class="col-sm-9 column" id="trentrai" style="border:1px solid #ddd;min-height: 40px" >
				  			<?php 
							if(isset($site_widgets['trentrai'])) :
								foreach($site_widgets['trentrai'] as $trentrai) : ?>
								<?php
									foreach($widgets as $widget) :
										if($trentrai == $widget->id_widget) :
								?>
								
								 
											<div class="dragbox" id="<?php echo $widget->id_widget ?>" >
												<h2 class="panel-title-box"><?php echo $widget->name_widget ?> 
													<?php if($widget->edit == 1) : ?>
													<?php if($widget->linkEdit == NULL) : 
															$linkedit = $url_site."/dashboard/template/widgets.html?".md5('editbox')."=".$widget->id_widget;
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
				  		<div class="col-sm-3 column" id="trenphai" style="border:1px solid #ddd;min-height: 40px">
				  			<?php 
							if(isset($site_widgets['trenphai'])) :
								foreach($site_widgets['trenphai'] as $trenphai) : ?>
								<?php
									foreach($widgets as $widget) :
										if($trenphai == $widget->id_widget) :
								?>
								
								 
											<div class="dragbox" id="<?php echo $widget->id_widget ?>" >
												<h2 class="panel-title-box"><?php echo $widget->name_widget ?> 
													<?php if($widget->edit == 1) : ?>
													<?php if($widget->linkEdit == NULL) : 
															$linkedit = $url_site."/dashboard/template/widgets.html?".md5('editbox')."=".$widget->id_widget;
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
			<div class="col-sm-row">
				<div class="col-sm-3">
					<div class="panel panel-default" id="trai">
					  <div class="panel-heading">Vị trí trái</div>
					  <div class="panel-body column" id="trai" style="min-height: 255px;">
					  	<?php 
							if(isset($site_widgets['trai'])) :
								foreach($site_widgets['trai'] as $trai) : ?>
								<?php
									foreach($widgets as $widget) :
										if($trai == $widget->id_widget) :
								?>
								
								 
											<div class="dragbox" id="<?php echo $widget->id_widget ?>" >
												<h2 class="panel-title-box"><?php echo $widget->name_widget ?> 
													<?php if($widget->edit == 1) : ?>
													<?php if($widget->linkEdit == NULL) : 
															$linkedit = $url_site."/dashboard/template/widgets.html?".md5('editbox')."=".$widget->id_widget;
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
				<div class="col-sm-6">
					<div class="row">
						<div class="panel panel-default">
						  <div class="panel-heading">Vị trí trên nội dung các trang</div>
						  <div class="panel-body column" id="trennoidung">
						  	<?php 
								if(isset($site_widgets['trennoidung'])) :
									foreach($site_widgets['trennoidung'] as $trennoidung) : ?>
									<?php
										foreach($widgets as $widget) :
											if($trennoidung == $widget->id_widget) :
									?>
									
									 
												<div class="dragbox" id="<?php echo $widget->id_widget ?>" >
													<h2 class="panel-title-box"><?php echo $widget->name_widget ?> 
														<?php if($widget->edit == 1) : ?>
														<?php if($widget->linkEdit == NULL) : 
																$linkedit = $url_site."/dashboard/template/widgets.html?".md5('editbox')."=".$widget->id_widget;
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
					<div class="row">
						<div class="panel panel-default">
						  <div class="panel-heading">Nội dung giữa (chỉ hiện trang chủ)</div>
						  <div class="panel-body column" id="trangchu">
						  	<?php 
								if(isset($site_widgets['trangchu'])) :
									foreach($site_widgets['trangchu'] as $trangchu) : ?>
									<?php
										foreach($widgets as $widget) :
											if($trangchu == $widget->id_widget) :
									?>
									
									 
												<div class="dragbox" id="<?php echo $widget->id_widget ?>" >
													<h2 class="panel-title-box"><?php echo $widget->name_widget ?> 
														<?php if($widget->edit == 1) : ?>
														<?php if($widget->linkEdit == NULL) : 
																$linkedit = $url_site."/dashboard/template/widgets.html?".md5('editbox')."=".$widget->id_widget;
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
					<div class="row">
						<div class="panel panel-default">
						  <div class="panel-heading">Vị trí dưới nội dung các trang</div>
						  <div class="panel-body column" id="duoinoidung">
						  	<?php 
								if(isset($site_widgets['duoinoidung'])) :
									foreach($site_widgets['duoinoidung'] as $duoinoidung) : ?>
									<?php
										foreach($widgets as $widget) :
											if($duoinoidung == $widget->id_widget) :
									?>
									
									 
												<div class="dragbox" id="<?php echo $widget->id_widget ?>" >
													<h2 class="panel-title-box"><?php echo $widget->name_widget ?> 
														<?php if($widget->edit == 1) : ?>
														<?php if($widget->linkEdit == NULL) : 
																$linkedit = $url_site."/dashboard/template/widgets.html?".md5('editbox')."=".$widget->id_widget;
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
				<div class="col-sm-3">
					<div class="panel panel-default">
					  <div class="panel-heading">Vị trí phải</div>
					  <div class="panel-body column" id="phai" style="min-height: 255px;">
					  	<?php 
								if(isset($site_widgets['phai'])) :
									foreach($site_widgets['phai'] as $phai) : ?>
									<?php
										foreach($widgets as $widget) :
											if($phai == $widget->id_widget) :
									?>
									
									 
												<div class="dragbox" id="<?php echo $widget->id_widget ?>" >
													<h2 class="panel-title-box"><?php echo $widget->name_widget ?> 
														<?php if($widget->edit == 1) : ?>
														<?php if($widget->linkEdit == NULL) : 
																$linkedit = $url_site."/dashboard/template/widgets.html?".md5('editbox')."=".$widget->id_widget;
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
			
			<div class="col-sm-12">
				<div class="panel panel-default">
				  <div class="panel-heading">Vị trí cuối trang</div>
				  <div class="panel-body column" id="cuoitrang">
				  	<?php 
							if(isset($site_widgets['cuoitrang'])) :
								foreach($site_widgets['cuoitrang'] as $cuoitrang) : ?>
								<?php
									foreach($widgets as $widget) :
										if($cuoitrang == $widget->id_widget) :
								?>
								
								 
											<div class="dragbox" id="<?php echo $widget->id_widget ?>" >
												<h2 class="panel-title-box"><?php echo $widget->name_widget ?> 
													<?php if($widget->edit == 1) : ?>
													<?php if($widget->linkEdit == NULL) : 
															$linkedit = $url_site."/dashboard/template/widgets.html?".md5('editbox')."=".$widget->id_widget;
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

</div>
	