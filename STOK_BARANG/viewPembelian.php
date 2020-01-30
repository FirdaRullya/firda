<?php
//tangkap request di url dari klk tombol detail
$id = $_GET['idbeli'];
$model = new BarangModel();
$rs = $model-> View([$id]);
// print_r($rs); exit;
// foreach ($rs as $peg) {
// 	$nama = $peg['nama'];
	// $nama = $peg['foto'];
	// $nama = $peg['foto'];
	// $nama = $peg['foto'];
	// $nama = $peg['foto'];
	// $nama = $peg['foto'];
	// $nama = $peg['foto'];
	// $nama = $peg['foto'];

?>
<div class="card" style="width: 18rem;">
  <img src="image/<?= $rs['foto'] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $rs['nama_splr'] ?></h5>
    <p class="card-text">
    	Nama = <?= $rs['nama'] ?>
    <br/>
        tgl_beli = <?= $rs['tgl_beli'] ?>
    <br/>
        jml_beli = <?= $rs['jml_beli'] ?>
        <br/>
        h_beli = <?= $rs['h_beli'] ?>
    </p>

    <a href="index.php?hal=pembelian" class="btn btn-primary">Kembali	</a>
  </div>
</div>