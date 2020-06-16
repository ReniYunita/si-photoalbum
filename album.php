<?php
require_once "app/album.php";
$kat = new App\talbum;
$rows = $kat->tampil();

?>
 <h2><center>DATA ALBUM</h2></center>
<form  method="post">
 <table>
   <tr>
     <th>ID ALBUM</th>
     <th>ID FOTO</th>
     <th>NAMA ALBUM</th>
     <th>KETERANGAN</th>
     <th>UBAH</th>
   </tr>

   <?php foreach ($rows as $row) { $id = $row['album_id']; ?>
     <tr>
       <td><?php echo $row['album_id']; ?></td>
       <td><?php echo $row['photos_id']; ?></td>
       <td><?php echo $row['name']; ?></td>
       <td><?php echo $row['keterangan']; ?></td>
       <td>
         <input type="submit" name="edit<?php echo $id ?>" value="EDIT">
       <?php
           if (isset($_POST['edit'.$id])) {
               header("Location: index.php?halaman=album_edit.php&id=$id");
             }

        ?>
       <input type="submit" value="HAPUS" name="thapus<?php echo $id ?>">
       <?php
       if (isset($_POST['thapus'.$id]))
       {
         $kat->hapus($id);
         header("Location: index.php?halaman=album.php&id=$d1");
       }
       ?>
     </td>
   </tr>

   <?php } ?>
 </table>
 <center><input type="submit" name="tam" value="TAMBAH"></center>
 <?php
   if (isset($_POST['tam'])) {
       header("Location: index.php?halaman=album_input.php");
     }
 ?>
</form>
