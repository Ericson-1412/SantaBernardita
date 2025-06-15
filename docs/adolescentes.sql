-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 16-06-2025 a las 00:00:59
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
-- Base de datos: `bernardita`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adolescentes`
--

CREATE TABLE `adolescentes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `dni` char(8) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `direccion` text NOT NULL,
  `fecha_registro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `adolescentes`
--

INSERT INTO `adolescentes` (`id`, `nombres`, `apellidos`, `edad`, `dni`, `sexo`, `direccion`, `fecha_registro`) VALUES
(3, 'Ericson', 'Urbano', 11, '12341223', 'Masculino', 'comas', '2025-06-15 16:59:27'),
(4, 'Alison', 'Alcantara', 15, '12121211', 'Femenino', 'trujillo', '2025-06-15 16:59:50');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adolescentes`
--
ALTER TABLE `adolescentes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adolescentes`
--
ALTER TABLE `adolescentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
