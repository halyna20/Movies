-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Час створення: Жов 28 2022 р., 17:08
-- Версія сервера: 10.4.21-MariaDB
-- Версія PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `film`
--

-- --------------------------------------------------------

--
-- Структура таблиці `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `year` year(4) NOT NULL,
  `format` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `stars` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `movieImg` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `frame` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `movies`
--

INSERT INTO `movies` (`id`, `title`, `year`, `format`, `stars`, `description`, `movieImg`, `frame`) VALUES
(1, 'Людина-павук / Spider-Man', 2002, 'VHS', 'Тобі Магвайр, Кірстен Данст, Джеймс Франко, Джонатан Сіммонс', 'Пітер Паркер, якого не поважали однолітки і полюбляли знущатись над ним, його кращий друг Гарі Осборн, син директора компанії \"Оскорп\", та таємне кохання Пітера і його сусідка Мері-Джейн Уотсон відвідували з групою учнів лабораторію генетиків. Там Пітера вкусив генетично модифікований павук. Вранці ж Пітер виявляє, що у нього покращився зір (до того він був короткозорим) та сильні м\'язи. У школі він знаходить ще декілька нових можливостей: продукування павутиння та надшвидкі реакції, які допомагають йому перемогти у бійці. Після втечі зі школи, він починає повзати по стінам та перестрибувати з даху на дах. Незабаром грабіжник застрелює його дядька Бена. Незадовго до своєї смерті він сказав Пітеру фразу, яка, хоч і не зразу, назавжди змінила його життя: \"Велика сила вимагає великої відповідальності\". Пітер вирішує боротися зі злочинністю і стати справжнім супергероєм — Людиною-павуком. Для цього він створює собі костюм і починає діяти. Разом з появою Людини-павука у місті з\'являється супер лиходій — Зелений Гоблін, під маскою якого ховається Норман Осборн, батько найкращого друга Пітера. Чи вдасться Пітеру здолати свого ворога?..', '/assets/img/films/spider-man.jpg', '/assets/img/films/Spider-Man'),
(2, 'Післязавтра / The Day After Tomorrow', 2004, 'DVD', 'Денніс Квейд, Деш Міхок, Джей О. Сендерс, Еммі Россам, Сіла Ворд', 'Земля знаходиться на порозі глобальної катастрофи - починається новий Льодовиковий Період. Землетруси, цунамі, урагани загрожують існуванню людства. Основна дія відбувається в Нью-Йорку, який потрапляє в блокаду льодовиків, що насуваються. Близкість катастрофи вимушує ученого-кліматолога, що намагається знайти спосіб зупинити глобальне потеплення, відправитися на пошуки зниклого сина до Нью-Йорку.', '/assets/img/films/afterTomorrow.jpg', '/assets/img/films/The_Day_After_Tomorrow');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nickname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
