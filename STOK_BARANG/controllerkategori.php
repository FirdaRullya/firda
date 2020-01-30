<?php
include_once 'koneksi.php';
include_once 'KategoriModel.php';
//tangkap request name elemen form
$nama = $_POST['nama'];

//gabungkan variabel diatas ke array
$data = [
	$nama, // ?1

];

//panggil fungsi simpan di KategoriModel.php
$proses = $_POST['proses'];
$model = new KategoriModel ();

//panggil fungsi fungsi CRUD diKategoriModel.php
switch ($proses) {
	case 'simpan':
		$model->simpan($data);
		break;
	case 'ubah':
		//tangkap idx untuk ? ke 9
		$data[] = $_POST['idx'];
		$model->ubah($data);
		break;
	case 'hapus':
		$id = $_POST['idx'];
		$model->hapus([$id]);
		break;
	
	default:
		//dikembalikan ke halaman kategori
	header('location:index.php?hal=kategori');
		break;
}

//kembalikan ke halaman kategori
header('location:index.php?hal=kategori');