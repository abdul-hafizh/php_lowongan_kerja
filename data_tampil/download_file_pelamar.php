<!DOCTYPE html>
<?php
	session_start();
	include('../crud/crudPelamar.php');
	include('../fungsiTanggal.php');
	include('../session.php');
	$pelamar = $_GET['id_pelamar'];
	
	$sql  = "select kota.*, jurusan_pendidikan.*, pelamar.* from pelamar
		     inner join kota on kota.id_kota = pelamar.id_kota
			 inner join jurusan_pendidikan on jurusan_pendidikan.id_jurusan = pelamar.id_jurusan
			 where id_pelamar='$pelamar'";
	$data = bacaPelamar($sql);
	
	$sql2 = "select lampiran from lamaran where id_pelamar='$pelamar'";
	$data2 = bacaLampiran($sql2);
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
			$lampiran = $baris['lampiran'];
		}
	?>
	
	<?php 
		if($data != null)
		foreach($data as $baris){
			$nama = $baris['nama_lengkap'];
		}
	?>

	<h2>Tampil Data <?php echo $nama;?></h2> 

	<?php
	foreach($data as $baris){
		$id_kota       = $baris['nama_kota'];
		$id_jurusan    = $baris['nama_jurusan'];
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
		
		$tgl1   = tanggalIndo($tgl_daftar);
		$tgl2   = tanggalIndo($tgl_lahir);
		$gender = jenisKelamin($jenis_kelamin);
		echo "
	<pre> <fieldset>
	<img src='../file_photo/$photo ' width='150' height='180' align='left' />  
	Nomor KTP      : $no_ktp <br/>
	Email          : $email <br/>
	Tanggal Daftar : $tgl1 <br/>
	Nama Lengkap   : $nama_lengkap <br/>
	Jurusan        : $id_jurusan <br/>
	Jenis Kelamin  : $gender <br/>
			Tempat Lahir   : $id_kota <br/>
			Tanggal Lahir  : $tgl2 <br/>
			Alamat         : $alamat <br/>
			No HP          : $no_hp <br/> <br/>
			<a href='../proses_download.php?file=$lampiran'><img src='../images/download.jpg'></a>
			</fieldset>
	</pre> 	";	
	} 
	?>
	
</body>
</html> 
