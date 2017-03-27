<?php
	$tanggal = date('Y-m-d');
	session_start();
	include('../session.php');
	include('../crud/crudKategori.php');
	include('../crud/crudLowongan.php');
	$sql  = "select perusahaan.*, kota.*, jurusan_pendidikan.*, kategori.*, lowongan.* from lowongan 
	          inner join perusahaan on perusahaan.id_perusahaan = lowongan.id_perusahaan
			  inner join kota on kota.id_kota = lowongan.id_kota
			  inner join jurusan_pendidikan on jurusan_pendidikan.id_jurusan = lowongan.id_jurusan
			  inner join kategori on  kategori.id_kategori = lowongan.id_kategori";
	$data = bacaLowongan($sql);
	
	$email = $_SESSION['email'];	
	$id    = "select * from perusahaan where email ='$email'";
	$data2 = bacaNama($id);
	
	$baca  = "select * from kota";
	$kota  = bacaKota($baca);
	
	$jur   = "select * from jurusan_pendidikan";
	$jurusan = bacaJurusan($jur);
	
	$sql2 = "select * from kategori";
	$kategori = bacaKategori($sql2);
?>
<?php
	foreach($data2 as $baris){
		$id_perusahaan   = $baris['id_perusahaan'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Lowongan</title>
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
				<li>
					<a href="../data_tampil/profile_perusahaan.php">Profil</a>
				</li>
				<li class="selected">
					<a href="../data_tampil/lowongan_perusahaan.php">Lowongan</a>
				</li>
				<li>
					<a href="../login/logout_perusahaan.php">Logout</a>
				</li>
			</ul>
		</div>
</div>

<h2>Tambah Lowongan</h2> 
	<form method="post" action="proses_tambah/proses_tambah_lowongan.php">
	
	<input type="hidden" name="id_perusahaan" value='<?php echo $id_perusahaan; ?>'/>
	<input type="hidden" name="tgl_buat" value='<?php echo $tanggal; ?>'/>
	<input type="hidden" name="status" value='Proses'/>
	
	<table>
	<tr>
		<td style='padding-left:20px;' width='30%'>Nama Pekerjaan</td>
		<td><input type="text" name="pekerjaan" required /></td>
	</tr>
	
	<tr>
		<td style='padding-left:20px;'>Kategori Pekerjaan</td>
		<td>
		<select name='id_kategori' required >
			<option>Pilih kategori pekerjaan</option>
			<?php
				foreach($kategori as $baris){
				$id_kategori   = $baris['id_kategori'];
				$nama_kategori = $baris['nama_kategori'];
			?>
			<option value="<?php echo $id_kategori?>"><?php echo $nama_kategori?></option>
			<?php } ?>
		</select>
		</td>
	</tr>
	
	<tr>
		<td style='padding-left:20px;'>Tipe Pekerjaan</td>
		<td>
		<select name='tipe_pekerjaan' required >
			<option>Pilih tipe pekerjaan</option>
			<option value='Kontrak'>Kontrak</option>
			<option value='Freelance'>Freelance</option>
			<option value='Magang'>Magang</option>
			<option value='Tetap'>Tetap</option>
		</select>
		</td>
	</tr>
	
	<tr>
		<td style='padding-left:20px;'>Jurusan Pendidikan</td>
		<td>
			<select name='id_jurusan'>
			<option>Pilih jurusan pendidikan yang dibutuhkan</option>
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
		<td style='padding-left:20px;'>Lokasi Kerja</td>
		<td>
			<select name='id_kota'>
			<option>Pilih lokasi kerja</option>
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
		<td style='padding-left:20px;'>Deskripsi</td>
		<td><textarea name="deskripsi" cols='80' rows='5' required /></textarea></td>
	</tr>
	<tr>
		<td style='padding-left:20px;'>Persyaratan</td>
		<td><textarea name="persyaratan" cols='80' rows='5' required /></textarea></td>
	</tr>
	<tr>
		<td style='padding-left:20px;'>Tawaran Gaji</td>
		<td>
		<select name='tawaran_gaji' required >
			<option>Pilih tawaran gaji</option>
			<option value='Nego'>Nego</option>
			<option value='Rahasia'>Rahasia</option>
			<option value='UMR'>UMR</option>
			<option value='Dibawah 1.000.000'>Dibawah 1.000.0000</option>
			<option value='1.000.000-2.000.000'>1.000.000 - 2.000.000</option>
			<option value='2.000.000-3.000.000'>2.000.000 - 3.000.000</option>
			<option value='3.000.000-5.000.000'>3.000.000 - 5.000.000</option>
			<option value='Diatas 5.000.000'>Diatas 5.000.0000</option>
		</select>
		</td>
	</tr>
	<tr>
		<td style='padding-left:20px;'>Usia Maksimal</td>
		<td><input type="text" name="usia_max" required /></td>
	</tr>
	<tr>
		<td style='padding-left:20px;'>Jenis Kelamin</td>
		<td>
		<select name='jenis_kelamin' required >
			<option>Pilih jenis kelamin yang dibutuhkan</option>
			<option value='L'>Pria</option>
			<option value='P'>Wanita</option>
			<option value='L/P'>Pria/Wanita</option>
		</select>
		</td>
	</tr>
	<tr>
		<td style='padding-left:20px;'>Batas Lamaran</td>
		<td><input type="date" name="batas_lamaran" required placeholder='2016-10-23'/></td>
	</tr>
</table> <br/>
	<input type="reset" value="Batal">
	<input type="submit" value="Simpan">
</form>
</body>
</html>
