<!DOCTYPE html>
<?php
	session_start();
	include('../crud/crudLowongan.php');
	include('../fungsiTanggal.php');
	include('session.php');
	$sql   = "select perusahaan.*, kota.*, jurusan_pendidikan.*, kategori.*, lowongan.* from lowongan 
	          inner join perusahaan on perusahaan.id_perusahaan = lowongan.id_perusahaan
			  inner join kota on kota.id_kota = lowongan.id_kota
			  inner join jurusan_pendidikan on jurusan_pendidikan.id_jurusan = lowongan.id_jurusan
			  inner join kategori on  kategori.id_kategori = lowongan.id_kategori
			  order by id_lowongan desc";
	$data = bacaLowongan($sql);
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
	<link rel="stylesheet" href="../stylecss/styleheader.css" type="text/css">
	<link rel="stylesheet" href="../stylecss/stylebutton.css" type="text/css">
</head>
<body>
<div id="header">
		<div>
			<div id="logo">
				<a href="index.php"><img src="../images/logo.png" alt="LOGO"></a>
			</div>
			<ul id="navigation">
				<li class="selected">
					<a href="index.php">Beranda</a>
				</li>
				<li>
					<a href="tampil_perusahaan.php">Perusahaan</a>
				</li>
				<li>
					<a href="tampil_pelamar.php">Pelamar</a>
				</li>
				<li>
					<a href="logout.php">Logout</a>
				</li>
			</ul>
		</div>
	</div>
<body>
<br/>
<div align='center'>
<fieldset>
	<a href='tampil_kota.php' target='_blank'>Daftar Kota</a> &nbsp;&nbsp;
	<a href='tampil_jurusan.php' target='_blank'>Daftar Pendidikan</a> &nbsp;&nbsp;
	<a href='tampil_kategori.php' target='_blank'>Daftar Kategori</a> &nbsp;&nbsp;
	<a href='tampil_lamaran.php' target='_blank'>Daftar Lamaran</a> &nbsp;&nbsp;
</fieldset>
</div>

<h2>
	Tampil Data Lowongan &nbsp;&nbsp;&nbsp;
	<a href='cetak_lowongan.php' target='_blank'><button>Cetak</button></a>
</h2> 
<table align='center'>
	<tr>
		<th>No</th>
		<th>Tanggal Buat</th>
		<th>Nama Perusahaan</th>
		<th>Lowongan</th>
		<th>Konfirmasi</th>
		<th>Status</th>
	</tr>

	<?php
	$i = 0;
	if($data == null){
			echo "
				<tr>
					<td width='1100px' align='center' colspan='6'>
					<fieldset><i> - Belum ada lowongan yang tersedia - </i></fieldset>
					</td>
				</tr>
			";
		}
	if($data != null)
	foreach($data as $baris){
		$tgl_buat        = $baris['tgl_buat'];
		$nama_perusahaan = $baris['nama_perusahaan'];
		$pekerjaan       = $baris['pekerjaan'];
		$status          = $baris['status'];
		$tgl = tanggalIndo($tgl_buat);		
		$i++;
		
		//warna status
		$warna = '#fff';
		if($status == 'Publik'){
			$warna = '#95fd61';
		}
		elseif($status == 'Privat'){
			$warna = '#fea7f5';
		}
		elseif($status == 'Hapus'){
			$warna = '#fce6cd';
		}
		
		//pengeturan konfirmasi
		$konfirm = "<a href='konfirmasi/lowongan_publik.php?id_lowongan={$baris['id_lowongan']}' onClick='return confirm(\"Apakah Anda yakin akan mempublikasikan lowongan? \")'><img src='../images/publik.jpg'></a>
			        <a href='konfirmasi/lowongan_tolak.php?id_lowongan={$baris['id_lowongan']}' onClick='return confirm(\"Apakah Anda yakin akan memprivasi lowongan? \")'><img src='../images/privat.jpg'></a>";
		if($status == 'Publik'){
			$konfirm = "<i>Lowongan telah dipublikasi</i>";
		}
		elseif($status == 'Hapus'){
			$konfirm = "<i>Lowongan telah dihapus</i>";
		}
					
		echo "
		<tr>
			<td align='center'>$i</td>
			<td align='center'>$tgl</td>
			<td>$nama_perusahaan</td>
			<td><a href='detail_lowongan.php?id_lowongan={$baris['id_lowongan']}'>$pekerjaan</a></td>
			<td align='center' width='290px'>$konfirm</td>
			<td style='background-color:$warna;'>$status</td>
		</tr>
		";	
	}
	?>
</table>
</body>
</html>