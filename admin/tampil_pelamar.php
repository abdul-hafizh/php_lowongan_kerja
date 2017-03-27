<!DOCTYPE html>
<?php
	session_start();
	include('../crud/crudPelamar.php');
	include('session.php');
	include('../fungsiTanggal.php');
	$sql = "select kota.*, jurusan_pendidikan.*, pelamar.* from pelamar
		    inner join kota on kota.id_kota = pelamar.id_kota
			inner join jurusan_pendidikan on jurusan_pendidikan.id_jurusan = pelamar.id_jurusan";
	$data = bacaPelamar($sql);
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
				<li>
					<a href="index.php">Beranda</a>
				</li>
				<li>
					<a href="tampil_perusahaan.php">Perusahaan</a>
				</li>
				<li class="selected">
					<a href="tampil_pelamar.php">Pelamar</a>
				</li>
				<li>
					<a href="logout.php">Logout</a>
				</li>
			</ul>
		</div>
	</div>

<h2>
	Tampil Data Pelamar &nbsp;&nbsp;&nbsp;
	<a href='cetak_pelamar.php' target='_blank'><button>Cetak</button></a>
</h2> 

<table align='center'>
	<tr>
		<th>No</th>
		<th>Tanggal Daftar</th>
		<th>Nama Lengkap</th>
		<th>Email</th>
		<th>Jenis Kelamin</th>
		<th>Tanggal Lahir</th>
		<th>Alamat</th>
		<th>No HP</th>
		<th>Lihat Detail</th>
	</tr>

	<?php
	$i = 0;
	if($data == null){
			echo "
				<tr>
					<td width='1100px' align='center' colspan='9'>
					<fieldset><i> - Belum ada pelamar yang mendaftar - </i></fieldset>
					</td>
				</tr>
			";
		}
	if($data != null)
	foreach($data as $baris){
		$id_kota       = $baris['id_kota'];
		$id_jurusan     = $baris['id_jurusan'];
		$email         = $baris['email'];
		$password      = $baris['password'];
		$no_ktp        = $baris['no_ktp'];
		$tgl_daftar    = $baris['tgl_daftar'];
		$nama_lengkap  = $baris['nama_lengkap'];
		$jenis_kelamin = $baris['jenis_kelamin'];
		$tgl_lahir     = $baris['tgl_lahir'];
		$alamat        = $baris['alamat'];
		$no_hp         = $baris['no_hp'];
		$photo         = $baris['photo'];
		$tgl = tanggalIndo($tgl_daftar);
		$tgl2 = tanggalIndo($tgl_lahir);
		$gender = jenisKelamin($jenis_kelamin);
		$i++;
		echo "
		<tr>
			<td>$i</td>		
			<td>$tgl</td>			
			<td>$nama_lengkap</td>
			<td>$email</td>
			<td align='center'>$gender</td>
			<td>$tgl2</td>			
			<td>$alamat</td>
			<td>$no_hp</td>
			<td align='center'><a href='../admin/detail_tampil_pelamar.php?id_pelamar={$baris['id_pelamar']}'><img src='../images/cari.png'></a></td>
		</tr>
		";	
	}
	?>
</table>
</body>
</html> 
