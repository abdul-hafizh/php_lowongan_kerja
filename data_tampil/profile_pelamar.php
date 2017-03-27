<?php
	session_start();
	$email = $_SESSION['email'];
	include('../crud/crudPelamar.php');
	include('../fungsiTanggal.php');
	include('../session2.php');
	$sql  = "select pelamar.*, kota.*, jurusan_pendidikan.* from pelamar 
			 inner join kota on pelamar.id_kota = kota.id_kota
			 inner join jurusan_pendidikan on pelamar.id_jurusan = jurusan_pendidikan.id_jurusan
			 where email='$email'";
	$data = bacaPelamar($sql);
?>
<style>
table {
    width: 80%;
    border-collapse: collapse;
}
table, td, th {
    border: 1px solid black;
    padding: 9px;
}
</style>

<!DOCTYPE html>
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
				<a href="../beranda_pelamar.php"><img src="../images/logo.png" alt="LOGO"></a>
			</div>
			<ul id="navigation">
				<li>
					<a href="../beranda_pelamar.php">Beranda</a>
				</li>
				<li class="selected">
					<a href="profile_pelamar.php">Profil</a>
				</li>
				<li>
					<a href="../data_tampil/tampil_lamaran.php">Lamaran</a>
				</li>
				<li>
					<a href="../login/logout_pelamar.php">Logout</a>
				</li>
			</ul>
		</div>
	</div>
	
	<br/>	
	<?php
	foreach($data as $baris){
		$id_pelamar    = $baris['id_pelamar'];
		$tgl_daftar    = $baris['tgl_daftar'];
		$nama_lengkap  = $baris['nama_lengkap'];
		$email         = $baris['email'];
		$password      = $baris['password'];
		$no_ktp        = $baris['no_ktp'];
		$tgl_lahir     = $baris['tgl_lahir'];
		$jenis_kelamin = $baris['jenis_kelamin'];
		$alamat        = $baris['alamat'];
		$nama_kota     = $baris['nama_kota'];
		$nama_jurusan  = $baris['nama_jurusan'];
		$no_hp         = $baris['no_hp'];
		$photo         = $baris['photo'];
		$tgl1   = tanggalIndo($tgl_daftar);
		$tgl2   = tanggalIndo($tgl_lahir);
		$gender = jenisKelamin($jenis_kelamin);

		echo "
		<div align='center'>
		<table>
			<tr>
				<th colspan='2' bgcolor='#e2e2e2'>
					<h3>Profil Anda</h3>
				</th>
			</tr>
			<tr>
				<td colspan='2' align='center'>
					<img src='../file_photo/$photo' width='150px' hight='250px'> <br/> <br/>
					<a href='../data_edit/edit_pelamar.php?id_pelamar=$id_pelamar'>
						<img align='middle' src='../images/editprofile.jpg' />
					</a>
				</td>
			</tr>

			<tr>
				<td align='right'>Tanggal Daftar : </td>
				<td>$tgl1</td>
			</tr>
			<tr>
				<td align='right'>Nama Lengkap : </td> 
				<td>$nama_lengkap</td>
			</tr>
			<tr>
				<td align='right'>Email : </td> 
				<td>$email</td>
			</tr>
			<tr>
				<td align='right'>Nomor KTP : </td> 
				<td>$no_ktp</td>
			</tr>
			<tr>
				<td align='right'>Tanggal Lahir : </td> 
				<td>$tgl2</td>
			</tr>
			<tr>
				<td align='right'>Jenis Kelamin : </td> 
				<td>$gender</td>
			</tr>
			<tr>
				<td align='right'>Alamat : </td> 
				<td>$alamat</td>
			</tr>
			<tr>
				<td align='right'>Kota : </td>
				<td>$nama_kota</td>
			</tr>
			<tr>
				<td align='right'>Jurusan Pendidikan : </td>
				<td>$nama_jurusan</td>
			</tr>
			<tr>
				<td align='right'>No HP : </td>
				<td>$no_hp</td>
			</tr>
			</table> <br/>
			</div>
		";	
	}
	?>
</table>
</body>
</html>