<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conmo extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
		if (!$this->session->userdata('email')){
			redirect(base_url(''));
		}
    }

    public function update_mobil(){
		$id_mobil = $this->input->post('id_mobil');
		$nama_mobil = $this->input->post('nama_mobil');
		$kapasitas_orang = $this->input->post('kapasitas_orang');
        $deskripsi = $this->input->post('deskripsi');
		$pemakaian = $this->input->post('pemakaian');
		$harga = $this->input->post('harga');

		$data = array(
            'nama_mobil' => $nama_mobil,
            'ket_mobil' => $deskripsi,
            'kapasitas' => $kapasitas_orang,
            'pemakaian' => $pemakaian,
            'harga' => $harga
		);
		$this->db->set($data);
		$this->db->where('id_mobil', $id_mobil);
		$this->db->update('tb_mobil');

		redirect(base_url('admin/mobil'));
	}

    public function update_gambar(){
		$id_mobil = $this->input->post('id_mobil');
		$gambar_m = $_FILES['gambar_m'];
		$_id = $this->db->get_where('tb_mobil',['id_mobil' => $id_mobil])->row();

		if ($gambar_m=''){
            redirect(base_url('admin/mobil'));
		}else{
			$config['allowed_types'] = 'gif|jpg|png|webp';
			$config['max_size']      = '5120';
			$config['upload_path'] = './assets/mobil/';

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('gambar_m')){
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Patikan Format Gambar Benar</div>');
				redirect(base_url('admin/mobil'));
			}else{
				$gambar_m=$this->upload->data('file_name');
				unlink(FCPATH . 'assets/mobil/'.$_id->gambar_m);
			}
		}

        $data = array (
			'gambar_m' => $gambar_m
		);

		$this->db->set($data);
		$this->db->where('id_mobil', $id_mobil);
		$this->db->update('tb_mobil');
		redirect(base_url('admin/mobil'));
    }


    public function hapus_mobil($m){
		$_id = $this->db->get_where('tb_mobil',['id_mobil' => $m])->row();
		$query = $this->db->delete('tb_mobil', ['id_mobil' => $m]);
		if($query){
			unlink(FCPATH . 'assets/mobil/'.$_id->gambar_m);
		}
		redirect(base_url('admin/mobil'));

	}


}