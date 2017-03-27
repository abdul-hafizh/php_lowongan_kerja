<?php
	include('../../crud/crudPerusahaan.php');

	$id_kota         = $_POST['id_kota'];
	$email           = $_POST['email'];
	$password        = $_POST['password'];
	$tgl_daftar      = $_POST['tgl_daftar'];
	$nama_perusahaan = $_POST['nama_perusahaan'];
	$alamat          = $_POST['alamat'];
	$no_telp         = $_POST['no_telp'];
	$situs           = $_POST['situs'];
	$nama_kontak     = $_POST['nama_kontak'];
	$no_hp           = $_POST['no_hp'];

	$hasil = tambahPerusahaan($id_perusahaan,$id_kota,$email,$password,$tgl_daftar,
			$nama_perusahaan,$alamat,$no_telp,$situs,$nama_kontak,$no_hp);
			
	header("Location: ../../login/login.php");
?>