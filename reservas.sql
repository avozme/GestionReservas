-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-05-2022 a las 13:19:46
-- Versión del servidor: 10.6.7-MariaDB-2ubuntu1
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reservas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `idResource` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idTimeSlot` int(11) NOT NULL,
  `date` date NOT NULL,
  `remarks` varchar(500) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resources`
--

CREATE TABLE `resources` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `description` varchar(300) COLLATE utf8mb4_spanish_ci NOT NULL,
  `location` varchar(300) COLLATE utf8mb4_spanish_ci NOT NULL,
  `image` varchar(500) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `resources`
--

INSERT INTO `resources` (`id`, `name`, `description`, `location`, `image`) VALUES
(31, 'Carrito portátiles B', 'Carrito con 10 ordenadores portátiles', 'PLANTA BAJA (Secretaría)', 'imgs/resources/carrito.jpg'),
(32, 'Carrito portátiles A', 'Carrito con 10 ordenadores portátiles', 'PLANTA 1 (Dpto. Fís. y Quím.)', 'imgs/resources/carrito.jpg'),
(33, 'Carrito portátiles C', 'Carrito con 10 ordenadores portátiles', 'PLANTA 1 (Dpto. Fís. y Quím.)', 'imgs/resources/carrito.jpg'),
(34, 'Carrito portátiles D', 'Carrito con 10 ordenadores portátiles', 'PLANTA 2 (Lab. Bio. y Geo.)', 'imgs/resources/carrito.jpg'),
(35, 'Carrito portátiles E', 'Carrito con 10 ordenadores portátiles', 'PLANTA 2 (Lab. Bio. y Geo.)', 'imgs/resources/carrito.jpg'),
(36, 'Aula Ateca', 'Aula de tecnología aplicada', 'SÓTANO', 'imgs/resources/ateca.jpg'),
(37, 'Aula de emprendimiento', 'Aula de impulso emprendedor', 'SÓTANO', 'imgs/resources/emprendimiento.jpg'),
(38, 'Biblioteca / Aula TIC', 'Biblioteca Manuel Molina / Aula TIC', 'PLANTA 1', 'imgs/resources/biblioteca.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `timeslots`
--

CREATE TABLE `timeslots` (
  `id` int(10) UNSIGNED NOT NULL,
  `dayOfWeek` int(11) NOT NULL,
  `starTime` time NOT NULL,
  `endTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `timeslots`
--

INSERT INTO `timeslots` (`id`, `dayOfWeek`, `starTime`, `endTime`) VALUES
(29, 1, '08:05:00', '09:05:00'),
(30, 1, '09:05:00', '10:05:00'),
(31, 1, '10:05:00', '11:05:00'),
(32, 1, '11:35:00', '12:35:00'),
(33, 1, '12:35:00', '13:35:00'),
(34, 1, '13:35:00', '14:35:00'),
(35, 1, '15:00:00', '16:00:00'),
(36, 1, '16:00:00', '17:00:00'),
(37, 1, '17:00:00', '18:00:00'),
(38, 1, '18:00:00', '19:00:00'),
(39, 1, '19:00:00', '20:00:00'),
(40, 1, '20:00:00', '21:00:00'),
(41, 1, '21:00:00', '22:00:00'),
(42, 2, '09:05:00', '10:05:00'),
(43, 2, '10:05:00', '11:05:00'),
(44, 2, '11:35:00', '12:35:00'),
(45, 2, '12:35:00', '13:35:00'),
(46, 2, '13:35:00', '14:35:00'),
(47, 2, '15:00:00', '16:00:00'),
(48, 2, '16:00:00', '17:00:00'),
(49, 2, '17:00:00', '18:00:00'),
(50, 2, '18:00:00', '19:00:00'),
(51, 2, '19:00:00', '20:00:00'),
(52, 2, '20:00:00', '21:00:00'),
(53, 2, '21:00:00', '22:00:00'),
(54, 3, '09:05:00', '10:05:00'),
(55, 3, '10:05:00', '11:05:00'),
(56, 3, '11:35:00', '12:35:00'),
(57, 3, '12:35:00', '13:35:00'),
(58, 3, '13:35:00', '14:35:00'),
(59, 3, '15:00:00', '16:00:00'),
(60, 3, '16:00:00', '17:00:00'),
(61, 3, '17:00:00', '18:00:00'),
(62, 3, '18:00:00', '19:00:00'),
(63, 3, '19:00:00', '20:00:00'),
(64, 3, '20:00:00', '21:00:00'),
(65, 3, '21:00:00', '22:00:00'),
(66, 4, '09:05:00', '10:05:00'),
(67, 4, '10:05:00', '11:05:00'),
(68, 4, '11:35:00', '12:35:00'),
(69, 4, '12:35:00', '13:35:00'),
(70, 4, '13:35:00', '14:35:00'),
(71, 4, '15:00:00', '16:00:00'),
(72, 4, '16:00:00', '17:00:00'),
(73, 4, '17:00:00', '18:00:00'),
(74, 4, '18:00:00', '19:00:00'),
(75, 4, '19:00:00', '20:00:00'),
(76, 4, '20:00:00', '21:00:00'),
(77, 4, '21:00:00', '22:00:00'),
(78, 5, '09:05:00', '10:05:00'),
(79, 5, '10:05:00', '11:05:00'),
(80, 5, '11:35:00', '12:35:00'),
(81, 5, '12:35:00', '13:35:00'),
(82, 5, '13:35:00', '14:35:00'),
(83, 5, '15:00:00', '16:00:00'),
(84, 5, '16:00:00', '17:00:00'),
(85, 5, '17:00:00', '18:00:00'),
(86, 5, '18:00:00', '19:00:00'),
(87, 5, '19:00:00', '20:00:00'),
(88, 5, '20:00:00', '21:00:00'),
(89, 5, '21:00:00', '22:00:00'),
(90, 2, '08:05:00', '09:05:00'),
(91, 3, '08:05:00', '09:05:00'),
(92, 4, '08:05:00', '09:05:00'),
(93, 5, '08:05:00', '09:05:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `realname` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `type` enum('admin','user') COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `realname`, `type`) VALUES
(1, 'admin', 'admin', 'Administrador', 'admin'),
(2, 'usuario', 'usuario', 'Usuario estándar', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idResource` (`idResource`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idTimeSlot` (`idTimeSlot`);

--
-- Indices de la tabla `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `timeslots`
--
ALTER TABLE `timeslots`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `timeslots`
--
ALTER TABLE `timeslots`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
