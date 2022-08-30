<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conpak extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
		if (!$this->session->userdata('email')){
			redirect(base_url(''));
		}
    }

    public function kategori(){
		$nama_kategori = $this->input->post('nama_kategori');
		$gambar_kat = $_FILES['gambar_kat'];

		if ($gambar_kat=''){
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Isikan Gambar</div>');
		redirect(base_url('admin/paket'));
		}else{
			$config['allowed_types'] = 'gif|jpg|png|webp';
			$config['max_size']      = '10240';
			$config['upload_path'] = './assets/paket/';

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('gambar_kat')){
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Patikan Format Gambar Benar</div>');
				redirect(base_url('admin/paket'));
			}else{
				$gambar_kat=$this->upload->data('file_name');
			}
		}

        $data = array (
			'nama_kategori' => $nama_kategori,
			'gambar_kat' => $gambar_kat
		);

		$this->db->insert('tb_paket_kategori', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori Paket Baru Ditambahkan</div>');
		redirect(base_url('admin/paket'));
    }

    public function editPaket(){
        $nama_paket = $this->input->post('nama_paket');
        $id_paket = $this->input->post('id_paket');
        $deskripsi = $this->input->post('deskripsi');
        $id_kategori = $this->input->post('id_kategori');
        $harga = $this->input->post('harga');
        $durasi = $this->input->post('durasi');
        $orang = $this->input->post('orang');

		$data = array(
			'id_kategori' => $id_kategori,
            'nama_paket' => $nama_paket,
            'ket_paket' => $deskripsi,
            'harga' => $harga,
            'durasi' => $durasi,
            'orang' => $orang
		);
		$this->db->set($data);
		$this->db->where('id_paket', $id_paket);
		$this->db->update('tb_paket');

		redirect(base_url('admin/paket'));
    }

    public function hapus_paket($p){
		$_id = $this->db->get_where('tb_paket',['id_paket' => $p])->row();
		$query = $this->db->delete('tb_paket', ['id_paket' => $p]);
		if($query){
			unlink(FCPATH . 'assets/paket/'.$_id->gambar_p);
		}
		redirect(base_url('admin/paket'));

	}

    public function update_gambar(){
		$id_paket = $this->input->post('id_paket');
		$gambar_p = $_FILES['gambar_p'];
		$_id = $this->db->get_where('tb_paket',['id_paket' => $id_paket])->row();

		if ($gambar_p=''){
            redirect(base_url('admin/paket'));
		}else{
			$config['allowed_types'] = 'gif|jpg|png|webp';
			$config['max_size']      = '5120';
			$config['upload_path'] = './assets/paket/';

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('gambar_p')){
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Patikan Format Gambar Benar</div>');
				redirect(base_url('admin/paket'));
			}else{
				$gambar_p=$this->upload->data('file_name');
				unlink(FCPATH . 'assets/paket/'.$_id->gambar_p);
			}
		}

        $data = array (
			'gambar_p' => $gambar_p
		);

		$this->db->set($data);
		$this->db->where('id_paket', $id_paket);
		$this->db->update('tb_paket');
		redirect(base_url('admin/paket'));
    }

	public function detail_paket($p){

		$data['title'] = 'Detail Paket Wisata';
		$this->load->model('Destinasi_model', 'destinasi');
		$data['paket'] = $this->destinasi->getPaket($p);
		

		$this->load->view('hero/template/header', $data);
		$this->load->view('hero/detail_paket');
		$this->load->view('hero/template/footer');
	}


}