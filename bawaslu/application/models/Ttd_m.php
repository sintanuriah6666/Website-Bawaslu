<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ttd_m extends CI_Model {

    public function get($id = null)
    {
        $this->db->from('ttd');
        if($id != null) {
            $this->db->where('ttd_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'name' => $post['name'],
            'nip' => $post['nip'],
            'jabatan' => $post['jabatan'],
        ];
        $this->db->insert('ttd', $params);
    }

    public function edit($post)
    {
        $params = [
            'name' => $post['name'],
            'nip' => $post['nip'],
            'jabatan' => $post['jabatan'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('ttd_id', $post['id']);
        $this->db->update('ttd', $params);
    }

    public function del($id)
    {
        $this->db->where('ttd_id', $id);
        $this->db->delete('ttd');
    }

}