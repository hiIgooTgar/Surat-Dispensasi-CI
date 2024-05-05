-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Nov 2023 pada 19.54
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim_dispensasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guru_mapel`
--

CREATE TABLE `tbl_guru_mapel` (
  `id_guru` int(11) NOT NULL,
  `nama_guru` varchar(128) NOT NULL,
  `mata_pelajaran` varchar(64) NOT NULL,
  `nip` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_guru_mapel`
--

INSERT INTO `tbl_guru_mapel` (`id_guru`, `nama_guru`, `mata_pelajaran`, `nip`) VALUES
(1, 'Damar S.Pd', 'Bahasa Indonesia', '34244224243'),
(3, 'Retno S.Pd', 'Matematika', '34534534');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guru_piket`
--

CREATE TABLE `tbl_guru_piket` (
  `id_guru_piket` int(11) NOT NULL,
  `nip` char(32) NOT NULL,
  `nama_guru_piket` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_guru_piket`
--

INSERT INTO `tbl_guru_piket` (`id_guru_piket`, `nip`, `nama_guru_piket`) VALUES
(1, '45345', 'qeqeqeqe'),
(3, '42343', 'Test'),
(4, '575757', 'Victor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(8) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `icon_menu` varchar(255) NOT NULL,
  `url_menu` varchar(255) NOT NULL,
  `role` enum('admin','siswa') NOT NULL,
  `parent` tinyint(1) NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `urut` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `nama_menu`, `icon_menu`, `url_menu`, `role`, `parent`, `aktif`, `urut`) VALUES
