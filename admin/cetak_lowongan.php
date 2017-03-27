<!DOCTYPE html>
<?php
	session_start();
	include('../crud/crudLowongan.php');
	include('../fungsiTanggal.php');
	include('session.php');
	$sql   = "select perusahaan.*, kota.*, jurusan_pendidikan.*, kategori.*, lowongan.* from lowongan 
	          inner join perusahaan on perusahaan.id_perusahaan = lowongan.id_perusahaan
			  inner join kota on kota.id_kota = lowongan.id_kota
			  inner join jurusan_pendidikan on jurusan_pendidikan.id_jurusan = lowongan.id_jurusan
			  inner join kategori on  kategori.id_kategori = lowongan.id_kategori
			  order by id_lowongan desc";
	$data = bacaLowongan($sql);
?>
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

<html>
<head>
	<title>Job Seeker</title>
	<link rel="stylesheet" href="../stylecss/styleheader.css" type="text/css">
	<link rel="stylesheet" href="../stylecss/stylebutton.css" type="text/css">
</head>
<body onLoad='window.print()'>
<h1>Joobseekers</h1> <hr/>
<h2>
	Daftar Data Lowongan
</h2> 
<table align='center'>
	<tr>
		<th>No</th>
		<th>Tanggal Buat</th>
		<th>Nama Perusahaan</th>
		<th>Lowongan</th>
		<th>Tipe Pekerjaan</th>
		<th>Batas Lamaran</th>
		<th>Status</th>
	</tr>

	<?php
	$i = 0;
	if($data == null){
			echo "
				<tr>
					<td width='1100px' align='center' colspan='6'>
					<fieldset><i> - Belum ada lowongan yang tersedia - </i></fieldset>
					</td>
				</tr>
			";
		}
	if($data != null)
	foreach($data as $baris){
		$tgl_buat        = $baris['tgl_buat'];
		$nama_perusahaan = $baris['nama_perusahaan'];
		$pekerjaan       = $baris['pekerjaan'];
		$status          = $baris['status'];
		$batas           = $baris['batas_lamaran'];
		$tipe_pekerjaan  = $baris['tipe_pekerjaan'];
		
		$tgl2 = tanggalIndo($batas);		
		$tgl = tanggalIndo($tgl_buat);		
		$i++;
		
		//warna status
		$warna = '#fff';
		if($status == 'Publik'){
			$warna = '#95fd61';
		}
		elseif($status == 'Privat'){
			$warna = '#fea7f5';
		}
		elseif($status == 'Hapus'){
			$warna = '#fce6cd';
		}
					
		echo "
		<tr>
			<td align='center'>$i</td>
			<td align='center'>$tgl</td>
			<td>$nama_perusahaan</td>
			<td>$pekerjaan</a></td>
			<td>$tipe_pekerjaan</a></td>
			<td align='center'>$tgl2</td>
			<td style='background-color:$warna;'>$status</td>
		</tr>
		";	
	}
	?>
</table>
</body>
</html>