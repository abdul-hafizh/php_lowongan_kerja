<?php
	session_start();
	include('../../crud/crudLamaran.php');
	$id    = $_GET['id_lamaran'];
	$hasil = ubahTolak($id);
	header("Location: ../lowongan_perusahaan.php");
?>
