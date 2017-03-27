<!DOCTYPE html>
<?php
	session_start();
	include('../crud/crudPelamar.php');
	include('../fungsiTanggal.php');
	include('session.php');
	$pelamar = $_GET['id_pelamar'];
	$sql  = "select kota.*, jurusan_pendidikan.*, pelamar.* from pelamar
		     inner join kota on kota.id_kota = pelamar.id_kota
			 inner join jurusan_pendidikan on jurusan_pendidikan.id_jurusan = pelamar.id_jurusan
			 where id_pelamar='$pelamar'";
	$data = bacaPelamar($sql);
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
				<a href="../admin/admin.php"><img src="../images/logo.png" alt="LOGO"></a>
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


<h2>Tampil Data Pelamar</h2> 

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
		$tgl1 = tanggalIndo($tgl_daftar);
		$tgl2 = tanggalIndo($tgl_lahir);
		$gender = jenisKelamin($jenis_kelamin);
		echo "
	<pre style='padding-left:20px;'> 	
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
			No HP          : $no_hp <br/>
	</pre> 
		";	
		
	} 
	?>
	
</body>
</html> 
