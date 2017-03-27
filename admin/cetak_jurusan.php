<!DOCTYPE html>
<?php
	session_start();
	include('../crud/crudJurusan.php');
	include('session.php');
	include('../fungsiTanggal.php');
	$sql = "select * from jurusan_pendidikan";
	$data = bacaJurusan($sql);
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
	Daftar Data Jurusan
</h2> 

<table align='center'>
	<tr>
		<th>No</th>
		<th>Nama Jurusan</th>
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
		$id   = $baris['id_jurusan'];
		$nama = $baris['nama_jurusan'];
		$i++;
		echo "
		<tr>
			<td align='center'>$id</td>		
			<td>$nama</td>
		</tr>
		";	
	}
	?>
</table>
</body>
</html> 
