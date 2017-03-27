<?php
	session_start();
	include('../../crud/crudLowongan.php');
	$id    = $_GET['id_lowongan'];
	$hasil = hapusLow($id);
	header("Location: ../lowongan_perusahaan.php");
?>
