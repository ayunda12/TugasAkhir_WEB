-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jan 2022 pada 21.36
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dyahayusalon`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `bukti_bayar` varchar(200) NOT NULL,
  `jumlah_bayar` int(8) NOT NULL,
  `keterangan_bayar` varchar(20) NOT NULL,
  `tgl_booking` date NOT NULL,
  `harga_paket` int(8) NOT NULL,
  `tgl_acara` date NOT NULL,
  `tglwaktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id_booking`, `id_paket`, `id_user`, `status`, `bukti_bayar`, `jumlah_bayar`, `keterangan_bayar`, `tgl_booking`, `harga_paket`, `tgl_acara`, `tglwaktu`) VALUES
(122, 16, 17, 'Menunggu Pembayaran', 'WhatsApp Image 2021-12-08 at 19.31.15.jpeg', 35000000, '', '2021-12-24', 35000000, '2021-12-28', '2022-01-06 09:31:57'),
(123, 16, 17, 'dikonfirmasi', 'flower-g22bd694f7_1280.jpg', 88899919, 'DP', '2021-12-24', 35000000, '2021-12-31', '2022-01-06 09:31:57'),
(126, 17, 28, 'dikonfirmasi', 'tema-13-5a.png', 500000, 'DP', '2022-01-06', 25000000, '2022-01-22', '2022-01-06 09:32:19'),
(128, 16, 28, 'diproses', 'couple-cartoon-crown-wedding-icon-vector-graphic-couple-cartoon-girl-boy-man-woman-crown-wedding-ribbon-marriage-icon-colorfull-115466078.jpg', 35000000, 'lunas', '2022-01-06', 35000000, '2022-01-10', '2022-01-06 09:35:42'),
(129, 17, 28, 'diproses', 'tema-13-5a.png', 25000000, 'lunas', '2022-01-06', 25000000, '2022-01-29', '2022-01-06 10:26:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id`, `foto`, `keterangan`) VALUES
(18, '244730541_3119283761637967_3066883331440420257_n.jpg', '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(19, '244511246_405810297599269_6340352751278282806_n.webp.jpg', '<p>Akad Miss Devi Semboro</p>\r\n'),
(20, '1640151030754.jpg', ''),
(21, '1640151053005.jpg', ''),
(22, '219122318_768360587169179_4998266754571464204_n.jpg', ''),
(23, '121261612_784030382172965_4426456585024811559_n.jpg', '<p>Make Up Flawless</p>\r\n'),
(24, '253980819_2928252794171604_206507933450720294_n.jpg', '<p>Make Up Wisuda</p>\r\n'),
(25, 'WhatsApp Image 2021-12-22 at 12.45.59.jpeg', '<p>Tanam Bulu Mata Natural Bervolume</p>\r\n'),
(26, '1640150973663.jpg', '<p>Wedding Miss Devi Permatasari</p>\r\n'),
(27, '1640151042526.jpg', '<p>Model Rambut Curly</p>\r\n'),
(28, '1640150955442.jpg', '<p>Wedding Tipe India</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(29, '234370167_4020411551401044_2663264002106749052_n.jpg', '<p>Wedding Elly dan Firman Agustus 2021</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id` int(11) NOT NULL,
  `nama_layanan` varchar(50) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `keterangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id`, `nama_layanan`, `gambar`, `keterangan`) VALUES
(12, 'Sound System', 'png-transparent-computer-icons-sound-icon-symbol-electro-house-miscellaneous-angle-text-removebg-preview.png', '<p>Sound system dengan musik pilihan terbaik kekinian.</p>\r\n'),
(13, 'Photo & Video', '27-279183_download-camera-icon-add-photo-icon-png-clipart-removebg-preview.png', '<p>Tersedia Photo dan Video yang akan memberikan hasil yang terbaik selama acara.</p>\r\n'),
(14, 'Mua Make Up', '3494231-removebg-preview.png', '<p>Salon ini menyediakan jasa untuk make up pernikahan, wisuda, marching band, karnaval. dll</p>\r\n'),
(15, 'Tenda & Dekorasi', 'download__1_-removebg-preview.png', '<p>Paket Tenda Dekorasi ini ditujukan bagi Anda yang hanya membutuhkan tenda dekorasi lengkap dengan perangkat pesta untuk acara pernikahan Anda dengan tidak menutup kemungkinan untuk penambahan spesifikasi produk dan layanan sesuai kebutuhan.</p>\r\n'),
(16, 'Busana Pengantin', 'download-removebg-preview.png', '<p>Jika ladies memiliki budget yang terbatas, ladies bisa melakukan penyewaan&nbsp;baju pengantin. Salon&nbsp;tempat rias pengantin ini menyediakan satu paket rias dan baju pengantin adat lho. Tentu saja ini akan memangkas banyak biaya tanpa mengurangi kesakralan pernikahan.</p>\r\n'),
(17, 'Perawatan Rambut dan Wajah', 'png-clipart-beauty-parlour-hair-care-computer-icons-black-hair-hair-black-hair-hand-removebg-preview.png', '<p>Perawatan yang difokuskan untuk kesehatan rambut yang biasanya dilanjutkan juga dengan pemijatan kepala, leher dan punggung. Juga dengan pemberian vitamin rambut setelahnya. Jenis perawatan rambut, seperti: Creambath, Hair mask atau hair spa,Ozon Theraphy</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `gambar` varchar(500) NOT NULL,
  `harga` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `detail`, `gambar`, `harga`) VALUES
(16, 'Emas', '<ul>\r\n	<li>Make Up &amp; Touch Up Resepsi</li>\r\n	<li>Kebaya Akad dan Resepsi</li>\r\n	<li>Beskap/Jas Pengantin Akad dan Resepsi</li>\r\n	<li>Aksesoris Pengantin Akad/Resepsi</li>\r\n	<li>Janur Pintu (1 pasang)</li>\r\n	<li>Umbul-umbul (1 buah)</li>\r\n	<li>Rias pengantin untuk akad&nbsp;nikah</li>\r\n	<li>Rias dan busana pengantin untuk resepsi 2x</li>\r\n	<li>Rias dan busana kedua orang tua (4 orang)</li>\r\n	<li>Rias dan busana pagar ayu (6 orang)</li>\r\n	<li>Foto Digital</li>\r\n</ul>\r\n', 'wedding-gbf39cb385_1920.jpg', 35000000),
(17, 'Bintang', '<ul>\r\n	<li>Pelaminan Up To 12 Meter</li>\r\n	<li>Taman Pelaminan Artificial</li>\r\n	<li>Pergola Masuk Pengantin 3&times;3 1 Buah</li>\r\n	<li>Standing Flower Jalan 6 Buah</li>\r\n	<li>Karpet Jalan</li>\r\n	<li>Meja dan Kursi Penerima Tamu</li>\r\n	<li>Dekorasi kamar pengantin</li>\r\n	<li>Janur Pintu (1 pasang)</li>\r\n	<li>Umbul-umbul (1 buah)</li>\r\n	<li>Rias pengantin untuk akad&nbsp;nikah</li>\r\n</ul>\r\n', 'wedding-reception-gb4beff5fd_1920.jpg', 25000000),
(20, 'Standart', '<ul>\r\n	<li>Dekorasi Meja Prasmanan</li>\r\n	<li>Meja + Gubukan 2 buah</li>\r\n	<li>Piring + Sendok + Garpu 200 set</li>\r\n	<li>Pemanas 5 set + Sendok Service</li>\r\n	<li>Tempat Nasi 1 buah + Sendok Nasi</li>\r\n	<li>Kotak Angpau 4 Buah</li>\r\n	<li>Photo Booth</li>\r\n	<li>Photo Gallery</li>\r\n	<li>Dekorasi Area Catering</li>\r\n</ul>\r\n', 'wedding-cake-g65a2ada27_1920.jpg', 10000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_upload` date NOT NULL,
  `keterangan` text NOT NULL,
  `id_booking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `id_user`, `tgl_upload`, `keterangan`, `id_booking`) VALUES
(43, 17, '2021-12-24', 'Keren banget dekorasinya, suka', 123),
(45, 28, '2022-01-06', 'keren bro\r\n', 126);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `level` int(1) NOT NULL DEFAULT 2,
  `foto` varchar(255) NOT NULL DEFAULT 'fotouser.png',
  `no_telp` varchar(13) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`, `foto`, `no_telp`, `alamat`) VALUES
(1, 'Dyah Ayu Lenita', 'admin', 'admin', 1, 'WhatsApp Image 2021-12-22 at 13.00.56.jpeg', '085232249295', ' Jl. Puring No.6, Beteng, Sidomekar, Semboro, Kabupaten Jember, Jawa Timur 68157'),
(2, 'Mikidungdung', 'user', 'user', 2, 'f3.jpg', 'Semboro', '081234456789'),
(17, 'Ayunda Kusuma Wardani', 'Ayu123', '12345', 2, '1.jpeg', '0812344169381', 'Beteng Sidomekar'),
(26, 'nnnn', 'yuni', '11111', 2, '1.jpg', '0897655555555', ' ww'),
(27, 'rumania', 'rina', '12345', 2, 'fotouser.png', '081234567890', ''),
(28, 'qwe', 'qes', '12345', 2, 'fotouser.png', '1111111111111', 'Jl.yuuuu');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_pelanggan` (`id_user`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_booking` (`id_booking`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`);

--
-- Ketidakleluasaan untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD CONSTRAINT `testimoni_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `testimoni_ibfk_2` FOREIGN KEY (`id_booking`) REFERENCES `booking` (`id_booking`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
