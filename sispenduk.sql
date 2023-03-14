-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2021 at 07:29 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sispenduk`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(50) NOT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `judul_berita` varchar(100) DEFAULT NULL,
  `detail_berita` text DEFAULT NULL,
  `tanggal_post` datetime DEFAULT NULL,
  `created_by` int(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `gambar`, `judul_berita`, `detail_berita`, `tanggal_post`, `created_by`, `created_at`, `updated_at`) VALUES
(5, 'Protokol COVID-19.png', 'Protokol COVID-19', 'Saat ini kita masih menghadapi tantangan yang mengharuskan beradaptasi dengan situasi pandemi Corona Virus Disease 2019 (COVID-19). Corona Virus Disease-19 adalah virus yang menyerang sistem pernapasan dan bisa menyebabkan gangguan ringan pada sistem pernapasan, infeksi paru-paru yang berat, hingga kematian. Covid-19 dapat menular dari manusia ke manusia melalui percikan (droplet) dari penderita yang bersin atau batuk dan kontak erat dengan penderita atau kontak dengan permukaan dan benda yang terkontaminasi. Covid-19 masuk ke tubuh melalui mata, hidung, dan mulut lewat tangan yang terkontaminasi virus.\r\n\r\nBelum ditemukannya vaksin dan pengobatan definitif COVID-19 diprediksi akan memperpanjang masa pandemi, sehingga masyarakat harus bersiap dengan keseimbangan baru pada kehidupan. Aspek kesehatan, sosial, dan ekonomi harus berjalan beriringan dan saling mendukung. Masyarakat harus melakukan perubahan pola hidup dengan tatanan dan adaptasi kebiasaan yang baru (new normal) agar dapat hidup produktif dan terhindar dari penularan COVID-19. Kedisiplinan dalam menerapkan prinsip pola hidup yang lebih bersih dan sehat merupakan kunci dalam menekan penularan COVID-19 pada masyarakat, sehingga diharapkan wabah COVID-19 dapat segera berakhir.\r\n\r\nMasyarakat memiliki peran penting dalam memutus mata rantai penularan COVID-19 agar tidak menimbulkan sumber penularan baru/cluster pada tempat-tempat dimana terjadinya pergerakan orang, interaksi antar manusia dan berkumpulnya banyak orang. Masyarakat harus dapat beraktivitas kembali dalam situasi pandemi COVID-19 dengan beradaptasi pada kebiasaan baru yang lebih sehat, lebih bersih, dan lebih taat, yang dilaksanakan oleh seluruh komponen yang ada di masyarakat serta memberdayakan semua sumber daya yang ada. Peran masyarakat untuk dapat memutus mata rantai penularan COVID-19(risiko tertular dan menularkan) harus dilakukan dengan menerapkan protokol kesehatan melalui perlindungan kesehatan individu dan perlindungan kesehatan masyarakat.\r\n\r\n1) Hal pertama yang harus dilakukan adalah setiap individu melindungi kesehatannya dari penularan covid-19. Penularan COVID-19 terjadi melalui droplet yang dapat menginfeksi manusia dengan masuknya droplet yang mengandung virus SARS-CoV-2 ke dalam tubuh melalui hidung, mulut, dan mata. Prinsip pencegahan penularan COVID-19 pada individu dilakukan dengan menghindari masuknya virus melalui ketiga pintu masuk tersebut dengan beberapa tindakan:\r\n\r\n2) Perlindungan kesehatan masyarakat merupakan upaya yang harus dilakukan oleh semua komponen yang ada di masyarakat guna mencegah dan mengendalikan penularan COVID-19. Potensi penularan COVID-19 di tempat dan fasilitas umum disebabkan adanya pergerakan, kerumunan, atau interaksi orang yang dapat menimbulkan kontak fisik.', '2021-04-16 18:07:47', 15, '2021-04-16 10:07:47', '2021-04-16 10:07:47'),
(8, 'SISPENDUK.png', 'SISPENDUK', 'Gunakan layanan dari aplikasi SISPENDUK untuk mengajukan surat - menyurat atau melakukan pengaduan dengan mudah dan cepat. SISPENDUK didesain untuk semudah mungkin, dapat digunakan oleh berbagai kalangan. mulai dari yang muda sampai yang cukup tua. dengan adanya aplikasi SISPENDUK, diharapkan dapat mempermudah masyarakat sampai pemerintahan itu sendiri. Silahkan beri kritik atau saran yang membanguin untk sistem kependudukan (SISPENDUK). SISPENDUK akan terus berkembang dan berinovasi dalam hal teknologi yang berguna bagi masyarakat.', '2021-04-16 18:16:34', 15, '2021-04-16 10:16:34', '2021-04-16 10:16:34'),
(9, 'Pengajuan Surat.png', 'Pengajuan Surat', 'Dengan adanya SISPENDUK pengajuan surat-menyurat dapat dilakukan secara online. surat akan di proses oleh verifikator kemudian diteruskan ke RT hingga di konfirmasi oleh KADES. Verifikator, RT, RW dan KADES mempunyai kewenangan untuk menolak pengajuan surat dengan berbagai syarat. Pastikan ajukan surat dengan benar dan sesuai aturan.', '2021-04-16 18:19:58', 15, '2021-04-16 10:19:58', '2021-04-16 10:19:58'),
(10, 'Pengaduan Layanan.png', 'Pengaduan Layanan', 'masyarakat dapat melakukan pengaduan layanan secara online. Aplikasi SISPENDUK sudah memfasilitasi form untuk layanan pengaduan dengan mudah. isi form terdiri dari judul pengaduan, tanggal pengaduan, detail kejadian, lokasi kejadian.\r\ndiharapkan dengan adanya sistem layanan pengaduan ini, masyarakat dapat melaporkan keresahan yang terjadi dilingkungan sekitar. kemudian untuk pengaduan akan diproses oleh RT, RW dan KADES setelah melalai proses verifikasi.', '2021-04-16 18:48:29', 15, '2021-04-16 10:48:29', '2021-04-16 10:48:29'),
(11, 'Informasi (Artikel).png', 'Informasi (Artikel)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2021-04-16 18:49:50', 15, '2021-04-16 10:49:50', '2021-04-16 10:49:50');

-- --------------------------------------------------------

--
-- Table structure for table `nik`
--

CREATE TABLE `nik` (
  `id` int(20) NOT NULL,
  `id_ktp` varchar(100) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` char(100) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` varchar(60) DEFAULT NULL,
  `status_perkawinan` enum('Kawin','Lajang','Cerai') DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') DEFAULT NULL,
  `dusun` varchar(50) DEFAULT NULL,
  `rt` int(50) DEFAULT NULL,
  `rw` int(50) DEFAULT NULL,
  `agama` enum('Islam','Protestan','Katholik','Budha','Hindu') DEFAULT NULL,
  `kk` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `kabupaten` varchar(100) DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `kewarganegaraan` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nik`
