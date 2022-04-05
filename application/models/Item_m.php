<?php defined('BASEPATH') OR exit('No direct script access allowed');
class item_m extends CI_Model {



    public function kode_no()
    {  
        $sql = "SELECT MAX(MID(kode_barang,2,4)) AS kode_no 
        FROM p_item";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0){
            $row= $query->row();
            $n = ((int)$row->kode_no) + 1;
            $no = sprintf("%', 04d", $n);
        } else {
            $no = "0001";
        }
        $kode_no = "A".$no;
        return $kode_no;
    }
    public function get($id = null)
    {
        $this->db->select('p_item. *, p_category.name as category_name, p_unit.name as unit_name');
        $this->db->from('p_item');
          $this->db->join('p_category', 'p_category.category_id = p_item.category_id');
           $this->db->join('p_unit', 'p_unit.unit_id = p_item.unit_id');
        if($id != null) {
            $this->db->where('item_id', $id);

         }
         $this->db->order_by('kode_barang', 'asc');
         $query = $this->db->get();
         return $query;
    }

 
    public function add($post)
    {
        $params = [
            'kode_barang' => $post ['kode_barang'], 
             'name' => $post ['product_name'],
             'category_id' => $post ['category'],
             'unit_id' => $post ['unit'],
             'price' => $post ['price'],
             'image' => $post ['image'],   
             'stock' => $post ['stock'],   
                  
        ];
        
        $this->db->insert('p_item', $params);    
    }


    public function edit($post)
    {
        $params = [
            'kode_barang' => $post ['kode_barang'], 
            'name' => $post ['product_name'],
            'category_id' => $post ['category'],
            'unit_id' => $post ['unit'],
            'stock' => $post ['stock'],
            'price' => $post ['price'],
                                       
        ];
          if($post['image'] !=null) {
            $params['image'] = $post['image'];

        }
        $this->db->where('item_id', $post['id']);
        $this->db->update('p_item', $params);    
    }

    function check_kode_barang($code, $id= null)
    {
      
            $this->db->from('p_item');
            $this->db->where('kode_barang', $code);
            if($id != null) {
            $this->db->where('item_id !=', $id);

         }

         $query = $this->db->get();
         return $query;  
    }


    public function del($id) 
    {
        $this->db->where('item_id', $id);
        $this->db->delete('p_item');
    }

    function update_stock_out($data)
    {
        $qty = $data['qty'];
        $id = $data ['item_id'];
        $sql = "UPDATE p_item SET stock = stock - '$qty' WHERE item_id = '$id'";
        $this->db->query($sql);
    }
    function update_stock($data)
    {
        $qty = $data['qty'];
        $id = $data ['item_id'];
        $sql = "UPDATE p_item SET stock = stock + '$qty' WHERE item_id = '$id'";
        $this->db->query($sql);
    }

}