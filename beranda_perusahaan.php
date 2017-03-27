<?php
	session_start();
	include('crud/crudLowongan.php');
	include('fungsiTanggal.php');
	include('crud/crudKategori.php');
	$now   = date('Y-m-d');
	$sql   = "select perusahaan.*, kota.*, jurusan_pendidikan.*, kategori.*, lowongan.* from lowongan 
	          inner join perusahaan on perusahaan.id_perusahaan = lowongan.id_perusahaan
			  inner join kota on kota.id_kota = lowongan.id_kota
			  inner join jurusan_pendidikan on jurusan_pendidikan.id_jurusan = lowongan.id_jurusan
			  inner join kategori on  kategori.id_kategori = lowongan.id_kategori
			  where status='publik' order by id_lowongan desc";
	$data = bacaLowongan($sql);

	$email = $_SESSION['email'];
	$id    = "select * from perusahaan where email ='$email'";
	$data2 = bacaNama($id);
	
	$sql2     = "select * from kategori";
	$kategori = bacaKategori($sql2);
?>
<?php
	include "koneksi.php";
	$dataPerPage = 3;// JUMLAH DATA YANG DITAMPILKAN PER HALAMAN
	if(isset($_GET['page']))// Apabila $_GET['page'] sudah didefinisikan, gunakan nomor halaman tersebut,
	{
	  $noPage = $_GET['page'];
	}
	
	else 
	$noPage = 1;// Sedangkan apabila belum, nomor halamannya 1.
	$offset = ($noPage - 1) * $dataPerPage;// Perhitungan offset 

	$query = "select perusahaan.*, kota.*, jurusan_pendidikan.*, kategori.*, lowongan.* from lowongan 
	          inner join perusahaan on perusahaan.id_perusahaan = lowongan.id_perusahaan
			  inner join kota on kota.id_kota = lowongan.id_kota
			  inner join jurusan_pendidikan on jurusan_pendidikan.id_jurusan = lowongan.id_jurusan
			  inner join kategori on  kategori.id_kategori = lowongan.id_kategori where status='publik'
			  ORDER BY id_lowongan DESC LIMIT $offset, $dataPerPage";
	$hasil = mysql_query($query);
	$row   = mysql_num_rows($hasil);

	if (!$hasil){
		die("Gagal Query");
	}
	
	// Penomoran Item
	$nomor  =1;
	$nomor1 =3 * $noPage-2;

	$query2 = "SELECT * FROM  lowongan ORDER BY id_lowongan";
	$hasil2 = mysql_query($query2);
	$row2   = mysql_num_rows($hasil2);
	if (!$hasil2){
	  die("Gagal Query 2");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Job Seeker</title>
	<link rel="stylesheet" href="stylecss/stylebutton.css" type="text/css">
	<link rel="stylesheet" href="stylecss/styleheader.css" type="text/css">
</head>
<body>
<div id="header">
		<div>
			<div id="logo">
				<a href="beranda_perusahaan.php"><img src="images/logo.png" alt="LOGO"></a>
			</div>
			<ul id="navigation">
				<li class="selected">
					<a href="beranda_perusahaan.php">Beranda</a>
				</li>
				<li>
					<a href="data_tampil/profile_perusahaan.php">Profil</a>
				</li>
				<li>
					<a href="data_tampil/lowongan_perusahaan.php">Lowongan</a>
				</li>
				<li>
					<a href="login/logout_perusahaan.php">Logout</a>
				</li>
			</ul>
		</div>
	</div>
	
	<?php
		foreach($data2 as $baris){
			$nama_perusahaan  = $baris['nama_perusahaan'];
		}
	?>
	<div align='center'>
	<?php
		echo "<br/> <fieldset>
				<h3> -- Selamat Datang ".$nama_perusahaan." --</h3>
			  </fieldset>";
	?>
	</div>

<table>
<tr valign='top'>
	<td width='70%'>
	<table>
		<tr>
			<td>
				<h2>Lowongan Terbaru</h2>
				<fieldset><center>
					<?php echo "Halaman $noPage,";?> terdapat <?php echo"$row Lowongan";?> dari <?php echo"$row2 Data Lowongan";?>
				</fieldset></center>
			</td>
		</tr>
		<?php
		if($data == null){
			echo "
				<tr>
					<td width='1100px' align='center'>
					<fieldset><i> - Belum ada lowongan yang tersedia - </i></fieldset>
					</td>
				</tr>
			";
		}
  if($data != null){
  while ($data = mysql_fetch_array($hasil))
  {
	$tgl        = tanggalIndo($data['batas_lamaran']);
	$tgl_batas  = strtotime($data['batas_lamaran']);
	$tgl_now    = strtotime($now);
	
	if($tgl_batas >= $tgl_now){
    echo "
	  <td width='1100px'> <fieldset> <pre>
	  <b>{$data['nama_perusahaan']}</b><br/>
	  Pekerjaan     : {$data['pekerjaan']} <br/>
	  Tawaran Gaji  : {$data['tawaran_gaji']} <br/>
	  Lokasi Kerja  : {$data['nama_kota']}<br/>
	  Batas Lamaran : $tgl <br/>
	  <a href='data_tampil/detail_lowongan_perusahaan.php?id_lowongan={$data['id_lowongan']}'><img src='images/detail.jpg'></a>
	  </pre> </fieldset>
 	  </td> </tr>"; 
		}
	}
  }
	  echo "<tr> 
				<td>";
	  // Mencari jumlah semua data tabel 'matakuliah', kemudian simpan dalam variabel $jumData
	  $query2   = "SELECT COUNT(*) AS jumData FROM lowongan";
	  $hasil2   = mysql_query($query2);
	  $data2    = mysql_fetch_array($hasil2);
	  $jumData  = $data2['jumData'];
	  
	  echo "<center>";
	  if ($jumData > 3)
	  {
	    // Menentukan jumlah halaman yang muncul berdasarkan jumlah semua data
		$jumPage = ceil($jumData/$dataPerPage);
		
		// Menampilkan link 'Kembali'   
		
		if ($noPage > 1) 
		  $query  = "SELECT * FROM lowongan";
		  $hasil  = mysql_query($query) or die('Error');
		  
		  // Menampilkan nomor halaman dan linknya
		  $showPage = 0;
		  echo  "<fieldset><a href='".$_SERVER['PHP_SELF']."?page=".($noPage-1)."' > Kembali | </a>";
		  for($page = 1; $page <= $jumPage; $page++)
		  {
			if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage))
			{
			  if (($showPage == 1) && ($page != 2))  echo "<a href='#'>...</a>";
				if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "<a href='#'>...</a>";
				  if ($page == $noPage) echo "<a href='#' ><b><u> ".$page."</u></b></a>";
					else echo "<a href='".$_SERVER['PHP_SELF']."?page=".$page."' > ".$page."</a>";
					  $showPage = $page;
			}
		  }
		  
		  // Menampilkan link 'Berikutnya'
		  if ($noPage < $jumPage) 
			echo "<a href='".$_SERVER['PHP_SELF']."?page=".($noPage+1)."' > | Berikutnya </a></fieldset>";
		}
		else
		{
		}
		  echo "</center>";        
		 echo "</td>";
		echo "</table>"; 
	  
?>
<td valign='top'> <br/> 
		<form action='hasil_pencarian/pencarian_kota2.php' method='post'>
			<input type='text' name='cari' size='30' placeholder='Cari Perusahaan atau Lokasi' /> 
			&nbsp;&nbsp;<input type='submit' name='cariKota' value='Cari'>
		</form>
		<h3>Berdasarkan Kategori</h3>
			<?php
				foreach($kategori as $baris2){
				$id_kategori   = $baris2['id_kategori'];
				$nama_kategori = $baris2['nama_kategori'];				
			?>
			<ul>
			<?php
				echo "
				<li>
					<a href='hasil_pencarian/pencarian_kategori2.php?id_kategori={$baris2['id_kategori']}'>$nama_kategori</a>
				</li>";
			?>
			</ul> 
			<?php } ?>
	</td>
</tr>
</table>