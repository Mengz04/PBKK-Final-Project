-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 04:12 AM
-- Server version: 8.0.32
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_bsms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movie_code` int NOT NULL,
  `movie_title` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `year` int NOT NULL,
  `genre_code` int NOT NULL,
  `price` int NOT NULL,
  `movie_img` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `director` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `seat` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movie_code`, `movie_title`, `year`, `genre_code`, `price`, `movie_img`, `publisher`, `director`, `seat`) VALUES
(2, 'Si Kancil', 2018, 2, 450, 'book2.jpg', 'Publisher 2', 'Author 2 et. al.', 9),
(3, 'Narnia', 2020, 3, 750, 'book3.jpg', 'Publisher 3', 'Author 3 et. al.', 10),
(7, 'A Million to One', 2021, 3, 10, 'download.jpeg', 'Brains Publishing', 'Rafi Sutrisno', 50),
(8, 'Spring Book', 2006, 1, 50, 'preview-page0.jpg', 'Brains Publishing', 'Rafi Sutrisno', 17),
(9, 'Obama', 2010, 1, 20, 'plbo1.jpg', 'Obama mid name', 'Obama himself', 37),
(10, 'The Hobbit', 2006, 3, 10, 'thbbook1.jpg', 'Muhammad Rafi', 'Insan Fillah', 30),
(11, 'Invisible Man', 2015, 4, 15, 'invim1.jpg', 'Muhammad Rafi', 'Insan Fillah', 25),
(12, 'IT', 2005, 4, 40, 'image1.jpg', 'Brains Publishing', 'Rafi Sutrisno', 17),
(13, 'Dark Forest', 2014, 4, 12, 'image_2023-11-25_053613959.png', 'Brains Publishing', 'Rafi Sutrisno', 24),
(14, 'The Ritual', 2001, 4, 16, 'image_2023-11-25_053732581.png', 'Brains Publishing', 'Rafi Insan', 17),
(15, 'From Grave with Love', 2016, 4, 24, 'image_2023-11-25_053836880.png', 'Brains Publishing', 'Rafi Sutrisno', 38),
(16, 'Belajar Berhitung', 2017, 1, 5, 'image_2023-11-25_053929559.png', 'Muhammad Rafi', 'Insan Fillah', 20),
(17, 'Belajar Membaca', 2017, 1, 5, 'image_2023-11-25_054002893.png', 'Muhammad Rafi', 'Insan Fillah', 14),
(18, 'Magic Tree House', 2008, 2, 15, 'image_2023-11-25_054050955.png', 'Brains Publishing', 'Ahda Filza G', 20),
(19, 'Moby Dick', 1999, 2, 15, 'image_2023-11-25_054217785.png', 'Brains Publishing', 'Ahda Filza G', 24),
(20, 'Legenda Timun Mas', 2005, 2, 10, 'image_2023-11-25_054336935.png', 'Brains Publishing', 'Ahda Filza G', 40),
(21, 'Legenda Tangkuban Perahu', 2006, 2, 15, 'image_2023-11-25_054420281.png', 'Brains Publishing', 'Ahda Filza G', 40),
(22, 'Harry Potter', 1998, 3, 25, 'image_2023-11-25_054546686.png', 'Obama mid name', 'JK Rowling', 30),
(23, 'The Tempest', 2000, 3, 30, 'image_2023-11-25_054702129.png', 'Brains Publishing', 'Insan Fillah', 30);

-- --------------------------------------------------------

--
-- Table structure for table `movie_genre`
--

CREATE TABLE `movie_genre` (
  `genre_code` int NOT NULL,
  `genre_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_genre`
--

INSERT INTO `movie_genre` (`genre_code`, `genre_name`) VALUES
(1, 'Educational'),
(2, 'Fiction'),
(3, 'Fantasy'),
(4, 'Horror'),
(5, 'Mistery');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_code` int NOT NULL,
  `user_code` int NOT NULL,
  `buyer_name` varchar(100) NOT NULL,
  `total` int NOT NULL,
  `tgl` date NOT NULL,
  `moviename` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `movie_qty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_code`, `user_code`, `buyer_name`, `total`, `tgl`, `moviename`, `movie_qty`) VALUES
(1, 1, 'Customer 101', 450, '2022-10-11', 'Sample Book 102', 1),
(2, 2, 'Meng', 350, '2023-11-24', 'Sample Book 101', 1),
(3, 2, 'Meng', 350, '2023-11-24', 'Sample Book 101', 1),
(4, 3, 'Filza', 370, '2023-11-24', 'Obama', 1),
(5, 1, 'Sutrisno', 400, '2023-11-25', 'Spring Book', 1),
(6, 1, 'Meng', 70, '2023-12-12', 'Obama', 1),
(7, 1, 'Meng', 70, '2023-12-12', 'Obama', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `transaction_code` int NOT NULL,
  `movie_code` int NOT NULL,
  `amount` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_detail`
--

INSERT INTO `transaction_detail` (`transaction_code`, `movie_code`, `amount`) VALUES
(1, 2, 1),
(4, 9, 1),
(5, 8, 1),
(7, 8, 1),
(7, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_code` int NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_code`, `fullname`, `username`, `password`, `level`) VALUES
(1, 'Administrator', 'admin', '8d804a5c53b69a7342c5c3c7ddc5364d', 'admin'),
(2, 'Nurhadi', 'Nurhadi', '56fafa8964024efa410773781a5f9e93', 'Customer'),
(3, 'Abdel Temon', 'Abdel', 'c7162ff89c647f444fcaa5c635dac8c3', 'admin'),
(5, 'Muhammad Rafi Insan Fillah', 'meng', '48e1db4436ce19b0141b0369ae05bf6b', 'Customer'),
(6, 'Ahda Filza Ghaffaru', 'Filza', '2d1fbf027f9d2f838d3430b74ac05c04', 'Customer'),
(7, 'Muhammad Rafi Sutrisno', 'Sutrisno', '8bd497d8ae116b6e8f2dc6dccfc37b5c', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_code`),
  ADD KEY `kode_kategori` (`genre_code`);

--
-- Indexes for table `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD PRIMARY KEY (`genre_code`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_code`),
  ADD KEY `kode_user` (`user_code`);

--
-- Indexes for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD KEY `kode_transaksi` (`transaction_code`),
  ADD KEY `kode_buku` (`movie_code`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_code` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `movie_genre`
--
ALTER TABLE `movie_genre`
  MODIFY `genre_code` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_code` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_code` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`genre_code`) REFERENCES `movie_genre` (`genre_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`user_code`) REFERENCES `user` (`user_code`);

--
-- Constraints for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD CONSTRAINT `transaction_detail_ibfk_1` FOREIGN KEY (`transaction_code`) REFERENCES `transaction` (`transaction_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_detail_ibfk_2` FOREIGN KEY (`movie_code`) REFERENCES `movie` (`movie_code`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
