-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2023 at 06:15 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_beasiswa_bi`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `nama`) VALUES
(44, 'Cindi Utami Asril'),
(43, 'Fadlansyah Nurin Limbong'),
(42, 'Ella Putri Ayda'),
(41, 'Latifah Zuhra '),
(40, 'Nurzahira Natasya'),
(39, 'Winesa Dwinda Berlin'),
(45, 'Restri Ridha Illahi Ahmad'),
(46, 'Fikra Anggraini'),
(47, 'Nadhyre Arpinda'),
(48, 'Hildayatul Rizki');

-- --------------------------------------------------------

--
-- Table structure for table `ir`
--

CREATE TABLE `ir` (
  `jumlah` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ir`
--

INSERT INTO `ir` (`jumlah`, `nilai`) VALUES
(1, 0),
(2, 0),
(3, 0.58),
(4, 0.9),
(5, 1.12),
(6, 1.24),
(7, 1.32),
(8, 1.41),
(9, 1.45),
(10, 1.49),
(11, 1.51),
(12, 1.48),
(13, 1.56),
(14, 1.57),
(15, 1.59);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`) VALUES
(76, 'Peran Dalam Komunitas'),
(73, 'Status Keaktifan'),
(74, 'Nilai IPK Terakhir'),
(75, 'Jumlah Penerimaan');

-- --------------------------------------------------------

--
-- Table structure for table `perbandingan_alternatif`
--

CREATE TABLE `perbandingan_alternatif` (
  `id` int(11) NOT NULL,
  `alternatif1` int(11) NOT NULL,
  `alternatif2` int(11) NOT NULL,
  `pembanding` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perbandingan_alternatif`
--

