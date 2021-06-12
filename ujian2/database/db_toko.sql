-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Jun 2021 pada 04.54
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_po`
--

CREATE TABLE `tb_po` (
  `id` int(11) NOT NULL,
  `no_po` varchar(100) NOT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `uom` varchar(100) NOT NULL,
  `total_order` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_po`
--

INSERT INTO `tb_po` (`id`, `no_po`, `nama_brg`, `uom`, `total_order`, `status`) VALUES
(2, 'PO_001', 'Tepung', 'Kg', 10, 'Reject'),
(3, 'PO_002', 'Gula', 'Kg', 1, 'Reject'),
(4, 'PO_004', 'Gula', 'Kg', 5, 'Reject'),
(5, 'PO_003', 'Gula', 'Kg', 10, 'Approve'),
(9, 'PO_005', 'MINYAK', 'Liter', 10, 'Approve'),
(10, 'PO_006', 'MINYAK', 'Liter', 10, 'Reject'),
(11, 'PO_007', 'MINYAK', 'Liter', 20, 'Approve'),
(12, 'PO_008', 'Tepung', 'Kg', 10, 'Approve'),
(13, 'PO_008', 'Gula', 'Kg', 1, 'Approve'),
(14, 'PO_009', 'Tepung', 'Kg', 1, 'Approve'),
(15, 'PO_010', 'Tepung', 'Kg', 1, 'Reject'),
(16, 'PO_011', 'Tepung', 'Kg', 1, 'Approve'),
(17, 'PO_012', 'Tepung', 'Kg', 1, 'Reject'),
(18, 'PO_013', 'Tepung', 'Kg', 1, 'Reject'),
(19, 'PO_014', 'Gula', 'Kg', 1, 'Approve'),
(20, 'PO_015', 'Gula', 'Kg', 1, 'Reject'),
(21, 'PO_016', 'Semen Merah Putih', 'Sak', 10, 'Approve'),
(22, 'PO_017', 'Tepung', 'Kg', 10, 'Approve'),
(23, 'PO_018', 'Semen Merah Putih', 'Sak', 100, 'Approve'),
(24, 'PO_019', 'Semen Merah Putih', 'Sak', 100, 'Reject'),
(25, 'PO_020', 'Aqua 650Ml', 'Liter', 100, 'Approve');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_so`
--

CREATE TABLE `tb_so` (
  `id` int(11) NOT NULL,
  `no_so` varchar(100) NOT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `uom` varchar(100) NOT NULL,
  `total_order` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_so`
--

INSERT INTO `tb_so` (`id`, `no_so`, `nama_brg`, `uom`, `total_order`, `status`) VALUES
(1, 'SO_001', 'Tepung', 'Kg', 1, ''),
(2, 'SO_002', 'Gula', 'Kg', 1, ''),
(3, 'SO_004', 'Gula', 'Kg', 1, 'Proses'),
(4, 'SO_003', 'Tepung', 'Kg', 10, 'In Progress'),
(5, 'SO_013', 'Tepung', 'Kg', 112, 'In Progress');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stock`
--

CREATE TABLE `tb_stock` (
  `id` int(11) NOT NULL,
  `kd_brg` varchar(100) NOT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `stock` varchar(100) NOT NULL,
  `uom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_stock`
--

INSERT INTO `tb_stock` (`id`, `kd_brg`, `nama_brg`, `stock`, `uom`) VALUES
(3, 'BOO1', 'Tepung', '0', 'Kg'),
(4, 'B002', 'Gula', '66', 'Kg'),
(5, 'B003', 'MINYAK', '130', 'Liter'),
(7, 'B004', 'Semen Merah Putih', '110', 'Sak'),
(8, 'B005', 'Aqua 650Ml', '100', 'Liter');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','user1','user2','manager') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `level`) VALUES
(1, 'ferdi', '$2y$10$pJ35TUvttunpZmNyeC637eoKdEogMhUt3yaW7E0dDp7ITsrPO.ti.', 'admin'),
(2, 'admin', '$2y$10$Zwm4uAdJFJteqmJlc3/keOWiZtSFUKHE3qOc0Uy.2JB6KiCVNac.2', 'admin'),
(3, 'user', '$2y$10$.DiVjtIknm8hjitphUWBmuFTkcHoeRXcpvvf74o9yXLEk3B293crS', 'user1'),
(4, 'user1', '$2y$10$585wFq6Lmh3pdZweunwd0OiH2lcTVg7nzWbZ27je47hCBXJau4zn2', 'user1'),
(5, 'manager', '$2y$10$NSeAp0vTrHSFIvMYkseflupUN21eN9ehSc8l2pQEmY6qBiCkLpP9.', 'manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_po`
--
ALTER TABLE `tb_po`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_so`
--
ALTER TABLE `tb_so`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_stock`
--
ALTER TABLE `tb_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_po`
--
ALTER TABLE `tb_po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tb_so`
--
ALTER TABLE `tb_so`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_stock`
--
ALTER TABLE `tb_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
