<?php
	include('../../crud/crudLamaran.php');

	$id_pelamar  = $_POST['id_pelamar'];
	$id_lowongan = $_POST['id_lowongan'];
	$tgl_lamar   = $_POST['tgl_lamar'];
	$status      = $_POST['status'];
	
	$lokasi_file = $_FILES['lampiran']['tmp_name'];
	$tipe_file   = $_FILES['lampiran']['type'];
	$lampiran    = $_FILES['lampiran']['name'];
	$direktori   = "../../file_lampiran/$lampiran";
	
	move_uploaded_file($lokasi_file,$direktori); 

	$hasil = tambahLamaran($id_lamaran,$id_pelamar,$id_lowongan,$tgl_lamar,$lampiran,$status);
			
	header("Location: ../../data_tampil/tampil_lamaran.php");
?>