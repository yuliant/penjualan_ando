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

<nav class="navbar navbar-light fixed-top" style="background-color: #000000;">
	<!-- <nav class="navbar navbar-light fixed-top" style="background-color: transparent;"> -->

	<form action="" method="post" class="container">
		<div align="left" style="color: white">
			<tr><a class="satu">
					Ikuti Kami di</a>
				<td>
					<a class="fab fa-facebook" style="color: white" href="#page-top"></a>
				</td>
				<td>
					<a class="fab fa-instagram p-1" style="color: white" href="#produk"></a>
				</td>
				<td>
					<a class="fab fa-whatsapp" style="color: white" href="#produk"></a>
				</td>

			</tr>
		</div>
		<div align="right" class="satu">
			<tr>
				<td>
					<a class="js-scroll-trigger text-white dua">
						<?php if ($this->session->userdata('username')) { ?>
							<?= $this->session->userdata('username') ?>
							<a class="ml-2"><?= anchor('auth/logout', ' Logout') ?></a>
						<?php } else { ?>
							<?= anchor('auth/login', 'Login/Daftar'); ?>
						<?php } ?>
					</a>
				</td>
			</tr>
		</div>
	</form>

	<form action="" method="post" class="container-fluid" autocomplete="off">
		<a href="<?= base_url('') ?>"><img src="<?= base_url('img/ando.jpg') ?>" height="50"></a>
		<div class="col input-group">
			<input class="container-fluid form-control btn-outline-light satu" placeholder="Masukkan Nama Barang yang ingin dicari" name="cari_barang">
			<button class="btn btn-outline-light my-2 my-sm-0 center fa fa-search" type="submit"></button>
		</div>
	</form>

	<form action="" method="post" class="col-md-5 container">
		<tr>
			<td>
				<div class="fa fa-home text-white">
					<a class="js-scroll-trigger text-light dua" href="<?= base_url('Home_admin') ?>">Home</a>
				</div>
			</td>
			<td>
				<div class="fa fa-plus-square text-white">
					<a class="js-scroll-trigger text-light dua" href="<?= base_url('Home_admin/addbarang') ?>">Add Barang</a>
				</div>
			</td>
			<td>
				<div class="fa fa-file text-white">
					<a class="js-scroll-trigger text-light dua" href="<?= base_url('invoice') ?>">Invoice</a>
				</div>
			</td>
			<td>
				<div class="fa fa-user text-white">
					<a class="js-scroll-trigger text-light dua" href="<?= base_url('Home_admin/kelolahuser') ?>">Hak Akses</a>
				</div>
			</td>
			<td>
				<div class="fa fa-file text-white">
					<a class="js-scroll-trigger text-light dua" href="<?= base_url('laporan') ?>">Cetak Laporan</a>
				</div>
			</td>
		</tr>

	</form>
</nav>

<body id="page-top">

	<style type="text/css">
		.satu {
			font-size: 12px;
		}
	</style>
