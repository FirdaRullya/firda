<?php
//tangkap request di url dari klik tombol detail
$id = $_GET['idsup'];
$model = new SupplierModel();
$rs = $model->view([$id]);
//print_r($rs); exit;
?>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h3 class="card-title"><?= $rs['nama_splr'] ?></h3>
    <p class="card-text">
    	<br/>Supplier : <?= $rs['id'] ?>
    	<br/>Alamat : <?= $rs['alamat_splr'] ?>
    	<br/>HP : <?= $rs['tlp_splr'] ?>
      
    </p>
    <a href="index.php?hal=supplier" class="btn btn-primary">Kembali</a>
  </div>
</div>