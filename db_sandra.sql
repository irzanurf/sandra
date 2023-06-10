-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jun 2023 pada 15.11
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sandra`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_departemen`
--

CREATE TABLE `tb_departemen` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `departemen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_departemen`
--

INSERT INTO `tb_departemen` (`id`, `username`, `departemen`) VALUES
(0, 'teknik', 'Umum / Fakultas'),
(1, 'sipil', 'Departemen Teknik Sipil'),
(2, 'arsi', 'Departemen Teknik Arsitektur'),
(3, 'kimia', 'Departemen Teknik Kimia'),
(4, 'pwk', 'Departemen Perencanaan Wilayah dan Kota'),
(5, 'mesin', 'Departemen Teknik Mesin'),
(6, 'elektro', 'Departemen Teknik Elektro'),
(7, 'kapal', 'Departemen Teknik Perkapalan'),
(8, 'industri', 'Departemen Teknik Industri'),
(9, 'lingkungan', 'Departemen Teknik Lingkungan'),
(10, 'geologi', 'Departemen Teknik Geologi'),
(11, 'geodesi', 'Departemen Teknik Geodesi'),
(12, 'komputer', 'Departemen Teknik Komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kadep`
--

CREATE TABLE `tb_kadep` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `departemen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kadep`
--

INSERT INTO `tb_kadep` (`id`, `username`, `departemen`) VALUES
(1, 'kadepsipil', 'Departemen Teknik Sipil'),
(2, 'kadeparsi', 'Departemen Teknik Arsitektur'),
(3, 'kadepkimia', 'Departemen Teknik Kimia'),
(4, 'kadeppwk', 'Departemen Perencanaan Wilayah dan Kota'),
(5, 'kadepmesin', 'Departemen Teknik Mesin'),
(6, 'kadepelektro', 'Departemen Teknik Elektro'),
(7, 'kadepkapal', 'Departemen Teknik Perkapalan'),
(8, 'kadepindustri', 'Departemen Teknik Industri'),
(9, 'kadeplingkungan', 'Departemen Teknik Lingkungan'),
(10, 'kadepgeologi', 'Departemen Teknik Geologi'),
(11, 'kadepgeodesi', 'Departemen Teknik Geodesi'),
(12, 'kadepkomputer', 'Departemen Teknik Komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_logs`
--

CREATE TABLE `tb_logs` (
  `id` int(100) NOT NULL,
  `id_surat` int(100) NOT NULL,
  `user` int(11) NOT NULL,
  `next_user` int(11) NOT NULL,
  `status` int(100) NOT NULL,
  `round` int(100) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_logs`
--

INSERT INTO `tb_logs` (`id`, `id_surat`, `user`, `next_user`, `status`, `round`, `tgl`) VALUES
(1, 5, 0, 1, 1, 0, '2023-06-07'),
(2, 5, 1, 2, 1, 0, '2023-06-07'),
(8, 5, 2, 4, 1, 0, '2023-06-08'),
(9, 5, 4, 5, 1, 0, '2023-06-08'),
(10, 5, 5, 7, 1, 0, '2023-06-08'),
(11, 5, 7, 8, 1, 0, '2023-06-08'),
(12, 5, 8, 9, 1, 0, '2023-06-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_notes`
--

CREATE TABLE `tb_notes` (
  `id` int(11) NOT NULL,
  `role` varchar(3) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_notes`
--

INSERT INTO `tb_notes` (`id`, `role`, `id_surat`, `catatan`, `tgl`) VALUES
(9, '0', 4, 'cat', '2023-06-07'),
(10, '0', 5, 'catatan', '2023-06-07'),
(11, '1', 5, 'Ok Kadep', '2023-06-07'),
(17, '2', 5, 'OK', '2023-06-08'),
(18, '4', 5, 'Ok spv', '2023-06-08'),
(19, '5', 5, 'Ok man', '2023-06-08'),
(20, '7', 5, 'Ok wadek', '2023-06-08'),
(21, '8', 5, 'OK DEKAN', '2023-06-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pejabat`
--

CREATE TABLE `tb_pejabat` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `nama` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pejabat`
--

INSERT INTO `tb_pejabat` (`id`, `username`, `jabatan`, `nama`) VALUES
(1, 'dekan', 'dekan', 'Prof.Ir. M. Agung Wibowo, MM, MSc, PhD.'),
(2, 'wadek1', 'wadek1', 'Prof. Dr.nat.tech. Siswo Sumardiono, S.T., M.T.'),
(3, 'wadek2', 'wadek2', 'Dr. Ir. Abdul Syakur, S.T., M.T., IPU.'),
(4, 'manager', 'manager', 'Ari Eko Widyantoro, S.T., M.Si.'),
(5, 'spv1', 'spv1', 'Wasto, S.E.'),
(6, 'spv2', 'spv2', 'Novita Anugrah Listiyana, S.E., M.Ak.'),
(7, 'kadepsipil', 'kadep', 'Jati Utomo Dwi Hatmoko, S.T., M.M., M.Sc., Ph.D.'),
(8, 'kadeparsi', 'kadep', 'Dr.Ir. Suzanna Ratih Sari, M.M., M.A.'),
(9, 'kadepkimia', 'kadep', 'Prof.Dr.-Ing. Suherman, S.T., M.T.'),
(10, 'kadeppwk', 'kadep', 'Prof. Dr. Ing. Wiwandari Handayani, S.T., M.T., MPS.'),
(11, 'kadepmesin', 'kadep', 'Sri Nugroho, S.T., M.T., Ph.D.'),
(12, 'kadepelektro', 'kadep', 'Aghus Sofwan, S.T., M.T., Ph.D.'),
(13, 'kadepkapal', 'kadep', 'Dr.Eng. Hartono Yudo, S.T., M.T.'),
(14, 'kadepindustri', 'kadep', 'Dr. Ratna Purwaningsih, S.T., M.T.'),
(15, 'kadeplingkungan', 'kadep', 'Dr. Ing. Sudarno, S.T., M.Sc.'),
(16, 'kadepgeologi', 'kadep', 'Dr.rer.nat. Thomas Triadi Putranto, S.T., M.Eng.'),
(17, 'kadepgeodesi', 'kadep', 'Dr. Yudo Prasetyo, S.T., M.T.'),
(18, 'kadepkomputer', 'kadep', 'Dr. Adian Fatchur Rochim, S.T., M.T.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat`
--

CREATE TABLE `tb_surat` (
  `id` int(11) NOT NULL,
  `judul` varchar(1000) NOT NULL,
  `to` varchar(500) NOT NULL,
  `from` varchar(500) NOT NULL,
  `body` text NOT NULL,
  `nomor` varchar(50) DEFAULT NULL,
  `tgl` date NOT NULL,
  `alur` varchar(5) DEFAULT NULL,
  `ttd` varchar(7) DEFAULT NULL,
  `lamp` varchar(50) DEFAULT NULL,
  `id_operator` varchar(100) NOT NULL,
  `departemen` varchar(3) NOT NULL,
  `status` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_surat`
--

INSERT INTO `tb_surat` (`id`, `judul`, `to`, `from`, `body`, `nomor`, `tgl`, `alur`, `ttd`, `lamp`, `id_operator`, `departemen`, `status`) VALUES
(4, 'judul', 'to', 'from', '', NULL, '2023-06-07', NULL, NULL, '854600ed936cabccc664bd6a034396ca.xlsx', '9', '6', 'draft'),
(5, 'asdasdsa', 'adas', 'ads', '<p><strong>dsadasddasdad</strong></p>', 'dfhsiofhoiehf2312', '2023-06-07', '2', 'dekan', '210ccbee14f9cea65a3af4e97057963c.png', '9', '6', '7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` int(5) NOT NULL,
  `nama` varchar(1000) NOT NULL,
  `departemen` varchar(5) DEFAULT NULL,
  `stat` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id`, `username`, `password`, `role`, `nama`, `departemen`, `stat`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 'Administrator', NULL, 0),
(3, 'teknik', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 'Teknik', '0', 0),
(4, 'sipil', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 'Teknik Sipil', '1', 0),
(5, 'arsi', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 'Arsitektur', '2', 0),
(6, 'kimia', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 'Teknik Kimia', '3', 0),
(7, 'pwk', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 'PWK', '4', 0),
(8, 'mesin', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 'Teknik Mesin', '5', 0),
(9, 's1elektro', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 'S1 Teknik Elektro', '6', 0),
(10, 's2elektro', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 'S2 Teknik Elektro', '6', 0),
(11, 'industri', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 'Teknik Industri', '8', 0),
(12, 'lingkungan', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 'Teknik Lingkungan', '9', 0),
(13, 'geologi', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 'Teknik Geologi', '10', 0),
(14, 'geodesi', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 'Teknik Geodesi', '11', 0),
(15, 'komputer', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 'Teknik Komputer', '12', 0),
(16, 'kadepsipil', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 'Teknik Sipil', '1', 0),
(17, 'kadeparsi', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 'Arsitektur', '2', 0),
(18, 'kadepkimia', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 'Teknik Kimia', '3', 0),
(19, 'kadeppwk', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 'PWK', '4', 0),
(20, 'kadepmesin', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 'Teknik Mesin', '5', 0),
(21, 'kadepelektro', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 'Teknik Elektro', '6', 0),
(22, 'kadepkapal', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 'Teknik Perkapalan', '7', 0),
(23, 'kadepindustri', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 'Teknik Industri', '8', 0),
(24, 'kadeplingkungan', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 'Teknik Lingkungan', '9', 0),
(25, 'kadepgeologi', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 'Teknik Geologi', '10', 0),
(26, 'kadepgeodesi', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 'Teknik Geodesi', '11', 0),
(27, 'kadepkomputer', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 'Teknik Komputer', '12', 0),
(28, 'verifikator', '5f4dcc3b5aa765d61d8327deb882cf99', 4, 'Verifikator', NULL, 0),
(29, 'spv1', '5f4dcc3b5aa765d61d8327deb882cf99', 5, 'Supervisor 1', 's1', 0),
(30, 'spv2', '5f4dcc3b5aa765d61d8327deb882cf99', 6, 'Supervisor 2', 's2', 0),
(31, 'manager', '5f4dcc3b5aa765d61d8327deb882cf99', 7, 'Manager', NULL, 0),
(32, 'wadek1', '5f4dcc3b5aa765d61d8327deb882cf99', 8, 'Wadek 1', NULL, 0),
(33, 'wadek2', '5f4dcc3b5aa765d61d8327deb882cf99', 9, 'Wadek 2', NULL, 0),
(34, 'dekan', '5f4dcc3b5aa765d61d8327deb882cf99', 10, 'Dekan', NULL, 0),
(35, 'fakultas', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 'Dekanat / Umum', '0', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_departemen`
--
ALTER TABLE `tb_departemen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kadep`
--
ALTER TABLE `tb_kadep`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_logs`
--
ALTER TABLE `tb_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_notes`
--
ALTER TABLE `tb_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pejabat`
--
ALTER TABLE `tb_pejabat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_departemen`
--
ALTER TABLE `tb_departemen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_kadep`
--
ALTER TABLE `tb_kadep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_logs`
--
ALTER TABLE `tb_logs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_notes`
--
ALTER TABLE `tb_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_pejabat`
--
ALTER TABLE `tb_pejabat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_surat`
--
ALTER TABLE `tb_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
