<form>
	<div class="container-fluid">
		<div style="margin-top:130px;">
			<div class="container-fluid">
				<table class="table table-bordered table-striped table-hover">
					<tr align="center">
						<th>No</th>
						<th>Nama Produk</th>
						<th>Jumlah</th>
						<th>Harga</th>
						<th>Sub-Total</th>
						<th></th>
					</tr>
					<?php
					$no = 1;
					foreach ($this->cart->contents() as $items) : ?>
						<tr>
							<td align="center"><?= $no++ ?></td>
							<td><?= $items['name'] ?></td>
							<td align="center">
								<div class="container">
									<div class="row">
										<div class="col">
											<?php
											if ($items['qty'] == '1') {
												echo anchor('Home/hapus_keranjang/' . $items['rowid'], '<div class="btn text-white fas fa-minus satu" onclick="confirm yes" style="background-color: #000000;")></div>');
											} else {
												echo anchor('Home/kurangi/' . $items['id'], '<div class="btn text-white fas fa-minus satu" style="background-color: #000000;"></div>');
											}
											?>
										</div>
										<a class="col form-control" type="text">
											<?= $items['qty'] ?>
										</a>
										<div class="col">
											<?php echo anchor('Home/tambah_ke_keranjang_detail/' . $items['id'], '<div class="btn text-white fas fa-plus satu" style="background-color: #000000;"></div>'); ?>
							</td>
			</div>
		</div>
		<td align="right">Rp. <?= number_format($items['price'], 0, ',', '.') ?></td>
		<td align="right">Rp. <?= number_format($items['subtotal'], 0, ',', '.') ?></td>
		<td align="center"><a href="<?php echo base_url(); ?>Home/hapus_keranjang/<?php echo $items['rowid']; ?>" class="btn btn-danger fa fa-trash satu" aria-pressed="true" onclick="return confirm('Yakin Ingin Hapus Item <?= $items['name'] ?>?');"></a></td>
		</tr>
	<?php endforeach; ?>
	<tr>
		<td colspan="4" align="right"><b>Total</b></td>
		<td align="right">Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?></td>
		<td colspan="5" align="right"></td>
	</tr>
	</div>
	</div>
	</div>
	</table>
</form>
<footer>
	<div align="right">
		<a href="<?= base_url('Home/#produk') ?>" class="btn btn-success fa fa-shopping-cart satu"> Lanjutkan Belanja</a>
		<a href="<?= base_url('Home/pembayaran') ?>" class="btn fa fa-arrow-circle-right satu text-white" style="background-color: #000000;"> Pembayaran</a>
	</div>
</footer>