INSERT INTO `perbandingan_alternatif` (`id`, `alternatif1`, `alternatif2`, `pembanding`, `nilai`) VALUES
(1421, 41, 48, 73, 1),
(1430, 43, 46, 73, 0.333333),
(1429, 43, 45, 73, 1),
(1428, 43, 44, 73, 0.333333),
(1427, 42, 48, 73, 0.333333),
(1426, 42, 47, 73, 1),
(1425, 42, 46, 73, 0.333333),
(1424, 42, 45, 73, 1),
(1423, 42, 44, 73, 0.333333),
(1422, 42, 43, 73, 1),
(1431, 43, 47, 73, 1),
(1432, 43, 48, 73, 0.333333),
(1442, 47, 48, 73, 0.333333),
(1441, 46, 48, 73, 1),
(1440, 46, 47, 73, 3),
(1439, 45, 48, 73, 0.333333),
(1438, 45, 47, 73, 1),
(1437, 45, 46, 73, 0.333333),
(1436, 44, 48, 73, 1),
(1435, 44, 47, 73, 3),
(1434, 44, 46, 73, 1),
(1433, 44, 45, 73, 3),
(1420, 41, 47, 73, 1),
(1419, 41, 46, 73, 1),
(1407, 40, 41, 73, 0.333333),
(1406, 39, 48, 73, 1),
(1405, 39, 47, 73, 3),
(1404, 39, 46, 73, 1),
(1403, 39, 45, 73, 3),
(1402, 39, 44, 73, 1),
(1401, 39, 43, 73, 3),
(1400, 39, 42, 73, 3),
(1399, 39, 41, 73, 1),
(1408, 40, 42, 73, 1),
(1409, 40, 43, 73, 1),
(1418, 41, 45, 73, 3),
(1417, 41, 44, 73, 1),
(1416, 41, 43, 73, 3),
(1415, 41, 42, 73, 3),
(1414, 40, 48, 73, 3),
(1413, 40, 47, 73, 1),
(1412, 40, 46, 73, 0.333333),
(1411, 40, 45, 73, 1),
(1410, 40, 44, 73, 0.333333),
(1398, 39, 40, 73, 3),
(1487, 47, 48, 74, 4),
(1475, 43, 46, 74, 4),
(1474, 43, 45, 74, 1),
(1473, 43, 44, 74, 1),
(1472, 42, 48, 74, 1),
(1471, 42, 47, 74, 0.5),
(1470, 42, 46, 74, 1),
(1469, 42, 45, 74, 0.5),
(1468, 42, 44, 74, 0.5),
(1467, 42, 43, 74, 0.5),
(1476, 43, 47, 74, 1),
(1477, 43, 48, 74, 4),
(1478, 44, 45, 74, 1),
(1486, 46, 48, 74, 1),
(1485, 46, 47, 74, 0.25),
(1484, 45, 48, 74, 4),
(1483, 45, 47, 74, 1),
(1482, 45, 46, 74, 4),
(1481, 44, 48, 74, 2),
(1480, 44, 47, 74, 1),
(1479, 44, 46, 74, 2),
(1466, 41, 48, 74, 2),
(1464, 41, 46, 74, 2),
(1465, 41, 47, 74, 1),
(1451, 39, 48, 74, 2),
(1450, 39, 47, 74, 1),
(1449, 39, 46, 74, 2),
(1448, 39, 45, 74, 1),
(1447, 39, 44, 74, 1),
(1446, 39, 43, 74, 1),
(1445, 39, 42, 74, 2),
(1444, 39, 41, 74, 1),
(1443, 39, 40, 74, 1),
(1452, 40, 41, 74, 1),
(1453, 40, 42, 74, 4),
(1454, 40, 43, 74, 1),
(1463, 41, 45, 74, 1),
(1462, 41, 44, 74, 1),
(1461, 41, 43, 74, 1),
(1460, 41, 42, 74, 2),
(1459, 40, 48, 74, 4),
(1458, 40, 47, 74, 1),
(1457, 40, 46, 74, 4),
(1456, 40, 45, 74, 1),
(1455, 40, 44, 74, 1),
(1511, 41, 48, 75, 0.5),
(1520, 43, 46, 75, 0.5),
(1519, 43, 45, 75, 0.5),
(1518, 43, 44, 75, 0.5),
(1517, 42, 48, 75, 1),
(1516, 42, 47, 75, 4),
(1515, 42, 46, 75, 4),
(1514, 42, 45, 75, 4),
(1513, 42, 44, 75, 4),
(1512, 42, 43, 75, 3),
(1521, 43, 47, 75, 0.5),
(1522, 43, 48, 75, 0.333333),
(1532, 47, 48, 75, 0.5),
(1531, 46, 48, 75, 0.5),
(1530, 46, 47, 75, 1),
(1529, 45, 48, 75, 0.5),
(1528, 45, 47, 75, 1),
(1527, 45, 46, 75, 1),
(1526, 44, 48, 75, 0.5),
(1525, 44, 47, 75, 1),
(1524, 44, 46, 75, 1),
(1523, 44, 45, 75, 1),
(1488, 39, 40, 75, 1),
(1510, 41, 47, 75, 1),
(1498, 40, 42, 75, 1),
(1497, 40, 41, 75, 4),
(1496, 39, 48, 75, 1),
(1495, 39, 47, 75, 2),
(1494, 39, 46, 75, 2),
(1493, 39, 45, 75, 2),
(1492, 39, 44, 75, 2),
(1491, 39, 43, 75, 3),
(1490, 39, 42, 75, 1),
(1499, 40, 43, 75, 3),
(1500, 40, 44, 75, 4),
(1509, 41, 46, 75, 1),
(1508, 41, 45, 75, 1),
(1507, 41, 44, 75, 1),
(1506, 41, 43, 75, 2),
(1505, 41, 42, 75, 0.25),
(1504, 40, 48, 75, 1),
(1503, 40, 47, 75, 4),
(1502, 40, 46, 75, 4),
(1501, 40, 45, 75, 4),
(1489, 39, 41, 75, 2),
(1577, 47, 48, 76, 3),
(1565, 43, 46, 76, 1),
(1564, 43, 45, 76, 1),
(1563, 43, 44, 76, 2),
(1562, 42, 48, 76, 1),
(1561, 42, 47, 76, 0.333333),
(1560, 42, 46, 76, 0.5),
(1559, 42, 45, 76, 1),
(1558, 42, 44, 76, 0.5),
(1557, 42, 43, 76, 0.5),
(1566, 43, 47, 76, 0.5),
(1567, 43, 48, 76, 2),
(1576, 46, 48, 76, 2),
(1575, 46, 47, 76, 0.5),
(1574, 45, 48, 76, 2),
(1573, 45, 47, 76, 0.5),
(1572, 45, 46, 76, 1),
(1571, 44, 48, 76, 1),
(1570, 44, 47, 76, 0.333333),
(1569, 44, 46, 76, 0.5),
(1568, 44, 45, 76, 0.5),
(1556, 41, 48, 76, 2),
(1555, 41, 47, 76, 0.5),
(1554, 41, 46, 76, 1),
(1541, 39, 48, 76, 1),
(1540, 39, 47, 76, 0.333333),
(1539, 39, 46, 76, 0.5),
(1538, 39, 45, 76, 0.5),
(1537, 39, 44, 76, 1),
(1536, 39, 43, 76, 0.5),
(1535, 39, 42, 76, 1),
(1534, 39, 41, 76, 0.5),
(1533, 39, 40, 76, 1),
(1542, 40, 41, 76, 0.5),
(1543, 40, 42, 76, 1),
(1544, 40, 43, 76, 0.5),
(1553, 41, 45, 76, 1),
(1552, 41, 44, 76, 2),
(1551, 41, 43, 76, 1),
(1550, 41, 42, 76, 2),
(1549, 40, 48, 76, 1),
(1548, 40, 47, 76, 0.333333),
(1547, 40, 46, 76, 0.5),
(1546, 40, 45, 76, 0.5),
(1545, 40, 44, 76, 1);

