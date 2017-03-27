<!DOCTYPE html>
<?php
	session_start();
	$id_lowongan = $_GET['id_lowongan'];
	include('../crud/crudLowongan.php');
	include('../fungsiTanggal.php');
	$sql   = "select perusahaan.*, kota.*, jurusan_pendidikan.*, kategori.*, lowongan.* from lowongan 
	          inner join perusahaan on perusahaan.id_perusahaan = lowongan.id_perusahaan
			  inner join kota on kota.id_kota = lowongan.id_kota
			  inner join jurusan_pendidikan on jurusan_pendidikan.id_jurusan = lowongan.id_jurusan
			  inner join kategori on  kategori.id_kategori = lowongan.id_kategori
	          where id_lowongan='$id_lowongan'";
	$data  = bacaLowongan($sql);
?>
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
				<a href="../default.php"><img src="../images/logo.png" alt="LOGO"></a>
			</div>
			<ul id="navigation">
				<li class="selected">
					<a href="../default.php">Beranda</a>
				</li>
				<li>
					<a href="../data_tambah/tambah_perusahaan.php">Perusahaan</a>
				</li>
				<li>
					<a href="../data_tambah/tambah_pelamar.php">Pelamar</a>
				</li>
				<li>
					<a href="../login/login.php">Login</a>
				</li>
			</ul>
		</div>
	</div>
		
<table>
	<tr>
		<td>
			<h2>Detail Lowongan</h2>
		</td>
	</tr>

	<?php
	foreach($data as $baris){
		$id_lowongan    = $baris['id_lowongan'];
		$id_perusahaan  = $baris['id_perusahaan'];
		$nama_perusahaan= $baris['nama_perusahaan'];
		$id_kota        = $baris['id_kota'];
		$id_jurusan     = $baris['id_jurusan'];				
		$tgl_buat       = $baris['tgl_buat'];
		$pekerjaan      = $baris['pekerjaan'];
		$tipe_pekerjaan = $baris['tipe_pekerjaan'];
		$deskripsi      = $baris['deskripsi'];
		$persyaratan    = $baris['persyaratan'];
		$tawaran_gaji   = $baris['tawaran_gaji'];
		$usia_max       = $baris['usia_max'];
		$jenis_kelamin  = $baris['jenis_kelamin'];
		$batas_lamaran  = $baris['batas_lamaran'];
		$nama_jurusan   = $baris['nama_jurusan'];
		$nama_kota      = $baris['nama_kota'];
		
		$tgl1   = tanggalIndo($tgl_buat);
		$tgl2   = tanggalIndo($batas_lamaran);
		$gender = jenisKelamin($jenis_kelamin);

		echo "
		<tr>
			<td> <pre> <fieldset>
	<b>$nama_perusahaan</b><br/>
	Tanggal Buat       : $tgl1           <br/>
	Pekerjaan          : $pekerjaan      <br/>
	Jurusan Pendidikan : $nama_jurusan   <br/>				
	Daerah Kerja       : $nama_kota      <br/>
	Tipe Pekerjaan     : $tipe_pekerjaan <br/>
	Deskripsi          : $deskripsi      <br/>
	Persyaratan        : $persyaratan    <br/>
	Tawaran Gaji       : $tawaran_gaji   <br/>
	Jenis Kelamin      : $gender         <br/>
	Usia Maksimal      : $usia_max Tahun <br/>
	Batas Lamaran      : $tgl2  <br/> <br/>
	<a href='../data_tambah/lamar_pekerjaan.php?id_lowongan={$baris['id_lowongan']}'><img src='../images/lamar.jpg'></a>
			</fieldset> </pre> </td>				
		</tr>
		";	
	}
	?>
</table>
</body>
</html>
