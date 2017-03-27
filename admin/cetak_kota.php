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

<body onLoad='window.print()'>
<h1>Joobseekers</h1> <hr/>
<h2>
	Daftar Data Kota
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
