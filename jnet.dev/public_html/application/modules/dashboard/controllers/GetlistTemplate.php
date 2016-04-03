<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Controller switch and edit template
*/
class GetlistTemplate extends MX_Controller
{
	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('Templates_model');
	

	}
	function change_theme() {
		if($this->input->post("idStore")) {
			$id_store = $this->input->post("idStore");	
			$themeId = $this->input->post("idTheme");	
			$update = $this->Templates_model->change_theme($id_store,$themeId);
			if($update)
				echo 1;
			else 
				echo 0;
		}
	}
	
	function get_by_id_cate() {
		
		if(isset($_POST['cate'])) {
			$cate_id = $this->input->post("cate");
			$templates = $this->Templates_model->get_list_by_cate($cate_id);
	?>
		<?php
		if($templates) :
    	foreach ($templates as $tem) :	
    	?>
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail box-template">
          <a data-toggle="modal" data-target="#themeModal<?php echo $tem->id_theme ?>" href="#themeModal<?php echo $tem->id_theme ?>">
	          	<img  class="img-responsive" data-src="<?php echo $tem->link_screenshot ?>screenshot.png" alt="100%x200" src="<?php echo  $tem->link_screenshot ?>screenshot.png" data-holder-rendered="true" style="height: 300px; width: 100%; display: block;">
	      </a>
          <div class="caption">
            <h4><?php echo $tem->name; ?></h4>
            <span class="catelogy-templates"><i class="fa fa-tag"></i> Loại: Thương mại điện tử</span>
            <p style="margin-top: 10px;">
	            	<button  id="1" data-toggle="modal" data-target="#themeModal<?php echo $tem->id_theme ?>" class="btn btn-primary" role="button">Sử dụng</button> 
	            	<button id="1" data-toggle="modal" data-target="#themeModal<?php echo $tem->id_theme ?>" class="btn btn-default" role="button">Chi tiết</button>
	         </p>
          </div>
        </div>
      </div>
      <!-- Modal -->
		  <div class="modal fade" id="themeModal<?php echo $tem->id_theme ?>" role="dialog">
		    <div class="modal-dialog modal-lg">
		    
		      <!-- Modal content-->
		      <div class="modal-content" id="modal-content<?php echo $tem->id_theme ?>">
		        <div class="modal-header" style="border-bottom: none;">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          
		        </div>
		        <div class="modal-body" id="body<?php echo $tem->id_theme ?>">
		          <div class="row">
		          	<div class="col-sm-12 col-sm-6">
		          		<img class="img-responsive" src="<?php echo $tem->link_screenshot ?>screenshot.png" />
		          	</div>
		          	<div class="col-sm-12 col-sm-6">
		          		<h2>Giao diện <?php echo $tem->name; ?></h2> <span class="catelogy-templates"> Phiên bản: 1.0</span> 
		          		<span class="hint">Bởi: JNET Theme team</span>
		          		<br>
		          			<?php echo $tem->description; ?>
		          		<br>
		          		<hr>
		          		<p>
			          		JNET sẽ hướng dẫn và hỗ trợ bạn sử dụng giao diện trong suốt thời gian vận hành website.
							<br>
							Bạn còn thắc mắc, vui lòng liên hệ 01225.335.001
							<br>
							Hoặc: <a href="mailto:websupport@jnet.vn">websupport@jnet.vn</a>
						</p>
		          	</div>
		          
		          </div>
		        </div>
		        <div class="modal-footer" style="text-align: center">
		          <button onclick="changeTheme(<?php echo $tem->id_theme ?>);"  class="btn btn-primary" role="button"><span id="btn-active">Kích hoạt</span></button>
		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      
		        </div>
		      </div>
		      
		    </div>
		  </div>
		  <!-- end Modal -->
      
      <?php 
      	endforeach;
		endif;
		
		} 
	} # end function
}	
?>