
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_m extends CI_Model {


    public function get_laporanakhir()

    {
        $post = $this->session->userdata('search');
        $this->db->select('*, p_item.kode_barang, p_item.name,p_category.name as category_name, p_item.price, 
            p_item.stock, p_unit.name as unit_name');
        $this->db->from('p_item');
        $this->db->join('p_category', 'p_item.category_id = p_category.category_id');
        $this->db->join('p_unit', 'p_unit.unit_id = p_item.unit_id');
        if(!empty($post['date1']) && !empty($post['date2'])) {
            $this->db->where("'$post[date1]' AND '$post[date2]'");
        }
       $this->db->group_by('kode_barang');        
        $query = $this->db->get();
        return $query;
    }

}