<!DOCTYPE html>
<?php
	session_start();
	include('../crud/crudKategori.php');
	include('session.php');
	include('../fungsiTanggal.php');
	$sql = "select * from kategori";
	$data = bacaKategori($sql);
?>
<html>
<head>
	<title>Job Seeker</title>
	<link rel="stylesheet" href="../stylecss/stylebutton.css" type="text/css">
	<link rel="stylesheet" href="../stylecss/styleheader.css" type="text/css">
	<link rel="stylesheet" href="../stylecss/styletable.css" type="text/css">
</head>
	<div id="header">
		<div>
			<div id="logo">
				<a href="index.php"><img src="../images/logo.png" alt="LOGO"></a>
			</div>
			<ul id="navigation">
				<li class="selected">
					<a href="index.php">Beranda</a>
				</li>
				<li>
					<a href="tampil_perusahaan.php">Perusahaan</a>
				</li>
				<li>
					<a href="tampil_pelamar.php">Pelamar</a>
				</li>
				<li>
					<a href="logout.php">Logout</a>
				</li>
			</ul>
		</div>
	</div>

<h2>
	Daftar Data Kategori &nbsp;&nbsp;&nbsp;
	<a href='cetak_kategori.php' target='_blank'><button>Cetak</button></a>
</h2> 

<table align='center'>
	<tr>
		<th>No</th>
		<th>Nama Kategori</th>
	</tr>

	<?php
	$i = 0;
	if($data == null){
			echo "
				<tr>
					<td width='1100px' align='center' colspan='9'>
					<fieldset><i> - Belum ada kategori - </i></fieldset>
					</td>
				</tr>
			";
		}
	if($data != null)
	foreach($data as $baris){
		$id_kategori = $baris['id_kategori'];
		$nama_kategori = $baris['nama_kategori'];
		$i++;
		echo "
		<tr>
			<td align='center'>$id_kategori</td>		
			<td>$nama_kategori</td>
		</tr>
		";	
	}
	?>
</table>
</body>
</html> 
