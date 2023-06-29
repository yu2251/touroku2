-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-06-22 14:49:22
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_d13_26_test`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `basic_data1`
--

CREATE TABLE `basic_data1` (
  `id` int(10) NOT NULL,
  `name` varchar(128) NOT NULL,
  `tel` int(12) NOT NULL,
  `sex` varchar(3) NOT NULL,
  `age` int(3) NOT NULL,
  `postn` int(8) NOT NULL,
  `address` varchar(128) NOT NULL,
  `bank` varchar(128) NOT NULL,
  `bankcode` decimal(4,0) UNSIGNED ZEROFILL DEFAULT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- テーブルのデータのダンプ `basic_data1`
--

INSERT INTO `basic_data1` (`id`, `name`, `tel`, `sex`, `age`, `postn`, `address`, `bank`, `bankcode`, `deadline`) VALUES
(1, '本田', 2147483647, 'man', 50, 8030813, '福岡県北九州市小倉北区城内', '北九州', 0001, '2023-06-09'),
(2, '豊田', 2147483647, 'wom', 75, 8100043, '福岡県福岡市中央区城内', '福岡', 0002, '2023-06-13'),
(3, 'suzuki', 2147483647, 'man', 25, 8100041, '福岡県福岡市中央区大名', '西日本シティ', 0039, '2023-06-21');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `basic_data1`
--
ALTER TABLE `basic_data1`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `basic_data1`
--
ALTER TABLE `basic_data1`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
