<?php
		session_start();
		if (!isset($_SESSION['nama'])) {
				header('location:login.php');
			}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi</title>
	<link rel="stylesheet" type="text/css" href="layout/assets/css/style.css">
</head>
<body>
	<div class="utama">
		<div class="kepala">
			<?php include "header.php"; ?>
			</div>
	<div class="menu">
		<?php include "menu.php"; ?>
	</div>
	<div class="isi">

			<?php 
					if (isset($_GET['halaman']))
					{
						include $_GET['halaman'];
					} else {
						include	"utama.php";
					}
			 ?>

		</div>
		<div class="footer">
			
			<?php include "footer.php"; ?>

		</div>

	</div>

</body>
</html>