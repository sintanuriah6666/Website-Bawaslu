<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login(); 
        check_operasional();
        $this->load->model(['sale_m', 'stock_m', 'laporan_m', 'ttd_m']);
    }
    
    public function pembelian()
    {

        $this->load->library('pagination');
        
        if(isset($_POST['reset'])) {
            $this->session->unset_userdata('search');
        }
        if(isset($_POST['filter'])) {
            $post = $this->input->post(null, TRUE);
            $this->session->set_userdata('search', $post);
        } else {
            $post = $this->session->userdata('search');
        }
 
        $config['base_url'] = site_url('report/pembelian');
        $config['total_rows'] = $this->sale_m->get_sale_pagination()->num_rows();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
 
        $this->pagination->initialize($config);
 
        $data['pagination'] = $this->pagination->create_links();
        $data['ttd'] = $this->ttd_m->get()->result();
        $data['row'] = $this->sale_m->get_sale_pagination($config['per_page'], $this->uri->segment(3));
        $data['post'] = $post;
        $this->template->load('template', 'report/sale_report', $data);
    }

  public function exportexcel()

{ 
       $data['title'] = 'Laporan Excel';
       $data['row'] =$this->sale_m->get_sale_pagination();
       $post4 = $this->session->userdata('search');
        $data['post4'] = $post4; 
       $this->load->view('report/exceltransaksi', $data);
}

   
    public function barang_keluar()
    {

    
        $this->load->library('pagination');

        
        if(isset($_POST['reset'])) {
            $this->session->unset_userdata('search');
        }
        if(isset($_POST['filter'])) {
            $post = $this->input->post(null, TRUE);
            $this->session->set_userdata('search', $post);
        } else {
            $post = $this->session->userdata('search');
        }
 
        $config['base_url'] = site_url('report/barang_keluar');
        $config['total_rows'] = $this->stock_m->get_stock_pagination()->num_rows();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
 
        $this->pagination->initialize($config);
 
        $data['pagination'] = $this->pagination->create_links();
        $data['ttd'] = $this->ttd_m->get()->result();
        $data['row'] = $this->stock_m->get_stock_pagination($config['per_page'], $this->uri->segment(3));
        $data['post'] = $post;
        $this->template->load('template', 'report/barang_keluar', $data);
    }

public function excelbarangkeluar()

{ 
       $data['title'] = 'Laporan Barang Keluar';
       $data['row'] =$this->stock_m->get_stock_pagination();
        $post3 = $this->session->userdata('search');
        $data['post3'] = $post3; 
       $this->load->view('report/excelkeluar', $data);
}
    
    public function barang_masuk() {
        
        $this->load->model('ttd_m');
        $this->load->library('pagination');
        
        if(isset($_POST['reset'])) {
            $this->session->unset_userdata('search');
        }
        if(isset($_POST['filter'])) {
            $post = $this->input->post(null, TRUE);
            $this->session->set_userdata('search', $post);
        } else {
            $post = $this->session->userdata('search');
        }
 
        $config['base_url'] = site_url('report/barang_masuk');
        $config['total_rows'] = $this->sale_m->get_pagination()->num_rows();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
 
        $this->pagination->initialize($config);
 
        $data['pagination'] = $this->pagination->create_links();
         $data['ttd'] = $this->ttd_m->get()->result();
        $data['row'] = $this->sale_m->get_pagination($config['per_page'], $this->uri->segment(3));
        $data['post'] = $post;     
        $this->template->load('template', 'report/barang_masuk', $data);

    }

    public function excelbarangmasuk()

{ 
       $data['title'] = 'Laporan Barang Masuk';
       $data['row'] =$this->sale_m->get_pagination();
       $post4 = $this->session->userdata('search');
       $data['post4'] = $post4; 

       $this->load->view('report/excelmasuk', $data);

}


    public function excelakhir()

