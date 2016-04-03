<?php 
extract($colorsetting); 
$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>
<script src="<?php echo $url_site ?>/template/backend/1/jquery-minicolors/jquery.minicolors.js"></script>
<link rel="stylesheet" href="<?php echo $url_site ?>/template/backend/1/jquery-minicolors/jquery.minicolors.css" />
<link href="<?php echo $url_site ?>/template/frontend-users/styles/box.css" rel='stylesheet' type='text/css' />
<script src="<?php echo $url_site ?>/template/backend/1/rangeslider/rangeslider.js"></script>
<link rel="stylesheet" href="<?php echo $url_site ?>/template/backend/1/rangeslider/rangeslider.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $url_site ?>/template/backend/1/fancybox/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="<?php echo $url_site ?>/template/backend/1/fancybox/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="<?php echo $url_site ?>/template/backend/1/fancybox/jquery.observe_field.js"></script>   

<style>
.btn-default {
	background-color: #F5F5F5;
	padding: 13px;
}
.btn-default:hover {
	background-color: #337ab7;
	color:white;
}
.jnetactive {
	background-color: #337ab7 !important;
	color:white !important;
}
</style>


<div class="xs" style="padding: 10px 20px 20px 20px">
	<?php $this->load->view('template/menu.php') ?>
	
	<div class="row" id="loadhtml" style="padding: 20px;">
							
							<form action="" method="post">
 							<!-- color box settings -->
							  <div class="col-sm-8">
							  	<?php if(isset($message) && $message != 'error' && $message != '') : ?>
								<div class="alert alert-info" role="alert"> <strong><i class="fa fa-check"></i></strong><?php echo $message; ?></div>
								<?php elseif(isset($message) && $message== "error") :?>
								<div class="alert alert-danger" role="alert"> <strong><i class="fa fa-exclamation"></i></strong> Lỗi, không thể cập nhật ! 										</div>
								<?php endif; ?>
		  	         			<div class="panel-group">
								    <!--panel-->
								    <div class="panel panel-default">
								      <div class="panel-heading" data-toggle="collapse">
								        <h4 class="panel-title" style="float: left;width:50%">
								          Nền trang web
								 		</h4>
								        
								        
								      </div>
								      <div id="background" class="panel-collapse collapse active collapse in">
								        <div class="panel-body">
								        	<div class="form-group">
												
												<div class="col-sm-10">
													<h5><b>Màu nền:</b></h5>
													<div class="radio">
														<label><input <?php if(isset($background['type']) && $background['type'] == 'default') echo "checked" ?> class="background" id="colordefault" type="radio" name="background[type]" value="default">Mặc định theo giao diện</label>
													</div>
													<div class="radio" id="select-color" style="">
														 <label><input <?php if(isset($background['type']) && $background['type'] == 'color') echo "checked" ?> class="background" id="color" type="radio" name="background[type]" value="color">
														 	Chọn màu
														 </label>
														  <input class="color minicolors-input" style="height: 30px;" type="text" name="background[color]" value="<?php if(isset($background['color']) && $background['color'] != '') echo $background['color'] ?>">
													</div>
													<div class="radio" id="select-color" style="">
														 <label><input <?php if(isset($background['type']) && $background['type'] == 'image') echo "checked" ?> class="background" id="color" type="radio" name="background[type]" value="image">
														 	Hình ảnh nền <input name="background[image]" type="text" class="form-control111" id="upload_background" value="<?php if(isset($background['image']) && $background['image'] != '') echo $background['image'] ?>" >
														 	 <div style="margin:10px 0px 0px 0px;float: right;width: 100px;" title="Chọn ảnh" id="anhdaidien"  class="col-sm-12 col-sm-offset-2"><a class="upload_btn" href="editor/filemanager/popup.aspx?type=1&amp;field_id=upload_background&amp">Chọn ảnh</a>
															  </div>		
														 </label>
														  
														  
													</div>
												    <h5><b>Màu nền nội dung:</b></h5>
													<div class="radio">
														<label><input <?php if(isset($backgroundcontent['type']) && $background['type'] == 'default') echo "checked" ?> class="background" id="colordefault" type="radio" name="backgroundcontent[type]" value="default">Mặc định theo giao diện</label>
													</div>
													<div class="radio" id="select-color" style="">
														 <label><input <?php if(isset($backgroundcontent['type']) && $backgroundcontent['type'] == 'color') echo "checked" ?> class="background" id="color" type="radio" name="backgroundcontent[type]" value="color">
														 	Chọn màu
														 </label>
														  <input class="color minicolors-input" style="height: 30px;" type="text" name="backgroundcontent[color]" value="<?php if(isset($backgroundcontent['color']) && $backgroundcontent['color'] != '') echo $backgroundcontent['color'] ?>">
													</div>
															
												</div>
											
											</div>	
					
								        </div>
								        
								      </div>
								    </div>
								    <!--end panel-->
								    <!--panel-->
								    <div class="panel panel-default">
								      <div class="panel-heading" data-toggle="collapse" href="#widget">
								        <h4 class="panel-title">
								          Màu sắc các box
								        </h4>
								      </div>
								      <div id="widget" class="panel-collapse collapse active collapse in">
								        <div class="panel-body">
								        	<div class="form-group">
												
												<div class="col-sm-8">
													<h5><b>Màu nền tiêu đề:</b></h5>
													<div class="radio">
														<label><input <?php if(isset($boxtitle['background']['type']) && $boxtitle['background']['type'] == 'default') echo 'checked'; ?> class="background" id="colordefault" type="radio" name="boxtitle[background][type]" value="default">Mặc định theo giao diện</label>
													</div>
													<div class="radio" id="select-color" style="">
														 <label><input <?php if(isset($boxtitle['background']['type']) && $boxtitle['background']['type'] == 'color') echo 'checked'; ?> class="background" id="color" type="radio" name="boxtitle[background][type]" value="color">
														 	Chọn màu
														 </label>
														  <input id="box_title_background" class="color minicolors-input" style="height: 30px;" type="text" name="boxtitle[background][color]" value="<?php if(isset($boxtitle['background']['color']) && $boxtitle['background']['color'] != '') echo $boxtitle['background']['color']; ?>">
													</div>
													<h5><b>Màu chữ tiêu đề:</b></h5>
													<div class="radio">
														<label><input <?php if(isset($boxtitle['title']['type']) && $boxtitle['title']['type'] == 'default') echo 'checked'; ?> class="background" id="colordefault" type="radio" name="boxtitle[title][type]" value="default">Mặc định theo giao diện</label>
													</div>
													<div class="radio" id="select-color" style="">
														 <label><input <?php if(isset($boxtitle['title']['type']) && $boxtitle['title']['type'] == 'color') echo 'checked'; ?> class="background" id="color" type="radio" name="boxtitle[title][type]" value="color">
														 	Chọn màu
														 </label>
														  <input id="box_title_color" class="color minicolors-input" style="height: 30px;" type="text" name="boxtitle[title][color]" value="<?php if(isset($boxtitle['title']['color']) && $boxtitle['title']['color'] != '') echo $boxtitle['title']['color']; ?>">
													</div>
													<h5><b>Viền ngoài:</b></h5>
													
													<div class="radio" id="box_select_border" style="">
													   
														 <label>
														 	Độ bo tròn <a><?php if(isset($boxtitle['radius']['size']) && $boxtitle['radius']['size'] != '') echo $boxtitle['radius']['size']; else echo 5; ?></a>
														 </label>
													
														 <div class="col-sm-8">
														 	<input name="boxtitle[radius][size]" id="box_input_border_radius" type="range" min="0"  max="40"  step="1" value="<?php if(isset($boxtitle['radius']['size']) && $boxtitle['radius']['size'] != '') echo $boxtitle['radius']['size']; else echo 5; ?>" data-orientation="vertical">
														 </div>
							
													</div>
													<h5><b>Icon:</b></h5>
													
													<div class="radio select_icon" id="select_iconbox" style="">
														 <label><input <?php if(!isset($boxtitle['icon']['class']) || $boxtitle['icon']['class'] == '') echo 'checked'; ?> class="iconbox"  type="radio" name="boxtitle[icon][class]" value="">Không dùng</label>
														 <label><input <?php if(isset($boxtitle['icon']['class']) && $boxtitle['icon']['class'] == 'fa fa-align-justify') echo 'checked'; ?> class="iconbox"  type="radio" name="boxtitle[icon][class]" value="fa fa-align-justify"> <i class="fa fa-align-justify"></i></label>	
														 <label><input  <?php if(isset($boxtitle['icon']['class']) && $boxtitle['icon']['class'] == 'fa fa-chain-broken') echo 'checked'; ?> class="iconbox"  type="radio" name="boxtitle[icon][class]" value="fa fa-chain-broken"> <i class="fa fa-chain-broken"></i></label>
														 <label><input  <?php if(isset($boxtitle['icon']['class']) && $boxtitle['icon']['class'] == 'fa fa-th-large') echo 'checked'; ?>  class="iconbox"  type="radio" name="boxtitle[icon][class]" value="fa fa-th-large"> <i class="fa fa-th-large"></i></label>		
														 <label><input  <?php if(isset($boxtitle['icon']['class']) && $boxtitle['icon']['class'] == 'fa fa-check') echo 'checked'; ?> class="iconbox"  type="radio" name="boxtitle[icon][class]" value="fa fa-check"> <i class="fa fa-check"></i></label>
														 <label><input  <?php if(isset($boxtitle['icon']['class']) && $boxtitle['icon']['class'] == 'fa fa-check-circle-o') echo 'checked'; ?> class="iconbox"  type="radio" name="boxtitle[icon][class]" value="fa fa-check-circle-o"> <i class="fa fa-check-circle-o"></i></label>					
														 <label><input <?php if(isset($boxtitle['icon']['class']) && $boxtitle['icon']['class'] == 'fa fa-yelp') echo 'checked'; ?>  class="iconbox"  type="radio" name="boxtitle[icon][class]" value="fa fa-yelp"> <i class="fa fa-yelp"></i></label>	 
														 <label><input <?php if(isset($boxtitle['icon']['class']) && $boxtitle['icon']['class'] == 'fa fa-heart') echo 'checked'; ?> class="iconbox"  type="radio" name="boxtitle[icon][class]" value="fa fa-heart"> <i class="fa fa-heart"></i></label>
														 <label><input <?php if(isset($boxtitle['icon']['class']) && $boxtitle['icon']['class'] == 'fa fa-angle-double-right') echo 'checked'; ?> class="iconbox"  type="radio" name="boxtitle[icon][class]" value="fa fa-angle-double-right"> <i class="fa fa-angle-double-right"></i></label>
														 <label><input <?php if(isset($boxtitle['icon']['class']) && $boxtitle['icon']['class'] == 'fa fa-hand-o-right') echo 'checked'; ?> class="iconbox"  type="radio" name="boxtitle[icon][class]" value="fa fa-hand-o-right"> <i class="fa fa-hand-o-right"></i></label>		
														 <label><input <?php if(isset($boxtitle['icon']['class']) && $boxtitle['icon']['class'] == 'fa fa-car') echo 'checked'; ?> class="iconbox"  type="radio" name="boxtitle[icon][class]" value="fa fa-car"> <i class="fa fa-car"></i></label>	 
														 <label><input <?php if(isset($boxtitle['icon']['class']) && $boxtitle['icon']['class'] == 'fa fa-file') echo 'checked'; ?> class="iconbox"  type="radio" name="boxtitle[icon][class]" value="fa fa-file"> <i class="fa fa-file"></i></label>	 
														 <label><input <?php if(isset($boxtitle['icon']['class']) && $boxtitle['icon']['class'] == 'fa fa-arrows') echo 'checked'; ?> class="iconbox"  type="radio" name="boxtitle[icon][class]" value="fa fa-arrows"> <i class="fa fa-arrows"></i></label>
													</div>
													
												
															
												</div>
												<div class="col-sm-4">
													<div class="widgetbox">
														<div class="boxtitle" id="boxtitle" style="<?php if(isset($boxtitle['background']['type']) && $boxtitle['background']['type'] == 'color') echo 'background: '.$boxtitle['background']['color'].';'; if(isset($boxtitle['radius']['size']) && $boxtitle['radius']['size'] != '') {echo 'border-top-left-radius: '.$boxtitle['radius']['size'].'px;';echo 'border-top-right-radius: '.$boxtitle['radius']['size'].'px;';}  ?>">
															
															<h4 id="boxtitle_h4" style="<?php if(isset($boxtitle['title']['type']) && $boxtitle['title']['type'] != 'default') echo 'color:'.$boxtitle['title']['color'];?>"><?php if(isset($boxtitle['icon']['class']) && $boxtitle['icon']['class'] != '') echo '<i class="'.$boxtitle['icon']['class'].'"></i>'; ?> Tiêu đề box</h4>
															
														</div>
														<div class="boxcontent">
															Nội dung box
														</div>
													</div>
												</div>
												<div class="col-sm-12">
														<p style="font-size: 14px;color: #777">! Đây là những icon cho các box chung, bạn có thể cài đặt icon riêng cho từng box trong <b>bố cục trang web</b> -> Chọn chĩnh sửa 1 box</p>
														
												</div>
											</div>	
					
								        </div>
								        
								      </div>
								    </div>
								    <!--end panel-->
								    <!--panel-->
								    <div class="panel panel-default">
								      <div class="panel-heading" data-toggle="collapse" href="#button">
								        <h4 class="panel-title">
								          Các nút và button
								        </h4>
								      </div>
								      <div id="button" class="panel-collapse collapse active collapse in">
								        <div class="panel-body">
								        	<div class="form-group">
												
												<div class="col-sm-8">
													<h5><b>Màu nền button:</b></h5>
													
													<div class="radio" id="select-color" style="">
														 <label>
														 	Chọn màu
														 </label>
														  <input id="button_background" class="color minicolors-input" style="height: 30px;" type="text" name="button[color][background]" value="<?php if(isset($button['color']['background']) && $button['color']['background'] != '') echo $button['color']['background']; ?>">
													</div>
													<h5><b>Màu nền khi rê chuột:</b></h5>
													
													<div class="radio" id="select-color" style="">
														 <label>
														 	Chọn màu
														 </label>
														  <input id="button_hover" class="color minicolors-input" style="height: 30px;" type="text" name="button[color][hover]" value="<?php if(isset($button['color']['hover']) && $button['color']['hover'] != '') echo $button['color']['hover']; ?>">
													</div>
													<h5><b>Viền ngoài:</b></h5>
													
													<div class="radio" id="button_select_border" style="">
													   
														 <label>
														 	Độ bo tròn <a><?php if(isset($button['radius']['size']) && $button['radius']['size'] != '') echo $button['radius']['size']; else echo 5; ?></a>
														 </label>
													
														 <div class="col-sm-8">
														 	<input name="button[radius][size]" id="button_input_border_radius" type="range" min="0"  max="40"  step="1" value="<?php if(isset($button['radius']['size']) && $button['radius']['size'] != '') echo $button['radius']['size']; else echo 5; ?>" data-orientation="vertical">
														 </div>
							
													</div>
													<h5><b>Icon:</b></h5>
													
													<div class="radio select_icon" id="select_iconbutton" style="">
														 <label><input <?php if(!isset($button['icon']['class']) || $button['icon']['class'] == 'default' || $button['icon']['class'] =='' ) echo 'checked'; ?> class="iconbutton"  type="radio" name="button[icon][class]" value="default">Không dùng</label>
														 <label><input <?php if(isset($button['icon']['class']) && $button['icon']['class'] == 'fa fa-cart-arrow-down') echo 'checked'; ?>  class="iconbutton"  type="radio" name="button[icon][class]" value="fa fa-cart-arrow-down"> <i class="fa fa-cart-arrow-down"></i></label>	
														 <label><input <?php if(isset($button['icon']['class']) && $button['icon']['class'] == 'fa fa-shopping-cart') echo 'checked'; ?> class="iconbutton"  type="radio" name="button[icon][class]" value="fa fa-shopping-cart"> <i class="fa fa-shopping-cart"></i></label>
														 <label><input <?php if(isset($button['icon']['class']) && $button['icon']['class'] == 'fa fa-plus') echo 'checked'; ?>  class="iconbutton"  type="radio" name="button[icon][class]" value="fa fa-plus"> <i class="fa fa-plus"></i></label>		
														 <label><input <?php if(isset($button['icon']['class']) && $button['icon']['class'] == 'fa fa-check') echo 'checked'; ?> class="iconbutton"  type="radio" name="button[icon][class]" value="fa fa-check"> <i class="fa fa-check"></i></label>
														 <label><input <?php if(isset($button['icon']['class']) && $button['icon']['class'] == 'fa fa-check-circle-o') echo 'checked'; ?> class="iconbutton"  type="radio" name="button[icon][class]" value="fa fa-check-circle-o"> <i class="fa fa-check-circle-o"></i></label>					
														 <label><input <?php if(isset($button['icon']['class']) && $button['icon']['class'] == 'fa fa-yelp') echo 'checked'; ?> class="iconbutton"  type="radio" name="button[icon][class]" value="fa fa-yelp"> <i class="fa fa-yelp"></i></label>	 
														 <label><input <?php if(isset($button['icon']['class']) && $button['icon']['class'] == 'fa fa-heart') echo 'checked'; ?> class="iconbutton"  type="radio" name="button[icon][class]" value="fa fa-heart"> <i class="fa fa-heart"></i></label>
														 <label><input <?php if(isset($button['icon']['class']) && $button['icon']['class'] == 'fa fa-angle-double-right') echo 'checked'; ?> class="iconbutton"  type="radio" name="button[icon][class]" value="fa fa-angle-double-right"> <i class="fa fa-angle-double-right"></i></label>
														 <label><input <?php if(isset($button['icon']['class']) && $button['icon']['class'] == 'fa fa-hand-o-right') echo 'checked'; ?> class="iconbutton"  type="radio" name="button[icon][class]" value="fa fa-hand-o-right"> <i class="fa fa-hand-o-right"></i></label>		 
													</div>
												
															
												</div>
												<div class="col-sm-4">
													<div class="button" id="button">
														<button style="<?php if(isset($button['color']['background']) && $button['color']['background'] != '') echo 'background: '.$button['color']['background'].';';  if(isset($button['radius']['size']) && $button['radius']['size'] != '') echo 'border-radius: '.$button['radius']['size'].'px;'; ?>" id="colorbutton" class="colorbutton"><?php if(isset($button['icon']['class']) && $button['icon']['class'] != '') echo '<i class="'.$button['icon']['class'].'"></i>'; ?> Đặt mua</button>
													</div>
													<div class="button" id="buttonhover">
														<img class="mouse" src="<?php echo $url_site ?>/template/backend/1/images/hand-pointer-icon.png"/>
														<button style="<?php if(isset($button['color']['hover']) && $button['color']['hover'] != '') echo 'background: '.$button['color']['hover'].';'; if(isset($button['radius']['size']) && $button['radius']['size'] != '') echo 'border-radius: '.$button['radius']['size'].'px;';  ?>" id="colorbuttonhover" class="colorbutton hover"><?php if(isset($button['icon']['class']) && $button['icon']['class'] != '') echo '<i class="'.$button['icon']['class'].'"></i>'; ?> Đặt mua</button>
													</div>
												</div>
											
											</div>	
					
								        </div>
								        
								      </div>
								    </div>
								    <!--end panel-->
								    <!--panel-->
								    <div class="panel panel-default">
								      <div class="panel-heading" data-toggle="collapse" href="#menu">
								        <h4 class="panel-title">
								          Thanh trình đơn và menu
								        </h4>
								      </div>
								      <div id="menu" class="panel-collapse collapse active collapse in">
								        <div class="panel-body">
								        	<div class="form-group">
												<div class="col-sm-12">
														
														<div class="menudemo" style="<?php if(isset($menu['color']['background']) && $menu['color']['background'] != '') echo 'background: '.$menu['color']['background'].';'; if(isset($menu['radius']['top']) && $menu['radius']['top'] != '') echo 'border-top-left-radius: '.$menu['radius']['top'].'px;'.'border-top-right-radius:'.$menu['radius']['top'].'px;'; if(isset($menu['radius']['bottom']) && $menu['radius']['bottom'] != '') echo 'border-bottom-left-radius: '.$menu['radius']['bottom'].'px;'.'border-bottom-right-radius:'.$menu['radius']['bottom'].'px';  ?>">
															<a><i class="fa fa-home"></i> Trang chủ</a>
															<a> Menu demo 1</a>
															<a> Menu demo 2</a>
															<img class="mousemenudemo" src="<?php echo $url_site ?>/template/backend/1/images/hand-pointer-icon.png">
															<a style="<?php if(isset($menu['color']['hover']) && $menu['color']['hover'] != '') echo 'background: '.$menu['color']['hover']; ?>" class="active"> Menu demo 3</a>
														</div>
												</div>
												<div class="col-sm-6" style="text-align: center;">
													<h5><b>Màu nền menu:</b></h5>
													
													<div class="radio" id="select-color" style="">
														 <label>
														 	Chọn màu
														 </label>
														  <input id="menu_background" class="color minicolors-input" style="height: 30px;" type="text" name="menu[color][background]" value="<?php if(isset($menu['color']['background']) && $menu['color']['background'] != '') echo $menu['color']['background']; ?>">
													</div>
												</div>
												<div class="col-sm-6" style="text-align: center;">	
													<h5><b>Màu nền khi rê chuột:</b></h5>
													
													<div class="radio" id="select-color" style="">
														 <label>
														 	Chọn màu
														 </label>
														  <input id="menu_background_hover" class="color minicolors-input" style="height: 30px;" type="text" name="menu[color][hover]" value="<?php if(isset($menu['color']['hover']) && $menu['color']['hover'] != '') echo $menu['color']['hover']; ?>">
													</div>
												</div>	
												<div class="col-sm-12 text-center">
													<h5><b>Viền ngoài:</b></h5>
												</div>
												<div class="col-sm-6">	
													<div class="radio menu_border_radius_top" id="button_select_border" style="">
														 <div class="col-sm-12 text-center">
														 	Độ bo tròn trên <a><?php if(isset($menu['radius']['top']) && $menu['radius']['top'] != '') echo $menu['radius']['top']; else echo 4; ?></a><input name="menu[radius][top]" id="menu_input_border_radius_top" type="range" min="0"  max="40"  step="1" value="<?php if(isset($menu['radius']['top']) && $menu['radius']['top'] != '') echo $menu['radius']['top']; else echo 4; ?>" data-orientation="vertical">
														 </div>
							
													</div>
												</div>
												<div class="col-sm-6">	
													<div class="radio menu_border_radius_bottom" id="button_select_border" style="">
													   
														 <div class="col-sm-12 text-center">
														 	Độ bo tròn dưới <a><?php if(isset($menu['radius']['bottom']) && $menu['radius']['bottom'] != '') echo $menu['radius']['bottom']; else echo 0; ?></a><input name="menu[radius][bottom]" id="menu_input_border_radius_bottom" type="range" min="0"  max="40"  step="1" value="<?php if(isset($menu['radius']['bottom']) && $menu['radius']['bottom'] != '') echo $menu['radius']['bottom']; else echo 0; ?>" data-orientation="vertical">
														 </div>
							
													</div>
												</div>		
												
															
											</div>	
					
								        </div>
								        
								      </div>
								    </div>
								    <!--end panel-->
								    <div class="col-sm-12" style="margin-top: 20px;text-align: right;">
								    	<input class="btn btn-info" type="submit" name="save_setting_color" value="Lưu cài đặt"/>
								    	<input class="btn btn-primary" type="reset" value="Làm lại"/>
								    </div>
							    </div>
							  </div>
							  </form>
	</div>
