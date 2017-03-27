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

<body>
<?php
	session_start();
	include('../crud/crudLowongan.php');
	include('../session.php');
	$id   = $_GET['id_lowongan'];
	$sql  = "select perusahaan.*, kota.*, jurusan_pendidikan.*, kategori.*, lowongan.* from lowongan 
	          inner join perusahaan on perusahaan.id_perusahaan = lowongan.id_perusahaan
			  inner join kota on kota.id_kota = lowongan.id_kota
			  inner join jurusan_pendidikan on jurusan_pendidikan.id_jurusan = lowongan.id_jurusan
			  inner join kategori on  kategori.id_kategori = lowongan.id_kategori
			 where id_lowongan='$id'";
	$data = bacaLowongan($sql);
?>
<h2>Hapus Data Lowongan</h2> 
<table align='center'>
	<tr>
		<th>Tanggal Buat</th>
		<th>Pekerjaan</th>
		<th>Tipe Pekerjaan</th>
		<th>Tawaran Gaji</th>
		<th>Batas Lamaran</th>
	</tr>

	<?php
	foreach($data as $baris){
		$tgl       = $baris['tgl_buat'];
		$pekerjaan = $baris['pekerjaan'];
		$tipe      = $baris['tipe_pekerjaan'];
		$tawaran   = $baris['tawaran_gaji'];
		$batas     = $baris['batas_lamaran'];
		
		echo "
		<tr>
			<td>$tgl</td>
			<td>$pekerjaan</td>
			<td>$tipe</td>
			<td>$tawaran</td>
			<td>$batas</td>
		</tr>
		";	
	}
	?>
</table>

<h3>Apakah anda akan menghapus lowongan ini ? </h3>
<form method="post" action="proses_hapus/proses_hapus_lowongan.php">
	<input type="hidden" name="id_lowongan" value="<?php echo $id?>">
	<input type="submit" name="hapus" value="OK">
</form>
</body>
</html>