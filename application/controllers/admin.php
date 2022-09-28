<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
		if (!$this->session->userdata('email')){
			redirect(base_url(''));
		}
    }

    public function index()
	{
		
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();

		$data['jumdestinasi'] = $this->db->get('tb_destinasi')->num_rows();
		$data['jumpaket'] = $this->db->get('tb_paket')->num_rows();
		$data['jummobil'] = $this->db->get('tb_mobil')->num_rows();
		$data['jumtestimoni'] = $this->db->get('tb_testimoni')->num_rows();
		$data['pesan'] = $this->db->get('tb_pesan')->result_array();

		$this->load->view('rehol/template/header', $data);
		$this->load->view('rehol/template/sidebar');
		$this->load->view('rehol/dashboard');
		$this->load->view('rehol/template/footer');
	}

	
	public function profil(){
		
		$data['title'] = 'Profil Admin';
		$data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['profil'] = $this->db->get('tb_profil')->result_array();

		$this->load->view('rehol/template/header', $data);
		$this->load->view('rehol/template/sidebar');
		$this->load->view('rehol/profil');
		$this->load->view('rehol/template/footer');
	}

	public function paket(){
		
		$data['title'] = 'Paket Wisata';
		$data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
		
		$data['kategori'] = $this->db->get('tb_paket_kategori')->result_array();

		$this->load->model('Lokasi_model', 'paket');
		$data['paket'] = $this->paket->getAllPaket();

		$this->form_validation->set_rules('nama_paket', 'Nama Paket', 'required|trim');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Paket', 'required|trim');
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'required|trim');
		$this->form_validation->set_rules('harga', 'Harga', 'required|trim');
		$this->form_validation->set_rules('durasi', 'Durasi', 'required|trim');
		$this->form_validation->set_rules('orang', 'Orang', 'required|trim');

			if ($this->form_validation->run() == false){
				
				$this->load->view('rehol/template/header', $data);
				$this->load->view('rehol/template/sidebar');
				$this->load->view('rehol/paket');
				$this->load->view('rehol/template/footer');
			}else{
				$nama_paket = $this->input->post('nama_paket');

				// convert text untuk pinddah line
				$text = $this->input->post('deskripsi');
				$deskripsi = nl2br($text);

				$id_kategori = $this->input->post('id_kategori');
				$harga = $this->input->post('harga');
				$durasi = $this->input->post('durasi');
				$orang = $this->input->post('orang');
				$gambar_paket = $_FILES['gambar_paket'];

				if ($gambar_paket=''){

				}else{
					$config['allowed_types'] = 'gif|jpg|jpeg|png|heif|hevc';
					$config['max_size']      = '15360';
					$config['upload_path'] = './assets/paket/';

					$this->load->library('upload', $config);

					if(!$this->upload->do_upload('gambar_paket')){
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Patikan Format Gambar Benar</div>');
						redirect(base_url('admin/paket'));
					}else{
						$gambar_paket=$this->upload->data('file_name');
					}
				}

				$data = array (
					'id_kategori' => $id_kategori,
					'nama_paket' => $nama_paket,
					'ket_paket' => $deskripsi,
					'gambar_p' => $gambar_paket,
					'harga' => $harga,
					'durasi' => $durasi,
					'orang' => $orang
				);

				$this->db->insert('tb_paket', $data);
				redirect(base_url('admin/paket'));
			}
		}

	public function destinasi(){
		
		$data['title'] = 'Destinasi';
		$data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['lokasi'] = $this->db->get('tb_lokasi')->result_array();
		
		$this->load->model('Lokasi_model', 'lokasi');
		$data['destinasi'] = $this->lokasi->getLokasi();

		$this->form_validation->set_rules('nama_wisata', 'Nama Destinasi', 'required|trim');
		$this->form_validation->set_rules('ket_wisata', 'Deskripsi Destinasi', 'required|trim');
		$this->form_validation->set_rules('id_lokasi', 'Lokasi', 'required|trim');

			if ($this->form_validation->run() == false){
				
				$this->load->view('rehol/template/header', $data);
				$this->load->view('rehol/template/sidebar');
				$this->load->view('rehol/destinasi');
				$this->load->view('rehol/template/footer');
			}else{
				$nama_wisata = $this->input->post('nama_wisata');

				// convert text untuk pinddah line
				$text = $this->input->post('ket_wisata');
				$ket_wisata = nl2br($text);

				$id_lokasi = $this->input->post('id_lokasi');
				$gambar_w = $_FILES['gambar_w'];

				if ($gambar_w=''){

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
					}
				}

				$data = array (
					'nama_wisata' => $nama_wisata,
					'id_lokasi' => $id_lokasi,
					'gambar_w' => $gambar_w,
					'Ket_wisata' => $ket_wisata
				);

				$this->db->insert('tb_destinasi', $data);
				redirect(base_url('admin/destinasi'));
			}
		}
	


	public function mobil(){
		
		$data['title'] = 'Rental Mobil';
		$data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['mobil'] = $this->db->get('tb_mobil')->result_array();

		$this->form_validation->set_rules('nama_mobil', 'Nama Mobil', 'required|trim');
		$this->form_validation->set_rules('kapasitas_orang', 'Kapasitas Orang', 'required|trim');
		$this->form_validation->set_rules('pemakaian', 'Pemakaian', 'required|trim');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');

			if ($this->form_validation->run() == false){

				$this->load->view('rehol/template/header', $data);
				$this->load->view('rehol/template/sidebar');
				$this->load->view('rehol/mobil');
				$this->load->view('rehol/template/footer');

			}else{
				$nama_mobil = $this->input->post('nama_mobil');
				$kapasitas_orang = $this->input->post('kapasitas_orang');
				$pemakaian = $this->input->post('pemakaian');

				// convert text untuk pinddah line
				$text = $this->input->post('deskripsi');
				$deskripsi = nl2br($text);

				$harga = $this->input->post('harga');
				$gambar_m = $_FILES['gambar_m'];

				if ($gambar_m=''){
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gambar tidak boleh kosong</div>');
					redirect(base_url('admin/mobil'));
				}else{
					$config['allowed_types'] = 'gif|jpg|jpeg|png|heif|hevc';
					$config['max_size']      = '5120';
					$config['upload_path'] = './assets/mobil/';

					$this->load->library('upload', $config);

					if(!$this->upload->do_upload('gambar_m')){
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Patikan Format Gambar Benar</div>');
						redirect(base_url('admin/mobil'));
					}else{
						$gambar_m=$this->upload->data('file_name');
					}
				}

				$data = array (
					'gambar_m' => $gambar_m,
					'nama_mobil' => $nama_mobil,
					'ket_mobil' => $deskripsi,
					'kapasitas' => $kapasitas_orang,
					'pemakaian' => $pemakaian,
					'harga' => $harga
				);

				$this->db->insert('tb_mobil', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mobil Berhasil ditambah</div>');
				redirect(base_url('admin/mobil'));
			}
	}

	public function ubahpassword(){
		
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            redirect(base_url('admin/profil'));
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $id_admin = $this->input->post('id_admin');

            $this->db->set('password', $password);
            $this->db->where('id_admin', $id_admin);
            $this->db->update('tb_admin');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil Dirubah</div>');
            redirect(base_url('admin/profil'));
        }
        
	}

	public function update_profil(){
		$id_profil = $this->input->post('id_profil');
		$judul = $this->input->post('judul');
		$tentang = $this->input->post('tentang');
		$email = $this->input->post('email');
		$no_hp = $this->input->post('no_hp');
		$alamat = $this->input->post('alamat');

		$data = array(
			'judul' => $judul,
			'tentang' => $tentang,
			'no_hp' => $no_hp,
			'email' => $email,
			'alamat' => $alamat
		);
		$this->db->set($data);
		$this->db->where('id_profil', $id_profil);
		$this->db->update('tb_profil');

		redirect(base_url('admin/profil'));
	}


}