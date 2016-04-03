
<link rel="stylesheet" type="text/css" href="<?php echo $url_site ?>/template/backend/1/fancybox/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="<?php echo $url_site ?>/template/backend/1/fancybox/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="<?php echo $url_site ?>/template/backend/1/fancybox/jquery.observe_field.js"></script>  <style>
.detele-slide:hover {
	cursor: pointer;
    text-decoration: none;
    color: red;
}
.title {
	color: #fff;
	font-size: 2.57em;
    line-height: 1em;
    font-weight: bold;
}
.wrap_content {
	width: 560px;
    right: 40px;
    padding-top: 74px;
    float: right;
    text-align: center;
}

hr{
	border-top: 1px solid #ccc;
}
.row {
	    padding: 10px 0px 10px 0px;
    border-bottom: 1px solid #ccc;
}
</style>
<div class="col-sm-10" style="margin: 50px">
	
	<div class="col-sm-12" style="padding-bottom:20px">
    		<a id="add-slideshow" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> Thêm trình chiếu</a>
    </div>
    <form action="" method="post" id="form-slide-show">
    	
        <?php
            $conchay = 1;
            while($conchay <=10){

                if(isset($data_slide["slideshow-img-".$conchay.""])){ ?>
                    <div class="row slide-show-<?php echo $conchay ?>">';  
                   		<div class="col-sm-4">
                                <div class="add-slide-show">
                                    <input id="slideshow-img-<?php echo $conchay ?>" name="slideshow-img-<?php echo $conchay ?>" type="hidden" class="form-control" value="<?php echo $data_slide["slideshow-img-".$conchay.""]; ?>" hidden>
                                    <a id="anh-slideshow-<?php echo $conchay ?>" class="upload_btn" href="editor/filemanager/popup.aspx?type=1&amp;field_id=<?php echo 'slideshow-img-'.$conchay ?>"><img src="<?php echo (($data_slide["slideshow-img-".$conchay.""] != "") ? $data_slide["slideshow-img-".$conchay.""] : 'https://dd-cdn.multiscreensite.com/themes/blank-rows/blank-rows-img.jpg' ) ?>" class="img-slideshow" /></a>
                                </div>
                        </div>
                        <div class="col-sm-7">
                                <div class="input-group">
                                    <input type="text" name="title-slide-<?php echo $conchay ?>" class="form-control" placeholder="Tiêu đề" value="<?php echo $data_slide["title-slide-".$conchay.""] ?>">
                                </div>
                                <div class="input-group">
                                    <input type="text" name="description-slide-<?php echo $conchay ?>" class="form-control" placeholder="Mô tả" value="<?php echo $data_slide["description-slide-".$conchay.""] ?>">
                                </div>
                                <div class="input-group">
                                    <input type="text" name="button-slide-<?php echo $conchay ?>" class="form-control" placeholder="Tên button" value="<?php echo $data_slide["button-slide-".$conchay.""] ?>">
                                </div>
                                <div class="input-group">
                                    <input type="text" name="link-slide-<?php echo $conchay ?>" class="form-control" placeholder="Liên kết" value="<?php echo $data_slide["link-slide-".$conchay.""] ?>">
                                </div>
                                <div class="form-group">
                                	<div class="col-sm-2">
                                		<label for="sel1">Vị trí:</label>
                                	</div>	
								  	<div class="col-sm-6">
								  		<select class="form-control" id="sel1" name="caption-align-<?php echo $conchay ?>">
										    <option <?php if(isset($data_slide['caption-align-'.$conchay]) && $data_slide['caption-align-'.$conchay] == 'left' ) echo 'selected' ?> value="left">Bên trái</option>
										    <option <?php if(isset($data_slide['caption-align-'.$conchay]) && $data_slide['caption-align-'.$conchay] == 'right' ) echo 'selected' ?> value="right">Bên phải</option>
										    <option <?php if(isset($data_slide['caption-align-'.$conchay]) && $data_slide['caption-align-'.$conchay] == 'center' ) echo 'selected' ?> value="center">Giữa</option>
								  	   </select>
								  	</div>
								  
								</div>
                            </div>
                            <div class="col-sm-1">
                                <a class="detele-slide" id="delete-slide-<?php echo $conchay ?>" onclick="delete_slide(<?php echo $conchay ?>)"><i class="fa fa-trash-o" style="font-size: xx-large;margin-top: 10px;cursor: pointer;"></i> Xóa</a>
                            </div><hr>
                        </div>
                 <?php       
                }

                $conchay++;

            }

        ?>

        <div class="col-sm-12" style="margin-top: 20px;text-align:right">
            <input type="submit" class="btn btn-info" name="submit-slideshow" value="Lưu lại">
        </div>
    </form>
</div>
<div class="clearfix"></div>
<script type="text/javascript">
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
    $(document).ready(function(){
        $('a#add-slideshow').click(function(){
            var i=0;

            do{
                i++;
                if(i>10){
                    alert("***Không được vượt quá 10 hình ảnh!!!");
                    return false;
                }
                var img_number = $("input#slideshow-img-"+i+"").val();
            }while(typeof img_number != 'undefined');
            var data = '<div class="row slide-show-'+i+'"><div class="col-sm-4"><div class="add-slide-show"><input id="slideshow-img-'+i+'" name="slideshow-img-'+i+'" type="hidden" class="form-control" value="" hidden><a  id="anh-slideshow-'+i+'" class="upload_btn" href="editor/filemanager/popup.aspx?type=1&amp;field_id=slideshow-img-'+i+'" >+</a> </div> </div> <div class="col-sm-7"> <div class="input-group"> <input type="text" name="title-slide-'+i+'" class="form-control" placeholder="Tiêu đề"> </div> <div class="input-group"> <input type="text" name="description-slide-'+i+'" class="form-control" placeholder="Mô tả"> </div><div class="input-group"> <input type="text" name="button-slide-'+i+'" class="form-control" placeholder="Tên button"> </div> <div class="input-group"> <input type="text" name="link-slide-'+i+'" class="form-control" placeholder="Liên kết"> </div> </div> <div class="col-sm-1"> <a class="detele-slide" id="delete-slide-'+i+'" onclick="delete_slide('+i+')"><i class="fa fa-trash-o" style="font-size: xx-large;margin-top: 10px"></i> Xóa</a></div><hr></div>';
            $('form#form-slide-show').prepend(data);


        });
    });
    function delete_slide(id_slide){
        if(confirm("Bạn chắc chắn muốn XÓA chứ?") == true){
            $(".slide-show-"+id_slide+"").remove();
            jnetnotice("Bấm Lưu để thực hiện thay đổi");
        }
    }
</script>
<script type="text/javascript">
	$( document ).ready(function() {
     	 $('.upload_btn').fancybox({ 
		   'width'     : 900,
		    'height'    : 900,
		    'autoSize': false,
		    'type'      : 'iframe',
		
		});

		
		
     
	});
		function responsive_filemanager_callback(field_id){
			
			var idimg = field_id.split("-");
			var urlfull = $('#slideshow-img-'+idimg[2]).val();
			$("#anh-slideshow-"+idimg[2]).html("<img src='" + urlfull + "' class='img-responsive' />");
		}
		
	</script> 