<style>
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
</style>
<div class="col-sm-10" style="margin: 50px">
	<div class="col-sm-12" style="margin-bottom: 50px">
		<div style="min-height:300px;background: url(http://sangnguyen.dev/uploads/images/slide_04.jpg) no-repeat;background-position: center;">
			<div class="wrap_content">
				<div class="title">
					ATTRACTIVE & ELEGANT HTML THEME
				</div>
			</div>
			
		</div>
	</div>
	<div class="col-sm-12" style="padding-bottom:20px">
    		<a id="add-slideshow" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> Thêm trình chiếu</a>
    </div>
    <form action="" method="post" id="form-slide-show">
    	
        <?php
            $conchay = 1;
            while($conchay <=10){

                if(isset($data_slide["slideshow-img-".$conchay.""])){
                    echo '<div class="row slide-show-'.$conchay.'">';
                    if(!empty($data_slide["slideshow-img-".$conchay.""])){
                        echo '<div class="col-sm-4">
                                <div class="add-slide-show">
                                    <input id="slideshow-img-'.$conchay.'" name="slideshow-img-'.$conchay.'" type="hidden" class="form-control" value="'.$data_slide["slideshow-img-".$conchay.""].'" hidden>
                                    <a id="anh-slideshow-'.$conchay.'" onclick="openLibImages(\'slideshow-img-'.$conchay.'\',\'anh-slideshow-'.$conchay.'\')"><img src="'.$data_slide["slideshow-img-".$conchay.""].'" class="img-slideshow" /></a>
                                </div>
                            </div>';
                    }else{
                        echo '<div class="col-sm-4">
                                <div class="add-slide-show">
                                    <input id="slideshow-img-'.$conchay.'" name="slideshow-img-'.$conchay.'" type="hidden" class="form-control" value="'.$data_slide["slideshow-img-".$conchay.""].'" hidden>
                                    <a id="anh-slideshow-'.$conchay.'" onclick="openLibImages(\'slideshow-img-'.$conchay.'\',\'anh-slideshow-'.$conchay.'\')">+</a>
                                </div>
                            </div>';
                    }

                        echo    '<div class="col-sm-7">
                                <div class="input-group">
                                    <input type="text" name="title-slide-'.$conchay.'" class="form-control" placeholder="Tiêu đề" value="'.$data_slide["title-slide-".$conchay.""].'">
                                </div>
                                <div class="input-group">
                                    <input type="text" name="link-slide-'.$conchay.'" class="form-control" placeholder="Đường dẫn" value="'.$data_slide["link-slide-".$conchay.""].'">
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <a class="detele-slide" id="delete-slide-'.$conchay.'" onclick="delete_slide('.$conchay.')"><i class="fa fa-trash-o" style="font-size: xx-large;margin-top: 10px;cursor: pointer;"></i> Xóa</a>
                            </div>
                        </div>';
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
            var data = '<div class="row slide-show-'+i+'"><div class="col-sm-4"><div class="add-slide-show"><input id="slideshow-img-'+i+'" name="slideshow-img-'+i+'" type="hidden" class="form-control" value="" hidden><a  id="anh-slideshow-'+i+'" onclick="openLibImages(\'slideshow-img-'+i+'\',\'anh-slideshow-'+i+'\')">+</a> </div> </div> <div class="col-sm-7"> <div class="input-group"> <input type="text" name="title-slide-'+i+'" class="form-control" placeholder="Tiêu đề"> </div> <div class="input-group"> <input type="text" name="link-slide-'+i+'" class="form-control" placeholder="Đường dẫn"> </div> </div> <div class="col-sm-1"> <a class="detele-slide" id="delete-slide-'+i+'" onclick="delete_slide('+i+')"><i class="fa fa-trash-o" style="font-size: xx-large;margin-top: 10px"></i> Xóa</a></div></div>';
            $('form#form-slide-show').prepend(data);


        });
    });
    function delete_slide(id_slide){
        if(confirm("Bạn chắc chắn muốn XÓA chứ?") == true){
            $(".slide-show-"+id_slide+"").remove();
        }
    }
</script>