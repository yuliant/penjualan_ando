<?php
class Home_modeladmin extends CI_Model
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
  public function addbarang()
  {
    $kd_brg = $this->input->post('kd_brg');
    $nm_brg = $this->input->post('nm_brg');
    $satuan = $this->input->post('satuan');
    $pcs = $this->input->post('pcs');
    $harga = $this->input->post('harga');
    $stok = $this->input->post('stok');
    $gambar = $_FILES['gambar']['name'];
    if($gambar = ''){}else {
      $config['upload_path'] = './produk/';
      $config['allowed_types'] = 'jpg|jpeg|png|gif';
      $this->load->library('upload',$config);
      if(!$this->upload->do_upload('gambar')){
        echo "Gambar Gagal diUpload!";
      } else {
        $gambar = $this->upload->data('file_name');
      }
    }
    $data = array(
      'kd_brg' => $kd_brg,
      'nm_brg' => $nm_brg,
      'satuan' => $satuan,
      'pcs' => $pcs,
      'harga' => $harga,
      'stok' => $stok,
      'gambar' => $gambar
     );
     $this->db->insert('barang',$data);
  }
  public function edit_barang()
  {
    $kd_brg = $this->input->post('kd_brg');
    $nm_brg = $this->input->post('nm_brg');
    $satuan = $this->input->post('satuan');
    $pcs = $this->input->post('pcs');
    $harga = $this->input->post('harga');
    $stok = $this->input->post('stok');
    $data = array(
      'kd_brg' => $kd_brg,
      'nm_brg' => $nm_brg,
      'satuan' => $satuan,
      'pcs' => $pcs,
      'harga' => $harga,
      'stok' => $stok,
     );
     $this->db->where('kd_brg',$this->input->post('kd_brg'));
     $this->db->update('barang',$data);
  }
  public function edit_user()
  {
    $id_user = $this->input->post('id_user');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $nama_usaha = $this->input->post('nama_usaha');
    $nama = $this->input->post('nama');
    $alamat = $this->input->post('alamat');
    $no_telp = $this->input->post('no_telp');
    $no_npwp = $this->input->post('no_npwp');
    $role_id = $this->input->post('role_id');
    $data = array(
      'id_user' => $id_user,
      'username' => $username,
      'password' => $password,
      'nama_usaha' => $nama_usaha,
      'nama' => $nama,
      'alamat' => $alamat,
      'no_telp' => $no_telp,
      'no_npwp' => $no_npwp,
      'role_id' => $role_id
     );
     $this->db->where('id_user',$this->input->post('id_user'));
     $this->db->update('user',$data);
  }

  public function hapus($kd_brg)
  {
    $this->db->where('kd_brg',$kd_brg);
    $this->db->delete('barang');
  }
  public function hapususer($id_user)
  {
    $this->db->where('id_user',$id_user);
    $this->db->delete('user');
  }
  public function getBarangByID($kd_brg)
    {
      return $this->db->get_where('barang', ['kd_brg' => $kd_brg])->row_array();
    }
  public function getUserByID($id_user)
    {
      return $this->db->get_where('user', ['id_user' => $id_user])->row_array();
    }

    public function user()
    {
      return $this->db->get('user')->result_array();
    }
    public function cari_user()
    {
      $cari_user = $this->input->post('cari_user', true);
      $this->db->like('nama',$cari_user);
      // $this->db->like('no_npwp',$cari_user);
      return $this->db->get('user')->result_array();
    }
}
