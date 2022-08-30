<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Hitung_model extends CI_Model
{
    public function getTestimoni()
    {
        $query = "SELECT * FROM `tb_testimoni`";
        return $this->db->query($query)->num_rows();
    }

    public function getDestinasi()
    {
        $query = "SELECT * FROM `tb_destinasi`";
        return $this->db->query($query)->num_rows();
    }

    public function getPaket()
    {
        $query = "SELECT * FROM `tb_paket`";
        return $this->db->query($query)->num_rows();
    }

    public function getMobil()
    {
        $query = "SELECT * FROM `tb_mobil`";
        return $this->db->query($query)->num_rows();
    }
}