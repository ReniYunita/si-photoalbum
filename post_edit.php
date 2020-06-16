<?php
 require_once "app/kategori.php";
 require_once "app/post.php";
 $id = $_GET['id'];
 $cmb = new App\tcategory;
 $kat = new App\tpost;
 $row1 = $kat->pilihdata($id);
 $dat1 = $cmb->tampil();
 $dat2 = $cmb->pilihdata($row1['cat_id']);

 if (isset($_POST['tsimpan'])){
   $kat->edit($id,$_POST['cid'],$_POST['tanggal'], $_POST['slug'], $_POST['title'], $_POST['keterangan']);
   header("Location: index.php?halaman=post.php");

 }
 if (isset($_POST['thapus']))
 {
   $kat->hapus($id);
   header("Location: index.php?halaman=post.php");
 }

 ?>
<h2>EDIT DATA POST</h2>
<form action="" method ="POST">
	<table>
      <tr>
        <th>ID KATEGORI</th>
        <td>
          <select name="cid">
            <option value="<?php echo $row1['cat_id']; ?>"><?php echo $dat2['name']; ?></option>
            <?php foreach ($dat1 as $row ) { ?>
            <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['name']; ?></option>
            <?php } ?>
          </select>
        </td>
		<tr>
			<th>TANGGAL</th>
			<td><input type="date" name="tanggal" value="<?php echo $row1['tanggal']; ?>"></td>
		</tr>
    <tr>
      <th>SLUG</th>
      <td><input type="text" name="slug" value="<?php echo $row1['slug']; ?>"></td>
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
