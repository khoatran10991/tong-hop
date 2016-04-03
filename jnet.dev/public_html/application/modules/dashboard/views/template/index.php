



<div class="xs" style="">
	<div class="row" id="loadhtml" style="padding: 20px;">
		
		<?php if(isset($load)) 
				$this->load->view($load);
			  else if($this->input->get('edit'))
			  	$this->load->view($this->input->get('edit'));
			  else 
			  	$this->load->view('layout'); 
		?>
	</div>
</div>
