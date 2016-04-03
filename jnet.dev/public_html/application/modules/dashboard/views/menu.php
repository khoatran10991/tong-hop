 <style>
 	@media only screen and (max-width: 767px){
					    #mobile-header {
					        display: block;
					    }
					    #dd-right {
							display: none !important;
						}
   }
 </style>	
 <div class="xs" style="padding: 10px 20px 20px 20px">

	
	<div class="row" id="loadhtml" style="padding: 20px;"> 
  
  <link rel="stylesheet" type="text/css" href="<?php echo $url_site ?>/template/backend/1/domenu-master/presentation-style.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo $url_site ?>/template/backend/1/domenu-master/jquery.domenu-0.95.77.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.2.0/styles/github.min.css"/>

 
  <h3 id="user-menu">Trình đơn</h3>
  <div class="dd" id="domenu-1" style="width: 80%;">
  	<?php if(isset($message)) echo $message; ?>
    <button id="domenu-add-item-btn" class="dd-new-item">+ Thêm menu cha</button>

    <li class="dd-item-blueprint">

      <button class="collapse" data-action="collapse" type="button" style="display: none;">–</button>
      <button class="expand" data-action="expand" type="button" style="display: none;">+</button>
      <div class="dd-handle dd3-handle ">Drag</div>
      <div class="dd3-content">
        <span class="item-name">[item_name]</span>
        <div class="dd-button-container">
          <button title="Sửa" class="custom-button-example"><i class="fa fa-pencil"></i> Chỉnh sửa</button>
          <button  title="Thêm menu con" class="item-add">Thêm menu con</button>
          <button title="Xóa" class="item-remove" data-confirm-class="item-remove-confirm">Xóa</button>
        </div>
        <div class="dd-edit-box" style="display: none;">
          <input type="text" name="title" autocomplete="off" placeholder="Item"
                 data-placeholder="Any nice idea for the title?"
                 data-default-value="Tiêu đề menu {?numeric.increment}">
       
          <select name="custom-select">
          
            <option value="<?php echo $url_site ?>/lien-he">Trang liên hệ</option>
            <optgroup label="Danh mục sản phẩm">
              <?php
               if(isset($catelogy_all)) {
			   		foreach($catelogy_all as $cate) {
						if($cate->id_parent == 0) {
							$link = $this->url->get_url_cate($cate->link,$id_store);	
							echo '<option value="'.$link.'"><b>'.$cate->name.'</b></option>';
							foreach($catelogy_all as $subcate) {
								if($subcate->id_parent != 0 && $subcate->id_parent == $cate->id_category) {
									$link = $this->url->get_url_cate($subcate->link,$id_store);	
									echo '<option value="'.$link.'">--'.$subcate->name.'</option>';
									foreach($catelogy_all as $subsubcate) {
										if($subsubcate->id_parent != 0 && $subsubcate->id_parent == $subcate->id_category) {
											$link = $this->url->get_url_cate($subsubcate->link,$id_store);	
											echo '<option value="'.$link.'">----'.$subsubcate->name.'</option>';
											
											
										}
										
									}
									
								}
								
							}
							
						}
					}
			   } 
              	
              ?>
            </optgroup>
            <optgroup label="Danh mục bài viết">
              <?php
               if(isset($cates_post)) {
			   		foreach($cates_post as $cate) {
						if($cate->id_parent == 0) {
							$link = $cate->link.".html";	
							echo '<option value="'.$link.'"><b>'.$cate->name.'</b></option>';
							foreach($cates_post as $subcate) {
								if($subcate->id_parent != 0 && $subcate->id_parent == $cate->id_category) {
									$link = $subcate->link.".html";	
									echo '<option value="'.$link.'">--'.$subcate->name.'</option>';
									foreach($cates_post as $subsubcate) {
										if($subsubcate->id_parent != 0 && $subsubcate->id_parent == $subcate->id_category) {
											$link = $subsubcate->link.".html";	
											echo '<option value="'.$link.'">----'.$subsubcate->name.'</option>';
											
											
										}
										
									}
									
								}
								
							}
							
						}
					}
			   } 
              	
              ?>
            </optgroup>
          
            <optgroup label="Bài viết">
            	<?php
            		if(isset($posts)) {
						foreach($posts as $post) {
							$link = "/".$post->post_url.".html";	
							echo '<option value="'.$link.'">'.$post->post_name.'</option>';
						}
						
					}
            	?>	
            </optgroup>
          </select>
          <i class="end-edit fa fa-floppy-o"> Lưu</i>
        </div>
      </div>
    </li>

    <ol class="dd-list"></ol>
  </div>
  <div class="dd-right" style="width: 20%;float:right;padding-left: 10px">
  		<img id="huong-dan-add-menu" style="display: none;margin-top: -10px" width="180px" src="<?php echo $url_site ?>/template/backend/1/images/huong-dan-menu-moi.png"/>
  </div>
 <form action="" method="post">
	  <div id="domenu-1-output" class="output-preview-container">
	   
		    <textarea style="display:none" style="width: 100%; min-height: 300px;" name="jsonOutput" class="jsonOutput"></textarea>
		   
	  </div>
	 <div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				
				<input type="submit" class="btn btn-success" name="submit_change_menu" value="Lưu trình đơn">
			</div>
	</div> 
