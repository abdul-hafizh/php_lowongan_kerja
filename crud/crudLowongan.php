<?php
	require_once 'koneksi_db_loker.php';

	function bacaLowongan($sql){
		$data = array();
		$koneksi = koneksi_db();
		$hasil = mysqli_query($koneksi, $sql);

		if (mysqli_num_rows($hasil) == 0) {
			mysqli_close($koneksi);
			return null;  
		}
			$i=0;
			while($baris = mysqli_fetch_assoc($hasil)) {
			$data[$i]['id_lowongan']    = $baris['id_lowongan'];
			$data[$i]['id_kategori']    = $baris['id_kategori'];
			$data[$i]['id_perusahaan']  = $baris['id_perusahaan'];
			$data[$i]['id_kota']        = $baris['id_kota'];
			$data[$i]['id_jurusan']     = $baris['id_jurusan'];
			$data[$i]['tgl_buat']       = $baris['tgl_buat'];
			$data[$i]['pekerjaan']      = $baris['pekerjaan'];
			$data[$i]['tipe_pekerjaan'] = $baris['tipe_pekerjaan'];
			$data[$i]['deskripsi']      = $baris['deskripsi'];
			$data[$i]['persyaratan']    = $baris['persyaratan'];
			$data[$i]['tawaran_gaji']   = $baris['tawaran_gaji'];
			$data[$i]['usia_max']       = $baris['usia_max'];
			$data[$i]['jenis_kelamin']  = $baris['jenis_kelamin'];
			$data[$i]['batas_lamaran']  = $baris['batas_lamaran'];
			$data[$i]['status']         = $baris['status'];
			$data[$i]['nama_perusahaan']= $baris['nama_perusahaan'];
			$data[$i]['nama_kota']      = $baris['nama_kota'];
			$data[$i]['nama_jurusan']   = $baris['nama_jurusan'];
			$data[$i]['nama_kategori']  = $baris['nama_kategori'];
			$i++;
		}
		mysqli_close($koneksi);
		return $data;
	}
		
	function bacaNama($id){
		$data2 = array();
		$koneksi = koneksi_db();
		$hasil = mysqli_query($koneksi, $id);

		if (mysqli_num_rows($hasil) == 0) {
			mysqli_close($koneksi);
			return null;  
		}
			$i=0;
			while($baris = mysqli_fetch_assoc($hasil)) {
			$data2[$i]['id_perusahaan']  = $baris['id_perusahaan'];
			$data2[$i]['nama_perusahaan']= $baris['nama_perusahaan'];
			$i++;
		}
		mysqli_close($koneksi);
		return $data2;
	}
	
	function bacaNamaLengkap($id){
		$data2 = array();
		$koneksi = koneksi_db();
		$hasil = mysqli_query($koneksi, $id);

		if (mysqli_num_rows($hasil) == 0) {
			mysqli_close($koneksi);
			return null;  
		}
			$i=0;
			while($baris = mysqli_fetch_assoc($hasil)) {
			$data2[$i]['id_pelamar']  = $baris['id_pelamar'];
			$data2[$i]['nama_lengkap']= $baris['nama_lengkap'];
			$i++;
		}
		mysqli_close($koneksi);
		return $data2;
	}

	function tambahLowongan($id_lowongan,$id_kategori,$id_perusahaan,$id_kota,$id_jurusan,$tgl_buat,$pekerjaan,$tipe_pekerjaan,
					$deskripsi,$persyaratan,$tawaran_gaji,$usia_max,$jenis_kelamin,$batas_lamaran,$status){
		$koneksi = koneksi_db();
		$sql = "insert into lowongan values('$id_lowongan','$id_kategori','$id_perusahaan','$id_kota','$id_jurusan','$tgl_buat',
					'$pekerjaan','$tipe_pekerjaan','$deskripsi','$persyaratan','$tawaran_gaji','$usia_max','$jenis_kelamin','$batas_lamaran','$status')";
		$hasil = 0;
		if(mysqli_query($koneksi, $sql))
		$hasil = 1;
		mysqli_close($koneksi);
		return $hasil;
	}

	function hapusLowongan($id){
		$koneksi = koneksi_db();
		$sql = "delete from lowongan where id_lowongan='$id'";
		if (!mysqli_query($koneksi, $sql)){
			die('Error: ' . mysqli_error());
		}
		$hasil = mysqli_affected_rows($koneksi);
		mysqli_close($koneksi);
		return $hasil; 	
	}

	function cariLowongan($id_lowongan){
		$koneksi = koneksi_db();
		$sql = "select * from lowongan where id_lowongan = '$id_lowongan'";
		$hasil = mysqli_query($koneksi, $sql);
		if(mysqli_num_rows($hasil)>0){
			$baris = mysqli_fetch_assoc($hasil);
			$data['id_lowongan']    = $baris['id_lowongan'];
			$data['id_kategori']    = $baris['id_kategori'];
			$data['id_perusahaan']  = $baris['id_perusahaan'];
			$data['id_kota']        = $baris['id_kota'];
			$data['id_jurusan']     = $baris['id_jurusan'];
			$data['tgl_buat']       = $baris['tgl_buat'];
			$data['pekerjaan']      = $baris['pekerjaan'];
			$data['tipe_pekerjaan'] = $baris['tipe_pekerjaan'];
			$data['deskripsi']      = $baris['deskripsi'];
			$data['persyaratan']    = $baris['persyaratan'];
			$data['tawaran_gaji']   = $baris['tawaran_gaji'];
			$data['usia_max']       = $baris['usia_max'];
			$data['jenis_kelamin']  = $baris['jenis_kelamin'];
			$data['batas_lamaran']  = $baris['batas_lamaran'];
			$data['status']         = $baris['status'];
			
		mysqli_close($koneksi);
		return $data;
		} else {
			mysqli_close($koneksi);
			return null;
		}
	}

	function cariSemuaLowongan($kondisi){
		$sql = "select * from lowongan 
				inner join perusahaan on perusahaan.id_perusahaan = lowongan.id_perusahaan
				inner join kategori on kategori.id_kategori = lowongan.id_kategori
				inner join kota on kota.id_kota = lowongan.id_kota
				inner join jurusan_pendidikan on jurusan_pendidikan.id_jurusan = lowongan.id_jurusan
				where status='Publik' and $kondisi";
		return bacaLowongan($sql);
	}

	function ubahLowongan($id_lowongan,$id_kategori,$id_perusahaan,$id_kota,$id_jurusan,$tgl_buat,$pekerjaan,$tipe_pekerjaan,
					$deskripsi,$persyaratan,$tawaran_gaji,$usia_max,$jenis_kelamin,$batas_lamaran,$status){
		$koneksi = koneksi_db();
		$sql = "UPDATE lowongan
			SET id_lowongan = '$id_lowongan',
			id_kategori     = '$id_kategori',
			id_perusahaan   = '$id_perusahaan',
			id_kota         = '$id_kota',
			id_jurusan      = '$id_jurusan',
			tgl_buat	    = '$tgl_buat',
			pekerjaan	    = '$pekerjaan',
			tipe_pekerjaan  = '$tipe_pekerjaan',
			deskripsi	    = '$deskripsi',
			persyaratan     = '$persyaratan',
			tawaran_gaji    = '$tawaran_gaji',
			usia_max	    = '$usia_max',
			jenis_kelamin   = '$jenis_kelamin',
			batas_lamaran   = '$batas_lamaran',
			status          = '$status'
			WHERE id_lowongan = '$id_lowongan'";

		if (mysqli_query($koneksi, $sql)) {
			$hasil = true;
		} else {
			$hasil = "Error mengubah record: " . mysqli_error($koneksi);
		}
		mysqli_close($koneksi);
		return $hasil;
	}
	function bacaJurusan($jur){
		$jurusan = array();
		$koneksi = koneksi_db();
		$hasil = mysqli_query($koneksi, $jur);

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
	function ubahPublik($id){
		$koneksi = koneksi_db();
		$sql = "UPDATE lowongan 
			SET status = 'Publik'
			WHERE id_lowongan = '$id'";

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
		$sql = "UPDATE lowongan 
			SET status = 'Privat'
			WHERE id_lowongan = '$id'";

		if (mysqli_query($koneksi, $sql)) {
			$hasil = true;
		} else {
			$hasil = "Error mengubah record: " . mysqli_error($koneksi);
		}
		mysqli_close($koneksi);
		return $hasil;
	}
	function hapusLow($id){
		$koneksi = koneksi_db();
		$sql = "UPDATE lowongan 
			SET status = 'Hapus'
			WHERE id_lowongan = '$id'";

		if (mysqli_query($koneksi, $sql)) {
			$hasil = true;
		} else {
			$hasil = "Error mengubah record: " . mysqli_error($koneksi);
		}
		mysqli_close($koneksi);
		return $hasil;
	}
	
	function haLowongan($sql5){
		$data5 = array();
		$koneksi = koneksi_db();
		$hasil5 = mysqli_query($koneksi, $sql5);

		if (mysqli_num_rows($hasil5) == 0) {
			mysqli_close($koneksi);
			return null;  
		}
			$i=0;
			while($baris = mysqli_fetch_assoc($hasil5)) {
			$data5[$i]['id_lowongan']    = $baris['id_lowongan'];
			$data5[$i]['id_kategori']    = $baris['id_kategori'];
			$data5[$i]['id_perusahaan']  = $baris['id_perusahaan'];
			$data5[$i]['id_kota']        = $baris['id_kota'];
			$data5[$i]['id_jurusan']     = $baris['id_jurusan'];
			$data5[$i]['tgl_buat']       = $baris['tgl_buat'];
			$data5[$i]['pekerjaan']      = $baris['pekerjaan'];
			$data5[$i]['tipe_pekerjaan'] = $baris['tipe_pekerjaan'];
			$data5[$i]['deskripsi']      = $baris['deskripsi'];
			$data5[$i]['persyaratan']    = $baris['persyaratan'];
			$data5[$i]['tawaran_gaji']   = $baris['tawaran_gaji'];
			$data5[$i]['usia_max']       = $baris['usia_max'];
			$data5[$i]['jenis_kelamin']  = $baris['jenis_kelamin'];
			$data5[$i]['batas_lamaran']  = $baris['batas_lamaran'];
			$data5[$i]['status']         = $baris['status'];
			
			$i++;
		}
		mysqli_close($koneksi);
		return $data5;
	}
?>    
