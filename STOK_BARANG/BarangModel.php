<?php
class BarangModel
{
	//member1 variabel
	public $koneksi; 
	//member2 konstukror
	public function __construct()
	{
		global $dbh; //panggil var di file lain
		$this ->koneksi=$dbh;
	}
	//member3 method/fungsi/behavior
	//fungsi2 CRUD
	public function getAll(){
		$sql = "SELECT barang.*, kategori.nama AS kategori
				FROM barang INNER JOIN kategori
				ON kategori.id = barang.id_kategori
				ORDER BY kategori ASC";
		//prepare statement PDO
		$ps =$this ->koneksi->prepare($sql);
		$ps ->execute();
		$rs = $ps->fetchAll();
		return $rs;
	}
	public function View($id){
		$sql = "SELECT * FROM barang WHERE id=?";
		// $sql = "SELECT barang.*, kategori.nama AS kategori
		// 		FROM barang INNER JOIN kategori
		// 		ON kategori.id = barang.id_kategori
		// 		WHERE id=?";
		//prepare statement PDO
		$ps =$this ->koneksi->prepare($sql);
		$ps ->execute($id);
		$rs = $ps->fetch();
		return $rs;
	}

	public function filter($idkate){
		// $sql = "SELECT * FROM pegawai";
		$sql = "SELECT barang.*, kategori.nama AS kategori
				FROM barang INNER JOIN kategori
				ON kategori.id = barang.id_kategori
				where barang.id_kategori = ?
				ORDER BY id ASC";
		//prepare statement PDO
		$ps =$this ->koneksi->prepare($sql);
		$ps ->execute($idkate);
		$rs = $ps->fetchAll();
		return $rs;
	}

	public function simpan($data){
		$sql = "INSERT INTO barang(kode,nama,id_kategori,h_jual_brg,stok_brg,foto) VALUES (?,?,?,?,?,?)";
		//prepare statement PDO
		$ps =$this ->koneksi->prepare($sql);
		$ps ->execute($data);
	}
	public function ubah($data){
		$sql = "UPDATE barang SET kode=?,nama=?,id_kategori=?,h_jual_brg=?,stok_brg=?,foto=?
				WHERE id = ?";
		//prepare statement PDO
		$ps =$this ->koneksi->prepare($sql);
		$ps ->execute($data);
	}
	public function hapus($id){
		$sql = "DELETE FROM barang WHERE id = ?";
		//prepare statement PDO
		$ps =$this ->koneksi->prepare($sql);
		$ps ->execute($id);
	}
	public function cari($keyword){
		// $sql = "SELECT * FROM barang";
		$sql = "SELECT barang.*, kategori.nama AS kategori
				FROM barang INNER JOIN kategori
				ON kategori.id = barang.id_kategori
				where barang.nama LIKE '%$keyword%'
				ORDER BY nama ASC";
		//prepare statement PDO
		$ps =$this ->koneksi->prepare($sql);
		$ps ->execute();
		$rs = $ps->fetchAll();
		return $rs;
	}
}