<meta http-equiv="refresh" content="5" >
<div class="container" style="margin-top: 140px;">
    <div class="text-center">
      <div class="container mb-3"><h4>Kelolah User</h4></div>
        			<div class="row" id="tampil_data">
                    <table class="table table-bordered table-pill">
                      <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Nama Usaha</th>
                        <th>Nama Perusahaan</th>
                        <th>Alamat</th>
                        <th>No Telp</th>
                        <th>No NPWP</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    <?php
                    $no=1;
                    foreach ($user as $u) : ?>
                      <tr>
                        <td align="center"><?= $no++?></td>
                        <td><?php echo $u['username']?></td>
                          <td><?php echo $u['password']?></td>
                        <td><?php echo $u['nama_usaha']?></td>
                        <td><?php echo $u['nama']?></a></td>
                        <td><?php echo $u['alamat']?></a></td>
                        <td><?php echo $u['no_telp']?></a></td>
                        <td><?php echo $u['no_npwp']?></a></td>
                      <td><?php if($u['role_id']=='2'){
                          echo 'User';
                        } else {
                          echo 'Admin';
                        }
                          ?>
                        </td>
                      <td>
                        <div class="row">
                      <div class="col">
                            <a href="<?php echo base_url(); ?>Home_admin/ubahuser/<?php echo $u['id_user']; ?>" class="btn btn-primary fa fa-edit satu"></a>
                            <a href="<?php echo base_url(); ?>Home_admin/hapususer/<?php echo $u['id_user']; ?>" class="btn btn-danger fa fa-trash satu" aria-pressed="true" onclick="return confirm('Yakin Ingin Hapus Username <?= $u['username']?>?');"></a>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </div>
            <?php endforeach;?>
          </table>
          </div>
          </div>
