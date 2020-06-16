<?php
require_once "app/kategori.php";
require_once "app/post.php";
$cmb = new App\tcategory;
$kat = new App\tpost;
$dat1 = $cmb->tampil();

if (isset($_POST['tsimpan'])) {
	$kat->tambah($_POST['cid'],$_POST['tanggal'], $_POST['slug'], $_POST['title'], $_POST['keterangan'] );
  header("Location: index.php?halaman=post.php");
}

?>
<h2>INPUT DATA POST</h2>
	<table>
<form action="" method="POST">
    <tr>
      <th>ID KATEGORI</th>
      <td>
        <select name="cid">
          <?php foreach ($dat1 as $row ) { ?>
          <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['name']; ?></option>
          <?php } ?>
        </select>
      </td>
    </tr>
    <tr>
			<th>TANGGAL</th>
			<td><input type="date" name="tanggal"></td>
		</tr>
     <tr>
      <th>SLUG</th>
      <td><input type="text" name="slug"></td>
    </tr>
    <tr>
      <th>TITLE</th>
      <td><input type="text" name="title"></td>
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
