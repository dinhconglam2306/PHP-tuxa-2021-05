-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-07-22 05:57:06
-- サーバのバージョン： 10.4.17-MariaDB
-- PHP のバージョン: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `bookstore`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `group_acp` tinyint(1) DEFAULT 0,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT 10,
  `privilege_id` text NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `group`
--

INSERT INTO `group` (`id`, `name`, `group_acp`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`, `privilege_id`, `picture`) VALUES
(1, 'Admin', 1, '2021-07-25 13:47:37', 'admin', '2021-07-28 13:47:37', 'admin', 'inactive', 4, '', ''),
(2, 'Manager', 1, '2021-07-25 13:47:37', 'admin', '2021-07-28 13:47:37', 'admin', 'inactive', 5, '', ''),
(3, 'Member', 1, '2021-07-25 13:47:37', 'admin', '2021-07-28 13:47:37', 'admin', 'active', 10, '', ''),
(4, 'Register', 1, '2021-07-25 13:47:37', 'admin', '2021-07-28 13:47:37', 'admin', 'active', 10, '', ''),
(34, 'Admin', 1, '2021-07-25 13:47:37', 'admin', '2021-07-28 13:47:37', 'admin', 'active', 4, '', ''),
(35, 'Manager', 1, '2021-07-25 13:47:37', 'admin', '2021-07-28 13:47:37', 'admin', 'inactive', 5, '', ''),
(36, 'Member', 1, '2021-07-25 13:47:37', 'admin', '2021-07-28 13:47:37', 'admin', 'active', 10, '', ''),
(37, 'Register', 1, '2021-07-25 13:47:37', 'admin', '2021-07-28 13:47:37', 'admin', 'active', 10, '', '');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
