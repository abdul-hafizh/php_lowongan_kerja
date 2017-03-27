<!DOCTYPE html>
<?php
	session_start();
	include('../crud/crudLamaran.php');
	include('../fungsiTanggal.php');
	include('../session.php');
	$id_lowongan = $_GET['id_lowongan'];
	$sql   = "select pelamar.*, lowongan.*, lamaran.* from lamaran
		      inner join pelamar on lamaran.id_pelamar = pelamar.id_pelamar
			  inner join lowongan on lamaran.id_lowongan = lowongan.id_lowongan
			  where lowongan.id_lowongan = '$id_lowongan'";
	$data  = bacaLamaran($sql);
	
	$id = "select pekerjaan from lowongan where id_lowongan='$id_lowongan'";
	$data2  = bacaK($id);
?>
<style>
table {
    width: 98%;
    border-collapse: collapse;
}
table, td, th {
    border: 1px solid black;
    padding: 9px;
}
th{
	background-color:#e2e2e2;
}
</style>

<html>
<head>
	<title>Job Seeker</title>
	<link rel="stylesheet" href="../stylecss/stylebutton.css" type="text/css">
	<link rel="stylesheet" href="../stylecss/styleheader.css" type="text/css">
</head>
<body>
<div id="header">
		<div>
			<div id="logo">
				<a href="../beranda_perusahaan.php"><img src="../images/logo.png" alt="LOGO"></a>
			</div>
			<ul id="navigation">
				<li>
					<a href="../beranda_perusahaan.php">Beranda</a>
				</li>
				<li>
					<a href="profile_perusahaan.php">Profil</a>
				</li>
				<li class="selected">
					<a href="lowongan_perusahaan.php">Lowongan</a>
				</li>
				<li>
					<a href="../login/logout_perusahaan.php">Logout</a>
				</li>
			</ul>
		</div>
</div>
	
	<?php 
		if($data2 != null)
		foreach($data2 as $baris){
			$nama_pekerjaan  = $baris['pekerjaan'];
		}
	?>
	
	<h2>Daftar Pelamar 	<?php if($data2 != null) echo $nama_pekerjaan; ?></h2>	
	
<table align='center'>
	<tr>
		<th>No</th>
		<th>Tanggal Lamar</th>
		<th>Nama Pelamar</th>
		<th>Lihat Detail</th>
		<th>Konfirmasi</th>
		<th>Status</th>
	</tr>
	
	<?php
	if($data == null){
			echo "
				<tr>
					<td width='1100px' align='center' colspan = '6'>
					<fieldset><i> - Belum ada lamaran - </i></fieldset>
					</td>
				</tr>
			";
		}
	$i = 0;
	if($data != null){
	foreach($data as $baris){
		$tgl_lamar   = $baris['tgl_lamar'];
		$id_lowongan = $baris['id_lowongan'];
		$status      = $baris['status'];
		$nama        = $baris['nama_lengkap'];
		$i++;
		$tgl = tanggalIndo($tgl_lamar);
		
		//warna status
		$warna = '#fff';
		if($status == 'Diterima'){
			$warna = '#95fd61';
		}
		elseif($status == 'Ditolak'){
			$warna = '#fea7f5';
		}
		elseif($status == 'Batal'){
			$warna = '#fce6cd';
		}
		
		//pengeturan konfirmasi
		$konfirm = "<a href='konfirmasi/konfirmasi_terima.php?id_lamaran={$baris['id_lamaran']}' onClick='return confirm(\"Apakah Anda yakin akan menerima pelamar ini? \")'><img src='../images/terima.jpg'></a>&nbsp;&nbsp;
					<a href='konfirmasi/konfirmasi_tolak.php?id_lamaran={$baris['id_lamaran']}' onClick='return confirm(\"Apakah Anda yakin akan menolak pelamar ini? \")'><img src='../images/tolak.jpg'></a>";
		if($status == 'Batal'){
			$konfirm = "<i>Tidak dapat dikonfirmasi</i>";
		}
		elseif($status == 'Diterima'){
			$konfirm = "<i>Pelamar telah diterima</i>";
		}
		elseif($status == 'Ditolak'){
			$konfirm = "<i>Pelamar telah ditolak</i>";
		}
		echo "
		<tr>
			<td align='center'>$i</td>
			<td align='center'>$tgl</td>
			<td>$nama</td>
			<td align='center'><a href='download_file_pelamar.php?id_pelamar={$baris['id_pelamar']}'><img src='../images/detail_pelamar.jpg'></a></td>
			<td align='center' width='290px'>$konfirm</td>
			<td align='center' style='background-color:$warna'>$status</td>			
		</tr>
		";	
	}
	}
	?>
</table>
</body>
</html>
