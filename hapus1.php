<!-- hapus karyawan -->
<?php 
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}
	require 'fungsi.php';

$nip = $_GET["nip"];

if ( hapus1 ($nip) > 0){
	echo "
		<script>
			alert('data berhasil dihapuskan!');
			document.location.href ='karyawan.php';
		</script>
	";
}

 ?>