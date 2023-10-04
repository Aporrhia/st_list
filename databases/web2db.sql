-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 05 2023 г., 00:15
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `web2db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ext_person`
--

CREATE TABLE `ext_person` (
  `Ext_P_ID` int(4) NOT NULL,
  `Ext_P_Fname` varchar(15) NOT NULL,
  `Ext_P_Lname` varchar(15) NOT NULL,
  `Ext_P_Age` int(2) NOT NULL,
  `Ext_P_Group_number` varchar(5) NOT NULL,
  `Ext_P_Teacher_Fname` varchar(15) NOT NULL,
  `Ext_P_Teacher_Lname` varchar(15) NOT NULL,
  `Ext_P_Level` enum('Bachelor','Master','Doctor') NOT NULL,
  `Ext_P_T_ID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `ext_person`
--

INSERT INTO `ext_person` (`Ext_P_ID`, `Ext_P_Fname`, `Ext_P_Lname`, `Ext_P_Age`, `Ext_P_Group_number`, `Ext_P_Teacher_Fname`, `Ext_P_Teacher_Lname`, `Ext_P_Level`, `Ext_P_T_ID`) VALUES
(1, 'Justin', 'Klot', 21, 'PK765', 'Ron', 'Frezy', 'Bachelor', 1),
(2, 'Mike', 'Noah', 22, 'PO491', 'Nicholas ', 'Cage', 'Master', 3),
(3, 'Brad', 'Xander', 22, 'LR922', 'Damien', 'Ted', 'Doctor', 5),
(4, 'John', 'Harris', 23, 'LR922', 'Francis', 'Oscar', 'Bachelor', 1),
(5, 'Raphael', 'Lee', 21, 'RO88I', 'Stanley', 'Austin', 'Doctor', 5),
(6, 'Ioan', 'Euan', 20, 'RO771', 'Jessie', 'Aaron', 'Bachelor', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `ext_thesis`
--

CREATE TABLE `ext_thesis` (
  `Ext_T_ID` int(4) NOT NULL,
  `Ext_T_Title` varchar(30) NOT NULL,
  `Ext_T_Abstract` text NOT NULL,
  `Ext_T_Year` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `ext_thesis`
--

INSERT INTO `ext_thesis` (`Ext_T_ID`, `Ext_T_Title`, `Ext_T_Abstract`, `Ext_T_Year`) VALUES
(1, 'Mathematics', 'Math', 2),
(2, 'Biology', 'Biology', 2),
(3, 'Ecology', 'Ecology', 2),
(4, 'Economics', 'Economics', 1),
(5, 'AI', 'AI', 3),
(6, 'Music', 'Music', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ext_person`
--
ALTER TABLE `ext_person`
  ADD PRIMARY KEY (`Ext_P_ID`),
  ADD KEY `Ext_P_T_ID_FK` (`Ext_P_T_ID`);

--
-- Индексы таблицы `ext_thesis`
--
ALTER TABLE `ext_thesis`
  ADD PRIMARY KEY (`Ext_T_ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ext_person`
--
ALTER TABLE `ext_person`
  MODIFY `Ext_P_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `ext_thesis`
--
ALTER TABLE `ext_thesis`
  MODIFY `Ext_T_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `ext_person`
--
ALTER TABLE `ext_person`
  ADD CONSTRAINT `Ext_P_T_ID_FK` FOREIGN KEY (`Ext_P_T_ID`) REFERENCES `ext_thesis` (`Ext_T_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
