<?php
class UserModel
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
		$sql = "SELECT * FROM user";
		// $sql = "SELECT pegawai.*, jabatan.nama AS posisi
		// 		FROM pegawai INNER JOIN jabatan
		// 		ON jabatan.id = pegawai.idjabatan
		// 		ORDER BY nama ASC";
		// //prepare statement PDO
		$ps =$this ->koneksi->prepare($sql);
		$ps ->execute();
		$rs = $ps->fetchAll();
		return $rs;
	}
	public function View($id){
		$sql = "SELECT * FROM user WHERE id=?";
		// $sql = "SELECT pegawai.*, jabatan.nama AS posisi
				// FROM pegawai INNER JOIN jabatan
				// ON jabatan.id = pegawai.idjabatan
				// where pegawai.id=?";
		//prepare statement PDO
		$ps =$this ->koneksi->prepare($sql);
		$ps ->execute($id);
		$rs = $ps->fetch();
		return $rs;
	}
		public function Simpan($data){
			$sql = "INSERT INTO user(fullname,username,password,email,role,foto) VALUES (?,?,sha1(?),?,?,?)";
			//prepare statement PDO
			$ps =$this ->koneksi->prepare($sql);
			$ps ->execute($data);
		}
		public function Ubah($data){
			$sql = "UPDATE user SET fullname=?,username=?,password=sha1(?),email=?,role=?,foto=?
					WHERE id = ?";
			//prepare statement PDO
			$ps =$this ->koneksi->prepare($sql);
			$ps ->execute($data);
		}
		public function hapus($id){
			$sql = "DELETE FROM user WHERE id = ?";
			//prepare statement PDO
			$ps =$this ->koneksi->prepare($sql);
			$ps ->execute($id);
		}
}