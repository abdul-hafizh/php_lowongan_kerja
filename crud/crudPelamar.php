<?php
	require_once 'koneksi_db_loker.php';

	function bacaPelamar($sql){
		$data = array();
		$koneksi = koneksi_db();
		$hasil = mysqli_query($koneksi, $sql);

		if (mysqli_num_rows($hasil) == 0) {
			mysqli_close($koneksi);
			return null;  
		}
			$i=0;
			while($baris = mysqli_fetch_assoc($hasil)) {
			$data[$i]['id_pelamar']    = $baris['id_pelamar'];
			$data[$i]['id_kota']       = $baris['id_kota'];
			$data[$i]['id_jurusan']    = $baris['id_jurusan'];
			$data[$i]['email']         = $baris['email'];
			$data[$i]['password']      = $baris['password'];
			$data[$i]['no_ktp']        = $baris['no_ktp'];
			$data[$i]['tgl_daftar']    = $baris['tgl_daftar'];
			$data[$i]['nama_lengkap']  = $baris['nama_lengkap'];
			$data[$i]['jenis_kelamin'] = $baris['jenis_kelamin'];
			$data[$i]['tgl_lahir']     = $baris['tgl_lahir'];
			$data[$i]['alamat']        = $baris['alamat'];
			$data[$i]['no_hp']         = $baris['no_hp'];
			$data[$i]['photo']         = $baris['photo'];
			$data[$i]['nama_kota']     = $baris['nama_kota'];
			$data[$i]['nama_jurusan']  = $baris['nama_jurusan'];
			$i++;
		}
		mysqli_close($koneksi);
		return $data;
	}
	
	function bacaLampiran($sql2){
		$data2 = array();
		$koneksi = koneksi_db();
		$hasil = mysqli_query($koneksi, $sql2);

		if (mysqli_num_rows($hasil) == 0) {
			mysqli_close($koneksi);
			return null;  
		}
		$i=0;
		while($baris = mysqli_fetch_assoc($hasil)) {
			$data2[$i]['lampiran'] = $baris['lampiran'];
			$i++;
		}
		mysqli_close($koneksi);
		return $data2;
	}

	function tambahPelamar($id_pelamar,$id_kota,$id_jurusan,$email,$password,$no_ktp,$tgl_daftar,
					$nama_lengkap,$jenis_kelamin,$tgl_lahir,$alamat,$no_hp,$photo){
		$koneksi = koneksi_db();
		$sql = "insert into pelamar values('$id_pelamar','$id_kota','$id_jurusan','$email','$password','$no_ktp','$tgl_daftar',
				'$nama_lengkap','$jenis_kelamin','$tgl_lahir','$alamat','$no_hp','$photo')";
		$hasil = 0;
		if(mysqli_query($koneksi, $sql))
		$hasil = 1;
		mysqli_close($koneksi);
		return $hasil;
	}

	function hapusPelamar($id){
		$koneksi = koneksi_db();
		$sql = "delete from pelamar where id_pelamar='$id'";
		if (!mysqli_query($koneksi, $sql)){
			die('Error: ' . mysqli_error());
		}
		$hasil = mysqli_affected_rows($koneksi);
		mysqli_close($koneksi);
		return $hasil; 	
	}

	function cariPelamar($id_pelamar){
		$koneksi = koneksi_db();
		$sql = "select * from pelamar where id_pelamar = '$id_pelamar'";
		$hasil = mysqli_query($koneksi, $sql);
		if(mysqli_num_rows($hasil)>0){
			$baris = mysqli_fetch_assoc($hasil);
			$data['id_pelamar']    = $baris['id_pelamar'];
			$data['id_kota']       = $baris['id_kota'];
			$data['id_jurusan']    = $baris['id_jurusan'];
			$data['email']         = $baris['email'];
			$data['password']      = $baris['password'];
			$data['no_ktp']        = $baris['no_ktp'];
			$data['tgl_daftar']    = $baris['tgl_daftar'];
			$data['nama_lengkap']  = $baris['nama_lengkap'];
			$data['jenis_kelamin'] = $baris['jenis_kelamin'];
			$data['tgl_lahir']     = $baris['tgl_lahir'];
			$data['alamat']        = $baris['alamat'];
			$data['no_hp']         = $baris['no_hp'];
			$data['photo']         = $baris['photo'];
			
		mysqli_close($koneksi);
		return $data;
		} else {
			mysqli_close($koneksi);
			return null;
		}
	}

	function cariSemuaPelamar($kondisi){
		$sql = "select * from pelamar where $kondisi";
		return bacaPelamar($sql);
	}

	function ubahPelamar($id_pelamar,$id_kota,$id_jurusan,$email,$password,$no_ktp,$tgl_daftar,
					$nama_lengkap,$jenis_kelamin,$tgl_lahir,$alamat,$no_hp,$photo){
		$koneksi = koneksi_db();
		$sql = "UPDATE pelamar
			SET id_pelamar = '$id_pelamar',
			id_kota        = '$id_kota',
			id_jurusan     = '$id_jurusan',
			email          = '$email',
			password       = '$password',
			no_ktp         = '$no_ktp',
			tgl_daftar     = '$tgl_daftar',
			nama_lengkap   = '$nama_lengkap',
			jenis_kelamin  = '$jenis_kelamin',
			tgl_lahir      = '$tgl_lahir',
			alamat         = '$alamat',
			no_hp          = '$no_hp',
			photo          = '$photo'
			WHERE id_pelamar = '$id_pelamar'";

		if (mysqli_query($koneksi, $sql)) {
			$hasil = true;
		} else {
			$hasil = "Error mengubah record: " . mysqli_error($koneksi);
		}
		mysqli_close($koneksi);
		return $hasil;
	}
?>