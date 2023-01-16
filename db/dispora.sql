-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2023 at 03:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dispora`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_event`
--

CREATE TABLE `detail_event` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` enum('Pemuda','Olahraga') NOT NULL,
  `jenjang` enum('Umum','Khusus') NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_event`
--

INSERT INTO `detail_event` (`id`, `nama`, `jenis`, `jenjang`, `lokasi`, `tanggal`, `deskripsi`, `cover`, `aktif`) VALUES
(1, 'Basketball', 'Pemuda', 'Umum', 'Banjarbaru', '2023-01-18', 'anu', '33671-logo-popnas-text.png', 0),
(6, 'Hari Jadi Banjarmasin', 'Olahraga', 'Umum', 'assada', '2023-01-19', 'asdasd', '19453-event4.jpg', 0),
(10, 'Lari Marathon', 'Pemuda', 'Khusus', 'Banjarmasin', '2023-01-02', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '83445-129745.jpg', 1),
(11, 'Liburland', 'Olahraga', 'Umum', 'Banjarmasin', '2023-01-26', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &#34;de Finibus Bonorum et Malorum&#34; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &#34;Lorem ipsum dolor sit amet..&#34;, comes from a line in section 1.10.32.', '25300-event3.jpg', 1),
(12, 'Happy New Years', 'Pemuda', 'Khusus', 'Sungai Martapura, Taman Siring 0 Km Banjarmasin', '2023-01-01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, \r\n\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '39161-event2.jpg', 0),
(13, 'Festival Valentine', 'Pemuda', 'Umum', 'Kandangan', '2023-01-03', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '39646-495521.jpg', 1),
(14, 'Jalan Santuy', 'Olahraga', 'Umum', 'Banjarmasin', '2023-01-14', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Odio euismod lacinia at quis risus sed vulputate odio. Pulvinar proin gravida hendrerit lectus. Condimentum mattis pellentesque id nibh. Luctus venenatis lectus magna fringilla urna porttitor rhoncus dolor purus. Massa tempor nec feugiat nisl pretium fusce id velit ut. Purus viverra accumsan in nisl nisi scelerisque eu ultrices. Velit egestas dui id ornare arcu. Vivamus arcu felis bibendum ut tristique et egestas quis. Et egestas quis ipsum suspendisse. Pellentesque elit eget gravida cum sociis. Porta non pulvinar neque laoreet suspendisse interdum consectetur libero. Scelerisque fermentum dui faucibus in ornare quam. Quis blandit turpis cursus in hac. Mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan. Maecenas volutpat blandit aliquam etiam erat velit scelerisque. Faucibus scelerisque eleifend donec pretium vulputate sapien nec sagittis. Mi ipsum faucibus vitae aliquet nec ullamcorper.\r\n\r\nSed felis eget velit aliquet sagittis id consectetur purus ut. A erat nam at lectus urna duis convallis convallis tellus. Felis donec et odio pellentesque diam volutpat commodo. Enim neque volutpat ac tincidunt vitae semper quis. Aliquam sem fringilla ut morbi tincidunt. At imperdiet dui accumsan sit amet nulla facilisi morbi tempus. Lacus sed turpis tincidunt id aliquet. Sagittis orci a scelerisque purus semper eget duis at. At in tellus integer feugiat scelerisque varius morbi enim nunc. Tortor aliquam nulla facilisi cras. Augue neque gravida in fermentum. A condimentum vitae sapien pellentesque habitant. Blandit cursus risus at ultrices. Eu ultrices vitae auctor eu augue ut lectus arcu bibendum. Vel pretium lectus quam id leo in vitae turpis massa. Commodo nulla facilisi nullam vehicula ipsum. Neque aliquam vestibulum morbi blandit cursus risus. Condimentum mattis pellentesque id nibh tortor id.\r\n\r\nEuismod lacinia at quis risus sed vulputate odio. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Non pulvinar neque laoreet suspendisse interdum consectetur libero id. Dolor sit amet consectetur adipiscing elit ut aliquam. At consectetur lorem donec massa sapien faucibus et. Ut ornare lectus sit amet est placerat. Habitasse platea dictumst quisque sagittis purus sit amet. Nisi quis eleifend quam adipiscing vitae proin sagittis nisl rhoncus. Nulla pellentesque dignissim enim sit amet. Amet mattis vulputate enim nulla aliquet. Neque laoreet suspendisse interdum consectetur libero id faucibus. Orci eu lobortis elementum nibh.\r\n\r\nDiam phasellus vestibulum lorem sed risus. Enim sit amet venenatis urna cursus eget nunc scelerisque. Suspendisse faucibus interdum posuere lorem ipsum dolor sit amet consectetur. Et sollicitudin ac orci phasellus. Urna et pharetra pharetra massa. Sit amet luctus venenatis lectus. Morbi tempus iaculis urna id volutpat lacus laoreet non curabitur. Sit amet facilisis magna etiam tempor orci. Adipiscing enim eu turpis egestas. Quis viverra nibh cras pulvinar mattis nunc sed. Faucibus interdum posuere lorem ipsum. Sit amet venenatis urna cursus.\r\n\r\nLectus magna fringilla urna porttitor rhoncus dolor purus non enim. Vitae tempus quam pellentesque nec. Eros donec ac odio tempor. Lectus urna duis convallis convallis tellus. Pellentesque elit ullamcorper dignissim cras tincidunt lobortis. Tristique senectus et netus et malesuada fames. Donec et odio pellentesque diam volutpat commodo sed egestas egestas. Nascetur ridiculus mus mauris vitae ultricies. Id venenatis a condimentum vitae sapien pellentesque habitant morbi. Enim blandit volutpat maecenas volutpat blandit aliquam etiam erat. Ac odio tempor orci dapibus ultrices in iaculis nunc. Et netus et malesuada fames ac turpis egestas. Egestas tellus rutrum tellus pellentesque eu tincidunt tortor.', '23801-event2.jpg', 1),
(15, 'Lari Santuy Cuy', 'Pemuda', 'Umum', 'Pelaihari', '2023-01-22', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id volutpat lacus laoreet non curabitur. Dolor sit amet consectetur adipiscing elit duis tristique sollicitudin nibh. Felis bibendum ut tristique et. Mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan tortor. Donec enim diam vulputate ut pharetra sit amet aliquam id. Cursus euismod quis viverra nibh cras. Et tortor at risus viverra. Venenatis tellus in metus vulputate eu scelerisque felis imperdiet proin. Pellentesque eu tincidunt tortor aliquam nulla facilisi. Enim neque volutpat ac tincidunt vitae semper quis lectus. Consequat nisl vel pretium lectus quam id. Egestas sed sed risus pretium quam. Et malesuada fames ac turpis egestas integer eget aliquet.\r\n\r\nDui sapien eget mi proin sed libero. Maecenas accumsan lacus vel facilisis. Ac orci phasellus egestas tellus rutrum. Amet consectetur adipiscing elit duis tristique. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus. Metus vulputate eu scelerisque felis imperdiet proin. Lorem ipsum dolor sit amet consectetur adipiscing. Quam id leo in vitae turpis massa. Amet massa vitae tortor condimentum lacinia quis. Dui faucibus in ornare quam. Ultrices sagittis orci a scelerisque purus. Id aliquet risus feugiat in ante metus. Blandit turpis cursus in hac habitasse platea dictumst quisque.', '91358-basketball.jpg', 1),
(16, 'Laporan Marathon', 'Olahraga', 'Umum', 'Banjarbaru', '2023-01-27', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi tristique senectus et netus et malesuada fames ac. Amet mattis vulputate enim nulla. Mi sit amet mauris commodo quis imperdiet massa tincidunt. Convallis posuere morbi leo urna molestie at elementum eu facilisis. Nullam ac tortor vitae purus faucibus ornare. Volutpat diam ut venenatis tellus in. Nascetur ridiculus mus mauris vitae ultricies. Pretium viverra suspendisse potenti nullam ac tortor vitae purus. Cursus vitae congue mauris rhoncus aenean vel. Amet mattis vulputate enim nulla aliquet porttitor lacus. Cursus sit amet dictum sit amet justo donec. Amet dictum sit amet justo donec enim. Aliquet lectus proin nibh nisl condimentum id venenatis a. Ipsum a arcu cursus vitae congue. Elementum integer enim neque volutpat ac tincidunt vitae. Urna neque viverra justo nec. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non. Nulla malesuada pellentesque elit eget gravida. Facilisis leo vel fringilla est ullamcorper eget nulla.\r\n\r\nImperdiet proin fermentum leo vel. Lobortis scelerisque fermentum dui faucibus in. Cras tincidunt lobortis feugiat vivamus at. Semper eget duis at tellus at urna condimentum mattis pellentesque. Sit amet nisl suscipit adipiscing bibendum est ultricies integer quis. Volutpat est velit egestas dui id ornare arcu odio. Sit amet purus gravida quis blandit turpis cursus in. Cras adipiscing enim eu turpis egestas pretium. Dui nunc mattis enim ut tellus. Nulla porttitor massa id neque aliquam. Faucibus purus in massa tempor. Tempus imperdiet nulla malesuada pellentesque. Donec ultrices tincidunt arcu non sodales neque sodales. In massa tempor nec feugiat nisl pretium fusce.', '65988-basketball.jpg', 0),
(17, 'TES', 'Olahraga', 'Khusus', 'tes', '2023-01-28', 'lorem lorem lroemr elro lorem lorem lroemr elrolorem lorem lroemr elrolorem lorem lroemr elrolorem lorem lroemr elrolorem lorem lroemr elrolorem lorem lroemr elro\r\nlorem lorem lroemr elrolorem lorem lroemr elrolorem lorem lroemr elrolorem lorem lroemr elrolorem lorem lroemr elrolorem lorem lroemr elro\r\nlorem lorem lroemr elrolorem lorem lroemr elrolorem lorem lroemr elro\r\n\r\n\r\nlorem lorem lroemr elrolorem lorem lroemr elrolorem lorem lroemr elrolorem lorem lroemr elro\r\nlorem lorem lroemr elrolorem lorem lroemr elro\r\nlorem lorem lroemr elro', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `form_daftardelegasi`
--

CREATE TABLE `form_daftardelegasi` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `asal_daerah` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_ktp` text DEFAULT NULL,
  `alamat_dom` text DEFAULT NULL,
  `pendidikan` varchar(255) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `no_hp` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `upload_identitas` varchar(255) DEFAULT NULL,
  `berkas_syarat` varchar(255) DEFAULT NULL,
  `waktu_daftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form_daftardelegasi`
--

INSERT INTO `form_daftardelegasi` (`id`, `id_pegawai`, `id_event`, `asal_daerah`, `nama`, `nik`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat_ktp`, `alamat_dom`, `pendidikan`, `pekerjaan`, `no_hp`, `email`, `upload_identitas`, `berkas_syarat`, `waktu_daftar`) VALUES
(1, 2, 10, 'Hulu Sungai Utara', 'Ezra Garendra', '63081246123', 'Laki-laki', 'Amuntai', '2001-01-27', 'Banjarbaru', 'Banjarbaru', 'Sarjana', 'Data Analyst', '1044070', 'kyzeluci@gmail.com', '13958-63081246123.docx', '27973-63081246123.pdf', '2023-01-15 16:33:01');

-- --------------------------------------------------------

--
-- Table structure for table `form_pendaftaran`
--

CREATE TABLE `form_pendaftaran` (
  `id` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(45) NOT NULL,
  `tanggal_lahir` varchar(45) NOT NULL,
  `alamat_ktp` text NOT NULL,
  `alamat_dom` text NOT NULL,
  `pendidikan` varchar(255) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `no_hp` int(11) NOT NULL,
  `upload_identitas` varchar(255) DEFAULT NULL,
  `berkas_syarat` varchar(255) DEFAULT NULL,
  `waktu_daftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('menunggu','diterima','ditolak') NOT NULL DEFAULT 'menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form_pendaftaran`
--

INSERT INTO `form_pendaftaran` (`id`, `id_event`, `id_peserta`, `nama`, `nik`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat_ktp`, `alamat_dom`, `pendidikan`, `pekerjaan`, `no_hp`, `upload_identitas`, `berkas_syarat`, `waktu_daftar`, `status`) VALUES
(3, 14, 2, 'Melyana', '620123456789', 'Perempuan', 'Amuntai', '2022-07-18', 'Puruk Cahu', 'Banjarmasin', 'SMA', 'Pelajar', 2147483647, '34184-620123456789.pdf', '87499-620123456789.docx', '2023-01-06 04:52:49', 'menunggu'),
(4, 16, 2, 'Melyana', '620123456789', 'Perempuan', 'Amuntai', '2022-07-18', 'Puruk Cahu', 'Banjarmasin', 'SMA', 'Pelajar', 2147483647, NULL, NULL, '2023-01-08 05:18:38', 'diterima');

-- --------------------------------------------------------

--
-- Table structure for table `form_saran`
--

CREATE TABLE `form_saran` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form_saran`
--

INSERT INTO `form_saran` (`id`, `nama`, `email`, `no_hp`, `pesan`, `tanggal`) VALUES
(1, 'Affan TUH', 'afaantuh@gmail.com', '08123123124', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pretium quam vulputate dignissim suspendisse in est ante. Pharetra magna ac placerat vestibulum lectus mauris ultrices eros. Ornare suspendisse sed nisi lacus sed viverra tellus in hac. Est ante in nibh mauris cursus mattis. Nisl purus in mollis nunc sed id semper risus in. Porttitor massa id neque aliquam vestibulum morbi blandit. Odio facilisis mauris sit amet massa vitae tortor. Maecenas volutpat blandit aliquam etiam erat velit. Vitae congue mauris rhoncus aenean vel elit scelerisque mauris. Donec et odio pellentesque diam volutpat. Ut tortor pretium viverra suspendisse potenti nullam. Eu facilisis sed odio morbi quis commodo. Diam ut venenatis tellus in metus vulputate eu scelerisque felis. Vulputate enim nulla aliquet porttitor lacus luctus accumsan. Pretium vulputate sapien nec sagittis aliquam. Luctus venenatis lectus magna fringilla urna porttitor rhoncus.\r\n\r\nNon blandit massa enim nec dui nunc mattis enim. Sit amet consectetur adipiscing elit pellentesque habitant morbi tristique. Libero enim sed faucibus turpis in eu mi bibendum neque. Viverra tellus in hac habitasse. Turpis in eu mi bibendum neque. Sed felis eget velit aliquet sagittis id consectetur purus ut. Fermentum iaculis eu non diam phasellus vestibulum lorem. Scelerisque eleifend donec pretium vulputate sapien nec sagittis. Nisl nisi scelerisque eu ultrices vitae auctor eu augue ut. Urna molestie at elementum eu facilisis sed odio morbi quis. Elit ullamcorper dignissim cras tincidunt lobortis feugiat. Sem viverra aliquet eget sit amet tellus. Feugiat nibh sed pulvinar proin. Neque aliquam vestibulum morbi blandit cursus. Purus ut faucibus pulvinar elementum integer. Sollicitudin tempor id eu nisl nunc mi ipsum faucibus vitae. Et malesuada fames ac turpis egestas. Ac turpis egestas integer eget aliquet nibh praesent tristique magna. Fusce ut placerat orci nulla pellentesque dignissim enim sit.', '2023-01-04'),
(2, 'Zinal Enje', 'zeinaisd@sda.asd', '018231247124', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nibh tellus molestie nunc non blandit massa enim. Aliquet eget sit amet tellus cras adipiscing. Cras pulvinar mattis nunc sed. Euismod quis viverra nibh cras pulvinar. Habitant morbi tristique senectus et netus. Eget mi proin sed libero enim. Lorem dolor sed viverra ipsum nunc aliquet bibendum. Volutpat commodo sed egestas egestas. Imperdiet massa tincidunt nunc pulvinar sapien. Leo urna molestie at elementum eu facilisis sed. Arcu vitae elementum curabitur vitae nunc sed. Magna sit amet purus gravida quis blandit turpis. Orci eu lobortis elementum nibh tellus molestie. Et malesuada fames ac turpis egestas maecenas pharetra convallis posuere.\r\n\r\nSodales ut etiam sit amet nisl purus in mollis. Blandit turpis cursus in hac. Arcu odio ut sem nulla pharetra diam sit amet nisl. Sodales ut etiam sit amet. Elit eget gravida cum sociis. Fermentum odio eu feugiat pretium nibh. Etiam non quam lacus suspendisse faucibus interdum posuere lorem ipsum. Maecenas sed enim ut sem viverra aliquet eget sit amet. Massa sed elementum tempus egestas sed. Est pellentesque elit ullamcorper dignissim cras tincidunt. Hendrerit gravida rutrum quisque non tellus orci ac auctor augue. Eget arcu dictum varius duis at consectetur lorem donec massa. Sit amet nisl suscipit adipiscing.', '2023-01-04'),
(3, 'Roman Zidan Ramadhan', 'kyzeluci@gmail.com', '+628123123', 'sdadsada', '2023-01-05'),
(4, 'Roman Zidan Ramadhan', 'kyzeluci@gmail.com', '21381231298312', 'asdsadsad', '2023-01-05'),
(5, 'Roman Zidan Ramadhan', 'kyzeluci@gmail.com', 'asdsa', 'adsad', '2023-01-05'),
(6, 'Haji Kadap', 'kyzeluci@gmail.com', 'asdsad', 'sadsad', '2023-01-05'),
(7, 'Raja Firdaus', 'admin@admin.com', '+6281345233332', 'asdsadsadsadsad', '2023-01-05'),
(8, 'Ezra Garendraa', 'kyzeluci@gmail.com', '21381231298312', 'sadsadasdasd', '2023-01-05'),
(9, 'Ridho Azhari Ansyari', 'ridzondas@gmail.com', '1044070', 'asdsadsadsadasdsadsad', '2023-01-05'),
(10, 'yaya', 'ridzondas@gmail.com', '1044070', 'asdsadsa', '2023-01-06'),
(11, 'nana', 'asd@asd.asd', '097123', 'djslsad', '2023-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `level_user` enum('admin','panitia','pegawai','peserta') NOT NULL DEFAULT 'peserta',
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `level_user`, `nama`, `password`, `jabatan`, `foto`) VALUES
(2, 'pegawai', 'pegawai', 'Roman Zidan Ramadhan', '$2y$10$oJ94gJKzL1WkeolKBodE8OKQjMfCfPg2a7ecrRSS4y1hWve3COQs.', 'Pegawai Dinas Kota', '87076-pegawai.jpeg'),
(3, 'panitia', 'panitia', 'Panitian', '$2y$10$ife9m.Qs4U6B81ADZkrjpe.OEfo.ydOC47GKsdySgnM6qq8TgUfU.', 'Panitia Event', '99056-panitia.jpeg'),
(4, 'kyze', 'panitia', 'Kyze Luci', '$2y$10$udLhBRYLOs0no1k3HbqCseg5.ljIspzVSWuWg6Aixt00/OVtpduk2', 'Mahasiswa', '49446-kyze.jpg'),
(6, 'melyana123', 'peserta', 'Melyanaaaa', '$2y$10$UbNIMgeCSS6D7NV70OlAmu0m.ztayKF629rnVCda8/AE9eQKg3W5u', NULL, '53405-melyana123.jpg'),
(22, 'admin', 'admin', 'Admin MANTAP', '$2y$10$fSQ8DsB4FrkthIb2z6AnR.oheVjqmkGBTbDz9gj8HVPevAGtm6gbW', 'ADMIN KODING', '72511-admin.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_peserta`
--

CREATE TABLE `user_peserta` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_ktp` text NOT NULL,
  `alamat_dom` text NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_peserta`
--

INSERT INTO `user_peserta` (`id`, `id_user`, `nama`, `nik`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat_ktp`, `alamat_dom`, `pendidikan`, `pekerjaan`, `no_hp`, `foto`, `created_at`) VALUES
(2, 6, 'Melyanaaaa', '620123456789', 'Perempuan', 'Amuntai', '2000-10-12', 'Puruk Cahu', 'Banjarmasin', 'SMA', 'Pelajar', '0821212199', '53405-melyana123.jpg', '2023-01-15 15:47:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_event`
--
ALTER TABLE `detail_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_daftardelegasi`
--
ALTER TABLE `form_daftardelegasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_pegawai`),
  ADD KEY `id_event` (`id_event`);

--
-- Indexes for table `form_pendaftaran`
--
ALTER TABLE `form_pendaftaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_event` (`id_event`),
  ADD KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `form_saran`
--
ALTER TABLE `form_saran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_peserta`
--
ALTER TABLE `user_peserta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_event`
--
ALTER TABLE `detail_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `form_daftardelegasi`
--
ALTER TABLE `form_daftardelegasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form_pendaftaran`
--
ALTER TABLE `form_pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `form_saran`
--
ALTER TABLE `form_saran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_peserta`
--
ALTER TABLE `user_peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `form_daftardelegasi`
--
ALTER TABLE `form_daftardelegasi`
  ADD CONSTRAINT `form_daftardelegasi_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `detail_event` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_daftardelegasi_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `users` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `form_pendaftaran`
--
ALTER TABLE `form_pendaftaran`
  ADD CONSTRAINT `form_pendaftaran_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `detail_event` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `form_pendaftaran_ibfk_2` FOREIGN KEY (`id_peserta`) REFERENCES `user_peserta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_peserta`
--
ALTER TABLE `user_peserta`
  ADD CONSTRAINT `user_peserta_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
