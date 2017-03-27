<?php
	$tanggal = date('Y-m-d');
	include('../crud/crudKota.php');
	$sql    = "select * from kota";
	$data   = bacaKota($sql);
	
	$baca    = "select * from jurusan_pendidikan";
	$jurusan = bacaJurusan($baca);
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
				<a href="../default.php"><img src="../images/logo.png" alt="LOGO"></a>
			</div>
			<ul id="navigation">
				<li>
					<a href="../default.php">Beranda</a>
				</li>
				<li>
					<a href="tambah_perusahaan.php">Perusahaan</a>
				</li>
				<li class="selected">
					<a href="tambah_pelamar.php">Pelamar</a>
				</li>
				<li>
					<a href="../login/login.php">Login</a>
				</li>
			</ul>
		</div>
	</div>

<h2>Pendaftaran Pelamar</h2> 
	<form method="post" action="proses_tambah/proses_tambah_pelamar.php" enctype="multipart/form-data">
	
	<table>
	
	<input type="hidden" name="tgl_daftar" value="<?php echo $tanggal;?>">
	
	<tr>
		<td style='padding-left:20px;'>Email</td> 
		<td><input type="email" name="email" placeholder='contoh@gmail.com' required /></td>
	</tr>
	<tr>
		<td style='padding-left:20px;'>Password</td> 
		<td><input type="password" name="password" required /></td>
	</tr>
	<tr>
		<td style='padding-left:20px;'>No KTP</td>
		<td><input type="text" name="no_ktp" required /></td>
	</tr>
	<tr>
		<td style='padding-left:20px;'>Nama Lengkap</td>
		<td><input type="text" name="nama_lengkap" required /></td>
	</tr>
	
	<tr>
		<td style='padding-left:20px;'>Jurusan Pendidikan</td> 
		<td>
			<select name='id_jurusan'>
			<option>Jurusan pendidikan yang telah ditempuh</option>
			<?php
				foreach($jurusan as $baris){
				$id_jurusan   = $baris['id_jurusan'];
				$nama_jurusan = $baris['nama_jurusan'];
			?>
			<option value="<?php echo $id_jurusan?>"><?php echo $nama_jurusan?></option>
			<?php } ?>
			</select>
		</td>
	</tr>
	
	<tr>
		<td style='padding-left:20px;'>Jenis Kelamin</td> 
		<td>
		<select name='jenis_kelamin' required >
			<option value=''></option>
			<option value='L'>Pria</option>
			<option value='P'>Wanita</option>
		</select>
		</td>
	</tr>
	<tr>
		<td style='padding-left:20px;'>Tanggal Lahir</td> 
		<td><input type="date" name="tgl_lahir" required placeholder='2016-01-25' /></td>
	</tr>
	<tr>
		<td style='padding-left:20px;'>Alamat</td>
		<td><textarea name="alamat" cols="70" rows="6" required /> </textarea></td>
	</tr>
	
	<tr>
		<td style='padding-left:20px;'>Kota</td>
		<td>
			<select name='id_kota'>
			<option>Pilih Kota</option>
			<?php
				foreach($data as $baris){
				$id_kota       = $baris['id_kota'];
				$nama_kota     = $baris['nama_kota'];
			?>
			<option value="<?php echo $id_kota?>"><?php echo $nama_kota?></option>
			<?php } ?>
			</select>
		</td>
	</tr>
	
	<tr>
		<td style='padding-left:20px;'>No HP</td> 
		<td><input type="text" name="no_hp" required /></td>
	</tr>
	<tr>
		<td style='padding-left:20px;'>Photo</td>
		<td><input type="file" name="photo" /></td>
	</tr>
	</table> <br/>
	
		<input type="reset" value="Batal">
		<input type="submit" value="Simpan">
		
</form>
</body>
</html>