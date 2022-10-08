-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Okt 2022 pada 15.16
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myapp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `konten` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`id`, `judul`, `konten`, `url`, `gambar`, `tanggal`) VALUES
(1, 'Ini Adalah Artikel Paling Awal Banget Loh', '        			Konten pertama saya berisi tentang pembelajaran mengenai CodeIgniter		    ', 'artikel-pertama-saya', 'db_32.png', '2022-09-05 13:17:04'),
(3, 'Ini Adalah Artikel Ketiga Saya', 'Konten ketiga saya berisi tentang pembelajaran mengenai Reactjs', 'artikel-ketiga-saya', '', '2022-09-04 12:37:45'),
(4, 'Ini adalah Artikel Baru Saya', 'Artikel ini berisi tentang cara penggunaan Laravel.', '', '', '2022-08-31 02:30:31'),
(5, 'Ini adalah Artikel Baru Saya', 'Aku adalah programmer hebat!', '', '', '2022-08-31 02:37:36'),
(6, 'Ini adalah Artikel Baru Saya', 'Aku akan menjadi orang terkaya didunia!', 'artikel-baru-saya', '', '2022-08-31 02:43:08'),
(8, 'Aku Adalah Programmer Hebat', 'aku akan menjadi programmer yang hebat!', 'aku-programmer-hebat', '', '2022-08-31 14:34:38'),
(11, 'Ryan Adalah Programmer Hebat', 'Ryan Hasbie merupakan salah satu programmer hebat yang ada didunia!', 'ryan-programmer-hebat', '', '2022-09-02 02:49:14'),
(16, 'Aku Adalah Orang Terkaya Didunia', 'Ryan Hasbie merupakan orang terkaya didunia.', 'artikel-baru-saya', 'db_3.png', '2022-09-05 01:24:23'),
(17, 'Aku Adalah Orang Terkaya Didunia', 'Ryan Hasbie merupakan orang terkaya didunia!', 'ryan-orang-kaya', 'db_31.png', '2022-09-05 01:26:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
