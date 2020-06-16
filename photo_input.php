<?php
require_once "app/post.php";
require_once "app/photo.php";
$cmb = new App\tpost;
$kat = new App\tphotos;
$dat1 = $cmb->tampil();

if (isset($_POST['tsimpan'])) {
  $kat->tambah($_POST['pid'],$_POST['tanggal'], $_POST['title'], $_POST['keterangan'] );
  header("Location: index.php?halaman=photo.php");
}

?>
<h2>INPUT DATA FOTO</h2>
  <table>
<form action="" method="POST">
    <tr>
      <th>ID POST</th>
      <td>
        <select name="pid">
          <?php foreach ($dat1 as $row ) { ?>
          <option value="<?php echo $row['post_id']; ?>"><?php echo $row['title']; ?></option>
          <?php } ?>
        </select>
      </td>
    </tr>
    <tr>
      <th>TANGGAL</th>
      <td><input type="date" name="tanggal"></td>
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
