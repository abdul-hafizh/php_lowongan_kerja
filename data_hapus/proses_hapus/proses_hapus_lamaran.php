<?php
include('../../crud/crudLamaran.php');
$hapus = $_POST['hapus'];

if($hapus == "OK"){
	$id    = $_POST['id_lamaran'];
	$hasil = hapusLamaran($id);
	
	header("Location: ../../data_tampil/tampil_lamaran.php");
}
?>