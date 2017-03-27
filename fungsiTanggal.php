<?php 
	function tanggalIndo($tgl){
		$namaBulan = array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli",
		"Agustus","September","Oktober","November","Desember");
		$date      = explode("-",$tgl);
		$bulan     = intval($date[1]);
		$tanggal   = $date[2]." ".$namaBulan[$bulan]." ".$date[0];
		return $tanggal;
	}
	
	function jenisKelamin($jenis_kelamin){
		if($jenis_kelamin=="L")
			$gender = "Pria";
		elseif($jenis_kelamin=="P")
			$gender = "Wanita";
		elseif($jenis_kelamin=="L/P")
			$gender = "Pria/Wanita";
		return $gender;
	}
?>
