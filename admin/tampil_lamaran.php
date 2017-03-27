<!DOCTYPE html>
<?php
	session_start();
	include('../crud/crudLamaran.php');
	include('session.php');
	include('../fungsiTanggal.php');
	$sql = "select *, lamaran.status from lamaran
			inner join pelamar on lamaran.id_pelamar = pelamar.id_pelamar
			inner join lowongan on lamaran.id_lowongan = lowongan.id_lowongan";
	$data = bacaLamaran($sql);
?>
<html>
<head>
	<title>Job Seeker</title>
	<link rel="stylesheet" href="../stylecss/stylebutton.css" type="text/css">
	<link rel="stylesheet" href="../stylecss/styleheader.css" type="text/css">
	<link rel="stylesheet" href="../stylecss/styletable.css" type="text/css">
</head>
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

<h2>
	Daftar Data Lamaran &nbsp;&nbsp;&nbsp;
	<a href='cetak_lamaran.php' target='_blank'><button>Cetak</button></a>
</h2> 

<table align='center'>
	<tr>
		<th>No</th>
		<th>Tanggal Lamar</th>
		<th>Nama Pelamar</th>
		<th>Nama Lampiran</th>
		<th>Nama Pekerjaan</th>
		<th>Status</th>
		<th>Batas Lamar</th>
	</tr>

	<?php
	$i = 0;
	if($data == null){
			echo "
				<tr>
					<td width='1100px' align='center' colspan='9'>
					<fieldset><i> - Belum ada kategori - </i></fieldset>
					</td>
				</tr>
			";
		}
	if($data != null)
	foreach($data as $baris){
		$id        = $baris['id_lamaran'];
		$tgl_lamar = $baris['tgl_lamar'];
		$lampiran  = $baris['lampiran'];
		$status    = $baris['status'];
		$pekerjaan = $baris['pekerjaan'];
		$pelamar   = $baris['nama_lengkap'];
		$batas     = $baris['batas_lamaran'];
		
		$tgl1  = tanggalIndo($tgl_lamar);
		$tgl2  = tanggalIndo($batas);
		$i++;
		echo "
		<tr>
			<td align='center'>$i</td>		
			<td>$tgl1</td>
			<td>$pelamar</td>
			<td>$lampiran</td>
			<td>$pekerjaan</td>
			<td>$status</td>
			<td>$tgl2</td>
		</tr>
		";	
	}
	?>
</table>
</body>
</html> 
