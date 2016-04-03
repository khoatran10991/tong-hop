<?php $edit = $this->input->get(md5('edit')); ?>
<?php 
	$token = (isset($_COOKIE['jnet_session']) ? $_COOKIE['jnet_session'] : md5('notoken'));
?>
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
<div class="col-sm-12" style="padding: 10px 20px 20px 20px">
			<!--<a href="<?php echo $url_site ?>/dashboard/template/layout.html?token=<?php echo $token ?>" class="btn btn-default <?php if(!isset($edit) || $edit == '') echo 'jnetactive' ?>"><i class="fa fa-list-alt"></i> Bố cục trang web</a>-->
			<a href="<?php echo $url_site ?>/dashboard/template/layout/color" class="btn btn-default <?php if(isset($edit) && $edit == 'color') echo 'jnetactive' ?>"><i class="fa fa-cube"></i> Màu sắc</a>
			<!--<a href="<?php echo $url_site ?>/dashboard/template/layout.html?<?php echo md5('edit') ?>=product&token=<?php echo $token ?>" class="btn btn-default <?php if(isset($edit) && $edit == 'product') echo 'jnetactive' ?>"><i class="fa fa-rub"></i> Tùy chọn sản phẩm</a>
			<a href="<?php echo $url_site ?>/dashboard/template/layout.html?<?php echo md5('edit') ?>=post&token=<?php echo $token ?>" class="btn btn-default <?php if(isset($edit) && $edit == 'post') echo 'jnetactive' ?>"><i class="fa fa-file-text"></i> Tùy chọn bài viết</a>-->
			<a href="<?php echo $url_site ?>/dashboard/template/layout/css" class="btn btn-default <?php if(isset($edit) && $edit == 'css') echo 'jnetactive' ?>" ><i class="fa fa-code"></i> Nhập CSS				</a>
			<a href="<?php echo $url_site ?>/dashboard/template/layout/options" class="btn btn-default <?php if(isset($edit) && $edit == 'options') echo 'jnetactive' ?>"><i class="fa fa-cogs"></i> Tùy chọn khác</a>
			<!--<a href="<?php echo $url_site ?>/dashboard/template/layout.html?<?php echo md5('edit') ?>=backup&token=<?php echo $token ?>" class="btn btn-default <?php if(isset($edit) && $edit == 'backup') echo 'jnetactive' ?>"><i class="fa fa-database"></i> Sao lưu và khôi phục</a>-->
</div>