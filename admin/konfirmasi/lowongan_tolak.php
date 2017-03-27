<?php
	include('../../crud/crudLowongan.php');

	$id = $_GET['id_lowongan'];
	
	$hasil = ubahTolak($id);
		
	header("Location: ../../admin/index.php");
?>
