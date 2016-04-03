
<style>
.padding-bottom {
	padding-bottom: 20px
}
.text-small {
	font-size: 13px;
    color: #777;
    text-align: right;
    padding-top: 7px;
}
a:link {
	color:#1994ef
}
</style>
<div class="xs" style="padding: 10px 20px 20px 20px">

	<div class="row" id="loadhtml" style="padding: 20px;">
		<div class="col-sm-12"><h4>Danh sách đơn hàng </h4></div>
		<hr>
		
		<div class="table-responsive">   
		<form action="" method="post">	       
		  <table class="table">
		    <thead>
		      <tr>
		        <th><input type="checkbox" id="input-checkall" /></th>
		        <th>Đơn hàng</th>
		        <th>Ngày tạo</th>
		        <th>Khách hàng</th>
		        <th>Hình thức thanh toán</th>
		        <th>Trạng thái đơn hàng</th>
		        <th>Tổng tiền</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php if(isset($orders) && isset($orders[0])) : ?>
		    	<?php $i=1; foreach($orders as $order)  : ?>
		    	<?php  $kh = json_decode($order->customer,true);  ?>
			      <tr>
			        <td><input type="checkbox" name="selectOrder" value="<?php echo $order->id ?>" /></td>
			        <td><a href="dashboard/orders?detail=<?php echo $order->id ?>">#<?php echo $order->order_number ?></a></td>
			        <td><?php echo date('d/m/Y h:i:s',$order->time_order) ?></td>
			        <td><?php echo $kh['fullname']; ?></td>
			        <td><?php echo $order->payment; ?></td>
			        <td><?php echo $order->status ?></td>
			        <td><?php echo number_format($order->total,0,".","."); ?>đ</td>
			        
			      </tr>
		      	<?php $i++; endforeach; ?>
		    <?php  else : echo "<tr><td colspan='7'>Chưa có đơn hàng nào.</td></tr>"; ?>  	
		    <?php endif; ?>  
		    </tbody>
		  </table>
		</form> 
		</div>
		
		<div class="col-sm-6"><?php echo $link_pagination_post ?></div>
		<div class="col-sm-6 text-small">Tất cả có <?php echo $total_orders ?> đơn hàng.</div>
	
	</div>
</div>
<script>
	 $("#input-checkall").change(function () {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
    });
	
</script>		