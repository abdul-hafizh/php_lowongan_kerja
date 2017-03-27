<?php
include('../../crud/crudPelamar.php');

$edit = $_POST['edit'];

if($edit == "Edit"){
	$id_pelamar    = $_POST['id_pelamar'];
	$tgl_daftar    = $_POST['tgl_daftar'];
	$nama_lengkap  = $_POST['nama_lengkap'];
	$email         = $_POST['email'];
	$password      = $_POST['password'];
	$no_ktp        = $_POST['no_ktp'];
	$id_jurusan    = $_POST['id_jurusan'];
	$tgl_lahir     = $_POST['tgl_lahir'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$alamat        = $_POST['alamat'];
	$id_kota       = $_POST['id_kota'];
	$no_hp         = $_POST['no_hp'];
	$photo         = $_POST['photo'];
/*
	$lokasi_file = $_FILES['photo']['tmp_name'];
	$tipe_file   = $_FILES['photo']['type'];
	$photo       = $_FILES['photo']['name'];
	$direktori   = "../../file_photo/$photo";
	move_uploaded_file($lokasi_file,$direktori); 
*/
	$hasil = ubahPelamar($id_pelamar,$id_kota,$id_jurusan,$email,$password,$no_ktp,$tgl_daftar,
					$nama_lengkap,$jenis_kelamin,$tgl_lahir,$alamat,$no_hp,$photo);
}
	header("Location: ../../data_tampil/profile_pelamar.php");
?>