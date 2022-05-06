-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2022 a las 13:43:29
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
(2, 'Actividad1', 'Actividad de Prueba', 'C:/xampp/htdocs/www/M4-Lenguaje de Marcas/App-Actividades/img/actividades/1_1.gif', 'informatica', '2022-05-03 00:00:00', 'privada', 'http://localhost/www/M4-Lenguaje%20de%20Marcas/App-Actividades/view/actividad/1', 1, 0),
(12, 'Actividad3', 'Actividad de Prueba3', 'C:/xampp/htdocs/www/M4-Lenguaje de Marcas/App-Actividades/img/actividades/1_2.gif', 'informatica', '2022-05-04 00:00:00', 'privada', 'http://localhost/www/M4-Lenguaje%20de%20Marcas/App-Actividades/view/actividad?act=2', 1, 0),
(13, 'Actividad4', 'Actividad de Prueba4', 'C:/xampp/htdocs/www/M4-Lenguaje de Marcas/App-Actividades/img/actividades/1_13.png', 'informatica', '2022-05-04 00:00:00', 'privada', 'http://localhost/www/M4-Lenguaje%20de%20Marcas/App-Actividades/view/actividad?act=13', 1, 0),
(14, 'Actividad5', 'Actividad de Prueba5', 'C:/xampp/htdocs/www/M4-Lenguaje de Marcas/App-Actividades/img/actividades/1_14.gif', 'informatica', '2022-05-04 00:00:00', 'privada', 'http://localhost/www/M4-Lenguaje%20de%20Marcas/App-Actividades/view/actividad?act=14', 1, 0),
(15, 'Actividad6', 'Actividad de Prueba6', 'C:/xampp/htdocs/www/M4-Lenguaje de Marcas/App-Actividades/img/actividades/1_15.gif', 'matematicas', '2022-05-05 00:00:00', 'publica', 'http://localhost/www/M4-Lenguaje%20de%20Marcas/App-Actividades/view/actividad?act=15', 1, 4),
(16, 'p', 'p', 'C:/xampp/htdocs/www/M4-Lenguaje de Marcas/App-Actividades/img/actividades/6_16.jpeg', 'matematicas', '2022-05-05 00:00:00', 'publica', 'http://localhost/www/M4-Lenguaje%20de%20Marcas/App-Actividades/view/actividad?act=16', 6, 0),
(17, 'p', 'p', 'C:/xampp/htdocs/www/M4-Lenguaje de Marcas/App-Actividades/img/actividades/6_17.jpeg', 'matematicas', '2022-05-05 00:00:00', 'publica', 'http://localhost/www/M4-Lenguaje%20de%20Marcas/App-Actividades/view/actividad?act=17', 6, 0),
(18, 'p', 'p', 'C:/xampp/htdocs/www/M4-Lenguaje de Marcas/App-Actividades/img/actividades/6_18.gif', 'matematicas', '2022-05-05 00:00:00', 'publica', 'http://localhost/www/M4-Lenguaje%20de%20Marcas/App-Actividades/view/actividad?act=18', 6, 0),
(19, 'Actividad7', 'Actividad de Prueba7', 'C:/xampp/htdocs/www/M4-Lenguaje de Marcas/App-Actividades/img/actividades/1_19.png', 'informatica', '2022-05-05 00:00:00', 'publica', 'http://localhost/www/M4-Lenguaje%20de%20Marcas/App-Actividades/view/actividad?act=19', 1, 0),
(20, 'Actividad8', 'Actividad de Prueba8', 'C:/xampp/htdocs/www/M4-Lenguaje de Marcas/App-Actividades/img/actividades/1_20.gif', 'informatica', '2022-05-05 00:00:00', 'publica', 'http://localhost/www/M4-Lenguaje%20de%20Marcas/App-Actividades/view/actividad?act=20', 1, 0),
(21, 'Actividad9', 'Actividad de Prueba9', 'C:/xampp/htdocs/www/M4-Lenguaje de Marcas/App-Actividades/img/actividades/1_21.gif', 'matematicas', '2022-05-05 09:18:06', 'publica', 'http://localhost/www/M4-Lenguaje%20de%20Marcas/App-Actividades/view/actividad?act=21', 1, 0),
(22, 'Actividad10', 'Actividad de Prueba10', 'C:/xampp/htdocs/www/M4-Lenguaje de Marcas/App-Actividades/img/actividades/1_22.jpeg', 'informatica', '2022-05-05 09:32:07', 'publica', 'http://localhost/www/M4-Lenguaje%20de%20Marcas/App-Actividades/view/actividad?act=22', 1, 0),
(23, 'Actividad22', 'Actividad de Prueba22', 'C:/xampp/htdocs/www/M4-Lenguaje de Marcas/App-Actividades/img/actividades/1_23.png', 'informatica', '2022-05-05 11:43:51', 'publica', 'http://localhost/www/M4-Lenguaje%20de%20Marcas/App-Actividades/view/actividad.php?act=23', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_actividad_gustada`
--

CREATE TABLE `tbl_actividad_gustada` (
  `id` int(9) NOT NULL,
  `fecha_gustada` date DEFAULT NULL,
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
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `tbl_actividad_gustada`
--
ALTER TABLE `tbl_actividad_gustada`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
