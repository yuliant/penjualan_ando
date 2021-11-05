<meta http-equiv="refresh" content="10">

<body id="page-top">
	<!-- Produk -->
	<section class="content-section bg-white" id="produk">
		<div class="container text-center">
			<div class="row">
				<section class="bgwhite">
					<div class="row" id="tampil_data">
						<?php foreach ($produk as $pro) : ?>
							<div class="container-right card bg-white mx-3 my-3" style="max-width: 12rem;">
								<a href="<?php echo base_url(); ?>Home/detailbarang/<?php echo $pro['kd_brg']; ?>">
									<img src="<?= base_url() . 'produk/' . $pro['gambar'] ?>" class="card-img-top"></a>
								<div align="center" class="ml-2 my-2">Detail Produk :
									</br>
									<?php echo $pro['nm_brg'] ?>
									</br>
									<?php echo $pro['pcs'] ?> pcs/
									<?php echo $pro['satuan'] ?>
									</br>
									<a class="badge-success badge-pill text-white">
										Rp.
										<?php echo number_format($pro['harga'], 0, ',', '.') ?>/
										<?php echo $pro['satuan'] ?></a>
									</br>
									Stok : <?php echo $pro['stok'] ?>
								</div>
								<div class="row mb-2">
									<div class="col">
										<?php if ($pro['stok'] == '0') {
											echo '<div class="btn btn-dark text-white fas fa-shopping-cart disabled"> Beli</div>';
										} else {
											echo anchor('Home/tambah_ke_keranjang/' . $pro['kd_brg'], '<div class="btn text-white fas fa-shopping-cart" style="background-color: #000000;"> Beli</div>');
										}
										?>
										<a class="btn btn-success fas" href="<?php echo base_url(); ?>Home/detailbarang/<?php echo $pro['kd_brg']; ?>"> Detail</a>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<footer class="footer text-center">
		<div class="content-section-heading text-dark mb-4">
			Profil perusahaan
		</div>
		<div class="container">
			<ul class="list-inline mb-5">
				<li class="list-inline-item">
					<a class="social-link rounded-circle text-white mr-3" style="background-color: #000000;" href="#!">
						<i class="icon-social-facebook"></i>
					</a>
				</li>
				<li class="list-inline-item">
					<a class="social-link rounded-circle text-white mr-3" style="background-color: #000000;" href="#!">
						<i class="icon-social-instagram"></i>
					</a>
				</li>
				<li class="list-inline-item">
					<a class="social-link rounded-circle text-white" style="background-color: #000000;" href="#!">
						<i class="fab fa-whatsapp"></i>
					</a>
				</li>
			</ul>
			<p class="text-muted small mb-0">Copyright &copy; <?= "PT Halimjaya Sakti"; ?> <?= date('Y') ?></p>
		</div>
	</footer>

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Bootstrap core JavaScript -->
	<script src="<?php echo base_url('vendor/jquery/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

	<!-- Plugin JavaScript -->
	<script src="<?php echo base_url('vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

	<!-- Custom scripts for this template -->
	<script src="<?php echo base_url('js/stylish-portfolio.min.js') ?>"></script>

</body>

</html>
