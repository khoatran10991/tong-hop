{{ javascript_include("/ckeditor/ckeditor.js") }}
<div style="padding: 10px" class="form-group container">
    {{ form('', 'method': 'post') }}
    <div class="col-sm-8">
        {{ content() }}
        <div class="block-padding">
            {{ text_field("name_product", "class": "form-control tile-stats","placeholder":"Nhập tên sản phẩm...","required":"") }}
            {{ text_area("content_product","id":"ckeditor","class":"form-control tile-stats","required":"") }}
        </div>

        <div class="form-group block-padding">
            <h5>Tối ưu SEO</h5>
            <div class="col-sm-12" style="min-height: 100px">
                <div class="col-sm-3">
                    Xem trước hiển thị tìm kiếm trên Google,Bing...
                </div>
                <div class="col-sm-9">
                    <p id="title-seo"></p>
                    <span id="url-seo">
                    </span>
                    <p id="description-seo"></p>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-3">
                    Từ khoá (Phân cách nhau bằng dấu phẩy ",")
                </div>
                <div class="col-sm-9">
                        <input id="tags_1" name="tag_product" type="text" class="tags form-control tile-stats" value=""/>
                        <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-3">
                    Mô tả trang
                </div>
                <div class="col-sm-9">
                    {{ text_area("description_seo_product","class":"form-control tile-stats","placeholder":"Mô tả trang, tối ưu không quá 156 ký tự...") }}
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="col-sm-4 ">
        <div class="row text-center block-padding">
            {{ submit_button('Lưu nháp','name':'status','class':'btn btn-default') }}
            {{ submit_button('Đăng sản phẩm','name':'status','class':'btn btn-primary') }}
        </div>
        <div class="form-group block-padding">
            <h5>Tổng quan</h5>
            <div class="col-sm-12">
                    {{ text_field("sku_product", "class": "form-control tile-stats","placeholder":"Mã sản phẩm") }}
            </div>
            <div class="col-sm-12">

                    {{ text_field("price_product", "class": "form-control tile-stats","placeholder":"Giá 1000.000.000") }}
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group block-padding">
            <h5>Vận chuyển</h5>
            <div class="radio">
                <label>
                    <input type="radio" class="flat" checked name="shipping_cost" value="free"> Miễn phí giao hàng
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" class="flat" name="shipping_cost" value="pay"> Tính theo giá bưu điện
                </label>
            </div>
        </div>
        <div class="form-group block-padding">
            <h5>Ảnh đại diện</h5>
            <input type="text" id="image_repersent"  name="image_repersent" value="" hidden>
            <div id="thumb_image_repersent">
                <a href="/filemanager/dialog.php?type=1&field_id=image_repersent&relative_url=1&langCode=vi" class="btn btn-info iframe-btn text-center">Chọn một ảnh</a>
            </div>
        </div>
        <div class="form-group block-padding">
            <h5>Ảnh trưng bày</h5>
            <div id="galleryimages">
                <input id="galleryimages_1" name="gallery_images[]" value="" hidden>
                <input id="galleryimages_2" name="gallery_images[]" value="" hidden>
                <input id="galleryimages_3" name="gallery_images[]" value="" hidden>
                <input id="galleryimages_4" name="gallery_images[]" value="" hidden>
                <input id="galleryimages_5" name="gallery_images[]" value="" hidden>
                <input id="galleryimages_6" name="gallery_images[]" value="" hidden>
            </div>

            <div style="margin-left:0px" class="col-sm-12 col-sm-offset-2">
                <div class="addgalleryimage" id="thumb_galleryimages_1">
                    <a href="/filemanager/dialog.php?type=1&field_id=galleryimages_1&relative_url=1&langCode=vi" class="btn iframe-btn"><i class="fa fa-plus"></i></a>
                </div>
                <div class="addgalleryimage" id="thumb_galleryimages_2">
                    <a href="/filemanager/dialog.php?type=1&field_id=galleryimages_2&relative_url=1&langCode=vi" class="btn iframe-btn"><i class="fa fa-plus"></i></a>                    </div>
                <div class="addgalleryimage" id="thumb_galleryimages_3">
                    <a href="/filemanager/dialog.php?type=1&field_id=galleryimages_3&relative_url=1&langCode=vi" class="btn iframe-btn"><i class="fa fa-plus"></i></a>                    </div>
                <div class="addgalleryimage" id="thumb_galleryimages_4">
                    <a href="/filemanager/dialog.php?type=1&field_id=galleryimages_4&relative_url=1&langCode=vi" class="btn iframe-btn"><i class="fa fa-plus"></i></a>                    </div>
                <div class="addgalleryimage" id="thumb_galleryimages_5">
                    <a href="/filemanager/dialog.php?type=1&field_id=galleryimages_5&relative_url=1&langCode=vi" class="btn iframe-btn"><i class="fa fa-plus"></i></a>                    </div>
                <div class="addgalleryimage" id="thumb_galleryimages_6">
                    <a href="/filemanager/dialog.php?type=1&field_id=galleryimages_6&relative_url=1&langCode=vi" class="btn iframe-btn"><i class="fa fa-plus"></i></a>                    </div>

            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    {{ end_form() }}
    <div class="clearfix"></div>
</div>

<script>
    CKEDITOR.replace( 'ckeditor', {
        language: 'vi',
        uiColor: '#9AB8F3',
        filebrowserBrowseUrl : '/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
    });
</script>
<!-- input tags -->
<script>
    function onAddTag(tag) {
        alert("Added a tag: " + tag);
    }

    function onRemoveTag(tag) {
        alert("Removed a tag: " + tag);
    }

    function onChangeTag(input, tag) {
        alert("Changed a tag: " + tag);
    }

    $(function() {
        $('#tags_1').tagsInput({
            width: 'auto'
        });
    });
</script>
<!-- /input tags -->
<!-- icheck -->
<script src="/backend/js/icheck/icheck.min.js"></script>
<!-- tags -->
<script src="/backend/js/tags/jquery.tagsinput.min.js"></script>

<script>
    $('.iframe-btn').fancybox({
        'width'		: 900,
        'height'	: 900,
        'type'		: 'iframe',
        'autoScale'    	: true
    });
    function responsive_filemanager_callback(field_id){
        console.log(field_id);
        var url=jQuery('#'+field_id).val();
            $("div#thumb_"+field_id).html("<a  href='/filemanager/dialog.php?type=1&field_id=" + field_id + "=&relative_url=1&langCode=vi' class='btn iframe-btn text-center' type='button'><img src='" + url + "' class='img-responsive iframe-btn' /></a>");
    }
    $("input#name_product").change(function(){
        var title = $("input#name_product").val();
        $("p#title-seo").text(title);
        $.post("/dashboard/product/replace_title",{str:title},function(data){
            $("span#url-seo").text("http://shop-phalcon.dev/"+data+".html");
        });

    });
    $("textarea#description_seo_product").change(function(){
        var description = $("textarea#description_seo_product").val();
        $("p#description-seo").text(description);
    });

</script>
