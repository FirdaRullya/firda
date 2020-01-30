
<?php
//buat associative u/ master data supplier
$idedit = $_REQUEST['idedit'];
$obj = new SupplierModel();
$ar_pembelian = $obj->getAll();


//-----------------proses ubah data-------------
//tangkap request idedit di URL

$obj2 = new BarangModel();
$ar_pembelian2 = $obj2->getAll();
if (!empty($idedit)){
  //modus edit data lama yg ditampilkan diform untuk diedit
  $row = $obj2->view([$idedit]);

}else{
//modus entri data baru, form tetap dalam keadaan kosong
  $row = [];
}
?>
<form id="formulir" method="POST" action="controllerPembelian.php">
 <div class="form-group row">
    <label for="supplier" class="col-4 col-form-label">Nama Supplier</label> 
    <div class="col-8">
      <select id="id_splr" name="id_splr" required="required" class="custom-select>
        <option value="">-----pilih Supplier----</option>

        
        <?php
        foreach ($ar_pembelian as $supplier) {
      //edit data lama
          $sel = ($supplier['nama_splr'] == $row['id']) ? "selected" : "";


        ?>
        <option value="<?= $supplier['id'] ?>" <?= $sel ?>> <?= $supplier['nama_splr'] ?></option>

      <?php } ?>

      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="barang" class="col-4 col-form-label">Nama Barang</label> 
    <div class="col-8">
      <select id="id_brg" name="id_brg" required="required" class="custom-select">
        <option value="">-----pilih barang----</option>

        
        <?php
        foreach ($ar_pembelian2 as $barang) {
      //edit data lama
          $sel = ($barang['nama'] == $row['id']) ? "selected" : "";


        ?>
        <option value="<?= $barang['id'] ?>" <?= $sel ?>> <?= $barang['nama']?></option>

      <?php } ?>

      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Tanggal Pembelian</label> 
    <div class="col-8">
      <input id="tgl_beli" name="tgl_beli" value="<?= $row['tgl_beli'] ?>"type="date" required="required" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Jumlah Beli</label> 
    <div class="col-8">
      <input id="jml_beli" name="jml_beli" value="<?= $row['jml_beli'] ?>"type="double" required="required" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Harga Beli</label> 
    <div class="col-8">
      <input id="h_beli" name="h_beli" value="<?= $row['h_beli'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>


  <div class="form-group row">
    <div class="offset-5 col-7">

       <?php
      if(empty($idedit)){ //modus entri data baru
      ?>

      <button name="proses" type="submit" value="simpan" class="btn btn-primary">Simpan</button>

      
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