(2, 'Surat Dispensasi', 'fa fa-envelope-open-text', 'pengajuan_surat', 'siswa', 0, 1, 2),
(3, 'Verifikasi dan Validasi', 'fa fa-inbox', 'verifikasi_validasi', 'admin', 0, 1, 2),
(4, 'Data Master', 'fa fa-server', '#', 'admin', 0, 1, 1),
(5, 'Data Siswa', 'fa fa-circle', 'data_siswa', 'admin', 4, 1, 1),
(7, 'Generate Laporan', 'fa fa-book', 'generate_laporan', 'admin', 0, 1, 3),
(9, 'Data Guru Mapel', 'fa fa-circle', 'data_guru', 'admin', 4, 1, 2),
(10, 'Data Guru Piket', 'fa fa-circle', 'data_guru_piket', 'admin', 4, 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengajuan_d`
--

CREATE TABLE `tbl_pengajuan_d` (
  `id_pengajuan` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `nama_lengkap` varchar(128) NOT NULL,
  `nis` char(16) NOT NULL,
  `kelas` varchar(32) NOT NULL,
  `jurusan` varchar(32) NOT NULL,
  `mulai_jam` enum('1','2','3','4','5','6','7','8','9','10','11','istirahat-1','istirahat-2') NOT NULL,
  `selesai_jam` enum('1','2','3','4','5','6','7','8','9','10','11','istirahat-1','istirahat-2','tidak_kembali') NOT NULL,
  `keperluan` text NOT NULL,
  `guru_mapel` varchar(128) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pengajuan_d`
--

INSERT INTO `tbl_pengajuan_d` (`id_pengajuan`, `tgl_pengajuan`, `nama_lengkap`, `nis`, `kelas`, `jurusan`, `mulai_jam`, `selesai_jam`, `keperluan`, `guru_mapel`, `status`) VALUES
(5, '2023-11-06', 'Sugeng Parman', '6819', 'xi', 'rpl', '2', '2', 'Keluarga', 'Retno S.Pd', '1'),
(6, '2023-11-10', 'Bambang Adi Nugroho', '6818', 'xi', 'tkro', '2', '2', 'eqwewwr', 'Retno S.Pd', '1'),
(7, '2023-11-07', 'Bambang Adi Nugroho', '6818', 'x', 'tkro', '1', '1', 'hjklfghjklfgjklfgh', 'Damar S.Pd', '1'),
(8, '2023-11-09', 'Bambang Adi Nugroho', '6818', 'x', 'tkro', '2', '2', 'Keluargaa', 'Damar S.Pd', '1'),
(10, '2023-11-10', 'Bhakti Erlangga', '6822', 'xii', 'tbo', '1', '1', 'KIP', 'Retno S.Pd', '1'),
(14, '2023-11-10', 'Bambang Adi Nugroho', '6818', 'x', 'tkro', 'istirahat-2', 'istirahat-2', 'KIP', 'Retno S.Pd', '1'),
(15, '2023-11-10', 'Damar Yadi', '6820', 'xii', 'dpib', '1', '1', 'KTP', 'Retno S.Pd', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `nama_lengkap` varchar(128) NOT NULL,
  `nis` char(16) NOT NULL,
  `kelas` enum('x','xi','xii','') NOT NULL,
  `jurusan` enum('dpib','tbs','tkro','mm','tkj','rpl','tbo') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` char(16) NOT NULL,
  `gender` enum('laki_laki','perempuan','','') NOT NULL,
  `level` enum('admin','siswa') NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `nama_lengkap`, `nis`, `kelas`, `jurusan`, `username`, `password`, `telp`, `gender`, `level`, `status`) VALUES
(1, 'Administrator', '1', '', '', 'admin', '72fc5bd23573757708000f762e1ecf384d15035b10aa65d7a7846e5d3b2806e9038a58875c02c2300c4f658beadb34b952b0581cbf943f340323dc47170004aaYECsjuK5xzbXycGpyXeIGQe9xqvptibt8+MrN19b+50=', '1', '', 'admin', 1),
(4, 'Bambang Adi Nugroho', '6818', 'x', 'tkro', 'siswa', '5990e8a6be729583252c51005f3040e8dcb614ecaef394212946bcac3ccbba8c635baa01c37bd960f0fbc343632323ce58fd0681246d1c3ec30eb437e145ba78fMSgrxhVa1IoZ7Dd4a3tWh+L/jKq+4mSGl2mk4Cini4=', '088752342543', 'laki_laki', 'siswa', 1),
(6, 'Sugeng Parman', '6819', 'xi', 'rpl', 'siswa1', '087a6010ac9d59258ba8749dfb9975c3247068d97336a93e5e7f50970279d1213e45e1b64bbfa57b91cda4f3774e68ec6df93ec6abf57d3fc143b5de6e9ce4cdsYq20UGJPJ9GKjuaiPolcmgxoKACEjpDg48F8QvQNto=', '232323', 'laki_laki', 'siswa', 1),
(8, 'Damar Yadi', '6820', 'xii', 'dpib', 'siswa2', 'd7857e3c74e6801968824cc728b560539f4489dc716b1c310152d87d09848734fba1a387aaf3e7d679f8ca1281bf881428a880707c4692db415cbb6f631ad771CFW7/NAJXTFIAYVbQJKJoDhC++BZEk497UGBDQB0UEs=', '11111111111', 'laki_laki', 'siswa', 1),
(11, 'Wisnu Akbar Jamal', '6821', 'xii', 'mm', 'siswa3', '020113ca1bc55492fffdd328b4418d7f2c773f5e9eb87b1e2c3b68f3d8d834ab7431cdbc274b483071791679df89ee95e4e26fe624dc9d0d2778afd11433bf84EqAcpf/u4rosCHqPFE4hRvxRM7+sMDK70lvnMpsKyEQ=', '4464646', 'laki_laki', 'siswa', 1),
(13, 'Bhakti Erlangga', '6822', 'xii', 'tbo', 'siswa4', 'b790be593736920558fa0b652c1a44897d27598ef695658c77c8dd82b3a1dd6c4c69f37a6e223e03a1db64aa21bde32d06b0091bc8242a4459944cf2741f572ckPXMbFXavJB3+MmfDNKeXRcTJ8BKQXqDi7BvsOsUtmQ=', '081626352823', 'laki_laki', 'siswa', 1),
(14, 'Putri Ayu', '6823', 'xii', 'tbs', 'siswa5', '37c24ab93e766ef5ce913f91b63ad7da4e6cba1968ecd73856af4ed64fe940b70130424596a523f5e08c54ba299387c5d8836f302c285a4a5129378e81345a3elWQnUi3p+GLyU81Gli8dK05qFD9ZZKzhWghvE+59DlQ=', '3333333333333333', 'perempuan', 'siswa', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_guru_mapel`
--
ALTER TABLE `tbl_guru_mapel`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `tbl_guru_piket`
--
ALTER TABLE `tbl_guru_piket`
  ADD PRIMARY KEY (`id_guru_piket`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tbl_pengajuan_d`
--
ALTER TABLE `tbl_pengajuan_d`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_guru_mapel`
--
ALTER TABLE `tbl_guru_mapel`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_guru_piket`
--
ALTER TABLE `tbl_guru_piket`
  MODIFY `id_guru_piket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengajuan_d`
--
ALTER TABLE `tbl_pengajuan_d`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
