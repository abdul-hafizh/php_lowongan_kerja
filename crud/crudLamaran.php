<?php
	require_once 'koneksi_db_loker.php';

	function bacaLamaran($sql){
		$data = array();
		$koneksi = koneksi_db();
		$hasil = mysqli_query($koneksi, $sql);

		if (mysqli_num_rows($hasil) == 0) {
			mysqli_close($koneksi);
			return null;  
		}
			$i=0;
			while($baris = mysqli_fetch_assoc($hasil)) {
			$data[$i]['id_lamaran']   = $baris['id_lamaran'];
			$data[$i]['id_pelamar']   = $baris['id_pelamar'];
			$data[$i]['id_lowongan']  = $baris['id_lowongan'];
			$data[$i]['tgl_lamar']    = $baris['tgl_lamar'];
			$data[$i]['lampiran']     = $baris['lampiran'];
			$data[$i]['status']       = $baris['status'];
			$data[$i]['pekerjaan']    = $baris['pekerjaan'];
			$data[$i]['nama_lengkap'] = $baris['nama_lengkap'];
			$data[$i]['batas_lamaran'] = $baris['batas_lamaran'];
			$i++;
		}
		mysqli_close($koneksi);
		return $data;
	}
	
	function detailLamaran($sql){
		$data = array();
		$koneksi = koneksi_db();
		$hasil = mysqli_query($koneksi, $sql);

		if (mysqli_num_rows($hasil) == 0) {
			mysqli_close($koneksi);
			return null;  
		}
			$i=0;
			while($baris = mysqli_fetch_assoc($hasil)) {
			$data[$i]['id_lamaran']      = $baris['id_lamaran'];
			$data[$i]['id_pelamar']      = $baris['id_pelamar'];
			$data[$i]['id_lowongan']     = $baris['id_lowongan'];
			$data[$i]['tgl_lamar']       = $baris['tgl_lamar'];
			$data[$i]['lampiran']        = $baris['lampiran'];
			$data[$i]['status']          = $baris['status'];
			$data[$i]['pekerjaan']       = $baris['pekerjaan'];
			$data[$i]['nama_lengkap']    = $baris['nama_lengkap'];
			$data[$i]['batas_lamaran']   = $baris['batas_lamaran'];
			$data[$i]['nama_perusahaan'] = $baris['nama_perusahaan'];
			$i++;
		}
		mysqli_close($koneksi);
		return $data;
	}
	
	function bacaK($id){
		$data2 = array();
		$koneksi = koneksi_db();
		$hasil = mysqli_query($koneksi, $id);

		if (mysqli_num_rows($hasil) == 0) {
			mysqli_close($koneksi);
			return null;  
		}
			$i=0;
			while($baris = mysqli_fetch_assoc($hasil)) {
			$data2[$i]['pekerjaan']    = $baris['pekerjaan'];
			$i++;
		}
		mysqli_close($koneksi);
		return $data2;
	}
	
	function bacaN($id){
		$data2 = array();
		$koneksi = koneksi_db();
		$hasil = mysqli_query($koneksi, $id);

		if (mysqli_num_rows($hasil) == 0) {
			mysqli_close($koneksi);
			return null;  
		}
			$i=0;
			while($baris = mysqli_fetch_assoc($hasil)) {
			$data2[$i]['nama_lengkap'] = $baris['nama_lengkap'];
			$i++;
		}
		mysqli_close($koneksi);
		return $data2;
	}

	function tambahLamaran($id_lamaran,$id_pelamar,$id_lowongan,$tgl_lamar,$lampiran,$status){
		$koneksi = koneksi_db();
		$sql = "insert into lamaran values('$id_lamaran','$id_pelamar','$id_lowongan','$tgl_lamar','$lampiran','$status')";
		$hasil = 0;
		if(mysqli_query($koneksi, $sql))
		$hasil = 1;
		mysqli_close($koneksi);
		return $hasil;
	}

	function hapusLamaran($id){
		$koneksi = koneksi_db();
		$sql = "delete from lamaran where id_lamaran='$id'";
		if (!mysqli_query($koneksi, $sql)){
			die('Error: ' . mysqli_error());
		}
		$hasil = mysqli_affected_rows($koneksi);
		mysqli_close($koneksi);
		return $hasil; 	
	}
	function ubahTerima($id){
		$koneksi = koneksi_db();
		$sql = "UPDATE lamaran 
			SET status = 'Diterima'
			WHERE id_lamaran = '$id'";

		if (mysqli_query($koneksi, $sql)) {
			$hasil = true;
		} else {
			$hasil = "Error mengubah record: " . mysqli_error($koneksi);
		}
		mysqli_close($koneksi);
		return $hasil;
	}
	function ubahTolak($id){
		$koneksi = koneksi_db();
		$sql = "UPDATE lamaran 
			SET status = 'Ditolak'
			WHERE id_lamaran = '$id'";

		if (mysqli_query($koneksi, $sql)) {
			$hasil = true;
		} else {
			$hasil = "Error mengubah record: " . mysqli_error($koneksi);
		}
		mysqli_close($koneksi);
		return $hasil;
	}
	function ubahBatal($id){
		$koneksi = koneksi_db();
		$sql = "UPDATE lamaran 
			SET status = 'Batal'
			WHERE id_lamaran = '$id'";

		if (mysqli_query($koneksi, $sql)) {
			$hasil = true;
		} else {
			$hasil = "Error mengubah record: " . mysqli_error($koneksi);
		}
		mysqli_close($koneksi);
		return $hasil;
	}
?>    