<!--Form Thêm danh mục-->
<div class="col-md-5" style="margin-top: 20px">


    <?php echo (isset($message) && $message != "") ? '<p class="alert alert-success">' . $message . '</p>' : ''; ?>


    <h4>Thêm danh mục sản phẩm</h4>
    <form action="" method="post"> <!-- Lưu ý kẻo quên tag form, controller không chạy-->
        <div class="input-group">
            <input name="name_add_category" id="name_add_category" type="text" class="form-control"
                   placeholder="Tên Danh Mục" onChange="add_catelogy()">
            <div class="col-sm-12">
                <?php echo form_error("name_add_category") ? '<p class="help-block">' . form_error("name_add_category") . '</p>' : ''; ?>
            </div>
            <div class="col-sm-12">
                <p class="help-block">Tên riêng sẽ hiển thị trên trang mạng của bạn</p>
            </div>
        </div>

        <div class="input-group">
            <input type="text" class="form-control" placeholder="Đường Dẫn Tĩnh" name="link_add_category">
            <div class="col-sm-12">
                <?php echo form_error("link_add_category") ? '<p class="help-block">' . form_error("link_add_category") . '</p>' : ''; ?>
            </div>
        </div>
        <div class="row">
            <p class="col-md-4">Danh mục lớn</p>
            <span class="input-group-btn col-md-8">
                <select name="select_category_parent" class="btn">
                    <option value="0">	CHUYÊN MỤC CHÍNH</option>
                    <?php 
                    	if(isset($category_all)) {
							foreach($category_all as $item) {
								echo '<option value="'.$item['id'].'">'.$item['name'].'</option>';
								if(isset($item['child'])) {
									foreach($item['child'] as $subitem) {
										echo '<option value="'.$subitem['id'].'">---'.$subitem['name'].'</option>';
									}
								}
							}
							
							
						}
                    ?>
                </select>
            </span>
        </div>
        <div class="col-sm-12">
            <p class="help-block">Bạn có thể sử dụng 2 cấp danh mục. Ví dụ: Trong danh mục Quần áo,
                bạn có danh mục con là Quần Nam, Quần Nữ... Việc này hoàn toàn là tùy theo ý bạn</p>
        </div>
        <div class="input-group">
            <textarea name="description_add_category" cols="50" rows="5 " class="form-control"
                      placeholder="Mô tả"></textarea>
            <div class="col-sm-12">
                <?php echo form_error("description_add_category") ? '<p class="help-block">' . form_error("description_add_category") . '</p>' : ''; ?>
            </div>

        </div>

        <div class="btn-group">
            <input type="submit" class="btn btn-info" name="submit_add_category" value="Thêm Danh Mục">
        </div>
    </form>
</div>

<!--form chỉnh sửa - xóa danh mục hiện có-->
<div class="col-md-7 graphs">
    <p id="message_action"></p>
    <div class="xs">
        <form action="" method="post" id="formitems">
            <div class="row" style="margin:0px 0px 10px 0px">

                <div class="form-group">
                <div class="col-sm-2">
                    <p>Tác vụ</p>
                </div>
                <div class="col-sm-1">
                    <input type="submit" class="btn btn-default" name="submit_category_del" value="Xóa Các Lựa Chọn">
                </div>
            </div>


    </div>
    <div class="panel-body1" style="margin: 0em 0 0 0;">


        <table class="table">
            <thead>
            <tr>
                <th><input id="input-checkall" type="checkbox"></th>
                <th style="min-width: 200px;">Tên Danh Mục</th>
                <th>Đường dẫn Tĩnh</th>
            </tr>
            </thead>
            <tbody>
