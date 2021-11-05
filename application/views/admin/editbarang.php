<form action="" method="post" enctype="multipart/form-data">
	<div class="container" style="margin-top: 140px;">
		<div class="card">
			<div class="card-body">
				<div class="form-group row">

					<div class="col">
						<label for="kd_brg">Kode Barang</label>
						<input type="text" class="form-control" id="kd_brg" name="kd_brg" value="<?= $barang['kd_brg']; ?>" readonly>
					</div>

					<div class="col">
						<label for="nm_brg">Nama Barang</label>
						<input type="text" class="form-control" id="nm_brg" name="nm_brg" value="<?= $barang['nm_brg']; ?>">
					</div>

					<div class="col">
						<label class="mr-sm-2" for="satuan">Satuan</label>
						<select class="custom-select mr-sm-2" id="satuan" name="satuan" value="<?= $barang['satuan']; ?>" name="satuan">
							<?php foreach ($satuan as $sat) : ?>
								<?php if ($sat == $barang['satuan']) : ?>
									<option value="<?= $sat; ?>" selected><?= $sat; ?></option>
								<?php else : ?>
									<option value="<?= $sat; ?>"><?= $sat; ?></option>
								<?php endif; ?>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<div class="col">
						<label for="pcs">Jumlah Peaces</label>
						<input type="text" class="form-control" id="pcs" name="pcs" value="<?= $barang['pcs']; ?>">
					</div>

					<div class="col">
						<label for="harga">Harga</label>
						<input type="text" class="form-control" id="harga" name="harga" value="<?= $barang['harga']; ?>">
					</div>

					<div class="col">
						<label for="stok">Jumlah Stok</label>
						<input type="text" class="form-control" id="stok" name="stok" value="<?= $barang['stok']; ?>">
					</div>

					<div class="col">
						<label for="berat">Berat Barang</label>
						<input type="text" class="form-control" id="berat" name="berat" value="<?= $barang['berat']; ?>">
					</div>

				</div>

				<div class="form-group">
					<label for="gambar">Pilih Gambar</label>
					<input type="file" class="form-control-file" name="gambar">
				</div>

				<div class="row">
					<div class="col">
						<button class="btn btn-primary" name="ubah" type="submit">Ubah</button>
						<a href="<?= base_url('Home_admin') ?>" class="btn btn-danger">Kembali</a>
					</div>
				</div>

			</div>
		</div>
	</div>
</form>
