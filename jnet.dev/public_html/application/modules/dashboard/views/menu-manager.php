<script type="text/javascript" src="<?php echo $url_site ?>/template/backend/1/js/jquery-ui.min.js" ></script>
<script type="text/javascript">
<!--
jQuery(function($) {
    var panelList = $('#draggablePanel-home');
	var sortorder='';
    panelList.sortable({
        // Only make the .panel-heading child elements support dragging.
        // Omit this to make then entire <li>...</li> draggable.
        handle: '.panel-heading', 
        update: function() {
        	NProgress.start();
        	var sortId = 0;
        	var arrayOrder = new Array();
            $('.panel', panelList).each(function(index, elem) {
            	sortId = sortId + 1;
            	var columnId=$(this).attr('id');
            	
            	
                 var $listItem = $(elem),
                     newIndex = $listItem.index();
				
                 // Persist the new indices.
               // alert("Số thứ tự: " + sortId  + " là box : " + columnId);
                arrayOrder.push(columnId);
            });

            $.post("<?php echo $url_site ?>/dashboard/menu/menu_order", {
     			menuOrder : arrayOrder
        	}, function(data) {
        			//  alert(data);

        			NProgress.done();
        	  
        		});
            
        }
    });
});
//-->
</script>
<style type="text/css">
    /* show the move cursor as the user moves the mouse over the panel header.*/
    #draggablePanel-home .panel-heading  {
        cursor: move;
    }
</style>
<div class="col-md-6">
    <h4>Tạo Menu</h4>
        
    
    <div class="panel panel-default">
        <div class="panel-body">
          
            <div class="col-sm-12">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-success">
                      <div class="panel-heading">
                          
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#link-default">
                          Đường Dẫn Trực Tiếp</a>
                        </h4>
                      </div>
                      <div id="link-default" class="panel-collapse collapse in">
                        <div class="panel-body">
                           <form action="" method="post"> <!-- Lưu ý kẻo quên tag form, controller ko chay-->
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Tên Menu" name="name_menu_default" >
                                    <div class="col-sm-12">
                                           <p class="help-block"><?php echo form_error("name_menu_default"); ?></p>
                                   </div>
                                </div>
                               
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="http://" aria-describedby="basic-addon1" name="link_menu_default">
                                    <div class="col-sm-12">
                                            <p class="help-block"><?php echo form_error("link_menu_default"); ?></p>
                                    </div>
                                </div>
                                
                                <div class="row">
                                <div class="col-sm-3">
                                    <span>Menu Cha</span></div>
                                <div class="col-sm-9">
                                    <span class="input-group-btn">
                                        <select name="select_menu_default" class="btn">
                                            <option value="0">MENU CHÍNH</option>
                                            {menu_all}
                                             <option value="{id_menu}">{name}</option>   
                                            {/menu_all}
                                        </select>
                                    </span>
                                </div>
                            </div>
                            <div class="btn-group pull-right">
                                <input type="submit" class="btn btn-info" name="submit_link_default" value="Thêm Vào">
                            </div>
                            </form>
                        </div>
                      </div>
                    </div>
                    <div class="panel panel-danger">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#link-page" >
                          Đường Dẫn Đến Trang</a>
                        </h4>
                      </div>
                      <div id="link-page" class="panel-collapse collapse">
                          <div class="panel-body">
                            <form action="" method="post"> <!-- Lưu ý kẻo quên tag form, controller ko chay-->  
                                <div class="input-group">
                                    <input type="text" name="name_menu_page" class="form-control" placeholder="Tên Menu" >
                                    <div class="col-sm-12">
                                           <p class="help-block"><?php echo form_error("name_menu_page"); ?></p>
                                   </div>
                                </div>
                                  <div class="input-group">
                                    <span class="input-group-btn text-center">
                                        <select name='select_page' class="btn">
                                            <option value="0">Chọn Trang</option> 
                                            {page_all}
                                             <option value="{id_page}">{page_name}</option>   
                                            {/page_all}
                                        </select>
                                    </span>
                                    </div>
                                  <div class="row">
                                <div class="col-sm-4">
                                    <span>Menu Cha</span></div>
                                <div class="col-sm-8">
                                    <span class="input-group-btn">
                                        <select name='select_menu_page' class="btn">
                                            <option value="0">MENU CHÍNH</option>
                                            {menu_all}
                                             <option value="{id_menu}">{name}</option>   
                                            {/menu_all}
                                        </select>
                                    </span>
                                </div>
                            </div>
                            <div class="btn-group pull-right">
                                <input type="submit" class="btn btn-info" name="submit_link_page" value="Thêm Vào">
                            </div>
                            </form>
                        </div>
           
                      </div>
                    </div>
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#link-catelogy">
                          Đường Dẫn Đến Chuyên Mục</a>
                        </h4>
                      </div>
                      <div id="link-catelogy" class="panel-collapse collapse">
                        <div class="panel-body">
                        	 <form action="" method="post"> 
                                <div class="input-group">
                                    <input type="text" name="name_menu_catelogy" class="form-control" placeholder="Tên Menu" >
                                    
                                </div>
                                  <div class="input-group">
                                    <span class="input-group-btn text-center">
                                        <select name='select_catelogy' class="btn">
                                            <option value="0">Chọn chuyên mục</option> 
                                            {catelogy_all}
                                             <option value="{id_category}">{name}</option>   
                                            {/catelogy_all}
                                        </select>
                                    </span>
                                    </div>
                                  <div class="row">
                                <div class="col-sm-4">
                                    <span>Menu Cha</span></div>
                                <div class="col-sm-8">
                                    <span class="input-group-btn">
                                        <select name='select_menu_catelogy' class="btn">
                                            <option value="0">MENU CHÍNH</option>
                                            {menu_all}
                                             <option value="{id_menu}">{name}</option>   
                                            {/menu_all}
                                        </select>
                                    </span>
                                </div>
                            </div>
                            <div class="btn-group pull-right">
                                <input type="submit" class="btn btn-info" name="submit_link_catelogy" value="Thêm Vào">
                            </div>
                            </form>
                        
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            
            
        </div>
    </div>
