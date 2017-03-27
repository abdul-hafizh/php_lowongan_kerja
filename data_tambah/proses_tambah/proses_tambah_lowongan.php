<?php
	include('../../crud/crudLowongan.php');
	
	$id_lowongan    = $_POST['id_lowongan'];
	$id_perusahaan  = $_POST['id_perusahaan'];
	$id_kategori    = $_POST['id_kategori'];
	$pekerjaan      = $_POST['pekerjaan'];
	$id_jurusan     = $_POST['id_jurusan'];
	$id_kota        = $_POST['id_kota'];
	$tgl_buat       = $_POST['tgl_buat'];
	$deskripsi      = $_POST['deskripsi'];
	$usia_max       = $_POST['usia_max'];
	$jenis_kelamin  = $_POST['jenis_kelamin'];
	$batas_lamaran  = $_POST['batas_lamaran'];
	$tipe_pekerjaan = $_POST['tipe_pekerjaan'];
	$persyaratan    = $_POST['persyaratan'];
	$tawaran_gaji   = $_POST['tawaran_gaji'];
	$status         = $_POST['status'];


	$hasil = tambahLowongan($id_lowongan,$id_kategori,$id_perusahaan,$id_kota,$id_jurusan,$tgl_buat,$pekerjaan,$tipe_pekerjaan,
					$deskripsi,$persyaratan,$tawaran_gaji,$usia_max,$jenis_kelamin,$batas_lamaran,$status);		
					
	if(!$hasil)
		echo "Gagal tambah";
	else
		echo "<script>alert('Lowongan Berhasil Disimpan')</script>";

	header("Location: ../../data_tampil/lowongan_perusahaan.php");
?>