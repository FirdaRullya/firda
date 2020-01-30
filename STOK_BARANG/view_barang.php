<?php
//tangkap request di url dari klk tombol detail
$id = $_GET['idbrg'];
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
    <h5 class="card-title"><?= $rs['nama'] ?></h5>
    <p class="card-text">
    	Kode = <?= $rs['kode'] ?>
    <br/>
        Harga = <?= $rs['h_jual_brg'] ?>
    <br/>
        Stok = <?= $rs['stok_brg'] ?>
    </p>

    <a href="index.php?hal=barang" class="btn btn-primary">Kembali	</a>
  </div>
</div>