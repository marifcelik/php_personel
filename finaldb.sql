-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 30 May 2022, 20:11:21
-- Sunucu sürümü: 8.0.29-0ubuntu0.22.04.2
-- PHP Sürümü: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `finaldb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personeller`
--

CREATE TABLE `personeller` (
  `id` int NOT NULL,
  `ad` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `soyad` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `tc` char(11) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `unvan` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `tel` char(10) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `personeller`
--

INSERT INTO `personeller` (`id`, `ad`, `soyad`, `tc`, `unvan`, `tel`, `tarih`) VALUES
(2, 'bruce', 'wayne', '99999999999', 'getir götür', '5551029888', '2022-05-29 20:51:40'),
(3, 'anakin', 'skywalker', '16546871468', 'darth vader', '4445523654', '2022-05-29 21:12:21'),
(13, 'finn', 'mertens', '98765432112', 'finn the human', '5551021478', '2022-05-29 22:01:35'),
(15, 'jake', '-', '98765432113', 'jake the dog', '5550121365', '2022-05-29 22:07:12'),
(17, 'bmo', '-', '10101010101', 'web3', '8789465465', '2022-05-30 09:39:39'),
(24, 'sir artuhur conen', 'doyle', '48953215913', 'sir', '3230021512', '2022-05-30 17:05:12');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `ad` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `parola` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `ad`, `parola`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `personeller`
--
ALTER TABLE `personeller`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tc` (`tc`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ad` (`ad`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `personeller`
--
ALTER TABLE `personeller`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
