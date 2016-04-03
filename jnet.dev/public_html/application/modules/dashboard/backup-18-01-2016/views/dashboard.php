<?php
	function replaceM($month) {
		if($month == "01") return "một"; if($month == "02") return "hai";if($month == "03") return "ba";if($month == "04")return "tư";
		if($month == "05") return "năm"; if($month == "06") return "sáu";if($month == "07") return "bảy";if($month == "08")return "tám";
		if($month == "09") return "chín"; if($month == "10") return "mười";if($month == "11") return "mười một"; if($month == "12") return "mười hai";
	}
	function replaceWeekday($weekday) {
		
		switch($weekday) {
			case 'Monday':
				$weekday = 'Thứ hai';
				break;
			case 'Tuesday':
				$weekday = 'Thứ ba';
				break;
			case 'Wednesday':
				$weekday = 'Thứ tư';
				break;
			case 'Thursday':
				$weekday = 'Thứ năm';
				break;
			case 'Friday':
				$weekday = 'Thứ sáu';
				break;
			case 'Saturday':
				$weekday = 'Thứ bảy';
				break;
			default:
				$weekday = 'Chủ nhật';
				break;
		}
		return $weekday;
	}
?>
<div class="pageheader">
	<div class="pageheader-title">
		
		<div class="panel-heading-title panel-default">
		  <div class="panel-body">
		    <i class="fa fa-tachometer fa-2"></i> Bảng tin
		  </div>
		</div>
		
	</div>
</div>
<div class="section feature feature-1">
	<div class="row">
        <div class="col-sm-4 col-xs-12 bottom-align feature-date">
         <p>Tháng <?php echo replaceM(date("m",time())); ?>, <?php echo date("Y",time()); ?></p>	
          <h1><?php echo date("d",time()); ?></h1>
          <span><?php echo replaceWeekday(date("l",time())); ?></span>   
        </div>
        <div class="col-sm-8 col-xs-12">
          
          <h2><span class="hello-word">Chào {username}</span>, chúc bạn một ngày tốt lành!</h2>
          <h4>Người thành đạt ko hẳn là người ra quyết định đúng đắn mà là người biết làm cho quyết định của mình trở lên đúng đắn, nói cách khác họ chấp nhận ý kiến phản hồi và tự sửa đổi. họ luôn tiếp nhận thông tin mới, sẵn sàng thay đổi khi cần thiết và ko bao giờ có thái độ nửa vời hay dao động.
			</h4>
           <div style="text-align: right">
            <i class="author"> Bill Gates</i>
           </div> 
        </div>
      </div>
</div>
<div class="row-centered box-dashboard">
	<div class="col-sm-5 col-xs-12 col-centered">
		<div class="panel panel-default">
		  <div class="panel-body">
		    <i class="fa fa-laptop fa-2"></i> Thiết lập giao diện 
		    <span class="button"> <a href="{url_site}/dashboard/setting/domain.html" class="btn btn-primary btn-sm">Thiết lập theme</a> </span>
		  </div>
		</div>
		<div class="panel panel-default">
		  <div class="panel-body">
		    <i class="fa fa-globe"></i> Cấu hình tên miền
		    <span class="button"> <a href="{url_site}/dashboard/template.html" class="btn btn-primary btn-sm">Cấu hình tên miền</a> </span>
		  </div>
		</div>
		<div class="panel panel-default">
		  <div class="panel-body">
		    <i class="fa fa-file"></i> Tạo trang mới
		  </div>
		</div>
		<div class="panel panel-default">
		  <div class="panel-body">
		    <i class="fa fa-file"></i> Sửa thông tin
		  </div>
		</div>
	</div>

</div>