-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-08-2025 a las 18:38:10
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agendacontactos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_contactos`
--

-- phpMyAdmin SQL Dump
-- Base de datos: `agendacontactos`
-- Dump generado: 28-08-2025

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------
-- Tabla `t_contactos`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `t_contactos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apellido_paterno` varchar(50) NOT NULL,
  `apellido_materno` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Tabla `t_fotos`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `t_fotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_contacto` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `ruta` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_contacto` (`id_contacto`),
  CONSTRAINT `t_fotos_ibfk_1` FOREIGN KEY (`id_contacto`) REFERENCES `t_contactos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

COMMIT;
--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_contactos`
--
ALTER TABLE `t_contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `t_fotos`
--
ALTER TABLE `t_fotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_contactos` (`id_contactos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_contactos`
--
ALTER TABLE `t_contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_fotos`
--
ALTER TABLE `t_fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_fotos`
--
ALTER TABLE `t_fotos`
  ADD CONSTRAINT `t_fotos_ibfk_1` FOREIGN KEY (`id_contactos`) REFERENCES `t_contactos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
