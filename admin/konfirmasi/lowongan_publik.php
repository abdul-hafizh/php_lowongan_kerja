<?php
	include('../../crud/crudLowongan.php');

	$id = $_GET['id_lowongan'];
	
	$hasil = ubahPublik($id);
		
	header("Location: ../../admin/index.php");
?>
