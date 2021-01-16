-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jan 2021 pada 11.22
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tpp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `jabatan`) VALUES
(4, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', '2019-11-01', 'admin'),
(5, 'pengelola', 'pengelola', '3c7913bc17671596a43dcb4581992bdf', 'pengelola', 'pengelola', '1987-03-12', 'pengelola');

-- --------------------------------------------------------

--
-- Struktur dari tabel `beasiswa`
--

CREATE TABLE `beasiswa` (
  `id_beasiswa` int(11) NOT NULL,
  `nama_beasiswa` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `semester` varchar(50) NOT NULL,
  `tahun_beasiswa` varchar(255) NOT NULL,
  `pemberi_beasiswa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `beasiswa`
--

INSERT INTO `beasiswa` (`id_beasiswa`, `nama_beasiswa`, `deskripsi`, `semester`, `tahun_beasiswa`, `pemberi_beasiswa`) VALUES
(7, 'Beasiswa Siswa Miskin', 'Beasiswa Siswa Miskin', 'Ganjil', '2020', 'Sekolah'),
(8, 'Beasiswa Pemerintah Kabupaten', 'Beasiswa Pemerintah Kabupaten', 'Ganjil', '2020', 'Pemerintah'),
(9, 'Beasiswa Pemerintah', 'Beasiswa Pemerintah', 'Genap', '2020', 'Pemerintah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `beasiswa_siswa`
--

CREATE TABLE `beasiswa_siswa` (
  `id_beasiswa_siswa` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_beasiswa` int(11) NOT NULL,
  `status_beasiswa_siswa` varchar(50) NOT NULL,
  `status_uang` enum('Cair','Belum Cair') NOT NULL DEFAULT 'Belum Cair'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `beasiswa_siswa`
--

INSERT INTO `beasiswa_siswa` (`id_beasiswa_siswa`, `id_siswa`, `id_beasiswa`, `status_beasiswa_siswa`, `status_uang`) VALUES
(43, 25, 7, 'aktif', 'Belum Cair'),
(44, 31, 7, 'aktif', 'Belum Cair');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nama_orangtua` varchar(255) NOT NULL,
  `kip` varchar(50) NOT NULL,
  `kks` varchar(50) NOT NULL,
  `penghasilan_orangtua` float NOT NULL,
  `kepemilikan_motor` float NOT NULL,
  `jumlah_tanggungan` float NOT NULL,
  `nilai_rapot` float NOT NULL,
  `sertifikat_prestasi` float NOT NULL,
  `biaya_pbb` float NOT NULL,
  `biaya_listrik` float NOT NULL,
  `jarak_rumah` float NOT NULL,
  `foto_siswa` varchar(100) NOT NULL,
  `nilai_akhir` double NOT NULL,
  `foto_kip` varchar(100) NOT NULL,
  `foto_kks` varchar(100) NOT NULL,
  `foto_strukgaji` varchar(100) NOT NULL,
  `foto_stnk` varchar(100) NOT NULL,
  `foto_kk` varchar(100) NOT NULL,
  `foto_rapot` varchar(100) NOT NULL,
  `foto_sertifikat` varchar(100) NOT NULL,
  `foto_strukpbb` varchar(100) NOT NULL,
  `foto_struklistrik` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama`, `username`, `password`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `nama_orangtua`, `kip`, `kks`, `penghasilan_orangtua`, `kepemilikan_motor`, `jumlah_tanggungan`, `nilai_rapot`, `sertifikat_prestasi`, `biaya_pbb`, `biaya_listrik`, `jarak_rumah`, `foto_siswa`, `nilai_akhir`, `foto_kip`, `foto_kks`, `foto_strukgaji`, `foto_stnk`, `foto_kk`, `foto_rapot`, `foto_sertifikat`, `foto_strukpbb`, `foto_struklistrik`, `status`, `email`) VALUES
(25, 'Astika Ayustina', 'astika123', 'ef5eb06c79baea05a23595c9ec09f2ac', 'Surakarta', '2002-10-01', 'Kadipiro Rt 08 / Rw 04', 'Ganti Mulyono', '1', '1', 1, 0, 0.5, 0.75, 0.25, 0, 0, 0, 'fotosiswa_astika123.png', 0.5750000000000001, '', '', 'fotostrukgaji_astika123.png', '', 'fotokk_astika123.png', 'fotorapot.png', '', '', '', 1, 'nauval1526@student.uns.ac.id'),
(26, 'Azmi Dina Sabila', 'azmi12345', '662fa20374562d33e6032e8b2299fba6', 'Sukoharjo', '2003-10-31', 'Sidomulyo Rt 02 / Rw 05 Banyuanyar', 'Parno', '1', '1', 1, 0, 0.75, 0.75, 0.5, 0, 0, 0, 'fotosiswa_azmi12345.png', 0.7, 'fotokip_azmi12345.png', 'fotokks_azmi12345.png', 'fotostrukgaji_azmi12345.png', '', 'fotokk_azmi12345.png', 'fotorapot.png', 'fotosertifikatazmi12345.png', '', '', 1, 'syahrir.ikhsan11@gmail.com'),
(27, 'Azzahra Nusmi Nur Fauziah', 'azzahra123', '315715778839fb7d1f1e051a69de74fc', 'Surakarta', '2004-07-21', 'Widororejo rt 1 / rw 1 makamhaji', 'Tri Nugroho', '0', '0', 0.75, 0, 0.25, 0.5, 0.25, 0, 0, 0, 'fotosiswa_azzahra123.png', 0.5, '', '', 'fotostrukgaji_azzahra123.png', '', 'fotokk_azzahra123.png', 'fotorapot.png', 'fotosertifikatazzahra123.png', '', '', -1, ''),
(28, 'Belia Sandria Permata', 'belia12345', 'd4b151ff40ac6bfb0dcf1df6bdcc3e5a', 'Surakarta', '2004-08-26', 'Petoran Rt 2 / Rw 9 Jeres Surakarta', 'Sariyanto', '1', '1', 1, 0, 0.5, 1, 0.5, 0, 0, 0, 'fotosiswa_belia12345.png', 0.6875, 'fotokip_belia12345.png', 'fotokks_belia12345.png', 'fotostrukgaji_belia12345.png', '', 'fotokk_belia12345.png', 'fotorapot.png', 'fotosertifikatbelia12345.png', '', '', 0, ''),
(29, 'Caesar Eka Prihastuti', 'caesar123', '048e611657360f7acfc59b7fa57913c7', 'Surakarta', '2004-08-05', 'Sumber Nayu Rt 1 / Rw 7 Joglo', 'Ngadiman', '1', '1', 1, 0, 0.5, 1, 0.5, 0, 0, 0, 'fotosiswa_caesar123.jpg', 0.6875, 'fotokip_caesar123.png', 'fotokks_caesar123.png', 'fotostrukgaji_caesar123.png', '', 'fotokk_caesar123.png', 'fotorapot.png', 'fotosertifikatcaesar123.png', '', '', 0, ''),
(30, 'Cansa Farell Gladiesta Sutopo', 'cansa123', '3de99cd0c31535cec49b9be09440b811', 'Boyolali', '2004-07-04', 'Bakalan Rt 1 / Rw 3 Tanduk Ampel Boyolali', 'Agus Sutopo', '0', '1', 0.75, 0, 0.75, 0.5, 0.25, 0, 0, 0, 'fotosiswa_cansa123.jpg', 0.65, '', 'fotokks_cansa123.png', 'fotostrukgaji_cansa123.png', '', 'fotokk_cansa123.png', 'fotorapot.png', '', '', '', 0, ''),
(31, 'Dara Ayu Siti Ayesha', 'dara12345', 'b5664f133f997441cae35e6ea8abf477', 'Bandung', '2003-09-19', 'Jl Arifin No. 20 Rt 1 / Rw 5 Kebalen Solo', 'Rudianto', '0', '1', 1, 0, 0.5, 0.75, 0.25, 0, 0, 0, 'fotosiswa_dara12345.png', 0.5750000000000001, '', 'fotokks_dara12345.png', 'fotostrukgaji_dara12345.png', '', 'fotokk_dara12345.png', 'fotorapot.png', 'fotosertifikatdara12345.png', '', '', 1, 'syahrir.ikhsan11@gmail.com'),
(32, 'Devinta Syaharani', 'devinta123', '078cd971608c00e85e9435aa5e891cdd', 'Surakarta', '2003-12-21', 'Batikan Rt 3 / Rw 3 Bumi Laweyan Surakarta', 'Kirno', '1', '1', 1, 0, 0.25, 0.75, 0.25, 0, 0, 0, 'fotosiswa_devinta123.png', 0.5, 'fotokip_devinta123.png', 'fotokks_devinta123.png', 'fotostrukgaji_devinta123.png', '', 'fotokk_devinta123.png', 'fotorapot.png', 'fotosertifikatdevinta123.png', '', '', 0, 'syahrir.ikhsan11@gmail.com'),
(33, 'Dica Rafik Farhansya', 'dica12345', '00e0a9ff161a49dc08aa91dd6fe5c345', 'Wonosobo', '2003-12-17', 'Jl Ape 3 Rt 3 / Rw 2 Jajar Gang 1', 'Sarwo Niat', '0', '1', 1, 0, 0.25, 0.75, 0.5, 0, 0, 0, 'fotosiswa_dica12345.png', 0.55, '', 'fotokks_dica12345.png', 'fotostrukgaji_dica12345.png', '', 'fotokk_dica12345.png', 'fotorapot.png', 'fotosertifikatdica12345.png', '', '', -1, ''),
(34, 'Dina Astrianna Mahardika', 'dina12345', '62a2f4a82f6156e6042db3a230885878', 'Karanganyar', '2004-06-30', 'Grumbulpring Rt 1 / Rw 3 Plesungan Gondangrejo', 'Sugino', '0', '0', 1, 0, 0.25, 0.75, 0.25, 0, 0, 0, 'fotosiswa_dina12345.png', 0.5, '', '', 'fotostrukgaji_dina12345.png', '', 'fotokk_dina12345.png', 'fotorapot.png', '', '', '', -1, ''),
(35, 'Diyah Ayu Wulandari', 'diyah123', '5e631f0b63717ae056714004a86dfb86', 'Pekalongan', '2001-08-27', 'PERUM. GKS 7 BLOK C18 RT05/RW02\'CELEP LOR,DAGEN,JATEN,KARANGANYAR', 'Budi Prasojo', '0', '0', 1, 0, 0.5, 0.5, 0.25, 0, 0, 0, 'fotosiswa_diyah123.png', 0.5125000000000001, '', '', 'fotostrukgaji_diyah123.png', '', 'fotokk_diyah123.png', 'fotorapot.png', '', '', '', -1, ''),
(37, 'Elayani Dwi Setyowati', 'elayani123', '0776574b49b38d13e5c9fd4cce604f2e', 'Boyolali', '2004-06-15', 'BROGO RT03/RWO4 DONOHUDAN,NGEMPLAK,BOYOLALI', 'Sutar', '0', '0', 0.75, 0, 0.25, 0.75, 0.5, 0, 0, 0, 'fotosiswa_elayani123.png', 0.6124999999999999, '', '', 'fotostrukgaji_elayani123.png', '', 'fotokk_elayani123.png', 'fotorapot.png', 'fotosertifikatelayani123.png', '', '', 0, ''),
(38, 'Elly Murtiningsih', 'elly12345', 'dbb0781e4ad3d9aeb36043e0824a108d', 'Surakarta', '2003-07-11', 'Mutihan Rt 2 / Rw 11', 'Sidik Aluba', '1', '1', 1, 0, 0.25, 1, 1, 0, 0, 0, 'fotosiswa_elly12345.png', 0.7124999999999999, 'fotokip_elly12345.png', 'fotokks_elly12345.png', 'fotostrukgaji_elly12345.png', '', 'fotokk_elly12345.png', 'fotorapot.png', 'fotosertifikatelly12345.png', '', '', 0, ''),
(39, 'Era Pujiastuti', 'era12345', '2ff9235ea4afd62f9572128d49f3b75e', 'Karanganyar', '2004-08-22', 'KAUMAN RT03/01 KRAGAN GONDANGREJO KARANGANYAR', 'Sutanto', '0', '0', 0.75, 0, 0.5, 0.5, 0.25, 0, 0, 0, 'fotosiswa_era12345.png', 0.5750000000000001, '', '', 'fotostrukgaji_era12345.png', '', 'fotokk_era12345.png', 'fotorapot.png', '', '', '', 1, 'syahrir.ikhsan11@gmail.com'),
(40, 'Ester Pinastiko Talenta Putri', 'ester123', '683c81f323eb9f6d2e8df5b9ca028fa4', 'Surakarta', '2004-07-20', 'Kagokan Rt 3 / Rw 11', 'Suryono Ananto Tjoncro Sutopo', '0', '0', 1, 0, 0.75, 0.75, 0.5, 0, 0, 0, 'fotosiswa_ester123.png', 0.7, '', '', 'fotostrukgaji_ester123.png', '', 'fotokk_ester123.png', 'fotorapot.png', 'fotosertifikatester123.png', '', '', 0, ''),
(41, 'Fadila Nurul Ilmi', 'fadila123', 'c0bf7f5d40f2e2ac2064ee411ff5f445', 'Surakarta', '2004-07-11', 'BIBIS WETAN RT 05 RW 21 GILINGAN BANJARSARI', 'Suprianto', '0', '0', 1, 0, 0.5, 0.75, 0.25, 0, 0, 0, 'fotosiswa_fadila123.jpg', 0.5750000000000001, '', '', 'fotostrukgaji_fadila123.png', '', 'fotokk_fadila123.png', 'fotorapot.png', '', '', '', 1, 'syahrir.ikhsan11@gmail.com'),
(42, 'Fania Lussy Claudia', 'fania123', '94052a72f99aee565bf7b690c764fda5', 'Boyolali', '2004-02-21', 'GAREN RT 03 RW 04 PANDEAN NGEMPLAK BOYOLALI', 'Agung Yuli Prastyo', '0', '0', 1, 0, 0.5, 0.25, 0.25, 0, 0, 0, 'fotosiswa_fania123.jpg', 0.45, '', '', 'fotostrukgaji_fania123.png', '', 'fotokk_fania123.png', 'fotorapot.png', '', '', '', -1, ''),
(43, 'Farida Ratna Wati', 'farida123', '7f239fc72efbd50fbc13280a4037b587', 'Karanganyar', '2004-11-10', 'KENTINGAN RT 01 RW 36 JEBRES SURAKARTA', 'Suratno', '0', '0', 1, 0, 0.5, 1, 1, 0, 0, 0, 'fotosiswa_farida123.jpg', 0.7875000000000001, 'fotokip_farida123.png', 'fotokks_farida123.png', 'fotostrukgaji_farida123.png', '', 'fotokk_farida123.png', 'fotorapot.png', 'fotosertifikatfarida123.png', '', '', 0, ''),
(44, 'Febri Rizki Andriani', 'febri123', '296aadbf4ebe1379615e81800dab7777', 'Surakarta', '2004-02-22', 'KLEBEN RT 02 RW 08 GEDONGAN COLOMADU', 'Andri Susanto', '0', '0', 1, 0, 0.5, 0.75, 0.75, 0, 0, 0, 'fotosiswa_febri123.png', 0.675, '', '', 'fotostrukgaji_febri123.png', '', 'fotokk_febri123.png', 'fotorapot.png', 'fotosertifikatfebri123.png', '', '', 0, ''),
(45, 'Ika Wahyu Ningtyas', 'ika12345', 'c29a4d029ab36593d3f3dd5b5b56da7d', 'Surakarta', '2003-03-13', 'BAYAN KRAJAN RT 11 RW 20 KADIPIRO SURAKARTA', 'Ranto', '1', '1', 1, 0, 0.5, 0.75, 0.25, 0, 0, 0, 'fotosiswa_ika12345.png', 0.9375, 'fotokip_ika12345.png', '', '', '', '', '', '', '', '', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`id_beasiswa`);

--
-- Indeks untuk tabel `beasiswa_siswa`
--
ALTER TABLE `beasiswa_siswa`
  ADD PRIMARY KEY (`id_beasiswa_siswa`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_beasiswa` (`id_beasiswa`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  MODIFY `id_beasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `beasiswa_siswa`
--
ALTER TABLE `beasiswa_siswa`
  MODIFY `id_beasiswa_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `beasiswa_siswa`
--
ALTER TABLE `beasiswa_siswa`
  ADD CONSTRAINT `fk_beasiswasiswa_beasiswa` FOREIGN KEY (`id_beasiswa`) REFERENCES `beasiswa` (`id_beasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_beasiswasiswa_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
