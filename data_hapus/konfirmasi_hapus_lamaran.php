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
				<a href="../beranda_pelamar.php"><img src="../images/logo.png" alt="LOGO"></a>
			</div>
			<ul id="navigation">
				<li>
					<a href="../beranda_pelamar.php">Beranda</a>
				</li>
				<li>
					<a href="../data_tampil/profile_pelamar.php">Profil</a>
				</li>
				<li class="selected">
					<a href="../data_tampil/tampil_lamaran.php">Lamaran</a>
				</li>
				<li>
					<a href="../login/logout_pelamar.php">Logout</a>
				</li>
			</ul>
		</div>
	</div>


<body>
<?php
	session_start();
	include('../crud/crudLamaran.php');
	include('../session.php');
	$id   = $_GET['id_lamaran'];
	$sql   = "select pelamar.*, lowongan.*, lamaran.* from lamaran
		      inner join pelamar on lamaran.id_pelamar = pelamar.id_pelamar
			  inner join lowongan on lamaran.id_lowongan = lowongan.id_lowongan
			  where id_lamaran='$id'";
	$data = bacaLamaran($sql);
?>
<h2>Hapus Data Lamaran</h2> 
<table align='center'>
	<tr>
		<th>Tanggal Lamar</th>
		<th>Pekerjaan</th>
		<th>Lampiran</th>
		<th>Status</th>
	</tr>

	<?php
	foreach($data as $baris){
		$tgl_lamar   = $baris['tgl_lamar'];
		$pekerjaan   = $baris['pekerjaan'];
		$lampiran    = $baris['lampiran'];
		$status      = $baris['status'];
		echo "
		<tr>
			<td>$tgl_lamar</td>
			<td>$pekerjaan</td>
			<td>$lampiran</td>
			<td>$status</td>
		</tr>
		";	
	}
	?>
</table>

<h3>Apakah anda akan menghapus lamaran ini ? </h3>
<form method="post" action="proses_hapus/proses_hapus_lamaran.php">
	<input type="hidden" name="id_lamaran" value="<?php echo $id?>">
	<input type="submit" name="hapus" value="OK">
</form>
</body>
</html>