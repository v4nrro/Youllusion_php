-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2024 at 08:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youllusionphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` int(11) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `imagen`, `titulo`, `descripcion`) VALUES
(9, '3 Card Monte.jpeg', '3 Card Monte', 'Truco en el que tienes que adivinar dónde está el As de Corazones.'),
(11, 'spring.jpeg', 'Card Spring', 'Dejar caer las cartas de una mano a otra como si fuera un acordeón.'),
(12, 'pressure-fan.jpg', 'Abanico', 'Abrir las cartas como si fuese un abanico'),
(13, 'OneHandShuffle.jpeg', 'Barajear a una mano', 'Tutorial de como barajar con solo una mano.'),
(14, 'coinVanish.jpeg', 'Desaparición de moneda', 'Truco para hacer desaparecer una moneda.'),
(15, 'ACAAN.jpeg', 'ACAAN', '(Any Card At Any Number) Encuentra una carta en el numero dicho por el espectador.');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$Hz1mwq1LEBMjdc.Qr/6NJeS0rywG/0SzFUnjYj9Q2ysvolXq.93zS', 'ROLE_ADMIN'),
(2, 'user', '$2y$10$3wIoZx/yuUEN8YAJUxNbrOlhvIHsZR562CQ1hgnKUKmvxSkSioTGC', 'ROLE_USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
