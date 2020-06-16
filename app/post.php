<?php
namespace App;
use PDO;
abstract class Data1 {
	abstract protected function tampil();
	abstract protected function tambah(String $a1,$a2,$a3,$a4,$a5);
	abstract protected function edit(String $a1,$a2,$a3,$a4,$a5,$a6);
	abstract protected function pilihdata(String $a1);
	abstract protected function hapus(String $a1);
}
class tpost extends Data1 {
	private $db;

	public function __construct()
	{
		try {
				$this->db = new PDO("mysql:host=localhost;dbname=potodb", "root", "");
			} catch (PDOException $e) {
				die ("Error " . $e->getMessage());
			}
		}

		public function tampil()
		{
			$sql = "SELECT * FROM tpost";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$data = [];
			while ($rows = $stmt->fetch()) {
				$data[] = $rows;
			}
			return $data;
		}

		public function tambah(String $d1,$d2,$d3,$d4, $d5){
			$sql = "INSERT INTO tpost VALUES (NULL, :tanggal, :slug, :title, :keterangan, :cid)";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":tanggal", $d2);
			$stmt -> bindParam(":slug", $d3);
			$stmt -> bindParam(":title", $d4);
			$stmt -> bindParam(":keterangan", $d5);
			$stmt -> bindParam(":cid", $d1);
			
			$stmt->execute();
		}

		public function pilihdata(String $d1)
		{
			$sql = "SELECT * FROM tpost WHERE post_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt->execute();
			$data = $stmt->fetch();
			return $data;
		}

		public function edit(String $d1, $d2, $d3, $d4, $d5, $d6)
		{
			$sql = "UPDATE tpost SET cat_id = :cid, tanggal = :tanggal, slug= :slug, title= :title, keterangan= :keterangan WHERE post_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt -> bindParam(":cid", $d2);
			$stmt -> bindParam(":tanggal", $d3);
			$stmt -> bindParam(":slug", $d4);
			$stmt -> bindParam(":title", $d5);
			$stmt -> bindParam(":keterangan", $d6);
			$stmt->execute();
		}

		public function hapus(string $d1)
		{
			$sql = "DELETE FROM tpost WHERE post_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt->execute();
		}
}
?>
