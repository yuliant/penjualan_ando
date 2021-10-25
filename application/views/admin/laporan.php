<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $judul?></title>

  <!-- Bootstrap Core CSS -->
  <link href="<?php echo base_url('vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"')?>">

  <!-- Custom Fonts -->
  <link href="<?php echo base_url('vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"')?>">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet"')?>">

  <!-- Custom CSS -->
  <link href="<?php echo base_url('css/stylish-portfolio.min.css" rel="stylesheet"')?>">

<div class="container-fluid">
<div class="container-fluid">
<div align="center" class="mb-3"><h2>LAPORAN</h2></div>
<table class="table table-bordered table-hover">
  <tr align="center">
    <th>ID invoice</th>
    <th>Nama Pemesan</th>
    <th>Alamat Pengiriman</th>
    <th>Telp</th>
    <th>Tanggal Pemesanan</th>
    <th>Tanggal Pengiriman</th>
    <th>Status</th>
  </tr>
  <?php foreach($pembayaran as $bayar ): ?>
    <tr>
      <td align="center"><?= $bayar->id_order ?></td>
      <td><?= $bayar->nama ?></td>
      <td><?= $bayar->alamat ?></td>
      <td><?= $bayar->telp ?></td>
      <td align="center"><?= $bayar->tgl_pesan ?></td>
      <td align="center"><?= $bayar->batas_bayar ?></td>
      <td align="center"><?php
      if($bayar->status =='1'){
        echo 'Sedang Proses';
      } else if($bayar->status =='2'){
        echo 'Sudah Dikirim';
      } else {
        echo 'Batal';
      }
      ?></td>
    </tr>
<?php endforeach; ?>
</table>
</div>
</div>
<script>
window.print();
</script>
