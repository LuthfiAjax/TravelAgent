<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contes extends CI_Controller {

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

        // convert text pinddah line
		$text = $this->input->post('deskripsi');
        $deskripsi = nl2br($text);
		
		$kapasitas_mesin = $this->input->post('kapasitas_mesin');
		$harga = $this->input->post('harga');

		$data = array(
            'nama_mobil' => $nama_mobil,
            'ket_mobil' => $deskripsi,
            'kapasitas' => $kapasitas_orang,
            'cc' => $kapasitas_mesin,
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
			$config['allowed_types'] = 'gif|jpg|jpeg|png|heif|hevc';
			$config['max_size']      = '15360';
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