<!DOCTYPE html>
<?php
	session_start();
	include('../crud/crudLowongan.php');
	include('../fungsiTanggal.php');
	include('../session.php');
	$now   = date('Y-m-d');
	$id    = $_SESSION['id_perusahaan'];	
	$sql   = "select perusahaan.*, kota.*, jurusan_pendidikan.*, kategori.*, lowongan.* from lowongan 
	          inner join perusahaan on perusahaan.id_perusahaan = lowongan.id_perusahaan
			  inner join kota on kota.id_kota = lowongan.id_kota
			  inner join jurusan_pendidikan on jurusan_pendidikan.id_jurusan = lowongan.id_jurusan
			  inner join kategori on  kategori.id_kategori = lowongan.id_kategori
			  where perusahaan.id_perusahaan = '$id' and status not in('Hapus')
			  order by id_lowongan desc";
	$data  = bacaLowongan($sql);
?>
<html>
<head>
	<title>Job Seeker</title>
	<link rel="stylesheet" href="../stylecss/stylebutton.css" type="text/css">
	<link rel="stylesheet" href="../stylecss/styleheader.css" type="text/css">
	<link rel="stylesheet" href="../stylecss/styletable.css" type="text/css">
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

	<form action='../data_tambah/tambah_lowongan.php' method='post'>
		<h3>Daftar Lowongan Anda &nbsp;&nbsp;<input type='submit' name='tambah_lowongan' value='Tambah'></h3>	
	</form>
<table align='center'>
	<tr>
		<th>No</th>
		<th>Tanggal Buat</th>
		<th>Pekerjaan</th>
		<th>Kota</th>
		<th>Batas Lamaran</th>
		<th>Status</th>
		<th>Pelamar</th>
		<th>Edit</th>
		<th>Hapus</th>
	</tr>
	<?php
	if($data == null){
			echo "
				<tr>
					<td width='1100px' align='center' colspan = '9'>
					<fieldset><i> - Belum ada lowongan yang dibuat - </i></fieldset>
					</td>
				</tr>
			";
		}
	$i = 0;
	if($data != null){
	foreach($data as $baris){
		$id_lowongan   = $baris['id_lowongan'];
		$id_perusahaan = $baris['id_perusahaan'];
		$pekerjaan     = $baris['pekerjaan'];
		$id_jurusan    = $baris['id_jurusan'];
		$id_lowongan   = $baris['id_lowongan'];
		$id_kota       = $baris['id_kota'];
		$tgl_buat      = $baris['tgl_buat'];
		$deskripsi     = $baris['deskripsi'];
		$usia_max      = $baris['usia_max'];
		$jenis_kelamin = $baris['jenis_kelamin'];
		$batas_lamaran = $baris['batas_lamaran'];
		$status        = $baris['status'];
		$nama_kota     = $baris['nama_kota'];
		$i++;
		
		$tgl1 = tanggalIndo($tgl_buat);
		$tgl2 = tanggalIndo($batas_lamaran);
		$batas = strtotime($tgl2);
		
		$hapus = '<b>--</b>';
		
		$warna    = '#fff'; 
		$warnaTgl = '#fff';
		if($batas >= $now){
			$warnaTgl = '#fea7f5';
			$hapus = "<a href='konfirmasi/hapus_lowongan.php?id_lowongan={$baris['id_lowongan']}'
						onClick='return confirm(\"Apakah Anda yakin akan menghapus lowongan ini? \")'><img src='../images/delete.png'/></a>";
		}
		if($status == 'Publik'){
			$warna = '#95fd61';
		}
		elseif($status == 'Privat'){
			$warna = '#fea7f5';
		}
		
		echo "
		<tr>
			<td align='center'>$i</td>
			<td align='center'>$tgl1</td>
			<td>$pekerjaan</td>
			<td>$nama_kota</td>
			<td align='center' style='background-color:$warnaTgl;'>$tgl2</td>
			<td align='center' style='background-color:$warna;'>$status</td>
			<td align='center'><a href='detail_lamaran.php?id_lowongan={$baris['id_lowongan']}'><img src='../images/cari.png' alt='Lihat'/></a></td>
			<td align='center'><a href='../data_edit/edit_lowongan.php?id_lowongan={$baris['id_lowongan']}'><img src='../images/edit.png'/></a></td>
			<td align='center'>$hapus</td>
		</tr>
		";	
	}
	}
	?>
</table> 
<div align='center'>
<h3><a href='cetak_detail_lowongan.php' target='_blank'><button>Cetak</button></a></h3>
<div>
</body>
</html>
