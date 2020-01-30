<?php
//buat associative u/ master data supplier
$obj = new SupplierModel();
$ar_supplier = $obj->getAll();

//-----------------proses ubah data-------------
//tangkap request idedit di URL
$idedit = $_REQUEST['idedit'];
$obj2 = new SupplierModel();
if (!empty($idedit)){
  //modus edit data lama yg ditampilkan diform untuk diedit
  $row = $obj2->view([$idedit]);

}else{
//modus entri data baru, form tetap dalam keadaan kosong
  $row = [];
}
?>
<form method="POST" action="controllerSupplier.php">
  <div class="form-group row">
    <label for="nama" class="col-5 col-form-label">Nama</label> 
    <div class="col-7">
      <input id="nama_splr" name="nama_splr" value="<?= $row['nama_splr'] ?>"type="text" required="required" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="alamat" class="col-5 col-form-label">Alamat</label> 
    <div class="col-7">
      <textarea id="alamat_splr" name="alamat_splr" cols="40" rows="4" aria-describedby="alamatHelpBlock" required="required" class="form-control"><?= $row['alamat_splr'] ?></textarea> 
      <span id="alamatHelpBlock" class="form-text text-muted"></span>
    </div>
  </div>
  <div class="form-group row">
    <label for="hp" class="col-5 col-form-label">Telp</label> 
    <div class="col-7">
      <input id="tlp_splr" name="tlp_splr" value="<?= $row ['tlp_splr'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>


  <div class="form-group row">
    <div class="offset-5 col-7">

       <?php
      if(empty($idedit)){ //modus entri data baru
      ?>

      <button name="proses" value="simpan" type="submit" class="btn btn-primary">Simpan</button>

      
      <?php
      }else{   //modus edit data lama

      
      ?>

       <button name="proses" value="ubah" type="submit" class="btn btn-warning">Ubah</button>
     <input type="hidden" name="idx" value="<?= $idedit ?>" />

    <?php } ?>

    <button name="proses" value="batal" type="submit" class="btn btn-warning">Batal</button>
    </div>
  </div>
</form>