{ 
       $data['title'] = 'Laporan Persediaan Barang';
       $data['row'] =$this->laporan_m->get_laporanakhir();
       $post2 = $this->session->userdata('search');
       $data['post2'] = $post2; 
       $this->load->view('report/excelpersediaan', $data);
}
     public function cetaklaporankeluar() {
           $this->load->model('ttd_m');
             $get1 = $_GET;  
             $data['ttd1'] = $this->ttd_m->get(isset($get1['ttd1']) ? $get1['ttd1'] : NULL)->
               result(); 
               $get1 = $_GET; 
               $data['ttd2'] = $this->ttd_m->get(isset($get1['ttd2']) ? $get1['ttd2'] : NULL)->
               result();
            $post3 = $this->session->userdata('search');
            $data['post3'] = $post3; 
            $data['row'] = $this->stock_m->get_stock_pagination();
            $this->load->view('report/cetak_barangkeluar', $data);
     }

      public function cetaklaporanmasuk() {
            $get1 = $_GET;  
             $data['ttd1'] = $this->ttd_m->get(isset($get1['ttd1']) ? $get1['ttd1'] : NULL)->
               result(); 
               $get1 = $_GET; 
               $data['ttd2'] = $this->ttd_m->get(isset($get1['ttd2']) ? $get1['ttd2'] : NULL)->
               result();
            $post4 = $this->session->userdata('search');
            $data['post4'] = $post4; 

              
            $data['row'] = $this->sale_m->get_pagination();
            $this->load->view('report/cetak_barangmasuk', $data);
     }

        public function cetaktransaksi() {
            $this->load->model('ttd_m');
            $get1 = $_GET;  
             $data['ttd1'] = $this->ttd_m->get(isset($get1['ttd1']) ? $get1['ttd1'] : NULL)->
               result(); 
               $get1 = $_GET; 
               $data['ttd2'] = $this->ttd_m->get(isset($get1['ttd2']) ? $get1['ttd2'] : NULL)->
               result();
            
            $post4 = $this->session->userdata('search');
            $data['post4'] = $post4; 

              
            $data['row'] = $this->sale_m->get_sale_pagination();
            $this->load->view('report/cetak_transaksi', $data);
     }

     public function cetaklaporanakhir() {
        $this->load->model('ttd_m');
       $get1 = $_GET;
       $data['ttd1'] = $this->ttd_m->get(isset($get1['ttd1']) ? $get1['ttd1'] : NULL)->
       result(); 
       $get1 = $_GET; 
       $data['ttd2'] = $this->ttd_m->get(isset($get1['ttd2']) ? $get1['ttd2'] : NULL)->
       result();

       $post2 = $this->session->userdata('search');
       $data['post2'] = $post2; 

       $data['row'] = $this->laporan_m->get_laporanakhir();
       $this->load->view('report/cetak_laporanakhir', $data);
   }
        
        public function pdf(){
            $this->load->model('ttd_m');
            
            $post7 = $this->session->userdata('search');
            $data['post7'] = $post7; 

             $get1 = $_GET;  
             $data['ttd1'] = $this->ttd_m->get(isset($get1['ttd1']) ? $get1['ttd1'] : NULL)->
               result(); 
               $get1 = $_GET; 
               $data['ttd2'] = $this->ttd_m->get(isset($get1['ttd2']) ? $get1['ttd2'] : NULL)->
               result();
            $this->load->library('dompdf_gen');

            $data['row'] = $this->sale_m->get_pagination();

            $this->load->view('report/laporan_pdf',$data);

            $paper_size ='A4';
            $orientation = 'potrait';
            $html = $this->output->get_output();
            $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_Barang_Masuk.pdf", array('Attachment' =>0));
    }

      public function pdf_keluar(){

        $this->load->model('ttd_m');
           
            $post8 = $this->session->userdata('search');
            $data['post8'] = $post8; 

             $get1 = $_GET;  
             $data['ttd1'] = $this->ttd_m->get(isset($get1['ttd1']) ? $get1['ttd1'] : NULL)->
               result(); 
               $get1 = $_GET; 
               $data['ttd2'] = $this->ttd_m->get(isset($get1['ttd2']) ? $get1['ttd2'] : NULL)->
               result();
        $this->load->library('dompdf_gen');

         $data['row'] = $this->stock_m->get_stock_pagination();

        $this->load->view('report/laporan_pdfkeluar',$data);

        $paper_size ='A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_Barang_Keluar.pdf", array('Attachment' =>0));
    }

     public function pdf_transaksi(){
         $this->load->model('ttd_m');
         $post9 = $this->session->userdata('search');
        $data['post9'] = $post9; 
        $get3 = $_GET;  
             $data['ttd1'] = $this->ttd_m->get(isset($get3['ttd1']) ? $get3['ttd1'] : NULL)->
               result(); 
               $get3 = $_GET; 
               $data['ttd2'] = $this->ttd_m->get(isset($get3['ttd2']) ? $get3['ttd2'] : NULL)->
               result();

        $this->load->library('dompdf_gen');

         $data['row'] = $this->sale_m->get_sale_pagination();

        $this->load->view('report/laporan_pdftransaksi',$data);

        $paper_size ='A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_Barang_Transaksi.pdf", array('Attachment' =>0));
   
 } 

public function pdf_laporanakhir(){
        $this->load->library('dompdf_gen');
         $post2 = $this->session->userdata('search');
        $data['post2'] = $post2; 
        $get9 = $_GET;  
         $get1 = $_GET;  
             $data['ttd1'] = $this->ttd_m->get(isset($get1['ttd1']) ? $get1['ttd1'] : NULL)->
               result(); 
               $get1 = $_GET; 
               $data['ttd2'] = $this->ttd_m->get(isset($get1['ttd2']) ? $get1['ttd2'] : NULL)->
               result();
        

         $data['row'] = $this->laporan_m->get_laporanakhir();

        $this->load->view('report/laporan_pdfakhir',$data);

        $paper_size ='A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_Barang_Akhir.pdf", array('Attachment' =>0));
   
 }
}