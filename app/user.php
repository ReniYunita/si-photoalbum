<?php
abstract class data {
	abstract protected function login(string $a, $b);
	abstract protected function regis(String $a1,$a2,$a3);
	abstract protected function edit(String $a1,$a2,$a3);
}

class user extends data {
	private $db;
	public function __construct()
	{
		try {
				$this->db =
				new PDO("mysql:host=localhost;dbname=potodb", "root", "");
			} catch (PDOException $e) {
				die ("Error " . $e->getMessage());
			}
		}
		public function login(string $un,$pass)
		{
			$slog = "SELECT * FROM akun WHERE username = :uname AND password = :upass";
			$log = $this->db->prepare($slog);
			$log->bindParam(":uname", $un);
			$log->bindParam(":upass", $pass);
			$log->execute();
			$login = $log->fetch();
			if($log->rowCount() > 0){
					session_start();
					$_SESSION["nama"] = $login['name'];
					header("location:index.php");
					exit;
			}
		}

			public function regis(string $a, $b, $c){
				$sreg = "INSERT INTO akun VALUES ( null, :a, :b, :c)";
				$reg = $this->db->prepare($sreg);
				$reg->bindParam(":a", $a);
				$reg->bindParam(":b", $b);
				$reg->bindParam(":c", $c);
				$reg->execute();
			}

			public function edit(string $a, $b, $c){

			}

	}
