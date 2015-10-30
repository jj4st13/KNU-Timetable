-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- 생성 시간: 15-10-02 07:08
-- 서버 버전: 5.6.26
-- PHP 버전: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `knutimetable`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `knu_users_list`
--

CREATE TABLE IF NOT EXISTS `knu_users_list` (
  `id` varchar(20) DEFAULT NULL,
  `password` binary(60) DEFAULT NULL,
  `token` binary(64) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` text,
  `grade` int(11) DEFAULT NULL,
  `majorcode` int(11) DEFAULT NULL,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
