<?php
class PembelianModel
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
		//$sql = "SELECT * FROM pegawai";
		$sql = "SELECT pembelian.*, supplier.nama_splr , barang.nama
		FROM pembelian 
		INNER JOIN supplier ON supplier.id = pembelian.id_splr 
		INNER JOIN barang ON barang.id = pembelian.id_brg 
		ORDER BY pembelian.id DESC";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute();
		$rs=$ps->fetchAll();
		return $rs;
	}

public function view($id){
		//$sql = "SELECT * FROM pegawai WHERE id=?";
		$sql = "SELECT pembelian.*, supplier.nama_splr AS supplier 
		FROM pembelian INNER JOIN supplier 
		ON supplier.id = pembelian.id_splr ORDER BY id DESC";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($id);
		$rs=$ps->fetch();
		return $rs;
	}
	public function simpan($data){
		$sql = "INSERT INTO pembelian(id_splr,id_brg,tgl_beli,jml_beli,h_beli) VALUES (?,?,?,?,?)";
		//prepare statement PDO
		$ps =$this ->koneksi->prepare($sql);
		$ps ->execute($data);
	}
	public function ubah($data){
		$sql = "UPDATE pembelian SET id_splr=?,id_brg=?,tgl_beli=?,jml_beli=?,h_beli=?
				WHERE id = ?";
		//prepare statement PDO
		$ps =$this ->koneksi->prepare($sql);
		$ps ->execute($data);
	}
	public function hapus($id){
		$sql = "DELETE FROM pembelian WHERE id = ?";
		//prepare statement PDO
		$ps =$this ->koneksi->prepare($sql);
		$ps ->execute($id);
	}
}