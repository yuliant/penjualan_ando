<?php

class Invoice extends CI_Controller
{
  public function __construct()
  {
  	parent::__construct();
  	$this->load->model('Model_pembayaran');

		if($this->session->userdata('role_id') != '1'
		){
		$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" align="center" role="alert">
  <strong>Holy guacamole!</strong> Anda Belum Login
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>'
,'</div>');
		redirect('auth/login');
  }
  }
  public function index()
  {
    $data['judul'] = 'HALAMAN PESANAN';
    $data['pembayaran'] = $this->Model_pembayaran->tampil_data();
    $this->load->view('template_admin/header',$data);
    $this->load->view('admin/invoice',$data);
    $this->load->view('template_admin/footer');
  }
  public function detail($id_order)
  {
    $data['judul'] = 'DETAIL INVOICE';
    $data['pembayaran'] = $this->Model_pembayaran->ambil_id_order($id_order);
    $data['pesanan'] = $this->Model_pembayaran->ambil_id_pesanan($id_order);
    $this->load->view('template_admin/header',$data);
    $this->load->view('admin/detail_invoice',$data);
    $this->load->view('template_admin/footer');
  }
  public function cetak($id_order)
  {
    $data['judul'] = 'DETAIL INVOICE';
    $data['pembayaran'] = $this->Model_pembayaran->ambil_id_order($id_order);
    $data['pesanan'] = $this->Model_pembayaran->ambil_id_pesanan($id_order);
    $this->load->view('admin/cetak',$data);
  }
  public function proses_edit_data()
  {
  $this->Model_pembayaran->proses_edit_data($id_order);
  redirect('Invoice');
}
}