-- --------------------------------------------------------

--
-- Table structure for table `perbandingan_kriteria`
--

CREATE TABLE `perbandingan_kriteria` (
  `id` int(11) NOT NULL,
  `kriteria1` int(11) NOT NULL,
  `kriteria2` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perbandingan_kriteria`
--

INSERT INTO `perbandingan_kriteria` (`id`, `kriteria1`, `kriteria2`, `nilai`) VALUES
(199, 75, 76, 0.333333),
(198, 74, 76, 5),
(197, 74, 75, 7),
(196, 73, 76, 5),
(195, 73, 75, 7),
(194, 73, 74, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pv_alternatif`
--

CREATE TABLE `pv_alternatif` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pv_alternatif`
--

INSERT INTO `pv_alternatif` (`id`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(317, 48, 76, 0.0617971),
(316, 47, 76, 0.208594),
(315, 46, 76, 0.120023),
(314, 45, 76, 0.113773),
(313, 44, 76, 0.0680471),
(312, 43, 76, 0.120023),
(311, 42, 76, 0.0641268),
(310, 41, 76, 0.120023),
(309, 40, 76, 0.0617971),
(308, 39, 76, 0.0617971),
(307, 48, 75, 0.135276),
(306, 47, 75, 0.0608565),
(305, 46, 75, 0.0608565),
(304, 45, 75, 0.0608565),
(303, 44, 75, 0.0608565),
(302, 43, 75, 0.0403299),
(301, 42, 75, 0.192418),
(300, 41, 75, 0.0608565),
(299, 40, 75, 0.192418),
(298, 39, 75, 0.135276),
(297, 48, 74, 0.043511),
(296, 47, 74, 0.128224),
(295, 46, 74, 0.043511),
(294, 45, 74, 0.128224),
(293, 44, 74, 0.112224),
(292, 43, 74, 0.128224),
(291, 42, 74, 0.052886),
(290, 41, 74, 0.112224),
(289, 40, 74, 0.13875),
(288, 39, 74, 0.112224),
(287, 48, 73, 0.13294),
(286, 47, 73, 0.0585326),
(285, 46, 73, 0.148325),
(284, 45, 73, 0.0494417),
(283, 44, 73, 0.148325),
(282, 43, 73, 0.0494416),
(281, 42, 73, 0.0494416),
(280, 41, 73, 0.137214),
(279, 40, 73, 0.0780131),
(278, 39, 73, 0.148325);

-- --------------------------------------------------------

--
-- Table structure for table `pv_kriteria`
--

CREATE TABLE `pv_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pv_kriteria`
--

INSERT INTO `pv_kriteria` (`id_kriteria`, `nilai`) VALUES
(76, 0.106408),
(75, 0.0517296),
(74, 0.420931),
(73, 0.420931);

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

CREATE TABLE `ranking` (
  `id_alternatif` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ranking`
--

INSERT INTO `ranking` (`id_alternatif`, `nilai`) VALUES
(48, 0.0878472),
(47, 0.103956),
(46, 0.0966692),
(45, 0.0900394),
(44, 0.120062),
(43, 0.0896426),
(42, 0.0598502),
(41, 0.120916),
(40, 0.107772),
(39, 0.123247);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `password`, `role`) VALUES
(31, 'Koordinator Wilayah GenBI Sumbar', 'korwil1', '1493d408530772178730bdb2b7ed5d78', 'admin'),
(34, 'Aulia Dwi Pohan', 'korwil2', 'c94e0ae36d479dd2028005cbe200e84b', 'user'),
(35, 'Shaviqa PHN', 'korwil3', '849f4d6827ce03f58776032f87a29857', 'user'),
(36, 'Pohan', 'korwil4', 'ad75c7ccd7889eea2f47374a2cb02137', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `perbandingan_alternatif`
--
ALTER TABLE `perbandingan_alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pv_alternatif`
--
ALTER TABLE `pv_alternatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alternatif` (`id_alternatif`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `pv_kriteria`
--
ALTER TABLE `pv_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=309;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `perbandingan_alternatif`
--
ALTER TABLE `perbandingan_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1773;

--
-- AUTO_INCREMENT for table `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `pv_alternatif`
--
ALTER TABLE `pv_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
