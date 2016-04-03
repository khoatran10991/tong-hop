<div class="row" style="padding: 20px">
    <!--    form thêm ads-->
    <div class="col-sm-5">
        <div>
            <?php
            if (isset($result_action_banner) && !empty($result_action_banner)) {
                echo '<p class="alert alert-success"><i class="fa fa-check"></i>' . $result_action_banner . '</p>';
            }
            ?>

        </div>
        <!--                form hình ảnh hoặc text-html-->
        <div class="col-sm-12">

            <ul class="nav nav-tabs" id="setting-tab">
                <li class="active"><a data-toggle="tab" href="#data-image" aria-expanded="true">Hình ảnh</a></li>
                <li class=""><a data-toggle="tab" href="#data-html" aria-expanded="false">Code html</a>
                </li>

            </ul>
            <div class="tab-content">
                <div id="data-image" class="tab-pane active">
                    <form class="form-horizontal" action="" method="post" accept-charset="utf-8">
                        <div class="add-slide-show">
                            <input id="id-advertising-img" name="id-advertising" type="hidden" class="form-control" value="">
                            <input id="advertising-img" name="advertising-img" type="hidden" class="form-control"
                                   value=""
                                   hidden="">
                            <a id="anh-advertising" onclick="openLibImages('advertising-img', 'anh-advertising')">+</a>
                        </div>
                        <!--            form thông tin về advertising-->
                        <div class="col-sm-12" style="margin-top: 40px">
                            <div class="form-group">
                                <input type="text" name="link-advertising" id="link-advertising-img"
                                       class="form-control" placeholder="Đường dẫn" value="">
                            </div>
                            <div class="form-group">
                                <select name="area-advertising" id="area-advertising-img" class="form-control">
                                    <option value='default'>Chọn vị trí đặt quảng cáo</option>
                                    <option value="top">Hiển thị ở trên</option>
                                    <option value="center">Hiển thị ở giữa</option>
                                    <option value="left">Hiển thị ở bên trái</option>
                                    <option value="right">Hiển thị ở bên phải</option>
                                    <option value="leftslide">Hiển thị trượt bên trái (Chỉ hiển thị ở chế độ màn hình
                                        lớn)</option>
                                    <option value="rightslide">Hiển thị trượt bên phải (Chỉ hiển thị ở chế độ màn hình
                                        lớn)</option>
                                    <option value="popup">Hiển thị dạng popup ở giữa màn hình</option>
                                </select>
                            </div>
                        </div>

                        <div class="btn-group col-sm-offset-2">
                            <input type="reset" class="btn btn-defaul" value="Làm lại">
                        </div>
                        <div class="btn-group col-sm-offset-1">
                            <input type="submit" class="btn btn-primary" id="submit_advertising_img"
                                   name="submit_advertising_img" value="Lưu">
                        </div>
                    </form>
                </div>
                <div id="data-html" class="tab-pane">
                    <form class="form-horizontal" action="" method="post" accept-charset="utf-8">
                        <input id="id-advertising-html" name="id-advertising" type="hidden" class="form-control" value="">
                    <textarea name="advertising-html" id="advertising-html" cols="50" rows="10" class="form-control"
                              style="height:100px;"
                              placeholder="Điền code html vào đây"></textarea>
                        <!--            form thông tin về advertising-->
                        <div class="col-sm-12" style="margin-top: 20px">
                            <div class="form-group">
                                <input type="text" name="link-advertising" id="link-advertising-html"
                                       class="form-control" placeholder="Đường dẫn">
                            </div>
                            <div class="form-group">
                                <select name="area-advertising" id="area-advertising-html" class="form-control">
                                    <option value="default">Chọn vị trí đặt quảng cáo</option>
                                    <option value="top">Hiển thị ở trên</option>
                                    <option value="center">Hiển thị ở giữa</option>
                                    <option value="left">Hiển thị ở bên trái</option>
                                    <option value="right">Hiển thị ở bên phải</option>
                                    <option value="leftslide">Hiển thị trượt bên trái (Chỉ hiển thị ở chế độ màn hình
                                        lớn)</option>
                                    <option value="rightslide">Hiển thị trượt bên phải (Chỉ hiển thị ở chế độ màn hình
                                        lớn)</option>
                                    <option value="popup">Hiển thị dạng popup ở giữa màn hình</option>
                                </select>
                            </div>
                        </div>

                        <div class="btn-group col-sm-offset-2">
                            <input type="reset" class="btn btn-defaul" value="Làm lại">
                        </div>
                        <div class="btn-group col-sm-offset-1">
                            <input type="submit" class="btn btn-primary" id="submit_advertising_html"
                                   name="submit_advertising_html" value="Lưu">
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
    <!--form chỉnh sửa - xóa danh mục hiện có-->

    <div class="col-md-7 graphs">
        <p id="message_action"></p>
        <div class="xs">
            <form action="" method="post" id="formitems">
                <div class="row" style="margin:0px 0px 0px 40px">
                    <div class="form-group">
                        <input type="submit" class="btn btn-default" name="submit_advertising_del"
                               value="Xóa Các Lựa Chọn">
                    </div>
                </div>
                <div class="panel-body1" style="margin: 0em 0 0 0;">
                    <table class="table">
                        <thead>
                        <tr>
                            <th><input id="input-checkall" type="checkbox"></th>
                            <th style="min-width: 200px;">Banner/Logo</th>
                            <th>Vị trí hiển thị</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!--            Hiển thị danh sách -->
                        <?php
                        foreach ($result_list_banner as $item) {
                            $id_advertising = $item->id_banner;
                            $area_advertising = $item->area;
                            $value = json_decode($item->data, true);

                            echo '<tr class="row-item"><th scope="row"><input class="cb-select" name="advertising-selected[]" type="checkbox" value="' . $id_advertising . '"></th>';
                            if (isset($value['advertising-img']) && !empty($value['advertising-img'])) {
                                echo '<td id="advertising-' . $id_advertising . '">
                                <a href="' . $value['link-advertising'] . '"><img
                                        src="' . $value['advertising-img'] . '"
                                        alt="Logo Advertising" class="img-banner"/> </a>
                                <div class="row-actions">
                                    <span class="edit"><a onclick="edit_advertising(' . $id_advertising . ')" style="color: #47475F;" href="javascript:"
                                                          title="Chỉnh sửa"><i class="fa fa-pencil"></i> Chỉnh sửa</a> | </span>
                                    <span class="trash"><a onclick="remove_advertising(' . $id_advertising . ')" style="color: #a00;" href="javascript:"
                                                           class="submitdelete" title="Xóa trang này"><i
                                                class="fa fa-trash-o"></i> Xóa</a> </span>
                                </div>
                            </td>';
                            } elseif (isset($value['advertising-html']) && !empty($value['advertising-html'])) {
                                echo '<td id="advertising-' . $id_advertising . '">
                                <a href="' . $value['link-advertising'] . '">' . $value['advertising-html'] . ' </a>
                                <div class="row-actions">
                                    <span class="edit"><a onclick="edit_advertising(' . $id_advertising . ')" style="color: #47475F;" href="javascript:"
                                                          title="Chỉnh sửa"><i class="fa fa-pencil"></i> Chỉnh sửa</a> | </span>
                                    <span class="trash"><a onclick="remove_advertising(' . $id_advertising . ')" style="color: #a00;" href="javascript:"
                                                           class="submitdelete" title="Xóa trang này"><i
                                                class="fa fa-trash-o"></i> Xóa</a> </span>
                                </div>
                            </td>';
                            }
                            echo '<td id="area-advertising-' . $id_advertising . '">';
                            switch ($area_advertising) {
                                case "top":
                                    echo "Hiển thị ở trên";
                                    break;
                                case "center":
                                    echo "Hiển thị ở giữa";
                                    break;
                                case "left":
                                    echo "Hiển thị ở bên trái";
                                    break;
                                case "right":
                                    echo "Hiển thị ở bên phải";
                                    break;
                                case "leftslide":
                                    echo "Hiển thị trượt bên trái (Chỉ hiển thị ở chế độ màn hình
                                        lớn)";
                                    break;
                                case "rightslide":
                                    echo "Hiển thị trượt bên phải (Chỉ hiển thị ở chế độ màn hình
                                        lớn)";
                                    break;
                                case "popup":
                                    echo "Hiển thị dạng popup ở giữa màn hình";
                                    break;
                            }
                            echo '</td></tr>';
                        }
                        ?>
                        </tbody>
                    </table>


                </div>
            </form>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<script type="text/javascript">
    $("#input-checkall").change(function () {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
    });
    function openLibImages(divID, divCLASS) {

        window.KCFinder = {
            callBack: function (url) {
                var urlfull = "{url_site}" + "" + url;
                $("input#" + divID).val(urlfull);
                window.KCFinder = null;
                $("#" + divCLASS).innerHTML = '<div style="margin:5px">Đang tải...</div>';
                $("#" + divCLASS).html("<img src='" + urlfull + "' class='img-slideshow' />");

            }
        };
        window.open('{url_site}/editor/kcfinder/browse.php?type=images&lang=vi&dir=images/',
            'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
            'directories=0, resizable=1, scrollbars=0, width=800, height=600'
        );
    }
    $("input#submit_advertising_img").click(function () {
        var data_link_img = $("input#link-advertising-img").val();
        var data_area_img = $("select#area-advertising-img").val();
        var data_img = $("input#advertising-img").val();
        if (!data_img) {
            $("input#advertising-img").parent().css("color", "red");
        }
        if (!data_link_img) {
            $(".form-group:eq(1)").addClass("has-error has-feedback");
        }
        if (data_area_img == 'default') {
            $(".form-group:eq(2)").addClass("has-error has-feedback");
        }
        if (!data_img || !data_link_img || data_area_img == 'default') {
            return false;
        }

    });
    $("input#submit_advertising_html").click(function () {

        var data_link_html = $("input#link-advertising-html").val();
        var data_area_html = $("select#area-advertising-html").val();
        var data_html = $("textarea#advertising-html").val();
        if (!data_html) {
            $("textarea#advertising-html").css("border-color", "red");
        }
        if (!data_link_html) {
            $(".form-group:eq(4)").addClass("has-error has-feedback");
        }
        if (data_area_html == 'default') {
            $(".form-group:eq(5)").addClass("has-error has-feedback");
        }
        if (!data_html || !data_link_html || data_area_html == 'default') {
            return false;
        }

    });
    function remove_advertising(id_advertising) {
        var conf = confirm("Bạn thực sự muốn xóa ?");
        if (conf == true) {
            $.post("{url_site}/dashboard/advertising/remove", {
                    id_advertising: id_advertising
                }, function (data) {
                    window.location.href = window.location.href;
                }
            );
        } else
            return false;
    }
    function edit_advertising(id_ads) {
        var link_ads = $("td#advertising-" + id_ads + "").children().attr("href");
        var area_ads = $("td#area-advertising-" + id_ads + "").html();
        if((typeof $("td#advertising-" + id_ads + " > a").children().attr("src"))!='undefined'){
            $("#anh-advertising").html("<img src='" + $("td#advertising-" + id_ads + " > a").children().attr("src") + "' class='img-slideshow' />");
            $("input#advertising-img").val($("td#advertising-" + id_ads + " > a").children().attr("src"));
            $("ul#setting-tab > li").eq(-1).removeClass("active");
            $("ul#setting-tab > li").eq(0).addClass("active");
            $("#data-image").addClass("active");
            $("#data-html").removeClass("active");
        }else{
            $("#advertising-html").html($("td#advertising-" + id_ads + " > a").html());
            $("ul#setting-tab > li").eq(0).removeClass("active");
            $("ul#setting-tab > li").eq(-1).addClass("active");
            $("#data-html").addClass("active");
            $("#data-image").removeClass("active");
        }
        $("option").each(function () {
            if ($(this).text() == area_ads) {
                $(this).attr("selected", "selected");
            }
        });
        $("input#submit_advertising_img").attr({
            "id": "submit_update_advertising_img",
            "name": "submit_update_advertising_img",
            "value": "Cập Nhật"
        });
        $("input#submit_advertising_html").attr({
            "id": "submit_update_advertising_html",
            "name": "submit_update_advertising_html",
            "value": "Cập Nhật"
        });
        $("input#id-advertising-img").val(id_ads);
        $("input#id-advertising-html").val(id_ads);
        $("input#link-advertising-img").val(link_ads);
        $("input#link-advertising-html").val(link_ads);
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

    #setting-tab > li > a:hover {
        background-color: #f5f5f5 !important;
    }

    #setting-tab > li.active > a {
        background-color: #f5f5f5 !important;
    }

    .chose-layout:hover {
        border: 1px solid #ccc;
    }
</style>