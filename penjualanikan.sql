-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 06 Des 2021 pada 15.47
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualanikan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(10) NOT NULL,
  `kategori_barang_id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `stok` int(10) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `kategori_barang_id`, `nama`, `gambar`, `stok`, `harga`) VALUES
(18, 4, 'Betok Ambon', 'cf39754912651207991aec7734c99a35.jpg', 200, 10000),
(19, 4, 'Koi', 'c69553821486c3abc8f5d711167b242d.jpg', 190, 25000),
(20, 4, 'Lele Albino', '9ee0a9b12d7e32f22e1c4eef320bf200.jpg', 150, 15000),
(21, 4, 'Lemon', '116e2328f0fedb4285286099280a5e60.jpg', 0, 70000),
(22, 8, 'Galah', 'ff1073ee8f2cd987c21ad85891f893ec.jpg', 80, 25000),
(23, 10, 'Pelet', '2780938821ec8f6cb71b6a7b881e611f.jpg', 620, 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `beli`
--

CREATE TABLE `beli` (
  `id` int(10) NOT NULL,
  `suplier_id` int(10) NOT NULL,
  `barang_id` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `harga` double NOT NULL,
  `jumlah` int(10) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `beli`
--

INSERT INTO `beli` (`id`, `suplier_id`, `barang_id`, `tanggal`, `harga`, `jumlah`, `total`) VALUES
(8, 1, 18, '2021-12-05', 10000, 10, 100000),
(9, 5, 20, '2021-12-05', 10000, 100, 1000000),
(10, 1, 19, '2021-12-05', 25000, 100, 2500000),
(11, 1, 23, '2021-12-06', 10000, 120, 1200000),
(12, 3, 18, '2021-12-07', 10000, 200, 2000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jual`
--

CREATE TABLE `jual` (
  `id` int(10) NOT NULL,
  `pelanggan_id` int(10) NOT NULL,
  `barang_id` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `harga` double NOT NULL,
  `jumlah` int(10) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jual`
--

INSERT INTO `jual` (`id`, `pelanggan_id`, `barang_id`, `tanggal`, `harga`, `jumlah`, `total`) VALUES
(12, 7, 19, '2021-12-05', 25000, 10, 250000),
(13, 8, 21, '2021-12-05', 10000, 10, 1000000),
(14, 11, 22, '2021-12-06', 10000, 120, 120000),
(15, 7, 18, '2021-12-06', 25000, 5, 125000),
(16, 7, 18, '2021-12-06', 25000, 5, 125000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_barang`
--

INSERT INTO `kategori_barang` (`id`, `nama`) VALUES
(4, 'Ikan'),
(5, 'Tanaman Air'),
(6, 'Aquarium'),
(7, 'Siput'),
(8, 'Udang'),
(9, 'Alat - Alat Aquarium'),
(10, 'Makanan Ikan'),
(11, 'Bebatuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(10) NOT NULL,
  `nama` varchar(52) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `gender`, `alamat`, `no_telp`) VALUES
(7, 'Angela', 'wanita', 'Jakarta', '082145632145'),
(8, 'Faisal', 'pria', 'Tangerang', '081298765432'),
(9, 'Indah', 'wanita', 'Serang', '08216665463'),
(10, 'Hafizh', 'pria', 'Tangerang', '082145636547'),
(11, 'Puspita', 'wanita', 'Jakarta', '082145687983'),
(12, 'Cikal', 'wanita', 'Tangerang', '02145633654');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplier`
--

CREATE TABLE `suplier` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `suplier`
--

INSERT INTO `suplier` (`id`, `nama`, `alamat`, `no_telp`) VALUES
(1, 'pt. mekar abadi', 'Sumedang, Jawa Tengah', '081298765432'),
(3, 'pt. maju macet', 'Lampung, Sumatra Barat', '082148485422'),
(4, 'pt. lalu lintas', 'Surabaya, Jawa Timur', '0214654687'),
(5, 'pt. sejahtera selalu', 'Tangerang, Banten', '08215546333'),
(6, 'pt. cahaya redup', 'Jakarta Barat, Jakarta', '082156656463'),
(7, 'pt. air jernih ', 'Tangerang', '082144453336');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ulangi_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `ulangi_password`) VALUES
(1, 'ical', 'icalhafizh', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'angel', 'angel', 'e10adc3949ba59abbe56e057f20f883e', ''),
(5, 'Muhammad Faisal H', 'ical', 'e10adc3949ba59abbe56e057f20f883e', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_barang_id` (`kategori_barang_id`);

--
-- Indeks untuk tabel `beli`
--
ALTER TABLE `beli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_id` (`barang_id`) USING BTREE,
  ADD KEY `suplier_id` (`suplier_id`) USING BTREE,
  ADD KEY `barang_id_2` (`barang_id`);

--
-- Indeks untuk tabel `jual`
--
ALTER TABLE `jual`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pel_id` (`pelanggan_id`) USING BTREE,
  ADD KEY `barang_id` (`barang_id`) USING BTREE;

--
-- Indeks untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `beli`
--
ALTER TABLE `beli`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `jual`
--
ALTER TABLE `jual`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kategori_barang_id`) REFERENCES `kategori_barang` (`id`);

--
-- Ketidakleluasaan untuk tabel `beli`
--
ALTER TABLE `beli`
  ADD CONSTRAINT `beli_ibfk_1` FOREIGN KEY (`suplier_id`) REFERENCES `suplier` (`id`),
  ADD CONSTRAINT `beli_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`);

--
-- Ketidakleluasaan untuk tabel `jual`
--
ALTER TABLE `jual`
  ADD CONSTRAINT `FKjual95970` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`),
  ADD CONSTRAINT `jual_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
