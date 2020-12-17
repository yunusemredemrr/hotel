-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 02 Nis 2020, 13:04:35
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `otel`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `fatura`
--

CREATE TABLE `fatura` (
  `id` int(7) NOT NULL,
  `ad` varchar(15) NOT NULL,
  `soyad` varchar(15) NOT NULL,
  `tcno` varchar(11) NOT NULL,
  `firmaadi` varchar(25) NOT NULL,
  `fiyat` int(5) NOT NULL,
  `adres` varchar(150) NOT NULL,
  `odanumarasi` int(5) NOT NULL,
  `tarih` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odalar`
--

CREATE TABLE `odalar` (
  `id` int(4) NOT NULL,
  `numara` int(11) NOT NULL,
  `fiyat` int(5) NOT NULL,
  `rezervkisi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `odalar`
--

INSERT INTO `odalar` (`id`, `numara`, `fiyat`, `rezervkisi`) VALUES
(1, 101, 150, ''),
(2, 102, 150, ''),
(3, 103, 150, ''),
(4, 104, 150, ''),
(5, 201, 200, ''),
(6, 202, 200, ''),
(7, 203, 200, ''),
(8, 204, 200, ''),
(9, 301, 250, ''),
(10, 302, 250, ''),
(11, 303, 250, ''),
(12, 304, 250, ''),
(13, 401, 300, ''),
(14, 402, 300, ''),
(23, 403, 300, ''),
(24, 404, 300, ''),
(26, 501, 300, ''),
(27, 502, 300, ''),
(28, 503, 300, ''),
(29, 504, 300, ''),
(30, 601, 350, ''),
(31, 602, 350, ''),
(32, 603, 350, ''),
(33, 604, 350, '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uye`
--

CREATE TABLE `uye` (
  `id` int(11) NOT NULL,
  `ad` varchar(15) NOT NULL,
  `soyad` varchar(15) NOT NULL,
  `dogumtarihi` varchar(15) NOT NULL,
  `sifre` varchar(15) NOT NULL,
  `tcno` varchar(11) NOT NULL,
  `kadi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetici`
--

CREATE TABLE `yonetici` (
  `id` int(11) NOT NULL,
  `ad` varchar(15) NOT NULL,
  `soyad` varchar(15) NOT NULL,
  `yoneticiadi` varchar(15) NOT NULL,
  `sifre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `fatura`
--
ALTER TABLE `fatura`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `odalar`
--
ALTER TABLE `odalar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numara` (`numara`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Tablo için indeksler `uye`
--
ALTER TABLE `uye`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kadi` (`kadi`),
  ADD UNIQUE KEY `tcno` (`tcno`);

--
-- Tablo için indeksler `yonetici`
--
ALTER TABLE `yonetici`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kad` (`yoneticiadi`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `fatura`
--
ALTER TABLE `fatura`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `odalar`
--
ALTER TABLE `odalar`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Tablo için AUTO_INCREMENT değeri `uye`
--
ALTER TABLE `uye`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Tablo için AUTO_INCREMENT değeri `yonetici`
--
ALTER TABLE `yonetici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