</div>
<style>
	.widgetbox .boxtitle{
		background-color: #323a45;
		border-radius: 5px 5px 0px 0px;
	}
	.widgetbox h4 {
		padding: 10px;
		
		color: #ffffff;
		text-transform: uppercase;
	}
	.widgetbox .boxcontent {
		text-align: center;
		min-height: 100px;
		border: 1px solid #ddd;
		margin-top: -10px;
		padding-top: 20px;
	}
	div.button {
		border: none;
	}
	.button {
		padding: 10px;
    	text-align: center;
    	border: none;
	}
	.colorbutton {
		padding:10px;
		color:white;
		background: #e74c3c;
		border-radius:4px;
		-webkit-appearance: none;
    	outline: none;
    	border: none;
    	webkit-box-shadow: 0 2px 0 #c0392b;
	    -moz-box-shadow: 0 2px 0 #c0392b;
	    -o-box-shadow: 0 2px 0 #c0392b;
	    -ms-box-shadow: 0 2px 0 #c0392b;
	    box-shadow: 0 2px 0 #c0392b;
	}
	.hover {
		background:#34495e;
	}
	.colorbutton:hover {
		background:#34495e;
	}
	.mouse {
		position: absolute;
   		padding: 25px 0px 0px 60px
	}
	.mousemenudemo {
		position: absolute;
   		padding: 25px 0px 0px 60px
	}
	.select_icon label{
		padding-right: 20px;
	}
	.menudemo {
		margin-bottom: 20px;
   	 	background: #323a45;
    	padding: 20px;
    	border-radius:4px 4px 0 0;
	}
	.menudemo a {
		color: white;
    	text-transform: uppercase;
    	padding-right: 25px;
    	font-weight: 600;
	}
	.menudemo a:hover {
		text-decoration: none
	}
	.menudemo a.active {
		background: #e74c3c;
    	padding: 22px 20px 23px 10px;
	}
	.text-center {
		text-align: center;
	}
