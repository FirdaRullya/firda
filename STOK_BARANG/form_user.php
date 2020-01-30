<?php
$isset = $_SESSION['MEMBER'];
if(isset($sesi) && $sesi ['role'] != 'karyawan'){
//Array Scalar Master Data Gender & Status
$ar_role = ['admin','karyawan'];
//Array Associative Master Data Jabatan


$idedit = $_REQUEST['idedit'];
$obj2 = new UserModel();
if (!empty($idedit)) {
  $row = $obj2->View([$idedit]);
}
else {
 $row = [];
}

?>


<form method="POST" action="controllerUser.php">
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama Lengkap</label> 
    <div class="col-8">
      <input id="nama" name="fullname"  placeholder="Nama" value="<?= $row['fullname'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="alamat" class="col-4 col-form-label" >Username</label> 
    <div class="col-8">
      <input id="alamat" name="username" cols="40" rows="3" class="form-control" value="<?= $row['username'] ?>"></input>
    </div>
  </div>
  <div class="form-group row">
    <label for="hp" class="col-4 col-form-label">Password</label> 
    <div class="col-8">
      <input id="hp" name="password" type="password" required="required" class="form-control" value="<?= $row['password'] ?>">
    </div>
  </div>
<div class="form-group row">
    <label for="jumlah" class="col-4 col-form-label">Email</label> 
    <div class="col-8">
      <input id="jumlah" name="email" type="email" class="form-control" value="<?= $row['email'] ?>">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Role</label> 
    <div class="col-8">
      <?php
      $no = 0 ;
        foreach ($ar_role as $role) {
          $cek = ($role == $row['role']) ? "checked" : "";
          ?>
      <div class="form-check form-checkheck-inline">
        <input name="role" id="role<?= $no ?>" type="radio" required="required" class="form-check-input" value="<?= $role ?>"<?= $cek ?>> 
        <label for="role<?= $no ?>" class="form-check-label"><?= $role ?></label>
      </div>
        <?php $no++; } ?>
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
<?php }else{
  include_once 'terlarang.php';
} 
?>