<style>
.td-bold {
	color: rgba(0, 0, 0, 0.74);
    font-weight: bold;
}
.td {
	color: rgba(0, 0, 0, 0.74);
    
}
.row-actions {
	display:none;
}
.row-item:hover  .row-actions {
	display: block !important;
}
.row-item {
	height: 75px;
}
.row-item:hover  {
	    background-color: rgba(221, 221, 221, 0.24);
}
</style>
<script type="text/javascript">
<!--
function ConfirmDel(idPost) {
	var r = confirm("Bạn thực sự muốn xóa ?");
	if (r == true) {
		var url = "{url_site}/dashboard/posts.html?action=trash&post=" + idPost + "&jnettoken=<?php echo $_COOKIE['jnet_session'] ?>";
		window.location.href = url;
	} else 
		return false;
}
//-->
</script>
<div class="col-md-12 graphs">
	<?php if(isset($message)&& $message != "") : ?>
	<p class="alert alert-success"><?php echo $message; ?></p>
	<?php endif; ?>
  <div class="xs">
  <h3>Bài viết <a href="{url_site}/dashboard/posts/addpost.html" title="Tạo trang mới" class="btn btn-default btn-sm">Thêm mới</a></h3>
  <form action="" method="post"  id="formitems">
  	  <div class="row">
  	  	  	
  	  	  <div class="form-group" style="margin:0px 0px 10px 0px">
				<div class="col-sm-2">
					 <select class="form-control" id="post_del" name="del-selected">
						 <option value="0">Tác vụ</option>
						 <option value="1">Xóa</option>						    
					 </select>
				</div>
				<div class="col-sm-1" >
					<input type="submit" class="btn btn-default" name="submit_post_del" value="Áp dụng">
				</div>
				<div class="col-sm-3">
					 <div class="input-group"> 
					 	<input type="text" name="txt_search" class="form-control" placeholder="Tìm kiếm..."> <span class="input-group-btn"> <input class="btn btn-default" type="submit" name="submit_post_search" value="Tìm!"> </span> 
					 </div>
				</div>
	  	  </div>
	  	  
	  	  
  	  </div>	
  	 	
	  <div class="panel-body1" style="margin: 0em 0 0 0;">
	  		
		   
		   <table class="table">
		     <thead>
		        <tr>
		          <th><input  onclick="jqCheckAll(); " id="input-checkall" type="checkbox"></th>
		          <th style="min-width: 300px;">Tiêu đề</th>
		          
		          <th>Ngày đăng</th>
		        </tr>
		      </thead>
		      <tbody>
		      	{list_posts}	
		        <tr class="row-item">
		          <th scope="row"><input id="cb-select" type="checkbox" name="post[]" value="{id_post}"></th>
		          <td>
			          <span class="td-bold"><a  href="<?php echo $url_site ?>/dashboard/posts/editpost.html?post={id_post}&jnettoken=<?php echo $_COOKIE['jnet_session'] ?>">{post_name}</a></span>
			          <div class="row-actions">
			          	<span class="edit">
			          		<a style="color: #47475F;" href="<?php echo $url_site ?>/dashboard/posts/editpost.html?post={id_post}&jnettoken=<?php echo $_COOKIE['jnet_session'] ?>" title="Chỉnh sửa"><i class="fa fa-pencil"></i> Chỉnh sửa</a> | </span>
			          		
			          		<span class="trash"><a onclick="ConfirmDel({id_post});" style="color: #a00;" href="javascript:" class="submitdelete" title="Xóa trang này" ><i class="fa fa-trash-o"></i> Xóa</a> | </span>
			          		<span class="view"><a style="color: #47475F;" href="<?php echo $url_site ?>/p/{post_url}.html" target="_blank" title="Xem “{post_name}”" rel="permalink"><i class="fa fa-eye"></i> Xem</a>
			          	</span>
			          </div>
		          </td>
		          
		          <td><span class="td">{time_created}</span></td>
		        </tr>
		       {/list_posts}
		      </tbody>
                      
		   </table>
                   
                        {link_pagination_post}
                   
	
	  </div>
  </form>	  
 </div>
</div>
<script>
function jqCheckAll( )
{
	if ($('input#input-checkall').prop('checked')) {	   
	    	$('input#cb-select').attr('checked', true);   
	}
	else  {
	        $('input#cb-select').attr('checked', false);
	    }
}


</script>