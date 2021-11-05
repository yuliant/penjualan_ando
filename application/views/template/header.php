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

	<!-- popover-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<!-- Custom Fonts -->
	<link href="<?php echo base_url('vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"') ?>">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet"') ?>">

	<!-- Custom CSS -->
	<link href="<?php echo base_url('css/stylish-portfolio.min.css" rel="stylesheet"') ?>">

</head>

<nav class="navbar navbar-light fixed-top" style="background-color: #000000;">

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
					<a class="js-scroll-trigger text-white">
						<?php if ($this->session->userdata('username')) { ?>
							<?= $this->session->userdata('username') ?>
							<a class="ml-2"><?= anchor('auth/logout', 'Logout') ?></a>
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
			<input class="container-fluid form-control satu btn-outline-light" placeholder="Masukkan Nama Barang yang ingin dicari" name="cari_barang">
			<button class="btn btn-outline-light my-2 my-sm-0 center fa fa-search" type="submit"></button>
		</div>
		<div class="row">
			<div class="col">
				<div class="col">
					<!-- <a href="<?= base_url('login'); ?>"><i class="fa fa-user p-3"></i></a> -->
					<?php $keranjang = $this->cart->total_items() ?>
					<div class="row container">
						<?php if ($keranjang == '0') {
							echo '<span class="notif badge-pill badge-light dua" style="background-color: #000000;"></span>';
						} else {
							echo '<span class="notif badge-pill badge-light dua">' . anchor('Home/detail_keranjang', $keranjang) . '</span>';
						}
						?>
						<div class="tas fas fa-shopping-cart text-white">
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</form>
</nav>
<style type="text/css">
	.satu {
		font-size: 12px;
	}

	.dua {
		font-size: 10px;
	}
</style>

<script>
	$(document).ready(function() {
		$('[data-toggle="popover"]').popover();
	});
</script>
<style>
	.notif {
		position: relative;
		top: 1px;
		left: 10px;
	}

	.tas {
		position: relative;
		top: -5px;
		left: -1px;
	}
</style>
