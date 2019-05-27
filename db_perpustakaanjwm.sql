-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Des 2018 pada 14.01
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaanjwm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_anggota` enum('Active','No Active','','') NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `instansi` varchar(50) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `id_user`, `status_anggota`, `nama_anggota`, `email`, `telepon`, `instansi`, `username`, `password`, `tanggal`) VALUES
(3, 2, 'No Active', 'Adam', 'adam@gmail.com', '0225311651256123', '', 'adam', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2018-07-09 01:46:46'),
(4, 2, 'Active', 'Bambang', 'bambang1234@gmail.com', '545234555555555', '', 'bambang', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2018-08-10 00:56:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahasa`
--

CREATE TABLE `bahasa` (
  `id_bahasa` int(11) NOT NULL,
  `kode_bahasa` varchar(3) NOT NULL,
  `nama_bahasa` varchar(50) NOT NULL,
  `keterangan` text,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahasa`
--

INSERT INTO `bahasa` (`id_bahasa`, `kode_bahasa`, `nama_bahasa`, `keterangan`, `urutan`, `tanggal`) VALUES
(1, 'ID', 'Bahasa Indonesia', 'Indonesia, melayu, dan malaysia', 1, '2018-07-09 22:14:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status_berita` enum('Publish','Draft','','') NOT NULL,
  `jenis_berita` enum('Berita','Slider') NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `id_user`, `slug_berita`, `judul_berita`, `isi`, `gambar`, `status_berita`, `jenis_berita`, `tanggal`) VALUES
