<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller quản trị của users
 */
class Orders extends MX_Controller {

    function __construct() {
        # code...
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->helper('form');
        $this->load->library('parser');
        $this->load->library('session');
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
            $this->load->model('Orders_model');

            //Phân trang trong posts
            //load thư viện phân trang
            $this->load->library('pagination');
            $config = array();
            $config['base_url'] = $user_session['url'] . '/dashboard/orders';
            $config['total_rows'] = $this->Orders_model->count_all($user_session['id_store']); //Đếm tổng số post có trong store
            $config['use_page_numbers'] = TRUE;
			$config['per_post'] = 10; //số item hiển thị
	
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
            $orders = $this->Orders_model->get_orders($user_session['id_store'], 0, null, $config['per_post'],$this->uri->segment(3));
            
            #delete post
            if ($this->input->get("action") == "trash") {
                $postID = $this->input->get("post");
                if ($this->Orders_model->del_post_post($postID, $user_session['id_store'])) {
                    $message = "<i class='fa fa-check'></i> Đã xóa bài viết";
                }
            }


            # delele posts
            if ($this->input->post("del-selected") == 1) {
                $orders = $this->input->post("post");

                $i = 0;
                foreach ($orders as $post => $id) {
                    if ($this->Orders_model->del_post_post($id, $user_session['id_store']))
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
                $orders = $this->Orders_model->get_posts($user_session['id_store'], 0, $keyword);
            } else {
                
                $data_view['link_pagination_post'] = $this->pagination->create_links();
            }

            if($orders) {
				for($i=0;$i<count($orders);$i++) {
					$orders[$i]->payment = $this->get_payment_method($orders[$i]->payment_method,$user_session['id_store']);
					$orders[$i]->status = $this->get_status_order($orders[$i]->status_order,$user_session['id_store']); 
					
				}	
			}
			

            $data_view = array(
                'title' => 'Danh sách đơn hàng',
                'url_site' => $user_session['url'],
                'id_store' => $user_session['id_store'],
                'orders' => $orders,
                'template' => 'orders/listorders',
                'message' => $message,
                'link_pagination_post' => $this->pagination->create_links(),
                'total_orders' => $config['total_rows'],
                'per_post' => $config['per_post']
            );
			if($this->input->get('detail')) {
				$orderID = addslashes($this->input->get('detail'));
				
				$order = $this->Orders_model->get_orders($user_session['id_store'],$orderID);
				if($order) {
						
					if($this->input->get('action')) {
						$current_status = $this->get_status_order($order[0]->status_order);
						$action = addslashes($this->input->get('action'));
						$update = $this->Orders_model->update_status($user_session['id_store'],$orderID,$action);
						if($update) {
							$data_view['message'] = "Cập nhật trạng thái đơn hàng thành công.";
							$order = $this->Orders_model->get_orders($user_session['id_store'],$orderID);
							$history = json_decode($order[0]->order_history);
							$new_status = $this->get_status_order($order[0]->status_order);
							$notice  = date('d/m/Y H:i:s',time()) ." Đơn hàng đã được chuyển từ ".$current_status." sang ".$new_status.".";
							
							// update histoy 
							array_push($history,$notice);
							$this->Orders_model->update_historry($user_session['id_store'],$order[0]->id,json_encode($history));
							$order = $this->Orders_model->get_orders($user_session['id_store'],$orderID);
						}
					}
				
					$data_view['order'] = (array)$order[0];
					$data_view['order']['payment'] = $this->get_payment_method($order[0]->payment_method,$user_session['id_store']);
					$data_view['order']['status'] = $this->get_status_order($order[0]->status_order);
					$data_view['order']['shipping'] = $this->get_shipping($order[0]->shipping,$user_session['id_store']);
					$customer =json_decode($order[0]->customer,true);
					$data_view['order']['address'] = $customer['address'] ." - ".$this->get_province($customer['province']);
					$data_view['template'] = 'orders/detailorder';
				}
					
			}

            #load giao dien	
            $this->parser->parse('header', $data_view);
            $this->parser->parse($data_view['template'], $data_view);
            $this->parser->parse('footer', $data_view);
        } else {
            # Nếu không thì chuyển về trang login
            redirect('http://' . $postURL . '/login.html?returnUrl=dashboard/order.html', 'refresh');
        }
    }
    public function get_payment_method($id,$id_store) {
		return "Chuyển khoản";
	}
	public function get_status_order($status) {
		switch($status){
			case 1: $return = "Đang giao hàng";
				break;
			case 2 : $return = "Chờ thanh toán";
				break;
			case 3 : $return = "Chờ xác nhận";
				break;
			case 4 : $return = "Đã hủy";
				break;
			case 5 : $return = "Đã hoàn thành";		
				break;
			default: $return = "Chờ xác nhận";
				break;
		}
		return $return;
	}
	public function get_shipping($id,$id_store){
		return "Giao hàng tận nhà";
	}
	
	public function get_province($province) {
		$return = $this->Orders_model->get_province($province);
		if($return)
			return $return[0]->title;
		else 
			return "Unknown";	
	}

 


}
