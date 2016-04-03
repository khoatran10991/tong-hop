<script type="text/javascript">
    $('#myModal').modal('show');
</script>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="panel panel-success">
                      <div class="panel-heading">
                          
                        <h4 class="panel-title">
                            Chỉnh Sửa Đường Dẫn Menu
                        </h4>
                      </div>
                      <div id="link-default">
                        <div class="panel-body">
<!--                           <form action="" method="post">  Lưu ý kẻo quên tag form, controller ko chay-->
                               <div class="col-sm-12">
                                            <p class="help-block">Đường Dẫn Trực Tiếp</p>
                               </div>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="http://" aria-describedby="basic-addon1" id="value_menu_link_default">
                                    
                                </div>
                               <div class="btn-group pull-right">
                                   <input type="submit" class="btn btn-info" value="Lấy Đường Dẫn" onclick="edit_menu_link_default({id_menu})">
                                </div>
                               <div class="col-sm-12">
                                            <p class="help-block">Đường Dẫn Đến Trang</p>
                               </div>
                                  <div class="input-group">
                                    <span class="input-group-btn text-center">
                                        <select id="value_menu_link_page" class="btn">
                                            <option value="0">Chọn Trang</option> 
                                            {page_all}
                                             <option value="{id_page}">{page_name}</option>   
                                            {/page_all}
                                        </select>
                                    </span>
                                    </div>
                                <div class="btn-group pull-right">
                                   <input type="submit" class="btn btn-info" name="submit_edit_link" value="Lấy Đường Dẫn" onclick="edit_menu_link_page({id_menu})">
                                </div>
                                  
                           <!--</form>-->
    </div>
  </div>	