</div>
<div class="col-md-6">
    <h4>Quản Lý Menu</h4>
   {list_menu}  
    
   
    <script type="text/javascript">
        var listmenus = new Array();
        {menu_all}
            listmenus.push({
                id_menu     : '{id_menu}',
                name        : '{name}',
                id_parent   : '{id_parent}'
            });
                
        {/menu_all}
    </script>
    <script type="text/javascript">
            var html ='';
            function get_parent(listmenus,parent_id,current_id,current_id_parent,string){
                
                var loop = new Array();
                var contin = new Array();
                
                for(var i = 0; i <listmenus.length;i++){
                    
                    if(current_id == listmenus[i].id_menu || current_id == listmenus[i].id_parent){
                     //do not thing   
                    }else if(listmenus[i].id_parent == parent_id){
                        loop.push(listmenus[i]);
                    }else{
                       contin.push(listmenus[i]); 
                    }
                    
                
                }
                
                for(var i=0 ; i < loop.length; i++)
                {
                    html+= '<option value="'+loop[i].id_menu+'" '+((current_id_parent==loop[i].id_menu)? 'selected':'')+'>'+string+loop[i].name+'</option>';
                    get_parent(contin,loop[i].id_menu,current_id,current_id_parent,string+'--- ');
                }
            }
            $('.click_edit_menu').click(function(){
                
                var id = $(this).attr('data-id');
                var id_parent = $(this).attr('data-parent-id');
                html = '<option value="0">MENU CHÍNH</option>';
                
                get_parent(listmenus,0,id,id_parent,'--- ');
                
                $('#menu_parent_'+id).html(html);
            });
            
            function do_remove(id_menu,id_parent){
                
                if(confirm("Bạn có muốn xóa không?")){
                   
                   $.post("{url_site}/dashboard/menu/remove_menu", {
				id_menu : id_menu,
                                id_parent : id_parent
			}, function(data) {
				window.location.reload();
			}
                     );
                } else 
                    return false;
                
            }
            function do_edit(id_menu){
                $.post("{url_site}/dashboard/menu/edit_menu", {
                             id_menu : id_menu,
                             name: $('#menu_name_'+id_menu).val(),
                             catelogy: $('#menu_catelogy_'+id_menu).val(),
                             link: $('#menu_link_'+id_menu).val(),
                             id_parent: $('#menu_parent_'+id_menu).val()
                     }, function(data) {
                                window.location.reload();
                     }
                  );
            }
            function edit_link(id_menu){
                
                $.post("{url_site}/dashboard/menu/edit_link_menu", {
                            id_menu : id_menu
		}, function(data) {
			$('#edit-link-form').html(data);
			
		  
			}
				);
            }
            function edit_menu_link_default(id_menu){
                var value_link = document.getElementById("value_menu_link_default").value;
                if (!value_link || value_link.length === 0){
                    alert('Đường Dẫn Không Được Trống');
                    return false;
                }
                document.getElementById('menu_catelogy_'+id_menu).value = "link-default";
                document.getElementById('menu_link_'+id_menu).value = value_link;
                $('#myModal').modal('hide');
            }
            function edit_menu_link_page(id_menu){
                var value_page = document.getElementById("value_menu_link_page").value;
                if (value_page == 0){
                    alert('Vui Lòng Chọn Trang');
                    return false;
                }
                $.post("{url_site}/dashboard/menu/edit_menu_link_page", {
                             id_page : value_page
                     }, function(data) {
                        document.getElementById('menu_catelogy_'+id_menu).value = "link-page";
                        document.getElementById('menu_link_'+id_menu).value = data;
                        $('#myModal').modal('hide');
                     }
                  );

            }
    </script>
    
    <!-- test -->
   
	<!-- end test -->					
</div>
<div class="clearfix"></div>
<div id="edit-link-form"></div>