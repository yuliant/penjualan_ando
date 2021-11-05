<div class="row container">
	<div class="col-sm-6" style="margin-top:130px;">
		<div class="container-fluid">
			<div class="card-body">
				<img class="card-img-top" style="width: 18rem;" src="<?= base_url() . 'produk/' . $barang['gambar'] ?>" alt="Card image cap">
			</div>
		</div>
	</div>
	<div class="col" style="width: 18rem; margin-top:130px;">
		<div class="card-body">
			<div class="col">
				<ul class="list-group list-group-flush">
					<li class="list-group-item">Nama Barang : <?= $barang['nm_brg']; ?></li>
					<li class="list-group-item">Jumlah/<?= $barang['satuan'] ?> : <?= $barang['pcs']; ?> Pcs</li>
					<li class="list-group-item">Harga/<?= $barang['satuan'] ?> : Rp. <?= number_format($barang['harga'], 0, ',', '.') ?></li>
					<li class="list-group-item">Berat Barang : <?= $barang['berat']; ?> gram</li>
					<li class="list-group-item">Jumlah Stok Tersedia : <?= $barang['stok']; ?> <?= $barang['satuan']; ?></li>
					<li class="list-group-item"></li>
				</ul>
				<div class="row">
					<div class="col">
						<a href="<?= base_url('Home/#produk') ?>" class="btn btn-danger fa fa-arrow-circle-left"> Kembali</a>

						<?php if ($barang['stok'] == '0') {
							echo '<div class="btn btn-dark fas fa-shopping-cart text-white disabled"> Beli</div>';
						} else {
							echo anchor('Home/tambah_ke_keranjang_detail/' . $barang['kd_brg'], '<div class="btn btn-success text-white fas fa-shopping-cart"> Beli</div>');
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