</style>
<!-- / color settings -->
<script>
	 $(document).ready( function() {

	 // màu box
	 $('#box_title_background').change(function() {
	 	var color = $('#box_title_background').val();
	 	$('#boxtitle').css('backgroundColor',color);
	 });	
	$('#box_title_color').change(function() {
	 	var color = $('#box_title_color').val();
	 	$('#boxtitle h4').css('color',color);
	 });
	// icon box 
	$( ".iconbox" ).on( "click", function() {
	  var classfa =  $('input[name="boxtitle[icon][class]"]:checked').val();
	  $('#boxtitle_h4').html('<i class="' + classfa +'"></i> TIÊU ĐỀ BOX');
	});
	// box border - radius
	$('#box_input_border_radius').change(function(){
		
		$('#box_select_border a').text($('#box_input_border_radius').val());
		var size = $('#box_input_border_radius').val();

		$('#boxtitle').css({
        'border-top-left-radius': size + "px",
        'border-top-right-radius': size + "px"
    	});
	});
	// màu button 
	$('#button_background').change(function() {
		var color = $('#button_background').val();
		$('button#colorbutton').css('background',color);
	});
	$('#button_hover').change(function() {
		var color = $('#button_hover').val();
		$('button#colorbuttonhover').css('background',color);
	});
	// icon button
	$( ".iconbutton" ).on( "click", function() {
	  var classfa =  $('input[name="button[icon][class]"]:checked').val();
	  $('button.colorbutton').html('<i class="' + classfa +'"></i> Đặt mua');
	});
	//button border - radius 
	$('#button_input_border_radius').change(function(){
		
		$('#button_select_border a').text($('#button_input_border_radius').val());
		var size = $('#button_input_border_radius').val();
		$('button#colorbutton').css('border-radius', size+'px');
		$('button#colorbuttonhover').css('border-radius', size+'px');
	});
	// menu 
	$('#menu_background').change(function() {
	 	var color = $('#menu_background').val();
	 	$('.menudemo').css('backgroundColor',color);
	 });
	 $('#menu_background_hover').change(function() {
	 	var color = $('#menu_background_hover').val();
	 	$('.menudemo a.active').css('backgroundColor',color);
	 });	
	 // menu border radius 
	 $('#menu_input_border_radius_top').change(function(){
		
		$('.menu_border_radius_top a').text($('#menu_input_border_radius_top').val());
		var size = $('#menu_input_border_radius_top').val();
		$('.menudemo').css({
        	'border-top-left-radius': size + "px",
        	'border-top-right-radius': size + "px"
    	});
	});
	$('#menu_input_border_radius_bottom').change(function(){
		
		$('.menu_border_radius_bottom a').text($('#menu_input_border_radius_bottom').val());
		var size = $('#menu_input_border_radius_bottom').val();
		$('.menudemo').css({
        	'border-bottom-left-radius': size + "px",
        	'border-bottom-right-radius': size + "px"
    	});
	});
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
 <script type="text/javascript">
	$( document ).ready(function() {
     	 $('.upload_btn').fancybox({ 
		   'width'     : 900,
		    'height'    : 900,
		    'autoSize': false,
		    'type'      : 'iframe',
		
		});

		
		$(function() {
		    // Executes a callback detecting changes with a frequency of 1 second
		    $("#upload_background").observe_field(1, function( ) {
		        
		       // $('#anhdaidien').attr('src',this.value).show();
		       $("div#imglogoview").html("<a  href='editor/filemanager/popup.aspx?type=1&amp;field_id=upload_background&amp' class='btn upload_btn'><img src='" + this.value + "' class='img-responsive' /></a>");

		    });
		});
     	
     
	});
	
	</script> 