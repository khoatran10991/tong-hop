<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Controller quản trị của users
*/
class products extends MX_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('text');
		$this->load->database();
		$this->load->helper('form');
		$this->load->library('parser');
		$this->load->library('form_validation');
		$this->load->library('session');
		require_once 'replace_function.php';
	}
	public function index()
	{
		# lấy domain hoặc subdomain, sau do load du lieu tu database de cau hinh website
		$productURL = '';
		$productURL .= $_SERVER["SERVER_NAME"];
		# code...
		$user_session=$this->session->userdata('user_session');
		
		
		$message = "";
		if ($user_session) {
			# Nếu có session trong phiên đăng nhập
			$this->load->model('Products_model');
			
			#delete product
			if($this->input->get("action") == "trash") {
				$productID =  $this->input->get("post");
				if($this->Products_model->del_post_product($productID,$user_session['id_store'])) {
					$message = "<i class='fa fa-check'></i> Đã xóa sản phẩm";
				}
			}
			
			
			# delele products
			if($this->input->post("del-selected") == 1) {
				$posts = $this->input->post("post");
			
				$i = 0;
				foreach ($posts as $post => $id) {
					if($this->Products_model->del_post_product($id,$user_session['id_store']))
						$status = 1;
					else
						$status = 0;
					$i++;
						
				}
				if($status == 1)
					$message = "<i class='fa fa-check'></i> Đã xóa " .$i. " sản phẩm";
				//array_push($data_view, $message);
			
					
			
			}
			if($this->input->post("submit_product_search")) {
				$keyword = $this->input->post("txt_search");
				$$products = $this->Products_model->get_products($user_session['id_store'],0,$keyword);
			} else 
				$products = $this->Products_model->get_products($user_session['id_store']);
				
			
			# add product 
			if($this->input->post("submit_product")) {
				
			}

			// $result_info_site=$this->Dashboard_model->info_site($user_session['id_store']);
			
							$data_view = array(
								'title'=>'Sản phẩm ',
								
								'url_site'=>$user_session['url'],
								'list_products' => $products,
								'template'=>'products',
								'message' => $message	
								 );

				$this->parser->parse("index",$data_view);
			
		} else {
			# Nếu không thì chuyển về trang login
			redirect('http://'.$productURL.'/login.html','refresh');
		}
	}
	
	# Hàm này dùng để chuyển title thành URL, dùng cho ajax (Thẻ tiêu đề xem trước của JNET SEO) hoặc gọi hàm này bằng $this->get_title_replace($title)
	# Hàm replace được định nghĩa trong file replace_function.php ngoài root
	public function get_title_replace($title = null) {
		if(isset($_POST['title']) || isset($_GET['title'])) {
			# Dùng cho ajax
			$title = addslashes($_POST['title']);
			
			$title = url_title(convert_accented_characters($title),'-',TRUE);
			echo   $title;
		}
		else {
			# Dùng cho phương thức	
			$title = addslashes($title);
			$title = url_title(convert_accented_characters($title),'-',TRUE);
			return $title;
		}
		
	}
	public function addproduct()
	{
		# lấy domain hoặc subdomain, sau do load du lieu tu database de cau hinh website
		$productURL = '';
		$productURL .= $_SERVER["SERVER_NAME"];
		# code...
		$user_session=$this->session->userdata('user_session');
		// echo "<pre>";
		// print_r ($user_session);
		// echo "</pre>";
		if ($user_session) {
			# Nếu có session trong phiên đăng nhập
			$this->load->model('Products_model');
			
			
				$data_view = array(
								'title'=>'Thêm Sản Phẩm mới',
			
								'username'=>$user_session['username'],
								'url_site'=>$user_session['url'],
								'category_all' => $this->list_category(),	
								'template'=>'add-product',
								'editor'=>$this->ckeditor(),
								 );
		

			#Hàm xử lý form và chèn thông tin vào sql
			if($this->input->post("submit_product")){
			$result_add_product=$this->process_add_product('1');

				if($result_add_product != 0){
					redirect($user_session['url'].'/dashboard/products/editproduct.html?post='.$result_add_product.'&status=posted&','refresh');
				}
				else{
					$data_view['error_info_site'] = "***Lỗi: Không tạo được sản phẩm, liên hệ admin để hỗ trợ.";
				}
			
			}elseif($this->input->post("submit_product_draft")) {
				$result_add_product=$this->process_add_product('0');

				if($result_add_product==1){
					redirect($user_session['url'].'/dashboard/products.html','refresh');
				}
				else{
					$data_view['error_info_site'] = "***Lỗi: Không tạo được trang, liên hệ admin để hỗ trợ.";
				}
			}
			
			$this->parser->parse("index",$data_view);

		} else {
			# Nếu không thì chuyển về trang login
			redirect('http://'.$productURL.'/login.html?returnURL=dashboard/products/addproduct.html','refresh');
		}
	}
	public function editproduct() {
		# lấy domain hoặc subdomain, sau do load du lieu tu database de cau hinh website
		$productURL = '';
		$productURL .= $_SERVER["SERVER_NAME"];
		# code...
		
		
		$user_session=$this->session->userdata('user_session');
		// echo "<pre>";
		// print_r ($user_session);
		// echo "</pre>";
		if ($user_session) {
			# Nếu có session trong phiên đăng nhập
			$this->load->model('Products_model');
			$message = "";
			#cap nhat product
			
			#end cap nhat product
			
			
			if($this->input->get("post")) {
				$productID = $this->input->get("post");
				
				$product = $this->Products_model->get_products($user_session['id_store'],$productID);
				$cate = $this->Products_model->get_catelogys_by_id_product($productID);	
				$product_cate = array();
				if($cate) {
					foreach($cate as $c) {
						array_push($product_cate,$c->id_category);
					}
				}
				
				# Status post
			
					$product_status = "Đã đăng";
			 
				if($product) {
					  #Hàm xử lý form và update thông tin vào sql
					if($this->input->post("update_product")){
						$update =$this->process_update_product("1");	
					
						if($update){
							$message = '<i class="fa fa-check"></i> Cập nhật thành công';
						}
						else{
							$message = "<i class='fa fa-ban'></i> Không thể cập nhật";
						}
							
					}elseif($this->input->post("update_product_draft")) {
						$result_add_product=$this->process_update_product('0');
					
						if($result_add_product==1){
							$message = "<i class='fa fa-check'></i> Đã lưu thành bản nháp";
						}
						else{
							$message = "<i class='fa fa-ban'></i> Không thể cập nhật";
						}
					}
					$data_view = array(
							'title'=>'Chỉnh sửa sản phẩm',
					
							'username'=>$user_session['username'],
							'url_site'=>$user_session['url'],
					
							'template'=>'edit-product',
							'product' => $product[0],
							'product_status' => $product_status,
							'editor'=>$this->ckeditor(),
							'message' => $message,
							'category_all' => $this->list_category(),
							'categorys_post' => $product_cate,
					);
					
					
					$this->load->view("index",$data_view);	
					
				}
				else {
					echo "Bạn không có quyền sửa trang này.Vui lòng quay lại";
				}
			}
			

			
			
		
		}	
	}
	
	public function ckeditor()
	{
		# Chèn và xử lý code ckeditor nhúng vào trang
		$user_session=$this->session->userdata('user_session');
		$url_site = $user_session['url'];
		$username = $user_session['username'];
		$editor="
				<script src='$url_site/editor/ckeditor/ckeditor.js'></script>
				<script type='text/javascript'>
					config = {};
					config.entities_latin = false;
					config.language = 'vi';
				
				    config.filebrowserImageBrowseUrl= '$url_site/editor/filemanager/dialog.aspx?type=1&editor=ckeditor&fldr'
				   
			
				    
			   	CKEDITOR.replace('txt_editor',config);
			   																		
				</script>
					";
		return $editor;
	}

	public function process_add_product($status = 1)
	{
		$user_session=$this->session->userdata('user_session');
		# xử lý các thông tin user nhập vào và chèn vào sql
		

				$this->form_validation->set_rules('txt_title_product', 'Tiêu Đề Sản Phẩm', 'required|min_length[5]|max_length[200]');

				$this->form_validation->set_message('required','%s không được bỏ trống');
				$this->form_validation->set_message('max_length','{field} không được dài hơn {param} ký tự');
			if($this->form_validation->run()){
				$name_product=$this->input->post("txt_title_product");
				$url = $this->get_title_replace($name_product);
				
				$detail_product=$this->input->post("txt_content_product");
				$keywords_product=$this->input->post("txt_keywords_product");
				$metadescription=$this->input->post("txt_metadescription_product");
				$product_layout = $this->input->post("product_template");
				$thumnail = $this->input->post("imagethum");
			
				
				#gallery
				$gallery = (count($this->input->post("galleryimages")) ? $this->input->post("galleryimages") : array());
				$gallery = json_encode($gallery);
				
				#danh mục 
				$product_catelogys = $this->input->post("product_catelogys");
				
				# tong quan
				$sku  =  $this->input->post("txt_sku_product");
				$price =  $this->input->post("txt_price_product");
				$price_sale =  $this->input->post("txt_sale_product");
				
				# so luong
				$stock = $this->input->post("status");
				$manage_stock = 0;
				$qty = 0;
				if($this->input->post("manage_stock")) {
					$manage_stock = 1;
					$qty = $this->input->post("txt_qty_product");
				}	
				
				$manage_stock = array(
						"status" => $stock,
						"active" => $manage_stock,
						"qty" => $qty
				);
				$manage_stock = json_encode($manage_stock);
			
				
				$options = array(
						"keyword" => $keywords_product,
						"description" => $metadescription,
						"shipping" => $this->input->post('shipping')		
				);
				$options = json_encode($options);

				
				$this->load->model('Products_model');
				
				if(isset($product_catelogys)) {
		           $result_add_product= $this->Products_model->add_product($user_session['id_store'],$name_product,$thumnail,$gallery,$price,$price_sale,$url,$options,$detail_product,$manage_stock);
		            if($result_add_product) {
						foreach($product_catelogys as $key => $value) {
							$this->Products_model->add_product_catelogy($result_add_product,$value);
						}
					}
		            
		            
		            return $result_add_product;
				}
				

			}
		
	}
	# function update product
	public function process_update_product($status)
	{
				$user_session=$this->session->userdata('user_session');
				$this->form_validation->set_rules('txt_title_product', 'Tiêu Đề Sản Phẩm', 'required|min_length[5]|max_length[200]');

						$this->form_validation->set_message('required','%s không được bỏ trống');
						$this->form_validation->set_message('max_length','{field} không được dài hơn {param} ký tự');
					
						$idProduct = $this->input->get("post");
						$name_product=$this->input->post("txt_title_product");
						$url = $this->get_title_replace($name_product);
						
						$detail_product=$this->input->post("txt_content_product");
						$keywords_product=$this->input->post("txt_keywords_product");
						$metadescription=$this->input->post("txt_metadescription_product");
				
						$thumnail = $this->input->post("imagethum");
					
						
						#gallery
						$gallery =  $this->input->post("galleryimages");
						$gallery = json_encode($gallery);
						
						#danh mục 
						$product_catelogys = $this->input->post("product_catelogys");
						
						# tong quan
						$sku  =  $this->input->post("txt_sku_product");
						$price =  $this->input->post("txt_price_product");
						$price_sale =  $this->input->post("txt_sale_product");
						
						# so luong
						$stock = $this->input->post("status");
						$manage_stock = 0;
						$qty = 0;
						if($this->input->post("manage_stock")) {
							$manage_stock = 1;
							$qty = $this->input->post("txt_qty_product");
						}	
						
						$manage_stock = array(
								"status" => $stock,
								"active" => $manage_stock,
								"qty" => $qty
						);
						$manage_stock = json_encode($manage_stock);
					
						
						$options = array(
								"keyword" => $keywords_product,
								"description" => $metadescription,
								"shipping" => $this->input->post('shipping')		
						);
						$options = json_encode($options);

						
						$this->load->model('Products_model');
						
						if(isset($product_catelogys)) {
				           $result_update_product= $this->Products_model->update_product($idProduct,$user_session['id_store'],$name_product,$thumnail,$gallery,$price,$price_sale,$url,$options,$detail_product,$manage_stock,$status);
				            if($result_update_product) {
				            	$delete_old_cate = $this->Products_model ->delete_product_catelogy($idProduct);
								foreach($product_catelogys as $key => $value) {
									$this->Products_model->add_product_catelogy($idProduct,$value);
								}
							}
				            return $result_update_product;
						}
						else 
							return FALSE;
						
				

	
	}
	
	public function category()
	{
	# lấy domain hoặc subdomain, sau do load du lieu tu database de cau hinh website
		$pageURL = '';
		$pageURL .= $_SERVER["SERVER_NAME"];
		# code...
		$this->load->module('home/url');
        $user_session = $this->session->userdata('user_session');
		
	        $message = "";
	        		if ($user_session) {
	        			# Nếu có session trong phiên đăng nhập
	        			# load molde Products
	        			$this->load->model('Products_model');
						
	        			//Kiểm tra và submit form submit_add_category
	        			if ($this->input->post('submit_add_category')) {
	        			$this->form_validation->set_rules('name_add_category', 'Tên Danh Mục', 'required|min_length[2]|max_length[150]');
                $this->form_validation->set_rules('link_add_category', 'Đường dẫn', 'required|min_length[2]|max_length[250]');
                $this->form_validation->set_rules('description_add_category', 'Mô Tả', 'max_length[250]');
	
	                		$this->form_validation->set_message('required', '%s không được bỏ trống');
	                				$this->form_validation->set_message('min_length', '{field} không được ít hơn {param} ký tự');
                $this->form_validation->set_message('max_length', '{field} không được dài hơn {param} ký tự');
                if ($this->form_validation->run()) {
	
	                //lấy các giá trị từ form để xử lý dữ liệu
	                	$data_form['id_store'] = $user_session['id_store'];
	                	$data_form['name'] = $this->input->post('name_add_category');
	                	$data_form['link'] = $this->input->post('link_add_category');
	                			$data_form['description'] = $this->input->post('description_add_category');
	                			$data_form['id_parent'] = $this->input->post('select_category_parent');
	                			//kiểm tra link đã tồn tại chưa, nếu đã có rồi thì thêm số tăng dần vào
	
	                	$result_category = $this->Products_model->select_category($user_session['id_store'], NULL, $data_form['link'], NULL);
	
	
	                	if ($result_category > 0) {
	                	$i = 1;
	                	do {
	                	$data_form['link'] = $this->input->post('link_add_category') . $i;
	                		$result_category = $this->Products_model->select_category($user_session['id_store'], NULL, $data_form['link'], NULL);
	                		$i++;
	                	} while ($result_category > 0);
	                	}
	                	if ($result_category == 0) {
	                	$result_add_category = $this->Products_model->add_category($data_form);
	                	if ($result_add_category) {
	                	$message = 'Đã thêm thành công danh mục mới!!!';
	                	}
	                	}
	
	
	                	}
	                	}
	                	
	                	
	                	
	                	
           			   //Kiểm tra submit xóa nhiều lựa chọn danh mục
	                		if($this->input->post('submit_category_del')){
	                		$selected_categorys = $this->input->post('category');
	                		$item_remove = 0;
	                				foreach($selected_categorys as $id){
	                    $danhsach = $this->Products_model->select_category($user_session['id_store'], $id, NULL, NULL);
	                					$remove_category = $this->Products_model->remove_category($user_session['id_store'], $id, $danhsach[0]->id_parent);
	                					if($remove_category){
	                					$item_remove++;
	                    }
	                				}
	                				if($item_remove > 0) {
	                					$message = 'Đã Xóa ' . $item_remove . ' Danh Mục';
	        			}
	        			}
	        			//Hiển thị category có trong database
	        			$ds_category = $this->Products_model->select_category($user_session['id_store'], NULL, NULL, NULL);
	
	        			//Hiển thị ngoài view
	        			$data_view = array(
	        			'title' => 'Quản Lý Danh Mục',
	        			'url_site' => $user_session['url'],
	        			'template' => 'category-product',
	        					'message' => $message,
	        					'category_all' => $this->list_category(),
	        			);
	        			$data_view['id_store'] = $user_session['id_store'];
	        			
	        			# nếu hành động là edit 
			            if($this->input->get(md5('edit'))) {
							$id_category = addslashes($this->input->get(md5('edit')));
							$id_category = intval($id_category);
							$get_category = $this->Products_model->select_category($user_session['id_store'],$id_category,NULL,NULL);
							if($get_category) {
								$data_view['template'] = 'edit-category-product';
								$data_view['title'] = 'Sửa danh mục sản phẩm';
								$data_view['category'] = $get_category;
								#Kiểm tra form khi submit update category
			                    if ($this->input->post('submit_update_category')) {
			                        $this->form_validation->set_rules('name_update_category', 'Tên Danh Mục', 'required|min_length[2]|max_length[150]');
			                        $this->form_validation->set_rules('link_update_category', 'Đường dẫn', 'required|min_length[2]|max_length[250]');
			                        $this->form_validation->set_rules('description_update_category', 'Mô Tả', 'max_length[250]');

			                        $this->form_validation->set_message('required', '%s không được bỏ trống');
			                        $this->form_validation->set_message('min_length', '{field} không được ít hơn {param} ký tự');
			                        $this->form_validation->set_message('max_length', '{field} không được dài hơn {param} ký tự');
			                        if ($this->form_validation->run()) {
			                            //lấy các giá trị từ form để xử lý dữ liệu
			                            $id_store = $user_session['id_store'];
			                            $data_form['name'] = $this->input->post('name_update_category');
			                            $data_form['link'] = $this->input->post('link_update_category');
			                            $data_form['description'] = $this->input->post('description_update_category');
			                            $data_form['id_parent'] = $this->input->post('select_category_parent');
			                            $rs_update_category = $this->Products_model->update_category($id_store, $id_category, $data_form);
			                            if ($rs_update_category) {
											$data_view['message'] = 'Cập Nhật Thành Công';
											$get_category = $this->Products_model->select_category($user_session['id_store'],$id_category,NULL,NULL);
											$data_view['category'] = $get_category;
										}
			                                
			                            else
			                                $data_view['message'] = 'Không có sự thay đổi';
			                        }
			                    }
							}
							
						}
	                	
	        			
	        			
	        			#load giao dien
	        			$this->parser->parse('header', $data_view);
	        			$this->parser->parse($data_view['template'], $data_view);
	        			$this->parser->parse('footer', $data_view);
	        		} else {
	        		# Nếu không thì chuyển về trang login
	            redirect('http://' . $pageURL . '/login.html', 'refresh');
	        		}
	
	}
	
	public function remove_category()
	{
	$user_session = $this->session->userdata('user_session');
	if ($user_session) {
			//Lấy các giá trị từ ajax post gửi về
			$id_category = $this->input->post('id_category');
			$id_parent = $this->input->post('id_parent');
	        			$id_store = $user_session['id_store'];
	
	            //Delete category và update id_parent của category con
	            $this->load->model('Products_model');
	            $rs = $this->Products_model->remove_category($id_store, $id_category, $id_parent);
	            if ($rs)
	            	return $rs;
	        			}
	
	        			}
	
	        			public function dequy_category($ds_category, $id_parent = NULL)
	        			{
	        			$user_session = $this->session->userdata('user_session');
	        			$list_category = array();
	        			$return_category = "";
	        			foreach ($ds_category as $key => $item) {
	        			if ((int)$item->id_parent == (int)$id_parent) {
	        			$return_category .= '<tr class="row-item">';
	        			$return_category .= '<th scope="row"><input class="cb-select" name="category[]" type="checkbox" value="' . $item->id_category . '"></th>';
	
                $return_category .= '<td>';
	                if ((int)$item->id_parent == 0) {
                    $return_category .= '<span class="td-bold"><a href="' . $user_session['url'] . '/dashboard/products/edit_category.html?category=' . $item->id_category . '&jnettoken=' . $_COOKIE['jnet_session'] . '">' . $item->name . '</a></span>';
	        			} else {
	        			$return_category .= '----- ';
	        					$return_category .= '<span class="td-bold"><a href="' . $user_session['url'] . '/dashboard/products/edit_category.html?category=' . $item->id_category . '&jnettoken=' . $_COOKIE['jnet_session'] . '">' . $item->name . '</a></span>';
                }
	
	
	                $return_category .= '<div class="row-actions">';
	                		$return_category .= '<span class="edit"><a style="color: #47475F;" href="' . $user_session['url'] . '/dashboard/products/edit_category.html?category=' . $item->id_category . '&jnettoken=' . $_COOKIE['jnet_session'] . '" title="Chỉnh sửa"><i class="fa fa-pencil"></i> Chỉnh sửa</a> | </span>';
	                		$return_category .= '<span class="trash"><a onclick="remove_category(' . $item->id_category . ',' . $item->id_parent . ')" style="color: #a00;" href="javascript:" class="submitdelete" title="Xóa trang này"><i class="fa fa-trash-o"></i> Xóa</a> | </span>';
	                				$return_category .= '<span class="view"><a style="color: #47475F;"  href="' . $user_session['url'] .  $item->link . '.html" title="Xem “{name}”" rel="permalink"><i class="fa fa-eye"></i> Xem</a></span>';
                $return_category .= '</div>';
	                						$return_category .= '</td>';
	                						$return_category .= '<td>' . $item->link . '</td>';
	                								$return_category .= '</tr>';
	                								$return_category .= $this->dequy_category($ds_category, $item->id_category);
	                								unset($ds_category[$key]);
	
	
	        			}
	
	        			}
	        			return $return_category;
	
	        			}
	
	        			public function edit_category()
	        			{
	        			# lấy domain hoặc subdomain, sau do load du lieu tu database de cau hinh website
	        			$pageURL = '';
	        			$pageURL .= $_SERVER["SERVER_NAME"];
	
	        				#Gán session đăng nhập
	        				$user_session = $this->session->userdata('user_session');
	
	        				#Kiểm tra session và load trang
	        				if ($user_session) {
	            $data_view = array();
	
	            #Kiểm tra token có đúng người dùng ko
	            if ($this->input->get('jnettoken') == $_COOKIE['jnet_session']) {
	
	            #Lấy giá trị của category từ URL
	            $id_category = $this->input->get('category');
	
	            #Load model và fun select_category
	            $this->load->model('Products_model');
	            		$rs_category = $this->Products_model->select_category($user_session['id_store'], $id_category, NULL, NULL);
	            		if ($rs_category) {
	            		//Hiển thị kết quả tìm được ngoài view
	            				$data_view['category_by_id'] = $rs_category;
	
	
	            				#Hiển thị danh sách category parent ra view
	            					$rs_category_parent = $this->Products_model->select_category($user_session['id_store'], NULL, NULL, 0);//select tất cả category có id_parent = 0
	            					$category_parent = "";
	            					foreach ($rs_category_parent as $item) {
	            					if((int)$item->id_category == (int)$rs_category[0]->id_parent ) {
	            					$category_parent .= '<option value="' . $item->id_category . '" selected>' . $item->name . '</option>';
	            					}
	            					elseif((int)$item->id_category != (int)$id_category ) {
	            							$category_parent .= '<option value="' . $item->id_category . '">' . $item->name . '</option>';
	            					}
	            					}
	            					$data_view['category_parent'] = $category_parent;
	
	            					#Kiểm tra form khi submit update category
	            					if ($this->input->post('submit_update_category')) {
	            					$this->form_validation->set_rules('name_update_category', 'Tên Danh Mục', 'required|min_length[2]|max_length[150]');
	            					$this->form_validation->set_rules('link_update_category', 'Đường dẫn', 'required|min_length[2]|max_length[250]');
	            					$this->form_validation->set_rules('description_update_category', 'Mô Tả', 'max_length[250]');
	
	            					$this->form_validation->set_message('required', '%s không được bỏ trống');
	            							$this->form_validation->set_message('min_length', '{field} không được ít hơn {param} ký tự');
	            							$this->form_validation->set_message('max_length', '{field} không được dài hơn {param} ký tự');
	            									if ($this->form_validation->run()) {
	            									//lấy các giá trị từ form để xử lý dữ liệu
	            									$id_store = $user_session['id_store'];
	            									$data_form['name'] = $this->input->post('name_update_category');
	            									$data_form['link'] = $this->input->post('link_update_category');
	            										$data_form['description'] = $this->input->post('description_update_category');
	            										$data_form['id_parent'] = $this->input->post('select_category_parent');
	            										$this->load->model('Products_model');
	            												$rs_update_category = $this->Products_model->update_category($id_store, $id_category, $data_form);
	            												if ($rs_update_category)
	            														$data_view['message'] = 'Cập Nhật Thành Công';
	            												else
	            													$data_view['message'] = 'Cập Nhật Thất Bại';
	            									}
	            									}
	            									//Hiển thị ngoài view
	            												$data_view['title'] = 'Cập Nhật Danh Mục';
	            												$data_view['url_site'] = $user_session['url'];
	            												$data_view['template'] = 'edit-category-product';
	            														#load giao dien
	            														$this->parser->parse('header', $data_view);
	            												$this->parser->parse($data_view['template'], $data_view);
	            												$this->parser->parse('footer', $data_view);
	                }
	
            }
	            				} else {
	            				# Nếu không thì chuyển về trang login
	            				redirect('http://' . $pageURL . '/login.html', 'refresh');
	            				}
	}
	
	
	public function jnet_json_encode($struct) {
		return preg_replace("/\\\\u([a-f0-9]{4})/e", "iconv('UCS-4LE','UTF-8',pack('V', hexdec('U$1')))", json_encode($struct));
	}
	public function danhsach_category(){
		#Gán session đăng nhập
        $user_session = $this->session->userdata('user_session');
        $this->load->model('Products_model');
        $danhsach = array();
        $list_category = $this->Products_model->select_category($user_session['id_store'], NULL, NULL, NULL);//select tất cả category 
        foreach($list_category as $item){
			if($item->id_parent == 0){
				array_push($danhsach,$item);
				
			}
			foreach($list_category as $subitem){
				if($subitem->id_parent == $item->id_category){
					$subitem->name = '---'.$subitem->name;
					array_push($danhsach,$subitem);
				}
			}
			
		}
        return $danhsach;
	}
	// lấy danh dách Catelogy phiên bản mới
		#update lấy thêm subsub item
	public function list_category($id_store = null){
		#Gán session đăng nhập
		if(!isset($id_store))
        	$user_session = $this->session->userdata('user_session');
        else 
        	$user_session['id_store'] = $id_store;	
        $this->load->model('Products_model');
        $danhsach = array();
        $list_category = $this->Products_model->select_category($user_session['id_store'], NULL, NULL, NULL);//select tất cả category 
        $i = 0;
        foreach($list_category as $item){
			if($item->id_parent == 0) {
				$danhsach[$i]['name'] = $item->name;
				$danhsach[$i]['link'] = $item->link;
				$danhsach[$i]['id'] = $item->id_category;
				$j = 0;
				foreach($list_category as $subitem) {
					if($subitem->id_parent != 0 && $subitem->id_parent == $item->id_category ) {
		
						$danhsach[$i]['child'][$j] = array(
							'id' => $subitem->id_category,
							'name' => $subitem->name,
							'link' => $subitem->link,
							'id_parent' => $subitem->id_parent
						);
						
						$u = 0;
						foreach($list_category as $subsubitem) {
							if($subsubitem->id_parent != 0 && $subsubitem->id_parent == $subitem->id_category ) {
				
								$danhsach[$i]['child'][$j]['child'][$u] = array(
									'id' => $subsubitem->id_category,
									'name' => $subsubitem->name,
									'link' => $subsubitem->link,
									'id_parent' => $subsubitem->id_parent
								);
									
								
							}
							$u = $u+1;;
						}	
						
					}
					$j = $j + 1;
				}
				
			} 	
			
			$i = $i+ 1;
			
		}
        return $danhsach;
	}
	
}