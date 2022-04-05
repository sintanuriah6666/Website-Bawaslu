<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_m extends CI_Model {

    public function get($id = null)
    {
        $this->db->from('t_stock');
        if($id != null) {
            $this->db->where('stock_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function del($id)
    {
        $this->db->where('stock_id', $id);
        $this->db->delete('t_stock');
    }

    public function get_stock_out()
    {
        $this->db->select('t_stock.stock_id, p_item.kode_barang,
        p_item.name as item_name, p_item.price as pricebrg, stock, qty, total_out, date, detail,p_item.item_id');
       
        $this->db->from('t_stock');
        $this->db->join('p_item', 't_stock.item_id = p_item.item_id');
        $this->db->where('type', 'out');
        $this->db->order_by('stock_id', 'desc');
        $query = $this->db->get();
        return $query;
    }
    public function add_stock_out($post)
    {
        $params = [
            'item_id' => $post['item_id'],
            'type' => 'out',
            'detail' => $post['detail'],
            'qty' => $post['qty'],
            'total_out' => $post['total_out'],
            'date' => $post['date'],
            'user_id' => $this->session->userdata('userid'),
        ];
        $this->db->insert('t_stock', $params);
    }

    public function get_stock_pagination($limit = null, $start = null)
    {
        $post = $this->session->userdata('search');
        
        $this->db->select('t_stock.stock_id, p_item.kode_barang,
        p_item.name as item_name, p_item.price as pricebrg, stock, qty, total_out, date, detail,p_item.item_id');
       
        $this->db->from('t_stock');

        $this->db->join('p_item', 't_stock.item_id = p_item.item_id');
       
      
        if(!empty($post['date1']) && !empty($post['date2'])) {
        $this->db->where("t_stock.date BETWEEN '$post[date1]' AND
        '$post[date2]'"); }      
        
    
        $this->db->limit($limit, $start);
        $this->db->order_by('date', 'desc');
        $query = $this->db->get();
        return $query;
    }

    
}