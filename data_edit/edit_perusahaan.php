<?php
	session_start();
	$tanggal = date('Y-m-d');
	include ('../crud/crudPerusahaan.php');
	include('../session.php');
	$id_perusahaan = $_GET['id_perusahaan'];
	$data2 = cariPerusahaan($id_perusahaan);
	$baca  = "select * from kota";
	$kota  = bacaKota($baca);
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
				<a href="../beranda_perusahaan.php"><img src="../images/logo.png" alt="LOGO"></a>
			</div>
			<ul id="navigation">
				<li>
					<a href="../beranda_perusahaan.php">Beranda</a>
				</li>
				<li class="selected">
					<a href="../data_tampil/profile_perusahaan.php">Profil</a>
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

<h2>Edit Data Perusahaan</h2>

	<form method="post" action="proses_edit/proses_ubah_perusahaan.php" >
	
	<table>	
	<input type="hidden" name="id_perusahaan" value="<?php echo $data2['id_perusahaan'];?>">
	<input type="hidden" name="tgl_daftar" value="<?php echo $tanggal;?>">
	
	<tr>
		<td style='padding-left:20px;' width='30%'>Nama Perusahaan</td> 
		<td><input type="text" name="nama_perusahaan" value="<?php echo $data2['nama_perusahaan'];?> "></td>
	</tr>
	<tr>
		<td style='padding-left:20px;'>Email</td> 
		<td><input type="email" name="email" value="<?php echo $data2['email'];?> "></td>
	</tr>
	<tr>
		<td style='padding-left:20px;'>Password</td> 
		<td><input type="text" name="password" value="<?php echo $data2['password'];?> "></td>
	</tr>
	<tr>
		<td style='padding-left:20px;'>Alamat</td> 
		<td><input type="textarea" name="alamat" value="<?php echo $data2['alamat'];?> "></td>
	</tr>

	<tr>
		<td style='padding-left:20px;'>Kota</td>
		<td>
			<select name='id_kota'>
			<option value="<?php echo $data2['id_kota'];?>"><?php echo $data2['nama_kota'];?></option>
			<?php
				foreach($kota as $baris){
				$id_kota       = $baris['id_kota'];
				$nama_kota     = $baris['nama_kota'];
			?>
			<option value="<?php echo $id_kota?>"><?php echo $nama_kota?></option>
			<?php } ?>
			</select>
		</td>
	</tr>

	<tr>
		<td style='padding-left:20px;'>No. Telepon</td> 
		<td><input type="text" name="no_telp" value="<?php echo $data2['no_telp'];?> "></td>
	</tr>
	<tr>
		<td style='padding-left:20px;'>No. HP</td> 
		<td><input type="text" name="no_hp" value="<?php echo $data2['no_hp'];?> "></td>
	</tr>
	<tr>
		<td style='padding-left:20px;'>Nama Kontak</td> 
		<td><input type="text" name="nama_kontak" value="<?php echo $data2['nama_kontak'];?> "></td>
	</tr>
	<tr>
		<td style='padding-left:20px;'>Situs</td>
		<td><input type="text" name="situs" value="<?php echo $data2['situs'];?> "></td>
	</tr>
	
	</table> <br/>
	
		<input type="reset" value="Batal">
		<input type="submit" name='edit' value="Edit">
		
</form>
</body>
</html>