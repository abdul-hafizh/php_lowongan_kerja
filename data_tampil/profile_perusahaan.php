<?php
	session_start();
	$email = $_SESSION['email'];
	include('../crud/crudPerusahaan.php');
	include('../fungsiTanggal.php');
	include('../session.php');
	$sql  = "select perusahaan.*, kota.* from perusahaan 
			 inner join kota on perusahaan.id_kota = kota.id_kota
			 where email='$email'";
	$data = bacaPerusahaan($sql);
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
				<a href="../beranda_perusahaan.php"><img src="../images/logo.png" alt="LOGO"></a>
			</div>
			<ul id="navigation">
				<li>
					<a href="../beranda_perusahaan.php">Beranda</a>
				</li>
				<li class="selected">
					<a href="profile_perusahaan.php">Profil</a>
				</li>
				<li>
					<a href="../data_tampil/lowongan_perusahaan.php">Lowongan</a>
				</li>
				<li>
					<a href="../login/logout_perusahaan.php">Logout</a>
				</li>
			</ul>
		</div>
	</div>

	<br/>	
	<?php
	foreach($data as $baris){
		$id_perusahaan   = $baris['id_perusahaan'];
		$nama_kota       = $baris['nama_kota'];
		$email           = $baris['email'];
		$password        = $baris['password'];
		$tgl_daftar      = $baris['tgl_daftar'];
		$nama_perusahaan = $baris['nama_perusahaan'];
		$alamat          = $baris['alamat'];
		$no_telp         = $baris['no_telp'];
		$situs           = $baris['situs'];
		$nama_kontak     = $baris['nama_kontak'];
		$no_hp           = $baris['no_hp'];
		
		$tgl = tanggalIndo($tgl_daftar);
		
		echo "
		<div align='center'>
		<table>
			<tr>
				<th colspan='2' bgcolor='#e2e2e2'>
					<h3>Profil Perusahaan Anda</h3>
				</th>
			</tr>
			<tr>
				<td align='right'>Tanggal Daftar : </td>
				<td>$tgl</td>
			</tr>
			<tr>
				<td align='right'>Nama Perusahaan : </td> 
				<td>$nama_perusahaan</td>
			</tr>
			<tr>
				<td align='right'>Email : </td> 
				<td>$email</td>
			</tr>
			<tr>
				<td align='right'>Password : </td> 
				<td>$password</td>
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
				<td align='right'>No Telepon : </td>
				<td>$no_telp</td>
			</tr>
			<tr>
				<td align='right'>No HP : </td>
				<td>$no_hp</td>
			</tr>
			<tr>
				<td align='right'>Nama Kontak : </td>
				<td>$nama_kontak</td>
			</tr>
			<tr>
				<td align='right'>Situs : </td>
				<td>$situs</td>
			</tr>
			<tr>
				<td colspan='2' align='center'>
					<a href='../data_edit/edit_perusahaan.php?id_perusahaan=$id_perusahaan'>
						<img align='middle' src='../images/editprofile.jpg' />
					</a>
				</td>
			</tr>
			</table>
			</div>
		";	
	}
	?>
	
</table>
</body>
</html>