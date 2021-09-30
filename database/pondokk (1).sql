-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2020 at 07:09 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pondokk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(64) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(0, 'admin', '$2y$10$EX0L5MeIQldpkCuTZW.mjujTaj.Yy20IW0GOluecU/c.es.9r6E5.', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` int(64) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_guru` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `email`, `nama_guru`, `password`) VALUES
(12345678, 'akbar@gmail.com', 'akbar@gmail.com', '$2y$10$3nJpjmCrEoIZgroFkGVN/eqGNRKmmMcpz3BGpYZNgYfqtFMD5ivIq'),
(2147483647, 'admin@gmail.com', 'adsadfa', '$2y$10$0UCjF5LeC0QlzfFRwiXVtefoQMw4hVXmExEPZgcJawlUZiSW6i1Bq');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(64) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `password`, `email`, `image`, `is_active`, `date_created`) VALUES
(47, 'agku', '$2y$10$zwnjwU634RC8nyByT7bNmupGYqv.31SSG7CBLf0QdBr7LU1iMlKIS', 'akbar@gmail.com', 'default.jpg', 1, 1607507387);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id` int(11) NOT NULL,
  `bulan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` double NOT NULL,
  `status` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id`, `bulan`, `tahun`, `jumlah`, `status`) VALUES
(1, 'Januari', '2020', 200000, 'Aktif'),
(2, 'Feb', '2020', 250000, 'Aktif'),
(3, 'Maret', '2020', 100000, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `order_id` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int(11) DEFAULT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bulan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gross_amount` int(11) NOT NULL,
  `payment_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_time` varchar(19) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `va_number` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_code` char(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`order_id`, `id`, `nama`, `bulan`, `gross_amount`, `payment_type`, `transaction_time`, `bank`, `va_number`, `pdf_url`, `status_code`) VALUES
('1026376302', NULL, NULL, NULL, 100000, 'bank_transfer', '2020-12-12 19:18:12', 'bca', '44861258105', 'https://app.sandbox.midtrans.com/snap/v1/transactions/3e691258-f37b-4219-be33-7b02ee4d141a/pdf', '201'),
('108669251', NULL, NULL, NULL, 250000, 'bank_transfer', '2020-12-12 19:30:21', 'bca', '44861324645', 'https://app.sandbox.midtrans.com/snap/v1/transactions/a766792e-7f8d-4bee-9352-43a70bba23f2/pdf', '201'),
('1157755868', NULL, NULL, NULL, 200000, 'bank_transfer', '2020-12-12 19:27:06', 'bca', '44861096066', 'https://app.sandbox.midtrans.com/snap/v1/transactions/2bcf61ac-587e-403b-b525-3a07837a4053/pdf', '201'),
('1169483623', NULL, NULL, NULL, 250000, 'bank_transfer', '2020-12-12 15:02:30', 'bca', '44861437375', 'https://app.sandbox.midtrans.com/snap/v1/transactions/f69afd87-bf5f-41a9-aeab-d88cc3433d0f/pdf', '201'),
('1323760306', 47, 'agku', 'Feb', 250000, 'bank_transfer', '2020-12-13 13:07:35', 'bca', '44861962908', 'https://app.sandbox.midtrans.com/snap/v1/transactions/ba3aa820-f651-4475-86ce-aca4f0911d5e/pdf', '201'),
('1367318119', NULL, NULL, NULL, 200000, 'bank_transfer', '2020-12-12 14:57:48', 'bca', '44861712779', 'https://app.sandbox.midtrans.com/snap/v1/transactions/c031efab-cba5-4c44-977a-7566d20a24a1/pdf', '201'),
('1570270691', NULL, NULL, NULL, 250000, 'bank_transfer', '2020-12-12 19:32:03', 'bni', '9884486185738369', 'https://app.sandbox.midtrans.com/snap/v1/transactions/789458a8-fb92-4f26-9f30-f5f01324dcc9/pdf', '201'),
('1710218287', NULL, NULL, NULL, 200000, 'bank_transfer', '2020-12-12 19:23:07', 'bca', '44861603205', 'https://app.sandbox.midtrans.com/snap/v1/transactions/6472b6c9-1a63-4a2f-92f0-ee6c64af1aaa/pdf', '201'),
('444930486', NULL, NULL, NULL, 250000, 'bank_transfer', '2020-12-12 15:07:49', 'bca', '44861852688', 'https://app.sandbox.midtrans.com/snap/v1/transactions/ba539e94-ed7f-4713-9444-577e2eda4b3a/pdf', '201');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
