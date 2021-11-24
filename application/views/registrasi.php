<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<title><?php echo $judul ?></title>

<body class="mt-4">
	<main class="login-form">
		<div class="cotainer" style="margin-top: 70px;">
			<div class="row justify-content-center">
				<div class="col-md-5">
					<div class="card">
						<div class="card-header text-white" align="center" style="background-color: #000000;"><b>
								<h4>Form Registrasi</h4>
							</b></div>
						<div class="card-body">
							<?= $this->session->flashdata('pesan') ?>

							<form action="<?= base_url('registrasi') ?>" method="post">

								<div class="form-group row">
									<label for="email_address" class="col-md-4 col-form-label text-md-right">Username</label>
									<div class="col-md-6">
										<input type="text" id="username" class="form-control" placeholder="Username" name="username" required autofocus>
										<?= form_error('username', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
									</div>
								</div>

								<div class="form-group row">
									<label for="password_1" class="col-md-4 col-form-label text-md-right">Password</label>
									<div class="col-md-6">
										<input type="password" id="password_1" class="form-control" name="password_1" placeholder="Password" required>
										<?= form_error('password_1', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="password_2" class="col-md-4 col-form-label text-md-right">Konfirmasi Password</label>
									<div class="col-md-6">
										<input type="password" id="password_2" class="form-control" name="password_2" placeholder="Password" required>
										<?= form_error('password_2', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
									</div>
								</div>

								<div class="form-group row">
									<label for="nama_usaha" class="col-md-4 col-form-label text-md-right">Jenis Usaha</label>
									<div class="col-md-6">
										<input type="text" id="nama_usaha" class="form-control" name="nama_usaha" placeholder="Jenis Usaha" required>
									</div>
								</div>

								<div class="form-group row">
									<label for="nama" class="col-md-4 col-form-label text-md-right">Nama Perusahaan</label>
									<div class="col-md-6">
										<input type="text" id="nama" class="form-control" name="nama" placeholder="PT/CV/Cafe/dll" required>
									</div>
								</div>

								<div class="form-group row">
									<label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat Perusahaan</label>
									<div class="col-md-6">
										<input type="text" id="alamat" class="form-control" name="alamat" placeholder="Alamat Perusahaan" required>
									</div>
								</div>

								<div class="form-group row">
									<label for="no_telp" class="col-md-4 col-form-label text-md-right">No Telp/Hp</label>
									<div class="col-md-6">
										<input type="text" id="no_telp" class="form-control" name="no_telp" placeholder="Nomor Telp/Hp" required>
									</div>
								</div>

								<div class="form-group row">
									<label for="no_npwp" class="col-md-4 col-form-label text-md-right">No NPWP</label>
									<div class="col-md-6">
										<input type="text" id="no_npwp" class="form-control" name="no_npwp" placeholder="Nomor NPWP" required>
									</div>
								</div>

								<div class="col-md-6 offset-md-4">
									<button type="submit" class="btn text-white" style="background-color: #000000;">
										Daftar Akun
									</button>
									<a href="<?= base_url('auth/login') ?>" class="btn btn-link">
										Sudah Punya Akun? Login?
									</a>
								</div>

						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		</div>
	</main>

	<style>
		body {
			margin: 0;
			font-size: .9 rem;
			font-weight: 400;
			line-height: 1.6;
			color: #212529;
			text-align: left;
			background-color: #f5f8fa;
		}


		.navbar-brand,
		.nav-link,
		.my-form,
		.login-form {
			font-family: Raleway, sans - serif;
		}

		.my-form {
			padding-top: 1.5 rem;
			padding-bottom: 1.5 rem;
		}

		.my-form.row {
			margin-left: 0;
			margin-right: 0;
		}

		.login-form {
			padding-top: 1.5 rem;
			padding-bottom: 1.5 rem;
		}

		.login-form.row {
			margin-left: 0;
			margin-right: 0;
		}
	</style>

</body>

</html>
