<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller quản trị của users
 */
class Posts extends MX_Controller {

    function __construct() {
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

    public function index() {
        # lấy domain hoặc subdomain, sau do load du lieu tu database de cau hinh website
        $postURL = '';
        $postURL .= $_SERVER["SERVER_NAME"];
        # code...
        $user_session = $this->session->userdata('user_session');



        $message = "";
        if ($user_session) {
            # Nếu có session trong phiên đăng nhập
            $this->load->model('Posts_model');

            //Phân trang trong posts
            //load thư viện phân trang
            $this->load->library('pagination');
            $config = array();
            $config['base_url'] = $user_session['url'] . '/dashboard/posts';
            $config['total_rows'] = $this->Posts_model->count_all_posts($user_session['id_store']); //Đếm tổng số post có trong store
            $config['use_page_numbers'] = TRUE;
			$config['per_post'] = 10; //số item hiển thị
			$config["per_page"] = 10;
			$config['num_links'] = 8; // số hiển thị xung quang item
					
			$config['prev_link'] = '<i class="fa fa-angle-double-left"></i>';
			$config['next_link'] = '<i class="fa fa-angle-double-right"></i>';
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['full_tag_open'] = '<ul class="pagination" style="margin: 0">';
			$config['full_tag_close'] = '</ul>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['use_post_numbers'] = TRUE;
            $this->pagination->initialize($config);
            #delete post
            if ($this->input->get("action") == "trash") {
                $postID = $this->input->get("post");
                if ($this->Posts_model->del_post_post($postID, $user_session['id_store'])) {
                    $message = "<i class='fa fa-check'></i> Đã xóa bài viết";
                }
            }


            # delele posts
            if ($this->input->post("del-selected") == 1) {
                $posts = $this->input->post("post");

                $i = 0;
                foreach ($posts as $post => $id) {
                    if ($this->Posts_model->del_post_post($id, $user_session['id_store']))
                        $status = 1;
                    else
                        $status = 0;
                    $i++;
                }
                if ($status == 1)
                    $message = "<i class='fa fa-check'></i> Đã xóa " . $i . " bài viết";
                //array_push($data_view, $message);
            }
            if ($this->input->post("submit_post_search")) {
                $keyword = $this->input->post("txt_search");
                $posts = $this->Posts_model->get_posts($user_session['id_store'], 0, $keyword);
            } else {
                $posts = $this->Posts_model->get_posts($user_session['id_store'], 0, null, $config['per_post'],$this->uri->segment(3));
                $data_view['link_pagination_post'] = $this->pagination->create_links();
            }



            if (!$posts) {
                $posts = array(
                    array('id_post' => NULL, "post_name" => "Chưa có bài viết nào", 'time_created' => NULL)
                );
            }
            // $result_info_site=$this->Dashboard_model->info_site($user_session['id_store']);




            $data_view = array(
                'title' => 'Bài viết ',
                'url_site' => $user_session['url'],
                'list_posts' => $posts,
                'template' => 'posts/posts',
                'message' => $message,
                'link_pagination_post' => $this->pagination->create_links()
            );


            #load giao dien	
            $this->parser->parse('header', $data_view);
            $this->parser->parse($data_view['template'], $data_view);
            $this->parser->parse('footer', $data_view);
        } else {
            # Nếu không thì chuyển về trang login
            redirect('http://' . $postURL . '/login.html', 'refresh');
        }
    }

    # Hàm này dùng để chuyển title thành URL, dùng cho ajax (Thẻ tiêu đề xem trước của JNET SEO) hoặc gọi hàm này bằng $this->get_title_replace($title)
    # Hàm replace được định nghĩa trong file replace_function.php ngoài root

    public function get_title_replace($title = null) {
    	$user_session = $this->session->userdata('user_session');
    	$this->load->model('Posts_model');
        if (isset($_POST['title']) || isset($_GET['title'])) {
            # Dùng cho ajax
            $title = addslashes($_POST['title']);

            $title = url_title(convert_accented_characters($title),'-',TRUE);
            // echo $title;
            
            
            $result = $this->Posts_model->check_link_post($user_session['id_store'],$title);
            
            
            if ($result > 0) {
            	$i = 1;
            	do {
            		$data_link = $title ."-". $i;
            		$result = $this->Posts_model->check_link_post($user_session['id_store'],$data_link);
            		$i++;
            	} while ($result > 0);
            	
            	
            }
            if(isset($data_link)) echo  $data_link;
            else echo $title;
        } else {
            # Dùng cho phương thức	
            $title = url_title(convert_accented_characters($title),'-',TRUE);
            // echo $title;
            
            
            $result = $this->Posts_model->check_link_post($user_session['id_store'],$title);
            
            
            if ($result > 0) {
            	$i = 1;
            	do {
            		$data_link = $title ."-". $i;
            		$result = $this->Posts_model->check_link_post($user_session['id_store'],$data_link);
            		$i++;
            	} while ($result > 0);
            	
            	
            }
            if(isset($data_link)) return  $data_link;
            else return  $title;
        }
    }

    public function addpost() {
        # lấy domain hoặc subdomain, sau do load du lieu tu database de cau hinh website
        $postURL = '';
        $postURL .= $_SERVER["SERVER_NAME"];
        # code...
        $user_session = $this->session->userdata('user_session');
        // echo "<pre>";
        // print_r ($user_session);
        // echo "</pre>";
        if ($user_session) {
            # Nếu có session trong phiên đăng nhập
            $this->load->model('Dashboard_model');
            
            // thêm tạm danh mục của sản phẩm
            $this->load->model('Posts_model');
            //Hiển thị category sp có trong database
            $ds_category = $this->Posts_model->select_category($user_session['id_store'], NULL, NULL, NULL);
            
            $result_info_site = $this->Dashboard_model->info_site($user_session['id_store']);
            foreach ($result_info_site as $info_site) {
                $data_view = array(
                    'title' => 'Thêm bài viết- ' . $info_site->title,
                    'username' => $user_session['username'],
                    'url_site' => $user_session['url'],
                    'template' => 'posts/add-post',
                	'category_all' => $this->list_category(),
                	//'dequy_category' => $this->dequy_category($ds_category),
                	'id_store' => 	$user_session['id_store'],
                    'editor' => $this->ckeditor(),
                );
            }

            #Hàm xử lý form và chèn thông tin vào sql
            if ($this->input->post("submit_post")) {
                $result_add_post = $this->process_add_post('public');

                if ($result_add_post != 0) {
                    redirect($user_session['url'] . '/dashboard/posts/editpost.html?post=' . $result_add_post . '&status=posted&jnettoken=' . $_COOKIE['jnet_session'], 'refresh');
                } else {
                    $data_view['error_info_site'] = "***Lỗi: Không tạo được trang, liên hệ admin để hỗ trợ.";
                }
            } elseif ($this->input->post("submit_post_draft")) {
                $result_add_post = $this->process_add_post('draft');

                if ($result_add_post == 1) {
                    redirect($user_session['url'] . '/dashboard/posts.html', 'refresh');
                } else {
                    $data_view['error_info_site'] = "***Lỗi: Không tạo được trang, liên hệ admin để hỗ trợ.";
                }
            }



            #load view vao website
            $this->parser->parse('header', $data_view);
            $this->parser->parse($data_view['template'], $data_view);
            $this->parser->parse('footer', $data_view);
        } else {
            # Nếu không thì chuyển về trang login
            redirect('http://' . $postURL . '/login.html?returnURL=dashboard/posts/addpost.html', 'refresh');
        }
    }

    public function editpost() {
        # lấy domain hoặc subdomain, sau do load du lieu tu database de cau hinh website
        $postURL = '';
        $postURL .= $_SERVER["SERVER_NAME"];
        # code...


        $user_session = $this->session->userdata('user_session');
        // echo "<pre>";
        // print_r ($user_session);
        // echo "</pre>";
        if ($user_session) {
            # Nếu có session trong phiên đăng nhập
            $this->load->model('Posts_model');
            $message = "";
            
            // thêm tạm danh mục của sản phẩm
            $this->load->model('Posts_model');
            
            #cap nhat post
            #Hàm xử lý form và update thông tin vào sql
            if ($this->input->post("update_post")) {
                $result_add_post = $this->process_update_post('public');

                if ($result_add_post == 1) {
                    $message = '<i class="fa fa-check"></i> Cập nhật thành công';
                } else {
                    $data_view['error_info_site'] = "***Lỗi: Không cập nhật được trang, liên hệ admin để hỗ trợ.";
                }
            } elseif ($this->input->post("update_post_draft")) {
                $result_add_post = $this->process_update_post('draft');

                if ($result_add_post == 1) {
                    $message = "<i class='fa fa-check'></i> Đã lưu thành bản nháp";
                } else {
                    $data_view['error_info_site'] = "***Lỗi: Không cập nhật được trang, liên hệ admin để hỗ trợ.";
                }
            }
            #end cap nhat post


            if ($this->input->get("post")) {
                $postID = $this->input->get("post");
                $post = $this->Posts_model->get_posts($user_session['id_store'], $postID);
				$cate = $this->Posts_model->get_catelogys_by_id_post($postID);	
				$post_cate = array();
				if($cate) {
					foreach($cate as $c) {
						array_push($post_cate,$c->id_category);
					}
				}
				
				if($post) {
					foreach ($post as $custom) {
                    $post_status = $custom->post_status;
                    $post_options = json_decode($custom->post_options, true);
	                }
	                # Status post
	                if ($post_status == "public" || $post_status == "")
	                    $post_status = "Đã đăng";
	                else
	                    $post_status = "Bản nháp";
				}
                

                if ($post) {

                    $data_view = array(
                        'title' => 'Chỉnh sửa trang',
                        'username' => $user_session['username'],
                        'url_site' => $user_session['url'],
                        'template' => 'posts/edit-post',
                        'post' => $post,
                        'post_status' => $post_status,
                    	'featured' => $post[0]->featured,
                    	'post_catelogy' => $post[0]->post_catelogy,		
                        'post_options' => $post_options,
                        'editor' => $this->ckeditor(),
                        'message' => $message,
                    	'category_all' => $this->list_category(),
                    	'categorys_post' => $post_cate,
                    	
                    );
                    #load view vao website
                    $this->parser->parse('header', $data_view);
                    $this->parser->parse($data_view['template'], $data_view);
                    $this->parser->parse('footer', $data_view);
                } else {
                    echo "Bạn không có quyền sửa trang này.Vui lòng quay lại";
                }
            }
        }
    }

    public function ckeditor() {
        # Chèn và xử lý code ckeditor nhúng vào trang
        $user_session = $this->session->userdata('user_session');
        $url_site = $user_session['url'];
        $username = $user_session['username'];
        $editor = "
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

    public function process_add_post($status) {
        # xử lý các thông tin user nhập vào và chèn vào sql


        $this->form_validation->set_rules('txt_title_post', 'Tiêu Đề Trang', 'required|min_length[10]|max_length[200]');
        $this->form_validation->set_rules('txt_content_post', 'Nội Dung Trang', 'required');
        $this->form_validation->set_rules('txt_keywords_post', 'Từ Khóa', 'max_length[200]');


        $this->form_validation->set_message('required', '%s không được bỏ trống');
        $this->form_validation->set_message('max_length', '{field} không được dài hơn {param} ký tự');
        if ($this->form_validation->run()) {
            $title_post = $this->input->post("txt_title_post");
            $url = $this->get_title_replace($title_post);
            $featured = 0;
            if($this->input->post("featured"))
            	$featured = $this->input->post("featured");
            $content_post = $this->input->post("txt_content_post");
            $post_catelogys = $this->input->post("post_catelogys");
            $keywords_post = $this->input->post("txt_keywords_post");
            $metadescription_post = $this->input->post("txt_metadescription_post");
            $post_layout = $this->input->post("post_template");
            $image = $this->input->post("imagethum");

            $user_session = $this->session->userdata('user_session');



            $options = array(
                "keyword" => $keywords_post,
                "description" => $metadescription_post,
                "layout" => $post_layout,
                "image" => $image
            );
            $options =json_encode($options);
			

			if(isset($post_catelogys)) {
				$this->load->model('Posts_model');
	            $result_add_post = $this->Posts_model->add_post($user_session['id_store'], $title_post, $url, $content_post, $options, $status,$featured);
	            if($result_add_post) {
					foreach($post_catelogys as $key => $value) {
						$this->Posts_model->add_post_catelogy($result_add_post,$value);
					}
				}
	            
	            
	            return $result_add_post;
			}
           
        }
    }

    # function update post

    public function process_update_post($status) {
        # xử lý các thông tin user nhập vào và chèn vào sql


        $this->form_validation->set_rules('txt_title_post', 'Tiêu Đề Trang', 'required|min_length[10]|max_length[200]');
        $this->form_validation->set_rules('txt_content_post', 'Nội Dung Trang', 'required');
        $this->form_validation->set_rules('txt_keywords_post', 'Từ Khóa', 'max_length[200]');


        $this->form_validation->set_message('required', '%s không được bỏ trống');
        $this->form_validation->set_message('max_length', '{field} không được dài hơn {param} ký tự');
        if ($this->form_validation->run()) {
            $idPage  = $this->input->get("post");
            $title_post = $this->input->post("txt_title_post");
            $url = $this->get_title_replace($title_post);
            $post_catelogys = $this->input->post("post_catelogys");
            
            $content_post = $this->input->post("txt_content_post");
            $keywords_post = $this->input->post("txt_keywords_post");
            $metadescription_post = $this->input->post("txt_metadescription_post");
            $post_layout = $this->input->post("post_template");
            $image = $this->input->post("imagethum");
            
            $featured = 0;
            if($this->input->post("featured"))
            	$featured = $this->input->post("featured");
            $user_session = $this->session->userdata('user_session');

            $options = array(
                "keyword" => $keywords_post,
                "description" => $metadescription_post,
                "layout" => $post_layout,
                "image" => $image
            );
            $options = json_encode($options);

            $this->load->model('Posts_model');
            $result_update_post = $this->Posts_model->update_post($idPage, $user_session['id_store'], $title_post, $content_post, $options, $status,$featured);
            $delete_old_cate = $this->Posts_model->delete_post_catelogy($idPage);
            if($delete_old_cate) {
					foreach($post_catelogys as $key => $value) {
						$this->Posts_model->update_post_catelogy($idPage,$value);
					}
			}	
            return $result_update_post;
        }
    }
    public function category()
    {
        # lấy domain hoặc subdomain, sau do load du lieu tu database de cau hinh website
        $pageURL = '';
        $pageURL .= $_SERVER["SERVER_NAME"];
        # code...
        $user_session = $this->session->userdata('user_session');

        $message = "";
        if ($user_session) {
            # Nếu có session trong phiên đăng nhập
            # load molde Products
            $this->load->model('Posts_model');

            //Kiểm tra và submit form submit_add_category
            if ($this->input->post('submit_add_category')) {
                $this->form_validation->set_rules('name_add_category', 'Tên Chuyên Mục', 'required|min_length[2]|max_length[150]');
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

                    $result_category = $this->Posts_model->select_category($user_session['id_store'], NULL, $data_form['link'], NULL);


                    if ($result_category > 0) {
                        $i = 1;
                        do {
                            $data_form['link'] = $this->input->post('link_add_category') . $i;
                            $result_category = $this->Posts_model->select_category($user_session['id_store'], NULL, $data_form['link'], NULL);
                            $i++;
                        } while ($result_category > 0);
                    }
                    if ($result_category == 0) {
                        $result_add_category = $this->Posts_model->add_category($data_form);
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
                    $danhsach = $this->Posts_model->select_category($user_session['id_store'], $id, NULL, NULL);
                    $remove_category = $this->Posts_model->remove_category($user_session['id_store'], $id, $danhsach[0]->id_parent);
                    if($remove_category){
                        $item_remove++;
                    }
                }
                if($item_remove > 0) {
                    $message = 'Đã Xóa ' . $item_remove . ' Danh Mục';
                }
            }
            //Hiển thị category có trong database
            $ds_category = $this->Posts_model->select_category($user_session['id_store'], NULL, NULL, NULL);

            //Hiển thị ngoài view
            $data_view = array(
                'title' => 'Quản Lý Chuyên Mục',
                'url_site' => $user_session['url'],
                'template' => 'category-post',
                'message' => $message,
                'category_all' => $this->list_category()
            );
            
            # nếu hành động là edit 
            if($this->input->get(md5('edit'))) {
				$id_category = addslashes($this->input->get(md5('edit')));
				$id_category = intval($id_category);
				$get_category = $this->Posts_model->select_category($user_session['id_store'],$id_category,NULL,NULL);
				if($get_category) {
					$data_view['template'] = 'edit-category-post';
					$data_view['title'] = 'Sửa chuyên mục';
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
                            $rs_update_category = $this->Posts_model->update_category($id_store, $id_category, $data_form);
                            if ($rs_update_category)
                                $data_view['message'] = 'Cập Nhật Thành Công';
                            else
                                $data_view['message'] = 'Cập Nhật Thất Bại';
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
            $this->load->model('Posts_model');
            $rs = $this->Posts_model->remove_category($id_store, $id_category, $id_parent);
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
                    $return_category .= '<span class="td-bold"><a href="' . $user_session['url'] . '/dashboard/posts/edit_category.html?category=' . $item->id_category . '&jnettoken=' . $_COOKIE['jnet_session'] . '">' . $item->name . '</a></span>';
                } else {
                    $return_category .= '----- ';
                    $return_category .= '<span class="td-bold"><a href="' . $user_session['url'] . '/dashboard/posts/edit_category.html?category=' . $item->id_category . '&jnettoken=' . $_COOKIE['jnet_session'] . '">' . $item->name . '</a></span>';
                }


                $return_category .= '<div class="row-actions">';
                $return_category .= '<span class="edit"><a style="color: #47475F;" href="' . $user_session['url'] . '/dashboard/posts/edit_category.html?category=' . $item->id_category . '&jnettoken=' . $_COOKIE['jnet_session'] . '" title="Chỉnh sửa"><i class="fa fa-pencil"></i> Chỉnh sửa</a> | </span>';
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
                $this->load->model('Posts_model');
                $rs_category = $this->Posts_model->select_category($user_session['id_store'], $id_category, NULL, NULL);
                if ($rs_category) {
                    //Hiển thị kết quả tìm được ngoài view
                    $data_view['category_by_id'] = $rs_category;


                    #Hiển thị danh sách category parent ra view
                    $rs_category_parent = $this->Posts_model->select_category($user_session['id_store'], NULL, NULL, 0);//select tất cả category có id_parent = 0
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
                            $this->load->model('Posts_model');
                            $rs_update_category = $this->Posts_model->update_category($id_store, $id_category, $data_form);
                            if ($rs_update_category)
                                $data_view['message'] = 'Cập Nhật Thành Công';
                            else
                                $data_view['message'] = 'Cập Nhật Thất Bại';
                        }
                    }
                    //Hiển thị ngoài view
                    $data_view['title'] = 'Cập Nhật Danh Mục';
                    $data_view['url_site'] = $user_session['url'];
                    $data_view['template'] = 'edit-category-post';
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
    
    public function danhsach_category(){
		#Gán session đăng nhập
        $user_session = $this->session->userdata('user_session');
        $this->load->model('Posts_model');
        $danhsach = array();
        $list_category = $this->Posts_model->select_category($user_session['id_store'], NULL, NULL, NULL);//select tất cả category 
        foreach($list_category as $item){
			if($item->id_parent == 0){
				array_push($danhsach,$item);
				//$current = $item->id_category;
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
        $this->load->model('Posts_model');
        $danhsach = array();
        $list_category = $this->Posts_model->select_category($user_session['id_store'], NULL, NULL, NULL);//select tất cả category 
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
