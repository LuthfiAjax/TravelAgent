<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
		if (!$this->session->userdata('email')){
			redirect(base_url(''));
		}
    }

    public function index(){
        $data['title'] = 'Kategori Wisata';
        $data['kategori'] = $this->db->get('tb_paket_kategori')->result_array();
        $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('rehol/template/header', $data);
        $this->load->view('rehol/template/sidebar');
        $this->load->view('rehol/category');
        $this->load->view('rehol/template/footer');

	}
    public function details_kat($k){
        $data['title'] = 'Kategori Wisata';
        $data['kategori'] = $this->db->get('tb_paket_kategori')->result_array();
        $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Details_model', 'paket');
		$data['paket'] = $this->paket->getPaket($k);

		redirect(base_url('Category/#details'.$k));

	}

    public function hapus_kategori($k){
        $_id = $this->db->get_where('tb_paket_kategori',['id_kategori' => $k])->row();
		$query = $this->db->delete('tb_paket_kategori', ['id_kategori' => $k]);
		if(!$query){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kategori Tidak dapat dihapus karena masih terhubung dengan data wisata</div>');
            redirect(base_url('Category'));			
		}else{
            unlink(FCPATH . 'assets/paket/'.$_id->gambar_kat);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori Berhasil Dihapus</div>');
            redirect(base_url('Category'));
        }
    }

    public function hapus_lokasi($l){
        $_id = $this->db->get_where('tb_lokasi',['id_lok' => $l])->row();
		$query = $this->db->delete('tb_lokasi', ['id_lok' => $l]);
		if(!$query){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Lokasi Tidak dapat dihapus karena masih terhubung dengan data wisata</div>');
            redirect(base_url('Category'));			
		}else{
            unlink(FCPATH . 'assets/destination/'.$_id->gambar_lok);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori Berhasil Dihapus</div>');
            redirect(base_url('Category/lokasi'));
        }
    }

    public function edit_kategori(){
        $id_kategori = $this->input->post('id_kategori');
        $nama_kategori = $this->input->post('nama_kategori');

        // cek jika ada gambar yang akan diupload
        $gambar_kat = $_FILES['gambar_kat']['name'];

        if ($gambar_kat) {
            $config['allowed_types'] = 'gif|jpg|jpeg|png|heif|hevc';
            $config['max_size']      = '15360';
            $config['upload_path'] = './assets/paket/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar_kat')) {
                $old_image = $this->db->get_where('tb_paket_kategori',['id_kategori' => $id_kategori])->row();
                if ($old_image != $old_image->gambar_kat) {
                    unlink(FCPATH . 'assets/paket/'.$old_image->gambar_kat);
                }
                $new_image = $this->upload->data('file_name');
                $data = array(
                    'nama_kategori' => $nama_kategori,
                    'gambar_kat' => $new_image
                    
                );
                $this->db->set($data);
                $this->db->where('id_kategori', $id_kategori);
                $this->db->update('tb_paket_kategori');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Diubah</div>');
                redirect(base_url('Category'));

            } else {
                echo $this->upload->dispay_errors();
            }
        }
        $data = array (
			'nama_kategori' => $nama_kategori
		);

		$this->db->set($data);
		$this->db->where('id_kategori', $id_kategori);
		$this->db->update('tb_paket_kategori');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Diubah</div>');
        redirect(base_url('Category'));
    }

    public function Lokasi(){
        $data['title'] = 'Lokasi Destinasi';
        $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['lokasi'] = $this->db->get('tb_lokasi')->result_array();

		$this->load->view('rehol/template/header', $data);
        $this->load->view('rehol/template/sidebar');
        $this->load->view('rehol/lokasi');
        $this->load->view('rehol/template/footer');

	}

    public function edit_lokasi(){
        $id_lok = $this->input->post('id_lok');
        $nama_lokasi = $this->input->post('nama_lokasi');

        // cek jika ada gambar yang akan diupload
        $gambar_lok = $_FILES['gambar_lok']['name'];

        if ($gambar_lok) {
            $config['allowed_types'] = 'gif|jpg|jpeg|png|heif|hevc';
            $config['max_size']      = '15360';
            $config['upload_path'] = './assets/destination/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar_lok')) {
                $old_image = $this->db->get_where('tb_lokasi',['id_lok' => $id_lok])->row();
                if ($old_image != $old_image->gambar_lok) {
                    unlink(FCPATH . 'assets/destination/'.$old_image->gambar_lok);
                }
                $new_image = $this->upload->data('file_name');
                $data = array(
                    'nama_lokasi' => $nama_lokasi,
                    'gambar_lok' => $new_image
                    
                );
                $this->db->set($data);
                $this->db->where('id_lok', $id_lok);
                $this->db->update('tb_lokasi');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Diubah</div>');
                redirect(base_url('Category/lokasi'));

            } else {
                echo $this->upload->dispay_errors();
            }
        }
        $data = array (
			'nama_lokasi' => $nama_lokasi
		);

		$this->db->set($data);
		$this->db->where('id_lok', $id_lok);
		$this->db->update('tb_lokasi');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Diubah</div>');
        redirect(base_url('Category/lokasi'));
    }

}