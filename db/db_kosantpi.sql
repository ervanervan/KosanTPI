-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2022 at 03:23 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kosantpi`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `price` float NOT NULL,
  `img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `fasilitas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `desc`, `price`, `img`, `date_added`, `fasilitas`) VALUES
(1, 'Sulthan Kos', 'Gg. Ababil, Batu 8 atas, Samping Hotel Ck. Kec. Tanjungpinang Tim., Kota Tanjung Pinang, Kepulauan Riau 29124', 600000, 'Foto kos 1.jpg', '2022-12-01 17:55:22', 'Tempat tidur + bantal, Kamar mandi dalam,Free WiFi, Listrik token, Lemari baju, Full keramik.'),
(2, 'Kos Artha', 'Jl. Lembah purnama, lr. Selayar 3 no:1 dekat Ramayana.', 1100000, 'Foto kos 5.jpeg', '2022-12-01 18:52:49', 'AC, TV kabel, Lemari, Kulkas, Kasur, Kamar mandi dalam, Bisa tanpa AC pake kipas angin, Free wifi.'),
(3, 'Kosn kuantan', 'Batu 5 atas jalan kuantan Gg.rukun tepat disebelah SMP N 2.', 300000, 'Foto kos 4.jpeg', '2022-12-20 18:54:02', 'Kamar full keramik, Lemari, Kasur, Kipas, Termasuk listrik dan air.'),
(4, 'Kos As\'Sidiq', 'Dekat Mall TCC (matahari).', 500000, '', '2022-12-20 19:05:31', 'Full keramik, Kamar mandi dalam, Tempat tidur,  Lemari Saluran TV kabel, Parkiran Luas, Air bersih lancar( Tinggal Buka Keran), Listrik sendiri, Lingkungan aman (ada penjaga).'),
(514, 'Kos kosan Aini ', 'Jl. Lama tg.pinang - uban Km.10 sebelum ganet', 550000, 'Foto kos 3.jpeg', '2022-12-20 19:09:39', 'Full keramik, Kamar mandi dalam, AC / non AC, Parkiran luas, Kamar luas 21m persegi, Listrik token, Air bersih, free 24jam CCTV Aman & nyaman.'),
(515, 'Kosan Bahagia', 'Samping Pinang Lestari Batu 10', 500000, 'background.jpg', '2022-12-20 19:12:25', 'Lumayan Lengkap'),
(516, 'Pinang Kos', 'Daerah sekitaran Taman Batu 10', 400000, 'bedroom-bg 3.jpg', '2022-12-20 19:14:36', 'Tempat tidur, bantal dan fasilitas lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'kosan1', 'kosantpi@gmail.com', '545942d7a477f60ba3c8a0c51a7d6ebc', 'admin'),
(2, 'kosan2', 'kosantpi@gmail.com', 'e0f47a0ee5d1f8be72dfb709d0af22f9', 'admin'),
(4, 'pemilikkos123', 'pemilikkos1@gmail.com', '49618d2c7eff5224aa0483ffd36ec340', 'pemilikkos'),
(5, 'user1', 'user1@gmail.com', '24c9e15e52afc47c225b757e7bee1f9d', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=517;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
