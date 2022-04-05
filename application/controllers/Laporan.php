<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_operasional();
          $this->load->model(['laporan_m', 'ttd_m']);
    }

    public function index()	{       
      {  
        if(isset($_POST['reset'])) {
            $this->session->unset_userdata('search');
        }
        if(isset($_POST['pilih'])) {
            $post = $this->input->post(null, TRUE);
            $this->session->set_userdata('search', $post);
        } else {
            $post = $this->session->userdata('search');
        }
 
        $data['ttd'] = $this->ttd_m->get()->result();
        $data['post'] = $post;     
        $data['row'] = $this->laporan_m->get_laporanakhir();   
        $this->template->load('template', 'laporan/laporan_akhir', $data);
        $data['post'] = $post;     
       
    }
}

}