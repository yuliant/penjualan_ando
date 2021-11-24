<?php
class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_auth');
		$this->load->library('form_validation');
	}
	public function login()
	{
		$data['judul'] = 'FORM LOGIN';
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header_login');
			$this->load->view('form_login', $data);
		} else {
			$auth = $this->Model_auth->cek_login();
			if ($auth == FALSE) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Username dan Password Salah</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
				redirect('auth/login');
			} else {
				$this->session->set_userdata('id_user', $auth->id_user);
				$this->session->set_userdata('username', $auth->username);
				$this->session->set_userdata('role_id', $auth->role_id);

				switch ($auth->role_id) {
					case 1:
						redirect('Home_admin');
						break;
					case 2:
						redirect('Home');
						break;

					default:
						break;
				}
			}
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}
}
