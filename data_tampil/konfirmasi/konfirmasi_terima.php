<?php
	session_start();
	include('../../crud/crudLamaran.php');
	$id    = $_GET['id_lamaran'];
	$hasil = ubahTerima($id);
	header("Location: ../lowongan_perusahaan.php");
?>