(1, 2, 'aswar-programmer-profesional-siap-adu-coding', 'Aswar Programmer Profesional Siap Adu coding', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Lorem Ipsum&nbsp;</p>\r\n</body>\r\n</html>', 'pexels-photo-105294.jpeg', 'Publish', 'Slider', '2018-08-09 05:34:24'),
(2, 2, 'programmer-profesional-siap-tuntasakan-masalah', 'Programmer Profesional Siap Tuntasakan Masalah', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Lorem Ipsumt&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse recusandae hic vel ducimus libero quaerat numquam, repellat! Sed maxime, porro aut reprehenderit odit unde autem eligendi, atque non mollitia architecto? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, optio architecto quod, ipsam possimus ut quo id iure! Sit nobis quibusdam voluptatum, repellat eum eaque impedit. Nisi commodi distinctio cupiditate? Lorem Ipsumt&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse recusandae hic vel ducimus libero quaerat numquam, repellat! Sed maxime, porro aut reprehenderit odit unde autem eligendi, atque non mollitia architecto? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, optio architecto quod, ipsam possimus ut quo id iure! Sit nobis quibusdam voluptatum, repellat eum eaque impedit. Nisi commodi distinctio cupiditate? Lorem Ipsumt&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse recusandae hic vel ducimus libero quaerat numquam, repellat! Sed maxime, porro aut reprehenderit odit unde autem eligendi, atque non mollitia architecto? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, optio architecto quod, ipsam possimus ut quo id iure! Sit nobis quibusdam voluptatum, repellat eum eaque impedit. Nisi commodi distinctio cupiditate?</p>\r\n<p>Lorem Ipsumt&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse recusandae hic vel ducimus libero quaerat numquam, repellat! Sed maxime, porro aut reprehenderit odit unde autem eligendi, atque non mollitia architecto? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, optio architecto quod, ipsam possimus ut quo id iure! Sit nobis quibusdam voluptatum, repellat eum eaque impedit. Nisi commodi distinctio cupiditate?</p>\r\n<p>Lorem Ipsumt&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse recusandae hic vel ducimus libero quaerat numquam, repellat! Sed maxime, porro aut reprehenderit odit unde autem eligendi, atque non mollitia architecto? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, optio architecto quod, ipsam possimus ut quo id iure! Sit nobis quibusdam voluptatum, repellat eum eaque impedit. Nisi commodi distinctio cupiditate?</p>\r\n<p>Lorem Ipsumt&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse recusandae hic vel ducimus libero quaerat numquam, repellat! Sed maxime, porro aut reprehenderit odit unde autem eligendi, atque non mollitia architecto? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, optio architecto quod, ipsam possimus ut quo id iure! Sit nobis quibusdam voluptatum, repellat eum eaque impedit. Nisi commodi distinctio cupiditate?</p>\r\n<p>Lorem Ipsumt&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse recusandae hic vel ducimus libero quaerat numquam, repellat! Sed maxime, porro aut reprehenderit odit unde autem eligendi, atque non mollitia architecto? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, optio architecto quod, ipsam possimus ut quo id iure! Sit nobis quibusdam voluptatum, repellat eum eaque impedit. Nisi commodi distinctio cupiditate?</p>\r\n</body>\r\n</html>', 'Workfromhome-kTb--621x414@LiveMint.jpg', 'Publish', 'Berita', '2018-08-09 05:36:31'),
(3, 2, 'selamat-datang-di-perpustakaan-online', 'Selamat Datang di Perpustakaan Online', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Anda seddang&nbsp; belajar framework codeigniter</p>\r\n</body>\r\n</html>', 'pexels-photo-436784.jpeg', 'Publish', 'Slider', '2018-08-09 05:33:35'),
(4, 2, 'scroll-up-studio-siap-rilis-start-up', 'Scroll Up studio siap rilis Start Up', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Scrool&nbsp; Up studio menjadi branding menarik saat ini Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet recusandae explicabo excepturi modi nostrum vero dicta sunt! Eaque odit porro at doloremque dolorem facilis illo sunt placeat veritatis? Ipsa, placeat.</p>\r\n<p>&nbsp;</p>\r\n</body>\r\n</html>', '16090324640_aa17a96195_b.jpg', 'Publish', 'Slider', '2018-08-09 05:31:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_bahasa` int(11) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `penulis_buku` varchar(255) NOT NULL,
  `subjek_buku` varchar(255) DEFAULT NULL,
  `letak_buku` varchar(255) DEFAULT NULL,
  `kode_buku` varchar(50) DEFAULT NULL,
  `kolasi` int(11) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `tahun_terbit` year(4) DEFAULT NULL,
  `nomor_seri` varchar(50) DEFAULT NULL,
  `status_buku` enum('Publish','No Publish','Missing','') DEFAULT NULL,
  `ringkasan` text,
  `cover_buku` varchar(255) DEFAULT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `tanggal_entri` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `id_user`, `id_jenis`, `id_bahasa`, `judul_buku`, `penulis_buku`, `subjek_buku`, `letak_buku`, `kode_buku`, `kolasi`, `penerbit`, `tahun_terbit`, `nomor_seri`, `status_buku`, `ringkasan`, `cover_buku`, `jumlah_buku`, `tanggal_entri`, `tanggal`) VALUES
(1, 2, 1, 1, 'Tutorial Codeigniter', 'Aswar', NULL, 'Kiri atas', '2312124', 3, 'Gramedia', 2019, '121333', 'Publish', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum ab tenetur magni voluptates ullam deleniti. Velit nostrum similique, ad corrupti expedita, voluptatum quas dignissimos possimus pariatur ipsam dolore reiciendis tenetur?', 'Logo_Sajangsang.jpeg', 2, '2018-07-14 23:56:29', '2018-07-20 01:13:22'),
(2, 2, 4, 1, 'Php Mudah', 'Anton', NULL, '', '2312124', 11, 'Gramedia', 0000, '', 'Publish', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum ab tenetur magni voluptates ullam deleniti. Velit nostrum similique, ad corrupti expedita, voluptatum quas dignissimos possimus pariatur ipsam dolore reiciendis tenetur?', 'Esport_angin.jpeg', 0, '2018-07-15 00:12:18', '2018-07-20 01:13:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_buku`
--

CREATE TABLE `file_buku` (
  `id_file_buku` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `judul_file` varchar(255) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `keterangan` text,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `file_buku`
--

INSERT INTO `file_buku` (`id_file_buku`, `id_user`, `id_buku`, `judul_file`, `nama_file`, `keterangan`, `urutan`, `tanggal`) VALUES
(4, 2, 1, 'BAB 1 Pengantar Php', '10_hari_akhir.pdf', 'dsassd', NULL, '2018-07-19 04:38:05'),
(5, 2, 1, 'BAB 2 Codeigniter', 'PESERTA-LULUS-SBMPTN-2018.pdf', '', NULL, '2018-07-21 06:00:42'),
(6, 2, 1, 'BAB 3 Bootstrap', 'CV.pdf', '', NULL, '2018-07-21 06:01:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `kode_jenis` varchar(20) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `keterangan` text,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `kode_jenis`, `nama_jenis`, `keterangan`, `urutan`, `tanggal`) VALUES
(1, 'FIK', 'Fiksi Indonesia', 'Semua buku fiksi', 1, '2018-07-09 05:49:01'),
(3, 'BAC', 'Bacaan', 'Semua buku bacaan', 2, '2018-07-09 05:20:57'),
(4, 'TEK', 'Teknik', 'Semua tentang enginer', 3, '2018-07-14 00:13:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `namaweb` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(500) DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `map` text,
  `metatext` text,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `max_hari_peminjaman` int(11) DEFAULT NULL,
  `max_jumlah_peminjaman` int(11) DEFAULT NULL,
  `denda_perhari` int(11) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `id_user`, `namaweb`, `tagline`, `deskripsi`, `keywords`, `email`, `website`, `logo`, `icon`, `facebook`, `twitter`, `instagram`, `map`, `metatext`, `telepon`, `alamat`, `max_hari_peminjaman`, `max_jumlah_peminjaman`, `denda_perhari`, `tanggal_update`) VALUES
(1, 2, 'SI Perpustakaan Online Pondok Informatika', 'Generasi IT yang Rabbani', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat ducimus nulla sapiente ipsam culpa reiciendis unde. Deleniti voluptas eos, error maiores nemo autem a! Quos, libero suscipit omnis similique eveniet!\r\n', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat ducimus nulla sapiente ipsam culpa reiciendis unde. Deleniti voluptas eos, error maiores nemo autem a! Quos, libero suscipit omnis similique eveniet!\r\n', 'pondokinformatika@gmail.com', 'http://pondokinformatika.id', 'Artboard_12@4x-8.png', 'Artboard_12@4x-81.png', 'http://facebook.com/pondokinformatika', 'http://twitter.com/pondokinformatika', 'http://instagram.com/pondokinformatika', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.806333692617!2d119.4813216153551!3d-5.134864996273572!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbefccbdea40a79%3A0x77af8d17d09be20c!2sPondok+Informatika!5e0!3m2!1sid!2sid!4v1533775629268\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat ducimus nulla sapiente ipsam culpa reiciendis unde. Deleniti voluptas eos, error maiores nemo autem a! Quos, libero suscipit omnis similique eveniet!\r\n', '085298730727', 'Jl. Perintis Kemerdekaan VII', 14, 2, 1000, '2018-08-11 04:39:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `link`
--

CREATE TABLE `link` (
  `id_link` int(11) NOT NULL,
  `nama_link` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `target` varchar(20) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `link`
--

INSERT INTO `link` (`id_link`, `nama_link`, `url`, `target`, `tanggal`) VALUES
(1, 'Pondok Informatika', 'http://pondokinformatika.id', '_blank', '2018-08-11 08:36:53'),
(3, 'Kaskus', 'http://kaskus.co.id', '_top', '2018-08-11 08:36:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `keterangan` text NOT NULL,
  `status_kembali` enum('Belum','Sudah','Hilang','') NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_buku`, `id_anggota`, `id_user`, `tanggal_pinjam`, `tanggal_kembali`, `keterangan`, `status_kembali`, `tanggal`) VALUES
(1, 2, 4, 2, '2018-08-11', '2018-08-25', 'Curug Cipendokk', 'Sudah', '2018-08-11 05:35:49'),
(3, 1, 4, 2, '2018-08-11', '2018-08-25', 'Curug Cipendokk', 'Sudah', '2018-08-11 05:44:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `foto`, `keterangan`, `tanggal`) VALUES
(1, 'admin ', 'admin@mail.com', 'admin', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'Admin', NULL, NULL, '2018-07-08 08:19:39'),
(2, 'Aswar', 'aswarkasim@gmail.com', 'Aswar', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Admin', NULL, NULL, '2018-07-09 00:36:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `usulan`
--

CREATE TABLE `usulan` (
  `id_usulan` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `keterangan` text,
  `nama_pengusul` varchar(255) NOT NULL,
  `email_pengusul` varchar(255) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `status_usulan` varchar(20) NOT NULL,
  `tanggal_usulan` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `usulan`
--

INSERT INTO `usulan` (`id_usulan`, `judul`, `penulis`, `penerbit`, `keterangan`, `nama_pengusul`, `email_pengusul`, `ip_address`, `status_usulan`, `tanggal_usulan`, `tanggal`) VALUES
(1, 'Sengsara membawa nikmat', 'Marah Ruslia', 'Gramedia', 'Lorem Ipsum', 'Aswar Kasim', 'aswarkasim@gmail.com', '::1', 'Diterima', '2018-08-01 06:48:32', '2018-08-01 07:19:58'),
(2, 'Menikah itu Mudahh', 'Aswar kasim', 'Gramedia', 'Menikah diusia mudah', 'Aswar Kasim', 'aswarkasim@gmail.com', '::1', 'Baru', '2018-08-01 09:22:45', '2018-08-01 07:22:45');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `bahasa`
--
ALTER TABLE `bahasa`
  ADD PRIMARY KEY (`id_bahasa`),
  ADD UNIQUE KEY `kode_bahasa` (`kode_bahasa`),
  ADD UNIQUE KEY `nama_bahasa` (`nama_bahasa`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD UNIQUE KEY `judul_berita` (`judul_berita`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `file_buku`
--
ALTER TABLE `file_buku`
  ADD PRIMARY KEY (`id_file_buku`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`),
  ADD UNIQUE KEY `kode_jenis` (`kode_jenis`),
  ADD UNIQUE KEY `nama_jenis` (`nama_jenis`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indeks untuk tabel `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id_link`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `usulan`
--
ALTER TABLE `usulan`
  ADD PRIMARY KEY (`id_usulan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `bahasa`
--
ALTER TABLE `bahasa`
  MODIFY `id_bahasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `file_buku`
--
ALTER TABLE `file_buku`
  MODIFY `id_file_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `link`
--
ALTER TABLE `link`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `usulan`
--
ALTER TABLE `usulan`
  MODIFY `id_usulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
