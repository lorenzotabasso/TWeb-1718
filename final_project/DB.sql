-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Feb 05, 2018 alle 21:54
-- Versione del server: 5.6.35
-- Versione PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `kinon`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `icon` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `category`
--

INSERT INTO `category` (`id`, `name`, `icon`) VALUES
(7, 'DSLRs', ''),
(8, 'Lenses', ''),
(9, 'Tripods', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `command`
--

CREATE TABLE `command` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `statut` varchar(1000) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `picture` varchar(1000) NOT NULL,
  `id_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `pictures`
--

INSERT INTO `pictures` (`id`, `picture`, `id_produit`) VALUES
(46, 'nikonD5.png', 18),
(47, 'nikond750.png', 19),
(48, 'nikond3200.png', 20),
(49, 'nikond7200.png', 21),
(50, 'nikkor35.png', 22),
(51, 'nikkor18105.png', 23),
(52, 'nikkor55300.png', 24),
(53, 'manfrotto90go.png', 25),
(54, 'manfrotto502.png', 26),
(55, 'manfrotto509.png', 27);

-- --------------------------------------------------------

--
-- Struttura della tabella `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` int(11) NOT NULL,
  `id_picture` int(11) NOT NULL,
  `thumbnail` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `product`
--

INSERT INTO `product` (`id`, `id_category`, `name`, `description`, `price`, `id_picture`, `thumbnail`) VALUES
(18, 7, 'Nikon D5', 'The Profesional Nikon D5', 2000, 46, 'nikonD5.png'),
(19, 7, 'Nikon D750', 'The profesional Nikon D750', 1800, 47, 'nikond750.png'),
(20, 7, 'Nikon D3200', 'The entry-level Nikon D3200', 600, 48, 'nikond3200.png'),
(21, 7, 'Nikon D7200', 'The intermediate-level Nikon D7200', 1000, 49, 'nikond7200.png'),
(22, 8, 'Nikon 35mm', 'The Nikon 35mm', 200, 50, 'nikkor35.png'),
(23, 8, 'Nikkor 18-105mm', 'The 18-105mm lens', 150, 51, 'nikkor18105.png'),
(24, 8, 'Nikkor 55-300mm', 'The nikkor 55-300 lens', 300, 52, 'nikkor55300.png'),
(25, 9, 'Manfrotto 90 GO', 'The manfrotto 90 GO tripod', 200, 53, 'manfrotto90go.png'),
(26, 9, 'Manfrotto 502 Tripod', 'The Manfrotto 502 tripod', 300, 54, 'manfrotto502.png'),
(27, 9, 'Manfrotto 509 tripod', 'The Manfrotto 509 tripod set', 400, 55, 'manfrotto509.png');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `firstname` varchar(1000) NOT NULL,
  `lastname` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `email`, `firstname`, `lastname`, `password`) VALUES
(12, 'lorenzo.tabasso@me.com', 'Lorenzo', 'Tabasso', 'tabaz4.0'),
(13, 'andrea@gmail.com', 'Andrea', 'Tabasso', 'AndreaTabasso'),
(14, 'mauro@maurotabasso.it', 'Mauro', 'Tabasso', 'Difficile1965');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `command`
--
ALTER TABLE `command`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT per la tabella `command`
--
ALTER TABLE `command`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT per la tabella `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT per la tabella `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;