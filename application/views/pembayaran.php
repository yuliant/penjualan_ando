<div class="container" style="margin-top:120px;">
	<div class="row">

		<!-- //alamat dll -->
		<div class="col-lg-4">
			<div class="card">
				<h5 class="card-header">
					<?php
					$grand_total = 0;
					$heavy_total = 0;
					if ($keranjang = $this->cart->contents()) {
						foreach ($keranjang as $item) {
							$grand_total = $grand_total + $item['subtotal'];
							$heavy_total = $heavy_total + ($item['qty'] * $item['heavy']);
						}
						echo "Konfirmasi alamat";
					?>
				</h5>
				<div class="card-body">
					<form method="post" action="<?php echo base_url() ?>Home/proses_pesanan">
						<h5 class="card-title">
							Input Alamat Pengiriman
						</h5>
						<p class="card-text">
						<div class="form-group">
							<label>Nama Lengkap/Perusahaan*</label>
							<input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" required></input>
						</div>
						<div class="form-group">
							<label>Nomor Telp*</label>
							<input type="text" name="telp" placeholder="Nomor Telp" class="form-control" required></input>
						</div>

						<div class="form-group">
							<label>Provinsi*</label>
							<select name="provinsi" id='provinsi' class='form-control select2' onchange="changeProvinsi(this.value)" required>
								<option value="">Pilih provinsi</option>
								<?php
								foreach ($provinsi as $prov) {
								?>
									<option value="<?= $prov['province_id'] ?>"><?= $prov['province'] ?></option>
								<?php }
								?>
							</select>
							<?php echo form_error('kota_pem', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group">
							<label>Kota*</label><br>
							<select name="kota" id='kota' class='form-control select2'>
								<option value="">Pilih Kota</option>
							</select>
							<?php echo form_error('kota_pem', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group">
							<label>Alamat*</label>
							<textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Alamat Lengkap" required></textarea>
						</div>

						<div class="form-group">
							<label>Catatan Pengiriman</label>
							<textarea class="form-control" name="catatan_pengiriman" id="catatan_pengiriman" rows="3" placeholder="Catatan Pengiriman"></textarea>
						</div>

						</p>
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

		<!-- //merchens -->
		<div class="col-lg-4">
			<div class="card">
				<h5 class="card-header">
					<?php
					$grand_total = 0;
					if ($keranjang = $this->cart->contents()) {
						foreach ($keranjang as $item) {
							$grand_total = $grand_total + $item['subtotal'];
						}
						echo "Pilih Ekspedisi";
					?>
				</h5>
				<div class="card-body">
					<p class="card-text">
					<div class="form-group">
						<label>Pilih kurir*</label>
						<select name="ekspedisi" id="kurir" class="kurir form-control w-100" onchange="pilihKurir(this.value)" required>
							<option value="" selected class="text-center">Pilih metode pengiriman</option>
							<?php
							//untuk versi pro
							// $kurir = array('jne', 'pos', 'tiki', 'rpx', 'pandu', 'wahana', 'sicepat', 'jnt', 'pahala', 'sap', 'jet', 'indah', 'dse', 'slis', 'first', 'ncs', 'star', 'ninja', 'lion', 'idl', 'rex', 'ide', 'sentral', 'anteraja');

							//untuk versi started
							$kurir = array('pos', 'tiki');

							foreach ($kurir as $rkurir) {
							?>
								<option value="<?= $rkurir; ?>"> <?= $rkurir; ?> </option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label>Pilih kurir*</label>
						<select name="jenisKurir" id="jKurir" class="kurir form-control w-100" onchange="pilihJenisKurir(this.value)">
							<option value="" selected class="text-center">Pilih Jenis Kurir</option>
						</select>
					</div>
					</p>
				<?php
					} else {
					}
				?>
				</div>
			</div>
		</div>

		<!-- //total -->
		<div class="col-lg-4">
			<div class="card">
				<h5 class="card-header">
					<?php
					$grand_total = 0;
					if ($keranjang = $this->cart->contents()) {
						foreach ($keranjang as $item) {
							$grand_total = $grand_total + $item['subtotal'];
						}
						// echo "Total Belanjaan Anda : Rp. " . number_format($grand_total, 0, ',', '.') . ",-";
						echo "Total harga";
					?>
				</h5>
				<div class="card-body">
					<p class="card-text">
					<div class="form-group">
						<label>Harga Belanjaan:</label>
						<input type="hidden" name="total" id="total" value="<?= $grand_total ?>" /><br>

						<!-- data hidden yang dikirim di controller -->
						<?php
						$no_pengiriman = mt_rand(100000000, 999999999);
						?>
						<input type="hidden" name="no_pengiriman" value="<?= $no_pengiriman ?>" />
						<input type="hidden" name="paket_ekspedisi" id="namapaket" />
						<input type="hidden" name="berat_barang" id="berat" value="<?= $heavy_total ?>" />
						<input type="hidden" name="total_bayar" id="totalsemua" />

						<strong id="total"><?= "Rp. " . $grand_total ?></strong>
					</div>
					<div class="form-group">
						<label>Harga Ongkir:</label><br>
						<strong id="kirim"></strong>
					</div>
					<div class="form-group">
						<label>Total Yang Dibayar:</label><br>
						<strong id="totalbayar"></strong>
					</div>

					<a href="<?= base_url('Home/detail_keranjang') ?>" class="btn btn-sm btn-danger">Kembali</a>
					<button type="submit" class="btn btn-sm btn-primary">Pesan</button>
					</form>
					</p>
				<?php
					} else {
					}
				?>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	function changeProvinsi(idProvinsi) {
		$.ajax({
			type: 'GET',
			url: "<?php echo base_url(); ?>/ongkir/cek_kabupaten",
			data: {
				prov_id: idProvinsi
			},
			cache: false,
			beforeSend: function() {
				$('#kota').html("<option value=''>Loading...</option>");
			},
			complete: function() {},
			success: function(data) {

				var result = JSON.parse(data);
				var res = result.rajaongkir.results;
				var kota = "";
				$.each(res, function(index) {
					kota += "<option value='" + res[index].city_id + "'>" + res[index].type + " " + res[index].city_name + "</option>";
				})

				$('#kota').html("<option value=''>Pilih Kota</option>" + kota);

			}
		});
	}

	function cekAlamat() {
		var prov = $('#provinsi').val();
		var kota = $('#kota').val();
		var response = false;

		if (prov && kota) {
			response = true;
		}
		return response;
	}

	function pilihKurir(kurir) {
		var prov = $('#provinsi').val();
		var kota = $('#kota').val();
		var berat = $('#berat').val();
		if (cekAlamat()) {
			$.ajax({
				type: 'post',
				url: "<?= base_url(); ?>/ongkir/cek_kurir",
				data: {
					origin: 409, //dikirim dari sidoarjo
					destination: kota, //ke kota ..
					weight: berat,
					courier: kurir
				},
				cache: false,
				beforeSend: function() {
					$('#jKurir').html("<option value=''>Loading...</option>");
				},
				complete: function() {},
				success: function(response) {

					var dt = JSON.parse(response);
					var res = dt.rajaongkir.results;
					var jKurir = '';
					console.log(res);
					if (res) {
						$.each(res, function(index) {
							datacosts = res[index].costs;
							if (datacosts.length != 0) {

								$.each(datacosts, function(i) {
									jKurir += "<option value='" + datacosts[i].service + "_" + datacosts[i].cost[0].value + "_" + datacosts[i].cost[0].etd + "'>" + datacosts[i].service + " Rp " + datacosts[i].cost[0].value + " - " + datacosts[i].cost[0].etd + "</option>";

								});
								$('#jKurir').html("<option value=''>Pilih Jenis Kurir</option>" + jKurir);

							} else {
								alert("Kurir tidak tersedia untuk daerah anda!");
								$('#jKurir').html("<option value=''>Pilih Kurir yang lain</option>");
							}
						});
					}

				}
			});
		}

	}
	$('#kurir').click(function() {
		if (!cekAlamat()) {
			alert("Silahkan isi provinsi, kota dan kecamatan anda terlebih dahulu!");
		}
	})

	function pilihJenisKurir(jenisKurir) {
		var data = jenisKurir.split("_");
		console.log(data);
		let kirim = parseInt(data[1]);
		let sub = parseInt($('#total').val());
		$('#kirim').html('Rp ' + kirim);
		let totalBayar = sub + kirim;

		$('#totalbayar').html('Rp ' + totalBayar);
		$('#totalsemua').val(totalBayar);
		$('#namapaket').val(data[0] + "(" + data[2] + ")");
	}
</script>
