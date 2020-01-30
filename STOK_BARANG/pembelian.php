<?php

if(isset($_SESSION['MEMBER'])){

$ar_judul = ['No','Supplier','Barang','Tanggal Beli','Jumlah Beli','Harga Beli','',''];
//ciptakan object dari class SupplierModel
$model = new PembelianModel();
$rs = $model->getAll();
//print_r($rs);exit;
?>
<h3>Daftar Pembelian</h3>
<br/>
<!-------------------awal modal---------------------->
<!-- Button trigger modal -->
<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
  Tambah
</button>
<br/>
<br/>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Pembelian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include_once 'form_pembelian.php'; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<!--------------akhir modal----------------->
<table class="table">
  <thead class="thead-dark">
    <tr>
    	<?php
    	foreach ($ar_judul as $judul) {
    	?>
      <th scope="col"><?= $judul ?></th>
      <?php } ?>
    </tr>
  </thead>
  <tbody>
  	<?php
  	$no = 1;
  	foreach ($rs as $beli) {
  	?>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= $beli['nama_splr'] ?></td>
      <td><?= $beli['nama'] ?></td>
      <td><?= $beli['tgl_beli'] ?></td>
      <td><?= $beli['jml_beli'] ?></td>
      <td><?= $beli['h_beli'] ?></td>
      <form method="POST" action="controllerPembelian.php">
       <td align="left">
      
         <?php
if($_SESSION['MEMBER'] ['role'] != 'karyawan') {


?>
  
        <button class="btn btn-danger btn-sm" name="proses" value="hapus" onclick="return confirm('Confirm')">Delete</button>
        <input type="hidden" name="idx" value="<?= $beli['id'] ?>"/>
        </form>
      </td>
      <?php
    }
      ?>

    </tr>
  <?php 
  $no++; 
  } ?>
  </tbody>
</table>

<?php

} //tutup if(isset(...)){}
else{
  include_once 'terlarang.php';
}
?>