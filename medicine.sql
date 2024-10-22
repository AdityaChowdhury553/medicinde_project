-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2024 at 07:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicine`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `pass`) VALUES
(1, 'adminship', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `serial` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`serial`, `medicine_id`, `user_id`, `quantity`) VALUES
(24, 4, 1, 1),
(26, 6, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` int(10) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `composition` text NOT NULL,
  `used_for` text NOT NULL,
  `price` int(11) NOT NULL,
  `medicine_image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `medicine_name`, `composition`, `used_for`, `price`, `medicine_image`) VALUES
(8, 'Eno', 'Eno123', 'Acidity', 120, './uploads/1728749951eno.jfif'),
(4, 'Saradon', 'Paracetamol 250 mg, Propyphenazone 150 mg, Caffeine 50 mg. ', 'Saridon is an analgesic commonly used for headaches, common cold, and menstrual cramps.', 10, 'https://5.imimg.com/data5/ANDROID/Default/2023/6/316143837/QK/UM/YC/32729718/product-jpeg-500x500.jpg'),
(5, 'FolliHair', 'The salts Biotin (10 mg), Iron (8 mg), l-cysteine (5 mg), Manganese (5 mg), Copper (2 mg), Selenium (50 mcg), L-lysine (20 mg), Zinc (25 mg).', 'Used for the diagnosis or treatment of Hair fall, Stimulates hair growth, Nourishes follicles. ', 640, 'https://www.clinikally.com/cdn/shop/files/Follihairnutraceutical30ntablets_1.png?v=1698823895&width=1000'),
(6, 'Pantop-D', 'Pantop-D Capsule is a combination of two medicines: Domperidone and Pantoprazole.', 'Pantop-D Capsule prevents the release of stomach acid and relieves symptoms of food pipe lining inflammation (esophagitis), and gastroesophageal reflux disease (GERD), or heartburn.', 120, 'https://m.media-amazon.com/images/I/81fXPSwt0HL.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Contact` varchar(20) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Educational` int(255) NOT NULL,
  `State` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Pin` int(10) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Upload` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `Name`, `Contact`, `Email`, `Educational`, `State`, `City`, `Pin`, `Gender`, `Upload`, `Password`) VALUES
(1, 'AdityaKumarChowdhury', '9123814124', 'adi@gmail.com', 10, 'West Bengal', 'Kolkata', 712121, 'Male', './uploads/1728566700ano.jfif', '$2y$10$77kQVmGQNvCXQkaZzthWeuuuUz8Ppzr3DJursEARbttsdPA./eEpa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicine_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
