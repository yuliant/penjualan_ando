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
								<h4>Login</h4>
							</b></div>
						<div class="card-body">
							<div align="center" class="mb-4 text-danger"><b>
									<?= $this->session->flashdata('pesan') ?></b></div>
							<form action="<?= base_url('auth/login') ?>" method="post">
								<div class="form-group row">
									<label for="email_address" class="col-md-4 col-form-label text-md-right">Username</label>
									<div class="col-md-6">
										<input type="text" id="username" class="form-control" placeholder="Username" name="username" required autofocus>
									</div>
								</div>
								<?= form_error('username', '<div class="text-danger small">', '</div>'); ?>
								<div class="form-group row">
									<label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
									<div class="col-md-6">
										<input type="text" id="password" class="form-control" name="password" placeholder="Password" required>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-6 offset-md-4">
										<div class="checkbox">
											<label>
												<input type="checkbox" name="remember"> Remember Me
											</label>
										</div>
									</div>
								</div>
								<div class="col-md-6 offset-md-4">
									<button type="submit" class="btn text-white" style="background-color: #000000;">
										Login
									</button>
									<a href="#" class="btn btn-link">
										Lupa Password?
									</a>
									<a href="<?= base_url('registrasi') ?>" class="btn btn-link">
										Belum Punya Akun? Daftar?
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
			font-size: .9rem;
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
			font-family: Raleway, sans-serif;
		}

		.my-form {
			padding-top: 1.5rem;
			padding-bottom: 1.5rem;
		}

		.my-form .row {
			margin-left: 0;
			margin-right: 0;
		}

		.login-form {
			padding-top: 1.5rem;
			padding-bottom: 1.5rem;
		}

		.login-form .row {
			margin-left: 0;
			margin-right: 0;
		}
	</style>
</body>

</html>