</form>
<?php 
	$defaultMenu = '[{"title":"Menu demo 1","customSelect":"https://jnet.vn","id":3,"__domenu_params":{},"select2ScrollPosition":{"x":0,"y":0},"children":[{"id":5,"title":"Submenu demo 1","customSelect":"https://jnet.vn","__domenu_params":{},"select2ScrollPosition":{"x":0,"y":0},"children":[{"id":7,"title":"Tiêu đền menu 1","customSelect":"","__domenu_params":{},"select2ScrollPosition":{"x":0,"y":0}},{"id":8,"title":"Tiêu đền menu 2","customSelect":"","__domenu_params":{}},{"id":9,"title":"Tiêu đền menu 3","customSelect":"","__domenu_params":{}}]},{"id":6,"title":"Submenu demo 2","customSelect":"https://jnet.vn","__domenu_params":{},"select2ScrollPosition":{"x":0,"y":0}}]},{"title":"Menu demo 2","customSelect":"https://jnet.vn","id":4,"__domenu_params":{},"select2ScrollPosition":{"x":0,"y":0}}]';
?>
<script>
  $(document).ready(function() {
    var $domenu            = $('#domenu-1'),
        domenu             = $('#domenu-1').domenu(),
        $outputContainer   = $('#domenu-1-output'),
        $jsonOutput        = $outputContainer.find('.jsonOutput'),
        $keepChanges       = $outputContainer.find('.keepChanges'),
        $clearLocalStorage = $outputContainer.find('.clearLocalStorage');

    $domenu.domenu({
        slideAnimationDuration: 0,
        select2:                {
          support: true,
          params:  {
            tags: true
          }
        },
        data:<?php if(isset($menus)) echo "'".$menus."'"; else echo "'".$defaultMenu."'"; ?>
      })
      // Example: initializing functionality of a custom button #21
      .onCreateItem(function(blueprint) {
        // We look with jQuery for our custom button we denoted with class "custom-button-example"
        // Note 1: blueprint holds a reference of the element which is about to be added the list
        var customButton = $(blueprint).find('.custom-button-example');

        // Here we define our custom functionality for the button,
        // we will forward the click to .dd3-content span and let
        // doMenu handle the rest
        customButton.click(function() {
          blueprint.find('.dd3-content span').first().click();
        });
      })
      // Now every element which will be parsed will go through our onCreateItem event listener, and therefore
      // initialize the functionality our custom button
      .parseJson()
      .on(['onItemCollapsed', 'onItemExpanded', 'onItemAdded', 'onSaveEditBoxInput', 'onItemDrop', 'onItemDrag', 'onItemRemoved', 'onItemEndEdit'], function(a, b, c) {
        $jsonOutput.val(domenu.toJson());
        if($keepChanges.is(':checked')) window.localStorage.setItem('domenu-1Json', domenu.toJson());
      })
      .onToJson(function() {
        if(window.localStorage.length) $clearLocalStorage.show();
      });

    // Console event examples
    domenu.on('*', function(a, b, c) {
        console.log('event:', '*', 'arguments:', arguments, 'context:', this);
      })
      .onParseJson(function() {
        console.log('event: onFromJson', 'arguments:', arguments, 'context:', this);
      })
      .onToJson(function() {
        console.log('event: onToJson', 'arguments:', arguments, 'context:', this);
      })
      .onSaveEditBoxInput(function() {
        console.log('event: onSaveEditBoxInput', 'arguments:', arguments, 'context:', this);
        jnetnotice('Bấm "Lưu trình đơn" để thực hiện thay đổi');
      })
      .onItemDrag(function() {
        console.log('event: onItemDrag', 'arguments:', arguments, 'context:', this);
      })
      .onItemDrop(function() {
        jnetnotice('Bấm lưu trước khi lưu trình đơn');
      })
      .onItemAdded(function() {
       jnetnotice('Bấm lưu trước khi lưu trình đơn');
      })
      .onItemCollapsed(function() {
        console.log('event: onItemCollapsed', 'arguments:', arguments, 'context:', this);
      })
      .onItemExpanded(function() {
        console.log('event: onItemExpanded', 'arguments:', arguments, 'context:', this);
      })
      .onItemRemoved(function() {
         
      })
      .onItemStartEdit(function() {
         jnetnotice('Bấm lưu trước khi lưu trình đơn');
      })
      .onItemEndEdit(function() {
       	jnetnotice('Bấm lưu trước khi lưu trình đơn');
      })
      .onItemAddChildItem(function() {
        console.log('event: onItemAddChildItem', 'arguments:', arguments, 'context:', this);
      })
      .onItemAddChildItem(function() {
        console.log('event: onItemAddChildItem', 'arguments:', arguments, 'context:', this);
      })
      .onItemAddChildItem(function() {
        console.log('event: onItemAddChildItem', 'arguments:', arguments, 'context:', this);
      })
      .onItemAddChildItem(function() {
        console.log('event: onItemAddChildItem', 'arguments:', arguments, 'context:', this);
      });

    if(window.localStorage.length) $clearLocalStorage.show();


    $clearLocalStorage.click(function() {
      if(true) window.localStorage.clear();
      if(!window.localStorage.length) $clearLocalStorage.hide();
      // Part of the reset demo routine
      window.location.reload();
    });

    // Init textarea
    $jsonOutput.val(domenu.toJson());
    $keepChanges.on('click', function() {
      if(!$keepChanges.is(':checked')) window.localStorage.setItem('domenu-1KeepChanges', false);
      if($keepChanges.is(':checked')) window.localStorage.setItem('domenu-1KeepChanges', true);
    });

    if(window.localStorage.getItem('domenu-1KeepChanges') === "false") $keepChanges.attr('checked', false);
  });
</script>
<script>
	$( document ).ready(function() {
	    $("#huong-dan-add-menu").slideDown(200, function(){
	    	var $FlickImg = $('#huong-dan-add-menu'), c = 0;

				(function loop(){
				  var time = ~~(Math.random()*600) + 1;
				  $FlickImg.delay( time ).fadeTo(30, ++c%2, loop);
				})();
		    setTimeout(function(){
		    	
				$("#huong-dan-add-menu").remove();  
			},3000);
		});
		$('.item-remove-confirm').html('Xác nhận');
	});
	
	
</script>
  
 <style>
 	.item-remove-confirm {
		background:#ddd !important;
	}
 	
 </style> 
  
  
  
<script src="<?php echo $url_site ?>/template/backend/1/domenu-master/jquery.domenu-0.95.77.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.2.0/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
<script async defer id="github-bjs" src="https://buttons.github.io/buttons.js"></script>

</div>
</div>