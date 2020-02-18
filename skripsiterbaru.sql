-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Feb 2020 pada 06.40
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahantrendmoment`
--

CREATE TABLE `bahantrendmoment` (
  `no` int(80) NOT NULL,
  `nm_barang` varchar(255) NOT NULL,
  `kd_barang` varchar(80) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `id_tkeluar` varchar(20) NOT NULL,
  `departemen` varchar(40) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahantrendmoment`
--

INSERT INTO `bahantrendmoment` (`no`, `nm_barang`, `kd_barang`, `jumlah`, `id_tkeluar`, `departemen`, `tanggal`) VALUES
(1, 'bookcase', 'bk0001', 120, 'TK00001', 'fitting', '2016-01-01'),
(2, 'bookcase', 'bk0001', 140, 'TK00003', 'fitting', '2016-02-05'),
(3, 'bookcase', 'bk0001', 259, 'TK00005', 'fitting', '2016-03-03'),
(4, 'bookcase', 'bk0001', 270, 'TK00007', 'fitting', '2016-04-01'),
(5, 'Knop', 'TS000128', 60, 'TK00001', 'fitting', '2016-01-01'),
(6, 'Knop', 'TS000128', 70, 'TK00003', 'fitting', '2016-02-05'),
(7, 'Knop', 'TS000128', 130, 'TK00005', 'fitting', '2016-03-03'),
(8, 'Knop', 'TS000128', 135, 'TK00007', 'fitting', '2016-04-01'),
(9, 'bookcase', 'bk0001', 200, 'TK00011', 'fitting', '2016-05-02'),
(10, 'Knop', 'TS000128', 100, 'TK00011', 'fitting', '2016-05-02'),
(11, 'bookcase', 'bk0001', 211, 'TK00014', 'fitting', '2016-06-02'),
(12, 'Knop', 'TS000128', 105, 'TK00014', 'fitting', '2016-06-02'),
(13, 'bookcase', 'bk0001', 100, 'TK00017', 'fitting', '2016-07-09'),
(14, 'Knop', 'TS000128', 50, 'TK00017', 'fitting', '2016-07-09'),
(15, 'Knop', 'TS000128', 125, 'TK00019', 'fitting', '2016-08-05'),
(16, 'bookcase', 'bk0001', 257, 'TK00019', 'fitting', '2016-08-05'),
(17, 'bookcase', 'bk0001', 212, 'TK00022', 'fitting', '2016-09-01'),
(18, 'Knop', 'TS000128', 106, 'TK00022', 'fitting', '2016-09-01'),
(19, 'bookcase', 'bk0001', 129, 'TK00024', 'fitting', '2016-10-01'),
(20, 'Knop', 'TS000128', 64, 'TK00024', 'fitting', '2016-10-01'),
(21, 'bookcase', 'bk0001', 115, 'TK00026', 'fitting', '2016-11-02'),
(22, 'Knop', 'TS000128', 57, 'TK00026', 'fitting', '2016-11-02'),
(23, 'bookcase', 'bk0001', 100, 'TK00027', 'fitting', '2016-12-03'),
(24, 'Knop', 'TS000128', 50, 'TK00027', 'fitting', '2016-12-03'),
(25, 'bookcase', 'bk0001', 70, 'TK00028', 'fitting', '2017-01-02'),
(26, 'bookcase', 'bk0001', 94, 'TK00029', 'fitting', '2017-02-05'),
(27, 'bookcase', 'bk0001', 180, 'TK00030', 'fitting', '2017-03-05'),
(28, 'Knop', 'TS000128', 35, 'TK00028', 'fitting', '2017-01-02'),
(29, 'Knop', 'TS000128', 47, 'TK00029', 'fitting', '2017-02-05'),
(30, 'Knop', 'TS000128', 90, 'TK00030', 'fitting', '2017-03-05'),
(31, 'Knop', 'TS000128', 115, 'TK00032', 'fitting', '2017-04-02'),
(32, 'Knop', 'TS000128', 128, 'TK00052', 'fitting', '2018-01-01'),
(33, 'bookcase', 'bk0001', 257, 'TK00052', 'fitting', '2018-01-01'),
(34, 'bookcase', 'bk0001', 230, 'TK00032', 'fitting', '2017-04-02'),
(35, 'bookcase', 'bk0001', 270, 'TK00034', 'fitting', '2017-05-02'),
(36, 'bookcase', 'bk0001', 300, 'TK00036', 'fitting', '2017-06-02'),
(37, 'bookcase', 'bk0001', 332, 'TK00039', 'fitting', '2017-07-02'),
(38, 'bookcase', 'bk0001', 259, 'TK00042', 'fitting', '2017-08-02'),
(39, 'bookcase', 'bk0001', 270, 'TK00044', 'fitting', '2017-09-02'),
(40, 'bookcase', 'bk0001', 200, 'TK00047', 'fitting', '2017-10-01'),
(41, 'bookcase', 'bk0001', 211, 'TK00049', 'fitting', '2017-11-01'),
(42, 'bookcase', 'bk0001', 100, 'TK00051', 'fitting', '2017-12-01'),
(43, 'bookcase', 'bk0001', 266, 'TK00055', 'fitting', '2018-02-03'),
(44, 'bookcase', 'bk0001', 235, 'TK00057', 'fitting', '2018-03-03'),
(45, 'bookcase', 'bk0001', 334, 'TK00059', 'fitting', '2018-04-03'),
(46, 'bookcase', 'bk0001', 332, 'TK00062', 'fitting', '2018-05-01'),
(47, 'bookcase', 'bk0001', 260, 'TK00065', 'fitting', '2018-06-01'),
(48, 'bookcase', 'bk0001', 280, 'TK00067', 'fitting', '2018-07-01'),
(49, 'bookcase', 'bk0001', 270, 'TK00069', 'fitting', '2018-08-01'),
(50, 'bookcase', 'bk0001', 300, 'TK00071', 'fitting', '2018-09-01'),
(51, 'Knop', 'TS000128', 165, 'TK00039', 'fitting', '2017-07-02'),
(52, 'Knop', 'TS000128', 150, 'TK00036', 'fitting', '2017-06-02'),
(53, 'Knop', 'TS000128', 135, 'TK00034', 'fitting', '2017-05-02'),
(54, 'Knop', 'TS000128', 125, 'TK00042', 'fitting', '2017-08-02'),
(55, 'Knop', 'TS000128', 135, 'TK00044', 'fitting', '2017-09-02'),
(56, 'Knop', 'TS000128', 100, 'TK00047', 'fitting', '2017-10-01'),
(57, 'Knop', 'TS000128', 105, 'TK00049', 'fitting', '2017-11-01'),
(58, 'Knop', 'TS000128', 50, 'TK00051', 'fitting', '2017-12-01'),
(59, 'Knop', 'TS000128', 132, 'TK00055', 'fitting', '2018-02-03'),
(60, 'Knop', 'TS000128', 115, 'TK00057', 'fitting', '2018-03-03'),
(61, 'Knop', 'TS000128', 167, 'TK00059', 'fitting', '2018-04-03'),
(62, 'Knop', 'TS000128', 166, 'TK00062', 'fitting', '2018-05-01'),
(63, 'Knop', 'TS000128', 130, 'TK00065', 'fitting', '2018-06-01'),
(64, 'Knop', 'TS000128', 140, 'TK00067', 'fitting', '2018-07-01'),
(65, 'Knop', 'TS000128', 135, 'TK00069', 'fitting', '2018-08-01'),
(66, 'Knop', 'TS000128', 150, 'TK00071', 'fitting', '2018-09-01'),
(67, 'kursi', 'TS000138', 2, 'MI000128', 'stekom', '2018-10-22'),
(68, 'test', 'TS000140', 52, 'MI000129', 'PPIC', '2018-10-28'),
(69, 'test', 'TS000140', 20, 'MI000130', 'ACCOUNT', '2018-09-04'),
(70, 'polpen', 'TS000141', 10, 'MI000131', 'TKJ', '2018-10-20'),
(71, 'LED', 'TS000143', 35, 'TK01001', 'fitting', '2016-01-03'),
(72, 'LED', 'TS000143', 300, 'TK01003', 'fitting', '2016-02-05'),
(73, 'LED', 'TS000143', 330, 'TK01005', 'fitting', '2016-03-03'),
(74, 'LED', 'TS000143', 110, 'TK01007', 'fitting', '2016-04-01'),
(75, 'LED', 'TS000143', 7, 'TK01014', 'fitting', '2016-06-02'),
(76, 'LED', 'TS000143', 25, 'TK01017', 'fitting', '2016-07-09'),
(77, 'LED', 'TS000143', 37, 'TK01021', 'fitting', '2016-08-29'),
(78, 'LED', 'TS000143', 72, 'TK01022', 'fitting', '2016-09-01'),
(79, 'LED', 'TS000143', 187, 'TK01024', 'fitting', '2016-10-01'),
(80, 'LED', 'TS000143', 160, 'TK01026', 'fitting', '2016-11-02'),
(81, 'LED', 'TS000143', 134, 'TK01020', 'fitting', '2016-12-01'),
(82, 'LED', 'TS000143', 88, 'TK01028', 'fitting', '2017-01-02'),
(83, 'LED', 'TS000143', 39, 'TK01029', 'fitting', '2017-02-05'),
(84, 'LED', 'TS000143', 108, 'TK01030', 'fitting', '2017-03-05'),
(85, 'LED', 'TS000143', 15, 'TK01033', 'fitting', '2017-04-22'),
(86, 'LED', 'TS000143', 2, 'TK01038', 'fitting', '2017-06-27'),
(87, 'LED', 'TS000143', 38, 'TK01041', 'fitting', '2017-07-25'),
(88, 'LED', 'TS000143', 78, 'TK01042', 'fitting', '2017-08-02'),
(89, 'LED', 'TS000143', 65, 'TK01044', 'fitting', '2017-09-02'),
(90, 'LED', 'TS000143', 76, 'TK01047', 'fitting', '2017-10-01'),
(91, 'LED', 'TS000143', 52, 'TK01049', 'fitting', '2017-11-01'),
(92, 'LED', 'TS000143', 139, 'TK01051', 'fitting', '2017-12-01'),
(93, 'LED', 'TS000143', 70, 'TK01055', 'fitting', '2018-02-03'),
(94, 'LED', 'TS000143', 41, 'TK01059', 'fitting', '2018-04-03'),
(95, 'LED', 'TS000143', 395, 'TK01062', 'fitting', '2018-05-01'),
(96, 'LED', 'TS000143', 20, 'TK01065', 'fitting', '2018-06-01'),
(97, 'LED', 'TS000143', 170, 'TK01067', 'fitting', '2018-07-01'),
(98, 'LED', 'TS000143', 210, 'TK01069', 'fitting', '2018-08-01'),
(99, 'LED', 'TS000143', 38, 'TK01071', 'fitting', '2018-09-01'),
(100, 'LED', 'TS000143', 3, 'TK01073', 'fitting', '2018-10-21'),
(101, 'LED', 'TS000143', 30, 'TK01052', 'fitting', '2018-01-01'),
(102, 'LED', 'TS000143', 183, 'TK01057', 'fitting', '2018-03-03'),
(103, 'Buku', 'TS000136', 15, 'MI000138', 'Office', '2018-11-04'),
(104, 'Elt-Comp', 'TS000131', 10, 'MI000140', 'Fitting', '2018-11-30'),
(105, 'bookcase', 'bk0001', 306, 'MI000142', 'fitting', '2018-10-03'),
(106, 'kaka', 'TS000144', 5, 'MI000144', 'jsdjnsd', '2018-11-15'),
(107, 'Screw-04A', 'TS000145', 51, 'MI000145', 'Fitting', '2018-12-09'),
(108, 'Elt-Comp', 'TS000131', 10, 'MI000148', 'Fitting', '2019-02-02'),
(109, 'bookcase', 'bk0001', 310, 'MI000149', 'fitting', '2018-11-01'),
(110, 'bookcase', 'bk0001', 285, 'MI000151', 'fitting', '2018-12-03'),
(111, 'Plat-L', 'TS000150', 8, 'MI000153', 'Steel', '2019-02-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE `jawaban` (
  `nomor` int(11) NOT NULL,
  `id_pertanyaan` varchar(20) NOT NULL,
  `id_jawaban` varchar(20) NOT NULL,
  `jawaban` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Elektronika'),
(2, 'Mebel'),
(3, 'kuningan'),
(4, 'Besi'),
(6, 'Baja'),
(20, 'Kayu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `nomor` int(11) NOT NULL,
  `id_pertanyaan` varchar(20) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `kategori_soal` int(11) NOT NULL COMMENT '0=kategori A / 1=kategori B',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nomor` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `ttl` date NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `jenis_kelamin` int(11) DEFAULT NULL COMMENT '0=wanita / 1= pria'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nomor`, `nis`, `nama_lengkap`, `kelas`, `ttl`, `updated_at`, `created_at`, `jenis_kelamin`) VALUES
(15, 'NIS-202002-000001', 'Muhammad', 'aaa', '2020-01-30', '2020-02-06 02:26:18', '2020-02-06 02:26:18', 1),
(28, 'NIS-202002-000003', 'Budi Hartono', '9A', '2020-02-13', '2020-02-13 03:57:03', '2020-02-13 03:57:03', 1),
(29, 'NIS-202002-000004', 'Khalifah RahmawatiAS', '10aAS', '2013-02-20', '2020-02-13 03:57:28', '2020-02-13 03:57:28', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `nomor` int(11) NOT NULL,
  `id_soal` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nilai` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal_detail`
--

CREATE TABLE `soal_detail` (
  `nomor` int(11) NOT NULL,
  `id_soal` varchar(20) NOT NULL,
  `id_pertanyaan` varchar(20) NOT NULL,
  `id_jawaban` varchar(20) NOT NULL,
  `jawaban` varchar(255) NOT NULL,
  `status_jawaban` int(11) DEFAULT NULL COMMENT '0=benar / 1=salah',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `level` varchar(20) NOT NULL,
  `password` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `level`, `password`, `created_at`) VALUES
(1, 'muhammad', 'admin', '$2y$10$ZfqyoIGABRke7ZSFWSYWme7QCyc28eXiUnirWsGu3hvIEg54KQ8Gu', '2019-02-05 03:11:44'),
(14, 'fathony', 'guru', '$2y$10$zRRmn.tKQBFSH3f4CBkIluk2k3XB9z2L9Jc3ieBLUZGjPLX8rZGNe', '2020-01-27 01:27:09'),
(17, 'toni24', 'guru', '$2y$10$AEgZcw59Teci6vRqoRC9sOiBzcoxgdTw53Q8Ymi3Jl3z9uYlQh6ra', '2020-01-27 01:53:11');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahantrendmoment`
--
ALTER TABLE `bahantrendmoment`
  ADD PRIMARY KEY (`no`),
  ADD KEY `kd_barang` (`nm_barang`),
  ADD KEY `nm_barang` (`kd_barang`),
  ADD KEY `tanggal` (`tanggal`),
  ADD KEY `id_tkeluar` (`id_tkeluar`);

--
-- Indeks untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`nomor`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nomor`),
  ADD KEY `nis` (`nis`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`nomor`);

--
-- Indeks untuk tabel `soal_detail`
--
ALTER TABLE `soal_detail`
  ADD PRIMARY KEY (`nomor`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bahantrendmoment`
--
ALTER TABLE `bahantrendmoment`
  MODIFY `no` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `soal`
--
ALTER TABLE `soal`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `soal_detail`
--
ALTER TABLE `soal_detail`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
