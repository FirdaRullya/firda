<?php
include_once 'koneksi.php';
include_once 'BarangModel.php';
//tangkap request form
$kode = $_POST ['kode'];
$nama = $_POST ['nama'];
$kategori = $_POST ['kategori'];
$harga = $_POST ['harga'];
$stok = $_POST ['stok'];
$foto = $_POST ['foto'];
//gabungkan var di atatas ke array

$data = [
	$kode , // ? 1
	$nama ,  //? 2
	$kategori , // ? 3
	$harga , // ? 4
	$stok , // ? 5
	$foto , // ? 6
	];
//Panggil Fungsi Simpan di PegawaiModel.php
$proses = $_POST['proses'];
$model = new BarangModel();
//Panggil Fungsi2 CRUD di pegawai model
switch ($proses) {
	case 'simpan':
		$model->simpan($data);
		break;
	case 'ubah':
		$data[] = $_POST['idx'];
		$model ->ubah($data);
		break;
	case 'hapus':
		$id = $_POST['idx'];
		$model ->hapus([$id]);
		break;
	
	default:
		header('location:index.php?hal=barang');
		break;
}
//Landing page Ke Halaman Pegawai
header('location:index.php?hal=barang');