<!--            Hiển thị danh sách category-->

            <!--Hiển thị danh sách category-->
			<?php  
				if(isset($category_all)) :
				foreach($category_all as $item) :
			?>
			<tr class="row-item">
				
				<th scope="row">
					<input class="cb-select" name="category[]" type="checkbox" value="<?php echo $item['id'] ?>">
				</th>
				<td>
					<span class="td-bold">
						<a href="dashboard/products/category.html?<?php echo md5('edit') ?>=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
					</span>
					<div class="row-actions">
						<span class="edit"><a style="color: #47475F;" href="dashboard/products/category.html?<?php echo md5('edit') ?>=<?php echo $item['id'] ?>" title="Chỉnh sửa"><i class="fa fa-pencil"></i> Chỉnh sửa</a> | </span>
						<span class="trash"><a onclick="remove_category(<?php echo $item['id'] ?>,0)" style="color: #a00;" href="javascript:" class="submitdelete" title="Xóa trang này"><i class="fa fa-trash-o"></i> Xóa</a> | </span>
						<span class="view"><a target="_blank" style="color: #47475F;" href="<?php echo $url_site.$this->url->get_url_cate($item['link'],$id_store) ?>" title="Xem" rel="permalink"><i class="fa fa-eye"></i> Xem</a></span>
					</div>
				</td>
				<td><?php echo $item['link'] ?>.html</td>
			</tr>
			<?php 
					if(isset($item['child'])) :
						foreach($item['child'] as $subitem) : ?>
							<tr class="row-item">
				
								<th scope="row">
									<input class="cb-select" name="category[]" type="checkbox" value="<?php echo $subitem['id'] ?>">
								</th>
								<td>
									<span>
										<a href="dashboard/products/category.html?<?php echo md5('edit') ?>=<?php echo $subitem['id'] ?>">--<?php echo $subitem['name'] ?></a>
									</span>
									<div class="row-actions">
										<span class="edit"><a style="color: #47475F;" href="dashboard/products/category.html?<?php echo md5('edit') ?>=<?php echo $subitem['id'] ?>" title="Chỉnh sửa"><i class="fa fa-pencil"></i> Chỉnh sửa</a> | </span>
										<span class="trash"><a onclick="remove_category(<?php echo $subitem['id'] ?>,<?php echo $item['id'] ?>)" style="color: #a00;" href="javascript:" class="submitdelete" title="Xóa trang này"><i class="fa fa-trash-o"></i> Xóa</a> | </span>
										<span class="view"><a target="_blank" style="color: #47475F;" href="<?php echo $url_site.$this->url->get_url_cate($subitem['link'],$id_store) ?>" title="Xem" rel="permalink"><i class="fa fa-eye"></i> Xem</a></span>
									</div>
								</td>
								<td><?php echo $subitem['link'] ?>.html</td>
							</tr>
							<?php if(isset($subitem['child'])) : ?>
								<?php foreach($subitem['child'] as $subsubitem) : ?>
									<tr class="row-item">
				
										<th scope="row">
											<input class="cb-select" name="category[]" type="checkbox" value="<?php echo $subsubitem['id'] ?>">
										</th>
										<td>
											<span>
												<a href="dashboard/products/category.html?<?php echo md5('edit') ?>=<?php echo $subsubitem['id'] ?>">------<?php echo $subsubitem['name'] ?></a>
											</span>
											<div class="row-actions">
												<span class="edit"><a style="color: #47475F;" href="dashboard/products/category.html?<?php echo md5('edit') ?>=<?php echo $subsubitem['id'] ?>" title="Chỉnh sửa"><i class="fa fa-pencil"></i> Chỉnh sửa</a> | </span>
												<span class="trash"><a onclick="remove_category(<?php echo $subsubitem['id'] ?>,<?php echo $subitem['id'] ?>)" style="color: #a00;" href="javascript:" class="submitdelete" title="Xóa trang này"><i class="fa fa-trash-o"></i> Xóa</a> | </span>
												<span class="view"><a target="_blank" style="color: #47475F;" href="<?php echo $url_site.$this->url->get_url_cate($subsubitem['link'],$id_store) ?>" title="Xem" rel="permalink"><i class="fa fa-eye"></i> Xem</a></span>
											</div>
										</td>
										<td><?php echo $subsubitem['link'] ?>.html</td>
									</tr>
								
								
								<?php endforeach; ?>
								
							<?php endif ?>
									
					<?php	
						endforeach;
					endif;
			?>
			<?php endforeach;  ?>
			<?php endif; ?>
            </tbody>
        </table>


    </div>
    </form>
</div>
</div>
<div class="clearfix"></div>
<script type="text/javascript">
    function add_catelogy() {
        var title = $("input#name_add_category").val();
        $.post("{url_site}/dashboard/products/get_title_replace", {
            title: title
        }, function (data) {
            if (data != '') {
                document.getElementsByName('link_add_category')[0].value =  data;

            }


        });

    }
    $("#input-checkall").change(function () {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
    });
    function remove_category(id_category, id_parent) {
        var r = confirm("Bạn thực sự muốn xóa?");
        if (r == true) {
            $.post("{url_site}/dashboard/products/remove_category", {
                    id_category: id_category,
                    id_parent: id_parent
                }, function (data) {
                    window.location.reload();
                }
            );
        } else
            return false;
    }
</script>
<style>
    .td-bold {
        color: rgba(0, 0, 0, 0.74);
        font-weight: bold;
    }

    .td {
        color: rgba(0, 0, 0, 0.74);

    }

    .row-actions {
        display: none;
    }

    .row-item:hover .row-actions {
        display: block !important;
    }

    .row-item {
        height: 75px;
    }

    .row-item:hover {
        background-color: rgba(221, 221, 221, 0.24);
    }
    a:link,a:visited {
		color:#000
	}
</style>
