<?php
require_once "app/photo.php";
require_once "app/album.php";
$cmb = new App\tphotos;
$kat = new App\talbum;
$dat1 = $cmb->tampil();

if (isset($_POST['tsimpan'])) {
  $kat->tambah($_POST['phid'],$_POST['name'], $_POST['keterangan'] );
  header("Location: index.php?halaman=album.php");
}

?>
<h2>INPUT DATA ALBUM</h2>
  <table>
<form action="" method="POST">
    <tr>
      <th>ID FOTO</th>
      <td>
        <select name="phid">
          <?php foreach ($dat1 as $row ) { ?>
          <option value="<?php echo $row['photos_id']; ?>"><?php echo $row['title']; ?></option>
          <?php } ?>
        </select>
      </td>
    </tr>
    <tr>
      <th>NAMA ALBUM</th>
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
