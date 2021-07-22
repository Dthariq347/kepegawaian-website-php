<!-- hapus jabatan -->
<?php 
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}
	require 'fungsi.php';

$gol = $_GET["gol"];

if ( hapus3 ($gol) > 0){
	echo "
		<script>
			alert('data berhasil dihapuskan!');
			document.location.href ='golongan.php';
		</script>
	";
}

 ?>