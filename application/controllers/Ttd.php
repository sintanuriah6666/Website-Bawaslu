
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ttd extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('ttd_m');
	}
	
	public function index()
	{
		$data['row'] = $this->ttd_m->get();
		$this->template->load('template', 'ttd/ttd_data', $data);
	}

	public function add()
	{
		$ttd = new stdClass();
		$ttd->ttd_id = null;
		$ttd->name = null;
		$ttd->nip = null;
        $ttd->jabatan = null;
		$data = array(
			'page' => 'add',
			'row' => $ttd
		);
		$this->template->load('template', 'ttd/ttd_form', $data);
	}

	public function edit($id)
	{
		$query = $this->ttd_m->get($id);
		if($query->num_rows() > 0) {
			$ttd = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $ttd
			);
			$this->template->load('template', 'ttd/ttd_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='".site_url('ttd')."';</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->ttd_m->add($post);
		} else if(isset($_POST['edit'])) {
			$this->ttd_m->edit($post);
		}

		if($this->db->affected_rows() > 0) {
        	$this->session->set_flashdata('success', 'Data berhasil disimpan');  
		}
		redirect('ttd');
	}

	public function del($id)
	{
		$this->ttd_m->del($id);
			if($this->db->affected_rows() > 0) {
		$this->session->set_flashdata('success', 'Data berhasil dihapus');  
		}
		redirect('ttd');
	}
}