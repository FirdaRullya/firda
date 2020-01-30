<?php
//tangkap request di url dari klik tombol detail
$id = $_GET['idkateg'];
$model = new KategoriModel();
$rs = $model->view([$id]);

?>

<div class="card" style="width: 40rem;">
  <div class="card-body">
    <h5 class="card-title"><?= $rs ['nama'] ?></h5>
    <p class="card-text">
    	<br/>Kategori : <?= $rs['nama'] ?>
    </p>
    <a href="index.php?hal=kategori" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

