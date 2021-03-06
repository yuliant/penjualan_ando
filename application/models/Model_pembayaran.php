<?php
class Model_pembayaran extends CI_Model
{
	public function index()
	{
		date_default_timezone_set('Asia/Jakarta');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('telp');

		$no_pengiriman = $this->input->post('no_pengiriman');
		$ekspedisi = $this->input->post('ekspedisi');
		$paket_ekspedisi = $this->input->post('paket_ekspedisi');
		$berat_barang = $this->input->post('berat_barang');
		$total_bayar = $this->input->post('total_bayar');
		$catatan_pengiriman = $this->input->post('catatan_pengiriman');

		$invoice = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'telp' => $telp,
			'tgl_pesan' => date('Y-m-d H:i:s'),
			'batas_bayar' => date('Y-m-d H:i:s', mktime(
				date('H'),
				date('i'),
				date('s'),
				date('m') + 1,
				date('d'),
				date('Y')
			)),
			'no_pengiriman' => $no_pengiriman,
			'ekspedisi' => $ekspedisi,
			'paket_ekspedisi' => $paket_ekspedisi,
			'berat_barang' => $berat_barang,
			'total_bayar' => $total_bayar,
			'catatan_pengiriman' => $catatan_pengiriman
		);
		$this->db->insert('pembelian', $invoice);
		$id_order = $this->db->insert_id();

		foreach ($this->cart->contents() as $item) {
			$data = array(
				'id_order' => $id_order,
				'kd_brg' => $item['id'],
				'nm_brg' => $item['name'],
				'harga' => $item['price'],
				'jumlah' => $item['qty']
			);
			$this->db->insert('pesanan', $data);
		}
		return TRUE;
	}
	public function tampil_data()
	{
		$result = $this->db->get('pembelian');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return FALSE;
		}
	}

	public function ambil_id_order($id_order)
	{
		$result = $this->db->where('id_order', $id_order)->limit(1)->get('pembelian');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return false;
		}
	}
	public function ambil_id_pesanan($id_order)
	{
		$result = $this->db->where('id_order', $id_order)->get('pesanan');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}
	public function proses_edit_data($id_oder)
	{
		$data = [
			'status' => $this->input->post('status'),
		];
		$this->db->where('id_order', $this->input->post('id_order'));
		$this->db->update('pembelian', $data);
	}
}
