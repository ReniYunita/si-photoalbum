<?php
require_once "app/photo.php";
$kat = new App\tphotos;
$rows = $kat->tampil();

?>
 <h2><center>DATA PHOTO</h2></center>
<form  method="post">
 <table>
   <tr>
     <th>ID FOTO</th>
     <th>ID POST</th>
     <th>TANGGAL</th>
     <th>TITLE</th>
     <th>KETERANGAN</th>
     <th>UBAH</th>
   </tr>

   <?php foreach ($rows as $row) { $id = $row['photos_id']; ?>
     <tr>
       <td><?php echo $row['photos_id']; ?></td>
       <td><?php echo $row['post_id']; ?></td>
       <td><?php echo $row['tanggal']; ?></td>
       <td><?php echo $row['title']; ?></td>
       <td><?php echo $row['keterangan']; ?></td>
       <td>
         <input type="submit" name="edit<?php echo $id ?>" value="EDIT">
       <?php
           if (isset($_POST['edit'.$id])) {
               header("Location: index.php?halaman=photo_edit.php&id=$id");
             }

        ?>
       <input type="submit" value="HAPUS" name="thapus<?php echo $id ?>">
       <?php
       if (isset($_POST['thapus'.$id]))
       {
         $kat->hapus($id);
         header("Location: index.php?halaman=photo.php&id=$d1");
       }
       ?>
     </td>
   </tr>

   <?php } ?>
 </table>
 <center><input type="submit" name="tam" value="TAMBAH"></center>
 <?php
   if (isset($_POST['tam'])) {
       header("Location: index.php?halaman=photo_input.php");
     }
 ?>
</form>
