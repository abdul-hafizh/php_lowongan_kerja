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
				<a href="../admin/admin.php"><img src="../images/logo.png" alt="LOGO"></a>
			</div>
			<ul id="navigation">
				<li>
					<a href="../admin/admin.php">Beranda</a>
				</li>
				<li class="selected">
					<a href="../data_tampil/tampil_perusahaan.php">Perusahaan</a>
				</li>
				<li>
					<a href="../data_tampil/tampil_pelamar.php">Pelamar</a>
				</li>
				<li>
					<a href="../admin/logout.php">Logout</a>
				</li>
			</ul>
		</div>
	</div>

<body>
<?php
    session_start();
	include('../crud/crudPerusahaan.php');
	include('../session.php');
	$id   = $_GET['id_perusahaan'];
	$sql  = "select kota.*, perusahaan.* from perusahaan 
			 inner join kota on kota.id_kota = perusahaan.id_kota
			 where id_perusahaan='$id'";
	$data = bacaPerusahaan($sql);
?>
<h2>Tampil Data Perusahaan</h2> 
<table align='center'>
	<tr>
		<th>Tanggal Daftar</th>
		<th width='14%'>Nama Perusahaan</th>
		<th>Email</th>
		<th>No Telpon</th>
		<th>Situs</th>
	</tr>

	<?php
	$i = 0;
	foreach($data as $baris){
		$email           = $baris['email'];
		$tgl_daftar      = $baris['tgl_daftar'];
		$nama_perusahaan = $baris['nama_perusahaan'];
		$no_telp         = $baris['no_telp'];
		$situs           = $baris['situs'];
		$i++;
		echo "
		<tr>
			<td>$tgl_daftar</td>
			<td>$nama_perusahaan</td>
			<td>$email</td>
			<td>$no_telp</td>
			<td>$situs</td>
		</tr>
		";	
	}
	?>
</table>

<h3>Apakah anda akan menghapus perusahaan ini ? </h3>
<form method="post" action="proses_hapus/proses_hapus_perusahaan.php">
	<input type="hidden" name="id_perusahaan" value="<?php echo $id?>">
	<input type="submit" name="hapus" value="OK">
</form>
</body>
</html>