-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.3
-- Erstellungszeit: 11. August 2015 um 21:42
-- Server Version: 5.6.19
-- PHP-Version: 4.4.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Datenbank: `db372822_8`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `orig_path` varchar(80) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `thumb_path` varchar(60) DEFAULT NULL,
  `full_thumb` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timestamp` date DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=0 ;
