<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_admin extends CI_Controller {
public function __construct()
{
	parent::__construct();
	$this->load->library('form_validation');
	$this->load->model('Home_modeladmin');

	if($this->session->userdata('role_id') != '1'
	){
	$this->session->set_flashdata('pesan','Anda Belum Login','ok');
	redirect('auth/login');
}
}
	public function index()
	{
		$data['judul'] = 'HOREKA ADMIN';
		$data['produk'] = $this->Home_modeladmin->produkbarang('');
		if($this->input->post('cari_barang')){
			$data['produk']=$this->Home_modeladmin->cari_produk();
		}
		$this->load->view('template_admin/header', $data);
		$this->load->view('admin/home_admin');
		$this->load->view('template_admin/footer');
	}
	public function addbarang()
	{
		$data['judul'] = 'ADD BARANG BARU';
	  $this->form_validation->set_rules('nm_brg', 'Nama Pasien', 'required');
		if( $this->form_validation->run() == FALSE) {
		$this->load->view('template_admin/header', $data);
		$this->load->view('admin/addbarang');
	} else {
		$this->Home_modeladmin->addbarang();
		redirect('Home_admin');
	}
}
public function ubah($kd_brg = '0')
{
	$data['judul'] = 'EDIT BARANG';
	$data['barang'] = $this->Home_modeladmin->getBarangByID($kd_brg);
	$data['satuan'] = ['ball','karton'];
	$this->form_validation->set_rules('nm_brg', 'Nama Barang', 'required');
	if( $this->form_validation->run() == FALSE) {
	$this->load->view('template_admin/header', $data);
	$this->load->view('admin/editbarang', $data);
} else {
	$this->Home_modeladmin->edit_barang();
	redirect('Home_admin');
}
}
public function ubahuser($id_user = '0')
{
	$data['judul'] = 'EDIT USER';
	$data['user'] = $this->Home_modeladmin->getUserByID($id_user);
	$data['role_id'] = ['1','2'];
	$this->form_validation->set_rules('username', 'Nama Barang', 'required');
	if( $this->form_validation->run() == FALSE) {
	$this->load->view('template_admin/header', $data);
	$this->load->view('admin/edituser', $data);
} else {
	$this->Home_modeladmin->edit_user();
	redirect('Home_admin/kelolahuser');
}
}
public function hapus($kd_brg)
{
	$this->Home_modeladmin->hapus($kd_brg);
	redirect('Home_admin');
}
public function hapususer($id_user)
{
	$this->Home_modeladmin->hapususer($id_user);
	redirect('Home_admin/kelolahuser');
}
public function Kelolahuser()
{
	$data['judul'] = 'EDIT HAK AKSES';
	$data['user'] = $this->Home_modeladmin->user('');
	if($this->input->post('cari_user')){
		$data['user']=$this->Home_modeladmin->cari_user();
	}
	$this->load->view('template_admin/header', $data);
	$this->load->view('admin/kelolahuser');
	$this->load->view('template_admin/footer');
}
}
