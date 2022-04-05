<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_operasional();
        $this->load->model(['item_m','stock_m']);
    }


    public function stock_out_data(){
        
        $data['row'] = $this->stock_m->get_stock_out()-> result();
        $this->template->load('template', 'transaction/stock_out/stock_out_data', $data);
    }

   
    public function stock_out_add()
    {
        $item = $this->item_m->get()->result();
        $data = ['item' => $item];
        $this->template->load('template', 'transaction/stock_out/stock_out_form', $data);
    }

    public function stock_out_del()
    {
        $stock_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->stock_m->get($stock_id)->row()->qty;
        $data = ['qty' => $qty, 'item_id' => $item_id];
        $this->item_m->update_stock($data);
        $this->stock_m->del($stock_id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Stock-Out berhasil dihapus');
        }
        redirect('stock/out');
    }
  
    public function process()

    {
      if(isset($_POST['out_add'])) {
            $post = $this->input->post(null, TRUE);
            $row_item = $this->item_m->get($this->input->post('item_id'))->row();
            if($row_item->stock < $this->input->post('qty')) {
                $this->session->set_flashdata('danger', "Qty melebihi stock");
                redirect('stock/out/add');
            } else {
                $this->stock_m->add_stock_out($post);
                $this->item_m->update_stock_out($post);
                if($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data Stock-Out berhasil disimpan');
                }
                redirect('stock/out');
            }
        }
    }

    
}