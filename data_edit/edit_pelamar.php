<?php
	session_start();
	$tanggal = date('Y-m-d');
	include ('../crud/crudPelamar.php');
	include('../session2.php');
	$id_pelamar = $_GET['id_pelamar'];
	$data = cariPelamar($id_pelamar);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Job Seeker</title>
	<link rel="stylesheet" href="../stylecss/stylebutton.css" type="text/css">
	<link rel="stylesheet" href="../stylecss/styleheader.css" type="text/css">
	<link rel="stylesheet" href="../stylecss/styleinput.css" type="text/css">
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
					<a href="../data_tampil/profile_pelamar.php">Profil</a>
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
		
<h2>Edit Pelamar</h2> 
	<form method="post" action="proses_edit/proses_ubah_pelamar.php">
	
	<table>
	<input type="hidden" name="id_pelamar" value="<?php echo $data['id_pelamar'];?>">
	<input type="hidden" name="tgl_daftar" value="<?php echo $tanggal;?>">
	
	<tr>
		<td style='padding-left:20px;'>Email</td> 
		<td><input type="email" name="email" value="<?php echo $data['email'];?> " /></td>
	</tr>
	<tr>
		<td style='padding-left:20px;'>Password</td> 
		<td><input type="text" name="password" value="<?php echo $data['password'];?> " /></td>
	</tr>
	<tr>
		<td style='padding-left:20px;'>No KTP</td>
		<td><input type="text" name="no_ktp" value="<?php echo $data['no_ktp'];?> " /></td>
	</tr>
	<tr>
		<td style='padding-left:20px;'>Nama Lengkap</td>
		<td><input type="text" name="nama_lengkap" value="<?php echo $data['nama_lengkap'];?> " /></td>
	</tr>
	<tr>
		<td style='padding-left:20px;'>Bidang</td> 
		<td><input type="text" name="id_jurusan" value="<?php echo $data['id_jurusan'];?> " /></td>
	</tr>
	<tr>
		<td style='padding-left:20px;'>Jenis Kelamin</td> 
		<td><input type="text" name="jenis_kelamin" value="<?php echo $data['jenis_kelamin'];?> " /></td>
	</tr>
	<tr>
		<td style='padding-left:20px;'>Tanggal Lahir</td> 
		<td><input type="date" name="tgl_lahir" value="<?php echo $data['tgl_lahir'];?> " /></td>
	</tr>
	<tr>
		<td style='padding-left:20px;'>Alamat</td>
		<td><input type='text' name='alamat' value='<?php echo $data['alamat'];?>' /></td>
	</tr>
	<tr>
		<td style='padding-left:20px;'>Kota</td> 
		<td><input type="text" name="id_kota" value="<?php echo $data['id_kota'];?> " /></td>
	</tr>
	<tr>
		<td style='padding-left:20px;'>No HP</td> 
		<td><input type="text" name="no_hp" value="<?php echo $data['no_hp'];?> " /></td>
	</tr>
	
	<input type="hidden" name="photo" value="<?php echo $data['photo'];?> "/>
	
	</table> <br/>
	
		<input type="reset" value="Batal">
		<input type="submit" name='edit' value="Edit">
		
</form>
</body>
</html>