<!-- html -->
		<html>
		<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>'
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<title>Active Store - Create</title>
		<style>
			@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
			
			body {padding-top:50px;}
			
			.box {
			    border-radius: 3px;
			    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
			    padding: 10px 25px;
			    text-align: left;
			    display: block;
			    margin-top: 60px;
			}
			.box-icon {
			    background-color: #57a544;
			    border-radius: 50%;
			    display: table;
			    height: 100px;
			    margin: 0 auto;
			    width: 100px;
			    margin-top: -61px;
			}
			.box-icon span {
			    color: #fff;
			    display: table-cell;
			    text-align: center;
			    vertical-align: middle;
			}
			.info > .form-input {
				text-align: left !important;
				
			}
			.info h4 {
			    font-size: 26px;
			    letter-spacing: 2px;
			    text-transform: uppercase;
			}
			.info > p {
			    color: #717171;
			    font-size: 16px;
			    padding-top: 10px;
			    text-align: justify;
			}
			.info > a {
			    background-color: #03a9f4;
			    border-radius: 2px;
			    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
			    color: #fff;
			    transition: all 0.5s ease 0s;
			}
			.info > a:hover {
			    background-color: #0288d1;
			    box-shadow: 0 2px 3px 0 rgba(0, 0, 0, 0.16), 0 2px 5px 0 rgba(0, 0, 0, 0.12);
			    color: #fff;
			    transition: all 0.5s ease 0s;
			}
			.btn {
				margin-top:20px;
			}
		</style>
		<script type="text/javascript">
			function checkcreate() {
				if($('#website').val() == '' || $('#website-desc').val() == '' ) {
					alert('Chưa nhập đầy đủ thông tin');
					return false;
				}
				else {
					$('#proccess-div').show('slow');
					return true;
				}
				
				
			}	
		</script>
		</head>
		<body>
		<div class="container" style="margin-bottom:100px">
			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3"></div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	            <div class="box">
	                <div class="box-icon">
	                    <span><img src="//jnet.vn/template/frontend-admin/1/images/logo-j-44.png" /></span>
	                </div>
	                <div class="info">
	                    <h4 class="text-center">Chào mừng <?php echo $fullname ?></h4>
	                    <p>Bạn vừa tạo tài khoản thành công, tiếp theo hãy thiếp lập các thông tin cơ bản cho website của bạn để bắt đầu bán hàng một cách chuyên nghiệp và hiệu quả.</p>
	                    <div id="proccess-div" style="display: none">
	                    	<div class="progress progress-striped active" style="margin-bottom:0;"><div class="progress-bar" style="width: 100%"></div></div>
	                    </div>
	                    
	                    <form id="form-div" action="/store/setup/create" method="post">
		                    <div class="form-input">
		                    	<div class="form-group">
								  <label for="usr">Địa chỉ website:</label>
								  <input disabled type="text" class="form-control" id="website" name="website" value="http://<?php echo $username ?>.jweb.vn">
									<i style="color: #ADA4A4;font-size: 13px;">Bạn có thể thêm tên miền riêng sau khi tạo website</i>
								</div>
								<div class="form-group">
								  <label for="usr">Tiêu đề website:</label>
								  <input type="text" class="form-control" id="website-title" name="website-title">
								</div>
								<div class="form-group">
								  <label for="usr">Thông tin mô tả:</label>
								  <textarea name="website-desc" id="website-desc" class="form-control" rows="3" id="comment"></textarea>
								</div>
								<div class="form-group">
								  <label for="sel1">Loại website:</label>
								  <select class="form-control" id="sel1" name="website-type">
								   <?php 
								   $this->load->model('Store_model');
								   $site_type = $this->Store_model->get_type();
								   	if(isset($site_type) && isset($site_type[0])) :
								   		foreach($site_type as $type) {
											echo '<option value="'.$type->type_id.'">'.$type->type_name.'</option>';
										}
								   	
								   	
								   	endif;
								   	
								   ?>
								  </select>
								</div>
								<div class="form-group" style="text-align: center">
								    <input onclick="return checkcreate();" type="submit" name="submit" class="btn btn-success" value="Tạo website" />
								</div>
		                    	
		                    </div>
		                  
	                    </form>
	                </div>
	            </div>
        	</div>
        	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
		
		</div>
		</div>
 </body>
 </html>