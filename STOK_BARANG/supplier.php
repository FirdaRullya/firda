<?php
$isset = $_SESSION['MEMBER'];
if(isset($sesi) && $sesi ['role'] != 'karyawan'){

$ar_judul = ['No','Nama','Alamat','HP','',''];
//ciptakan object dari class SupplierModel
$model = new SupplierModel();
$rs = $model->getAll();
//print_r($rs);exit;
?>
<h3>Daftar Supplier</h3>
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
        <h5 class="modal-title" id="exampleModalLabel">Form Supplier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include_once 'form_supplier.php'; ?>
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
  	foreach ($rs as $sup) {
  	?>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= $sup['nama_splr'] ?></td>
      <td><?= $sup['alamat_splr'] ?></td>
      <td><?= $sup['tlp_splr'] ?></td>
      <td align="right">
        
        <a class="btn btn-warning btn-sm" href="index.php?hal=form_supplier&idedit=<?= $sup['id'] ?>">Ubah</a>
        </td>
        <td align="left">
        <form method="POST" action="controllerSupplier.php">
        <button class="btn btn-danger btn-sm" name="proses" value="hapus" onclick="return confirm('Yakin Menghapus data ?')">Hapus</button>
       <input type="hidden" name="idx" value="<?= $sup['id'] ?>">
        </form>
      </td>
    </tr>
	<?php 
	$no++; 
	} ?>
  </tbody>
</table>
<?php }else{
  include_once 'terlarang.php';
} 
?>