-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Feb 05, 2018 alle 21:05
-- Versione del server: 5.6.35
-- Versione PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `kinon`
--

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
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;