<?php
include('../../crud/crudPelamar.php');
$hapus = $_POST['hapus'];

if($hapus == "OK"){
	$id    = $_POST['id_pelamar'];
	$hasil = hapusPelamar($id);
	
	header("Location: ../../data_tampil/tampil_pelamar.php");
}
?>