<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Model này lấy kết quả về site, login, dashboard
/**
 *
 */
class Advertising_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function insert_banner($id_store,$data_banner,$area_banner)
    {
            # Thêm banner vào sql
            $data = array(
                'id_store'=>$id_store,
                'data'=>$data_banner,
                'area'=>$area_banner,
            );
            $rs_insert = $this->db->insert('site_banners',$data);
            if($rs_insert){
                return true;
            }else{
                return false;
            }

    }
    public function select_banner($id_store){
        #Lấy thông tin về banner để show ra index
        $rs_slide=$this->db->select("*")
            ->from('site_banners')->where('id_store',$id_store)->get();
        if ($rs_slide) {
            # Nếu đúng thì trả thông tin slideshow
            return $rs_slide->result();
        } else {
            # Nếu sai thì trả về false
            return false;
        }
    }

    public function remove_banner($id_store,$id_banner)
    {
        #Xóa banner dựa trên id_banner và id_store
        $rs_remove = $this->db->where('id_banner',$id_banner)->where('id_store',$id_store)->delete('site_banners');
        if($rs_remove){
            return true;
        }else{
            return false;
        }
    }
    public function update_banner($id_banner,$id_store,$data_ads,$area)
    {
        #Xóa banner dựa trên id_banner và id_store
        $data = array(
          "data"=>$data_ads,
            "area"=>$area,
        );
        $rs_update = $this->db->where('id_banner',$id_banner)->where('id_store',$id_store)->update('site_banners',$data);
        if($rs_update){
            return true;
        }else{
            return false;
        }
    }

    public function select_banner_area($id_store,$area)
    {
        #Lấy danh sách các banner theo vị trí ra ngoài
        $rs_slide=$this->db->select("data")
            ->from('site_banners')->where('id_store',$id_store)->where('area',$area)->get();
        if ($rs_slide) {
            # Nếu đúng thì trả thông tin banner
            return $rs_slide->result();
        } else {
            # Nếu sai thì trả về false
            return false;
        }
    }
}