<?php
require_once "app/kategori.php";

$kat = new App\tcategory;
$rows = $kat->tampil();

?>
 <h2><center>DATA KATEGORI</h2></center>
<form  method="post">
 <table>
   <tr>
     <th><center>ID KATEGORI</th></center>
     <th><center>NAMA</th></center>
     <th><center>KETERANGAN</th></center>
     <th><center>EDIT</th></center>
     <th><center>HAPUS</th></center>
   </tr>

   <?php foreach ($rows as $row) { $id = $row['cat_id']; ?>

     <tr>
       <td><center><?php echo $row['cat_id']; ?></td></center>
       <td><center><?php echo $row['name']; ?></td></center>
       <td><center><?php echo $row['keterangan']; ?></td></center>
         <td><center><input type="submit" name="edit<?php echo $id ?>" value="EDIT"></td></center>
       <?php
           if (isset($_POST['edit'.$id])) {
               header("Location: index.php?halaman=kategori_edit.php&id=$id");
             }

        ?>
       <td><center><input type="submit" value="HAPUS" name="thapus<?php echo $id ?>"></td></center>
       <?php
       if (isset($_POST['thapus'.$id]))
       {
         $kat->hapus($id);
         header("Location: index.php?halaman=kategori.php&id=$d1");
       }
       ?>
     </td>
   </tr>

   <?php } ?>
 </table>
 <center><input type="submit" name="tam" value="TAMBAH"></center>
 <?php
   if (isset($_POST['tam'])) {
       header("Location: index.php?halaman=kategori_input.php");
     }
 ?>
</form>
