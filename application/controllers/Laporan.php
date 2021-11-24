<?php

class Laporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_pembayaran');

		if (
			$this->session->userdata('role_id') != '1'
		) {
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-warning alert-dismissible fade show" align="center" role="alert">Anda Belum Login
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>',
				'</div>'
			);
			redirect('auth/login');
		}
	}
	public function index()
	{
		$data['judul'] = 'HALAMAN PESANAN';
		$data['pembayaran'] = $this->Model_pembayaran->tampil_data();
		$this->load->view('admin/laporan', $data);
	}
}
