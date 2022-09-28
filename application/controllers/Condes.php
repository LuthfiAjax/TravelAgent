<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Condes extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
		if (!$this->session->userdata('email')){
			redirect(base_url(''));
		}
    }

    public function hapus_destinasi($d){
		$_id = $this->db->get_where('tb_destinasi',['id_wisata' => $d])->row();
		$query = $this->db->delete('tb_destinasi', ['id_wisata' => $d]);
		if($query){
			unlink(FCPATH . 'assets/destination/'.$_id->gambar_w);
		}
		redirect(base_url('admin/destinasi'));

	}

	public function update_destinasi(){
		$id_wisata = $this->input->post('id_wisata');
		$nama_wisata = $this->input->post('nama_wisata');

		$slug = str_replace(' ', '-', $nama_wisata);

		// convert text pinddah line
		$text = $this->input->post('ket_wisata');
		$ket_wisata = nl2br($text);

		$id_lokasi = $this->input->post('id_lok');

		$data = array(
			'nama_wisata' => $nama_wisata,
			'id_lokasi' => $id_lokasi,
			'Ket_wisata' => $ket_wisata,
			'slug'=> $slug
		);
		$this->db->set($data);
		$this->db->where('id_wisata', $id_wisata);
		$this->db->update('tb_destinasi');

		redirect(base_url('admin/destinasi'));
	}

	public function update_gambar(){
		$id_wisata = $this->input->post('id_wisata');
		$gambar_w = $_FILES['gambar_w'];
		$_id = $this->db->get_where('tb_destinasi',['id_wisata' => $id_wisata])->row();

		if (!$gambar_w){
			redirect(base_url('admin/destinasi'));
		}else{
			$config['allowed_types'] = 'gif|jpg|jpeg|png|heif|hevc';
			$config['max_size']      = '15360';
			$config['upload_path'] = './assets/destination/';

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('gambar_w')){
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Patikan Format Gambar Benar</div>');
				redirect(base_url('admin/destinasi'));
			}else{
				$gambar_w=$this->upload->data('file_name');
				unlink(FCPATH . 'assets/destination/'.$_id->gambar_w);
			}
		}

		$data = array (
			'gambar_w' => $gambar_w
		);

		$this->db->set($data);
		$this->db->where('id_wisata', $id_wisata);
		$this->db->update('tb_destinasi');
		redirect(base_url('admin/destinasi'));
	}

	public function lokasi(){
		$lokasi = $this->input->post('lokasi');
		$gambar_lok = $_FILES['gambar_lok'];

		if ($gambar_lok=''){
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Isikan Gambar</div>');
		redirect(base_url('admin/destinasi'));
		}else{
			$config['allowed_types'] = 'gif|jpg|jpeg|png|heif|hevc';
			$config['max_size']      = '15360';
			$config['upload_path'] = './assets/destination/';

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('gambar_lok')){
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Patikan Format Gambar Benar</div>');
				redirect(base_url('admin/destinasi'));
			}else{
				$gambar_lok=$this->upload->data('file_name');
			}
		}

		$data = array (
			'nama_lokasi' => $lokasi,
			'gambar_lok' => $gambar_lok
		);

		$this->db->insert('tb_lokasi', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Lokasi Baru Ditambahkan</div>');
		redirect(base_url('admin/destinasi'));
	}

}