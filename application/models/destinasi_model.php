<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Destinasi_model extends CI_Model
{
    public function getDestinasi($d)
    {
        $this->db->SELECT('*');
        $this->db->from('tb_destinasi');
        $this->db->join('tb_lokasi', 'tb_destinasi.id_lokasi = tb_lokasi.id_lok');
        $this->db->where('id_wisata', $d);
        return $this->db->get()->result();
    }

    public function getPaket($p)
    {
        $this->db->SELECT('*');
        $this->db->from('tb_paket');
        $this->db->join('tb_paket_kategori', 'tb_paket.id_kategori = tb_paket_kategori.id_kategori');
        $this->db->where('id_paket', $p);
        return $this->db->get()->result();
    }

    public function cari_destinasi($keyword){
        $query = "SELECT *  FROM `tb_destinasi` JOIN `tb_lokasi`
                ON `tb_destinasi`.`id_lokasi` = `tb_lokasi`.`id_lok`  WHERE nama_wisata LIKE '%".$keyword."%' OR
                nama_lokasi like '%".$keyword."%'";

        return $this->db->query($query)->result_array();
    }

    public function cari_mobil($keyword){
        $query = "SELECT *  FROM `tb_mobil` WHERE nama_mobil LIKE '%".$keyword."%' OR
                kapasitas LIKE '%".$keyword."%'";

        return $this->db->query($query)->result_array();
    }

    public function cari_paket($keyword){
        $query = "SELECT *  FROM `tb_paket` JOIN `tb_paket_kategori`
                ON `tb_paket`.`id_kategori` = `tb_paket_kategori`.`id_kategori`  WHERE nama_kategori LIKE '%".$keyword."%'";

        return $this->db->query($query)->result_array();
    }
}