<?php
	session_start();
	include('../crud/crudPerusahaan.php');
	include('session.php');
	include('../fungsiTanggal.php');
	$sql  = "select perusahaan.*, kota.* from perusahaan 
			 inner join kota on kota.id_kota = perusahaan.id_kota
			 order by id_perusahaan desc";
	$data = bacaPerusahaan($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Job Seeker</title>
	<link rel="stylesheet" href="../stylecss/stylebutton.css" type="text/css">
	<link rel="stylesheet" href="../stylecss/styleheader.css" type="text/css">
	<link rel="stylesheet" href="../stylecss/styletable.css" type="text/css">
</head>
<body onLoad='window.print()'>
<h1>Joobseekers</h1> <hr/>
<h2>
	Daftar Data Perusahaan
</h2> 

<table align='center'>
	<tr>
		<th>No</th>
		<th>Tanggal Daftar</th>
		<th width='14%'>Nama Perusahaan</th>
		<th>Email</th>
		<th>Tempat Perusahaan</th>
		<th>No Telpon</th>
		<th>Nama Kontak</th>
		<th>Situs</th>
	</tr>

	<?php
	$i = 0;
	if($data == null){
			echo "
				<tr>
					<td width='1100px' align='center' colspan='8'>
					<fieldset><i> - Belum ada perusahaan yang mendaftar - </i></fieldset>
					</td>
				</tr>
			";
		}
	if($data != null)
	foreach($data as $baris){
		$id_kota         = $baris['nama_kota'];
		$email           = $baris['email'];
		$tgl_daftar      = $baris['tgl_daftar'];
		$nama_perusahaan = $baris['nama_perusahaan'];
		$alamat          = $baris['alamat'];
		$no_telp         = $baris['no_telp'];
		$situs           = $baris['situs'];
		$nama_kontak     = $baris['nama_kontak'];
		$no_hp           = $baris['no_hp'];
		$tgl = tanggalIndo($tgl_daftar);
		$i++;
		echo "
		<tr>
			<td>$i</td>
			<td>$tgl</td>
			<td>$nama_perusahaan</td>
			<td>$email</td>
			<td>$id_kota</td>
			<td>$no_telp</td>
			<td>$nama_kontak</td>
			<td>$situs</td>
		</tr>
		";	
	}
	?>
</table>
</body>
</html>