-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 25, 2022 at 11:19 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BE15_CR11_petadoption_IgorIlic`
--
CREATE DATABASE IF NOT EXISTS `BE15_CR11_petadoption_IgorIlic` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `BE15_CR11_petadoption_IgorIlic`;

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `animalId` int(11) NOT NULL,
  `picture` char(250) NOT NULL,
  `location` char(100) NOT NULL,
  `description` char(250) NOT NULL,
  `size` varchar(25) NOT NULL,
  `age` int(11) NOT NULL,
  `hobbies` char(100) NOT NULL,
  `breed` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`animalId`, `picture`, `location`, `description`, `size`, `age`, `hobbies`, `breed`) VALUES
(21, 'whale.jpeg', 'Praterstraße 25', 'The single rarest animal in the world is the vaquita (Phocoena sinus). This porpoise lives only in the extreme northwestern corner of the Gulf of California in Mexico.', 'XXXLarge', 20, 'Swimming, reading, dancing', 'Whale'),
(22, 'rhino2.jpeg', 'Praterstraße 25', 'The Javan rhinoceros (Rhinoceros sondaicus) is an Indonesian rhino that exists only within one nature preserve on the island of Java.', 'XXXLarge', 20, 'Sleeping, running', 'Rhinoceros'),
(23, 'wolf.jpeg', 'Praterstraße 25', 'The red wolf (Canis rufus) is the only North American entry on our list of the rarest animals in the world, but it is also one of the most threatened.', 'Medium', 7, 'Running, hunting', 'Wolf'),
(24, 'rhino1.jpeg', 'Triesterstraße 100', 'The Sumatran rhinoceros (Dicerorhinus sumatrensis) is the next entry on our list of the rarest animals in the world, and this rhino is one of the most critically endangered large mammals with populations only remaining in Indonesia.', 'XX-Large', 50, 'Sleeping', 'Rhinoceros'),
(25, 'bear.jpeg', 'Triesterstraße 100', 'The Gobi bear (Ursus arctos gobiensis) is a subspecies of brown bears that exist only in the Gobi desert of Mongolia. There are less than 40 mature adults remaining in the wild, and no Gobi bears are held in captivity.', 'X-Large', 12, 'Playing, reading, sleeping', 'Bear'),
(26, 'deer.jpeg', 'Triesterstraße 100', 'The saola (Pseudoryx nghetinhensis) is a close relative of cattle but more closely resembles a deer. They are sometimes called the Asian unicorn due to their scarcity and their secretive behavior.', 'Medium', 10, 'Dancing', 'Deer'),
(27, 'antelope.jpeg', 'Brunnerstraße 50', 'The addax (Addax nasomaculatus) is an antelope that previously ranged across the deserts of Africa. Today, you can only find them in the Termit Tin Toumma region of Niger.', 'Medium', 5, 'Flying', 'Antelope'),
(28, 'leopard.jpeg', 'Brunnerstraße 50', 'The Amur leopard (Panthera pardus orientalis) is a resident of the Amur region of Russia and China.', 'Large', 3, 'Hunting', 'Leopard'),
(29, 'crocodile.jpeg', 'Brunnerstraße 50', 'Philippine crocodiles (Crocodylus mindorensis) are not faring as well as the kakapo. With an estimated declining mature adult population of 92-137 members, the species is severely fragmented across the inland wetlands of the Philippine Islands.', 'XXXXLarge', 70, 'Swimming, hunting, playing', 'Crocodile'),
(30, 'kakapo.jpeg', 'Leopoldauerstraße 99', 'The kakapo (Strigops habroptila) is a nocturnal, flightless parrot with a lifespan of 60 years that is native to New Zealand.', 'Small', 4, 'Flying, sleeping', 'Owl');

-- --------------------------------------------------------

--
-- Table structure for table `pet_adoption`
--

CREATE TABLE `pet_adoption` (
  `petAdoptionId` int(11) NOT NULL,
  `fk_userId` int(11) NOT NULL,
  `fk_animalId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pet_adoption`
--

INSERT INTO `pet_adoption` (`petAdoptionId`, `fk_userId`, `fk_animalId`) VALUES
(7, 2, 23),
(8, 2, 21),
(9, 2, 21);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` char(30) NOT NULL,
  `lastName` char(30) NOT NULL,
  `email` char(50) NOT NULL,
  `phoneNumber` int(12) NOT NULL,
  `address` char(50) NOT NULL,
  `picture` char(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `phoneNumber`, `address`, `picture`, `password`, `status`) VALUES
(1, 'Igor', 'Ilic', 'igor@mail.com', 1, 'Somethingasse', 'avatar.png', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'adm'),
(2, 'Testi', 'Testitest', 'test@mail.com', 101, 'somethinggasse', 'avatar.png', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`animalId`);

--
-- Indexes for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD PRIMARY KEY (`petAdoptionId`),
  ADD KEY `fk_userId` (`fk_userId`),
  ADD KEY `fk_animalId` (`fk_animalId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `animalId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  MODIFY `petAdoptionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD CONSTRAINT `pet_adoption_ibfk_1` FOREIGN KEY (`fk_userId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pet_adoption_ibfk_2` FOREIGN KEY (`fk_animalId`) REFERENCES `animals` (`animalId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
