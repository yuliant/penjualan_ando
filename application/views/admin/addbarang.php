<form action="" method="post" enctype="multipart/form-data">
	<div class="container" style="margin-top: 140px;">
		<div class="card">
			<div class="card-body">
				<div class="form-group row">
					<div class="col">
						<label for="kd_brg">Kode Barang</label>
						<input type="text" class="form-control" id="kd_brg" name="kd_brg" placeholder="Kode Barang" required>
					</div>
					<div class="col">
						<label for="nm_brg">Nama Barang</label>
						<input type="text" class="form-control" id="nm_brg" name="nm_brg" placeholder="Nama Barang" required>
					</div>
					<div class="col">
						<label class="mr-sm-2" for="satuan">Satuan</label>
						<select class="custom-select mr-sm-2" id="satuan" name="satuan" required>
							<option selected disabled>Choose...</option>
							<option value="Ball">Ball</option>
							<option value="Karton">Karton</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<div class="col">
						<label for="pcs">Jumlah Peaces</label>
						<input type="text" class="form-control" id="pcs" name="pcs" placeholder="Jumlah Peaces" required>
					</div>

					<div class="col">
						<label for="harga">Harga</label>
						<input type="text" class="form-control" id="harga" name="harga" placeholder="Harga" required>
					</div>

					<div class="col">
						<label for="stok">Jumlah Stok</label>
						<input type="text" class="form-control" id="stok" name="stok" placeholder="stok" required>
					</div>

					<div class="col">
						<label for="berat">Berat Barang (gram)</label>
						<input type="text" class="form-control" id="berat" name="berat" placeholder="berat" required>
					</div>
				</div>

				<div class="form-group">
					<label for="gambar">Pilih Gambar</label>
					<input type="file" class="form-control-file" name="gambar">
				</div>

				<div class="row">
					<div class="col">
						<button class="btn btn-primary" name="tambah" type="submit">Tambahkan</button>
						<a href="<?= base_url('Home_admin') ?>" class="btn btn-danger">Kembali</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
