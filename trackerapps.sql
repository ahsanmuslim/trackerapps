-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Des 2022 pada 12.05
-- Versi server: 10.4.16-MariaDB
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trackerapps`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `controller`
--

CREATE TABLE `controller` (
  `id` int(11) NOT NULL,
  `nama_controller` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `controller`
--

INSERT INTO `controller` (`id`, `nama_controller`) VALUES
(1, 'home'),
(2, 'about'),
(3, 'transaksi'),
(4, 'kendaraan'),
(5, 'report'),
(6, 'profile'),
(7, 'divisi'),
(8, 'role'),
(9, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(5) NOT NULL,
  `nama_divisi` varchar(50) NOT NULL,
  `alias` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`, `alias`) VALUES
(1, 'General Affair', 'GA'),
(2, 'Warehouse', 'WH'),
(3, 'Security', 'SC'),
(4, 'Kurir', 'KR'),
(5, 'Teknisi', 'TK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_mobil` varchar(255) NOT NULL,
  `no_polisi` varchar(50) NOT NULL,
  `type` varchar(100) NOT NULL,
  `tahun` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id_mobil`, `no_polisi`, `type`, `tahun`) VALUES
('8b578200-795a-11ed-89dc-98e7f48a9bd0', 'B 2345 BAX', 'Daihatsu Xenia', 2015),
('d1e9a43c-795a-11ed-a250-98e7f48a9bd0', 'B 3456 NBV', 'Toyota Luxio', 2013);

-- --------------------------------------------------------

--
-- Struktur dari tabel `operator`
--

CREATE TABLE `operator` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` enum('Sopir','Kenek') NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `operator`
--

INSERT INTO `operator` (`id`, `nama`, `jenis`, `keterangan`) VALUES
(1, 'Ahmad Kusnadi', 'Sopir', 'Karyawan'),
(2, 'Susanto', 'Kenek', 'OKOK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(3) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `nomor` varchar(50) NOT NULL,
  `id_mobil` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` datetime DEFAULT NULL,
  `km` int(8) DEFAULT NULL,
  `sopir` varchar(100) NOT NULL,
  `kenek` varchar(100) NOT NULL,
  `divisi` int(5) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status` enum('IN','OUT') NOT NULL,
  `id_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `role` int(3) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_register` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `profile` varchar(30) NOT NULL,
  `jwt` varchar(255) DEFAULT NULL,
  `last_activity` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama_user`, `role`, `password`, `status`, `tgl_register`, `profile`, `jwt`, `last_activity`) VALUES
(1, 'susanto', 'Susanto Ahsan', 1, '8cb2237d0679ca88db6464eac60da96345513964', 1, '2022-12-12 10:53:43.077149', 'FOTO.jpg', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6InN1c2FudG8iLCJyb2xlIjoxLCJpZF9sb2dpbiI6IjNlODhiMDBhLTdhMGItMTFlZC05Y2Q1LTVlNGI0ZWVmNjAyYiJ9.VHjIiW5ukOS5x0mMQYyCnn-WQITJ7l496wpLrwCFV3w', '2022-10-17 03:13:32'),
(2, 'watno', 'Watno', 2, '8cb2237d0679ca88db6464eac60da96345513964', 1, '2022-12-10 18:32:11.135886', 'Susanto.jpg', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6IndhdG5vIiwicm9sZSI6MiwiaWRfbG9naW4iOiJmNWM5YjdlMC03OGI4LTExZWQtOTA2OC05OGU3ZjQ4YTliZDAifQ.ZUhNxD5D9yYqxExeys70ovbamrQQdOUTKMVtnS7rAbQ', '2022-10-16 17:17:23'),
(4, 'ardha', 'Ardha Dyota Ahimsa', 2, '8cb2237d0679ca88db6464eac60da96345513964', 1, '2022-11-28 15:29:43.343084', 'icon.png', NULL, '2022-05-25 02:15:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_acces`
--

CREATE TABLE `user_acces` (
  `id` int(20) NOT NULL,
  `role` int(3) NOT NULL,
  `controller` int(3) NOT NULL,
  `create` int(1) DEFAULT NULL,
  `update` int(1) DEFAULT NULL,
  `delete` int(1) DEFAULT NULL,
  `print` int(1) DEFAULT NULL,
  `import` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_acces`
--

INSERT INTO `user_acces` (`id`, `role`, `controller`, `create`, `update`, `delete`, `print`, `import`) VALUES
(1885, 2, 1, NULL, NULL, NULL, NULL, NULL),
(1886, 2, 2, NULL, NULL, NULL, NULL, NULL),
(1887, 1, 1, NULL, NULL, NULL, NULL, NULL),
(1889, 1, 2, NULL, NULL, NULL, NULL, NULL),
(1891, 1, 6, NULL, NULL, NULL, NULL, NULL),
(1892, 2, 6, NULL, NULL, NULL, NULL, NULL),
(1893, 1, 4, NULL, NULL, NULL, NULL, NULL),
(1894, 2, 4, NULL, NULL, NULL, NULL, NULL),
(1895, 1, 3, NULL, NULL, NULL, NULL, NULL),
(1896, 1, 7, NULL, NULL, NULL, NULL, NULL),
(1897, 1, 8, NULL, NULL, NULL, NULL, NULL),
(1898, 1, 9, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `controller`
--
ALTER TABLE `controller`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indeks untuk tabel `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`nomor`),
  ADD KEY `id_mobil` (`id_mobil`),
  ADD KEY `divisi` (`divisi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role` (`role`);

--
-- Indeks untuk tabel `user_acces`
--
ALTER TABLE `user_acces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`role`),
  ADD KEY `id_menu` (`controller`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `controller`
--
ALTER TABLE `controller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `operator`
--
ALTER TABLE `operator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `user_acces`
--
ALTER TABLE `user_acces`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1899;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_mobil`) REFERENCES `kendaraan` (`id_mobil`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`divisi`) REFERENCES `divisi` (`id_divisi`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_acces`
--
ALTER TABLE `user_acces`
  ADD CONSTRAINT `user_acces_ibfk_1` FOREIGN KEY (`controller`) REFERENCES `controller` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_acces_ibfk_2` FOREIGN KEY (`role`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
