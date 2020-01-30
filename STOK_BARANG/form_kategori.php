<?php
//buat associative u/ master data supplier
$obj = new KategoriModel();
$ar_kategori = $obj->getAll();

//-----------------proses ubah data-------------
//tangkap request idedit di URL
$idedit = $_REQUEST['idedit'];
$obj2 = new KategoriModel();
if (!empty($idedit)){
  //modus edit data lama yg ditampilkan diform untuk diedit
  $row = $obj2->view([$idedit]);

}else{
//modus entri data baru, form tetap dalam keadaan kosong
  $row = [];
}

?>


<form method="POST" action="controllerkategori.php">
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama Kategori</label> 
    <div class="col-8">
      <input id="nama" name="nama" value="<?= $row['nama'] ?>" type="text" required="required" class="form-control">
   
  </div>
 </div>
    
  <div class="form-group row">
    <div class="offset-4 col-8">

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