<?php
	require_once 'koneksi_db_loker.php';

	function bacaPerusahaan($sql){
		$data = array();
		$koneksi = koneksi_db();
		$hasil = mysqli_query($koneksi, $sql);

		if (mysqli_num_rows($hasil) == 0) {
			mysqli_close($koneksi);
			return null;  
		}
			$i=0;
			while($baris = mysqli_fetch_assoc($hasil)) {
				$data[$i]['id_perusahaan']   = $baris['id_perusahaan'];
				$data[$i]['id_kota']         = $baris['id_kota'];
				$data[$i]['email']           = $baris['email'];
				$data[$i]['password']        = $baris['password'];
				$data[$i]['tgl_daftar']      = $baris['tgl_daftar'];
				$data[$i]['nama_perusahaan'] = $baris['nama_perusahaan'];
				$data[$i]['alamat']          = $baris['alamat'];
				$data[$i]['no_telp']         = $baris['no_telp'];
				$data[$i]['situs']           = $baris['situs'];
				$data[$i]['nama_kontak']     = $baris['nama_kontak'];
				$data[$i]['no_hp']           = $baris['no_hp'];
				$data[$i]['nama_kota']       = $baris['nama_kota'];
				$i++;
		}
		mysqli_close($koneksi);
		return $data;
	}

	function tambahPerusahaan($id_perusahaan,$id_kota,$email,$password,$tgl_daftar,
		$nama_perusahaan,$alamat,$no_telp,$situs,$nama_kontak,$no_hp){
		$koneksi = koneksi_db();
		$sql = "insert into perusahaan values('$id_perusahaan','$id_kota','$email','$password','$tgl_daftar',
			'$nama_perusahaan','$alamat','$no_telp','$situs','$nama_kontak','$no_hp')";
		$hasil = 0;
		if(mysqli_query($koneksi, $sql))
		$hasil = 1;
		mysqli_close($koneksi);
		return $hasil;
	}

	function hapusPerusahaan($id){
		$koneksi = koneksi_db();
		$sql = "delete from perusahaan where id_perusahaan='$id'";
		if (!mysqli_query($koneksi, $sql)){
			die('Error: ' . mysqli_error());
		}
		$hasil = mysqli_affected_rows($koneksi);
		mysqli_close($koneksi);
		return $hasil; 	
	}

	function cariPerusahaan($id_perusahaan){
		$koneksi = koneksi_db();
		$sql = "select kota.*, perusahaan.* from perusahaan 
				inner join kota on perusahaan.id_kota = kota.id_kota
				where id_perusahaan = '$id_perusahaan'";
		$hasil = mysqli_query($koneksi, $sql);
		if(mysqli_num_rows($hasil)>0){
			$baris = mysqli_fetch_assoc($hasil);
			$data2['id_perusahaan']   = $baris['id_perusahaan'];
			$data2['id_kota']         = $baris['id_kota'];			
			$data2['email']           = $baris['email'];
			$data2['password']        = $baris['password'];
			$data2['tgl_daftar']      = $baris['tgl_daftar'];
			$data2['nama_perusahaan'] = $baris['nama_perusahaan'];
			$data2['alamat']          = $baris['alamat'];
			$data2['no_telp']         = $baris['no_telp'];
			$data2['situs']           = $baris['situs'];
			$data2['nama_kontak']     = $baris['nama_kontak'];
			$data2['no_hp']           = $baris['no_hp'];
			$data2['nama_kota']       = $baris['nama_kota'];
		mysqli_close($koneksi);
		return $data2;
		} else {
			mysqli_close($koneksi);
			return null;
		}
	}

	function cariSemuaPerusahaan($kondisi){
		$sql = "select * from perusahaan where $kondisi";
		return bacaPerusahaan($sql);
	}

	function ubahPerusahaan($id_perusahaan,$id_kota,$email,$password,$tgl_daftar,
			$nama_perusahaan,$alamat,$no_telp,$situs,$nama_kontak,$no_hp){
		$koneksi = koneksi_db();
		$sql = "UPDATE perusahaan 
			SET id_perusahaan = '$id_perusahaan',
			id_kota           = '$id_kota',
			email             = '$email',
			password          = '$password',
			tgl_daftar        = '$tgl_daftar',
			nama_perusahaan   = '$nama_perusahaan',
			alamat            = '$alamat',
			no_telp           = '$no_telp',
			situs             = '$situs',
			nama_kontak       = '$nama_kontak',
			no_hp             = '$no_hp'
			WHERE id_perusahaan = '$id_perusahaan'";

		if (mysqli_query($koneksi, $sql)) {
			$hasil = true;
		} else {
			$hasil = "Error mengubah record: " . mysqli_error($koneksi);
		}
		mysqli_close($koneksi);
		return $hasil;
	}
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

?>