-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2019-09-15 23:50:10
-- 服务器版本： 5.7.27-0ubuntu0.18.04.1
-- PHP 版本： 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `mysync`
--

-- --------------------------------------------------------

--
-- 表的结构 `sticky`
--

CREATE TABLE `sticky` (
  `id` int(10) NOT NULL,
  `sticky` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` varchar(19) COLLATE utf8mb4_bin DEFAULT NULL,
  `ip` varchar(15) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 转存表中的数据 `sticky`
--

INSERT INTO `sticky` (`id`, `sticky`, `time`, `ip`) VALUES
(3, 'https://home.yoyu.dev/subscribe/1228/8NypqegYqW3/ssr/', NULL, NULL);

--
-- 转储表的索引
--

--
-- 表的索引 `sticky`
--
ALTER TABLE `sticky`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `sticky`
--
ALTER TABLE `sticky`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
