<?php
class KategoriModel
{
	//member1 variabel
	public $koneksi;

	//member2 konstruktur
	public function __construct()
	{
		global $dbh; //panggil variabel difile lain
		$this->koneksi = $dbh;
	}


	//member3 method/fungsi/behavior
	//fungsi-fungsi CRUD(create,update,delete)

	public function getAll(){
		$sql = "SELECT * FROM kategori";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute();
		$rs=$ps->fetchAll();
		return $rs;
	}
	public function view($id){
		$sql = "SELECT * FROM kategori WHERE id=?";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($id);
		$rs = $ps->fetch();
		return $rs;

	}
	public function simpan($data){
		$sql = "INSERT INTO kategori(nama) VALUES (?)" ;
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($data);
	}

	public function ubah($data){
		$sql = "UPDATE kategori SET nama=? WHERE id=?" ;
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($data);
	}

	public function hapus($id){
		$sql = "DELETE FROM kategori WHERE id=?" ;
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($id);
	}
}