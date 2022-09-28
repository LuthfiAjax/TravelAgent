<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Details_model extends CI_Model
{

    public function getPaket($k)
    {
        $this->db->SELECT('*');
        $this->db->from('tb_paket');
        $this->db->join('tb_paket_kategori', 'tb_paket.id_kategori = tb_paket_kategori.id_kategori');
        $this->db->where('tb_paket.id_kategori', $k);
        return $this->db->get()->result();
    }
}