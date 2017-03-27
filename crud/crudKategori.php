<?php
	require_once 'koneksi_db_loker.php';

	function bacaKategori($sql){
		$kategori = array();
		$koneksi = koneksi_db();
		$hasil = mysqli_query($koneksi, $sql);

		if (mysqli_num_rows($hasil) == 0) {
			mysqli_close($koneksi);
			return null;  
		}
			$i=0;
			while($baris = mysqli_fetch_assoc($hasil)) {
			$kategori[$i]['id_kategori']   = $baris['id_kategori'];
			$kategori[$i]['nama_kategori'] = $baris['nama_kategori'];
			$i++;
		}
		mysqli_close($koneksi);
		return $kategori;
	}
?>    