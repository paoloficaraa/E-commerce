-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 18, 2022 alle 12:41
-- Versione del server: 10.4.6-MariaDB
-- Versione PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `5ai_ecommerce`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `cart`
--

CREATE TABLE `cart` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `Updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `cart`
--

INSERT INTO `cart` (`Id`, `UserId`, `productId`, `quantity`, `Updated`) VALUES
(4, 12, 3, 1, '0000-00-00 00:00:00'),
(5, 1, 1, 1, '0000-00-00 00:00:00'),
(6, 1, 3, 1, '0000-00-00 00:00:00'),
(7, 1, 2, 1, '0000-00-00 00:00:00'),
(9, 12, 1, 2, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `categories`
--

CREATE TABLE `categories` (
  `Id` int(4) NOT NULL,
  `name` varchar(16) NOT NULL,
  `description` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `categories`
--

INSERT INTO `categories` (`Id`, `name`, `description`, `thumbnail`) VALUES
(1, 'Electronics', 'This category includes every electronic product', 'assets/images/categories/laptop.svg'),
(2, 'Furnitures', 'This category includes every product for the decore of your estate', 'assets/images/categories/furniture.svg'),
(3, 'Health & Beauty', 'This category includes every product for the beauty of your skin', 'assets/images/categories/hospital.svg'),
(4, 'Fashion', 'This category includes every product for the clothing', 'assets/images/categories/tshirt.svg'),
(5, 'Education', 'This category includes every product for the education', 'assets/images/categories/education.svg'),
(6, 'Gadgets', 'This category includes every available gadget', 'assets/images/categories/controller.svg'),
(7, 'Backpacks', 'This category includes every products for a trip', 'assets/images/categories/travel.svg'),
(8, 'Watches', 'This category includes every type of watches', 'assets/images/categories/watch.svg'),
(9, 'Sport', 'This category is for sport', 'assets/images/categories/sport.png');

-- --------------------------------------------------------

--
-- Struttura della tabella `order_details`
--

CREATE TABLE `order_details` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Total` float NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `order_details`
--

INSERT INTO `order_details` (`Id`, `UserId`, `Total`, `Date`) VALUES
(5, 12, 10100, '2022-05-13 13:57:54');

-- --------------------------------------------------------

--
-- Struttura della tabella `order_items`
--

CREATE TABLE `order_items` (
  `Id` int(11) NOT NULL,
  `OrderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `products`
--

CREATE TABLE `products` (
  `Id` int(11) NOT NULL,
  `Name` varchar(64) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Price` float NOT NULL,
  `Quantity` int(11) NOT NULL DEFAULT 1,
  `thumbnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `products`
--

INSERT INTO `products` (`Id`, `Name`, `Description`, `Price`, `Quantity`, `thumbnail`) VALUES
(1, 'telefono', 'Il più funzionante del mondo', 5000, 50, 'assets/images/products/telefono.jpg'),
(2, 'palla', 'Palla usata da Ronaldinho', 25, 500, 'assets/images/products/palla.jpg'),
(3, 'maglia BILAN', 'la migliore non scherziamo', 100, 200, 'assets/images/products/maglia.jpg'),
(10, 'tastiera', 'tastiera bella', 60, 100, 'https://omniutech.it/wp-content/uploads/2020/07/61yezxhUwGL._AC_SL1500_.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `product_categories`
--

CREATE TABLE `product_categories` (
  `Id` int(4) NOT NULL,
  `productId` int(4) NOT NULL,
  `categoryId` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `product_categories`
--

INSERT INTO `product_categories` (`Id`, `productId`, `categoryId`) VALUES
(1, 1, 1),
(2, 2, 9),
(3, 3, 9),
(5, 10, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Username` varchar(32) NOT NULL,
  `Password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`Id`, `Username`, `Password`) VALUES
(1, 'paolo', '5f4dcc3b5aa765d61d8327deb882cf99'),
(12, 'giorgia', '63bddf0cbc21d36c8c19808e22784df2'),
(13, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `cart_ibfk_1` (`UserId`),
  ADD KEY `cart_ibfk_2` (`productId`);

--
-- Indici per le tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `order_details_ibfk_1` (`UserId`);

--
-- Indici per le tabelle `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `order_items_ibfk_1` (`productId`),
  ADD KEY `order_items_ibfk_2` (`OrderId`);

--
-- Indici per le tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `product_categories_ibfk_1` (`productId`),
  ADD KEY `product_categories_ibfk_2` (`categoryId`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `cart`
--
ALTER TABLE `cart`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `categories`
--
ALTER TABLE `categories`
  MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `order_details`
--
ALTER TABLE `order_details`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `order_items`
--
ALTER TABLE `order_items`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `products`
--
ALTER TABLE `products`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `products` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`OrderId`) REFERENCES `order_details` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_categories_ibfk_2` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
