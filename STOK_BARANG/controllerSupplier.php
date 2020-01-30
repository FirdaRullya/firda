<?php
include_once 'koneksi.php';
include_once 'SupplierModel.php';
//tangkap request name2 form
$nama_splr = $_POST['nama_splr'];
$alamat_splr = $_POST['alamat_splr'];
$tlp_splr = $_POST['tlp_splr'];
//gabungkan var di atas ke array
$data = [
	$nama_splr, // ? 1
	$alamat_splr, // ? 2
	$tlp_splr, // ? 3
];
//panggil fungsi simpan di SupplierModel.php
$proses = $_POST['proses'];
$model = new SupplierModel();


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
	header('location:index.php?hal=supplier');
		break;
}

//landing page ke halaman pegawai
header('location:index.php?hal=supplier');