<?php
include_once 'koneksi.php';
include_once 'PembelianModel.php';
//tangkap request name2 form
$nama_splr = $_POST['id_splr'];
$nama_barang = $_POST['id_brg'];
$tgl_beli = $_POST['tgl_beli'];
$jml_beli = $_POST ['jml_beli'];
$h_beli = $_POST ['h_beli'];
//gabungkan var di atas ke array
$data = [
	$nama_splr, // ? 1
	$nama_barang, // ? 2
	$tgl_beli, // ? 3
	$jml_beli,
	$h_beli,
];
//panggil fungsi simpan di SupplierModel.php
$proses = $_POST['proses'];
$model = new PembelianModel();


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
	header('location:index.php?hal=pembelian');
		break;
}

//landing page ke halaman pegawai
header('location:index.php?hal=pembelian');