<!--Form Thêm danh mục-->
<div class="col-md-8">


    <?php echo (isset($message) && $message != "") ? '<p class="alert alert-success">' . $message . '</p>' : ''; ?>

    <h4>Chỉnh sửa danh mục</h4>
    {category_by_id}
    <form action="" method="post"> <!-- Lưu ý kẻo quên tag form, controller ko chay-->
        <div class="input-group">
            <input name="name_update_category" id="name_update_category" type="text" class="form-control"
                   value="{name}" onChange="add_catelogy()">
            <div class="col-sm-12">
                <?php echo form_error("name_update_category") ? '<p class="help-block">' . form_error("name_update_category") . '</p>' : ''; ?>
            </div>
            <div class="col-sm-12">
                <p class="help-block">Tên riêng sẽ hiển thị trên trang mạng của bạn</p>
            </div>
        </div>

        <div class="input-group">
            <input type="text" class="form-control" placeholder="Đường Dẫn Tĩnh" name="link_update_category" value="{link}">
            <div class="col-sm-12">
                <?php echo form_error("link_update_category") ? '<p class="help-block">' . form_error("link_update_category") . '</p>' : ''; ?>
            </div>
            <div class="col-sm-12">
                <p class="help-block">Chuỗi cho đường dẫn tĩnh là phiên bản của tên hợp chuẩn với Đường dẫn (URL). Chuỗi
                    này bao gồm chữ cái thường, số và dấu gạch ngang (-).</p>
            </div>
        </div>
        <div class="row">
            <p class="col-md-4">Danh Mục Lớn</p>
            <span class="input-group-btn col-md-8">
                <select name="select_category_parent" class="btn">
                    <option value="0">DANH MỤC CHÍNH</option>
                    <?php echo $category_parent;?>
                </select>
            </span>
        </div>
        <div class="col-sm-12">
            <p class="help-block">Danh mục khác với thẻ, bạn có thể sử dụng 2 cấp danh mục. Ví dụ: Trong danh mục nhạc,
                bạn có danh mục con là nhạc Pop, nhạc Jazz. Việc này hoàn toàn là tùy theo ý bạn</p>
        </div>
        <div class="input-group">
            <textarea name="description_update_category" cols="50" rows="5 " class="form-control"
                      value="{description}"></textarea>
            <div class="col-sm-12">
                <?php echo form_error("description_update_category") ? '<p class="help-block">' . form_error("description_update_category") . '</p>' : ''; ?>
            </div>

        </div>

        <div class="btn-group">
            <input type="submit" class="btn btn-info" name="submit_update_category" value="Cập Nhật Danh Mục">
        </div>
    </form>
    {/category_by_id}
</div>
<div class="clearfix"></div>
<script type="text/javascript">
    function add_catelogy() {
        var title = $("input#name_update_category").val();
        $.post("{url_site}/dashboard/products/get_title_replace", {
            title: title
        }, function (data) {
            if (data != '') {
                document.getElementsByName('link_update_category')[0].value = data;

            }


        });

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
</style>
