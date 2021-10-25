<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
public function __construct()
{
	parent::__construct();
	$this->load->model('Home_model');
	$this->load->model('Model_pembayaran');
	$this->load->library('form_validation');
	$this->load->library('cart');
}
	public function index()
	{
		$data['judul'] = 'HOREKA';
		$data['produk'] = $this->Home_model->produkbarang('');
		if($this->input->post('cari_barang')){
			$data['produk']=$this->Home_model->cari_produk();
		}
		$this->load->view('template/header', $data);
		$this->load->view('home');
	}
	public function detailbarang($kd_brg = '0')
	{
		$data['judul'] = 'DETAIL BARANG';
		$data['barang'] = $this->Home_model->getBarangByID($kd_brg);
		$data['satuan'] = ['ball','karton'];
		$this->form_validation->set_rules('nm_brg', 'Nama Barang', 'required');
		if( $this->form_validation->run() == FALSE) {
		$this->load->view('template/header', $data);
		$this->load->view('detailbarang', $data);
	} else {
		$this->Home_model->detail_barang();
	}
	}
	public function tambah_ke_keranjang($kd_brg)
	{
		if($this->session->userdata('role_id') != '2'){
			$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" align="center" role="alert">
	  Anda Belum Login
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>','</div>');
			redirect('auth/login');
	  }
	{
		$produk = $this->Home_model->find($kd_brg);
		$data = array(
		        'id'  => $produk->kd_brg,
		        'qty'     => 1,
		        'price'   => $produk->harga,
		        'name'    => $produk->nm_brg,
		        'option'    => array('satuan' => $produk->satuan)
		);

		$this->cart->insert($data);
		redirect('#produk');
	}
	}
	public function tambah_ke_keranjang_detail($kd_brg)
	{
		if($this->session->userdata('role_id') != '2'
		){
			$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" align="center" role="alert">
	  Anda Belum Login
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>'
	,'</div>');
			redirect('auth/login');
	  }
	{
		$produk = $this->Home_model->find($kd_brg);
		$data = array(
		        'id'  => $produk->kd_brg,
		        'qty'     => 1,
		        'price'   => $produk->harga,
		        'name'    => $produk->nm_brg,
						'option'    => array('satuan' => $produk->satuan)
		);

		$this->cart->insert($data);
		redirect('Home/detailbarang/'.$this->uri->segment(3));
	}
	}
	public function tambah_ke_keranjang1($kd_brg)
	{
		if($this->session->userdata('role_id') != '1'
		){
		$this->session->set_flashdata('pesan','Anda Belum Login','ok');
		redirect('auth/login');
	}
	{
		$produk = $this->Home_model->find($kd_brg);
		$data = array(
		        'id'  => $produk->kd_brg,
		        'qty'     => 1,
		        'price'   => $produk->harga,
		        'name'    => $produk->nm_brg,
						'option'    => array('satuan' => $produk->satuan)
		);

		$this->cart->insert($data);
		redirect('Home/detail_keranjang/'.$this->uri->segment(3));
	}
	}
	public function kurangi($kd_brg)
	{
		$produk = $this->Home_model->find($kd_brg);
		$data = array(
		        'id'  => $produk->kd_brg,
		        'qty'     => -1,
		        'price'   => $produk->harga,
		        'name'    => $produk->nm_brg,
						'option'    => array('satuan' => $produk->satuan)
		);

		$this->cart->insert($data);
		redirect('Home/detail_keranjang/'.$this->uri->segment(3));
	}
	public function detail_keranjang()
	{
	$data['judul'] = 'KERANJANG';
	$this->load->view('template/header', $data);
	$this->load->view('keranjang');
	}
		public function hapus_keranjang($rowid)
		{
			$data = array(
							'rowid'  => $rowid,
							'qty'     => 0
						);
			$this->cart->update($data);
			redirect('Home/detail_keranjang/'.$this->uri->segment(3));
	}
	public function pembayaran()
	{
		$data['judul'] = 'PEMBAYARAN';
		$this->load->view('template/header', $data);
		$this->load->view('pembayaran');
	}
	public function proses_pesanan()
	{
		$is_processed = $this->Model_pembayaran->index();
		if($is_processed){
		$this->cart->destroy();
		$data['judul'] = 'PROSES PESANAN';
		$this->load->view('template/header', $data);
		$this->load->view('proses_pesanan');
	} else {
		echo "Maaf, Pesanan anda gagal di proses!!";
	}
	}
}
