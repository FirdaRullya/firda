<?php
if(isset($_SESSION['MEMBER'])){
$ar_judul = ['No','Nama','Harga','Stok','Kategori','Action'];
//ciptakan object dari PegawaiModel
$model = new BarangModel();
// $rs = $model->getAll();

$keyword = $_REQUEST['keyword'];
$idjab = $_REQUEST['idjab'];
$idkate = $_REQUEST['idkate'];
if (!empty($keyword)) {
  $rs=$model->cari($keyword);

}elseif (!empty($idkate)) {
  $rs=$model->filter([$idkate]);
  
}else{
  $rs = $model->getAll();
}

?>
<h3>Daftar Barang</h3>
<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
  Tambah
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Penambahan Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
          include_once 'form_barang.php'; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<br/>
<br/> 

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
  	foreach ($rs as $daftar) {
  	?>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= $daftar['nama'] ?></td>
      <td>Rp. <?= number_format($daftar['h_jual_brg']),'','','' ?></td>
      <td><?= $daftar['stok_brg'] ?></td>
      <td><?= $daftar['kategori'] ?></td>
       <form method="POST" action="controllerBarang.php">
       <td align="left">
        <a class="btn btn-primary btn-sm" href="index.php?hal=view_barang&idbrg=<?= $daftar['id'] ?>">View</a>
        <a class="btn btn-primary btn-sm" href="index.php?hal=form_barang&idedit=<?= $daftar['id'] ?>">Update</a> 
        <button class="btn btn-danger btn-sm" name="proses" value="hapus" onclick="return confirm('Confirm')">Delete</button>
        <input type="hidden" name="idx" value="<?= $daftar['id'] ?>"/>
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