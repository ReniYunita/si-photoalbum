<?php
require_once "app/post.php";

$kat = new App\tpost;
$rows = $kat->tampil();

?>
 <h2><center>DATA POST</h2></center>
<form  method="post">
 <table>
   <tr>
     <th>ID POST</th>
     <th>ID KATEGORI</th>
     <th>TANGGAL</th>
     <th>SLUG</th>
     <th>TITLE</th>
     <th>KETERANGAN</th>
     <th>UBAH</th>
   </tr>

   <?php foreach ($rows as $row) { $id = $row['post_id']; ?>
     <tr>
       <td><?php echo $row['post_id']; ?></td>
       <td><?php echo $row['cat_id']; ?></td>
       <td><?php echo $row['tanggal']; ?></td>
       <td><?php echo $row['slug']; ?></td>
       <td><?php echo $row['title']; ?></td>
       <td><?php echo $row['keterangan']; ?></td>
       <td>
         <input type="submit" name="edit<?php echo $id ?>" value="EDIT">
       <?php
           if (isset($_POST['edit'.$id])) {
               header("Location: index.php?halaman=post_edit.php&id=$id");
             }

        ?>
       <input type="submit" value="HAPUS" name="thapus<?php echo $id ?>">
       <?php
       if (isset($_POST['thapus'.$id]))
       {
         $kat->hapus($id);
         header("Location: index.php?halaman=post.php&id=$d1");
       }
       ?>
     </td>
   </tr>

   <?php } ?>
 </table>
 <center><input type="submit" name="tam" value="TAMBAH"></center>
 <?php
   if (isset($_POST['tam'])) {
       header("Location: index.php?halaman=post_input.php");
     }
 ?>
</form>
