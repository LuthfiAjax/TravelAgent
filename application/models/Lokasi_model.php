<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi_model extends CI_Model
{
    public function getLokasi()
    {
        $query = "SELECT *  FROM `tb_destinasi` JOIN `tb_lokasi`
                  ON `tb_destinasi`.`id_lokasi` = `tb_lokasi`.`id_lok`
                ";
        return $this->db->query($query)->result_array();
    }

    public function getDestinasi()
    {
        $query = "SELECT *  FROM `tb_destinasi` JOIN `tb_lokasi`
                  ON `tb_destinasi`.`id_lokasi` = `tb_lokasi`.`id_lok` LIMIT 3";
        return $this->db->query($query)->result_array();
    }


    public function getPaket()
    {
        $query = "SELECT *  FROM `tb_paket` JOIN `tb_paket_kategori`
                  ON `tb_paket`.`id_kategori` = `tb_paket_kategori`.`id_kategori` LIMIT 3";
        return $this->db->query($query)->result_array();
    }

    public function getAllPaket()
    {
        $query = "SELECT *  FROM `tb_paket` JOIN `tb_paket_kategori`
                  ON `tb_paket`.`id_kategori` = `tb_paket_kategori`.`id_kategori`";
        return $this->db->query($query)->result_array();
    }

    public function getTestimoni()
    {
        $query = "SELECT *  FROM `tb_testimoni` WHERE `status`=`Aktif` LIMIT 6";
        return $this->db->query($query)->result_array();
    }
}