<div class="container" style="margin-top:120px;">
<div class="row">
<div class="card">
  <h5 class="card-header">
    <?php
    $grand_total = 0;
    if($keranjang = $this->cart->contents())
    {
      foreach ($keranjang as $item)
      {
        $grand_total = $grand_total + $item['subtotal'];
      }
      echo "Total Belanjaan Anda : Rp. ".number_format($grand_total,0,',','.').",-";
    ?>
  </h5>
  <div class="card-body">
    <h5 class="card-title">
      Input Alamat Pengiriman
    </h5>
    <p class="card-text"><form method="post" action="<?php echo base_url()?>Home/proses_pesanan">
      <div class="form-group">
        <label>Nama Lengkap/Perusahaan</label>
        <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control"></input>
      </div>
      <div class="form-group">
        <label>Nomor Telp</label>
        <input type="text" name="telp" placeholder="Nomor Telp" class="form-control"></input>
      </div>
      <div class="form-group">
        <label>Alamat</label>
        <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Alamat Lengkap"></textarea>
      </div>
      <!-- <div class="form-group">
        <label for="inputState">Pembayaran</label>
        <select id="inputState" class="form-control">
          <option selected>Choose...</option>
          <option>BCA - xxxxxx</option>
          <option>MANDIRI - xxxxxx</option>
          <option>BRI - xxxxxx</option>
        </select>
      </div> -->
      <button type="submit" class="btn btn-sm btn-primary">Pesan</button>
    </form></p>
    <?php
    } else {
      echo "<a href='/penjualan_horeka/#produk' class='btn btn-success fa fa-shopping-cart text-white'><i>
      Maaf Keranjang Belanja Anda masih kosong</i>
      </a>";
    }
     ?>
  </div>
</div>
</div>
</div>
