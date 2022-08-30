<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rehol extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if($this->form_validation->run() == false) {
			$data['title'] = 'Login Rehol';
			$this->load->view('rehol/template/header_login', $data);
			$this->load->view('rehol/login');
			$this->load->view('rehol/template/footer_login');			
		} else{
			// validasi sukses
			$this->_login();	
		}
	}

	private function _login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('tb_admin', ['email' => $email])->row_array();

		if($user){
			if (password_verify($password, $user['password'])) {
				$data = [
					'email' => $user['email'],
					'akses' => $user['akses']
				];
				$this->session->set_userdata($data);
				redirect(base_url('admin/'));
				
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
				redirect('rehol');
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            redirect('rehol');
		}

	}


	public function add()
	{

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_admin.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		
		if ($this->form_validation->run() == false){
			$data['title'] = 'Registrasi Admin Rehol';
			$this->load->view('rehol/template/header_login', $data);
			$this->load->view('rehol/register');
			$this->load->view('rehol/template/footer_login');
		}else{
			$data = [
				'nama_admin' => htmlspecialchars( $this->input->post('nama', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'akses' => 1
			];

			$this->db->insert('tb_admin', $data);
			redirect('rehol');
		}
	}

	public function tambah()
	{

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_admin.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		
		if ($this->form_validation->run() == false){
			$data['title'] = 'Registrasi Admin Rehol';
			$this->load->view('rehol/template/header_login', $data);
			$this->load->view('rehol/register');
			$this->load->view('rehol/template/footer_login');
		}else{
			$data = [
				'nama_admin' => htmlspecialchars( $this->input->post('nama', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'akses' => 1
			];

			$this->db->insert('tb_admin', $data);
			redirect(base_url('admin/profil'));
		}
	}

	public function logout(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('akses');

		redirect(base_url('rehol'));
	}
}