<!DOCTYPE html>
<?php
	session_start();
	include('../crud/crudLowongan.php');
	include('../crud/crudPerusahaan.php');
	include('../fungsiTanggal.php');
	include('../session.php');
	$now   = date('Y-m-d');
	$id    = $_SESSION['id_perusahaan'];	
	$sql   = "select perusahaan.*, kota.*, jurusan_pendidikan.*, kategori.*, lowongan.* from lowongan 
	          inner join perusahaan on perusahaan.id_perusahaan = lowongan.id_perusahaan
			  inner join kota on kota.id_kota = lowongan.id_kota
			  inner join jurusan_pendidikan on jurusan_pendidikan.id_jurusan = lowongan.id_jurusan
			  inner join kategori on  kategori.id_kategori = lowongan.id_kategori
			  where perusahaan.id_perusahaan = '$id' and status not in('Hapus')
			  order by id_lowongan desc";
	$data  = bacaLowongan($sql);
	
	$sql2  = "select * from perusahaan inner join kota on perusahaan.id_kota = kota.id_kota where id_perusahaan = '$id'";
	$data2 = bacaPerusahaan($sql2);
?>
<html>
<head>
	<title>Job Seeker</title>
	<link rel="stylesheet" href="../stylecss/stylebutton.css" type="text/css">
	<link rel="stylesheet" href="../stylecss/styleheader.css" type="text/css">
	<link rel="stylesheet" href="../stylecss/styletable.css" type="text/css">
</head>

<?php 
	foreach($data2 as $bairs2){
		$nama = $bairs2['nama_perusahaan'];
	}
?>

<body onLoad='window.print()'>
<h1>Joobseekers</h1> <hr/>
<h2>
	Daftar Data Lowongan <?php echo $nama; ?>
</h2> 

<table align='center'>
	<tr>
		<th>No</th>
		<th>Tanggal Buat</th>
		<th>Pekerjaan</th>
		<th>Kota</th>
		<th>Batas Lamaran</th>
		<th>Status</th>
	</tr>
	<?php
	if($data == null){
			echo "
				<tr>
					<td width='1100px' align='center' colspan = '9'>
					<fieldset><i> - Belum ada lowongan yang dibuat - </i></fieldset>
					</td>
				</tr>
			";
		}
	$i = 0;
	if($data != null){
	foreach($data as $baris){
		$id_lowongan   = $baris['id_lowongan'];
		$id_perusahaan = $baris['id_perusahaan'];
		$pekerjaan     = $baris['pekerjaan'];
		$id_jurusan    = $baris['id_jurusan'];
		$id_lowongan   = $baris['id_lowongan'];
		$id_kota       = $baris['id_kota'];
		$tgl_buat      = $baris['tgl_buat'];
		$deskripsi     = $baris['deskripsi'];
		$usia_max      = $baris['usia_max'];
		$jenis_kelamin = $baris['jenis_kelamin'];
		$batas_lamaran = $baris['batas_lamaran'];
		$status        = $baris['status'];
		$nama_kota     = $baris['nama_kota'];
		$i++;
		
		$tgl1 = tanggalIndo($tgl_buat);
		$tgl2 = tanggalIndo($batas_lamaran);
		$batas = strtotime($tgl2);
		
		$hapus = '<b>--</b>';
		
		
		echo "
		<tr>
			<td align='center'>$i</td>
			<td align='center'>$tgl1</td>
			<td>$pekerjaan</td>
			<td>$nama_kota</td>
			<td align='center'>$tgl2</td>
			<td align='center'>$status</td>
		</tr>
		";	
	}
	}
	?>
</table> 
</body>
</html>
