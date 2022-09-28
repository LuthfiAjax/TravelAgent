<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hero extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Rehol Transport';
		$this->load->model('Lokasi_model', 'lokasi');

		$data['destinasi'] = $this->lokasi->getDestinasi();
		$data['paket'] = $this->lokasi->getPaket();

		$data['testimoni'] = $this->db->get_Where('tb_testimoni', array('status'=>'Aktif'))->result_array();
		
		$this->load->view('hero/template/header', $data);
		$this->load->view('hero/index');
		$this->load->view('hero/template/footer');
	}

	public function destination(){
		$data['title'] = 'Destinasi Wisata';
		$keyword = $this->input->POST('keyword');
		$this->load->model('Destinasi_model', 'destinasi');
		$data['destinasi'] = $this->destinasi->cari_destinasi($keyword);
	
		$this->load->view('hero/template/header', $data);
		$this->load->view('hero/destination');
		$this->load->view('hero/template/footer');
	}

	public function detail_destinasi($d){
		$data['title'] = 'Detail Destinasi Wisata';
		
		$this->load->model('Destinasi_model', 'destinasi');
		$data['destinasi'] = $this->destinasi->getDestinasi($d);

		$this->load->view('hero/template/header', $data);
		$this->load->view('hero/detail_destinasi');
		$this->load->view('hero/template/footer');
	}

	public function paket(){
		$data['title'] = 'Paket Wisata';

		$data['kategori'] = $this->db->get('tb_paket_kategori')->result_array();
		
		$keyword = $this->input->POST('keyword');
		$this->load->model('Destinasi_model', 'destinasi');
		$data['paket'] = $this->destinasi->cari_paket($keyword);
		
		$this->load->view('hero/template/header', $data);
		$this->load->view('hero/paket');
		$this->load->view('hero/template/footer');
	}

	public function bookingmobil(){
		$data['title'] = 'Sewa Mobil';
		$keyword = $this->input->POST('keyword');
		$this->load->model('Destinasi_model', 'destinasi');
		$data['mobil'] = $this->destinasi->cari_mobil($keyword);
		
		$this->load->view('hero/template/header', $data);
		$this->load->view('hero/bookingmobil');
		$this->load->view('hero/template/footer');
	}

	public function detail_mobil($id, $slug){
		$data['title'] = 'Detail Sewa Mobil';
		
		$data['mobil'] = $this->db->get_Where('tb_mobil', array('slug'=> $slug, 'id_mobil' => $id))->result_array();

		$this->load->view('hero/template/header', $data);
		$this->load->view('hero/detail_mobil');
		$this->load->view('hero/template/footer');
	}

	public function detail_paket($p){

		$data['title'] = 'Detail Paket Wisata';
		$this->load->model('Destinasi_model', 'destinasi');
		$data['paket'] = $this->destinasi->getPaket($p);
		

		$this->load->view('hero/template/header', $data);
		$this->load->view('hero/detail_paket');
		$this->load->view('hero/template/footer');
	}

	public function reviews(){

		$data['title'] = 'Review Pelanggan';
		
		$this->load->view('hero/template/header', $data);
		$this->load->view('hero/reviews');
		$this->load->view('hero/template/footer');
	}

	public function add(){
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('profesi', 'Profesi', 'required|trim');
		$this->form_validation->set_rules('pesan', 'Pesan', 'required|trim');
		$this->form_validation->set_rules('medsos', 'Medsos', 'required|trim');
		$this->form_validation->set_rules('akun', 'Akun', 'required|trim');

		$nama = $this->input->post('nama');
		$Profesi = $this->input->post('profesi');
		$pesan = $this->input->post('pesan');
		$medsos = $this->input->post('medsos');
		$akun = $this->input->post('akun');
		$gambar_t = $_FILES['gambar_t'];

		if (!$gambar_t){
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wajib ada foto/div>');
			redirect(base_url('hero/reviews'));
		}else{
			$config['allowed_types'] = 'gif|jpg|png|webp';
			$config['max_size']      = '5120';
			$config['upload_path'] = './assets/testimoni/';

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('gambar_t')){
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Patikan Format Gambar Benar</div>');
				redirect(base_url('hero/reviews'));
			}else{
				$gambar_t=$this->upload->data('file_name');
			}
		}

		$data = array (
			'nama' => $nama,
			'profesi' => $Profesi,
			'pesan' => $pesan,
			'medsos' => $medsos,
			'akun' => $akun,
			'gambar_t' => $gambar_t,
			'status' => 'Non-Aktif'
		);
		$this->db->insert('tb_testimoni', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Testimoni Berhasil Ditambahkan</div>');
		redirect(base_url('hero/reviews'));
	}

}