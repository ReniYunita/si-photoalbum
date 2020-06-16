<?php
 require_once "app/post.php";
 require_once "app/photo.php";
 $id = $_GET['id'];
 $cmb = new App\tpost;
 $kat = new App\tphotos;
 $row1 = $kat->pilihdata($id);
 $dat1 = $cmb->tampil();
 $dat2 = $cmb->pilihdata($row1['post_id']);

 if (isset($_POST['tsimpan'])){
   $kat->edit($id,$_POST['pid'],$_POST['tanggal'], $_POST['title'], $_POST['keterangan']);
   header("Location: index.php?halaman=photo.php");

 }
 if (isset($_POST['thapus']))
 {
   $kat->hapus($id);
   header("Location: index.php?halaman=photo.php");
 }

 ?>
<h2>EDIT DATA FOTO</h2>
<form action="" method ="POST">
	<table>
      <tr>
        <th>ID POST</th>
        <td>
          <select name="pid">
            <option value="<?php echo $row1['post_id']; ?>"><?php echo $dat2['title']; ?></option>
            <?php foreach ($dat1 as $row ) { ?>
            <option value="<?php echo $row['post_id']; ?>"><?php echo $row['title']; ?></option>
            <?php } ?>
          </select>
        </td>
		<tr>
			<th>TANGGAL</th>
			<td><input type="date" name="tanggal" value="<?php echo $row1['tanggal']; ?>"></td>
		</tr>
    <tr>
      <th>TITLE</th>
      <td><input type="text" name="title" value="<?php echo $row1['title']; ?>"></td>
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
