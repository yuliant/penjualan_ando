<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?php echo $judul ?></title>

	<!-- Bootstrap Core CSS -->
	<link href="<?php echo base_url('vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"') ?>">

	<!-- Custom Fonts -->
	<link href="<?php echo base_url('vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"') ?>">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet"') ?>">

	<!-- Custom CSS -->
	<link href="<?php echo base_url('css/stylish-portfolio.min.css" rel="stylesheet"') ?>">

</head>

<div class="row container" style="font-family: BM receipt;">
	<div class="col">
		PT Halimjaya Sakti</br>
		Ando Footwear</br>
		Jl. Raya Pabean No. 109, Kejapanan, Gempol, Kejapanan</br>
		67155 Pasuruan Jawa Timur, Indonesia</br>
		Telp. +62 343 851080</br>
		Fax. +62 343 852103</br>
		NPWP 01.743.760.9-057.000</br></br>
		No. Salesman : </br>
		No. Pelanggan : </br>
	</div>
	<div class="col mx-5" align="center" style="margin-top: 80px;">
		<b>NOTA PEMBELIAN</b></br>
		<div>No. Nota : <?= $pembayaran->id_order ?></div>
		</br>
		</br>
		</br>
		</br>
		</br>
		Jatuh Tempo : <?= $pembayaran->batas_bayar ?>
	</div>
	<div class="col">
		Tanggal : <?php $tgl = date('d-m-Y');
					echo $tgl; ?></br>
		Pembeli : <?= $pembayaran->nama ?>
		</br>
		<?= $pembayaran->alamat ?>
		</br>
		</br>
		Tgl Kirim : <?php $tgl = date('d-m-Y');
					echo $tgl; ?>
		<hr>
		Catatan Pengiriman : <br><?= $pembayaran->catatan_pengiriman ?>
	</div>
</div>
<table class="container">
	<tr class="container table table-hover mt-3" align="center">
		<th>Kode Barang</th>
		<th>Nama Barang</th>
		<th>Sat.</th>
		<th>Jumlah</th>
		<th>Harga Sat.</th>
		<th>Diskon</th>
		<th>Total</th>
	</tr>
	<?php
	$total = 0;
	foreach ($pesanan as $pesan) :
		$subtotal = $pesan->jumlah * $pesan->harga;
		$total += $subtotal;
	?>
		<tr class="table">
			<td align="center"><?= $pesan->kd_brg ?></td>
			<td align="center"><?= $pesan->nm_brg ?></td>
			<td align="center"><?= $pesan->satuan ?></td>
			<td align="center"><?= $pesan->jumlah ?></td>
			<td align="right">Rp. <?= number_format($pesan->harga, 0, ',', '.') ?>,-</td>
			<td align="right">Rp. 0,-</td>
			<td align="right">Rp. <?= number_format($subtotal, 0, ',', '.') ?>,-</td>
		</tr>
	<?php endforeach; ?>

	<tr class="table">
		<td colspan="6" align="right"> Total</td>
		<td align="right">Rp. <?= number_format($total, 0, ',', '.') ?>,-</td>
	</tr>
	<tr>
		<td colspan="6" align="right">Retur</td>
		<td align="right">Rp. 0,-</td>
	</tr>
	<p>
		<tr>
			<td colspan="6" align="right">Bayar</td>
			<td align="right">Rp. 0,-</td>
		</tr>
		<tr class="table">
			<td colspan="6" align="right"> Sisa</td>
			<td align="right">Rp. <?= number_format($total, 0, ',', '.') ?>,-</td>
		</tr>
	<div class="row">
		<div class="col">
			<td>Harga Sudah termasuk PPN 10%
				<br>
				<br>
				<br>
				<br>
				Tanggal : <?php $tgl = date('d-m-Y');
							echo $tgl; ?>
			</td>
		</div>
		<div class="col">
			<td>Salesman
				</br>
				</br>
				</br>
				Nama Sales
			</td>
		</div>
	</div>
</table>
<br>
<br>
<div class="row">
	<div class="col">
		<td>
			<b>Catatan: pembayaran ke kasir Max H+7 setelah fatur atau nota dicetak</b>
		</td>
	</div>
</div>
</div>
<script>
	window.print();
</script>
