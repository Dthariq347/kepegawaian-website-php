<!-- hapus jabatan -->
<?php 
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}
	require 'fungsi.php';

$kd_jabatan = $_GET["kd_jabatan"];

if ( hapus2 ($kd_jabatan) > 0){
	echo "
		<script>
			alert('data berhasil dihapuskan!');
			document.location.href ='jabatan.php';
		</script>
	";
}

 ?>