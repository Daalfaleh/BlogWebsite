-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2021 at 12:28 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schosyal_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `date_published` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `date_published`) VALUES
(1, 'Proof of Work (POW)', 'Proof of work is the consensus algorithm used in major blockchains. Bitcoin blockchain uses the POW algorithm. In POW, the miners calculate a complex mathematical puzzle, called the NONCE. The calculated nonce should be less than the previous nonce value present in the blockchain. POW requires significant computational resources. The computational resource for POW in the Bitcoin blockchain network is equivalent to the power requirement by Switzerland.', '2021-12-13'),
(2, 'Proof Of Stake', 'POS uses a different approach compared to POW. The miner commits the currency ( stake) he has to the blockchain network to get an opportunity to mine. A chosen random miner with a stake validates the block transaction. If a miner cannot commit to the stake, the miner can join a stake pool to participate in the mining. In POS, the miners are also called forgers. A Miner gets paid a transaction fee for successfully validating a block in the POS system.', '2021-12-13'),
(5, 'This is a Test Post', 'Test Blog', '2021-12-13'),
(6, 'This is test blog', 'Hello!!! I am writing this to test my blog site\r\n', '2021-12-17'),
(7, 'Another Test', 'TESTING11', '2021-12-17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Account Status: 1-verified, 0-unverified'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `pwd`, `status`) VALUES
(16, 'Sooraj', 'sooraj@sun.com', '$2y$10$AQ1ScOO9FtH5q3hKA28lBudXWUlx48u.xWs3QSEU.VTDGnJnZbEZ2', 0),
(17, 'Mubashir', 'mubashir@gmail.com', '$2y$10$fnO.mxRc/rWqrpK2S5dNGOwHXwjASCrJVdAlFJOs330QaIwwE9pfW', 0),
(18, 'Abdullah', 'abdullah@gmail.com', '$2y$10$14M.vV.uOx36utf6jfpCRehfcPTbL36wO1ZUp05FgpfgUbpPyKvCC', 0),
(19, 'Neon239', 'neon@neon.com', '111111111111111', 0),
(20, 'Account1', 'account1@gmail.com', '$2y$10$1fnk0Dwz2R01xffPKBfH2upkNQQhjsUEdAZWtjQLI1/hVRjjj/pM.', 0),
(21, 'Account122', 'account12@gmail.com', '$2y$10$NYGjGvOc3R1S8HRajx0sNeHrpU//Q1254ORzqGcT3sR/lUi2x.xbC', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
