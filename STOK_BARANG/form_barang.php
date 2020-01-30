<?php
//Array Associative Master Data Kategori
$mode = new KategoriModel();
$ar_kategori = $mode -> getAll();

$idedit = $_REQUEST['idedit'];
$obj2 = new BarangModel();
if (!empty($idedit)) {
  $row = $obj2->View([$idedit]);
}
else {
 $row = [];
}
?>
<form method="POST" action="controllerBarang.php">
  <div class="form-group row">
    <label for="kode" class="col-4 col-form-label">Kode Barang</label> 
    <div class="col-8">
      <input id="kode" name="kode" type="text" required="required" class="form-control" value="<?= $row['kode'] ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama Barang</label> 
    <div class="col-8">
      <input id="nama" name="nama" placeholder="Nama" type="text" required="required" class="form-control" value="<?= $row['nama'] ?>">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Jenis Kategori</label> 
    <div class="col-8">
      <?php
      $no = 0 ;
        foreach ($ar_kategori as $kategori) {
          $cek = ($kategori['id'] == $row['id_kategori']) ? "checked" : "";
          ?>
      <div class="form-check form-check-inline">
        <input name="kategori" id="kategori<?= $no ?>" type="radio" required="required" class="form-check-input" value="<?= $kategori['id'] ?>"
         <?= $cek ?>> 
        <label for="kategori<?= $no ?>" class="form-check-label"><?= $kategori['nama'] ?></label>
      </div>
        <?php $no++; } ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="harga" class="col-4 col-form-label">Harga Jual</label> 
    <div class="col-8">
      <input id="harga" name="harga" type="text" required="required" class="form-control" value="<?= $row['h_jual_brg'] ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="stok" class="col-4 col-form-label">Stok Barang</label> 
    <div class="col-8">
      <input id="stok" name="stok" type="text" class="form-control" value="<?= $row['stok_brg'] ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="foto" class="col-4 col-form-label">Foto</label> 
    <div class="col-8">
      <input id="foto" name="foto" type="text" class="form-control" value="<?= $row['foto'] ?>">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <?php
      if(empty($idedit)){  //modus edit data baru

        ?>
      <button name="proses" type="submit" class="btn btn-primary" value="simpan">Simpan</button>
       <?php 
      }else{ //modus edit data lama
      ?>
      <button name="proses" type="submit" class="btn btn-warning" value="ubah">Ubah</button>
      <input type="hidden" name="idx" value="<?= $idedit ?>"/>
 
    <?php } ?>
         <button name="proses" type="submit" class="btn btn-primary" value="batal">Batal</button>
    </div>
  </div>
</form>