-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2016 at 12:40 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lowongan_kerja`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(5) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `password`, `nama`, `tgl_daftar`) VALUES
(1, 'herwanto@gmail.com', '1234567', 'Herwanto', '2016-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan_pendidikan`
--

CREATE TABLE IF NOT EXISTS `jurusan_pendidikan` (
  `id_jurusan` int(5) NOT NULL,
  `nama_jurusan` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan_pendidikan`
--

INSERT INTO `jurusan_pendidikan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Manajemen Informatika'),
(2, 'Sistem Informasi'),
(3, 'Komputer Akuntansi'),
(4, 'Teknik Komputer'),
(5, 'Teknik Sipil'),
(6, 'Bahasa Indonesia'),
(7, 'Akuntansi'),
(8, 'Multimedia'),
(9, 'Matematika'),
(10, 'Bahasa Inggris'),
(11, 'Bahasa Mandarin'),
(12, 'Musik'),
(13, 'Kimia'),
(14, 'Biologi'),
(15, 'Ilmu Hukum'),
(16, 'Ilmu Komunikasi'),
(17, 'Kecantikan'),
(18, 'Tata Boga'),
(19, 'Ekonomi'),
(20, 'Sejarah'),
(21, 'Kedokteran'),
(22, 'Pemasaran'),
(23, 'Ilmu Pengtahuan Bisnis'),
(24, 'Geografi'),
(25, 'Pertanian'),
(26, 'Arsitektur'),
(27, 'Transportasi'),
(28, 'Telekomunikasi'),
(29, 'Ilmu Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Teknologi Informatika'),
(2, 'Pemasaran dan Penjualan'),
(3, 'Akuntansi dan Perpajakan'),
(4, 'Pertanian dan Perkebunan'),
(5, 'Hukum'),
(6, 'Kesehatan dan Kecantikan'),
(7, 'Pendidikan dan Pelatihan'),
(8, 'Transportasi dan Logistik'),
(9, 'Konstruksi dan Bangunan'),
(10, 'Laboratorium'),
(11, 'Layanan Pelanggan'),
(12, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `id_kota` int(5) NOT NULL,
  `nama_kota` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`) VALUES
(1, 'Aceh Barat'),
(2, 'Aceh Barat Daya'),
(3, 'Banda Aceh'),
(4, 'Langsang'),
(5, 'Lokseumawe'),
(6, 'Sabang'),
(7, 'Subulussalam'),
(8, 'Aceh Besar'),
(9, 'Aceh Jaya'),
(10, 'Aceh Selatan'),
(11, 'Aceh Singkil'),
(12, 'Aceh Tamiang'),
(13, 'Aceh Tengah'),
(14, 'Aceh Tenggara'),
(15, 'Aceh Timur'),
(16, 'Aceh Utara'),
(17, 'Bener Meriah'),
(18, 'Bireuen'),
(19, 'Gayo Luwes'),
(20, 'Nagan Raya'),
(21, 'Pidie'),
(22, 'Pidie Jaya'),
(23, 'Simeulue'),
(24, 'Binjai'),
(25, 'Gunungsitoli'),
(26, 'Medan'),
(27, 'Padangsidempuan'),
(28, 'Pematangsiantar'),
(29, 'Sibolga'),
(30, 'Tanjungbalai'),
(31, 'Tebing Tinggi'),
(32, 'Asahan'),
(33, 'Batu Bara'),
(34, 'Dairi'),
(35, 'Deli Serdang'),
(36, 'Humbang Hasundutan'),
(37, 'Karo'),
(38, 'Labuhanbatu'),
(39, 'Langkat'),
(40, 'Mandailing Natal'),
(41, 'Nias'),
(42, 'Padang Lawas'),
(43, 'Pakpak Bharat'),
(44, 'Samosir'),
(45, 'Serdang Bedagai'),
(46, 'Simalungun'),
(47, 'Tapanuli'),
(48, 'Toba Samosir'),
(49, 'Bukittinggi'),
(50, 'Padang'),
(51, 'Padangpanjang'),
(52, 'Pariaman'),
(53, 'Payakumbuh'),
(54, 'Sawahlunto'),
(55, 'Solok'),
(56, 'Agam'),
(57, 'Dharmasraya'),
(58, 'Kepulauan Mentawai'),
(59, 'Lima Puluh Kota'),
(60, 'Padang Pariaman'),
(61, 'Pasaman'),
(62, 'Pesisir Selatan'),
(63, 'Sijunjung'),
(64, 'Solok'),
(65, 'Tanah Datar'),
(66, 'Dumai'),
(67, 'Pekan Baru'),
(68, 'Batam'),
(69, 'Tanjung Pinang'),
(70, 'Jambi'),
(71, 'Sungai Penuh'),
(72, 'Bengkulu'),
(73, 'Lubuklinggau'),
(74, 'Pagar Alam'),
(75, 'Palembang'),
(76, 'Prabumulih'),
(77, 'Pangkal Pinang'),
(78, 'Bandar Lampung'),
(79, 'Metro'),
(80, 'Cilegon'),
(81, 'Serang'),
(82, 'Tangerang'),
(83, 'Pandeglang'),
(84, 'Bandung'),
(85, 'Banjar'),
(86, 'Bekasi'),
(87, 'Bogor'),
(88, 'Cimahi'),
(89, 'Cirebon'),
(90, 'Depok'),
(91, 'Sukabumi'),
(92, 'Tasikmalaya'),
(93, 'Jakarta Barat'),
(94, 'Jakarta Timur'),
(95, 'Jakarta Pusat'),
(96, 'Jakarta Selatan'),
(97, 'Jakarta Utara'),
(98, 'Magelang'),
(99, 'Pekalongan'),
(100, 'Salatiga'),
(101, 'Semarang'),
(102, 'Surakarta'),
(103, 'Tegal'),
(104, 'Bantul'),
(105, 'Gunungkidul'),
(106, 'Kulon Progo'),
(107, 'Sleman'),
(108, 'Yogyakarta'),
(109, 'Blitar'),
(110, 'Kediri'),
(111, 'Madiun'),
(112, 'Malang'),
(113, 'Mojokerto'),
(114, 'Pasuruan'),
(115, 'Probolinggo'),
(116, 'Surabaya'),
(117, 'Denpasar'),
(118, 'Karangasem'),
(119, 'Badung'),
(120, 'Bima'),
(121, 'Mataram'),
(122, 'Kupang'),
(123, 'Malaka'),
(124, 'Sumba'),
(125, 'Pontianak'),
(126, 'Singkawang'),
(127, 'Banjarmasin'),
(128, 'Banjarbaru'),
(129, 'Palangka Raya'),
(130, 'Balikpapan'),
(131, 'Bontang'),
(132, 'Samarinda'),
(133, 'Tarakan'),
(134, 'Gorontalo'),
(135, 'Makasar'),
(136, 'Palopo'),
(137, 'Parepare'),
(138, 'Bau Bau'),
(139, 'Kendari'),
(140, 'Palu'),
(141, 'Bitung'),
(142, 'Kotamobagu'),
(143, 'Manado'),
(144, 'Tomohon'),
(145, 'Mamuju'),
(146, 'Ambon'),
(147, 'Tual'),
(148, 'Ternate'),
(149, 'Tidore'),
(150, 'Jayapura'),
(151, 'Sorong'),
(152, 'Klaten');

-- --------------------------------------------------------

--
-- Table structure for table `lamaran`
--

CREATE TABLE IF NOT EXISTS `lamaran` (
  `id_lamaran` int(5) NOT NULL,
  `id_pelamar` int(5) NOT NULL,
  `id_lowongan` int(5) NOT NULL,
  `tgl_lamar` date NOT NULL,
  `lampiran` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Process'
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lamaran`
--

INSERT INTO `lamaran` (`id_lamaran`, `id_pelamar`, `id_lowongan`, `tgl_lamar`, `lampiran`, `status`) VALUES
(40, 30, 21, '2016-08-04', 'PassCitSuper.rar', 'Proses'),
(41, 30, 22, '2016-08-05', 'lamaran_teknisi.rar', 'Proses'),
(48, 35, 27, '2016-08-09', 'portal - Copy.rar', 'Proses'),
(49, 35, 28, '2016-08-09', 'sarah.rar', 'Proses'),
(50, 35, 26, '2016-08-09', 'sarah2.rar', 'Proses'),
(51, 33, 22, '2016-08-09', 'imamm.rar', 'Proses'),
(52, 33, 21, '2016-08-09', 'imamm - Copy.rar', 'Proses'),
(53, 33, 26, '2016-08-09', 'imamm - 2.rar', 'Proses'),
(54, 30, 28, '2016-08-09', 'sabila.rar', 'Proses'),
(55, 30, 25, '2016-08-09', 'sabila - Copy.rar', 'Proses'),
(56, 36, 29, '2016-08-10', 'hafizh.rar', 'Proses'),
(57, 30, 29, '2016-08-10', 'nur.rar', 'Proses');

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE IF NOT EXISTS `lowongan` (
  `id_lowongan` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `id_perusahaan` int(5) NOT NULL,
  `id_kota` int(5) NOT NULL,
  `id_jurusan` int(5) NOT NULL,
  `tgl_buat` date NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `tipe_pekerjaan` varchar(15) NOT NULL,
  `deskripsi` text NOT NULL,
  `persyaratan` text NOT NULL,
  `tawaran_gaji` varchar(25) NOT NULL,
  `usia_max` char(2) NOT NULL,
  `jenis_kelamin` char(3) NOT NULL,
  `batas_lamaran` date NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Process'
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`id_lowongan`, `id_kategori`, `id_perusahaan`, `id_kota`, `id_jurusan`, `tgl_buat`, `pekerjaan`, `tipe_pekerjaan`, `deskripsi`, `persyaratan`, `tawaran_gaji`, `usia_max`, `jenis_kelamin`, `batas_lamaran`, `status`) VALUES
(21, 1, 1016, 84, 2, '2016-08-04', 'Web Desain', 'Kontrak', 'Mendesain web dinamis.', 'Minimal sudah berpengalaman pada bidangnya selama 1 tahun.', '2.000.000-3.000.000', '40', 'L/P', '2016-09-06', 'Publik'),
(22, 1, 1016, 101, 4, '2016-08-05', 'Teknisi Komputer', 'Kontrak', 'Memperbaiki komputer yang rusak.', 'Berpengalaman minimal 1 tahun pada bidangnya.', '1.000.000-2.000.000', '35', 'L', '2016-10-09', 'Publik'),
(25, 2, 1016, 135, 6, '2016-08-06', 'Sales', 'Freelance', 'Menjual barang elektronik.', 'Berpenampilan menarik dan siap bekerja keras.', 'UMR', '30', 'P', '2016-11-15', 'Publik'),
(26, 4, 1020, 152, 25, '2016-08-09', 'Asisten Kepala Kebun', 'Kontrak', 'Membantu kepala kebun dalam berkebun', 'Minimal Sarjana, berpengalaman 1 tahun.', 'Rahasia', '35', 'L/P', '2016-12-15', 'Publik'),
(27, 3, 1020, 92, 7, '2016-08-09', 'Staff Keuangan', 'Tetap', 'Membuat buku keuangan per periode', 'Minimal D3, berpengalaman 2 tahun.', '2.000.000-3.000.000', '35', 'P', '2016-10-12', 'Publik'),
(28, 6, 1020, 89, 21, '2016-08-09', 'Rekam Medis', 'Magang', 'Membantu dokter dalam merekam medis', 'Berpengalaman 2 tahun pada bidangnya.', 'UMR', '30', 'P', '2016-10-05', 'Publik'),
(29, 1, 1021, 108, 1, '2016-08-10', 'Programmer Java', 'Kontrak', 'Membuat program berbasis desktop', 'Memiliki sertifikat bahasa inggris, berpengalaman bidang programer 2 tahun.', '3.000.000-5.000.000', '30', 'L', '2016-10-12', 'Publik'),
(30, 3, 1021, 108, 7, '2016-08-10', 'Akuntansi', 'Tetap', 'Membuat laporan keuangan.', 'Berpengalaman minimal 2 tahun.', '2.000.000-3.000.000', '35', 'P', '2016-10-15', 'Publik');

-- --------------------------------------------------------

--
-- Table structure for table `pelamar`
--

CREATE TABLE IF NOT EXISTS `pelamar` (
  `id_pelamar` int(5) NOT NULL,
  `id_kota` int(5) NOT NULL,
  `id_jurusan` int(5) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `no_ktp` char(16) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` char(12) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelamar`
--

INSERT INTO `pelamar` (`id_pelamar`, `id_kota`, `id_jurusan`, `email`, `password`, `no_ktp`, `tgl_daftar`, `nama_lengkap`, `jenis_kelamin`, `tgl_lahir`, `alamat`, `no_hp`, `photo`) VALUES
(30, 108, 1, 'sabilanur@ymail.com', '1234567', '3311232332123498', '2016-08-04', 'Sabila Nur Khodijah', 'P', '1993-08-09', 'Jl. Waringin Karangbendo 64 ', '081345676567', 'yui.jpg'),
(32, 92, 21, 'mario@yahoo.com', '1234567', '3311232332123459', '2016-08-09', 'Mario Maurer', 'L', '1994-09-12', 'Jl. Tasikraya 12 - Pasut ', '081345676598', 'mario-maurer-profile.jpg'),
(33, 90, 2, 'imam@yahoo.com', '1234567', '3311232332123411', '2016-08-09', 'Khoirul Imam', 'L', '1992-03-08', 'Jl. Mangud 12 - Jempis', '081314031666', 'images.jpeg'),
(34, 96, 21, 'nisanur@gmail.com', '1234567', '3311232332123490', '2016-08-09', 'Nisa Nur', 'P', '1993-08-12', 'Jl. Mawar 23 - Kuris ', '081314031557', 'images-3.jpeg'),
(35, 103, 25, 'sarahisan@yahoo.com', '1234567', '3311232332123480', '2016-08-09', 'Sarah Azhar', 'P', '1980-09-09', 'Jl. Jumanji 45 - Lampak ', '081345676511', 'images-2.jpeg'),
(36, 108, 7, 'hafizh93@ymail.com', '1234567', '3311232332123499', '2016-08-10', 'Abdul Hafizh', 'L', '1990-08-10', 'Jl. mutiara raya 12 - Cawas ', '081345676523', 'images-1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE IF NOT EXISTS `perusahaan` (
  `id_perusahaan` int(5) NOT NULL,
  `id_kota` int(5) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `nama_perusahaan` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` char(12) NOT NULL,
  `situs` varchar(40) NOT NULL,
  `nama_kontak` varchar(15) NOT NULL,
  `no_hp` char(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1022 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `id_kota`, `email`, `password`, `tgl_daftar`, `nama_perusahaan`, `alamat`, `no_telp`, `situs`, `nama_kontak`, `no_hp`) VALUES
(1016, 95, 'sukamaju@gmail.com', '1234567 ', '2016-08-04', 'PT Sukamaju ', 'Jl. Kemayoran 123 Blok A ', '021-68786859', 'www.sukamaju.com ', 'Sulis', '081314031555'),
(1017, 116, 'master@gmail.co.id', '1234567', '2016-08-09', 'PT Master', 'Jl. Melati Karang Wetan 12', '027-12228370', 'www.master.com', 'Agung', '081314031559'),
(1018, 50, 'nuansa@yahoo.com', '1234567', '2016-08-09', 'PT Nuansa', 'Jl. Kediri Mandura 13', '027-12228322', 'www.nuansa.com', 'Andre', '081345676561'),
(1019, 90, 'bahagia@gmail.com', '1234567', '2016-08-09', 'PT Bahagia', 'Jl. Jumandi Raya 99', '027-12228374', 'www.bahagia.com', 'Brian', '081314031554'),
(1020, 102, 'indoraya@yahoo.com', '1234567', '2016-08-09', 'PT Indoraya', 'Jl. Mutiara Agung 55 - Demen', '027-12228373', 'www.indoraya.com', 'Suroto', '081314031555'),
(1021, 108, 'setiabadi@gmail.com', '1234567', '2016-08-10', 'PT Setia Abadi', 'Jl. Karangbendo 12 - Kampis', '027-12228311', 'www.setiabadi.com', 'Ghani', '081314031555');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `jurusan_pendidikan`
--
ALTER TABLE `jurusan_pendidikan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `lamaran`
--
ALTER TABLE `lamaran`
  ADD PRIMARY KEY (`id_lamaran`),
  ADD UNIQUE KEY `lampiran` (`lampiran`),
  ADD KEY `id_pelamar` (`id_pelamar`),
  ADD KEY `id_lowongan` (`id_lowongan`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`id_lowongan`),
  ADD KEY `id_perusahaan` (`id_perusahaan`),
  ADD KEY `id_kota` (`id_kota`),
  ADD KEY `id_bidang` (`id_jurusan`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`id_pelamar`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_kota` (`id_kota`),
  ADD KEY `id_bidang` (`id_jurusan`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_kota` (`id_kota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jurusan_pendidikan`
--
ALTER TABLE `jurusan_pendidikan`
  MODIFY `id_jurusan` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=153;
--
-- AUTO_INCREMENT for table `lamaran`
--
ALTER TABLE `lamaran`
  MODIFY `id_lamaran` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id_lowongan` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `id_pelamar` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1022;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `lamaran`
--
ALTER TABLE `lamaran`
  ADD CONSTRAINT `lamaran_ibfk_1` FOREIGN KEY (`id_pelamar`) REFERENCES `pelamar` (`id_pelamar`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `lamaran_ibfk_2` FOREIGN KEY (`id_lowongan`) REFERENCES `lowongan` (`id_lowongan`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD CONSTRAINT `lowongan_ibfk_1` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id_perusahaan`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `lowongan_ibfk_2` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `lowongan_ibfk_3` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan_pendidikan` (`id_jurusan`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `lowongan_ibfk_4` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD CONSTRAINT `pelamar_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan_pendidikan` (`id_jurusan`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pelamar_ibfk_2` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD CONSTRAINT `perusahaan_ibfk_1` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
