<form action="" method="post">
  <div class="container" style="margin-top: 120px;">
  <div class="card">
  <div class="card-body">
  <div class="form-group row">
    <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $user['id_user'];?>">
  <div class="col">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'];?>">
  </div>
  <div class="col">
    <label for="password">Password</label>
    <input type="text" class="form-control" id="password" name="password" value="<?= $user['password'];?>">
  </div>
  <div class="col">
    <label for="nama_usaha">Jenis Usaha</label>
    <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" value="<?= $user['nama_usaha'];?>">
  </div>
  </div>
  <div class="form-group row">
  <div class="col">
    <label for="nama">Nama Perusahaan</label>
    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama'];?>">
  </div>
  <div class="col">
    <label for="alamat">Alamat</label>
    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $user['alamat'];?>">
  </div>
  </div>
  <div class="form-group row">
  <div class="col">
    <label for="no_telp">No Telp</label>
    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $user['no_telp'];?>">
  </div>
  <div class="col">
    <label for="no_npwp">No NPWP</label>
    <input type="text" class="form-control" id="no_npwp" name="no_npwp" value="<?= $user['no_npwp'];?>">
  </div>
  </div>
  <div class="form-group row">
  <div class="col">
    <label class="mr-sm-2" for="role_id">Jenis Hak Akses</label>
      <select class="custom-select mr-sm-2" id="role_id" name="role_id" value="<?= $user['role_id'];?>">
        <?php foreach ($role_id as $sat ): ?>
          <?php if($sat == $user['role_id']):?>
          <option value="<?= $sat; ?>" selected><?= $sat;?></option>
        <?php else : ?>
          <option value="<?= $sat;?>"><?= $sat;?></option>
        <?php endif; ?>
      <?php endforeach; ?>
      </select>
    </div>
    </div>
  <div class="row">
  <div class="col">
      <button class="btn btn-primary" name="ubah" type="submit">Ubah</button>
      <a href="<?= base_url('Home_admin/kelolahuser')?>" class="btn btn-danger">Kembali</a>
  </div>
  </div>
  </div>
  </div>
  </div>
</form>
