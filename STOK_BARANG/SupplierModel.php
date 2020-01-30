<?php
class SupplierModel
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
		$sql = "SELECT * FROM supplier";
		//prepare statement PDO
		$ps =$this ->koneksi->prepare($sql);
		$ps ->execute();
		$rs = $ps->fetchAll();
		return $rs;
	}
	public function view($id){
		$sql = "SELECT * FROM supplier WHERE id=?";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($id);
		$rs = $ps->fetch();
		return $rs;

	}
	public function Simpan($data){
		$sql = "INSERT INTO supplier(nama_splr,alamat_splr,tlp_splr) VALUES(?,?,?)";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($data);
	}

	public function ubah($data){
		$sql = "UPDATE supplier SET nama_splr=?, alamat_splr=?, tlp_splr=? WHERE id=?" ;
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($data);
	}

	public function hapus($id){
		$sql = "DELETE FROM supplier WHERE id=?" ;
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($id);
	}
}