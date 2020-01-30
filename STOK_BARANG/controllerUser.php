<?php
include_once 'koneksi.php';
include_once 'UserModel.php';
//tangkap request form
$fullname = $_POST ['fullname'];
$username = $_POST ['username'];
$password = $_POST ['password'];
$email = $_POST ['email'];
$role = $_POST ['role'];
$foto = $_POST ['foto'];
//gabungkan var di atatas ke array

$data = [
	$fullname ,  //? 1
	$username , // ? 2
	$password , // ? 3
	$email , // ? 4
	$role , // ? 5
	$foto , // ? 6
	];
//tangkap request tombol2
$proses = $_POST['proses'];
$model = new UserModel();
//Panggil Fungsi2 CRUD di pegawai model
switch ($proses) {
	case 'simpan':
		$model->Simpan($data);
		break;
	case 'ubah':
		$data[] = $_POST['idx'];
		$model -> ubah($data);
		break;
	case 'hapus':
		$id = $_POST['idx'];
		$model -> hapus([$id]);
		break;
	
	default:
		header('location:index.php?hal=user');
		break;
}
//Landing page Ke Halaman Pegawai
header('location:index.php?hal=user');