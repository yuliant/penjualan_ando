<?php
class Registrasi extends CI_Controller
{
  public function __construct()
  {
  	parent::__construct();
    $this->load->library('form_validation');
  }
  public function index()
  {
    $this->form_validation->set_rules('username','Username','required');
    $this->form_validation->set_rules('password_1','Password','required|matches[password_2]');
    $this->form_validation->set_rules('password_2','Password','required|matches[password_1]');
    if($this->form_validation->run()==FALSE){
    $data['judul'] = 'FORM REGISTRASI';
    $this->load->view('template/header_login',$data);
    $this->load->view('registrasi',$data);
  } else {
    $data = array(
      'username' => $this->input->post('username'),
      'password' => $this->input->post('password_1'),
      'nama_usaha' => $this->input->post('nama_usaha'),
      'nama' => $this->input->post('nama'),
      'alamat' => $this->input->post('alamat'),
      'no_telp' => $this->input->post('no_telp'),
      'no_npwp' => $this->input->post('no_npwp'),
      'role_id' => 2,
    );
    $this->db->insert('user',$data);
    redirect('auth/login');
  }
  }
}
