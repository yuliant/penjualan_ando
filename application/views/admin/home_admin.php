<meta http-equiv="refresh" content="5" >
<div class="container" style="margin-top: 140px;">
    <div class="text-center">
      <div class="container mb-3"><h4>Barang</h4></div>
        			<div class="row" id="tampil_data">
                    <table class="table table-bordered table-pill">
                      <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                        <th>Keterangan</th>
                      </tr>
                    <?php
                    $no=1;
                    foreach ($produk as $pro) : ?>
                      <tr>
                        <td align="center"><?= $no++?></td>
                        <td>
                          <img src="<?= base_url().'produk/'.$pro['gambar'] ?>" style="max-width: 3rem; max-height:3rem"
                          class="card-image-top" alt="Responsive image"></td>
                          <td><?php echo $pro['nm_brg']?></td>
                          <td><?php echo $pro['pcs']?> pcs/
                        <?php echo $pro['satuan']?></td>
                        <td><a class="badge-success badge-pill text-white">
                    Rp.
                        <?php echo number_format($pro['harga'],0,',','.')?>/
                        <?php echo $pro['satuan']?></a></td>
                      <td>
                        <?php if($pro['stok']>='10'){
                          echo '<a>'.$pro['stok'].'</a>';
                        } else if($pro['stok']>='5'){
                          echo '<a class="badge-warning badge-pill text-white">'.$pro['stok'].'</a>';
                        } else {
                          echo '<a class="badge-danger badge-pill text-white">'.$pro['stok'].'</a>';
                        }
                          ?>
                        </td>
                      <td>
                        <div class="row">
                      <div class="col">
                            <a href="<?php echo base_url(); ?>Home_admin/ubah/<?php echo $pro['kd_brg']; ?>" class="btn btn-primary fa fa-edit satu"></a>
                            <a href="<?php echo base_url(); ?>Home_admin/hapus/<?php echo $pro['kd_brg']; ?>" class="btn btn-danger fa fa-trash satu" aria-pressed="true" onclick="return confirm('Yakin Ingin Hapus Barang <?= $pro['nm_brg']?>?');"></a>
                          </div>
                        </div>
                      </td>
                      <td><?php if($pro['stok']>='10'){
                        echo 'Stok Barang OK';
                      } else if($pro['stok']>='5'){
                        echo '<a class="badge-warning badge-pill text-white">Stok anda tersisah '.$pro['stok'].' Silahkan melakukan isi ulang</a>';
                      } else {
                        echo '<a class="badge-danger badge-pill text-white">Stok anda tersisah '.$pro['stok'].' Silahkan melakukan isi ulang</a>';
                      }
                        ?></td>
                    </tr>
                  </div>
            <?php endforeach;?>
          </table>
          </div>
          </div>
