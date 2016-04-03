<!--Form Thêm danh mục-->
<div class="col-md-5">


    <?php echo (isset($message) && $message != "") ? '<p class="alert alert-success">' . $message . '</p>' : ''; ?>


    <h4>Thêm danh mục</h4>
    <form action="" method="post"> <!-- Lưu ý kẻo quên tag form, controller ko chay-->
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
                    {category_all}
                    <option value="{id_category}">{name}</option>
                    {/category_all}
                </select>
            </span>
        </div>
        <div class="col-sm-12">
            <p class="help-block">Danh mục khác với thẻ, bạn có thể sử dụng 2 cấp danh mục. Ví dụ: Trong danh mục nhạc,
                bạn có danh mục con là nhạc Pop, nhạc Jazz. Việc này hoàn toàn là tùy theo ý bạn</p>
        </div>
        <div class="input-group">
            <textarea name="description_add_category" cols="50" rows="5 " class="form-control"
                      placeholder="Mô Tả"></textarea>
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

            {dequy_category}
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
                document.getElementsByName('link_add_category')[0].value = data;

            }


        });

    }
    $("#input-checkall").change(function () {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
    });
    function remove_category(id_category, id_parent) {
        var r = confirm("Bạn thực sự muốn xóa ?");
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
</style>
