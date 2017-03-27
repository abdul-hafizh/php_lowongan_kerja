<?php
include('../../crud/crudPerusahaan.php');
$hapus = $_POST['hapus'];

if($hapus == "OK"){
	$id    = $_POST['id_perusahaan'];
	$hasil = hapusPerusahaan($id);
	
	header("Location: ../../data_tampil/tampil_perusahaan.php");
}
?>