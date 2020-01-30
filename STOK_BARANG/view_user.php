<?php
if(isset($_SESSION['MEMBER'])){
//tangkap request di url dari klik tombol detail
$id = $_GET['iduser'];
$model = new UserModel();
$rs = $model->view([$id]);
//print_r($rs); exit;
?>

<div class="card" style="width: 18rem;">
  <img src="image/<?= $rs['foto'] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h3 class="card-title"><?= $rs['fullname'] ?></h3>
    <p class="card-text">
      <br/>Fullname : <?= $rs['fullname'] ?>
      <br/>User : <?= $rs['username'] ?>
      <br/>Email : <?= $rs['email'] ?>
    	<br/>Jabatan : <?= $rs['role'] ?>
    	<br/>Foto : <?= $rs['foto'] ?>
    	
    </p>
    <a href="index.php?hal=user" class="btn btn-primary">Kembali</a>
  </div>
</div>
<?php }else{
  include_once 'terlarang.php';
} 
?>
