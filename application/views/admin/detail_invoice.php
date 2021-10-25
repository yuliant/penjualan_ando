<div class="container" style="margin-top: 140px;">
<div class="container">
Detail Pesanan
<div class="btn btn-sm btn-success">
    No. Invoice : <?= $pembayaran->id_order?>
</div>
</div>
</div>
  <table class="table table-bordered table-hover mt-3">
    <tr align="center">
      <th>ID Barang</th>
      <th>Nama Produk</th>
      <th>Jumlah Pesanan</th>
      <th>Harga Satuan</th>
      <th>Sub-Total</th>
    </tr>
    <?php
    $total = 0;
    foreach ($pesanan as $pesan) :
      $subtotal = $pesan->jumlah * $pesan->harga;
      $total += $subtotal;
      ?>
      <tr>
        <td align="center"><?= $pesan->kd_brg?></td>
        <td align="center"><?= $pesan->nm_brg?></td>
        <td align="center"><?= $pesan->jumlah?></td>
        <td align="right">Rp. <?= number_format($pesan->harga,0,',','.')?>,-</td>
        <td align="right">Rp. <?= number_format($subtotal,0,',','.')?>,-</td>
      </tr>
    <?php endforeach; ?>
    <tr>
      <td colspan="4" align="right"> Total</td>
      <td align="right">Rp. <?= number_format($total,0,',','.')?>,-</td>
    </tr>
  </table>
</div>
<div align="right">
<a href="<?= base_url('invoice')?>" class="btn btn-danger fa fa-arrow-circle-left"> Kembali</a>
</div>
