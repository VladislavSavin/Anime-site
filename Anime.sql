-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 28 2024 г., 10:36
-- Версия сервера: 5.7.39
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Anime`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Titles`
--

CREATE TABLE `Titles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` decimal(2,1) NOT NULL,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dubbing` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fragment1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fragment2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fragment3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Titles`
--

INSERT INTO `Titles` (`id`, `name`, `rating`, `genre`, `title`, `dubbing`, `photo`, `fragment1`, `fragment2`, `fragment3`) VALUES
(1, 'Адский рай', '9.5', 'Сёнен', 'Аниме', 'AniDUB', 'images\\adskiyRay.jpg', 'fragments\\AR-1.jpg', 'fragments\\AR-2.jpg', 'fragments\\AR-3.jpg'),
(2, 'Ангел кровопролития', '8.2', 'Психологическое', 'Аниме', 'Anilibria', 'images\\angel.jpg', 'fragments\\AK-1.png', 'fragments\\AK-2.png', 'fragments\\AK-3.png'),
(3, 'Магическая битва', '9.5', 'Фэнтези', 'Аниме', 'JAM CLUB', 'images\\magicheskayaBitva.jpg', 'fragments\\mb2-1.jpg', 'fragments\\mb2-2.jpg', 'fragments\\mb2-3.jpg'),
(4, 'Баскетбол Куроко', '9.0', 'Спорт', 'Манга', 'Азбука', 'images/Bascketbol.jpg', 'fragments\\BK-1.jpg', 'fragments\\BK-2.jpg', 'fragments\\BK-3.jpeg'),
(5, 'Башня Бога', '8.8', 'Сёнен', 'Аниме', 'Dream Cast', 'images/bashniayBoga.jpg', 'fragments\\BB-1.png', 'fragments\\BB-2.png', 'fragments\\BB-3.png'),
(6, 'Бездомный Бог:Арагото', '9.0', 'Сёнен', 'Аниме', 'AniDUB', 'images/Bezdomniybog.jpg', 'fragments\\BBA-1.jpg', 'fragments\\BBA-2.jpg', 'fragments\\BBA-3.jpg'),
(7, 'Блич:тысячелетняя кровавая война', '9.5', 'Фэнтези', 'Аниме', 'Dream Cast', 'images/bleach.jpg', 'fragments\\Blich-1.jpg', 'fragments\\Blich-2.jpg', 'fragments\\Blich-3.jpg'),
(8, 'Боруто: Два синих вихря', '9.7', 'Сёнен', 'Манга', 'Азбука', 'images/borutoM.jpg', 'fragments\\Boruto-1.jpg', 'fragments\\Boruto-2.jpg', 'fragments\\Boruto-3.jpg'),
(9, 'Двуличный братик урамити', '8.9', 'Комедия', 'Аниме', 'Anilibria', 'images/bratikuramiti.jpg', 'fragments\\DvulichB-1.png', 'fragments\\DvulichB-2.png', 'fragments\\DvulichB-3.png'),
(10, 'Добро пожаловать в класс превосходства 2', '9.1', 'Психологическое', 'Аниме', 'JAM CLUB', 'images/ClassPrevoshodstva.jpg', 'fragments\\ClassPrevos2-1.jpg', 'fragments\\ClassPrevos2-2.jpg', 'fragments\\ClassPrevos2-3.jpg'),
(11, 'Доктор стоун', '7.9', 'Сёнен', 'Манга', 'AnimeLibri', 'images/doktorstounM.jpg', 'fragments\\Dc_stoneM-1.jpg', 'fragments\\Dc_stoneM-2.jpg', 'fragments\\Dc_stoneM-3.jpg'),
(12, 'Госпожа Кагуя на любви как на войне 3', '9.4', 'Романтика', 'Аниме', 'Anilibria', 'images/GospogaKaguya.jpg', 'fragments\\GospogaKaguya3-1.jpg', 'fragments\\GospogaKaguya3-2.jpg', 'fragments\\GospogaKaguya3-3.jpg'),
(13, 'Игра друзей', '9.5', 'Психологическое', 'Аниме', 'Anilibria', 'images/igraDruzey.jpg', 'fragments\\IgraDruzey-1.jpg', 'fragments\\IgraDruzey-2.jpg', 'fragments\\IgraDruzey-3.jpg'),
(14, 'Игра друзей', '9.5', 'Психологическое', 'Манга', 'Азбука', 'images/igradruzeyM.jpg', 'fragments\\IgraDruzeyM-1.jpg', 'fragments\\IgraDruzeyM-2.jpg', 'fragments\\IgraDruzeyM-3.jpg'),
(15, 'Магическая битва: Токийская муниципальная магическая школа', '9.0', 'Фэнтези', 'Манга', 'Азбука', 'images/MagichiskayaBitvaM.jpg', 'fragments\\mbM-1.png', 'fragments\\mbM-2.png', 'fragments\\mbM-3.png'),
(16, 'Наруто', '9.3', 'Сёнен', 'Манга', 'AnimeLibri', 'images/Naruto.jpg', 'fragments\\NarutoM-1.jpg', 'fragments\\NarutoM-2.jpg', 'fragments\\NarutoM-3.jpg'),
(17, 'Необъятный океан', '9.5', 'Комедия', 'Аниме', 'Anilibria', 'images/ocean.jpg', 'fragments\\Ocean-1.jpg', 'fragments\\Ocean-2.jpg', 'fragments\\Ocean-3.jpg'),
(18, 'Волейбол', '9.6', 'Спорт', 'Манга', 'AnimeLibri', 'images/Voleybol.jpg', 'fragments\\voleybolM-1.jpg', 'fragments\\voleybolM-2.jpg', 'fragments\\voleybolM-3.jpg'),
(19, 'Восхождение в тени', '9.0', 'Фэнтези', 'Аниме', 'AniDUB', 'images/voshogdenievteni.jpg', 'fragments\\VoshogdenieVTeni-1.jpg', 'fragments\\VoshogdenieVTeni-2.jpg', 'fragments\\VoshogdenieVTeni-3.jpg'),
(20, 'Звёздное дитя', '9.3', 'Драма', 'Аниме', 'JAM CLUB', 'images/zvezdnoeDitay.jpg', 'fragments\\ZvezdnoeDitya-1.jpg', 'fragments\\ZvezdnoeDitya-2.jpg', 'fragments\\ZvezdnoeDitya-3.jpg'),
(21, 'Атака титанов', '9.4', 'Фэнтези', 'Аниме', 'JAM CLUB', 'images/AtakaTitanov.jpg', 'fragments\\AtakaTitanovF-1.jpg', 'fragments\\AtakaTitanovF-2.jpg', 'fragments\\AtakaTitanovF-3.jpg'),
(22, 'Добро пожаловать в класс превосходства', '8.9', 'Психологическое', 'Аниме', 'JAM CLUB', 'images/Classprevoshodstva1.jpg', 'fragments\\ClassPrevos-1.jpg', 'fragments\\ClassPrevos-2.jpg', 'fragments\\ClassPrevos-3.jpg'),
(23, 'Киберпанк: бегущие по краю', '9.2', 'Фэнтези', 'Аниме', 'Anilibria', 'images/Cyberpunk.jpg', 'fragments\\Cyberpunk-1.jpg', 'fragments\\Cyberpunk-2.jpg', 'fragments\\Cyberpunk-3.jpg'),
(24, 'Волейбол: к вершине', '9.3', 'Спорт', 'Аниме', 'AniDUB', 'images/voleybolkvershine.jpg', 'fragments\\VoleybolKVershine-1.jpg', 'fragments\\VoleybolKVershine-2.jpg', 'fragments\\VoleybolKVershine-3.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `title_user`
--

CREATE TABLE `title_user` (
  `id` int(11) NOT NULL,
  `title_id` int(11) DEFAULT NULL,
  `user_login` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `title_user`
--

INSERT INTO `title_user` (`id`, `title_id`, `user_login`) VALUES
(5, 1, 'Vladek'),
(6, 1, 'VlaDDa'),
(7, 13, 'VlaDDa'),
(8, 3, 'VlaDDa'),
(9, 23, 'Vladek'),
(10, 17, 'Vladek'),
(11, 3, 'Vladek'),
(15, 8, 'VlaDDa'),
(16, 2, 'VlaDDa'),
(18, 1, 'admin'),
(19, 3, 'admin'),
(20, 7, 'admin'),
(21, 8, 'admin'),
(22, 1, 'user1');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '..\\uploads\\profilStandart.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `login`, `password`, `photo`) VALUES
(1, 'user1', 'user1', '$2y$10$568CqpWBrpFioY1OgZF4d.3KwHmovE8GoI.qZUnaHlU/THI1vAHqG', 'uploads/baf3074bdb4e4d030c4bd82f614f49db.jpeg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Titles`
--
ALTER TABLE `Titles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `title_user`
--
ALTER TABLE `title_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title_id` (`title_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Titles`
--
ALTER TABLE `Titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `title_user`
--
ALTER TABLE `title_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `title_user`
--
ALTER TABLE `title_user`
  ADD CONSTRAINT `title_user_ibfk_1` FOREIGN KEY (`title_id`) REFERENCES `Titles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
