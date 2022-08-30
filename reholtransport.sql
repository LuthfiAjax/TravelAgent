-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Agu 2022 pada 20.37
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
-- Database: `reholtransport`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `akses` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `email`, `password`, `akses`) VALUES
(3, 'Luthfi Imron', 'seajaxid@gmail.com', '$2y$10$61iTXH4w3.ib0/3mMmOy7uo2WHa79kBn1wasB7.o7HUAXT6k1Lm7m', '1'),
(4, 'Ach Luthfi', 'luthfijaxid@gmail.com', '$2y$10$ADCDHx8NvY7wHFDp0k52GutweOlPmAB41v9CPZzVxpdKj.c8FP1TW', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_destinasi`
--

CREATE TABLE `tb_destinasi` (
  `id_wisata` int(11) NOT NULL,
  `nama_wisata` varchar(100) DEFAULT NULL,
  `id_lokasi` int(11) DEFAULT NULL,
  `gambar_w` varchar(100) DEFAULT NULL,
  `ket_wisata` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_destinasi`
--

INSERT INTO `tb_destinasi` (`id_wisata`, `nama_wisata`, `id_lokasi`, `gambar_w`, `ket_wisata`) VALUES
(17, 'PANTAI INDRAYANTI', 8, 'ind.jpg', 'Pantai Indrayanti salah satu tempat wisata pantai di Jogja yang kini sudah sangat populer di kalangan wisatawan, baik lokal maupun mancanegara. Bahkan, pantai ini seolah jadi rute wajib dari nyaris semua agen wisata saat membawa tamunya berkunjung ke DIY.\r\n\r\nSama seperti tipikal pantai selatan di wilayah Gunungkidul, pemandangan di sini tidak kalah indahnya. Namun yang menjadi kelebihan pantai ini yaitu selain garis pantainya yang landai juga pasir pantai di sini relatif lebih bersih ketimbang pantai lainnya.'),
(18, 'Karang Jahe', 9, '1575180210.jpg', 'Tahukah kamu mengapa pantai ini dinamakan Karangjahe?\r\n\r\nNama ini rupanya terinspirasi dari terumbu karangnya. Ya, bentuk terumbu karang di pantai ini sangat unik. Dilihat-lihat, bentuknya menyerupai jahe.\r\n\r\nNamun, bukan hanya itu saja yang menjadi point of interest dari Pantai Karangjahe. Pasirnya putih bersih. Terdapat cemara cemara yang menyambung seperti rantai semakin membuat pantai ini elok.\r\n\r\nSelain itu memiliki pesona pemandangan yang memesona, wisatawan juga mendapatkan fasilitas yang menarik. Ada beberapa fasilitas yang bisa dinikmati oleh para pengunjung pantai Karangjahe\r\n\r\n\r\n\r\nArtikel ini telah tayang sebelumnya di napaktilas.net dengan judul 10 Wisata Pantai Terindah di Rembang yang Lagi Hits (2022).'),
(19, 'Pantai Parangtritis', 10, 'parang.jpg', 'Pantai Parangtritis (bahasa Jawa: ꦥꦱꦶꦱꦶꦂ ꦥꦫꦁꦠꦿꦶꦠꦶꦱ꧀, translit. Pasisir Parangtritis) adalah tempat wisata yang terletak di Desa Parangtritis, Kapanéwon Kretek, Kabupaten Bantul, Daerah Istimewa Yogyakarta. Jaraknya kurang lebih 27 km dari pusat Kota Yogyakarta. Pantai ini menjadi salah satu destinasi wisata terkenal di Yogyakarta dan telah menjadi ikon pariwisata di Yogyakarta. Pantai ini mempunyai nilai simbolis yang merupakan garis yang bersifat magis yang menghubungkan Panggung Krapyak, Keraton Yogyakarta, Tugu Yogyakarta dan Gunung Merapi yang dikenal sebagai Garis Imajiner Yogyakarta.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `id_lok` int(11) NOT NULL,
  `nama_lokasi` varchar(100) DEFAULT NULL,
  `gambar_lok` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_lokasi`
--

INSERT INTO `tb_lokasi` (`id_lok`, `nama_lokasi`, `gambar_lok`) VALUES
(8, 'Yogyakarta', 'tugu.png'),
(9, 'Rembang', 'remb.jpg'),
(10, 'Bantul', 'bantul.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mobil`
--

CREATE TABLE `tb_mobil` (
  `id_mobil` int(11) NOT NULL,
  `gambar_m` varchar(100) DEFAULT NULL,
  `nama_mobil` varchar(100) DEFAULT NULL,
  `ket_mobil` text DEFAULT NULL,
  `kapasitas` decimal(10,0) DEFAULT NULL,
  `pemakaian` varchar(100) DEFAULT NULL,
  `harga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mobil`
--

INSERT INTO `tb_mobil` (`id_mobil`, `gambar_m`, `nama_mobil`, `ket_mobil`, `kapasitas`, `pemakaian`, `harga`) VALUES
(3, 'kijang1.jpg', 'Brio', 'Mengenai harga, Toyota Innova 2021 saat ini dibanderol dengan harga mulai dari 321 Jutaan untuk tipe Mengenai harga, Toyota Innova 2021 saat ini dibanderol dengan harga mulai dari 321 Jutaan untuk tipe terendahnya, dan untuk tipe tertingginya mobil innova ini dibanderol dengan harga 417 jutaan.Mengenai harga, Toyota Innova 2021 saat ini dibanderol dengan harga mulai dari 321 Jutaan untuk tipe terendahnya, dan untuk tipe tertingginya mobil innova ini dibanderol dengan harga 417 jutaan.Mengenai harga, Toyota Innova 2021 saat ini dibanderol dengan harga mulai dari 321 Jutaan untuk tipe terendahnya, dan untuk tipe tertingginya mobil innova ini dibanderol dengan harga 417 jutaan.terendahnya, dan untuk tipe tertingginya mobil innova ini dibanderol dengan harga 417 jutaan.', '8', 'Dalam Kota', 300000),
(4, 'avanza.jpeg', 'Avanza', 'Harga jual Tovota Avanza di pasaran kini mulai naik sekitar Rp20 juta akibat perubahan kebijakan diskon pajak mobil. Mengutip detikcom, saat ini harga jual Tovota Avanza pasca perubahan tarif PPnBM ada di kisaran Rp 217 juta - Rp 237 juta.', '7', 'Luar Kota', 250000),
(5, 'avanza1.jpeg', 'Toyota', '<div class=\"col-lg-8 mt-3\">\r\n                    <?= $this->session->flashdata(\'message\'); ?>\r\n                </div><div class=\"col-lg-8 mt-3\">\r\n                    <?= $this->session->flashdata(\'message\'); ?>\r\n                </div><div class=\"col-lg-8 mt-3\">\r\n                    <?= $this->session->flashdata(\'message\'); ?>\r\n                </div>', '5', 'Dalam kota jogja', 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` int(11) NOT NULL,
  `id_kategori` int(5) DEFAULT NULL,
  `nama_paket` varchar(100) DEFAULT NULL,
  `ket_paket` text DEFAULT NULL,
  `gambar_p` varchar(255) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `durasi` int(11) DEFAULT NULL,
  `orang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `id_kategori`, `nama_paket`, `ket_paket`, `gambar_p`, `harga`, `durasi`, `orang`) VALUES
(2, 2, 'Paket Low Budget', 'Kami akan mengantar anda ke beberapa destinasi yanga ad di jogja', 'paket1.jpg', 200000, 1, 4),
(4, 2, 'Murah Poll', 'Buget bukan jadi kendala, mari berliburan dengan kami', 'bantul.jpg', 500000, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket_kategori`
--

CREATE TABLE `tb_paket_kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL,
  `gambar_kat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_paket_kategori`
--

INSERT INTO `tb_paket_kategori` (`id_kategori`, `nama_kategori`, `gambar_kat`) VALUES
(1, 'Dolan Alas Bareng Rehol', 'paket.jpg'),
(2, 'Dolan Jogja Bareng Rehol', 'tugu.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id_pesan` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `pesan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pesan`
--

INSERT INTO `tb_pesan` (`id_pesan`, `nama`, `email`, `subject`, `pesan`) VALUES
(1, 'Luthfi Imron', 'seajaxid@gmail.com', 'Laporan', 'Diperbaiki lagi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profil`
--

CREATE TABLE `tb_profil` (
  `id_profil` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `tentang` text DEFAULT NULL,
  `no_hp` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_profil`
--

INSERT INTO `tb_profil` (`id_profil`, `judul`, `tentang`, `no_hp`, `email`, `alamat`) VALUES
(1, 'Bermain bersama Rehol', 'kami perusahaan Travel', '081286325715', 'reholtransport.jogja@gmail.com', 'Seleman, Yogyakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_testimoni`
--

CREATE TABLE `tb_testimoni` (
  `id_testimoni` int(5) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `profesi` varchar(30) DEFAULT NULL,
  `pesan` text DEFAULT NULL,
  `medsos` varchar(15) DEFAULT NULL,
  `akun` varchar(30) DEFAULT NULL,
  `gambar_t` text DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_testimoni`
--

INSERT INTO `tb_testimoni` (`id_testimoni`, `nama`, `profesi`, `pesan`, `medsos`, `akun`, `gambar_t`, `status`) VALUES
(1, 'Luthfi', 'CEO JaxID', 'gambar_tgambar_tgambar_t', 'Instagram', 'luthfi.imron', 'ind.jpg', 'Non-Aktif'),
(5, 'Imron', 'programmer', 'Pro Banget nich', 'Facebook', 'luthfi.imron', 'paket.jpg', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(5) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `nomorhp` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `jumlah` decimal(10,0) DEFAULT NULL,
  `biaya` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `nomorhp`, `email`, `jumlah`, `biaya`) VALUES
(3, 'Luthfi Imron', '081286325715', 'seajaxid@gmail.com', '4', 500000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_destinasi`
--
ALTER TABLE `tb_destinasi`
  ADD PRIMARY KEY (`id_wisata`);

--
-- Indeks untuk tabel `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`id_lok`);

--
-- Indeks untuk tabel `tb_mobil`
--
ALTER TABLE `tb_mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indeks untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `tb_paket_kategori`
--
ALTER TABLE `tb_paket_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indeks untuk tabel `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_destinasi`
--
ALTER TABLE `tb_destinasi`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  MODIFY `id_lok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_mobil`
--
ALTER TABLE `tb_mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_paket_kategori`
--
ALTER TABLE `tb_paket_kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  MODIFY `id_testimoni` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
