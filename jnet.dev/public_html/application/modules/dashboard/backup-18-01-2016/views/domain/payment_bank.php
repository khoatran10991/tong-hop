<div class="col-sm-12">
	<div class="panel panel-default">
	  <div class="panel-body">
	    	Bạn có thể chuyển khoản cho chúng tôi <?php echo number_format($total,0,",",".") ?> ₫ với nội dung "<?php echo $orderID ?>" đến một trong các tài khoản ngân hàng sau:
	  </div>
	</div>
	

</div>
<div class="col-sm-12">
	<?php 
		foreach ($banks as $bank) :
	?>
	 <div class="col-sm-6">
		<div class="bank">
		  <div class="col-sm-3">
		  
		      <img class="img-responsive" src="<?php echo $bank->bank_logo ?>">
		   
		  </div>
		  <div class="col-sm-9">
		    <h5 class="media-heading">
		    <?php echo $bank->bank_name ?> <br>
		    - Số tài khoản: <?php echo $bank->bank_number ?> <br>
		    - Chủ tài khoản: <?php echo $bank->bank_account ?> <br>
		    - Chi nhánh: <?php echo $bank->bank_branch ?>
		    </h5>
		  </div>
	  </div>
	</div>
	<?php 
		endforeach;
	?>


</div>