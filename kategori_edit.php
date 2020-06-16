<?php
 require_once "app/kategori.php";
 $id = $_GET['id'];
 $kat = new App\tcategory;
 $row = $kat->pilihdata($id);
 if (isset($_POST['tsimpan'])){
   $kat->edit($id,$_POST['name'], $_POST['keterangan']);
     header("Location: index.php?halaman=kategori.php");

 }
 if (isset($_POST['thapus']))
 {
   $kat->hapus($id);
   header("Location: index.php?halaman=kategori.php");
 }

 ?>
<h2>EDIT DATA KATEGORI</h2>
<form action="" method ="POST">
	<table>
    <tr>
			<th>ID KATEGORI</th>
			<td><input readonly type="text" name="" value="<?php echo $row['cat_id']; ?>"></td>
		</tr>
		<tr>
			<th>NAMA KATEGORI</th>
			<td><input type="text" name="name" value="<?php echo $row['name']; ?>"></td>
		</tr>
		<tr>
			<th>KETERANGAN</th>
			<td><input type="text" name="keterangan" value="<?php echo $row['keterangan']; ?>"></td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" name="tsimpan" value="UBAH"><input type="submit" name="thapus" value="HAPUS"></td>

		</tr>
	</table>
