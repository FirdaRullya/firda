<?php
if(isset($_SESSION['MEMBER'])){

$ar_judul = ['No','Nama','',''];
//ciptakan oj dari class Kategori Model
$model = new KategoriModel();
$rs = $model->getAll ();
//print_r($rs); exit;  untuk ngetes data nya sudah muncul atau tidak
?>



<h3>Daftar Kategori Barang</h3>
<br/>
<!--------------------awal modal--------------------->

<!-- Button trigger modal -->
<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
  + Tambah Data Kategori
</button>
<br/>
<br/>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <?php include_once 'form_kategori.php'; ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        
      </div>
    </div>
  </div>
</div>


<!---------------akhir modal------------------------>
<table class="table table-striped">
  <thead>
    <tr>
      <?php
      foreach ($ar_judul as $judul) {
        
      

      ?>
      <th scope="col"><?= $judul?></th>
  <?php } ?>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    foreach ($rs as $kateg) {
      
    
    ?>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= $kateg['nama'] ?></td>
      <td align="right">
        
        <a class="btn btn-warning btn-sm" href="index.php?hal=form_kategori&idedit=<?= $kateg['id'] ?>">Update</a>
        </td>
        <td align="left">

          <?php
if($_SESSION['MEMBER'] ['role'] != 'karyawan') {


?>
        <form method="POST" action="controllerkategori.php">

        <button class="btn btn-danger btn-sm" name="proses" value="hapus" onclick="return confirm('Yakin Menghapus data ?')">Hapus</button>
       <input type="hidden" name="idx" value="<?= $kateg['id'] ?>">
        </form>
      </td>

       <?php
    }
      ?>


    </tr>
   <?php $no++; } ?>
  </tbody>
</table>

<?php

}
else{
  include_once 'terlarang.php';
}
?>