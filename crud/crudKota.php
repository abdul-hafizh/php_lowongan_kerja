<?php
	require_once 'koneksi_db_loker.php';

	function bacaKota($baca){
		$kota = array();
		$koneksi = koneksi_db();
		$hasil = mysqli_query($koneksi, $baca);

		if (mysqli_num_rows($hasil) == 0) {
			mysqli_close($koneksi);
			return null;  
		}
			$i=0;
			while($baris = mysqli_fetch_assoc($hasil)) {
			$kota[$i]['id_kota']   = $baris['id_kota'];
			$kota[$i]['nama_kota'] = $baris['nama_kota'];
			$i++;
		}
		mysqli_close($koneksi);
		return $kota;
	}
	function bacaJurusan($sql2){
		$jurusan = array();
		$koneksi = koneksi_db();
		$hasil = mysqli_query($koneksi, $sql2);

		if (mysqli_num_rows($hasil) == 0) {
			mysqli_close($koneksi);
			return null;  
		}
			$i=0;
			while($baris = mysqli_fetch_assoc($hasil)) {
			$jurusan[$i]['id_jurusan']   = $baris['id_jurusan'];
			$jurusan[$i]['nama_jurusan'] = $baris['nama_jurusan'];
			$i++;
		}
		mysqli_close($koneksi);
		return $jurusan;
	}

?>    