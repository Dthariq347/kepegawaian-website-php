<!-- hapus jabatan -->
<?php 
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}
	require 'fungsi.php';

$kd_jabatan = $_GET["kd_jabatan"];
$gol = $_GET["gol"];

if ( hapus4 ($kd_jabatan, $gol) > 0){
	echo "
		<script>
			alert('data berhasil dihapuskan!');
			document.location.href ='gopak.php';
		</script>
	";
}

 ?>