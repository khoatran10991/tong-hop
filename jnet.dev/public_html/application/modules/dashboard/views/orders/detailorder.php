<?php
	//print_r($order);
	$this->load->library('getthumb');
	$products = json_decode($order['products'],true);
	$customer = json_decode($order['customer'],true);
	$history1 = (json_decode($order['order_history'],true));
	if(isset($history1)) : $history = array_reverse($history1); else : $history = array(); endif;
?>
<style>
.box-detail-order {
	border:1px solid #ddd;	
	background-color: #fff;
    border-radius: 3px;
    box-shadow: 0 2px 4px rgba(0,0,0,.1);
    padding-bottom: 50px;
    
}
@media(min-width:768px) {
   .left {
	margin-right: 40px;
	}
}

.box-detail-order .box-header {
	padding:20px 10px;
}
.box-detail-order .box-header p{
	font-size: 14px;
    color: #999;
}
.table-responsive,.notes {
	border-top:1px solid #ddd;
	padding:10px;
}	
.box-detail-order .box-footer {
	width: 100%;
	float:right;
	text-align: right;
	padding-bottom: 20px
}	
.box-detail-order .box-footer h5{
	font-weight: bold;
}
.box-detail-order .box-footer p {
	font-size: 14px;
}
.box-detail-order .box-header .back{
	color:#333 !important;
	padding-bottom: 10px !important
}
.box-header span {
    padding-right: 10px;
}
</style>
<div class="xs" style="padding: 10px 20px 20px 20px;background:#f2f4f8;">

	<div class="row" id="loadhtml" style="padding: 20px;">
		<?php if(isset($message) && $message != '') echo '<p class="alert alert-success"><i class="fa fa-check"></i> '.$message.'</p>'; ?>
		<div class="col-sm-7 box-detail-order left">
			<div class="box-header">
				<h4>Chi tiết đơn hàng #<?php echo $order['order_number'] ?></h4>
				<p>Hình thức thanh toán: <?php echo $order['payment']; ?></p>
				<p>Trạng thái: <?php echo $order['status']; ?></p>
			</div>
			
			<div class="table-responsive">          
			  <table class="table">
			    <tbody>
			    <?php if(isset($products)) : foreach($products as $product) : ?>	
			      <tr>
			        <td><img style="width: 50px;height: 55px;" src="<?php echo $this->getthumb->image($product['thumb'],"90x90"); ?>" class="img-responsive"/></td>
			        <td><a href="san-pham/<?php echo $product['url'] ?>.html"><?php echo $product['name'] ?></a></td>
			        <td><?php echo number_format($product['price'],0,".",".")?>đ  x  <?php echo $product['qty'] ?></td>
			        <td><?php echo number_format($product['subtotal'],0,".",".") ?>đ</td>
			      
			      </tr>
			     <?php endforeach; endif; ?> 
			    </tbody>
			  </table>
		    </div>
		    <?php if(isset($customer['notes']) && $customer['notes'] != '') : ?>
		    <div class="notes">
		    	<p><i>Khách hàng ghi chú:</i> <?php echo $customer['notes'] ?></p>
		    </div>
		    <?php endif; ?>
		    <div class="box-footer">
		    	<div class="row">
		    		<div class="col-sm-9">
		    	 	<h5>Giá:</h5>
			    	</div>
			    	<div class="col-sm-3">
			    	 	<p><?php echo number_format($order['total'],0,".",".") ?>đ</p>
			    	 	
		    		</div>
		    	</div>
		    	<div class="row">
			    	<div class="col-sm-9">
			    	 	<h5>Vận chuyển:</h5>
			    	</div>
			    	<div class="col-sm-3">
			    	 	<p><?php echo $order['shipping']?></p>
			    	 	
			    	</div>
		    	</div>
		    	<div class="row">
			    	<div class="col-sm-9">
			    	 	<h4>Tổng cộng:</h4>
			    	</div>
			    	<div class="col-sm-3">
			    	 	<h4><?php echo number_format($order['total'],0,".",".") ?>đ</h4>
			    	 	
			    	</div>
		    	</div>
		    </div>
		    <div class="" style="width: 100%">
		    	<a href="javascript:" style="color:#777">Thay đổi trạng thái: </a><br>
		    	<a href="<?php echo $url_site.$_SERVER['REQUEST_URI']."&action=1" ?>" class="btn btn-default btn-sm">Đang giao hàng</a>
		    	<a href="<?php echo $url_site.$_SERVER['REQUEST_URI']."&action=2" ?>" class="btn btn-default btn-sm">Chờ thanh toán</a>
		    	<a href="<?php echo $url_site.$_SERVER['REQUEST_URI']."&action=3" ?>" class="btn btn-default btn-sm">Chờ xác nhận</a>
		    	<a href="<?php echo $url_site.$_SERVER['REQUEST_URI']."&action=4" ?>" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Hủy bỏ</a>
		    	<a href="<?php echo $url_site.$_SERVER['REQUEST_URI']."&action=5" ?>" class="btn btn-info btn-sm"><i class="fa fa-check"></i> Hoàn thành</a>
		    </div>
			
		</div>
		<div class="col-sm-4 box-detail-order" style="padding-bottom: 0px;">
			<div class="box-header">
				<h4>Thông tin khách hàng</h4>
				<p class="back"><span><i class="fa fa-user"></i></span> <?php echo $customer['fullname'] ?></p>
				<p class="back"><span><i class="fa fa-map-marker"></i></span> <?php echo $order['address'] ?></p>
				<p class="back"><span><i class="fa fa-mobile"></i></span> <?php echo $customer['phonenumber'] ?></p>
				<p class="back"><span><i class="fa fa-envelope"></i></span> <?php echo $customer['email'] ?></p>
			</div>
			
		</div>
		<div class="col-sm-4 box-detail-order" style="padding-bottom: 0px;margin-top: 20px">
			<div class="box-header">
				<h4>Lịch sử đơn hàng</h4>
				<?php if(isset($history)) : ?>
				<?php for($i=0;$i<count($history);$i++): ?>
				<?php if($i<6)  :?>
				<p style="font-size: 13px;" class="back"><i class="fa fa-circle-thin"></i> <?php echo $history[$i] ?></p> 
				<?php else : echo "<b>...</b>"; break; ?>
				<?php endif; ?>
				<?php endfor; ?>
				<?php endif; ?>
			</div>
			
		</div>
		
		
	</div>
</div>		