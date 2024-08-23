-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jan 2024 pada 11.18
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apoteksf1`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetObatByHargaSatuan` (IN `harga_jualsatuan_param` DOUBLE)  BEGIN
    SELECT * FROM obat
    WHERE harga_jualsatuan = harga_jualsatuan_param;
END$$

--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `HitungTotalHargaJual` (`hargaSatuan` DOUBLE, `stok` DOUBLE) RETURNS DOUBLE BEGIN
    DECLARE totalHargaJual DOUBLE;
    SET totalHargaJual = hargaSatuan * stok;
    RETURN totalHargaJual;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `beli`
--

CREATE TABLE `beli` (
  `id_pembelian` varchar(10) NOT NULL,
  `id_supplier` varchar(10) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `tgl_beli` date NOT NULL,
  `no_bukti` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `beli`
--

INSERT INTO `beli` (`id_pembelian`, `id_supplier`, `nama_supplier`, `tgl_beli`, `no_bukti`) VALUES
('L001', 'S004', 'PT MULYA W', '2018-12-27', 'N086'),
('L002', 'S001', 'PT SALASA BAROKAH', '2019-02-02', 'N202'),
('L003', 'S003', 'PT SABDA BADRANAYA MULYA', '2019-02-07', '4826'),
('L004', 'S003', 'PT SABDA BADRANAYA MULYA', '2019-02-07', '19sbm01482'),
('L005', 'S005', 'PT COBA AJA 1', '2023-07-25', 'C0B4'),
('L006', 'S004', 'PT COBA AJA 3', '2023-07-25', 'C0B5'),
('L007', 'S007', 'Rohim Kurniawan', '2024-01-23', 'C0B6'),
('L008', 'S008', 'Ridwan', '2024-01-17', 'C0B7'),
('L009', 'S008', 'Udil', '2024-01-24', 'C0B9'),
('L010', 'S008', 'Andes', '2024-01-31', 'C0B10'),
('L011', 'S008', 'Rohim', '2024-01-24', 'C0B11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` varchar(25) NOT NULL,
  `id_pembelian` varchar(10) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `harga_beli` double NOT NULL,
  `harga_jualsatuan` double NOT NULL,
  `stok` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `id_pembelian`, `nama_obat`, `harga_beli`, `harga_jualsatuan`, `stok`) VALUES
('B001', 'L001', 'LASERIN 60ML', 7909, 9000, 46),
('B002', 'L002', 'STMUNO SYRUP GRAPE 60ML', 22000, 24000, 10),
('B003', 'L002', 'STIMUNO SYRUP ORANGE BERRY 60ML', 22000, 24000, 10),
('B004', 'L002', 'MINYAK OTOT GELIGA 30ML', 12467, 14000, 10),
('B005', 'L002', 'MINYAK ANGIN HIJAU NO 1 12ML', 17600, 18500, 20),
('B006', 'L001', 'coba 1', 20000, 2000, 50),
('B007', 'L004', 'cobadada', 43, 3, 343),
('B008', 'L001', 'LASERIN 80ML', 90000, 1000, 6),
('B009', 'L003', 'Bodrex', 100, 100, 0),
('B010', 'L010', 'Komik OBH', 20000, 2000, 26);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(10) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat_supplier` varchar(200) NOT NULL,
  `telpon` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `telpon`) VALUES
('S001', 'PT SALASA BAROKAH', 'MADUMURTI, PATANGPULUHAN, WIROBRAJAN', '02744287727'),
('S002', 'APOTEK SARI ASIH', 'JL R.E MARTADINARA NO 44 SOLO', '0271644206'),
('S003', 'PT SABDA BADRANAYA MULYA', 'JL IMOGIRI TIMUR 121A GIWANGAN YK', '0274372382'),
('S004', 'PT MULYA W', 'YOGYAKATA', '02744287734'),
('S005', 'PT KEBAYORAN PHARMA', 'JL MELATI WETAN, BACIRO, GONDOKUSUMAN', '02198563928'),
('S006', 'PT COBA AJA 1', 'coba', '10210100'),
('S007', 'PT COBA AJA 4', 'Asep Oli', '1232'),
('S008', 'PT Saya Suka', 'Jalan Arteri Raya 17, RT 06 RW 07, Kelurahan Macanan, Kecamatan Wonokromo, Kota Surabaya, Jawa Timur, 60241', '081381755825');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kd_transaksi` varchar(20) NOT NULL,
  `id_obat` varchar(25) NOT NULL,
  `no_nota` char(20) NOT NULL,
  `harga` double NOT NULL,
  `jml_beli` int(3) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `total_pembelian` double NOT NULL,
  `jml_bayar` double NOT NULL,
  `kembalian` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kd_transaksi`, `id_obat`, `no_nota`, `harga`, `jml_beli`, `tgl_penjualan`, `total_pembelian`, `jml_bayar`, `kembalian`) VALUES
(10, 'T009', 'B001', '0009', 9000, 1, '2023-07-24', 9000, 20000, 11000),
(11, 'T010', 'B001', '0010', 9000, 1, '2023-07-24', 129000, 500000, 371000),
(12, 'T010', 'B002', '0010', 48000, 2, '2023-07-24', 129000, 500000, 371000),
(13, 'T010', 'B003', '0010', 72000, 3, '2023-07-24', 129000, 500000, 371000),
(16, 'T011', 'B001', '0011', 45000, 5, '2023-07-26', 45000, 50000, 5000),
(17, 'T012', 'B001', '0012', 36000, 4, '2023-07-26', 36000, 50000, 14000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `hak_akses` varchar(20) NOT NULL,
  `level` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `hak_akses`, `level`) VALUES
('AD-01', 'admin', 'admin', 'admin', 'B'),
('AD-02', 'coba 1', 'coba', 'admin', 'B'),
('AD-04', 'admin4', 'admin4', 'Admin', 'B'),
('PM-01', 'Pimpinan', 'Pimpinan', 'Pimpinan', 'A'),
('PTG-01', 'petugas obat', 'petugas obat', 'petugas obat', 'C');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `beli`
--
ALTER TABLE `beli`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `id_pembelian` (`id_pembelian`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_barang` (`id_obat`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `beli`
--
ALTER TABLE `beli`
  ADD CONSTRAINT `beli_ibfk_4` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `beli` (`id_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
