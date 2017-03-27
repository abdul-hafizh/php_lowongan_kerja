<?php
	include('../../crud/crudLamaran.php');

	$id = $_GET['id_lamaran'];

	$hasil = ubahBatal($id);
			
	header("Location: ../tampil_lamaran.php");
	
?>