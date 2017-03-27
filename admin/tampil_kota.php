<!DOCTYPE html>
<?php
	session_start();
	include('../crud/crudKota.php');
	include('session.php');
	include('../fungsiTanggal.php');
	$sql = "select * from kota";
	$data = bacaKota($sql);
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
	Daftar Data Kota &nbsp;&nbsp;&nbsp;
	<a href='cetak_kota.php' target='_blank'><button>Cetak</button></a>
</h2> 

<table align='center'>
	<tr>
		<th>No</th>
		<th>Nama Kota</th>
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
		$id_kota = $baris['id_kota'];
		$nama_kota = $baris['nama_kota'];
		$i++;
		echo "
		<tr>
			<td align='center'>$id_kota</td>		
			<td>$nama_kota</td>
		</tr>
		";	
	}
	?>
</table>
</body>
</html> 
