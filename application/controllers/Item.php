<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class item extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_operasional();
        $this->load->model(['item_m', 'category_m', 'unit_m']);
    }

    public function index() 
    {   
        $this->load->model(['item_m']);
        $item = $this->item_m->get()->result();
        $data = array (
            'item' => $item,
            'kode_barang' => $this->item_m->kode_no(),
        );

        $this->template->load('template', 'product/item/item_data', $data);  
    }


    public function add()
    {
        $item = new stdClass();
        $item->item_id = null;
        $item->kode_barang = null;
        $item->name = null;
        $item->price = null;
        $item->category_id = null;
        $item->stock = null;


        $query_category = $this->category_m->get();
        $kode_barang = $this->item_m->kode_no();
        $query_unit = $this->unit_m->get();
        $unit[null] = '- Pilih -';
        foreach($query_unit->result() as $unt) {
            $unit[$unt->unit_id] = $unt->name;
        }

        $data = array(
            'page' => 'add',
            'row' => $item,
            'kode_barang' => $kode_barang,
            'category' => $query_category,
            'unit' => $unit, 'selectedunit' => null,
        );
        $this->template->load('template', 'product/item/item_form', $data);
    }

     public function edit($id)
    {
        $query = $this->item_m->get($id);
        if($query->num_rows() > 0) {
            $item = $query->row();
            $query_category = $this->category_m->get();
            $kode_barang = $this->item_m->kode_no();

            $query_unit = $this->unit_m->get();
            $unit[null] = '- Pilih -';
            foreach($query_unit->result() as $unt) {
                $unit[$unt->unit_id] = $unt->name;
            }

            $data = array(
                'page' => 'edit',
                'row' => $item,
                'category' => $query_category,
                'kode_barang' => $kode_barang,
                'unit' => $unit, 'selectedunit' => $item->unit_id,
            );
            $this->template->load('template', 'product/item/item_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='".site_url('item')."';</script>";
        }
    }

    public function process()
    {
        $config['upload_path']    = './uploads/product/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';
        $config['max_size']       = 2048;
        $config['file_name']      = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10);
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])) {
            if($this->item_m->check_kode_barang($post['kode_barang'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "kode_barang $post[kode_barang] sudah dipakai barang lain");
                redirect('item/add');
            } else {
                if(@$_FILES['image']['name'] != null) {
                    if($this->upload->do_upload('image')) {
                        $post['image'] = $this->upload->data('file_name');
                        $this->item_m->add($post);
                        if($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data berhasil disimpan');
                        }
                        redirect('item');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('item/add');
                    }
                } else {
                    $post['image'] = null;
                    $this->item_m->add($post);
                    if($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    redirect('item');
                }
            }
        } else if(isset($_POST['edit'])) {
            if($this->item_m->check_kode_barang($post['kode_barang'], $post['id'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "kode_barang $post[kode_barang] sudah dipakai barang lain");
                redirect('item/edit/'.$post['id']);
            } else {
                if(@$_FILES['image']['name'] != null) {
                    if($this->upload->do_upload('image')) {

                        $item = $this->item_m->get($post['id'])->row();
                        if($item->image != null) {
                            $target_file = './uploads/product/'.$item->image;
                            unlink($target_file);
                        }

                        $post['image'] = $this->upload->data('file_name');
                        $this->item_m->edit($post);
                        if($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data berhasil disimpan');
                        }
                        redirect('item');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('item/add');
                    }
                } else {
                    $post['image'] = null;
                    $this->item_m->edit($post);
                    if($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    redirect('item');
                }
            }
        }
    }

    public function del($id)
    {
        $item = $this->item_m->get($id)->row();
        if($item->image != null) {
            $target_file = './uploads/product/'.$item->image;
            unlink($target_file);
        }

        $this->item_m->del($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('item');
    }
    public function excel_databarang() {
                          
        $data['row'] = $this->item_m->get($id = null)->result();
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');
    
        $object = new PHPexcel();
    
        $object->getProperties()->setCreator("Framework Indonesia");
        $object->getProperties()->setLastModifiedBy("Framework Indonesia");
        $object->getProperties()->setTitle("Data");
    
        $object->setActiveSheetIndex(0);
    
        
        $object->getActiveSheet()->setCellValue('A1', 'NO');
        $object->getActiveSheet()->setCellValue('B1', 'Kode Barang');
        $object->getActiveSheet()->setCellValue('C1', 'Nama');
        $object->getActiveSheet()->setCellValue('D1', 'Kategori');
        $object->getActiveSheet()->setCellValue('E1', 'Unit');
        $object->getActiveSheet()->setCellValue('F1', 'Harga');
        $object->getActiveSheet()->setCellValue('G1', 'Stok Saat Ini');
        $object->getActiveSheet()->setCellValue('H1', 'Nominal');
    
    
        $baris = 2;
        $no = 1;
        foreach ($data['row'] as $key => $data) {
         $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
         $object->getActiveSheet()->setCellValue('B'.$baris, $data->kode_barang);
         $object->getActiveSheet()->setCellValue('C'.$baris, $data->name);
         $object->getActiveSheet()->setCellValue('D'.$baris, $data->category_name);
         $object->getActiveSheet()->setCellValue('E'.$baris, $data->unit_name);
         $object->getActiveSheet()->setCellValue('F'.$baris, $data->price);
         $object->getActiveSheet()->setCellValue('G'.$baris, $data->stock);
         $object->getActiveSheet()->setCellValue('H'.$baris, $nominal = $data->price * $data->stock);
    
         $baris++;
    
    
        }
    
    
        $filename = "Laporan Data Barang".'.xlsx';
        $object->getActiveSheet()->setTitle("Laporan Data Barang ");
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
    
        $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');
    
        
    }
    
    
    }