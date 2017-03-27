<?php
	session_start();
	$tanggal = date('Y-m-d');
	$id_lowongan = $_GET['id_lowongan'];
	include('../session2.php');
	include('../crud/crudLowongan.php');
	$cari  = cariLowongan($id_lowongan);
	
	$email = $_SESSION['email'];
	$id    = "select * from pelamar where email ='$email'";
	$data2 = bacaNamaLengkap($id);
?>

<?php
	foreach($data2 as $baris){
		$id_pelamar    = $baris['id_pelamar'];
		$nama_lengkap  = $baris['nama_lengkap'];
	}
?>

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
				<li class="selected">
					<a href="../beranda_pelamar.php">Beranda</a>
				</li>
				<li>
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
	
<h3>Lamar <?php $pekerjaan = $cari['pekerjaan']; echo "Pekerjaan ".$pekerjaan; ?></h3>
<div style='padding-left:15px'>
<fieldset>
<table>
Lampiran yang dibutuhkan :
<tr>
	<td>
		<ol>
			<li>Curiculum Vitae</li> <br/>
			<li>Ijazah Terakhir</li> <br/>
			<li>Kartu Keluarga</li> <br/>
			<li>KTP <i>(kartu tanda penduduk)</i></li> <br/>
			<li>File Photo <i>(ukuran 3x4)</i></li> <br/>
			<li>Sertifikat Pendukung <i>(jika ada)</i></li> <br/>
			<li>Surat Keterangan Catatan Kepolisian</li> <br/>
			<li>Kartu Kuning</li> <br/>
		</ol>
	</td>
</tr>
</table>

Semua lampiran dijadikan dalam satu file(compress rar/zip)...
<table>
<form method="post" action="proses_tambah/proses_tambah_lamaran.php" enctype="multipart/form-data">
	
	<input type="hidden" name="id_lowongan" value='<?php echo $cari['id_lowongan'];?>' >
	<input type="hidden" name="id_pelamar" value='<?php echo $id_pelamar; ?>' >
	<input type="hidden" name="tgl_lamar" value='<?php echo $tanggal; ?>' >
	<input type="hidden" name="status" value='Proses' />
	
	<tr>
		<td><b>Upload File (rar/zip) : </b>
		<input type="file" name="lampiran" required />
		</td>
	</tr>
	<tr>
		<td>
		<br/><input type="submit" value="Kirim Lamaran" />
		</td>
	</tr>
</form>
</table> </fieldset>
</div>