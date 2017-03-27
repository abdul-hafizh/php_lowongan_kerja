<!DOCTYPE html>
<?php
	session_start();
	include('../crud/crudLamaran.php');
	include('../session2.php');
	include('../fungsiTanggal.php');
	$now = date('Y-m-d');
	$id_pelamar = $_SESSION['id_pelamar'];	
	$sql   = "select pelamar.*, lowongan.*, lamaran.* from lamaran
		      inner join pelamar on lamaran.id_pelamar = pelamar.id_pelamar
			  inner join lowongan on lamaran.id_lowongan = lowongan.id_lowongan 
			  where pelamar.id_pelamar = '$id_pelamar'
			  order by id_lamaran desc";
	$data  = bacaLamaran($sql);
	
	$id = "select * from pelamar where id_pelamar = '$id_pelamar'";
	$data2 = bacaN($id);
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

<body onLoad='window.print()'>
<h1>Joobseekers</h1> <hr/>
	<?php 
		if($data2 != null)
		foreach($data2 as $baris){
			$nama  = $baris['nama_lengkap'];
		}
	?>
	
	<h2>Daftar Lamaran 	<?php if($data != null) echo $nama; ?></h2>	
	
<table align='center'>
	<tr>
		<th>No</th>
		<th>Tanggal Lamar</th>
		<th>Nama Pekerjaan</th>
		<th>Lampiran</th>
		<th>Batas Lamaran</th>
		<th>Status</th>
	</tr>
	
	<?php
	$i = 0;
		if($data == null){
			echo "
				<tr>
					<td width='1100px' align='center' colspan = '6'>
					<fieldset><i> - Belum ada lamaran - </i></fieldset>
					</td>
				</tr>
			";
		}

	if($data != null){
	foreach($data as $baris){
		$tgl_lamar   = $baris['tgl_lamar'];
		$id_lowongan = $baris['id_lowongan'];
		$pekerjaan   = $baris['pekerjaan'];
		$lampiran    = $baris['lampiran'];
		$status      = $baris['status'];
		$batas     = $baris['batas_lamaran'];
		
		$tgl = tanggalIndo($tgl_lamar);
		$tgl2 = tanggalIndo($batas);
		$i++;
		
		//warna status
		$warna = '#fff';
		if($status == 'Ditolak'){
			$warna = '#fea7f5';
		}
		elseif($status == 'Diterima'){
			$warna = '#95fd61';
		}
		elseif($status == 'Batal'){
			$warna = '#fce6cd';
		}
		
		
		//konfirmasi batal
		$batal = "<a href='konfirmasi/konfirmasi_batal.php?id_lamaran={$baris['id_lamaran']}' 
						onClick='return confirm(\"Apakah Anda yakin akan membatalkan lamaran ini? \")'>
				  <img src='../images/delete.png' /></a>";
				  
		$deadline = strtotime($batas);
		$sekarang = strtotime($now);
		
		$warnaStatus = '#fff';
		if($deadline <= $sekarang){
			$warnaStatus = '#fea7f5';
			$batal = '<b>--</b>';
		}
		
		
		if($status == 'Diterima'){
			$batal = '<b>--</b>';
		}
		elseif($status == 'Ditolak'){
			$batal = '<b>--</b>';
		}
		echo "
		<tr>
			<td align='center'>$i</td>
			<td align='center'>$tgl</td>
			<td>$pekerjaan</td>
			<td>$lampiran</td>
			<td style='background-color:$warnaStatus;'>$tgl2</td>
			<td style='background-color:$warna;'>$status</td>
		</tr>
		";	
	}
	}
	?>
</table>
</body>
</html>
