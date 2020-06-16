<?php
 require_once "app/photo.php";
 require_once "app/album.php";
 $id = $_GET['id'];
 $cmb = new App\tphotos;
 $kat = new App\talbum;
 $row1 = $kat->pilihdata($id);
 $dat1 = $cmb->tampil();
 $dat2 = $cmb->pilihdata($row1['photos_id']);

 if (isset($_POST['tsimpan'])){
   $kat->edit($id,$_POST['phid'], $_POST['name'], $_POST['keterangan']);
   header("Location: index.php?halaman=album.php");

 }
 if (isset($_POST['thapus']))
 {
   $kat->hapus($id);
   header("Location: index.php?halaman=album.php");
 }

 ?>
<h2>EDIT DATA ALBUM</h2>
<form action="" method ="POST">
	<table>
      <tr>
        <th>ID FOTO</th>
        <td>
          <select name="phid">
            <option value="<?php echo $row1['photos_id']; ?>"><?php echo $dat2['title']; ?></option>
            <?php foreach ($dat1 as $row ) { ?>
            <option value="<?php echo $row['photos_id']; ?>"><?php echo $row['title']; ?></option>
            <?php } ?>
          </select>
        </td>
    <tr>
      <th>NAMA ALBUM</th>
      <td><input type="text" name="name" value="<?php echo $row1['name']; ?>"></td>
    </tr>
     <tr>
      <th>KETERANGAN</th>
      <td><input type="text" name="keterangan" value="<?php echo $row1['keterangan']; ?>"></td>
    </tr>
		<tr>
			<th></th>
			<td><input type="submit" name="tsimpan" value="UBAH"><input type="submit" name="thapus" value="HAPUS"></td>

		</tr>
	</table>
