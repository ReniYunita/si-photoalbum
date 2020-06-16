<?php
namespace App;
use PDO;
abstract class Data {
	abstract protected function tampil();
	abstract protected function tambah(String $a1,$a2);
	abstract protected function edit(String $a1,$a2,$a3);
	abstract protected function pilihdata(String $a1);
	abstract protected function hapus(String $a1);
}
class tcategory extends Data {
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
			$sql = "SELECT * FROM tcategory";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$data = [];
			while ($rows = $stmt->fetch()) {
				$data[] = $rows;
			}
			return $data;
		}

		public function tambah(String $d1, $d2){
			$sql = "INSERT INTO tcategory VALUES (NULL, :name, :keterangan)";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":name", $d1);
			$stmt -> bindParam(":keterangan", $d2);
			$stmt->execute();
		}

		public function pilihdata(String $d1)
		{
			$sql = "SELECT * FROM tcategory WHERE cat_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt->execute();
			$data = $stmt->fetch();
			return $data;
		}

		public function edit(String $d1, $d2,$d3)
		{
			$sql = "UPDATE tcategory SET name = :name, keterangan=:keterangan WHERE cat_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt -> bindParam(":name", $d2);
			$stmt -> bindParam(":keterangan", $d3);
			$stmt->execute();
		}

		public function hapus(string $d1)
		{
			$sql = "DELETE FROM tcategory WHERE cat_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt->execute();
		}
}
?>
