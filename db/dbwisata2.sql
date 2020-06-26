-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 21, 2020 at 07:18 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbwisata2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `image` varchar(30) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `telepon`, `image`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '081282441221', 'IMG_1592755245.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id_info` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `cover` varchar(128) NOT NULL,
  `post` text NOT NULL,
  `tanggal_post` date NOT NULL,
  `jam_post` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_info`, `admin_id`, `judul`, `cover`, `post`, `tanggal_post`, `jam_post`) VALUES
(2, 1, 'Kepala Disporaparbud Optimis Kunjungan Wisatawan Ke Purwakarta Masih Sesuai Target', 'IMG_1592129112.png', '<p>MEREBAKNYA pemberitaan soal virus Corona yang sudah masuk ke Indonesia, tentu berdampak pada sektor kunjungan pariwisata ke Purwakarta, Jawa Barat.\r\n\r\n“Yang saya khawatirkan dampak merebaknya pemberitaan suspeck penyakit Corona bisa mempengaruhi kunjungan wisatawan ke Purwakarta kendati sejauh ini masih belum terasa,”kata Kepala Dinas Kepemudaan, Olahraga, Pariwisata dan Kebudayaan (Disporaparbud) Kabupaten Purwakarta, Jawa Barat, H. Agus Hasan Sapudin ketika ditemui dialogpublik.com di kantor Kecamatan Purwakarta, Rabu sore (4/3/2020).\r\n\r\nSaat itu, Kadisporaparbud didampinggi Camat Kecamatan Purwakarta, Dodih Hamdani.\r\n\r\n\r\nMengenai target yang pernah disampaikan Bupati Purwakarta, Hj. Anne Ratna Mustika kunjungan wisatawan ke Purwakarta akan mencapai tiga juta pengunjung di tahun 2020 ini, Agus Hasan masih yakin tercapai.\r\n\r\n“Kami optimis target itu akan tercapai. Apalagi ada destinasi wisata yang baru di buka untuk umum yakni tempat wisata Tajug Gede yang berlokasi di Kecamatan Bungursari,”kata Kadis H. Agus Hasan.\r\n\r\nDisamping itu, tambah Kadisporaparbud, destinasi wisata yang dikelola Pemda masih tidak dipungut retribuasi alias gratis.\r\n\r\n“Ini juga salah satu daya tarik wisatawan datang ke Purwakarta meskipun wisatawannya masih dominasi warga Purwakarta,”kata H. Agus Hasan Saputra yang juga menjabat Ketua Pemuda Panca Marga Indonesia (PPMI) Kabupaten Purwakarta. (Jainul Abidin)<p>', '2020-06-14', '17:05:12'),
(4, 1, 'Disporaparbud Purwakarta Fokus Gali Potensi Wisata', 'IMG_1592127244.png', '<p><strong>Dinas Pemuda, Olahraga, Pariwisata dan Kebudayaan Kabupaten Purwakarta</strong>&nbsp; fokus menyisir seluruh tempat yang dianggap potensial untuk dikembangkan menjadi destinasi wisata.\r\n\r\nKepala Bidang Pariwisata Pada Disporaparbud Kabupaten Purwakarta, Irfan Suryana menyebut, hampir seluruh desa di wilayahnya memiliki potensi pariwisata yang bisa dikembangkan. Baik wisata alam maupun wisata buatan.</p>\r\n\r\n<p><br>“Di awal tahun ini, kami memfokuskan untuk menyisir lokasi – lokasi yang dianggap potensial untuk dikembangkan,” ungkap dia, Rabu (26/2/2020).<br />\r\n&nbsp;\r\nIa menyebut, saat ini telah ada 62 destinasi wisata di wilayah ini yang tersebar hampir di seluruh kecamatan yang ada. Jumlah itu tentu harus terus dikembangkan untuk meningkatkan sektor wisata di Kabupaten Purwakarta.<br />\r\n&nbsp;\r\n\r\n<br“Alhamdulillah, saat ini di Purwakarta sudah banyak pilihan lokasi wisata y‎ang bisa dikunjungi. Tapi pengembangan tetap harus dilakukan\" ujar Irfan.<br />\r\n&nbsp;</p>\r\n\r\n<p>Untuk kawasan desa wisata, lanjut dia, Purwakarta memiliki lokasi unggulan. Antara lain Kampung Tajur berokasi Kecamatan Bojong. Bahkan saat ini, ada beberapa lokasi yang akan diciptakan menjadi desa wisata yang masih dalam tahap survei.\r\n\r\n\"Dengan memaksimalkan pengembangan wisata di setiap desa, dipastikan akan membuat roda perekonomian masyarakat juga turut meningkat. Karena, dipastikan akan melahirkan ekonomi kreatif di masyarakat,\" kata dia.<br />\r\n&nbsp;</p>\r\n\r\n<p><a href=\"https://3.bp.blogspot.com/-XyIcWxm3owo/Wj6uJmvElMI/AAAAAAAAFoA/_rhx1i7t3bkl0uDdmI38ioDDwexdQoR1ACLcBGAs/s1600/Harga%2BTiket%2BMasuk%2BKolam%2BRenang%2BTirta%2BSari%2BCikampek%2B2.jpg\"><img alt=\"Harga Tiket Masuk Kolam Renang Tirta Sari Cikampek\" src=\"https://3.bp.blogspot.com/-XyIcWxm3owo/Wj6uJmvElMI/AAAAAAAAFoA/_rhx1i7t3bkl0uDdmI38ioDDwexdQoR1ACLcBGAs/s400/Harga%2BTiket%2BMasuk%2BKolam%2BRenang%2BTirta%2BSari%2BCikampek%2B2.jpg\" style=\"height:241px; width:400px\" /></a></p>\r\n\r\n<p><br />\r\nAlamat kolam renang tirta sari cikampek berada di jalan tirtasari sari mulya kotabaru kabupaten karawang jawa barat. untuk mejuju kesana dengan roda dua serta roda empat dari arah karanang serta sekelilingnya dapat dengan gampang lewat jalur umum karawang - cikampek atau lewat jalan raya klari menuju ke jalan raya kosambi serta jalan Jndrl A. Yani.<br />\r\n&nbsp;</p>\r\n\r\n<p><a href=\"https://4.bp.blogspot.com/-hAWvmTVWdcE/Wj6tCvNy9jI/AAAAAAAAFn4/B9RqHmoSlNA9A7LfPdMOCRD7CLD9i09PACEwYBhgL/s1600/Harga%2BTiket%2BMasuk%2BKolam%2BRenang%2BTirta%2BSari%2BCikampek%2B1.jpg\"><img alt=\"Harga Tiket Masuk Kolam Renang Tirta Sari Cikampek\" src=\"https://4.bp.blogspot.com/-hAWvmTVWdcE/Wj6tCvNy9jI/AAAAAAAAFn4/B9RqHmoSlNA9A7LfPdMOCRD7CLD9i09PACEwYBhgL/s400/Harga%2BTiket%2BMasuk%2BKolam%2BRenang%2BTirta%2BSari%2BCikampek%2B1.jpg\" style=\"height:235px; width:400px\" /></a></p>\r\n\r\n<p><br />\r\n.<br />\r\n&nbsp;</p>\r\n\r\n<p><a href=\"https://3.bp.blogspot.com/-kSNXOK_HCjw/Wj6uJpfDd3I/AAAAAAAAFoE/-deOrRR36zQgks_cv1ASyaiyeSZGp1FmACEwYBhgL/s1600/Harga%2BTiket%2BMasuk%2BKolam%2BRenang%2BTirta%2BSari%2BCikampek%2B3.jpg\"><img alt=\"Harga Tiket Masuk Kolam Renang Tirta Sari Cikampek\" src=\"https://3.bp.blogspot.com/-kSNXOK_HCjw/Wj6uJpfDd3I/AAAAAAAAFoE/-deOrRR36zQgks_cv1ASyaiyeSZGp1FmACEwYBhgL/s400/Harga%2BTiket%2BMasuk%2BKolam%2BRenang%2BTirta%2BSari%2BCikampek%2B3.jpg\" style=\"height:242px; width:400px\" /></a></p>\r\n\r\n<p><br />\r\nWahana kolam renang tirta sari cikampek ini begitu bagus dengan harga ticket yang murah, di sini ada kolam untuk dewasa yang dapat dipakai untuk beljar berenanag, mmelatih pernapasan serta yang lain. Untuk kolam anak dengan kedalaman dari mulai 40 cm - 70 cm buat kolam renang yang aman serta nyaman untuk bermain air.<br />\r\n&nbsp;</p>\r\n\r\n<p><a href=\"https://1.bp.blogspot.com/-1v_eDNLiqaE/Wj6uJ47nnjI/AAAAAAAAFoI/-jK0YuHxFCopPhCavsFdP-rQvzkPhptMwCEwYBhgL/s1600/Harga%2BTiket%2BMasuk%2BKolam%2BRenang%2BTirta%2BSari%2BCikampek%2B4.jpg\"><img alt=\"Harga Tiket Masuk Kolam Renang Tirta Sari Cikampek\" src=\"https://1.bp.blogspot.com/-1v_eDNLiqaE/Wj6uJ47nnjI/AAAAAAAAFoI/-jK0YuHxFCopPhCavsFdP-rQvzkPhptMwCEwYBhgL/s400/Harga%2BTiket%2BMasuk%2BKolam%2BRenang%2BTirta%2BSari%2BCikampek%2B4.jpg\" style=\"height:242px; width:400px\" /></a></p>\r\n\r\n<p><br />\r\nPermainan plosotan begitu mengasyikkan, dari mulai plosotan yang kecil, plosotan panjang serta plosotan yang spiral. kolam anak ini memanglah di buat sebaik-baiknya supaya pengunjung kerasan nikmati wahana air hingga sepanjang hari. di kolam anak juga ada ember tumpah yang dapat menaikkan kecerian anak anda dalam bermain air.</p>\r\n', '2020-06-14', '16:34:04'),
(5, 1, 'Tarik Minat Turis, Bupati Anne Ajak Anak Muda Promosikan Wisata Purwakarta', 'IMG_1592125510.jpg', '<p>&nbsp;Pemerintah Kabupaten Purwakarta terus melakukan upaya pengembangan objek wisata yang kian diminati wisatawan Nusantara maupun mancanegara. Popularitas wisata Purwakarta memang tengah naik daun menyusul boomingnya Gunung Parang di media sosial.\r\n\r\nTak ingin menyia-nyiakan kesempatan tersebut, Bupati Anne Ratna Mustika mengatakan bahwa pihaknya saat ini sedang gencar-gencarnya mensosialisasikan potensi wisata Purwakarta kepada generasi milenial.</p>\r\n\r\n\r\n<p>Menurut Anne, anak muda Purwakarta sebetulnya sudah memahami bahwa daerahnya punya potensi wisata. Bahkan, objek wisata Gunung Parang bisa viral di media sosial karena dipromosikan oleh para milenial yang hobi berburu spot-spot instagramable..</p>\r\n\r\n<p>“Anak muda atau milenial bisa jadi media informasi gratis bagi kami. Dengan media sosialnya, mereka kan suka mengabadikan foto-foto yang instagramable, kemudian diunggah, itu membantu kami membagikan informasi wisata. Contoh paling nyata adalah Gunung Parang yang saat ini menjadi objek wisata Purwakarta favorit wisatawan mancanegara,” terang Bupati Anne Ratna Mustika, saat ditemui Okezone dalam acara ‘Sang Pemimpin’, belum lama ini.</p>\r\n\r\n', '2020-06-14', '16:05:10');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Alam'),
(2, 'Supernatural');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gender` enum('Laki-Laki','Perempuan') NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `image` varchar(30) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `nama`, `gender`, `email`, `password`, `status`, `telepon`, `alamat`, `image`) VALUES
(2, 'AnisahNurAfifah', 'Perempuan', 'anisanurafifah@gmail.com', '$2y$10$eiVl3gwEdG6Q5Pcg58zjluoCmBxTAag7qtsrikEavdnicrnlxN5Mi', 'Mahasiswa', '081201820112', 'Cikampek, Jawa Barat', 'default.png'),
(3, 'Jhon Doe', 'Laki-Laki', 'jhondoe@yahoo.com', '$2y$10$/PEk39YgS5RxY3YDTq2wVOA3ol9BVRxrMAqXz6nxl0Hsdt0w0fmY2', 'Karyawan Swasta', '081282441000', 'Indonesia', 'default.png'),
(6, 'vivi', 'Perempuan', 'vivi@gmail.com', '$2y$10$7vlypz.9znH7hLXQTGAU/O4CBePVUdcQ/Omm21PC1lUh46YVpYYiu', 'mahasiswa', '082200004444', 'cikampek', 'default.png'),
(7, 'enjun', 'Laki-Laki', 'enjun@gmail.com', '$2y$10$fQJXQSVSY0iCpNHTQb33KuKJ4oFNZcsvlhcyO7UfxXRR4bBe6DB06', 'Mahasiswa', '089688048342', 'Regensi', 'default.png'),
(8, 'Klotze', 'Laki-Laki', 'ahmadjunaedi1412@gmail.com', '$2y$10$1DNR2B2alAb2D13VwE3GTO4LJ9l1h4caZ6NP6QdRYdNhDHV3EEOda', 'Mahasiswa', '089688048342', 'Perum Regensi', 'IMG_1592755744.jpg'),
(9, 'vivian adelia', 'Perempuan', 'vivianadelia1177@gmail.com', '$2y$10$..JlM2SdyFmMLI6oTojr8ui4uXcrcoFpKwHgLxsLuXafH2mOBS5ky', 'mahasiswa', '089887767656', 'kebun kembang', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `lama` int(2) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bukti_pembayaran` varchar(30) NOT NULL,
  `status_pembayaran` int(1) NOT NULL,
  `tgl_konfirmasi` varchar(30) DEFAULT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `id_member`, `id_wisata`, `tanggal`, `lama`, `tgl_bayar`, `bukti_pembayaran`, `status_pembayaran`, `tgl_konfirmasi`, `jam`) VALUES
(32, 8, 1, '2020-06-14', 2, '2020-06-14', 'IMG_14062020_1.png', 1, '1592136460', '07:06:26'),
(33, 7, 1, '2020-06-14', 1, '2020-06-14', 'IMG_14062020_11.png', 1, '1592144986', '09:29:12'),
(34, 2, 3, '2020-07-04', 3, '2020-06-15', 'IMG_15062020_1.jpg', 1, '1592219063', '05:58:32'),
(35, 2, 10, '2020-06-15', 2, '0000-00-00', '', 1, '1592221662', '00:00:00'),
(36, 2, 6, '2020-06-16', 1, '0000-00-00', '', 0, '1592298685', '00:00:00'),
(37, 9, 3, '2020-06-17', 1, '2020-06-16', 'IMG_16062020_1.jpg', 1, '1592299474', '04:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `nama_lengkap` varchar(128) NOT NULL,
  `lokasi` varchar(128) NOT NULL,
  `photo` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id_keluhan` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `deskripsi` text NOT NULL,
  `star` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id_keluhan`, `id_member`, `tanggal`, `id_wisata`, `is_active`, `deskripsi`, `star`) VALUES
(1, 8, '2020-06-14', 1, 1, 'tempat nya bagus, selain bagus dan nyaman tempat ini selalu sepi, sampe saya kira ini kuburan.', 4),
(3, 7, '2020-06-14', 1, 1, 'Sama kek yang dibawah', 2),
(4, 2, '2020-06-19', 3, 1, 'tempatnya sangatt indah sekali cocok untuk para instagram meuble\r\n', 5);

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_wisata` varchar(128) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `status` enum('Buka','Tutup') NOT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL,
  `lokasi` varchar(128) NOT NULL,
  `link_map` text NOT NULL,
  `gambar` varchar(30) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id`, `kategori_id`, `nama`, `jenis_wisata`, `deskripsi`, `harga`, `status`, `jam_buka`, `jam_tutup`, `lokasi`, `link_map`, `gambar`, `created`) VALUES
(1, 1, 'Cikao Water Park', 'HTM', 'Cikao Park adalah lokasi indah baru yang sedang hits-hitsnya di Purwakarta.\r\n\r\nMeskipun baru ngehits beberapa bulan belakangan, daerah ini seperti oase di gurun pasir. Bahkan hampir setiap akhir pekan, destinasi ini selalu ramai dikunjungi, baik wisatawan lokal, maupun luar daerah.\r\n\r\n\r\n \r\nSelain panorama alam yang masih asri, objek wisata ini menawarkan aneka permainan yang bernilai edukasi.\r\n\r\nTerdapat Waterpark Bernuansa alam dan pantai, taman satwa dengan koleksi yang langka, bird park, minizoo, area bermain, gazebo, hingga lampion garden.\r\n\r\nLokasi: Desa Cisalada, Kecamatan Jatiluhur, Kabupaten Purawakarta, Jawa Barat.\r\n', 50000, 'Buka', '09:00:00', '17:00:00', 'Desa Cisalada, Kecamatan Jatiluhur, Kabupaten Purawakarta, Jawa Barat\r\n', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.5201666802736!2d107.44685041477103!3d-6.582070595239807!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e690fbc3253df5d%3A0x6141847136f40932!2sCikao%20Water%20park!5e0!3m2!1sen!2sid!4v1592325673087!5m2!1sen!2sid', 'IMG_1592235467.PNG', '2020-04-29 13:35:24'),
(3, 2, 'Sasak Panyawangan', 'HTM', 'sasak panyawangan adalah wisata untuk semua umur, disini memungkinkan kamu untuk buang-buang waktu duduk disana dengan segelas kopi yang mahal, namun jangan khawatir, pohon disana masih sama seperti pohon pada umum nya.', 30000, 'Buka', '09:00:00', '17:00:00', 'Desa Sukamulya, Kecamatan Tegalwaru, Kabupaten Purawakarta, Jawa Barat', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.407483118245!2d107.34032831414143!3d-6.596172666313784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e690889271b4141%3A0xd343046fe4b46bb6!2sSasak%20Panyawangan!5e0!3m2!1sen!2sid!4v1592325745708!5m2!1sen!2sid', 'IMG_1592235545.PNG', '2020-04-29 22:40:30'),
(4, 1, 'Cidomas', 'HTM', 'Obyek Wisata sungai Cidomas di Purwakarta Jawa Barat adalah salah satu tempat wisata yang berada di Parakan Garokgek, Kiarapedes, Kabupaten Purwakarta, Jawa Barat 41175, Indonesia . Obyek Wisata sungai Cidomas di Purwakarta Jawa Barat adalah tempat wisata yang ramai dengan wisatawan pada hari biasa maupun hari liburan. Tempat ini sangat indah dan bisa memberikan sensasi yang berbeda dengan aktivitas kita sehari hari.\r\n\r\nObyek Wisata sungai Cidomas di Purwakarta Jawa Barat memiliki pesona keindahan yang sangat menarik untuk dikunjungi. Sangat di sayangkan jika anda berada di kota purwakarta tidak mengunjungi wisata alam yang mempunyai keindahan yang tiada duanya tersebut.\r\n\r\nObyek Wisata sungai Cidomas di Purwakarta Jawa Barat sangat cocok untuk mengisi kegiatan liburan anda, apalagi saat liburan panjang seperti libur nasional, ataupun hari ibur lainnya. Keindahan Obyek Wisata sungai Cidomas di Purwakarta Jawa Barat ini sangatlah baik bagi anda semua yang berada di dekat atau di kejauhan untuk merapat mengunjungi tempat Obyek Wisata sungai Cidomas di Purwakarta Jawa Barat di kota purwakarta.', 25000, 'Buka', '09:00:00', '17:00:00', 'Desa Garogek, Kec.Kiara Pedes Kab.Purwakarta', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.9298858116636!2d107.59605121414198!3d-6.655612566913697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6919134e097501%3A0xefdd99d91bdbf4bc!2sWana%20Wisata%20Cidomas!5e0!3m2!1sen!2sid!4v1592325977934!5m2!1sen!2sid', 'IMG_1592235585.PNG', '2020-04-29 22:41:05'),
(6, 2, 'Tajug Gede Cilodong', 'Gratis', 'Masjid yang dibangun di atas lahan seluas 10 hektare itu memiliki arsitektur yang mirip dengan masjid para Wali Songo. \r\nPada Jumat (21/12/2018), Kompas.com berkesempatan mengunjungi Tajug Gede Cilodong sekaligus melaksanakan shalat jumat perdana di masjid itu. Masjid tersebut berada di tengah lahan puluhan hektare sehingga memiliki halaman yang sangat luas. Dari jauh, Tajug Gede Cilodong tampak megah dengan diapit tiga menara tinggi. Ketika melihat ke dalam, nuansa tradisional dari masjid itu terasa begitu kental. Tidak ada kaca sama sekali di masjid itu. Semua jendela ditutup ukiran kayu jati motif bunga yang meninggalkan banyak lubang. Jendela-jendela itu sekaligus sebagai ventilasi, sehingga suasana di masjid tetap sejuk meski cuaca di luar sedang panas.\r\n\r\nKendati mengusung konsep Sunda tradisional, namun teknologi modern tetap dipakai di masjid itu. Misalnya, lampu-lampu berbentuk segi empat dipasang di langit-langit masjid dalam jumlah banyak. Di sisi jendela dan pintu juga dipasang lampu dengan desain kap tradisional.\r\n\r\n\r\nSelain untuk beribadah, Tajug Gede Cilodong juga berpotensi menjadi destinasi wisata. Dedi mengatakan, pihaknya akan membangun fasilitas menarik di sekitar kompleks masjid.\r\n\r\nFasilitas dimaksud adalah air mancur, lapak kuliner, pertanian, sarana olahraga dan lainnya. Diharapkan, fasilitas ini bisa menarik pengunjung, baik dari dalam maupun luar kota. \"Tajug Gede ini juga akan menjadi rest area. Apalagi, lokasinya dekat dengan pintu keluar tol Cikopo,\" kata ketua DPD Golkar Jawa Barat ini.\r\n\r\n', 0, 'Buka', '00:00:00', '00:00:00', 'Cikopo Kec.Bungursari Kab.Purwakarta', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.5359319870836!2d107.47977941413994!3d-6.453565464897898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6913c1327eed59%3A0x7a874f8ad4db4df8!2sMasjid%20Raya%20Cilodong!5e0!3m2!1sen!2sid!4v1592326630388!5m2!1sen!2sid', 'IMG_1592235668.jpg', '2020-04-30 11:56:00'),
(9, 0, 'Hidden Valley Hills', 'HTM', 'Di Kabupaten Purwakarta, saat ini ada sebuah lokasi wisata eksotis yang lagi ngehits. Meski sedikit tersembunyi, keberadaannya ternyata bak sebuah oase di gurun pasir\r\n_\r\nHampir setiap akhir pekan, lokasi yang menyuguhkan view panorama alam nan eksotis itu kerap diserbu wisatawan. Pengunjungnya tak hanya warga lokal, banyak juga di antaranya dari luar kabupaten\r\n_\r\nHidden Valley Hills, begitulah sebutan untuk destinasi wisata baru itu. Lokasinya berada di Desa Cibodas, Kecamatan Sukatani. Wisata ini awalnya dibuka karena terinspirasi dari keberadaan sebuah tugu Belanda Kuno Anno bertuliskan tahun 1898 Masehi yang berada di lokasi tersebut\r\n_\r\nTopografi Purwakarta yang berupa perbukitan memang membuatnya memiliki view alam terbuka yang menyegarkan. Buat kamu yang sudah bosan liburan di kota lain, Purwakarta bisa jadi alternatifnya ?', 40000, 'Buka', '06:00:00', '22:58:25', 'Kec. Wanayasa', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.102435316433!2d107.4201727!3d-6.6341988999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6905bb399d1beb%3A0xb7d7a47a3b2db974!2sHidden%20Valley%20Hills!5e0!3m2!1sen!2sid!4v1592315745563!5m2!1sen!2sid', 'IMG_1592320548.jpg', '2020-06-12 12:16:12'),
(10, 1, 'Taman Panca Warna', 'Gratis', 'Taman yang tertata indah, jadi cerminan kota dengan kualitas masyarakatnya. Keberadaaan taman kota pun bukan sekadar untuk memperindah suasana, tapi sekligus sebagai sarana untuk saling bertoleransi sebagai sesama warga kota.\r\n\r\nNah di Purwakarta, ada taman kota yang hadir dan dipadati khalayak ramai. Salah satunya adalah Taman Pancawarna yang berlokasi di sebelah Kantor Bupati Purwakarta.\r\n\r\nMeski begitu, tidak ada kesan kaku sebagaimana lazimnya suasana kisaran kantor pemerintahan. Jauh dari itu, suasana Taman Pancawarna terasa menyenangkan dan menenteramkan secara bersamaan.\r\n\r\nNama Pancawarna pun punya arti, yaitu lima warna yang secara simbolis cukup menggambarkan suasana taman. Ketika memasuki area Taman Pancawarna, Anda akan disambug warna-warni bunga.\r\n\r\nKolam dengan air mancur mengelilingi bangunan pendopo. Di sebelahnya terdapat sebuah jembatan kecil melengkung nan elok yang membawa ke pelataran kantor Bupati yang gagah dihiasi kereta kencana. Banyak banget spot foto yang bikin konten Instagram jadi makin menarik.\r\n\r\nOh ya menariknya, Anda bisa masuk dan menikmati keindahan Taman Pancawarna secara cuma-cuma pada waktu yang disediakan. Tapi ada syaratnya. Tidak boleh menginjak rumput, apalagi membuang sampah sembarangan!', 0, 'Buka', '06:00:00', '21:00:00', 'Kota Purwakarta', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.723932993294!2d107.44005661414094!3d-6.556493065916485!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e690e504f48f315%3A0x2d6820113498daf1!2sTaman%20Pancawarna!5e0!3m2!1sen!2sid!4v1592326706110!5m2!1sen!2sid', 'IMG_1592235777.jpg', '2020-04-29 13:35:24'),
(11, 2, 'Resort Giri Tirta Kahuripan', 'HTM', 'Lokasi Giri Tirta Wanayasa Purwakarta terletak di ketinggian kurang lebih 500 meter dari atas permukaan air laut, sehingga pengunjung bisa bersantai di bangku-bangku sembari menyeruput kopi hangat atau minuman dingin yang telah disediakan di foodcourt. Sebenarnya lokasi wisata di Purwakarta ini merupakan resort atau penginapan. Hanya saja resort ini tak cuma menyediakan penginapan mewah, melainkan juga menyediakan berbagai wahana permainan bagi pengunjung yang tidak menginap, tetapi tetap akan dikenakan tiket masuk wisata.\r\nHome » Harga Tiket Dan Lokasi Resort Giri Tirta Kahuripan Purwakarta\r\n\r\nHarga Tiket Dan Lokasi Resort Giri Tirta Kahuripan Purwakarta\r\n Jawa Barat\r\n\r\n \r\nPengelola Penginapan atau resort selalu berusaha memberikan pelayanan serta fasilitas lengkap kepada pengunjungnya. Tak jarang pada akhirnya mereka menggelontor banyak modal membangun resort agar terlihat unik nan keren, seperti halnya Resort Giri Tirta Kahuripan Purwakarta Jawa Barat. Keberadaan resort ini begitu viral di berbagai sosial media, karena mampu memadukan antara wahana modern dengan keindahan alam sekitar. Sehingga mampu menciptakan background foto keren.\r\n\r\nResort Giri Tirta Kahuripan Purwakarta\r\nLokasi Giri Tirta Wanayasa Purwakarta terletak di ketinggian kurang lebih 500 meter dari atas permukaan air laut, sehingga pengunjung bisa bersantai di bangku-bangku sembari menyeruput kopi hangat atau minuman dingin yang telah disediakan di foodcourt. Sebenarnya lokasi wisata di Purwakarta ini merupakan resort atau penginapan. Hanya saja resort ini tak cuma menyediakan penginapan mewah, melainkan juga menyediakan berbagai wahana permainan bagi pengunjung yang tidak menginap, tetapi tetap akan dikenakan tiket masuk wisata.\r\n\r\nGiri Tirta Wanayasa Purwakarta\r\n\r\nWahana ter-favorit di resort Giri Tirta Kahuripan Purwakarta ialah berupa kolam renang dengan konsep skypool alias kolam renang diatas awan. Disana pengunjung sembari melakukan kegiatan berenang, juga dapat menikmati pemandangan alam sekitar yang begitu hijau berupa area perkebunan dan pemukiman warga setempat. Disekitar kolam renang Giri Tirta Kahuripan ada saung dan kursi santai yang dapat digunakan bersantai.', 50000, 'Buka', '10:00:00', '18:00:00', 'Desa Taringgul Kec.Wanayasa Kab.Purwakarta Jawa Barat', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.1042102796596!2d107.53334201414182!3d-6.6339782666946805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e691a508ba632d5%3A0xa93070b9565c795d!2sResort%20Giri%20Tirta%20Kahuripan!5e0!3m2!1sen!2sid!4v1592326754313!5m2!1sen!2sid', 'IMG_1592235715.PNG', '2020-04-29 22:40:30'),
(12, 1, 'Taman Batu Cijanun', 'HTM', 'Bermain air di sumber mata air alami akan memberikan efek segar dan rileks yang sesungguhnya, terlebih dengan pemandangan alam yang mempesona di sekitarnya.\r\n\r\nDeretan perbukitan hijau dan bebatuan unik di sisi kolam pun terlihat instagramable bila di abadikan dalam sebuah foto kenangan.\r\n\r\nDi sini, kamu bisa hunting foto cantik dengan area perbukitan, bermain air hingga menikmati panorama sekitar\r\n\r\nPastikan untuk mengabadikan setiap momen serumu bersama keluarga tercinta di spot wisata yang kece ini.\r\n\r\n', 35000, 'Buka', '09:00:00', '17:00:00', 'Desa Cijanun Kec.Bojong Kab.Purwakarta Prov.Jawa Barat', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63409.66752316963!2d107.50051083400129!3d-6.633977033781812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e691b4239ac4f91%3A0x13c2255571135e93!2sTaman%20Batu%20Purwakarta!5e0!3m2!1sen!2sid!4v1592326843903!5m2!1sen!2sid', 'IMG_1592236083.PNG', '2020-06-15 22:48:03'),
(13, 0, 'Situ Wanayasa', 'Gratis', 'Situ Wanayasa', 0, 'Buka', '00:00:00', '00:00:00', 'Kec. Wanayasa', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31702.041594980954!2d107.53860140351776!3d-6.677221791014276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e691bf3e0da0e87%3A0xfa1a517a5e31d10e!2sSitu%20Wanayasa!5e0!3m2!1sen!2sid!4v1592326941215!5m2!1sen!2sid', 'IMG_1592237080.jpg', '2020-06-15 23:04:40'),
(14, 1, 'Gunung Lembu', 'HTM', 'Liburan seru dengan sensasi petualangan bisa kamu nikmati bila berkunjung ke Gunung Lembu.\r\n\r\nTidak sedikit pelancong yang menyebutkan rute pendakian gunung Lembu sangat menyusahkan, namun semua rasa lelah akan sirna begitu tiba di puncaknya.\r\n\r\nDi sore hari, kamu bisa menikmati pemandangan cantik area sekitar sembari menanti matahari terbenam.\r\n\r\nLalu di malam hari, kamu bisa menikmati keindahan lampu-lampu yang menyinari desa-desa di Purwakarta.\r\n\r\nSelain itu, eksotisme Waduk Jatiluhur terlihat jelas dari atas ketinggian 792 mdpl ini, hingga berswafoto di sebuah batu besar di Puncaknya.\r\n\r\n\r\n', 20000, 'Buka', '09:00:00', '16:58:25', 'Kampung Panunggal, Desa Panyindangan, Kecamatan Sukatani, Kabupaten Purwakarta, Jawa Barat', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31709.462268687384!2d107.3227681034622!3d-6.561666296266872!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6909071f17585d%3A0xf0b93e5338c30360!2sGn.%20Lembu!5e0!3m2!1sen!2sid!4v1592326980268!5m2!1sen!2sid', 'IMG_1592321274.jpg', '2020-06-16 22:19:56'),
(15, 0, 'Curug Tilu', 'HTM', 'Curug Tilu, memiliki daya tarik alam yang relatif belum terjamah tangan manusia dengan pesona yang tidak biasa.\r\n\r\nTepat di curug utama, kamu akan dimanjakan dengan pemandangan alam nan hijau dengan kontur bebatuan khas pegunungan.\r\n\r\n\r\n \r\nWarna air di Curug Tilu terlihat kehijauan persis seperti ‘Grand Canyon’ yang ada di Pangandaran, cocok bagi kamu yang suka berenang di air jernih.\r\n\r\nTersedia persewaan pelampung bagi kamu yang tidak bisa berenang, jadi jangan khawatir bermain air di sini, pasti menyenangkan.\r\n', 15000, 'Buka', '08:00:00', '17:00:00', 'Desa Ciririp, Kecamatan Sukasari, Kabupaten Purwakarta, Jawa Barat. ', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.626068282075!2d107.27817961375871!3d-6.56878979524922!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69a7e84b1a7845%3A0x5e62a8e4d6f6ed26!2sCurug%20Tilu!5e0!3m2!1sen!2sid!4v1592327026589!5m2!1sen!2sid\" width=\"600', 'IMG_1592321244.PNG', '2020-06-16 22:27:24'),
(16, 0, 'Kuya Maranggi Waterpark', 'HTM', 'Kuya Maranggi Waterpark adalah salah satu destinasi keluarga yang kami rekomendasikan untuk dikunjungi saat liburan.\r\n\r\nJika dilihat dari atas, hiasan dan kolam renang di sini terlihat unik dengan bentuk kuya atau kura-kura.\r\n\r\n\r\n \r\nDestinasi ini dilengkapi kolam renang balita, anak-anak dan dewasa dengan seluncuran spiral dan pelangi, perahu kuya, ember tumpah, hingga jembatan selfie yang menjadi spot foto favorit wisatawan.\r\n\r\nPerpaduan budaya lokal dan modern membuat Kuya aranggi menjadi destinasi yang wajib dikunjungi bagi yang ingin menikmati wahana air dengan suasan asri khas kota Purwakarta.\r\n\r\nLingkungan nyaman dengan luas sekitar 5000m2 membuat Kuya Maranggi menjadi obejek wisata terbaik untuk untuk melepas penat bersama keluarga\r\n\r\n', 50000, 'Buka', '08:00:00', '17:00:00', 'Desa Cibungur, Kecamatan Bungursari, Kebupaten Purwakarta, Jawa Barat', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.4021924892772!2d107.47784991477036!3d-6.470630195318987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e690d62b345f1b7%3A0xc37dc5d398ac777a!2sKuya%20Maranggi%20Waterpark!5e0!3m2!1sen!2sid!4v1592325081941!5m2!1sen!2sid', 'IMG_1592325036.jpg', '2020-06-16 23:30:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemesanan_ibfk_1` (`id_wisata`),
  ADD KEY `pemesanan_ibfk_2` (`id_member`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_keluhan`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_kost` (`id_wisata`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_keluhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_wisata`) REFERENCES `wisata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_member`) REFERENCES `member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ulasan_ibfk_2` FOREIGN KEY (`id_wisata`) REFERENCES `wisata` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
