-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 21-10-2021 a las 14:47:25
-- Versión del servidor: 10.6.4-MariaDB-1:10.6.4+maria~focal
-- Versión de PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Empleo`
--
CREATE DATABASE IF NOT EXISTS `database` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `database`;

CREATE TABLE `Empleo` (
  `id` int(11) NOT NULL,
  `Titulo` varchar(50) NOT NULL,
  `Empresa` varchar(25) NOT NULL,
  `Descripcion` text NOT NULL,
  `Localidad` varchar(25) NOT NULL,
  `Email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Empleo`
--

INSERT INTO `Empleo` (`id`, `Titulo`, `Empresa`, `Descripcion`, `Localidad`, `Email`) VALUES
(1, 'asdfghjk', 'dfghj', '', 'sdfghjkl', 'email@otro.mas'),
(2, 'Ejemplo 2', 'Empresa 2', '', 'Bilbao', 'otroemail@gmail.com'),
(3, 'Empleo de ejemplo', 'Empresa 1', '', 'Bilbao', 'otroemail@gmail.com'),
(4, 'Hola', 'que tal', '', 'yo bien y tu', 'yo@tambien.bien'),
(5, 'Otro mas', 'y otro', '', 'y otro', 'y@otro.mas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
  `NombreApellidos` varchar(100) NOT NULL,
  `Email` varchar(64) NOT NULL,
  `Contraseña` varchar(32) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Telefono` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Empleo`
--
ALTER TABLE `Empleo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`Email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Empleo`
--
ALTER TABLE `Empleo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