--

INSERT INTO `nik` (`id`, `id_ktp`, `nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `status_perkawinan`, `pekerjaan`, `jenis_kelamin`, `dusun`, `rt`, `rw`, `agama`, `kk`, `kecamatan`, `kelurahan`, `kabupaten`, `nama_ayah`, `nama_ibu`, `kewarganegaraan`, `created_at`, `updated_at`) VALUES
(11, '1280991008900261', 'verifikator', 'pasar baru', 'medan', '1978-11-24', 'Kawin', 'pns', 'Laki - Laki', 'cijambu', 2, 3, 'Islam', '1270050190450179', 'cijambu hilir', 'cijambu merah', 'cijambu batu', 'bapak verifikator', 'ibu verifikator', 'Indonesia', '2021-04-02 22:18:20', '2021-04-02 22:18:20'),
(12, '127000122133412121', 'rt', 'pasar baru', 'medan', '1982-06-24', 'Kawin', 'pns', 'Laki - Laki', 'cijambu', 2, 3, 'Islam', '1270050190450179', 'cijambu hilir', 'cijambu merah', 'cijambu batu', 'ayah rt', 'ibu rt', 'Indonesia', '2021-04-03 05:34:27', '2021-04-03 05:34:27'),
(13, '12569091040693756', 'rw', 'pasar baru', 'pematangsiantar', '1977-01-13', 'Kawin', 'pns', 'Laki - Laki', 'cijambu', 2, 3, 'Islam', '1270022401450179', 'cijambu hilir', 'cijambu merah', 'cijambu batu', 'ayah rw', 'ibu rw', 'Indonesia', '2021-04-03 05:35:48', '2021-04-03 05:35:48'),
(14, '12700110689012259', 'kades', 'pasar baru', 'pematangsiantar', '1980-06-25', 'Kawin', 'pns', 'Laki - Laki', 'cijambu', 2, 3, 'Islam', '1270162401450179', 'cijambu hilir', 'cijambu merah', 'cijambu batu', 'ayah kades', 'ibu kades', 'Indonesia', '2021-04-03 05:37:38', '2021-04-03 05:37:38'),
(15, '127080112233412121', 'admin', 'pasar baru', 'pematangsiantar', '1996-02-05', 'Lajang', 'Wiraswasta', 'Laki - Laki', 'cijambu', 2, 3, 'Islam', '1270822401450179', 'cijambu hilir', 'cijambu merah', 'cijambu batu', 'ayah admin', 'ibu admin', 'Indonesia', '2021-04-03 20:13:18', '2021-04-03 20:13:18'),
(18, '6305112345543212', 'rizki', 'Jl. rahayu meranti griya 2', 'kotabaru', '1996-04-16', 'Lajang', 'Freelancer', 'Laki - Laki', 'banjaran', 4, 1, 'Islam', '6305112345543123', 'banjarbaru', 'mentaos', 'banjarbaru', 'bambang', 'siti', 'indonesia', '2021-04-16 08:35:10', '2021-04-16 08:35:10');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `jenis` varchar(40) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `pesan` varchar(200) DEFAULT NULL,
  `flag` enum('Masyarakat','Verifikator','RT','RW','Kades') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `jenis`, `jumlah`, `pesan`, `flag`, `created_at`, `updated_at`) VALUES
(1, 'akun', 0, 'User perlu diverifikasi', 'Verifikator', NULL, '2021-04-16 08:35:36'),
(2, 'Pengaduan', 0, 'Pengaduan membutuhkan penanganan', 'Verifikator', NULL, '2021-04-16 10:03:36'),
(3, 'Pengaduan', 0, 'Pengaduan membutuhkan penanganan', 'RT', NULL, '2021-04-16 10:04:28'),
(4, 'Pengaduan', 0, 'Pengaduan membutuhkan penanganan', 'RW', NULL, '2021-04-16 10:04:55'),
(5, 'Pengaduan', 0, 'Pengaduan membutuhkan penanganan', 'Kades', NULL, '2021-04-16 10:05:15'),
(6, 'Pengajuan', 0, 'Pengajuan membutuhkan verifikasi', 'Verifikator', NULL, '2021-04-16 09:58:49'),
(7, 'Pengajuan', 0, 'Pengajuan membutuhkan verifikasi', 'RT', NULL, '2021-04-16 09:59:00'),
(8, 'Pengajuan', 0, 'Pengajuan membutuhkan verifikasi', 'RW', NULL, '2021-04-16 09:59:13'),
(9, 'Pengajuan', 0, 'Pengajuan membutuhkan verifikasi', 'Kades', NULL, '2021-04-16 09:59:25'),
(10, 'Pengajuan', 2, 'Surat yang diajukan sudah dapat di download', 'Masyarakat', NULL, '2021-04-16 09:59:25'),
(11, 'Pengaduan', 2, 'Pengaduan telah di tangani', 'Masyarakat', NULL, '2021-04-16 10:05:15');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(30) NOT NULL,
  `judul_pengaduan` varchar(100) DEFAULT NULL,
  `detail_pengaduan` char(255) DEFAULT NULL,
  `lokasi_kejadian` varchar(100) DEFAULT NULL,
  `status` enum('open','close','valid','invalid') DEFAULT NULL,
  `remark` char(255) DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `user_level_id` int(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `judul_pengaduan`, `detail_pengaduan`, `lokasi_kejadian`, `status`, `remark`, `user_id`, `created_date`, `user_level_id`, `created_at`, `updated_at`) VALUES
(1, 'Laporan Pungutan Liar', 'sering terjadi pungutan liar, oleh oknum yang mengatasnamakan dari pohak kedinasan.', 'sekitar pasar gede', 'close', 'segera ditindaklanjuti', 18, '2021-04-16 11:00:00', 2, '2021-04-16 10:00:59', '2021-04-16 10:05:15'),
(2, 'Laporan Banjir', 'Telah terjadi banjir, di sekitar jalan pramuka no 15. banyak warga sekitar yang membutuhkan bantuan dari dinas setempat.', 'desa melati', 'close', 'Tim dari RT siap turun kelapangan', 18, '2021-04-16 11:03:00', 5, '2021-04-16 10:03:16', '2021-04-16 10:04:23');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(50) NOT NULL,
  `jenis_surat` enum('surat_pembuatan_ektp','surat_pembuatan_skck','surat_pembuatan_kartu_keluarga','surat_keterangan_tinggal_sementara','surat_keterangan_masuk_penduduk','surat_keterangan_pindah_penduduk','surat_keterangan_kelahiran','surat_keterangan_kematian','surat_permohonan_akta_kelahiran','surat_permohonan_akta_kematian') DEFAULT NULL,
  `kebutuhan` char(200) DEFAULT NULL,
  `Lampiran_1` varchar(60) DEFAULT NULL,
  `Lampiran_2` varchar(60) DEFAULT NULL,
  `Lampiran_3` varchar(60) DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `current_wp` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `jenis_surat`, `kebutuhan`, `Lampiran_1`, `Lampiran_2`, `Lampiran_3`, `user_id`, `created_date`, `current_wp`, `created_at`, `updated_at`) VALUES
(1, 'surat_keterangan', 'daftar sekolah', '18ktp.png', '18kk.png', '18foto3x4.png', 18, '2021-04-16 16:47:47', 5, '2021-04-16 08:47:47', '2021-04-16 09:03:35'),
(2, 'surat_keterangan_domisili', 'daftar sekolah', '18ktp.png', '18kk.png', '18foto3x4.png', 18, '2021-04-16 17:24:51', 6, '2021-04-16 09:24:51', '2021-04-16 09:25:27'),
(3, 'surat_keterangan_domisili', 'daftar sekolah', '18ktp.png', '18kk.png', '18foto3x4.png', 18, '2021-04-16 17:42:51', 5, '2021-04-16 09:42:51', '2021-04-16 09:46:31'),
(4, 'surat_keterangan_usaha', 'untuk pengajuan usaha roti (home production)', '18ktp.png', '18kk.png', '18foto3x4.png', 18, '2021-04-16 17:48:00', 5, '2021-04-16 09:48:00', '2021-04-16 09:50:25'),
(5, 'surat_keterangan_berkelakuan_baik', 'daftar UKM kuliah', '18ktp.png', '18kk.png', '18foto3x4.png', 18, '2021-04-16 17:55:14', 5, '2021-04-16 09:55:14', '2021-04-16 09:57:15'),
(6, 'surat_pengantar_skck', 'kebutuhan pendaftaran kerja', '18ktp.png', '18kk.png', '18foto3x4.png', 18, '2021-04-16 17:57:51', 5, '2021-04-16 09:57:51', '2021-04-16 09:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `transworkflow`
--

CREATE TABLE `transworkflow` (
  `id` int(50) NOT NULL,
  `pengajuan_id` int(50) DEFAULT NULL,
  `wf_reference_id` int(50) DEFAULT 1,
  `approved_by` int(50) DEFAULT NULL,
  `history` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transworkflow`
--

INSERT INTO `transworkflow` (`id`, `pengajuan_id`, `wf_reference_id`, `approved_by`, `history`, `created_at`, `updated_at`) VALUES
(1, 1, 5, NULL, '[\"Surat Diajukan\",\"16\\/04\\/2021  16:47:47\",\"Surat Telah diteruskan Verifikator\",\"16\\/04\\/2021  16:48:54\",\"Surat Telah disetujui RT\",\"16\\/04\\/2021  16:58:32\",\"Surat Telah disetujui RW\",\"16\\/04\\/2021  16:59:00\",\"Surat Telah Selesai Proses\",\"16\\/04\\/2021  17:03:35\"]', '2021-04-16 08:47:47', '2021-04-16 09:03:35'),
(2, 2, 6, NULL, '[\"Surat Diajukan\",\"16\\/04\\/2021  17:24:51\",\"Surat di Tolak Verifikator\",\"16\\/04\\/2021  17:25:27\"]', '2021-04-16 09:24:51', '2021-04-16 09:25:27'),
(3, 3, 5, NULL, '[\"Surat Diajukan\",\"16\\/04\\/2021  17:42:51\",\"Surat Telah diteruskan Verifikator\",\"16\\/04\\/2021  17:44:18\",\"Surat Telah disetujui RT\",\"16\\/04\\/2021  17:45:37\",\"Surat Telah disetujui RW\",\"16\\/04\\/2021  17:46:15\",\"Surat Telah Selesai Proses\",\"16\\/04\\/2021  17:46:31\"]', '2021-04-16 09:42:51', '2021-04-16 09:46:31'),
(4, 4, 5, NULL, '[\"Surat Diajukan\",\"16\\/04\\/2021  17:48:00\",\"Surat Telah diteruskan Verifikator\",\"16\\/04\\/2021  17:48:14\",\"Surat Telah disetujui RT\",\"16\\/04\\/2021  17:48:26\",\"Surat Telah disetujui RW\",\"16\\/04\\/2021  17:50:03\",\"Surat Telah Selesai Proses\",\"16\\/04\\/2021  17:50:24\"]', '2021-04-16 09:48:00', '2021-04-16 09:50:24'),
(5, 5, 5, NULL, '[\"Surat Diajukan\",\"16\\/04\\/2021  17:55:14\",\"Surat Telah diteruskan Verifikator\",\"16\\/04\\/2021  17:55:29\",\"Surat Telah disetujui RT\",\"16\\/04\\/2021  17:56:16\",\"Surat Telah disetujui RW\",\"16\\/04\\/2021  17:56:33\",\"Surat Telah Selesai Proses\",\"16\\/04\\/2021  17:57:15\"]', '2021-04-16 09:55:14', '2021-04-16 09:57:15'),
(6, 6, 5, NULL, '[\"Surat Diajukan\",\"16\\/04\\/2021  17:57:51\",\"Surat Telah diteruskan Verifikator\",\"16\\/04\\/2021  17:58:49\",\"Surat Telah disetujui RT\",\"16\\/04\\/2021  17:59:00\",\"Surat Telah disetujui RW\",\"16\\/04\\/2021  17:59:13\",\"Surat Telah Selesai Proses\",\"16\\/04\\/2021  17:59:25\"]', '2021-04-16 09:57:51', '2021-04-16 09:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `nik_id` int(11) DEFAULT NULL,
  `user_level_id` int(50) DEFAULT 1,
  `status` varchar(50) DEFAULT 'Nonactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `phone`, `nik_id`, `user_level_id`, `status`, `created_at`, `updated_at`) VALUES
(11, 'verifikator', '$2y$10$Y/QaKkUZTjHrzOqlP8TFlOA8UhOpX/0sNZjJhbmd4smQdxljx1UBK', 'verifikator@gmail.com', '082116528501', 11, 4, 'Active', '2021-04-02 22:18:21', '2021-04-02 22:18:21'),
(12, 'rt', '$2y$10$ke8KCgkOme0N.DGejXs.a.mhZQvNHjwieoOGJtffR9ZUMKy.oiuQW', 'rt@gmail.com', '082116528502', 12, 5, 'Active', '2021-04-03 05:34:27', '2021-04-03 05:42:01'),
(13, 'rw', '$2y$10$1BkbR4vxkdkDj.gcCjbAE.A9rp4DLhD93wclxD55IqglFeWuvQW9e', 'rw@gmail.com', '082216528509', 13, 6, 'Active', '2021-04-03 05:35:49', '2021-04-03 05:42:04'),
(14, 'kades', '$2y$10$w3THsQrgtspQWYp9gMq9JetUvh59kQ2hv/oVF/ycupZ8zHxApDkP.', 'kades@gmail.com', '082116511701', 14, 2, 'Active', '2021-04-03 05:37:38', '2021-04-03 05:42:07'),
(15, 'admin', '$2y$10$IUAdtlLvtKR6c/4JAzS97uynhY0UNGPvJ0TY/NY640ihgq0nDXSvC', 'admin@gmail.com', '082216528506', 15, 3, 'Active', '2021-04-03 20:13:18', '2021-04-03 20:13:44'),
(18, 'rizki', '$2y$10$Y3p0CMc/CEvTwH6Ih4m7K.7587xShbBwpzBrZ23b.zwsCKYInuiYO', 'rizki@mail.com', '082214457747', 18, 1, 'Active', '2021-04-16 08:35:10', '2021-04-16 08:35:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id` int(50) NOT NULL,
  `user_level_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id`, `user_level_name`) VALUES
(1, 'Masyarakat'),
(2, 'Kepala Desa'),
(3, 'Admin'),
(4, 'Verifikator'),
(5, 'Ketua RT'),
(6, 'Ketua RW');

-- --------------------------------------------------------

--
-- Table structure for table `wf_reference`
--

CREATE TABLE `wf_reference` (
  `id` int(50) NOT NULL,
  `wp_name` varchar(100) DEFAULT NULL,
  `wp_next` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wf_reference`
--

INSERT INTO `wf_reference` (`id`, `wp_name`, `wp_next`, `status`) VALUES
(1, 'Surat Diajukan', 'Waiting Approval from verifikator', 'On Progress'),
(2, 'Surat Telah diteruskan Verifikator', 'Waiting Approval from RT', 'On Progress'),
(3, 'Surat Telah disetujui RT', 'Waiting Approval from RW', 'On Progress'),
(4, 'Surat Telah disetujui RW', 'Waiting Approval from Kades', 'On Progress'),
(5, 'Surat Telah Selesai di proses', NULL, 'Success'),
(6, 'Surat Di Tolak', NULL, 'Reject');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `nik`
--
ALTER TABLE `nik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_ktp` (`id_ktp`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `user` (`user_id`),
  ADD KEY `closed_by` (`user_level_id`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`user_id`);

--
-- Indexes for table `transworkflow`
--
ALTER TABLE `transworkflow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `approved_by` (`approved_by`),
  ADD KEY `id_surat` (`pengajuan_id`),
  ADD KEY `wf_reference_id` (`wf_reference_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik_id` (`nik_id`),
  ADD KEY `user_level_id` (`user_level_id`),
  ADD KEY `nik` (`nik_id`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wf_reference`
--
ALTER TABLE `wf_reference`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nik`
--
ALTER TABLE `nik`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transworkflow`
--
ALTER TABLE `transworkflow`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wf_reference`
--
ALTER TABLE `wf_reference`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengaduan_ibfk_2` FOREIGN KEY (`user_level_id`) REFERENCES `user_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transworkflow`
--
ALTER TABLE `transworkflow`
  ADD CONSTRAINT `transworkflow_ibfk_4` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transworkflow_ibfk_5` FOREIGN KEY (`approved_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transworkflow_ibfk_6` FOREIGN KEY (`wf_reference_id`) REFERENCES `wf_reference` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`user_level_id`) REFERENCES `user_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`nik_id`) REFERENCES `nik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
