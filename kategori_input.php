<?php
require_once "app/kategori.php";
$kat = new App\tcategory;

if (isset($_POST['tsimpan'])) {
	$kat->tambah($_POST['name'], $_POST['keterangan']);
  header("Location: index.php?halaman=kategori.php");
}

?>
<h2>INPUT DATA KATEGORI</h2>
	<table>
<form action="" method="POST">
		<tr>
			<th>NAMA KATEGORI</th>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<th>KETERANGAN</th>
			<td><input type="text" name="keterangan"></td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" name="tsimpan" value="TAMBAH"></td>
		</tr>
	</table>
</form>
