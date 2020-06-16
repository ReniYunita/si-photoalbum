<?php
namespace App;
use PDO;
abstract class Data3 {
	abstract protected function tampil();
	abstract protected function tambah(String $a1,$a2,$a3);
	abstract protected function edit(String $a1,$a2,$a3,$a4);
	abstract protected function pilihdata(String $a1);
	abstract protected function hapus(String $a1);
}
class talbum extends Data3 {
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
			$sql = "SELECT * FROM talbum";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$data = [];
			while ($rows = $stmt->fetch()) {
				$data[] = $rows;
			}
			return $data;
		}

		public function tambah(String $d1,$d2,$d3){
			$sql = "INSERT INTO talbum VALUES (NULL, :name, :keterangan, :phid)";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":phid", $d1);
			$stmt -> bindParam(":name", $d2);
			$stmt -> bindParam(":keterangan", $d3);
			$stmt->execute();
		}

		public function pilihdata(String $d1)
		{
			$sql = "SELECT * FROM talbum WHERE album_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt->execute();
			$data = $stmt->fetch();
			return $data;
		}

		public function edit(String $d1, $d2, $d3, $d4)
		{
			$sql = "UPDATE talbum SET photos_id = :phid, name = :name, keterangan = :keterangan WHERE album_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt -> bindParam(":phid", $d2);
			$stmt -> bindParam(":name", $d3);
			$stmt -> bindParam(":keterangan", $d4);
			$stmt->execute();
		}

		public function hapus(string $d1)
		{
			$sql = "DELETE FROM talbum WHERE album_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt->execute();
		}
}
?>
