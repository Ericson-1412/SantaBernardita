-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 30-06-2025 a las 04:26:51
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
(6, 'Daniela', 'Soto', 14, '23451122', 'Femenino', 'Miraflores', '2025-06-29 21:11:52'),
(7, 'Mateo', 'Ramirez', 13, '34561234', 'Masculino', 'Los Olivos', '2025-06-29 21:11:52'),
(8, 'Samantha', 'Lopez', 15, '45672345', 'Femenino', 'San Miguel', '2025-06-29 21:11:52'),
(9, 'Bruno', 'Salas', 12, '56783456', 'Masculino', 'Surco', '2025-06-29 21:11:52'),
(10, 'Valeria', 'Perez', 16, '67894567', 'Femenino', 'La Molina', '2025-06-29 21:11:52'),
(11, 'Gabriel', 'Rojas', 13, '78905678', 'Masculino', 'Ate', '2025-06-29 21:11:52'),
(12, 'Alejandra', 'Vega', 14, '89016789', 'Femenino', 'San Juan', '2025-06-29 21:11:52'),
(13, 'Lucas', 'Diaz', 15, '90127890', 'Masculino', 'Independencia', '2025-06-29 21:11:52'),
(14, 'Camila', 'Torres', 12, '01238901', 'Femenino', 'Villa El Salvador', '2025-06-29 21:11:52'),
(15, 'Emiliano', 'Morales', 13, '12349012', 'Masculino', 'San Borja', '2025-06-29 21:11:52'),
(16, 'Luciana', 'Castillo', 15, '23450123', 'Femenino', 'Breña', '2025-06-29 21:11:52'),
(17, 'Sebastian', 'Campos', 14, '34561234', 'Masculino', 'Callao', '2025-06-29 21:11:52'),
(18, 'Isabella', 'Herrera', 12, '45672345', 'Femenino', 'Surquillo', '2025-06-29 21:11:52'),
(19, 'Thiago', 'Gomez', 13, '56783456', 'Masculino', 'San Luis', '2025-06-29 21:11:52'),
(20, 'Mia', 'Cruz', 16, '67894567', 'Femenino', 'Lince', '2025-06-29 21:11:52'),
(21, 'Diego', 'Martinez', 11, '78905678', 'Masculino', 'Chorrillos', '2025-06-29 21:11:52'),
(22, 'Valentina', 'Navarro', 14, '89016789', 'Femenino', 'Pueblo Libre', '2025-06-29 21:11:52'),
(23, 'Benjamín', 'Aguilar', 15, '90127890', 'Masculino', 'Rímac', '2025-06-29 21:11:52'),
(24, 'Antonia', 'Garcia', 13, '01238901', 'Femenino', 'Barranco', '2025-06-29 21:11:52'),
(25, 'Dylan', 'Sanchez', 12, '12349012', 'Masculino', 'Villa María', '2025-06-29 21:11:52'),
(26, 'Martina', 'Flores', 13, '23450123', 'Femenino', 'El Agustino', '2025-06-29 21:11:52'),
(27, 'Joaquín', 'Mendoza', 14, '34561234', 'Masculino', 'La Victoria', '2025-06-29 21:11:52'),
(28, 'Renata', 'Ortega', 15, '45672345', 'Femenino', 'Carabayllo', '2025-06-29 21:11:52'),
(29, 'Andrés', 'Reyes', 11, '56783456', 'Masculino', 'San Martín', '2025-06-29 21:11:52'),
(30, 'Zoe', 'Delgado', 13, '67894567', 'Femenino', 'San Isidro', '2025-06-29 21:11:52'),
(31, 'Tomás', 'Valdez', 14, '78905678', 'Masculino', 'San Juan de Lurigancho', '2025-06-29 21:11:52'),
(32, 'Sofia', 'Peña', 15, '89016789', 'Femenino', 'Jesús María', '2025-06-29 21:11:52'),
(33, 'Maximiliano', 'Fernandez', 12, '90127890', 'Masculino', 'Cercado', '2025-06-29 21:11:52'),
(34, 'Ariana', 'Chavez', 13, '01238901', 'Femenino', 'Magdalena', '2025-06-29 21:11:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padres`
--

CREATE TABLE `padres` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `dni` varchar(15) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `ocupacion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `padres`
--

INSERT INTO `padres` (`id`, `nombres`, `apellidos`, `dni`, `telefono`, `direccion`, `ocupacion`) VALUES
(4, 'Luis', 'Ramirez', '43211234', '987654321', 'Lima', 'Ingeniero'),
(5, 'María', 'Gonzales', '40221122', '984112233', 'Arequipa', 'Doctora'),
(6, 'Carlos', 'Fernandez', '42112233', '987111222', 'Cusco', 'Profesor'),
(7, 'Julia', 'Lopez', '40112211', '989334455', 'Piura', 'Abogada'),
(8, 'Juan', 'Torres', '41223344', '988112233', 'Chiclayo', 'Arquitecto'),
(9, 'Ana', 'Salas', '42234455', '986776655', 'Trujillo', 'Contadora'),
(10, 'Pedro', 'Rios', '43321122', '984445566', 'Iquitos', 'Policía'),
(11, 'Lucía', 'Mendoza', '44412233', '987223344', 'Huancayo', 'Ingeniera'),
(12, 'Marco', 'Sanchez', '45513322', '981112233', 'Tacna', 'Médico'),
(13, 'Clara', 'Huaman', '46614411', '982334455', 'Puno', 'Chef'),
(14, 'Diana', 'Quispe', '47715566', '985667788', 'Moquegua', 'Psicóloga'),
(15, 'Jorge', 'Espinoza', '48816677', '984998877', 'Lambayeque', 'Chofer'),
(16, 'Yolanda', 'Alvarez', '49917788', '986554433', 'Loreto', 'Empresaria'),
(17, 'Hugo', 'Cruz', '40018899', '981223344', 'Tumbes', 'Veterinario'),
(18, 'Carmen', 'Silva', '41119900', '982334466', 'Madre de Dios', 'Dentista'),
(19, 'Rafael', 'Rojas', '42221011', '983445577', 'Ucayali', 'Gerente'),
(20, 'Isabel', 'Mejia', '43322122', '984556688', 'Ancash', 'Diseñadora'),
(21, 'Oscar', 'Peña', '44423233', '985667799', 'Pasco', 'Analista'),
(22, 'Sofia', 'Castro', '45524344', '986778800', 'Callao', 'Enfermera'),
(23, 'Fernando', 'Reyes', '46625455', '987889911', 'Huánuco', 'Técnico'),
(24, 'Liliana', 'Aguilar', '47726566', '988990022', 'Ayacucho', 'Terapista'),
(25, 'Miguel', 'Valdez', '48827677', '989101133', 'Apurímac', 'Mecánico'),
(26, 'Patricia', 'Garcia', '49928788', '980212344', 'Ica', 'Farmacéutica'),
(27, 'Ricardo', 'Cabrera', '40029899', '981323455', 'San Martín', 'Administrador'),
(28, 'Gloria', 'Vargas', '41121000', '982434566', 'Amazonas', 'Maestra'),
(29, 'Nelson', 'Flores', '42222111', '983545677', 'Cajamarca', 'Panadero'),
(30, 'Fabiola', 'Herrera', '43323222', '984656788', 'Junín', 'Odontóloga'),
(31, 'Arturo', 'Navarro', '44424333', '985767899', 'Huancavelica', 'Consultor'),
(32, 'Lorena', 'Delgado', '45525444', '986878900', 'Pisco', 'Bióloga'),
(33, 'Victor', 'Soto', '46626555', '987989011', 'Nazca', 'Albañil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padre_adolescente`
--

CREATE TABLE `padre_adolescente` (
  `id` int(11) NOT NULL,
  `id_padre` int(11) NOT NULL,
  `id_adolescente` int(11) NOT NULL,
  `observaciones` text DEFAULT NULL,
  `tipo_relacion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_usuario`
--

CREATE TABLE `tm_usuario` (
  `usu_id` int(11) NOT NULL,
  `usu_nom` varchar(150) NOT NULL,
  `usu_apep` varchar(150) NOT NULL,
  `usu_apem` varchar(150) NOT NULL,
  `usu_correo` varchar(150) NOT NULL,
  `usu_pass` varchar(12) NOT NULL,
  `usu_sex` varchar(1) NOT NULL,
  `usu_telf` varchar(9) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `fech_crea` datetime DEFAULT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tm_usuario`
--

INSERT INTO `tm_usuario` (`usu_id`, `usu_nom`, `usu_apep`, `usu_apem`, `usu_correo`, `usu_pass`, `usu_sex`, `usu_telf`, `rol_id`, `fech_crea`, `est`) VALUES
(1, 'Ericson Olimpio', 'Urbano', 'Poma', 'admin@gmail.com', '12345678', 'M', '971885783', 1, '2024-09-17 14:32:39', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adolescentes`
--
ALTER TABLE `adolescentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `padres`
--
ALTER TABLE `padres`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `padre_adolescente`
--
ALTER TABLE `padre_adolescente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_padre` (`id_padre`),
  ADD KEY `id_adolescente` (`id_adolescente`);

--
-- Indices de la tabla `tm_usuario`
--
ALTER TABLE `tm_usuario`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adolescentes`
--
ALTER TABLE `adolescentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `padres`
--
ALTER TABLE `padres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `padre_adolescente`
--
ALTER TABLE `padre_adolescente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tm_usuario`
--
ALTER TABLE `tm_usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `padre_adolescente`
--
ALTER TABLE `padre_adolescente`
  ADD CONSTRAINT `padre_adolescente_ibfk_1` FOREIGN KEY (`id_padre`) REFERENCES `padres` (`id`),
  ADD CONSTRAINT `padre_adolescente_ibfk_2` FOREIGN KEY (`id_adolescente`) REFERENCES `adolescentes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
