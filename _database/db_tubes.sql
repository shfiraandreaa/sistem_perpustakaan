-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2019 at 05:19 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_tubes`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_buku`
--

CREATE TABLE IF NOT EXISTS `data_buku` (
`id_buku` int(4) NOT NULL,
  `judul_buku` varchar(30) NOT NULL,
  `pengarang` varchar(30) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `kuantiti_buku` int(4) NOT NULL,
  `status_ketersediaan` varchar(30) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_buku`
--

INSERT INTO `data_buku` (`id_buku`, `judul_buku`, `pengarang`, `penerbit`, `kuantiti_buku`, `status_ketersediaan`, `img`) VALUES
(1, 'Laskar Pelangi', 'Andrea Hirata', 'Gramedia', 0, 'Tersedia', ''),
(3, 'Hujan', 'adf', 'asdf', 0, 'Sedang Dipinjam', 'book20191124102124.png'),
(6, 'Pierre', 'Gustavo Mazali', 'Pt Gramedia Pusaka', 5, 'Tersedia', 'books20191217072925.png');

-- --------------------------------------------------------

--
-- Table structure for table `data_keranjang`
--

CREATE TABLE IF NOT EXISTS `data_keranjang` (
`id_keranjang` int(4) NOT NULL,
  `id_buku` int(4) NOT NULL,
  `kuantiti` int(4) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_peminjam`
--

CREATE TABLE IF NOT EXISTS `data_peminjam` (
`id_peminjam` int(4) NOT NULL,
  `id_user_peminjam` int(4) NOT NULL,
  `id_buku_dipinjam` int(4) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status_buku` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_peminjam`
--

INSERT INTO `data_peminjam` (`id_peminjam`, `id_user_peminjam`, `id_buku_dipinjam`, `tanggal_pinjam`, `tanggal_kembali`, `status_buku`) VALUES
(2, 3, 3, '2019-12-07', '2019-12-14', 'Sudah Dikembalikan'),
(18, 7, 1, '2019-12-12', '2019-12-19', 'Sudah Dikembalikan'),
(19, 19, 5, '2019-12-12', '2019-12-19', 'Buku Hilang'),
(20, 19, 5, '2019-12-15', '2019-12-22', 'Dipinjam'),
(21, 6, 6, '2019-12-17', '2019-12-24', 'Buku Hilang'),
(23, 19, 3, '2019-12-17', '2019-12-24', 'Dipinjam'),
(25, 19, 1, '2019-12-17', '2019-12-24', 'Buku Hilang'),
(26, 7, 3, '2019-12-18', '2019-12-25', ''),
(27, 22, 1, '2019-12-30', '2020-01-06', 'Dipinjam');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE IF NOT EXISTS `data_user` (
`id_user` int(4) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `nim_user` int(8) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(8) NOT NULL,
  `email` varchar(30) NOT NULL,
  `user_type` varchar(30) NOT NULL,
  `mahasiswa_aktif` varchar(5) NOT NULL,
  `ktm_aktif` varchar(5) NOT NULL,
  `ket_approve` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id_user`, `nama_user`, `nim_user`, `username`, `password`, `email`, `user_type`, `mahasiswa_aktif`, `ktm_aktif`, `ket_approve`) VALUES
(1, 'Admin', 0, 'Admin', 'admin123', 'admin@gmail.com', 'Admin', '', '', ''),
(2, '', 0, 'Manager', '123456', 'firaandreaa06@gmail.com', 'Manager', '', '', ''),
(3, 'Shafira Andrea', 18110141, 'shafira', 'fira123', 'firaandreaa06@gmail.com', 'General', 'aktif', 'aktif', 'Approve'),
(4, 'Diva Andini', 18110062, 'divaAP', 'diva123', 'divaAP@gmail.com', 'General', 'aktif', 'aktif', ''),
(6, 'Annisa Nur Hasanah', 18110109, 'icha', '123', 'icha@gmail.com', 'General', 'aktif', 'aktif', 'Approve'),
(7, 'Aisyah Nur Endah', 18110109, 'endah', 'endah123', 'aisyah@gmail.com', 'General', 'aktif', 'aktif', 'Approve'),
(8, 'Sri Rizki Isdayanti', 18110151, 'sriRI', 'sri123', 'sriRizki@gmail.com', 'General', 'aktif', 'aktif', 'Approve'),
(18, 'Astari Rasyida', 1235, 'astari', '123', 'astari@gmail.com', 'General', 'aktif', 'aktif', ''),
(19, 'rian', 12345678, 'rian12', '1234', 'rian@gmail.com', 'General', 'aktif', 'aktif', 'Approve'),
(20, 'puji', 18156243, 'pujiM', 'puji123', 'puji@gmail.com', 'General', 'aktif', 'aktif', 'Approve'),
(21, 'sdf', 0, 'me', '123', 'sdfg', 'General', 'aktif', 'aktif', 'Approve'),
(22, 'Melina Nurlidiana', 18110100, 'melina', '123', 'melina@gmail.com', 'General', 'aktif', 'aktif', 'Approve');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_buku`
--
ALTER TABLE `data_buku`
 ADD PRIMARY KEY (`id_buku`), ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `data_keranjang`
--
ALTER TABLE `data_keranjang`
 ADD PRIMARY KEY (`id_keranjang`), ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `data_peminjam`
--
ALTER TABLE `data_peminjam`
 ADD PRIMARY KEY (`id_peminjam`), ADD KEY `id_user_peminjam` (`id_user_peminjam`), ADD KEY `id_buku_dipinjam` (`id_buku_dipinjam`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
 ADD PRIMARY KEY (`id_user`), ADD KEY `nama_user` (`nama_user`), ADD KEY `nama_user_2` (`nama_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_buku`
--
ALTER TABLE `data_buku`
MODIFY `id_buku` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `data_keranjang`
--
ALTER TABLE `data_keranjang`
MODIFY `id_keranjang` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `data_peminjam`
--
ALTER TABLE `data_peminjam`
MODIFY `id_peminjam` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
