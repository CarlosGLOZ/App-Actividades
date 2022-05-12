-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2022 a las 11:56:18
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_app_actividades`
--
CREATE DATABASE IF NOT EXISTS `bd_app_actividades` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_app_actividades`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_actividad`
--

CREATE TABLE `tbl_actividad` (
  `id` int(6) NOT NULL,
  `nombre_act` varchar(40) NOT NULL,
  `desc_act` varchar(1000) DEFAULT NULL,
  `foto_act` varchar(100) NOT NULL,
  `tema_act` varchar(20) DEFAULT NULL,
  `fecha_public_act` datetime DEFAULT NULL,
  `visibilidad_act` char(7) DEFAULT 'publica',
  `link_act` varchar(200) NOT NULL,
  `autor_act` int(4) NOT NULL,
  `favs_act` int(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_actividad`
--

INSERT INTO `tbl_actividad` (`id`, `nombre_act`, `desc_act`, `foto_act`, `tema_act`, `fecha_public_act`, `visibilidad_act`, `link_act`, `autor_act`, `favs_act`) VALUES
(34, 'test', 'test', '../img/actividades/34.png', 'matematicas', '2022-05-11 16:44:26', 'publica', '../view/actividad.php?act=34', 1, 0),
(35, 'danny', 'Los hombres llevan habitando el planeta Tierra desde tiempos immemorables', '../img/actividades/35.png', 'informatica', '2022-05-11 19:02:28', 'publica', '../view/actividad.php?act=35', 6, 2),
(36, 'p', 'p', '../img/actividades/36.png', 'matematicas', '2022-05-11 19:02:47', 'publica', '../view/actividad.php?act=36', 6, 0),
(37, 'Profesor Random', 'Profesor de M4 asix1', '../img/actividades/37.png', 'matematicas', '2022-05-11 19:03:35', 'publica', '../view/actividad.php?act=37', 6, 0),
(39, 'FanArt de Danny', 'FanArt hecho por un fan de danny', '../img/actividades/38.png', 'matematicas', '2022-05-11 19:05:52', 'publica', '../view/actividad.php?act=38', 6, 1),
(40, 'danny', 'pablo', '../img/actividades/40.png', 'matematicas', '2022-05-11 22:01:15', 'publica', '../view/actividad.php?act=40', 6, 0),
(41, 'FanArt de Danny', 'prueba', '../img/actividades/41.png', 'matematicas', '2022-05-11 22:05:52', 'publica', '../view/actividad.php?act=41', 6, 1),
(42, 'p', 'p', '../img/actividades/42.png', 'matematicas', '2022-05-11 22:37:42', 'publica', '../view/actividad.php?act=42', 6, 2),
(43, 'Actividad6', 'Actividad de Prueba6', '../img/actividades/43.png', 'informatica', '2022-05-12 11:44:54', 'publica', '../view/actividad.php?act=43', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_actividad_gustada`
--

CREATE TABLE `tbl_actividad_gustada` (
  `id` int(9) NOT NULL,
  `fecha_gustada` datetime DEFAULT NULL,
  `id_actividad` int(6) NOT NULL,
  `id_usuario` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_actividad_gustada`
--

INSERT INTO `tbl_actividad_gustada` (`id`, `fecha_gustada`, `id_actividad`, `id_usuario`) VALUES
(225, '2022-05-12 10:32:21', 35, 1),
(236, '2022-05-12 11:19:40', 42, 1),
(239, '2022-05-12 11:45:03', 43, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id` int(4) NOT NULL,
  `correo_usuario` varchar(40) NOT NULL,
  `contra_usuario` varchar(25) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id`, `correo_usuario`, `contra_usuario`, `nombre_usuario`) VALUES
(1, 'carlos@gmail.com', 'contra1', 'Carlos'),
(2, 'pablo@gmail.com', 'contra2', 'Pablo'),
(3, 'test@gmail.com', 'contra3', 'test'),
(4, 'test4@gmail.com', 'contra4', 'Test4'),
(5, 'test5@gmail.com', 'contra4', 'test5'),
(6, '10000524.joan23@fje.edu', '1234', 'pablo'),
(10, 'dannyphantom@gmail.com', 'un10porfa', 'Danny');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_actividad`
--
ALTER TABLE `tbl_actividad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_actividad_gustada`
--
ALTER TABLE `tbl_actividad_gustada`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_actividad_fk` (`id_actividad`),
  ADD KEY `id_usuario_fk` (`id_usuario`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_actividad`
--
ALTER TABLE `tbl_actividad`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `tbl_actividad_gustada`
--
ALTER TABLE `tbl_actividad_gustada`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_actividad_gustada`
--
ALTER TABLE `tbl_actividad_gustada`
  ADD CONSTRAINT `id_actividad_fk` FOREIGN KEY (`id_actividad`) REFERENCES `tbl_actividad` (`id`),
  ADD CONSTRAINT `id_usuario_fk` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
