<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tampilan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
		if (!$this->session->userdata('email')){
			redirect(base_url(''));
		}
    }

    public function users(){
        $data['title'] = 'Pendataan Pembeli';
        $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['pelanggan'] = $this->db->get('tb_user')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('nomorhp', 'Nomor HP', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('jumlah', 'jumlah', 'required|trim');
		$this->form_validation->set_rules('biaya', 'Biaya', 'required|trim');

        if ($this->form_validation->run() == false){
            $this->load->view('rehol/template/header', $data);
            $this->load->view('rehol/template/sidebar');
            $this->load->view('rehol/users');
            $this->load->view('rehol/template/footer');

        }else{
            $nama = $this->input->post('nama');
            $nomorhp = $this->input->post('nomorhp');
            $email = $this->input->post('email');
            $jumlah = $this->input->post('jumlah');
            $biaya = $this->input->post('biaya');

            $data = array (
                'nama' => $nama,
                'nomorhp' => $nomorhp,
                'email' => $email,
                'jumlah' => $jumlah,
                'biaya' => $biaya
            );
            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
			redirect(base_url('tampilan/users'));

        }
    }

    public function testimoni(){
        $data['title'] = 'Testimoni Pembeli';
        $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['testimoni'] = $this->db->get('tb_testimoni')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('profesi', 'Profesi', 'required|trim');
		$this->form_validation->set_rules('pesan', 'Pesan', 'required|trim');
		$this->form_validation->set_rules('medsos', 'Medsos', 'required|trim');
		$this->form_validation->set_rules('akun', 'Akun', 'required|trim');
        
        if ($this->form_validation->run() == false){
            $this->load->view('rehol/template/header', $data);
            $this->load->view('rehol/template/sidebar');
            $this->load->view('rehol/testimoni');
            $this->load->view('rehol/template/footer');
        }else{
            $nama = $this->input->post('nama');
            $Profesi = $this->input->post('profesi');
            $pesan = $this->input->post('pesan');
            $medsos = $this->input->post('medsos');
            $akun = $this->input->post('akun');
            $gambar_t = $_FILES['gambar_t'];

            if (!$gambar_t){
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wajib ada foto/div>');
                redirect(base_url('tampilan/testimoni'));
            }else{
                $config['allowed_types'] = 'gif|jpg|png|webp';
                $config['max_size']      = '5120';
                $config['upload_path'] = './assets/testimoni/';

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('gambar_t')){
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Patikan Format Gambar Benar</div>');
                    redirect(base_url('tampilan/testimoni'));
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
			redirect(base_url('tampilan/testimoni'));
        }
    }

    public function aktif($t){

		$data = array(
            'status' => 'Aktif' 
		);

		$this->db->set($data);
		$this->db->where('id_testimoni', $t);
		$this->db->update('tb_testimoni');

		redirect(base_url('tampilan/testimoni'));
	}

    public function nonAktif($t){

		$data = array(
            'status' => 'Non-Aktif' 
		);

		$this->db->set($data);
		$this->db->where('id_testimoni', $t);
		$this->db->update('tb_testimoni');

		redirect(base_url('tampilan/testimoni'));
	}

    public function hapusTesti($t){
		$_id = $this->db->get_where('tb_testimoni',['id_testimoni' => $t])->row();
		$query = $this->db->delete('tb_testimoni', ['id_testimoni' => $t]);
		if($query){
			unlink(FCPATH . 'assets/testimoni/'.$_id->gambar_t);
		}
		redirect(base_url('tampilan/testimoni'));

	}

    public function hapususer($p){
        
		$query = $this->db->delete('tb_user', ['id_user' => $p]);
		if($query){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
            redirect(base_url('tampilan/users'));
		}else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal Dihapus </div>');
            redirect(base_url('tampilan/users'));
        }
        

	}

    public function pesan(){

        $data = [
            'nama' => htmlspecialchars( $this->input->post('nama', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'subject' => htmlspecialchars($this->input->post('subject', true)),
            'pesan' => htmlspecialchars($this->input->post('Message', true))
        ];

        $this->db->insert('tb_pesan', $data);
        redirect(base_url('#contact'));

    }


}