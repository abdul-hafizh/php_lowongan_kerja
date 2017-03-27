<!DOCTYPE html>
<html>
<head>
	<title>Job Seeker</title>
	<link rel="stylesheet" href="../stylecss/stylebutton.css" type="text/css">
	<link rel="stylesheet" href="../stylecss/styleheader.css" type="text/css">
</head>
<div id="header">
		<div>
			<div id="logo">
				<a href="../admin/admin.php"><img src="../images/logo.png" alt="LOGO"></a>
			</div>
			<ul id="navigation">
				<li>
					<a href="../admin/admin.php">Beranda</a>
				</li>
				<li>
					<a href="../data_tampil/tampil_perusahaan.php">Perusahaan</a>
				</li>
				<li class="selected">
					<a href="../data_tampil/tampil_pelamar.php">Pelamar</a>
				</li>
				<li>
					<a href="../admin/logout.php">Logout</a>
				</li>
			</ul>
		</div>
	</div>

<body>
<?php
	session_start();
	include('../crud/crudPelamar.php');
	include('../session.php');
	$id   = $_GET['id_pelamar'];
	$sql  = "select kota.*, jurusan_pendidikan.*, pelamar.* from pelamar 
			 inner join kota on kota.id_kota = pelamar.id_kota
			 inner join jurusan_pendidikan on jurusan_pendidikan.id_jurusan = pelamar.id_jurusan
			 where id_pelamar='$id'";
	$data = bacaPelamar($sql);
?>
<h2>Hapus Data Pelamar</h2> 

<img src="../file_photo/<?php foreach($data as $baris){
	$photo = $baris['photo'];
	echo $photo;	
} ?>" width='150' height='180' align='left'> &nbsp;

<?php
foreach($data as $baris){
	$email      = $baris['email'];
	$tgl_daftar = $baris['tgl_daftar'];
	$nama       = $baris['nama_lengkap'];
	$no_hp      = $baris['no_hp'];
	$gender     = $baris['jenis_kelamin'];
	echo " <pre>
   Tanggal Daftar : $tgl_daftar <br/>
   Nama Lengkap   : $nama <br/>
   Email Pelamar  : $email <br/>
   Jenis Kelamin  : $gender <br/>
   No HP          : $no_hp 
	</pre>
	";	
}
?>
<br/>
<h3>Apakah anda akan menghapus pelamar ini ? </h3>
<form method="post" action="proses_hapus/proses_hapus_pelamar.php">
	<input type="hidden" name="id_pelamar" value="<?php echo $id?>">
	<input type="submit" name="hapus" value="OK">
</form>
</body>
</html>