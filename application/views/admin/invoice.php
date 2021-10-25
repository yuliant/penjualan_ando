<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css"></script>

<meta http-equiv="refresh" content="10" >
<div class="container-fluid" style="margin-top: 120px;">
<div class="container-fluid">
<div align="center" class="mb-3"><h3>invoice</h3></div>
<table class="table table-bordered table-hover">
  <tr align="center">
    <th>ID invoice</th>
    <th>Nama Pesanan</th>
    <th>Alamat Pengiriman</th>
    <th>Telp</th>
    <th>tanggal Pemesanan</th>
    <th>Tanggal Pengiriman</th>
    <th>Status</th>
    <th>Aksi</th>
  </tr>
  <?php foreach($pembayaran as $bayar ): ?>
    <tr>
      <td align="center"><?= $bayar->id_order ?></td>
      <td><?= $bayar->nama ?></td>
      <td><?= $bayar->alamat ?></td>
      <td><?= $bayar->telp ?></td>
      <td align="center"><?= $bayar->tgl_pesan ?></td>
      <td align="center"><?= $bayar->batas_bayar ?></td>
      <td align="center"><?php
      if($bayar->status =='1'){
        echo 'Sedang Proses';
      } else if($bayar->status =='2'){
        echo 'Sudah Dikirim';
      } else {
        echo 'Batal';
      }
      ?></td>
      <td>
        <div class="row">
        <div class="col" align="center">
          <?php echo anchor('Invoice/detail/'.$bayar->id_order,'<div class="btn btn-sm btn-success fas fa-eye"></div>')?>
      <!-- </div> -->
        <!-- <div class="col" align="center"> -->
          <?php echo anchor('Invoice/cetak/'.$bayar->id_order,'<div class="btn btn-sm btn-danger fa fa-print mx-1"> </div>')?>
      <!-- </div>
      <div class="col" align="center"> -->
      <a class="btn btn-sm btn-primary fa fa-check" data-toggle="modal" data-target="#modalkonfirm<?= $bayar->id_order;?>"> </a>
        <!-- <?php echo('<div class="btn btn-sm btn-primary fa fa-check" data-toggle="modal" data-target="#modalkonfirm<?= $bayar->id_order;?>"> </div>')?> -->
        </div>
        </div>
      </td>
    </tr>
<?php endforeach; ?>
</table>
</div>
</div>

<!-- Modal Update-->
<?php $no = 0;
foreach ($pembayaran as $bayar): $no++;?>
<div class="modal fade" id="modalkonfirm<?= $bayar->id_order;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open_multipart('Invoice/proses_edit_data');?>
        <input type="hidden" name="id_order" value="<?= $bayar->id_order;?>">
        <!-- <div class="row"> -->
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?= $bayar->nama;?>" readonly>
        <!-- </div> -->
          <label class="control-label" for="status">Konfirmasi</label>
          <select name="status" class="form-control">
            <option selected disabled>pilih...</option>
            <option value="1">Sedang Diproses</option>
            <option value="2">Sudah Dikirim</option>
            <option value="3">Batal</option>
          </select>
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        <?php echo form_close()?>
      </div>
    </div>
  </div>
</div>
<?php endforeach;?>
