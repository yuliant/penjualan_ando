<?php
class Home_model extends CI_Model
{
public function produkbarang()
  {
    return $this->db->get('barang')->result_array();
  }
  public function cari_produk()
  {
    $cari_barang = $this->input->post('cari_barang', true);
    $this->db->like('nm_brg',$cari_barang);
    return $this->db->get('barang')->result_array();
  }
  public function getBarangByID($kd_brg)
    {
      return $this->db->get_where('barang', ['kd_brg' => $kd_brg])->row_array();
    }
  public function getUserByID($id_user)
    {
      return $this->db->get_where('user', ['id_user' => $id_user])->row_array();
    }

    public function detail_barang()
    {
      $nm_brg = $this->input->post('nm_brg');
      $satuan = $this->input->post('satuan');
      $pcs = $this->input->post('pcs');
      $harga = $this->input->post('harga');
      $stok = $this->input->post('stok');
    }
    public function find($id)
    {
      $result = $this->db->where('kd_brg', $id)
      ->limit(1)
      ->get('barang');
      if($result->num_rows() > 0){
        return $result->row();
      } else {
        return array();
      }
    }

    public function hapus_items($id)
    {
      $this->cart->where('id',$id);
    }

}
