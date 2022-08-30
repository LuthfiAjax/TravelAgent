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

	public function detail_mobil($m){
		$data['title'] = 'Detail Sewa Mobil';
		
		$data['mobil'] = $this->db->get_Where('tb_mobil', array('id_mobil'=> $m))->result_array();

		$this->load->view('hero/template/header', $data);
		$this->load->view('hero/detail_mobil');
		$this->load->view('hero/template/footer');
	}

}