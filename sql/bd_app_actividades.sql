-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-05-2022 a las 09:09:49
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
(26, 'danny', 'Danny Larrea profesor de lenguajes de marca', 'C:/xampp/htdocs/www/M4-Lenguaje de Marcas/App-Actividades/img/actividades/6_1.png', 'informatica', '2022-05-10 11:50:50', 'publica', 'http://localhost/www/M4-Lenguaje%20de%20Marcas/App-Actividades/view/actividad.php?act=1', 6, 0),
(27, 'danny2', 'Danny Larrea profesor de lenguajes de marca', 'C:/xampp/htdocs/www/M4-Lenguaje de Marcas/App-Actividades/img/actividades/6_27.png', 'matematicas', '2022-05-10 11:51:07', 'publica', 'http://localhost/www/M4-Lenguaje%20de%20Marcas/App-Actividades/view/actividad.php?act=27', 6, 0),
(29, 'danny3', 'Danny Larrea profesor de lenguajes de marca', 'C:/xampp/htdocs/www/M4-Lenguaje de Marcas/App-Actividades/img/actividades/6_28.png', 'informatica', '2022-05-10 11:53:40', 'publica', 'http://localhost/www/M4-Lenguaje%20de%20Marcas/App-Actividades/view/actividad.php?act=28', 6, 0),
(30, 'danny4', 'Danny Larrea profesor de lenguajes de marca', 'C:/xampp/htdocs/www/M4-Lenguaje de Marcas/App-Actividades/img/actividades/6_30.png', 'matematicas', '2022-05-10 11:54:13', 'publica', 'http://localhost/www/M4-Lenguaje%20de%20Marcas/App-Actividades/view/actividad.php?act=30', 6, 0),
(31, 'danny5', 'Danny Larrea profesor de lenguajes de marca', 'C:/xampp/htdocs/www/M4-Lenguaje de Marcas/App-Actividades/img/actividades/6_31.png', 'matematicas', '2022-05-10 11:54:28', 'publica', 'http://localhost/www/M4-Lenguaje%20de%20Marcas/App-Actividades/view/actividad.php?act=31', 6, 0),
(32, 'danny6', 'Danny Larrea profesor de lenguajes de marca', 'C:/xampp/htdocs/www/M4-Lenguaje de Marcas/App-Actividades/img/actividades/6_32.png', 'matematicas', '2022-05-10 11:54:56', 'publica', 'http://localhost/www/M4-Lenguaje%20de%20Marcas/App-Actividades/view/actividad.php?act=32', 6, 0),
(33, 'danny7', 'Danny Larrea profesor de lenguajes de marca', 'C:/xampp/htdocs/www/M4-Lenguaje de Marcas/App-Actividades/img/actividades/6_33.png', 'informatica', '2022-05-10 11:55:57', 'publica', 'http://localhost/www/M4-Lenguaje%20de%20Marcas/App-Actividades/view/actividad.php?act=33', 6, 0);

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
(6, '10000524.joan23@fje.edu', '1234', 'pablo');

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
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `tbl_actividad_gustada`
--
ALTER TABLE `tbl_actividad_gustada`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
