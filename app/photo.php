<?php
namespace App;
use PDO;
abstract class Data2 {
	abstract protected function tampil();
	abstract protected function tambah(String $a1,$a2,$a3,$a4);
	abstract protected function edit(String $a1,$a2,$a3,$a4,$a5);
	abstract protected function pilihdata(String $a1);
	abstract protected function hapus(String $a1);
}
class tphotos extends Data2 {
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
			$sql = "SELECT * FROM tphotos";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$data = [];
			while ($rows = $stmt->fetch()) {
				$data[] = $rows;
			}
			return $data;
		}

		public function tambah(String $d1,$d2,$d3,$d4){
			$sql = "INSERT INTO tphotos VALUES ( NULL, :tanggal, :title, :keterangan, :pid)";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":pid", $d1);
			$stmt -> bindParam(":tanggal", $d2);
			$stmt -> bindParam(":title", $d3);
			$stmt -> bindParam(":keterangan", $d4);
			$stmt->execute();
		}

		public function pilihdata(String $d1)
		{
			$sql = "SELECT * FROM tphotos WHERE photos_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt->execute();
			$data = $stmt->fetch();
			return $data;
		}

		public function edit(String $d1, $d2, $d3, $d4, $d5)
		{
			$sql = "UPDATE tphotos SET post_id = :pid, tanggal = :tanggal, title = :title, keterangan= :keterangan WHERE photos_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt -> bindParam(":pid", $d2);
			$stmt -> bindParam(":tanggal", $d3);
			$stmt -> bindParam(":title", $d4);
			$stmt -> bindParam(":keterangan", $d5);
			$stmt->execute();
		}

		public function hapus(string $d1)
		{
			$sql = "DELETE FROM tphotos WHERE photos_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt->execute();
		}
}
?>
