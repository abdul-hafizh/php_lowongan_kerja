<?php
include('../../crud/crudLowongan.php');
$hapus = $_POST['hapus'];

if($hapus == "OK"){
	$id    = $_POST['id_lowongan'];
	$hasil = hapusLowongan($id);
	
	header("Location: ../../data_tampil/lowongan_perusahaan.php");
}
?>