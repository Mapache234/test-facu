-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-12-2017 a las 22:57:53
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `form_indeseables`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indeseables`
--

CREATE TABLE `indeseables` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `indeseables`
--

INSERT INTO `indeseables` (`id`, `nombre`, `nacimiento`) VALUES
(1, 'Jon Jota Johnson', '2010-12-22'),
(3, 'Lindas Tetas', '1998-12-01'),
(4, 'Idiota deforme me parece que hay una cuca TROLA', '1860-10-30'),
(7, 'Forro Usa Do Frica', '1999-10-01'),
(10, 'CoÃ±o Joven', '2017-12-05'),
(33, 'Roberto Piazza', '1985-12-08'),
(34, 'Hugo Gelblum', '1976-11-01'),
(35, 'Pene IntergalÃ¡ctico', '1967-11-12'),
(36, 'Dick Alfredo', '1720-10-15'),
(37, 'Pepe La Peste', '1975-05-03'),
(39, 'Pepa Indigesta', '1257-01-01'),
(42, 'OrÃ©gano', '0001-02-11'),
(43, 'Manchao', '0001-01-01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `indeseables`
--
ALTER TABLE `indeseables`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `indeseables`
--
ALTER TABLE `indeseables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
