-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2017 a las 21:44:33
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
  `idAlumno` int(11) NOT NULL DEFAULT '0',
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `identidadAl` bigint(16) DEFAULT NULL,
  `estado_idEstado` int(11) NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `genero` varchar(45) DEFAULT NULL,
  `rh` varchar(45) DEFAULT NULL,
  `dir` varchar(45) DEFAULT NULL,
  `celular` decimal(10,0) DEFAULT NULL,
  `condicion` varchar(45) DEFAULT NULL,
  `grado_idGrado` int(11) NOT NULL,
  `matricula_idMatricula` int(11) NOT NULL,
  `cedulaAcu` bigint(20) DEFAULT NULL,
  `nombreAcu` varchar(100) DEFAULT NULL,
  `dirAcu` varchar(150) DEFAULT NULL,
  `celAcu` bigint(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`idAlumno`, `nombre`, `apellido`, `identidadAl`, `estado_idEstado`, `foto`, `nacimiento`, `genero`, `rh`, `dir`, `celular`, `condicion`, `grado_idGrado`, `matricula_idMatricula`, `cedulaAcu`, `nombreAcu`, `dirAcu`, `celAcu`) VALUES
(13, 'Alumno Presco 2', 'Ortiz Garzón M', 12, 1, NULL, '0000-00-00', 'Masculino', 'O+', '12', '12', NULL, 13, 1, 12, '12', '12', 12),
(44, 'Nombre Presco', '3', 43, 1, NULL, '0000-00-00', 'Masculino', 'O+', '3', '3', NULL, 7, 1, 3, '3', '3', 3),
(7778, 'Leonel', 'Caicedo Buitrago 1', 7777, 1, NULL, '0000-00-00', 'M', 'O+', '1', '1', NULL, 13, 1, 1, '1', '1', 1),
(8889, 'Alumno Presco', 'Apellido Presco', 8888, 1, NULL, '0000-00-00', 'Masculino', 'O+', 'Dir Prueba 1', '1', NULL, 13, 1, 1, 'A', 'A', 1),
(55578, 'Alirio Presco', 'Apellido Prueba', 55577, 1, NULL, '0000-00-00', 'Masculino', 'O+', 'Los Hoyos', '1', NULL, 13, 1, 1, 'Casimira Gonzales', 'Pitalito', 1),
(134424, '555', '1231', 134423, 1, NULL, '0000-00-00', 'Masculino', 'O+', '12', '12', NULL, 1, 1, 12234, 'asd', 'asd', 123123),
(5556678, 'Latencia', 'asdasd', 5556677, 1, NULL, '2017-03-15', 'Masculino', 'O+', '12', '121', NULL, 1, 1, 1221, '1212', '1212', 1212),
(12168334, 'Valentina A', 'Ramirez', 12168333, 1, NULL, '0000-00-00', 'M', 'A+', 'San Lorenzo', '3126665847', NULL, 3, 1, 36113245, 'Casimira Gonzales', 'La arboleda', 3126665847),
(12168385, 'Michael J', 'Scotfield', 121683843, 1, 'sin foto', '0000-00-00', 'M', 'O+', 'Belén', '3126665895', NULL, 1, 1, 12168384, 'Olga Lucía Garzón', 'Belén', 3126665895),
(12312313, 'Juanto ', 'Ordoñez', 12312312, 1, 'sin foto', '0000-00-00', 'M', 'O+', 'asd', '23423', NULL, 1, 1, 12312312, 'asd', 'asd', 123123),
(13435235, 'Alumno Noveno', 'Apellido Noveno', 13435234, 1, NULL, '0000-00-00', 'Masculino', 'B+', 'Dir Prueba 1', '13435234', NULL, 9, 1, 13435234, 'Lidia Pillimue', 'Pitalito', 13435234),
(23456453, 'Angelica ', 'Buitrago', 23456452, 1, NULL, '0000-00-00', 'Femenino', 'O+', 'Dir Prueba 1', '9999999999', NULL, 9, 1, 23456452, 'Yeison Caicedo', 'Bogotá', 31234523423),
(99988878, 'Probencio con fecha', 'MSI', 99988877, 1, NULL, NULL, 'Masculino', 'O+', '5555', '555', NULL, 1, 1, 5555, '555', '555', 555),
(1084257413, 'Andres', 'Rodriguez', 1084257412, 1, NULL, '0000-00-00', 'Masculino', 'AB+', 'San Lorenzo', '3124445854', NULL, 8, 1, 1084257412, 'Casimira Gonzales', 'San Lorenzo', 3124445854),
(1084258334, 'Ana Milena', 'Ñañez Ijají', 1084258333, 1, 'sin foto', '0000-00-00', 'M', 'O+', 'Divino Niño', '3126665895', NULL, 1, 1, 36113277, 'Olga Lucía Garzón', 'Divino Niño', 3203488788),
(1084258764, 'Leonel', 'Jimenez', 1084258763, 1, NULL, '0000-00-00', 'Masculino', 'O+', 'La Florida', '3204158745', NULL, 3, 1, 1084258763, 'Lidia Pillimue', 'Pitalito', 3204158745),
(1084567847, 'Jhonny', 'Alirio', 1084567846, 1, 'sin foto', '0000-00-00', 'M', 'O+', 'Dir Prueba 1', '3126664576', NULL, 1, 1, 345565234, 'Virgilio Rodriguez M', 'Pitalito', 3126664576),
(1084567850, 'Maelo', 'Ruiz', 1084567849, 1, 'sin foto', '0000-00-00', 'Masculino', 'O+', 'Dir Prueba 1', '312665879', NULL, 1, 1, 1084567849, 'Virgilio Rodriguez M', 'Pitalito', 312665879),
(2147483647, 'Deisy', 'Velasco', 2147483647, 2, 'sin foto', '0000-00-00', 'M', 'O+', 'Alto Grande', '3124454522', NULL, 1, 1, 123354234, 'Lidia Pillimue', 'Piendamó', 3124454522);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anio`
--

CREATE TABLE IF NOT EXISTS `anio` (
`idAnio` int(11) NOT NULL,
  `numeroAnio` int(11) DEFAULT NULL,
  `anioRectora` varchar(80) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2020 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `anio`
--

INSERT INTO `anio` (`idAnio`, `numeroAnio`, `anioRectora`) VALUES
(2017, 2017, 'María Melba Rodriguez'),
(2018, 2018, 'Nombre Rectora 2018'),
(2019, 2019, 'Rectora Prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE IF NOT EXISTS `citas` (
`idCita` int(11) NOT NULL,
  `diaC` date NOT NULL,
  `horaC` time NOT NULL,
  `paciente` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`idCita`, `diaC`, `horaC`, `paciente`) VALUES
(1, '2017-02-15', '10:06:24', 0),
(2, '2017-02-15', '10:06:24', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `idEstado` int(11) NOT NULL,
  `tipoEstado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idEstado`, `tipoEstado`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE IF NOT EXISTS `grado` (
`idGrado` int(11) NOT NULL,
  `nombreGrado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`idGrado`, `nombreGrado`) VALUES
(1, 'Primero'),
(2, 'Segundo'),
(3, 'Tercero'),
(4, 'Cuarto'),
(5, 'Quinto'),
(6, 'Sexto'),
(7, 'Séptimo'),
(8, 'Octavo'),
(9, 'Noveno'),
(10, 'Décimo'),
(11, 'Undécimo'),
(13, 'Preescolar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logros`
--

CREATE TABLE IF NOT EXISTS `logros` (
`idLogro` int(11) NOT NULL,
  `fortaleza` varchar(700) DEFAULT NULL,
  `debilidad` varchar(700) DEFAULT NULL,
  `materia_idMateria` int(11) NOT NULL,
  `periodo_idPeriodo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=553 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `logros`
--

INSERT INTO `logros` (`idLogro`, `fortaleza`, `debilidad`, `materia_idMateria`, `periodo_idPeriodo`) VALUES
(1, 'Es bueno aprendiendo matemáticas para su edad', 'Necesita mejorar el aprendizaje numérico', 1, 1),
(2, 'Es bueno con los números', 'Le falta práctica con los números', 1, 2),
(3, 'Es bueno con los números', 'Le falta práctica con los números', 1, 3),
(4, 'Fortaleza editada', 'Debilidad Editada', 1, 4),
(5, 'Es bueno con los números', 'Le falta práctica con los números', 2, 1),
(6, 'Es bueno con los números', 'Le falta práctica con los números', 2, 2),
(7, 'Es bueno con los números', 'Le falta práctica con los números', 2, 3),
(8, 'Es bueno con los números', 'Le falta práctica con los números', 2, 4),
(9, 'Es bueno con los números', 'Le falta práctica con los números', 3, 1),
(10, 'Es bueno con los números', 'Le falta práctica con los números', 3, 2),
(11, 'Es bueno con los números', 'Le falta práctica con los números', 3, 3),
(12, 'Es bueno con los números', 'Le falta práctica con los números', 3, 4),
(13, 'Es bueno con los números', 'Le falta práctica con los números', 4, 1),
(14, 'Es bueno con los números', 'Le falta práctica con los números', 4, 2),
(15, 'Es bueno con los números', 'Le falta práctica con los números', 4, 3),
(16, 'Es bueno con los números', 'Le falta práctica con los números', 4, 4),
(17, 'Es bueno con los números', 'Le falta práctica con los números', 5, 1),
(18, 'Es bueno con los números', 'Le falta práctica con los números', 5, 2),
(19, 'Es bueno con los números', 'Le falta práctica con los números', 5, 3),
(20, 'Es bueno con los números', 'Le falta práctica con los números', 5, 4),
(21, 'Es bueno con los números', 'Le falta práctica con los números', 6, 1),
(22, 'Es bueno con los números', 'Le falta práctica con los números', 6, 2),
(23, 'Es bueno con los números', 'Le falta práctica con los números', 6, 3),
(24, 'Es bueno con los números', 'Le falta práctica con los números', 6, 4),
(25, 'Es bueno con los números', 'Le falta práctica con los números', 7, 1),
(26, 'Es bueno con los números', 'Le falta práctica con los números', 7, 2),
(27, 'Es bueno con los números', 'Le falta práctica con los números', 7, 3),
(28, 'Es bueno con los números', 'Le falta práctica con los números', 7, 4),
(29, 'Es bueno con los números', 'Le falta práctica con los números', 8, 1),
(30, 'Es bueno con los números', 'Le falta práctica con los números', 8, 2),
(31, 'Es bueno con los números', 'Le falta práctica con los números', 8, 3),
(32, 'Es bueno con los números', 'Le falta práctica con los números', 8, 4),
(33, 'Es bueno con los números', 'Le falta práctica con los números', 9, 1),
(34, 'Es bueno con los números', 'Le falta práctica con los números', 9, 2),
(35, 'Es bueno con los números', 'Le falta práctica con los números', 9, 3),
(36, 'Es bueno con los números', 'Le falta práctica con los números', 9, 4),
(37, 'Es bueno con los números', 'Le falta práctica con los números', 10, 1),
(38, 'Es bueno con los números', 'Le falta práctica con los números', 10, 2),
(39, 'Es bueno con los números', 'Le falta práctica con los números', 10, 3),
(40, 'Es bueno con los números', 'Le falta práctica con los números', 10, 4),
(41, ' Es bueno con los números Mate 1', 'Le falta práctica con los números deb1', 11, 1),
(42, 'Es bueno con los números', 'Le falta práctica con los números', 11, 2),
(43, 'Es bueno con los números', 'Le falta práctica con los números', 11, 3),
(44, 'Es bueno con los números', 'Le falta práctica con los números', 11, 4),
(45, 'Aprende las letras rápidamente', 'Falta pracitcar un poco con el abecedario', 12, 1),
(46, 'Es bueno con los números', 'Le falta práctica con los números', 12, 2),
(47, 'Es bueno con los números', 'Le falta práctica con los números', 12, 3),
(48, 'Es bueno con los números', 'Le falta práctica con los números', 12, 4),
(49, 'Es bueno con los números', 'Le falta práctica con los números', 13, 1),
(50, 'Es bueno con los números', 'Le falta práctica con los números', 13, 2),
(51, 'Es bueno con los números', 'Le falta práctica con los números', 13, 3),
(52, 'Es bueno con los números', 'Le falta práctica con los números', 13, 4),
(53, 'Es bueno con los números', 'Le falta práctica con los números', 14, 1),
(54, 'Es bueno con los números', 'Le falta práctica con los números', 14, 2),
(55, 'Es bueno con los números', 'Le falta práctica con los números', 14, 3),
(56, 'Es bueno con los números', 'Le falta práctica con los números', 14, 4),
(57, 'Es bueno con los números', 'Le falta práctica con los números', 15, 1),
(58, 'Es bueno con los números', 'Le falta práctica con los números', 15, 2),
(59, 'Es bueno con los números', 'Le falta práctica con los números', 15, 3),
(60, 'Es bueno con los números', 'Le falta práctica con los números', 15, 4),
(61, 'Es bueno con los números', 'Le falta práctica con los números', 16, 1),
(62, 'Es bueno con los números', 'Le falta práctica con los números', 16, 2),
(63, 'Es bueno con los números', 'Le falta práctica con los números', 16, 3),
(64, 'Es bueno con los números', 'Le falta práctica con los números', 16, 4),
(65, 'Es bueno con los números', 'Le falta práctica con los números', 17, 1),
(66, 'Es bueno con los números', 'Le falta práctica con los números', 17, 2),
(67, 'Es bueno con los números', 'Le falta práctica con los números', 17, 3),
(68, 'Es bueno con los números', 'Le falta práctica con los números', 17, 4),
(69, 'Es bueno con los números', 'Le falta práctica con los números', 18, 1),
(70, 'Es bueno con los números', 'Le falta práctica con los números', 18, 2),
(71, 'Es bueno con los números', 'Le falta práctica con los números', 18, 3),
(72, 'Es bueno con los números', 'Le falta práctica con los números', 18, 4),
(73, 'Es bueno con los números', 'Le falta práctica con los números', 19, 1),
(74, 'Es bueno con los números', 'Le falta práctica con los números', 19, 2),
(75, 'Es bueno con los números', 'Le falta práctica con los números', 19, 3),
(76, 'Es bueno con los números', 'Le falta práctica con los números', 19, 4),
(77, 'Es bueno con los números', 'Le falta práctica con los números', 20, 1),
(78, 'Es bueno con los números', 'Le falta práctica con los números', 20, 2),
(79, 'Es bueno con los números', 'Le falta práctica con los números', 20, 3),
(80, 'Es bueno con los números', 'Le falta práctica con los números', 20, 4),
(81, 'Realiza sumas', 'No sabe los números', 21, 1),
(82, 'Es bueno con los números', 'Le falta práctica con los números', 21, 2),
(83, 'Es bueno con los números', 'Le falta práctica con los números', 21, 3),
(84, 'Es bueno con los números', 'Le falta práctica con los números', 21, 4),
(85, 'Es bueno con los números', 'Le falta práctica con los números', 22, 1),
(86, 'Es bueno con los números', 'Le falta práctica con los números', 22, 2),
(87, 'Es bueno con los números', 'Le falta práctica con los números', 22, 3),
(88, 'Es bueno con los números', 'Le falta práctica con los números', 22, 4),
(89, 'Es bueno con los números', 'Le falta práctica con los números', 23, 1),
(90, 'Es bueno con los números', 'Le falta práctica con los números', 23, 2),
(91, 'Es bueno con los números', 'Le falta práctica con los números', 23, 3),
(92, 'Es bueno con los números', 'Le falta práctica con los números', 23, 4),
(93, 'Es bueno con los números', 'Le falta práctica con los números', 24, 1),
(94, 'Es bueno con los números', 'Le falta práctica con los números', 24, 2),
(95, 'Es bueno con los números', 'Le falta práctica con los números', 24, 3),
(96, 'Es bueno con los números', 'Le falta práctica con los números', 24, 4),
(97, 'Es bueno con los números', 'Le falta práctica con los números', 25, 1),
(98, 'Es bueno con los números', 'Le falta práctica con los números', 25, 2),
(99, 'Es bueno con los números', 'Le falta práctica con los números', 25, 3),
(100, 'Es bueno con los números', 'Le falta práctica con los números', 25, 4),
(101, 'Es bueno con los números', 'Le falta práctica con los números', 26, 1),
(102, 'Es bueno con los números', 'Le falta práctica con los números', 26, 2),
(103, 'Es bueno con los números', 'Le falta práctica con los números', 26, 3),
(104, 'Es bueno con los números', 'Le falta práctica con los números', 26, 4),
(105, 'Es bueno con los números', 'Le falta práctica con los números', 27, 1),
(106, 'Es bueno con los números', 'Le falta práctica con los números', 27, 2),
(107, 'Es bueno con los números', 'Le falta práctica con los números', 27, 3),
(108, 'Es bueno con los números', 'Le falta práctica con los números', 27, 4),
(109, 'Es bueno con los números', 'Le falta práctica con los números', 28, 1),
(110, 'Es bueno con los números', 'Le falta práctica con los números', 28, 2),
(111, 'Es bueno con los números', 'Le falta práctica con los números', 28, 3),
(112, 'Es bueno con los números', 'Le falta práctica con los números', 28, 4),
(113, 'Es bueno con los números', 'Le falta práctica con los números', 29, 1),
(114, 'Es bueno con los números', 'Le falta práctica con los números', 29, 2),
(115, 'Es bueno con los números', 'Le falta práctica con los números', 29, 3),
(116, 'Es bueno con los números', 'Le falta práctica con los números', 29, 4),
(117, 'Es bueno con los números', 'Le falta práctica con los números', 30, 1),
(118, 'Es bueno con los números', 'Le falta práctica con los números', 30, 2),
(119, 'Es bueno con los números', 'Le falta práctica con los números', 30, 3),
(120, 'Es bueno con los números', 'Le falta práctica con los números', 30, 4),
(121, 'Es bueno con los números', 'Le falta práctica con los números', 31, 1),
(122, 'Es bueno con los números', 'Le falta práctica con los números', 31, 2),
(123, 'Es bueno con los números', 'Le falta práctica con los números', 31, 3),
(124, 'Es bueno con los números', 'Le falta práctica con los números', 31, 4),
(125, 'Es bueno con los números', 'Le falta práctica con los números', 32, 1),
(126, 'Es bueno con los números', 'Le falta práctica con los números', 32, 2),
(127, 'Es bueno con los números', 'Le falta práctica con los números', 32, 3),
(128, 'Es bueno con los números', 'Le falta práctica con los números', 32, 4),
(129, 'Es bueno con los números', 'Le falta práctica con los números', 33, 1),
(130, 'Es bueno con los números', 'Le falta práctica con los números', 33, 2),
(131, 'Es bueno con los números', 'Le falta práctica con los números', 33, 3),
(132, 'Es bueno con los números', 'Le falta práctica con los números', 33, 4),
(133, 'Es bueno con los números', 'Le falta práctica con los números', 34, 1),
(134, 'Es bueno con los números', 'Le falta práctica con los números', 34, 2),
(135, 'Es bueno con los números', 'Le falta práctica con los números', 34, 3),
(136, 'Es bueno con los números', 'Le falta práctica con los números', 34, 4),
(137, 'Es bueno con los números', 'Le falta práctica con los números', 35, 1),
(138, 'Es bueno con los números', 'Le falta práctica con los números', 35, 2),
(139, 'Es bueno con los números', 'Le falta práctica con los números', 35, 3),
(140, 'Es bueno con los números', 'Le falta práctica con los números', 35, 4),
(141, 'Es bueno con los números', 'Le falta práctica con los números', 36, 1),
(142, 'Es bueno con los números', 'Le falta práctica con los números', 36, 2),
(143, 'Es bueno con los números', 'Le falta práctica con los números', 36, 3),
(144, 'Es bueno con los números', 'Le falta práctica con los números', 36, 4),
(145, 'Es bueno con los números', 'Le falta práctica con los números', 37, 1),
(146, 'Es bueno con los números', 'Le falta práctica con los números', 37, 2),
(147, 'Es bueno con los números', 'Le falta práctica con los números', 37, 3),
(148, 'Es bueno con los números', 'Le falta práctica con los números', 37, 4),
(149, 'Es bueno con los números', 'Le falta práctica con los números', 38, 1),
(150, 'Es bueno con los números', 'Le falta práctica con los números', 38, 2),
(151, 'Es bueno con los números', 'Le falta práctica con los números', 38, 3),
(152, 'Es bueno con los números', 'Le falta práctica con los números', 38, 4),
(153, 'Es bueno con los números', 'Le falta práctica con los números', 39, 1),
(154, 'Es bueno con los números', 'Le falta práctica con los números', 39, 2),
(155, 'Es bueno con los números', 'Le falta práctica con los números', 39, 3),
(156, 'Es bueno con los números', 'Le falta práctica con los números', 39, 4),
(157, 'Es bueno con los números', 'Le falta práctica con los números', 40, 1),
(158, 'Es bueno con los números', 'Le falta práctica con los números', 40, 2),
(159, 'Es bueno con los números', 'Le falta práctica con los números', 40, 3),
(160, 'Es bueno con los números', 'Le falta práctica con los números', 40, 4),
(161, 'Es bueno con los números', 'Le falta práctica con los números', 41, 1),
(162, 'Es bueno con los números', 'Le falta práctica con los números', 41, 2),
(163, 'Es bueno con los números', 'Le falta práctica con los números', 41, 3),
(164, 'Es bueno con los números', 'Le falta práctica con los números', 41, 4),
(165, 'Es bueno con los números', 'Le falta práctica con los números', 42, 1),
(166, 'Es bueno con los números', 'Le falta práctica con los números', 42, 2),
(167, 'Es bueno con los números', 'Le falta práctica con los números', 42, 3),
(168, 'Es bueno con los números', 'Le falta práctica con los números', 42, 4),
(169, 'Es bueno con los números', 'Le falta práctica con los números', 43, 1),
(170, 'Es bueno con los números', 'Le falta práctica con los números', 43, 2),
(171, 'Es bueno con los números', 'Le falta práctica con los números', 43, 3),
(172, 'Es bueno con los números', 'Le falta práctica con los números', 43, 4),
(173, 'Es bueno con los números', 'Le falta práctica con los números', 44, 1),
(174, 'Es bueno con los números', 'Le falta práctica con los números', 44, 2),
(175, 'Es bueno con los números', 'Le falta práctica con los números', 44, 3),
(176, 'Es bueno con los números', 'Le falta práctica con los números', 44, 4),
(177, 'Es bueno con los números', 'Le falta práctica con los números', 45, 1),
(178, 'Es bueno con los números', 'Le falta práctica con los números', 45, 2),
(179, 'Es bueno con los números', 'Le falta práctica con los números', 45, 3),
(180, 'Es bueno con los números', 'Le falta práctica con los números', 45, 4),
(181, 'Es bueno con los números', 'Le falta práctica con los números', 46, 1),
(182, 'Es bueno con los números', 'Le falta práctica con los números', 46, 2),
(183, 'Es bueno con los números', 'Le falta práctica con los números', 46, 3),
(184, 'Es bueno con los números', 'Le falta práctica con los números', 46, 4),
(185, 'Es bueno con los números', 'Le falta práctica con los números', 47, 1),
(186, 'Es bueno con los números', 'Le falta práctica con los números', 47, 2),
(187, 'Es bueno con los números', 'Le falta práctica con los números', 47, 3),
(188, 'Es bueno con los números', 'Le falta práctica con los números', 47, 4),
(189, 'Es bueno con los números', 'Le falta práctica con los números', 48, 1),
(190, 'Es bueno con los números', 'Le falta práctica con los números', 48, 2),
(191, 'Es bueno con los números', 'Le falta práctica con los números', 48, 3),
(192, 'Es bueno con los números', 'Le falta práctica con los números', 48, 4),
(193, 'Es bueno con los números', 'Le falta práctica con los números', 49, 1),
(194, 'Es bueno con los números', 'Le falta práctica con los números', 49, 2),
(195, 'Es bueno con los números', 'Le falta práctica con los números', 49, 3),
(196, 'Es bueno con los números', 'Le falta práctica con los números', 49, 4),
(197, 'Es bueno con los números', 'Le falta práctica con los números', 50, 1),
(198, 'Es bueno con los números', 'Le falta práctica con los números', 50, 2),
(199, 'Es bueno con los números', 'Le falta práctica con los números', 50, 3),
(200, 'Es bueno con los números', 'Le falta práctica con los números', 50, 4),
(201, 'Es bueno con los números', 'Le falta práctica con los números', 51, 1),
(202, 'Es bueno con los números', 'Le falta práctica con los números', 51, 2),
(203, 'Es bueno con los números', 'Le falta práctica con los números', 51, 3),
(204, 'Es bueno con los números', 'Le falta práctica con los números', 51, 4),
(205, 'Es bueno con los números', 'Le falta práctica con los números', 52, 1),
(206, 'Es bueno con los números', 'Le falta práctica con los números', 52, 2),
(207, 'Es bueno con los números', 'Le falta práctica con los números', 52, 3),
(208, 'Es bueno con los números', 'Le falta práctica con los números', 52, 4),
(209, 'Es bueno con los números', 'Le falta práctica con los números', 53, 1),
(210, 'Es bueno con los números', 'Le falta práctica con los números', 53, 2),
(211, 'Es bueno con los números', 'Le falta práctica con los números', 53, 3),
(212, 'Es bueno con los números', 'Le falta práctica con los números', 53, 4),
(213, 'Es bueno con los números', 'Le falta práctica con los números', 54, 1),
(214, 'Es bueno con los números', 'Le falta práctica con los números', 54, 2),
(215, 'Es bueno con los números', 'Le falta práctica con los números', 54, 3),
(216, 'Es bueno con los números', 'Le falta práctica con los números', 54, 4),
(217, 'Es bueno con los números', 'Le falta práctica con los números', 55, 1),
(218, 'Es bueno con los números', 'Le falta práctica con los números', 55, 2),
(219, 'Es bueno con los números', 'Le falta práctica con los números', 55, 3),
(220, 'Es bueno con los números', 'Le falta práctica con los números', 55, 4),
(221, 'Es bueno con los números', 'Le falta práctica con los números', 56, 1),
(222, 'Es bueno con los números', 'Le falta práctica con los números', 56, 2),
(223, 'Es bueno con los números', 'Le falta práctica con los números', 56, 3),
(224, 'Es bueno con los números', 'Le falta práctica con los números', 56, 4),
(225, 'Es bueno con los números', 'Le falta práctica con los números', 57, 1),
(226, 'Es bueno con los números', 'Le falta práctica con los números', 57, 2),
(227, 'Es bueno con los números', 'Le falta práctica con los números', 57, 3),
(228, 'Es bueno con los números', 'Le falta práctica con los números', 57, 4),
(229, 'Es bueno con los números', 'Le falta práctica con los números', 58, 1),
(230, 'Es bueno con los números', 'Le falta práctica con los números', 58, 2),
(231, 'Es bueno con los números', 'Le falta práctica con los números', 58, 3),
(232, 'Es bueno con los números', 'Le falta práctica con los números', 58, 4),
(233, 'Es bueno con los números', 'Le falta práctica con los números', 59, 1),
(234, 'Es bueno con los números', 'Le falta práctica con los números', 59, 2),
(235, 'Es bueno con los números', 'Le falta práctica con los números', 59, 3),
(236, 'Es bueno con los números', 'Le falta práctica con los números', 59, 4),
(237, 'Es bueno con los números', 'Le falta práctica con los números', 60, 1),
(238, 'Es bueno con los números', 'Le falta práctica con los números', 60, 2),
(239, 'Es bueno con los números', 'Le falta práctica con los números', 60, 3),
(240, 'Es bueno con los números', 'Le falta práctica con los números', 60, 4),
(241, 'Es bueno con los números', 'Le falta práctica con los números', 61, 1),
(242, 'Es bueno con los números', 'Le falta práctica con los números', 61, 2),
(243, 'Es bueno con los números', 'Le falta práctica con los números', 61, 3),
(244, 'Es bueno con los números', 'Le falta práctica con los números', 61, 4),
(245, 'Es bueno con los números', 'Le falta práctica con los números', 62, 1),
(246, 'Es bueno con los números', 'Le falta práctica con los números', 62, 2),
(247, 'Es bueno con los números', 'Le falta práctica con los números', 62, 3),
(248, 'Es bueno con los números', 'Le falta práctica con los números', 62, 4),
(249, 'Es bueno con los números', 'Le falta práctica con los números', 63, 1),
(250, 'Es bueno con los números', 'Le falta práctica con los números', 63, 2),
(251, 'Es bueno con los números', 'Le falta práctica con los números', 63, 3),
(252, 'Es bueno con los números', 'Le falta práctica con los números', 63, 4),
(253, 'Es bueno con los números', 'Le falta práctica con los números', 64, 1),
(254, 'Es bueno con los números', 'Le falta práctica con los números', 64, 2),
(255, 'Es bueno con los números', 'Le falta práctica con los números', 64, 3),
(256, 'Es bueno con los números', 'Le falta práctica con los números', 64, 4),
(257, 'Es bueno con los números', 'Le falta práctica con los números', 65, 1),
(258, 'Es bueno con los números', 'Le falta práctica con los números', 65, 2),
(259, 'Es bueno con los números', 'Le falta práctica con los números', 65, 3),
(260, 'Es bueno con los números', 'Le falta práctica con los números', 65, 4),
(261, 'Es bueno con los números', 'Le falta práctica con los números', 66, 1),
(262, 'Es bueno con los números', 'Le falta práctica con los números', 66, 2),
(263, 'Es bueno con los números', 'Le falta práctica con los números', 66, 3),
(264, 'Es bueno con los números', 'Le falta práctica con los números', 66, 4),
(265, 'Es bueno con los números', 'Le falta práctica con los números', 67, 1),
(266, 'Es bueno con los números', 'Le falta práctica con los números', 67, 2),
(267, 'Es bueno con los números', 'Le falta práctica con los números', 67, 3),
(268, 'Es bueno con los números', 'Le falta práctica con los números', 67, 4),
(269, 'Es bueno con los números', 'Le falta práctica con los números', 68, 1),
(270, 'Es bueno con los números', 'Le falta práctica con los números', 68, 2),
(271, 'Es bueno con los números', 'Le falta práctica con los números', 68, 3),
(272, 'Es bueno con los números', 'Le falta práctica con los números', 68, 4),
(273, 'Es bueno con los números', 'Le falta práctica con los números', 69, 1),
(274, 'Es bueno con los números', 'Le falta práctica con los números', 69, 2),
(275, 'Es bueno con los números', 'Le falta práctica con los números', 69, 3),
(276, 'Es bueno con los números', 'Le falta práctica con los números', 69, 4),
(277, 'Es bueno con los números', 'Le falta práctica con los números', 70, 1),
(278, 'Es bueno con los números', 'Le falta práctica con los números', 70, 2),
(279, 'Es bueno con los números', 'Le falta práctica con los números', 70, 3),
(280, 'Es bueno con los números', 'Le falta práctica con los números', 70, 4),
(281, 'Es bueno con los números', 'Le falta práctica con los números', 71, 1),
(282, 'Es bueno con los números', 'Le falta práctica con los números', 71, 2),
(283, 'Es bueno con los números', 'Le falta práctica con los números', 71, 3),
(284, 'Es bueno con los números', 'Le falta práctica con los números', 71, 4),
(285, 'Es bueno con los números', 'Le falta práctica con los números', 72, 1),
(286, 'Es bueno con los números', 'Le falta práctica con los números', 72, 2),
(287, 'Es bueno con los números', 'Le falta práctica con los números', 72, 3),
(288, 'Es bueno con los números', 'Le falta práctica con los números', 72, 4),
(289, 'Es bueno con los números', 'Le falta práctica con los números', 73, 1),
(290, 'Es bueno con los números', 'Le falta práctica con los números', 73, 2),
(291, 'Es bueno con los números', 'Le falta práctica con los números', 73, 3),
(292, 'Es bueno con los números', 'Le falta práctica con los números', 73, 4),
(293, 'Es bueno con los números', 'Le falta práctica con los números', 74, 1),
(294, 'Es bueno con los números', 'Le falta práctica con los números', 74, 2),
(295, 'Es bueno con los números', 'Le falta práctica con los números', 74, 3),
(296, 'Es bueno con los números', 'Le falta práctica con los números', 74, 4),
(297, 'Es bueno con los números', 'Le falta práctica con los números', 75, 1),
(298, 'Es bueno con los números', 'Le falta práctica con los números', 75, 2),
(299, 'Es bueno con los números', 'Le falta práctica con los números', 75, 3),
(300, 'Es bueno con los números', 'Le falta práctica con los números', 75, 4),
(301, 'Es bueno con los números', 'Le falta práctica con los números', 76, 1),
(302, 'Es bueno con los números', 'Le falta práctica con los números', 76, 2),
(303, 'Es bueno con los números', 'Le falta práctica con los números', 76, 3),
(304, 'Es bueno con los números', 'Le falta práctica con los números', 76, 4),
(305, 'Es bueno con los números', 'Le falta práctica con los números', 77, 1),
(306, 'Es bueno con los números', 'Le falta práctica con los números', 77, 2),
(307, 'Es bueno con los números', 'Le falta práctica con los números', 77, 3),
(308, 'Es bueno con los números', 'Le falta práctica con los números', 77, 4),
(309, 'Es bueno con los números', 'Le falta práctica con los números', 78, 1),
(310, 'Es bueno con los números', 'Le falta práctica con los números', 78, 2),
(311, 'Es bueno con los números', 'Le falta práctica con los números', 78, 3),
(312, 'Es bueno con los números', 'Le falta práctica con los números', 78, 4),
(313, 'Es bueno con los números', 'Le falta práctica con los números', 79, 1),
(314, 'Es bueno con los números', 'Le falta práctica con los números', 79, 2),
(315, 'Es bueno con los números', 'Le falta práctica con los números', 79, 3),
(316, 'Es bueno con los números', 'Le falta práctica con los números', 79, 4),
(317, 'Es bueno con los números', 'Le falta práctica con los números', 80, 1),
(318, 'Es bueno con los números', 'Le falta práctica con los números', 80, 2),
(319, 'Es bueno con los números', 'Le falta práctica con los números', 80, 3),
(320, 'Es bueno con los números', 'Le falta práctica con los números', 80, 4),
(321, 'Es bueno con los números', 'Le falta práctica con los números', 81, 1),
(322, 'Es bueno con los números', 'Le falta práctica con los números', 81, 2),
(323, 'Es bueno con los números', 'Le falta práctica con los números', 81, 3),
(324, 'Es bueno con los números', 'Le falta práctica con los números', 81, 4),
(325, 'Es bueno con los números', 'Le falta práctica con los números', 82, 1),
(326, 'Es bueno con los números', 'Le falta práctica con los números', 82, 2),
(327, 'Es bueno con los números', 'Le falta práctica con los números', 82, 3),
(328, 'Es bueno con los números', 'Le falta práctica con los números', 82, 4),
(329, 'Es bueno con los números', 'Le falta práctica con los números', 83, 1),
(330, 'Es bueno con los números', 'Le falta práctica con los números', 83, 2),
(331, 'Es bueno con los números', 'Le falta práctica con los números', 83, 3),
(332, 'Es bueno con los números', 'Le falta práctica con los números', 83, 4),
(333, 'Es bueno con los números', 'Le falta práctica con los números', 84, 1),
(334, 'Es bueno con los números', 'Le falta práctica con los números', 84, 2),
(335, 'Es bueno con los números', 'Le falta práctica con los números', 84, 3),
(336, 'Es bueno con los números', 'Le falta práctica con los números', 84, 4),
(337, 'Es bueno con los números', 'Le falta práctica con los números', 85, 1),
(338, 'Es bueno con los números', 'Le falta práctica con los números', 85, 2),
(339, 'Es bueno con los números', 'Le falta práctica con los números', 85, 3),
(340, 'Es bueno con los números', 'Le falta práctica con los números', 85, 4),
(341, 'Es bueno con los números', 'Le falta práctica con los números', 86, 1),
(342, 'Es bueno con los números', 'Le falta práctica con los números', 86, 2),
(343, 'Es bueno con los números', 'Le falta práctica con los números', 86, 3),
(344, 'Es bueno con los números', 'Le falta práctica con los números', 86, 4),
(345, 'Es bueno con los números', 'Le falta práctica con los números', 87, 1),
(346, 'Es bueno con los números', 'Le falta práctica con los números', 87, 2),
(347, 'Es bueno con los números', 'Le falta práctica con los números', 87, 3),
(348, 'Es bueno con los números', 'Le falta práctica con los números', 87, 4),
(349, 'Es bueno con los números', 'Le falta práctica con los números', 88, 1),
(350, 'Es bueno con los números', 'Le falta práctica con los números', 88, 2),
(351, 'Es bueno con los números', 'Le falta práctica con los números', 88, 3),
(352, 'Es bueno con los números', 'Le falta práctica con los números', 88, 4),
(353, 'Es bueno con los números', 'Le falta práctica con los números', 89, 1),
(354, 'Es bueno con los números', 'Le falta práctica con los números', 89, 2),
(355, 'Es bueno con los números', 'Le falta práctica con los números', 89, 3),
(356, 'Es bueno con los números', 'Le falta práctica con los números', 89, 4),
(357, 'Es bueno con los números', 'Le falta práctica con los números', 90, 1),
(358, 'Es bueno con los números', 'Le falta práctica con los números', 90, 2),
(359, 'Es bueno con los números', 'Le falta práctica con los números', 90, 3),
(360, 'Es bueno con los números', 'Le falta práctica con los números', 90, 4),
(361, 'Es bueno con los números', 'Le falta práctica con los números', 91, 1),
(362, 'Es bueno con los números', 'Le falta práctica con los números', 91, 2),
(363, 'Es bueno con los números', 'Le falta práctica con los números', 91, 3),
(364, 'Es bueno con los números', 'Le falta práctica con los números', 91, 4),
(365, 'Es bueno con los números', 'Le falta práctica con los números', 92, 1),
(366, 'Es bueno con los números', 'Le falta práctica con los números', 92, 2),
(367, 'Es bueno con los números', 'Le falta práctica con los números', 92, 3),
(368, 'Es bueno con los números', 'Le falta práctica con los números', 92, 4),
(369, 'Es bueno con los números', 'Le falta práctica con los números', 93, 1),
(370, 'Es bueno con los números', 'Le falta práctica con los números', 93, 2),
(371, 'Es bueno con los números', 'Le falta práctica con los números', 93, 3),
(372, 'Es bueno con los números', 'Le falta práctica con los números', 93, 4),
(373, 'Es bueno con los números', 'Le falta práctica con los números', 94, 1),
(374, 'Es bueno con los números', 'Le falta práctica con los números', 94, 2),
(375, 'Es bueno con los números', 'Le falta práctica con los números', 94, 3),
(376, 'Es bueno con los números', 'Le falta práctica con los números', 94, 4),
(377, 'Es bueno con los números', 'Le falta práctica con los números', 95, 1),
(378, 'Es bueno con los números', 'Le falta práctica con los números', 95, 2),
(379, 'Es bueno con los números', 'Le falta práctica con los números', 95, 3),
(380, 'Es bueno con los números', 'Le falta práctica con los números', 95, 4),
(381, 'Es bueno con los números', 'Le falta práctica con los números', 96, 1),
(382, 'Es bueno con los números', 'Le falta práctica con los números', 96, 2),
(383, 'Es bueno con los números', 'Le falta práctica con los números', 96, 3),
(384, 'Es bueno con los números', 'Le falta práctica con los números', 96, 4),
(385, 'Es bueno con los números', 'Le falta práctica con los números', 97, 1),
(386, 'Es bueno con los números', 'Le falta práctica con los números', 97, 2),
(387, 'Es bueno con los números', 'Le falta práctica con los números', 97, 3),
(388, 'Es bueno con los números', 'Le falta práctica con los números', 97, 4),
(389, 'Es bueno con los números', 'Le falta práctica con los números', 98, 1),
(390, 'Es bueno con los números', 'Le falta práctica con los números', 98, 2),
(391, 'Es bueno con los números', 'Le falta práctica con los números', 98, 3),
(392, 'Es bueno con los números', 'Le falta práctica con los números', 98, 4),
(393, 'Es bueno con los números', 'Le falta práctica con los números', 99, 1),
(394, 'Es bueno con los números', 'Le falta práctica con los números', 99, 2),
(395, 'Es bueno con los números', 'Le falta práctica con los números', 99, 3),
(396, 'Es bueno con los números', 'Le falta práctica con los números', 99, 4),
(397, 'Presentó proyecto de agricultura', 'Perdió proyecto noveno', 100, 1),
(398, 'Es bueno con los números', 'Le falta práctica con los números', 100, 2),
(399, 'Es bueno con los números', 'Le falta práctica con los números', 100, 3),
(400, 'Es bueno con los números', 'Le falta práctica con los números', 100, 4),
(401, 'Es bueno con los números 1', 'Le falta práctica con los números 1', 101, 1),
(402, 'Es bueno con los números', 'Le falta práctica con los números', 101, 2),
(403, 'Es bueno con los números', 'Le falta práctica con los números', 101, 3),
(404, 'Es bueno con los números', 'Le falta práctica con los números', 101, 4),
(405, 'Sabe las letras 9', 'Debilidad español', 102, 1),
(406, 'Es bueno con los números', 'Le falta práctica con los números', 102, 2),
(407, 'Es bueno con los números', 'Le falta práctica con los números', 102, 3),
(408, 'Es bueno con los números', 'Le falta práctica con los números', 102, 4),
(409, 'Sabe hacer composiciones químicas', 'Debilidad quimica', 103, 1),
(410, 'Es bueno con los números', 'Le falta práctica con los números', 103, 2),
(411, 'Es bueno con los números', 'Le falta práctica con los números', 103, 3),
(412, 'Es bueno con los números', 'Le falta práctica con los números', 103, 4),
(413, 'Sabe inglés', 'Le falta práctica con los números', 104, 1),
(414, 'Es bueno con los números', 'Le falta práctica con los números', 104, 2),
(415, 'Es bueno con los números', 'Le falta práctica con los números', 104, 3),
(416, 'Es bueno con los números', 'Le falta práctica con los números', 104, 4),
(417, 'Corre cual Usain Bolt', 'Le falta práctica con los números', 105, 1),
(418, 'Es bueno con los números', 'Le falta práctica con los números', 105, 2),
(419, 'Es bueno con los números', 'Le falta práctica con los números', 105, 3),
(420, 'Es bueno con los números', 'Le falta práctica con los números', 105, 4),
(421, 'Dibuja cual bob ross', 'No comprende que solo existe polvo en el viento', 106, 1),
(422, 'Es bueno con los números', 'Le falta práctica con los números', 106, 2),
(423, 'Es bueno con los números', 'Le falta práctica con los números', 106, 3),
(424, 'Es bueno con los números', 'Le falta práctica con los números', 106, 4),
(425, 'Dibuja cual Bob Ross', 'Le falta práctica con los números', 107, 1),
(426, 'Es bueno con los números', 'Le falta práctica con los números', 107, 2),
(427, 'Es bueno con los números', 'Le falta práctica con los números', 107, 3),
(428, 'Es bueno con los números', 'Le falta práctica con los números', 107, 4),
(429, 'Trata a sus compañeros como iguales', 'Le falta práctica con los números', 108, 1),
(430, 'Es bueno con los números', 'Le falta práctica con los números', 108, 2),
(431, 'Es bueno con los números', 'Le falta práctica con los números', 108, 3),
(432, 'Es bueno con los números', 'Le falta práctica con los números', 108, 4),
(433, 'Administra bien su dinero', 'Le falta práctica con los números', 109, 1),
(434, 'Es bueno con los números', 'Le falta práctica con los números', 109, 2),
(435, 'Es bueno con los números', 'Le falta práctica con los números', 109, 3),
(436, 'Es bueno con los números', 'Le falta práctica con los números', 109, 4),
(437, 'Sabe modelar el mundo a través de la fisica', 'No puede modelar el mundo a través de la matemática', 110, 1),
(438, 'Es bueno con los números', 'Le falta práctica con los números', 110, 2),
(439, 'Es bueno con los números', 'Le falta práctica con los números', 110, 3),
(440, 'Es bueno con los números', 'Le falta práctica con los números', 110, 4),
(441, 'Comprende que Dios es solo un ser imaginario', 'Le falta práctica con los números', 111, 1),
(442, 'Es bueno con los números', 'Le falta práctica con los números', 111, 2),
(443, 'Es bueno con los números', 'Le falta práctica con los números', 111, 3),
(444, 'Es bueno con los números', 'Le falta práctica con los números', 111, 4),
(445, 'Es un buen conocedor de la tecnología', 'Le falta práctica con los números', 112, 1),
(446, 'Es bueno con los números', 'Le falta práctica con los números', 112, 2),
(447, 'Es bueno con los números', 'Le falta práctica con los números', 112, 3),
(448, 'Es bueno con los números', 'Le falta práctica con los números', 112, 4),
(449, 'Es bueno con los números', 'Le falta práctica con los números', 113, 1),
(450, 'Es bueno con los números', 'Le falta práctica con los números', 113, 2),
(451, 'Es bueno con los números', 'Le falta práctica con los números', 113, 3),
(452, 'Es bueno con los números', 'Le falta práctica con los números', 113, 4),
(453, 'Es bueno con los números', 'Le falta práctica con los números', 114, 1),
(454, 'Es bueno con los números', 'Le falta práctica con los números', 114, 2),
(455, 'Es bueno con los números', 'Le falta práctica con los números', 114, 3),
(456, 'Es bueno con los números', 'Le falta práctica con los números', 114, 4),
(457, 'Es bueno con los números', 'Le falta práctica con los números', 115, 1),
(458, 'Es bueno con los números', 'Le falta práctica con los números', 115, 2),
(459, 'Es bueno con los números', 'Le falta práctica con los números', 115, 3),
(460, 'Es bueno con los números', 'Le falta práctica con los números', 115, 4),
(461, 'Es bueno con los números', 'Le falta práctica con los números', 116, 1),
(462, 'Es bueno con los números', 'Le falta práctica con los números', 116, 2),
(463, 'Es bueno con los números', 'Le falta práctica con los números', 116, 3),
(464, 'Es bueno con los números', 'Le falta práctica con los números', 116, 4),
(465, 'Es bueno con los números', 'Le falta práctica con los números', 117, 1),
(466, 'Es bueno con los números', 'Le falta práctica con los números', 117, 2),
(467, 'Es bueno con los números', 'Le falta práctica con los números', 117, 3),
(468, 'Es bueno con los números', 'Le falta práctica con los números', 117, 4),
(469, 'Es bueno con los números', 'Le falta práctica con los números', 118, 1),
(470, 'Es bueno con los números', 'Le falta práctica con los números', 118, 2),
(471, 'Es bueno con los números', 'Le falta práctica con los números', 118, 3),
(472, 'Es bueno con los números', 'Le falta práctica con los números', 118, 4),
(473, 'Es bueno con los números', 'Le falta práctica con los números', 119, 1),
(474, 'Es bueno con los números', 'Le falta práctica con los números', 119, 2),
(475, 'Es bueno con los números', 'Le falta práctica con los números', 119, 3),
(476, 'Es bueno con los números', 'Le falta práctica con los números', 119, 4),
(477, 'Es bueno con los números', 'Le falta práctica con los números', 120, 1),
(478, 'Es bueno con los números', 'Le falta práctica con los números', 120, 2),
(479, 'Es bueno con los números', 'Le falta práctica con los números', 120, 3),
(480, 'Es bueno con los números', 'Le falta práctica con los números', 120, 4),
(481, 'Es bueno con los números', 'Le falta práctica con los números', 121, 1),
(482, 'Es bueno con los números', 'Le falta práctica con los números', 121, 2),
(483, 'Es bueno con los números', 'Le falta práctica con los números', 121, 3),
(484, 'Es bueno con los números', 'Le falta práctica con los números', 121, 4),
(485, 'Es bueno con los números', 'Le falta práctica con los números', 122, 1),
(486, 'Es bueno con los números', 'Le falta práctica con los números', 122, 2),
(487, 'Es bueno con los números', 'Le falta práctica con los números', 122, 3),
(488, 'Es bueno con los números', 'Le falta práctica con los números', 122, 4),
(489, 'Es bueno con los números', 'Le falta práctica con los números', 123, 1),
(490, 'Es bueno con los números', 'Le falta práctica con los números', 123, 2),
(491, 'Es bueno con los números', 'Le falta práctica con los números', 123, 3),
(492, 'Es bueno con los números', 'Le falta práctica con los números', 123, 4),
(493, 'Es bueno con los números', 'Le falta práctica con los números', 124, 1),
(494, 'Es bueno con los números', 'Le falta práctica con los números', 124, 2),
(495, 'Es bueno con los números', 'Le falta práctica con los números', 124, 3),
(496, 'Es bueno con los números', 'Le falta práctica con los números', 124, 4),
(497, 'Es bueno con los números', 'Le falta práctica con los números', 125, 1),
(498, 'Es bueno con los números', 'Le falta práctica con los números', 125, 2),
(499, 'Es bueno con los números', 'Le falta práctica con los números', 125, 3),
(500, 'Es bueno con los números', 'Le falta práctica con los números', 125, 4),
(501, 'Es bueno con los números', 'Le falta práctica con los números', 126, 1),
(502, 'Es bueno con los números', 'Le falta práctica con los números', 126, 2),
(503, 'Es bueno con los números', 'Le falta práctica con los números', 126, 3),
(504, 'Es bueno con los números', 'Le falta práctica con los números', 126, 4),
(505, 'Es bueno con los números', 'Le falta práctica con los números', 127, 1),
(506, 'Es bueno con los números', 'Le falta práctica con los números', 127, 2),
(507, 'Es bueno con los números', 'Le falta práctica con los números', 127, 3),
(508, 'Es bueno con los números', 'Le falta práctica con los números', 127, 4),
(509, 'Es bueno con los números', 'Le falta práctica con los números', 128, 1),
(510, 'Es bueno con los números', 'Le falta práctica con los números', 128, 2),
(511, 'Es bueno con los números', 'Le falta práctica con los números', 128, 3),
(512, 'Es bueno con los números', 'Le falta práctica con los números', 128, 4),
(513, 'Es bueno con los números', 'Le falta práctica con los números', 129, 1),
(514, 'Es bueno con los números', 'Le falta práctica con los números', 129, 2),
(515, 'Es bueno con los números', 'Le falta práctica con los números', 129, 3),
(516, 'Es bueno con los números', 'Le falta práctica con los números', 129, 4),
(517, 'Es bueno con los números', 'Le falta práctica con los números', 130, 1),
(518, 'Es bueno con los números', 'Le falta práctica con los números', 130, 2),
(519, 'Es bueno con los números', 'Le falta práctica con los números', 130, 3),
(520, 'Es bueno con los números', 'Le falta práctica con los números', 130, 4),
(521, 'Es bueno con los números', 'Le falta práctica con los números', 131, 1),
(522, 'Es bueno con los números', 'Le falta práctica con los números', 131, 2),
(523, 'Es bueno con los números', 'Le falta práctica con los números', 131, 3),
(524, 'Es bueno con los números', 'Le falta práctica con los números', 131, 4),
(525, 'Es bueno con los números', 'Le falta práctica con los números', 132, 1),
(526, 'Es bueno con los números', 'Le falta práctica con los números', 132, 2),
(527, 'Es bueno con los números', 'Le falta práctica con los números', 132, 3),
(528, 'Es bueno con los números', 'Le falta práctica con los números', 132, 4),
(529, 'Es bueno con los números', 'Le falta práctica con los números', 133, 1),
(530, 'Es bueno con los números', 'Le falta práctica con los números', 133, 2),
(531, 'Es bueno con los números', 'Le falta práctica con los números', 133, 3),
(532, 'Es bueno con los números', 'Le falta práctica con los números', 133, 4),
(533, 'Es bueno con los números', 'Le falta práctica con los números', 134, 1),
(534, 'Es bueno con los números', 'Le falta práctica con los números', 134, 2),
(535, 'Es bueno con los números', 'Le falta práctica con los números', 134, 3),
(536, 'Es bueno con los números', 'Le falta práctica con los números', 134, 4),
(537, 'Es bueno con los números', 'Le falta práctica con los números', 135, 1),
(538, 'Es bueno con los números', 'Le falta práctica con los números', 135, 2),
(539, 'Es bueno con los números', 'Le falta práctica con los números', 135, 3),
(540, 'Es bueno con los números', 'Le falta práctica con los números', 135, 4),
(541, 'Es bueno con los números', 'Le falta práctica con los números', 136, 1),
(542, 'Es bueno con los números', 'Le falta práctica con los números', 136, 2),
(543, 'Es bueno con los números', 'Le falta práctica con los números', 136, 3),
(544, 'Es bueno con los números', 'Le falta práctica con los números', 136, 4),
(545, 'Es bueno con los números', 'Le falta práctica con los números', 137, 1),
(546, 'Es bueno con los números', 'Le falta práctica con los números', 137, 2),
(547, 'Es bueno con los números', 'Le falta práctica con los números', 137, 3),
(548, 'Es bueno con los números', 'Le falta práctica con los números', 137, 4),
(549, 'Es bueno con los números', 'Le falta práctica con los números', 138, 1),
(550, 'Es bueno con los números', 'Le falta práctica con los números', 138, 2),
(551, 'Es bueno con los números', 'Le falta práctica con los números', 138, 3),
(552, 'Es bueno con los números', 'Le falta práctica con los números', 138, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE IF NOT EXISTS `materia` (
`idMateria` int(11) NOT NULL,
  `nombreMateria` varchar(45) DEFAULT NULL,
  `gradoMateria` int(11) DEFAULT NULL,
  `profesor_idPro` int(11) NOT NULL DEFAULT '0',
  `IH` int(11) DEFAULT NULL,
  `HCD` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`idMateria`, `nombreMateria`, `gradoMateria`, `profesor_idPro`, `IH`, `HCD`) VALUES
(1, 'MATEMATICAS', 13, 5, 1, 2),
(2, 'LENGUA CASTELLANA', 13, 5, 2, 4),
(3, 'INGLES', 13, 5, 3, 6),
(4, 'CIENCIAS SOCIALES', 13, 5, 5, 10),
(5, 'CIENCIAS NATURALES', 13, 5, 6, 12),
(6, 'EDUCACION ARTISTICA', 13, 5, NULL, NULL),
(7, 'EDUCACION RELIGIOSA', 13, 5, NULL, NULL),
(8, 'EDUCACION FISICA', 13, 5, NULL, NULL),
(9, 'ETICA Y VALORES', 13, 5, NULL, NULL),
(10, 'TECNOLOGIA E INFORMATICA', 13, 5, NULL, NULL),
(11, 'MATEMATICAS', 1, 3, 1, 2),
(12, 'LENGUA CASTELLANA', 1, 3, 2, 4),
(13, 'INGLES', 1, 3, 3, 6),
(14, 'CIENCIAS SOCIALES', 1, 3, 5, 10),
(15, 'CIENCIAS NATURALES', 1, 3, 6, 12),
(16, 'EDUCACION ARTISTICA', 1, 3, NULL, NULL),
(17, 'EDUCACION RELIGIOSA', 1, 3, NULL, NULL),
(18, 'EDUCACION FISICA', 1, 3, NULL, NULL),
(19, 'ETICA Y VALORES', 1, 3, NULL, NULL),
(20, 'TECNOLOGIA E INFORMATICA', 1, 4, NULL, NULL),
(21, 'MATEMATICAS', 2, 1, 1, 2),
(22, 'LENGUA CASTELLANA', 2, 1, 2, 4),
(23, 'INGLES', 2, 1, 3, 6),
(24, 'CIENCIAS SOCIALES', 2, 1, 5, 10),
(25, 'CIENCIAS NATURALES', 2, 1, 6, 12),
(26, 'EDUCACION ARTISTICA', 2, 1, NULL, NULL),
(27, 'EDUCACION RELIGIOSA', 2, 1, NULL, NULL),
(28, 'EDUCACION FISICA', 2, 1, NULL, NULL),
(29, 'ETICA Y VALORES', 2, 1, NULL, NULL),
(30, 'TECNOLOGIA E INFORMATICA', 2, 1, NULL, NULL),
(31, 'MATEMATICAS', 3, 1, 1, 2),
(32, 'LENGUA CASTELLANA', 3, 2, 2, 4),
(33, 'INGLES', 3, 2, 3, 6),
(34, 'CIENCIAS SOCIALES', 3, 1, 5, 10),
(35, 'CIENCIAS NATURALES', 3, 2, 6, 12),
(36, 'EDUCACION ARTISTICA', 3, 3, NULL, NULL),
(37, 'EDUCACION RELIGIOSA', 3, 1, NULL, NULL),
(38, 'EDUCACION FISICA', 3, 1, NULL, NULL),
(39, 'ETICA Y VALORES', 3, 1, NULL, NULL),
(40, 'TECNOLOGIA E INFORMATICA', 3, 2, NULL, NULL),
(41, 'MATEMATICAS', 4, 1, 1, 2),
(42, 'LENGUA CASTELLANA', 4, 2, 2, 4),
(43, 'INGLES', 4, 2, 3, 6),
(44, 'CIENCIAS SOCIALES', 4, 1, 5, 10),
(45, 'CIENCIAS NATURALES', 4, 2, 6, 12),
(46, 'EDUCACION ARTISTICA', 4, 3, NULL, NULL),
(47, 'EDUCACION RELIGIOSA', 4, 1, NULL, NULL),
(48, 'EDUCACION FISICA', 4, 1, NULL, NULL),
(49, 'ETICA Y VALORES', 4, 1, NULL, NULL),
(50, 'TECNOLOGIA E INFORMATICA', 4, 2, NULL, NULL),
(51, 'MATEMATICAS', 5, 1, 1, 2),
(52, 'LENGUA CASTELLANA', 5, 2, 2, 4),
(53, 'INGLES', 5, 2, 3, 6),
(54, 'CIENCIAS SOCIALES', 5, 1, 5, 10),
(55, 'CIENCIAS NATURALES', 5, 2, 6, 12),
(56, 'EDUCACION ARTISTICA', 5, 3, NULL, NULL),
(57, 'EDUCACION RELIGIOSA', 5, 1, NULL, NULL),
(58, 'EDUCACION FISICA', 5, 1, NULL, NULL),
(59, 'ETICA Y VALORES', 5, 1, NULL, NULL),
(60, 'TECNOLOGIA E INFORMATICA', 5, 2, NULL, NULL),
(61, 'PROYECTO', 6, 1, 1, 2),
(62, 'MATEMATICAS', 6, 2, 2, 4),
(63, 'ESPAÑOL', 6, 2, 3, 6),
(64, 'QUIMICA', 6, 1, 5, 10),
(65, 'INGLES', 6, 2, 6, 12),
(66, 'EDUCACION FISICA', 6, 3, NULL, NULL),
(67, 'FILOSOFIA', 6, 1, NULL, NULL),
(68, 'ARTISTICA', 6, 1, NULL, NULL),
(69, 'ETICA', 6, 1, NULL, NULL),
(70, 'ECONOMÍA', 6, 1, 1, 2),
(71, 'FISICA', 6, 2, 2, 4),
(72, 'RELIGION', 6, 2, NULL, NULL),
(73, 'INFORMATICA', 6, 2, NULL, NULL),
(74, 'PROYECTO', 7, 1, 1, 2),
(75, 'MATEMATICAS', 7, 2, 2, 4),
(76, 'ESPAÑOL', 7, 2, 3, 6),
(77, 'QUIMICA', 7, 1, 5, 10),
(78, 'INGLES', 7, 2, 6, 12),
(79, 'EDUCACION FISICA', 7, 3, NULL, NULL),
(80, 'FILOSOFIA', 7, 1, NULL, NULL),
(81, 'ARTISTICA', 7, 1, NULL, NULL),
(82, 'ETICA', 7, 1, NULL, NULL),
(83, 'ECONOMÍA', 7, 1, 1, 2),
(84, 'FISICA', 7, 2, 2, 4),
(85, 'RELIGION', 7, 2, NULL, NULL),
(86, 'INFORMATICA', 7, 2, NULL, NULL),
(87, 'PROYECTO', 8, 1, 1, 2),
(88, 'MATEMATICAS', 8, 2, 2, 4),
(89, 'ESPAÑOL', 8, 2, 3, 6),
(90, 'QUIMICA', 8, 1, 5, 10),
(91, 'INGLES', 8, 2, 6, 12),
(92, 'EDUCACION FISICA', 8, 3, NULL, NULL),
(93, 'FILOSOFIA', 8, 1, NULL, NULL),
(94, 'ARTISTICA', 8, 1, NULL, NULL),
(95, 'ETICA', 8, 1, NULL, NULL),
(96, 'ECONOMÍA', 8, 1, 1, 2),
(97, 'FISICA', 8, 2, 2, 4),
(98, 'RELIGION', 8, 2, NULL, NULL),
(99, 'INFORMATICA', 8, 2, NULL, NULL),
(100, 'PROYECTO', 9, 1, 1, 2),
(101, 'MATEMATICAS', 9, 1, 2, 4),
(102, 'ESPAÑOL', 9, 1, 3, 6),
(103, 'QUIMICA', 9, 1, 5, 10),
(104, 'INGLES', 9, 1, 6, 12),
(105, 'EDUCACION FISICA', 9, 1, NULL, NULL),
(106, 'FILOSOFIA', 9, 1, NULL, NULL),
(107, 'ARTISTICA', 9, 1, NULL, NULL),
(108, 'ETICA', 9, 1, NULL, NULL),
(109, 'ECONOMÍA', 9, 1, 1, 2),
(110, 'FISICA', 9, 1, 2, 4),
(111, 'RELIGION', 9, 1, NULL, NULL),
(112, 'INFORMATICA', 9, 1, NULL, NULL),
(113, 'PROYECTO', 10, 1, 1, 2),
(114, 'MATEMATICAS', 10, 2, 2, 4),
(115, 'ESPAÑOL', 10, 2, 3, 6),
(116, 'QUIMICA', 10, 1, 5, 10),
(117, 'INGLES', 10, 2, 6, 12),
(118, 'EDUCACION FISICA', 10, 3, NULL, NULL),
(119, 'FILOSOFIA', 10, 1, NULL, NULL),
(120, 'ARTISTICA', 10, 1, NULL, NULL),
(121, 'ETICA', 10, 1, NULL, NULL),
(122, 'ECONOMÍA', 10, 1, 1, 2),
(123, 'FISICA', 10, 2, 2, 4),
(124, 'RELIGION', 10, 2, NULL, NULL),
(125, 'INFORMATICA', 10, 2, NULL, NULL),
(126, 'PROYECTO', 11, 1, 1, 2),
(127, 'MATEMATICAS', 11, 2, 2, 4),
(128, 'ESPAÑOL', 11, 2, 3, 6),
(129, 'QUIMICA', 11, 1, 5, 10),
(130, 'INGLES', 11, 2, 6, 12),
(131, 'EDUCACION FISICA', 11, 3, NULL, NULL),
(132, 'FILOSOFIA', 11, 1, NULL, NULL),
(133, 'ARTISTICA', 11, 1, NULL, NULL),
(134, 'ETICA', 11, 1, NULL, NULL),
(135, 'ECONOMÍA', 11, 1, 1, 2),
(136, 'FISICA', 11, 2, 2, 4),
(137, 'RELIGION', 11, 2, NULL, NULL),
(138, 'INFORMATICA', 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE IF NOT EXISTS `matricula` (
`idMatricula` int(11) NOT NULL,
  `estadoMatricula` varchar(45) NOT NULL,
  `numeroAlumnos` decimal(10,0) DEFAULT NULL,
  `anio_idAnio` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`idMatricula`, `estadoMatricula`, `numeroAlumnos`, `anio_idAnio`) VALUES
(1, 'Inicial', NULL, 2017),
(2, 'Extraordinaria', NULL, 2017),
(3, 'Trasladado', NULL, 2017),
(4, 'Desertor', NULL, 2017),
(5, 'Inicial', NULL, 2018),
(6, 'Extraordinaria', NULL, 2018),
(7, 'Trasladado', NULL, 2018),
(8, 'Desertor', NULL, 2018),
(9, 'Inicial', NULL, 2019),
(10, 'Extraordinaria', NULL, 2019),
(11, 'Trasladado', NULL, 2019),
(12, 'Desertor', NULL, 2019);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notap`
--

CREATE TABLE IF NOT EXISTS `notap` (
`idNotaP` int(11) NOT NULL,
  `faltas` int(11) DEFAULT '0',
  `taller` float DEFAULT '0',
  `pEscrita` float DEFAULT '0',
  `labs` float DEFAULT '0',
  `eOral` float DEFAULT '0',
  `eEscrita` float DEFAULT '0',
  `punt` float DEFAULT '0',
  `pPersonal` float DEFAULT '0',
  `comp` float DEFAULT '0',
  `iParticipacion` float DEFAULT '0',
  `notaParcial` float DEFAULT '0',
  `recuperacion` float DEFAULT '0',
  `notaFinal` float DEFAULT '0',
  `alumno_idAlumno` int(11) NOT NULL DEFAULT '0',
  `materia_idMateria` int(11) NOT NULL,
  `semestre_idSemestre` int(11) NOT NULL,
  `grado_idGrado` int(11) NOT NULL,
  `periodo_idPeriodo` int(11) NOT NULL,
  `anio_idAnio` int(11) NOT NULL,
  `puesto` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=10793 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `notap`
--

INSERT INTO `notap` (`idNotaP`, `faltas`, `taller`, `pEscrita`, `labs`, `eOral`, `eEscrita`, `punt`, `pPersonal`, `comp`, `iParticipacion`, `notaParcial`, `recuperacion`, `notaFinal`, `alumno_idAlumno`, `materia_idMateria`, `semestre_idSemestre`, `grado_idGrado`, `periodo_idPeriodo`, `anio_idAnio`, `puesto`) VALUES
(9837, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 12168385, 11, 1, 1, 1, 2017, 0),
(9838, 5, 5, 4.7, 5, 5, 5, 5, 5, 5, 5, 4.958, 0, 4.958, 12168385, 12, 1, 1, 1, 2017, 0),
(9839, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 12168385, 13, 1, 1, 1, 2017, 0),
(9840, 0, 1, 0, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 14, 1, 1, 1, 2017, 0),
(9841, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 15, 1, 1, 1, 2017, 0),
(9842, 0, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0.86, 0, 0.86, 12168385, 16, 1, 1, 1, 2017, 0),
(9843, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0.14, 0, 0, 12168385, 17, 1, 1, 1, 2017, 0),
(9844, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 18, 1, 1, 1, 2017, 0),
(9845, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 19, 1, 1, 1, 2017, 0),
(9846, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 12168385, 20, 1, 1, 1, 2017, 0),
(9847, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 11, 1, 1, 2, 2017, 0),
(9848, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 12, 1, 1, 2, 2017, 0),
(9849, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 13, 1, 1, 2, 2017, 0),
(9850, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 14, 1, 1, 2, 2017, 0),
(9851, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 15, 1, 1, 2, 2017, 0),
(9852, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 16, 1, 1, 2, 2017, 0),
(9853, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 17, 1, 1, 2, 2017, 0),
(9854, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 18, 1, 1, 2, 2017, 0),
(9855, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 19, 1, 1, 2, 2017, 0),
(9856, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 20, 1, 1, 2, 2017, 0),
(9857, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 11, 2, 1, 3, 2017, 0),
(9858, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 12, 2, 1, 3, 2017, 0),
(9859, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 13, 2, 1, 3, 2017, 0),
(9860, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 14, 2, 1, 3, 2017, 0),
(9861, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 15, 2, 1, 3, 2017, 0),
(9862, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 16, 2, 1, 3, 2017, 0),
(9863, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 17, 2, 1, 3, 2017, 0),
(9864, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 18, 2, 1, 3, 2017, 0),
(9865, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 19, 2, 1, 3, 2017, 0),
(9866, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 20, 2, 1, 3, 2017, 0),
(9867, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 11, 2, 1, 4, 2017, 0),
(9868, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 12, 2, 1, 4, 2017, 0),
(9869, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 13, 2, 1, 4, 2017, 0),
(9870, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 14, 2, 1, 4, 2017, 0),
(9871, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 15, 2, 1, 4, 2017, 0),
(9872, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 16, 2, 1, 4, 2017, 0),
(9873, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 17, 2, 1, 4, 2017, 0),
(9874, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 18, 2, 1, 4, 2017, 0),
(9875, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 19, 2, 1, 4, 2017, 0),
(9876, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168385, 20, 2, 1, 4, 2017, 0),
(9877, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 0, 2, 1084258334, 11, 1, 1, 1, 2017, 0),
(9878, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 0, 4, 1084258334, 12, 1, 1, 1, 2017, 0),
(9879, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 13, 1, 1, 1, 2017, 0),
(9880, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1084258334, 14, 1, 1, 1, 2017, 0),
(9881, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 15, 1, 1, 1, 2017, 0),
(9882, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 5, 1084258334, 16, 1, 1, 1, 2017, 0),
(9883, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 17, 1, 1, 1, 2017, 0),
(9884, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 18, 1, 1, 1, 2017, 0),
(9885, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 19, 1, 1, 1, 2017, 0),
(9886, 0, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 0, 3, 1084258334, 20, 1, 1, 1, 2017, 0),
(9887, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 11, 1, 1, 2, 2017, 0),
(9888, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 12, 1, 1, 2, 2017, 0),
(9889, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 13, 1, 1, 2, 2017, 0),
(9890, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 14, 1, 1, 2, 2017, 0),
(9891, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 15, 1, 1, 2, 2017, 0),
(9892, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 16, 1, 1, 2, 2017, 0),
(9893, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 17, 1, 1, 2, 2017, 0),
(9894, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 18, 1, 1, 2, 2017, 0),
(9895, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 19, 1, 1, 2, 2017, 0),
(9896, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 20, 1, 1, 2, 2017, 0),
(9897, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 11, 2, 1, 3, 2017, 0),
(9898, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 12, 2, 1, 3, 2017, 0),
(9899, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 13, 2, 1, 3, 2017, 0),
(9900, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 14, 2, 1, 3, 2017, 0),
(9901, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 15, 2, 1, 3, 2017, 0),
(9902, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 16, 2, 1, 3, 2017, 0),
(9903, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 17, 2, 1, 3, 2017, 0),
(9904, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 18, 2, 1, 3, 2017, 0),
(9905, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 19, 2, 1, 3, 2017, 0),
(9906, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 20, 2, 1, 3, 2017, 0),
(9907, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 11, 2, 1, 4, 2017, 0),
(9908, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 12, 2, 1, 4, 2017, 0),
(9909, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 13, 2, 1, 4, 2017, 0),
(9910, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 14, 2, 1, 4, 2017, 0),
(9911, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 15, 2, 1, 4, 2017, 0),
(9912, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 16, 2, 1, 4, 2017, 0),
(9913, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 17, 2, 1, 4, 2017, 0),
(9914, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 18, 2, 1, 4, 2017, 0),
(9915, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 19, 2, 1, 4, 2017, 0),
(9916, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258334, 20, 2, 1, 4, 2017, 0),
(9917, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 5, 1084567850, 11, 1, 1, 1, 2017, 0),
(9918, 0, 0, 0, 4, 4, 4, 4, 4, 0, 0, 2.28, 0, 2.28, 1084567850, 12, 1, 1, 1, 2017, 0),
(9919, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 13, 1, 1, 1, 2017, 0),
(9920, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 14, 1, 1, 1, 2017, 0),
(9921, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 15, 1, 1, 1, 2017, 0),
(9922, 0, 1, 1, 4, 4, 4, 0, 4, 0, 4, 2.56, 0, 2.56, 1084567850, 16, 1, 1, 1, 2017, 0),
(9923, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 17, 1, 1, 1, 2017, 0),
(9924, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 18, 1, 1, 1, 2017, 0),
(9925, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 19, 1, 1, 1, 2017, 0),
(9926, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 20, 1, 1, 1, 2017, 0),
(9927, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 11, 1, 1, 2, 2017, 0),
(9928, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 12, 1, 1, 2, 2017, 0),
(9929, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 13, 1, 1, 2, 2017, 0),
(9930, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 14, 1, 1, 2, 2017, 0),
(9931, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 15, 1, 1, 2, 2017, 0),
(9932, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 16, 1, 1, 2, 2017, 0),
(9933, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 17, 1, 1, 2, 2017, 0),
(9934, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 18, 1, 1, 2, 2017, 0),
(9935, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 19, 1, 1, 2, 2017, 0),
(9936, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 20, 1, 1, 2, 2017, 0),
(9937, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 11, 2, 1, 3, 2017, 0),
(9938, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 12, 2, 1, 3, 2017, 0),
(9939, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 13, 2, 1, 3, 2017, 0),
(9940, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 14, 2, 1, 3, 2017, 0),
(9941, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 15, 2, 1, 3, 2017, 0),
(9942, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 16, 2, 1, 3, 2017, 0),
(9943, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 17, 2, 1, 3, 2017, 0),
(9944, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 18, 2, 1, 3, 2017, 0),
(9945, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 19, 2, 1, 3, 2017, 0),
(9946, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 20, 2, 1, 3, 2017, 0),
(9947, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 11, 2, 1, 4, 2017, 0),
(9948, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 12, 2, 1, 4, 2017, 0),
(9949, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 13, 2, 1, 4, 2017, 0),
(9950, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 14, 2, 1, 4, 2017, 0),
(9951, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 15, 2, 1, 4, 2017, 0),
(9952, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 16, 2, 1, 4, 2017, 0),
(9953, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 17, 2, 1, 4, 2017, 0),
(9954, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 18, 2, 1, 4, 2017, 0),
(9955, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 19, 2, 1, 4, 2017, 0),
(9956, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567850, 20, 2, 1, 4, 2017, 0),
(9957, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 5, 1084567847, 11, 1, 1, 1, 2017, 0),
(9958, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 12, 1, 1, 1, 2017, 0),
(9959, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 13, 1, 1, 1, 2017, 0),
(9960, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 14, 1, 1, 1, 2017, 0),
(9961, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 15, 1, 1, 1, 2017, 0),
(9962, 0, 0, 0, 2, 0, 4, 0, 0, 0, 0, 0.84, 0, 0.84, 1084567847, 16, 1, 1, 1, 2017, 0),
(9963, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 17, 1, 1, 1, 2017, 0),
(9964, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 18, 1, 1, 1, 2017, 0),
(9965, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 19, 1, 1, 1, 2017, 0),
(9966, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 20, 1, 1, 1, 2017, 0),
(9967, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 11, 1, 1, 2, 2017, 0),
(9968, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 12, 1, 1, 2, 2017, 0),
(9969, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 13, 1, 1, 2, 2017, 0),
(9970, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 14, 1, 1, 2, 2017, 0),
(9971, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 15, 1, 1, 2, 2017, 0),
(9972, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 16, 1, 1, 2, 2017, 0),
(9973, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 17, 1, 1, 2, 2017, 0),
(9974, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 18, 1, 1, 2, 2017, 0),
(9975, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 19, 1, 1, 2, 2017, 0),
(9976, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 20, 1, 1, 2, 2017, 0),
(9977, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 11, 2, 1, 3, 2017, 0),
(9978, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 12, 2, 1, 3, 2017, 0),
(9979, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 13, 2, 1, 3, 2017, 0),
(9980, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 14, 2, 1, 3, 2017, 0),
(9981, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 15, 2, 1, 3, 2017, 0),
(9982, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 16, 2, 1, 3, 2017, 0),
(9983, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 17, 2, 1, 3, 2017, 0),
(9984, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 18, 2, 1, 3, 2017, 0),
(9985, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 19, 2, 1, 3, 2017, 0),
(9986, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 20, 2, 1, 3, 2017, 0),
(9987, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 11, 2, 1, 4, 2017, 0),
(9988, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 12, 2, 1, 4, 2017, 0),
(9989, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 13, 2, 1, 4, 2017, 0),
(9990, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 14, 2, 1, 4, 2017, 0),
(9991, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 15, 2, 1, 4, 2017, 0),
(9992, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 16, 2, 1, 4, 2017, 0),
(9993, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 17, 2, 1, 4, 2017, 0),
(9994, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 18, 2, 1, 4, 2017, 0),
(9995, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 19, 2, 1, 4, 2017, 0),
(9996, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084567847, 20, 2, 1, 4, 2017, 0),
(9997, 7, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 0, 2, 2147483647, 11, 1, 1, 1, 2017, 0),
(9998, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 12, 1, 1, 1, 2017, 0),
(9999, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 13, 1, 1, 1, 2017, 0),
(10000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 14, 1, 1, 1, 2017, 0),
(10001, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 15, 1, 1, 1, 2017, 0),
(10002, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0.14, 0, 0.14, 2147483647, 16, 1, 1, 1, 2017, 0),
(10003, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 17, 1, 1, 1, 2017, 0),
(10004, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 18, 1, 1, 1, 2017, 0),
(10005, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 19, 1, 1, 1, 2017, 0),
(10006, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 20, 1, 1, 1, 2017, 0),
(10007, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 11, 1, 1, 2, 2017, 0),
(10008, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 12, 1, 1, 2, 2017, 0),
(10009, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 13, 1, 1, 2, 2017, 0),
(10010, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 14, 1, 1, 2, 2017, 0),
(10011, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 15, 1, 1, 2, 2017, 0),
(10012, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 16, 1, 1, 2, 2017, 0),
(10013, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 17, 1, 1, 2, 2017, 0),
(10014, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 18, 1, 1, 2, 2017, 0),
(10015, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 19, 1, 1, 2, 2017, 0),
(10016, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 20, 1, 1, 2, 2017, 0),
(10017, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 11, 2, 1, 3, 2017, 0),
(10018, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 12, 2, 1, 3, 2017, 0),
(10019, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 13, 2, 1, 3, 2017, 0),
(10020, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 14, 2, 1, 3, 2017, 0),
(10021, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 15, 2, 1, 3, 2017, 0),
(10022, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 16, 2, 1, 3, 2017, 0),
(10023, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 17, 2, 1, 3, 2017, 0),
(10024, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 18, 2, 1, 3, 2017, 0),
(10025, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 19, 2, 1, 3, 2017, 0),
(10026, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 20, 2, 1, 3, 2017, 0),
(10027, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 11, 2, 1, 4, 2017, 0),
(10028, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 12, 2, 1, 4, 2017, 0),
(10029, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 13, 2, 1, 4, 2017, 0),
(10030, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 14, 2, 1, 4, 2017, 0),
(10031, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 15, 2, 1, 4, 2017, 0),
(10032, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 16, 2, 1, 4, 2017, 0),
(10033, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 17, 2, 1, 4, 2017, 0),
(10034, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 18, 2, 1, 4, 2017, 0),
(10035, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 19, 2, 1, 4, 2017, 0),
(10036, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 20, 2, 1, 4, 2017, 0),
(10037, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 5, 12312313, 11, 1, 1, 1, 2017, 0),
(10038, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 5, 12312313, 12, 1, 1, 1, 2017, 0),
(10039, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 5, 12312313, 13, 1, 1, 1, 2017, 0),
(10040, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 14, 1, 1, 1, 2017, 0),
(10041, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 5, 12312313, 15, 1, 1, 1, 2017, 0),
(10042, 0, 0, 0, 5, 0, 5, 5, 5, 0, 0, 2.15, 0, 2.15, 12312313, 16, 1, 1, 1, 2017, 0),
(10043, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 17, 1, 1, 1, 2017, 0),
(10044, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 18, 1, 1, 1, 2017, 0),
(10045, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 19, 1, 1, 1, 2017, 0),
(10046, 0, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 0, 2, 12312313, 20, 1, 1, 1, 2017, 0),
(10047, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 11, 1, 1, 2, 2017, 0),
(10048, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 12, 1, 1, 2, 2017, 0),
(10049, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 13, 1, 1, 2, 2017, 0),
(10050, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 14, 1, 1, 2, 2017, 0),
(10051, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 15, 1, 1, 2, 2017, 0),
(10052, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 16, 1, 1, 2, 2017, 0),
(10053, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 17, 1, 1, 2, 2017, 0),
(10054, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 18, 1, 1, 2, 2017, 0),
(10055, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 19, 1, 1, 2, 2017, 0),
(10056, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 20, 1, 1, 2, 2017, 0),
(10057, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 11, 2, 1, 3, 2017, 0),
(10058, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 12, 2, 1, 3, 2017, 0),
(10059, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 13, 2, 1, 3, 2017, 0),
(10060, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 14, 2, 1, 3, 2017, 0),
(10061, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 15, 2, 1, 3, 2017, 0),
(10062, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 16, 2, 1, 3, 2017, 0),
(10063, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 17, 2, 1, 3, 2017, 0),
(10064, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 18, 2, 1, 3, 2017, 0),
(10065, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 19, 2, 1, 3, 2017, 0),
(10066, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 20, 2, 1, 3, 2017, 0),
(10067, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 11, 2, 1, 4, 2017, 0),
(10068, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 12, 2, 1, 4, 2017, 0),
(10069, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 13, 2, 1, 4, 2017, 0),
(10070, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 14, 2, 1, 4, 2017, 0),
(10071, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 15, 2, 1, 4, 2017, 0),
(10072, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 16, 2, 1, 4, 2017, 0),
(10073, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 17, 2, 1, 4, 2017, 0),
(10074, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 18, 2, 1, 4, 2017, 0),
(10075, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 19, 2, 1, 4, 2017, 0),
(10076, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12312313, 20, 2, 1, 4, 2017, 0),
(10173, 0, 5, 4, 4, 5, 5, 4, 4, 4, 4, 4.42, 0, 4.42, 13435235, 100, 1, 9, 1, 2017, 0),
(10174, 0, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 0, 3, 13435235, 101, 1, 9, 1, 2017, 0),
(10175, 0, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 0, 2, 13435235, 102, 1, 9, 1, 2017, 0),
(10176, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 13435235, 103, 1, 9, 1, 2017, 0),
(10177, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 5, 13435235, 104, 1, 9, 1, 2017, 0),
(10178, 0, 4, 4, 4, 4, 4, 4, 4, 4, 1, 3.775, 0, 3.775, 13435235, 105, 1, 9, 1, 2017, 0),
(10179, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 13435235, 106, 1, 9, 1, 2017, 0),
(10180, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 0, 3, 13435235, 107, 1, 9, 1, 2017, 0),
(10181, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 108, 1, 9, 1, 2017, 0),
(10182, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 13435235, 109, 1, 9, 1, 2017, 0),
(10183, 0, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 0, 2, 13435235, 110, 1, 9, 1, 2017, 0),
(10184, 0, 3, 5, 5, 5, 3, 3, 3, 3, 3, 3.84, 0, 3.84, 13435235, 111, 1, 9, 1, 2017, 0),
(10185, 7, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 0, 4, 13435235, 112, 1, 9, 1, 2017, 0),
(10186, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 100, 1, 9, 2, 2017, 0),
(10187, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 101, 1, 9, 2, 2017, 0),
(10188, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 102, 1, 9, 2, 2017, 0),
(10189, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 103, 1, 9, 2, 2017, 0),
(10190, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 104, 1, 9, 2, 2017, 0),
(10191, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 105, 1, 9, 2, 2017, 0),
(10192, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 106, 1, 9, 2, 2017, 0),
(10193, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 107, 1, 9, 2, 2017, 0),
(10194, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 108, 1, 9, 2, 2017, 0),
(10195, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 109, 1, 9, 2, 2017, 0),
(10196, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 110, 1, 9, 2, 2017, 0),
(10197, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 111, 1, 9, 2, 2017, 0),
(10198, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 112, 1, 9, 2, 2017, 0),
(10199, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 100, 2, 9, 3, 2017, 0),
(10200, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 101, 2, 9, 3, 2017, 0),
(10201, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 102, 2, 9, 3, 2017, 0),
(10202, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 103, 2, 9, 3, 2017, 0),
(10203, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 104, 2, 9, 3, 2017, 0),
(10204, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 105, 2, 9, 3, 2017, 0),
(10205, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 106, 2, 9, 3, 2017, 0),
(10206, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 107, 2, 9, 3, 2017, 0),
(10207, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 108, 2, 9, 3, 2017, 0),
(10208, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 109, 2, 9, 3, 2017, 0),
(10209, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 110, 2, 9, 3, 2017, 0),
(10210, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 111, 2, 9, 3, 2017, 0),
(10211, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 112, 2, 9, 3, 2017, 0),
(10212, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 100, 2, 9, 4, 2017, 0),
(10213, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 101, 2, 9, 4, 2017, 0),
(10214, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 102, 2, 9, 4, 2017, 0),
(10215, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 103, 2, 9, 4, 2017, 0),
(10216, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 104, 2, 9, 4, 2017, 0),
(10217, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 105, 2, 9, 4, 2017, 0),
(10218, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 106, 2, 9, 4, 2017, 0),
(10219, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 107, 2, 9, 4, 2017, 0),
(10220, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 108, 2, 9, 4, 2017, 0),
(10221, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 109, 2, 9, 4, 2017, 0),
(10222, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 110, 2, 9, 4, 2017, 0),
(10223, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 111, 2, 9, 4, 2017, 0),
(10224, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13435235, 112, 2, 9, 4, 2017, 0),
(10225, 1, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 5, 23456453, 100, 1, 9, 1, 2017, 0),
(10226, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 101, 1, 9, 1, 2017, 0),
(10227, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 5, 23456453, 102, 1, 9, 1, 2017, 0),
(10228, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 5, 23456453, 103, 1, 9, 1, 2017, 0),
(10229, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 5, 23456453, 104, 1, 9, 1, 2017, 0),
(10230, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 5, 23456453, 105, 1, 9, 1, 2017, 0),
(10231, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 106, 1, 9, 1, 2017, 0),
(10232, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 107, 1, 9, 1, 2017, 0),
(10233, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 5, 23456453, 108, 1, 9, 1, 2017, 0),
(10234, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 5, 23456453, 109, 1, 9, 1, 2017, 0),
(10235, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 110, 1, 9, 1, 2017, 0),
(10236, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 5, 23456453, 111, 1, 9, 1, 2017, 0),
(10237, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 112, 1, 9, 1, 2017, 0),
(10238, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 100, 1, 9, 2, 2017, 0),
(10239, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 101, 1, 9, 2, 2017, 0),
(10240, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 102, 1, 9, 2, 2017, 0),
(10241, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 103, 1, 9, 2, 2017, 0),
(10242, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 104, 1, 9, 2, 2017, 0),
(10243, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 105, 1, 9, 2, 2017, 0),
(10244, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 106, 1, 9, 2, 2017, 0),
(10245, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 107, 1, 9, 2, 2017, 0),
(10246, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 108, 1, 9, 2, 2017, 0),
(10247, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 109, 1, 9, 2, 2017, 0),
(10248, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 110, 1, 9, 2, 2017, 0),
(10249, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 111, 1, 9, 2, 2017, 0),
(10250, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 112, 1, 9, 2, 2017, 0),
(10251, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 100, 2, 9, 3, 2017, 0),
(10252, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 101, 2, 9, 3, 2017, 0),
(10253, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 102, 2, 9, 3, 2017, 0),
(10254, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 103, 2, 9, 3, 2017, 0),
(10255, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 104, 2, 9, 3, 2017, 0),
(10256, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 105, 2, 9, 3, 2017, 0),
(10257, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 106, 2, 9, 3, 2017, 0),
(10258, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 107, 2, 9, 3, 2017, 0),
(10259, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 108, 2, 9, 3, 2017, 0),
(10260, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 109, 2, 9, 3, 2017, 0),
(10261, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 110, 2, 9, 3, 2017, 0),
(10262, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 111, 2, 9, 3, 2017, 0),
(10263, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 112, 2, 9, 3, 2017, 0),
(10264, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 100, 2, 9, 4, 2017, 0),
(10265, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 101, 2, 9, 4, 2017, 0),
(10266, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 102, 2, 9, 4, 2017, 0),
(10267, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 103, 2, 9, 4, 2017, 0),
(10268, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 104, 2, 9, 4, 2017, 0),
(10269, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 105, 2, 9, 4, 2017, 0),
(10270, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 106, 2, 9, 4, 2017, 0),
(10271, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 107, 2, 9, 4, 2017, 0),
(10272, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 108, 2, 9, 4, 2017, 0),
(10273, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 109, 2, 9, 4, 2017, 0),
(10274, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 110, 2, 9, 4, 2017, 0),
(10275, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 111, 2, 9, 4, 2017, 0),
(10276, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23456453, 112, 2, 9, 4, 2017, 0),
(10329, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 0, 3, 1084257413, 87, 1, 8, 1, 2017, 0),
(10330, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 5, 1084257413, 88, 1, 8, 1, 2017, 0),
(10331, 25, 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, 0, 2.5, 1084257413, 89, 1, 8, 1, 2017, 0),
(10332, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 90, 1, 8, 1, 2017, 0),
(10333, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 91, 1, 8, 1, 2017, 0),
(10334, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 92, 1, 8, 1, 2017, 0),
(10335, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 93, 1, 8, 1, 2017, 0),
(10336, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 94, 1, 8, 1, 2017, 0),
(10337, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 95, 1, 8, 1, 2017, 0),
(10338, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 96, 1, 8, 1, 2017, 0),
(10339, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 97, 1, 8, 1, 2017, 0),
(10340, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 98, 1, 8, 1, 2017, 0),
(10341, 0, 2, 2, 2, 2, 2, 2, 2, 2, 0, 1.85, 0, 1.85, 1084257413, 99, 1, 8, 1, 2017, 0),
(10342, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 87, 1, 8, 2, 2017, 0),
(10343, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 88, 1, 8, 2, 2017, 0),
(10344, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 89, 1, 8, 2, 2017, 0),
(10345, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 90, 1, 8, 2, 2017, 0),
(10346, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 91, 1, 8, 2, 2017, 0),
(10347, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 92, 1, 8, 2, 2017, 0),
(10348, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 93, 1, 8, 2, 2017, 0),
(10349, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 94, 1, 8, 2, 2017, 0),
(10350, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 95, 1, 8, 2, 2017, 0),
(10351, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 96, 1, 8, 2, 2017, 0),
(10352, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 97, 1, 8, 2, 2017, 0),
(10353, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 98, 1, 8, 2, 2017, 0),
(10354, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 99, 1, 8, 2, 2017, 0),
(10355, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 87, 2, 8, 3, 2017, 0),
(10356, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 88, 2, 8, 3, 2017, 0),
(10357, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 89, 2, 8, 3, 2017, 0),
(10358, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 90, 2, 8, 3, 2017, 0),
(10359, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 91, 2, 8, 3, 2017, 0),
(10360, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 92, 2, 8, 3, 2017, 0),
(10361, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 93, 2, 8, 3, 2017, 0),
(10362, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 94, 2, 8, 3, 2017, 0),
(10363, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 95, 2, 8, 3, 2017, 0),
(10364, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 96, 2, 8, 3, 2017, 0),
(10365, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 97, 2, 8, 3, 2017, 0),
(10366, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 98, 2, 8, 3, 2017, 0),
(10367, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 99, 2, 8, 3, 2017, 0),
(10368, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 87, 2, 8, 4, 2017, 0),
(10369, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 88, 2, 8, 4, 2017, 0),
(10370, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 89, 2, 8, 4, 2017, 0),
(10371, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 90, 2, 8, 4, 2017, 0),
(10372, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 91, 2, 8, 4, 2017, 0),
(10373, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 92, 2, 8, 4, 2017, 0),
(10374, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 93, 2, 8, 4, 2017, 0),
(10375, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 94, 2, 8, 4, 2017, 0),
(10376, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 95, 2, 8, 4, 2017, 0),
(10377, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 96, 2, 8, 4, 2017, 0),
(10378, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 97, 2, 8, 4, 2017, 0),
(10379, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 98, 2, 8, 4, 2017, 0),
(10380, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084257413, 99, 2, 8, 4, 2017, 0),
(10381, 0, 1, 2, 3, 4, 5, 1, 2, 1, 3, 2.625, 0, 2.625, 12168334, 31, 1, 3, 1, 2017, 0),
(10382, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0.42, 0, 0.42, 12168334, 32, 1, 3, 1, 2017, 0),
(10383, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 33, 1, 3, 1, 2017, 0),
(10384, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 34, 1, 3, 1, 2017, 0),
(10385, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 35, 1, 3, 1, 2017, 0),
(10386, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 36, 1, 3, 1, 2017, 0),
(10387, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 37, 1, 3, 1, 2017, 0),
(10388, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 38, 1, 3, 1, 2017, 0),
(10389, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 39, 1, 3, 1, 2017, 0),
(10390, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 40, 1, 3, 1, 2017, 0),
(10391, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 31, 1, 3, 2, 2017, 0),
(10392, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 32, 1, 3, 2, 2017, 0),
(10393, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 33, 1, 3, 2, 2017, 0),
(10394, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 34, 1, 3, 2, 2017, 0),
(10395, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 35, 1, 3, 2, 2017, 0),
(10396, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 36, 1, 3, 2, 2017, 0),
(10397, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 37, 1, 3, 2, 2017, 0),
(10398, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 38, 1, 3, 2, 2017, 0),
(10399, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 39, 1, 3, 2, 2017, 0),
(10400, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 40, 1, 3, 2, 2017, 0),
(10401, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 31, 2, 3, 3, 2017, 0),
(10402, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 32, 2, 3, 3, 2017, 0),
(10403, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 33, 2, 3, 3, 2017, 0),
(10404, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 34, 2, 3, 3, 2017, 0),
(10405, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 35, 2, 3, 3, 2017, 0),
(10406, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 36, 2, 3, 3, 2017, 0),
(10407, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 37, 2, 3, 3, 2017, 0),
(10408, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 38, 2, 3, 3, 2017, 0),
(10409, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 39, 2, 3, 3, 2017, 0),
(10410, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 40, 2, 3, 3, 2017, 0),
(10411, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 31, 2, 3, 4, 2017, 0),
(10412, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 32, 2, 3, 4, 2017, 0),
(10413, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 33, 2, 3, 4, 2017, 0),
(10414, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 34, 2, 3, 4, 2017, 0),
(10415, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 35, 2, 3, 4, 2017, 0),
(10416, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 36, 2, 3, 4, 2017, 0),
(10417, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 37, 2, 3, 4, 2017, 0),
(10418, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 38, 2, 3, 4, 2017, 0),
(10419, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 39, 2, 3, 4, 2017, 0),
(10420, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12168334, 40, 2, 3, 4, 2017, 0),
(10421, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 5, 1084258764, 31, 1, 3, 1, 2017, 0),
(10422, 0, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 0, 4, 1084258764, 32, 1, 3, 1, 2017, 0),
(10423, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 33, 1, 3, 1, 2017, 0),
(10424, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 34, 1, 3, 1, 2017, 0),
(10425, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 35, 1, 3, 1, 2017, 0),
(10426, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 36, 1, 3, 1, 2017, 0),
(10427, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 37, 1, 3, 1, 2017, 0),
(10428, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 38, 1, 3, 1, 2017, 0),
(10429, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 39, 1, 3, 1, 2017, 0),
(10430, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 40, 1, 3, 1, 2017, 0),
(10431, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 31, 1, 3, 2, 2017, 0),
(10432, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 32, 1, 3, 2, 2017, 0),
(10433, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 33, 1, 3, 2, 2017, 0),
(10434, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 34, 1, 3, 2, 2017, 0),
(10435, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 35, 1, 3, 2, 2017, 0),
(10436, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 36, 1, 3, 2, 2017, 0),
(10437, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 37, 1, 3, 2, 2017, 0),
(10438, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 38, 1, 3, 2, 2017, 0),
(10439, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 39, 1, 3, 2, 2017, 0),
(10440, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 40, 1, 3, 2, 2017, 0),
(10441, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 31, 2, 3, 3, 2017, 0),
(10442, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 32, 2, 3, 3, 2017, 0),
(10443, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 33, 2, 3, 3, 2017, 0),
(10444, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 34, 2, 3, 3, 2017, 0),
(10445, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 35, 2, 3, 3, 2017, 0),
(10446, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 36, 2, 3, 3, 2017, 0),
(10447, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 37, 2, 3, 3, 2017, 0),
(10448, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 38, 2, 3, 3, 2017, 0),
(10449, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 39, 2, 3, 3, 2017, 0),
(10450, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 40, 2, 3, 3, 2017, 0),
(10451, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 31, 2, 3, 4, 2017, 0),
(10452, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 32, 2, 3, 4, 2017, 0),
(10453, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 33, 2, 3, 4, 2017, 0),
(10454, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 34, 2, 3, 4, 2017, 0),
(10455, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 35, 2, 3, 4, 2017, 0),
(10456, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 36, 2, 3, 4, 2017, 0),
(10457, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 37, 2, 3, 4, 2017, 0),
(10458, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 38, 2, 3, 4, 2017, 0),
(10459, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 39, 2, 3, 4, 2017, 0),
(10460, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1084258764, 40, 2, 3, 4, 2017, 0),
(10461, 0, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 0, 2, 8889, 1, 1, 13, 1, 2017, 0),
(10462, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 2, 1, 13, 1, 2017, 0),
(10463, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 3, 1, 13, 1, 2017, 0),
(10464, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 4, 1, 13, 1, 2017, 0),
(10465, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 5, 1, 13, 1, 2017, 0),
(10466, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 6, 1, 13, 1, 2017, 0),
(10467, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 7, 1, 13, 1, 2017, 0),
(10468, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 8, 1, 13, 1, 2017, 0),
(10469, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 9, 1, 13, 1, 2017, 0),
(10470, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 0, 2, 8889, 10, 1, 13, 1, 2017, 0),
(10471, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 1, 1, 13, 2, 2017, 0),
(10472, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 2, 1, 13, 2, 2017, 0),
(10473, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 3, 1, 13, 2, 2017, 0),
(10474, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 4, 1, 13, 2, 2017, 0),
(10475, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 5, 1, 13, 2, 2017, 0),
(10476, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 6, 1, 13, 2, 2017, 0),
(10477, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 7, 1, 13, 2, 2017, 0),
(10478, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 8, 1, 13, 2, 2017, 0),
(10479, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 9, 1, 13, 2, 2017, 0),
(10480, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 10, 1, 13, 2, 2017, 0),
(10481, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 1, 2, 13, 3, 2017, 0),
(10482, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 2, 2, 13, 3, 2017, 0),
(10483, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 3, 2, 13, 3, 2017, 0),
(10484, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 4, 2, 13, 3, 2017, 0),
(10485, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 5, 2, 13, 3, 2017, 0),
(10486, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 6, 2, 13, 3, 2017, 0),
(10487, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 7, 2, 13, 3, 2017, 0),
(10488, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 8, 2, 13, 3, 2017, 0),
(10489, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 9, 2, 13, 3, 2017, 0),
(10490, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 10, 2, 13, 3, 2017, 0),
(10491, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 1, 2, 13, 4, 2017, 0),
(10492, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 2, 2, 13, 4, 2017, 0),
(10493, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 3, 2, 13, 4, 2017, 0),
(10494, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 4, 2, 13, 4, 2017, 0),
(10495, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 5, 2, 13, 4, 2017, 0),
(10496, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 6, 2, 13, 4, 2017, 0),
(10497, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 7, 2, 13, 4, 2017, 0),
(10498, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 8, 2, 13, 4, 2017, 0),
(10499, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 9, 2, 13, 4, 2017, 0),
(10500, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8889, 10, 2, 13, 4, 2017, 0),
(10501, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 55578, 1, 1, 13, 1, 2017, 0),
(10502, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 2, 1, 13, 1, 2017, 0),
(10503, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 3, 1, 13, 1, 2017, 0),
(10504, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 4, 1, 13, 1, 2017, 0),
(10505, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 5, 1, 13, 1, 2017, 0),
(10506, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 6, 1, 13, 1, 2017, 0),
(10507, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 7, 1, 13, 1, 2017, 0),
(10508, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 8, 1, 13, 1, 2017, 0),
(10509, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 9, 1, 13, 1, 2017, 0),
(10510, 0, 1, 1, 1, 0, 0, 0, 1, 1, 1, 0.645, 0, 0.645, 55578, 10, 1, 13, 1, 2017, 0),
(10511, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 1, 1, 13, 2, 2017, 0),
(10512, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 2, 1, 13, 2, 2017, 0),
(10513, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 3, 1, 13, 2, 2017, 0),
(10514, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 4, 1, 13, 2, 2017, 0),
(10515, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 5, 1, 13, 2, 2017, 0),
(10516, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 6, 1, 13, 2, 2017, 0),
(10517, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 7, 1, 13, 2, 2017, 0),
(10518, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 8, 1, 13, 2, 2017, 0),
(10519, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 9, 1, 13, 2, 2017, 0),
(10520, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 10, 1, 13, 2, 2017, 0),
(10521, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 1, 2, 13, 3, 2017, 0),
(10522, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 2, 2, 13, 3, 2017, 0),
(10523, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 3, 2, 13, 3, 2017, 0),
(10524, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 4, 2, 13, 3, 2017, 0),
(10525, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 5, 2, 13, 3, 2017, 0),
(10526, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 6, 2, 13, 3, 2017, 0),
(10527, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 7, 2, 13, 3, 2017, 0),
(10528, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 8, 2, 13, 3, 2017, 0),
(10529, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 9, 2, 13, 3, 2017, 0),
(10530, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 10, 2, 13, 3, 2017, 0),
(10531, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 1, 2, 13, 4, 2017, 0),
(10532, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 2, 2, 13, 4, 2017, 0),
(10533, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 3, 2, 13, 4, 2017, 0),
(10534, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 4, 2, 13, 4, 2017, 0),
(10535, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 5, 2, 13, 4, 2017, 0),
(10536, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 6, 2, 13, 4, 2017, 0),
(10537, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 7, 2, 13, 4, 2017, 0),
(10538, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 8, 2, 13, 4, 2017, 0),
(10539, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 9, 2, 13, 4, 2017, 0),
(10540, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55578, 10, 2, 13, 4, 2017, 0),
(10541, 0, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 0, 3, 7778, 1, 1, 13, 1, 2017, 0),
(10542, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 2, 1, 13, 1, 2017, 0),
(10543, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 3, 1, 13, 1, 2017, 0),
(10544, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 4, 1, 13, 1, 2017, 0),
(10545, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 5, 1, 13, 1, 2017, 0),
(10546, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 6, 1, 13, 1, 2017, 0),
(10547, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 7, 1, 13, 1, 2017, 0),
(10548, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 8, 1, 13, 1, 2017, 0),
(10549, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 9, 1, 13, 1, 2017, 0),
(10550, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 10, 1, 13, 1, 2017, 0),
(10551, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 1, 1, 13, 2, 2017, 0),
(10552, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 2, 1, 13, 2, 2017, 0),
(10553, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 3, 1, 13, 2, 2017, 0),
(10554, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 4, 1, 13, 2, 2017, 0),
(10555, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 5, 1, 13, 2, 2017, 0),
(10556, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 6, 1, 13, 2, 2017, 0),
(10557, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 7, 1, 13, 2, 2017, 0),
(10558, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 8, 1, 13, 2, 2017, 0),
(10559, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 9, 1, 13, 2, 2017, 0),
(10560, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 10, 1, 13, 2, 2017, 0),
(10561, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 1, 2, 13, 3, 2017, 0),
(10562, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 2, 2, 13, 3, 2017, 0),
(10563, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 3, 2, 13, 3, 2017, 0),
(10564, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 4, 2, 13, 3, 2017, 0),
(10565, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 5, 2, 13, 3, 2017, 0),
(10566, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 6, 2, 13, 3, 2017, 0),
(10567, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 7, 2, 13, 3, 2017, 0),
(10568, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 8, 2, 13, 3, 2017, 0),
(10569, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 9, 2, 13, 3, 2017, 0),
(10570, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 10, 2, 13, 3, 2017, 0),
(10571, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 1, 2, 13, 4, 2017, 0),
(10572, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 2, 2, 13, 4, 2017, 0),
(10573, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 3, 2, 13, 4, 2017, 0),
(10574, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 4, 2, 13, 4, 2017, 0),
(10575, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 5, 2, 13, 4, 2017, 0),
(10576, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 6, 2, 13, 4, 2017, 0),
(10577, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 7, 2, 13, 4, 2017, 0),
(10578, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 8, 2, 13, 4, 2017, 0),
(10579, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 9, 2, 13, 4, 2017, 0),
(10580, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7778, 10, 2, 13, 4, 2017, 0),
(10581, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 5, 13, 1, 1, 13, 1, 2017, 0),
(10582, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 2, 1, 13, 1, 2017, 0),
(10583, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 3, 1, 13, 1, 2017, 0),
(10584, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 4, 1, 13, 1, 2017, 0),
(10585, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 5, 1, 13, 1, 2017, 0),
(10586, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 6, 1, 13, 1, 2017, 0),
(10587, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 7, 1, 13, 1, 2017, 0),
(10588, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 8, 1, 13, 1, 2017, 0),
(10589, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 9, 1, 13, 1, 2017, 0),
(10590, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 0, 4, 13, 10, 1, 13, 1, 2017, 0),
(10591, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 1, 1, 13, 2, 2017, 0),
(10592, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 2, 1, 13, 2, 2017, 0),
(10593, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 3, 1, 13, 2, 2017, 0),
(10594, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 4, 1, 13, 2, 2017, 0),
(10595, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 5, 1, 13, 2, 2017, 0),
(10596, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 6, 1, 13, 2, 2017, 0),
(10597, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 7, 1, 13, 2, 2017, 0),
(10598, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 8, 1, 13, 2, 2017, 0),
(10599, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 9, 1, 13, 2, 2017, 0),
(10600, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 10, 1, 13, 2, 2017, 0),
(10601, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 1, 2, 13, 3, 2017, 0),
(10602, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 2, 2, 13, 3, 2017, 0),
(10603, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 3, 2, 13, 3, 2017, 0),
(10604, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 4, 2, 13, 3, 2017, 0),
(10605, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 5, 2, 13, 3, 2017, 0),
(10606, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 6, 2, 13, 3, 2017, 0),
(10607, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 7, 2, 13, 3, 2017, 0),
(10608, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 8, 2, 13, 3, 2017, 0),
(10609, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 9, 2, 13, 3, 2017, 0),
(10610, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 10, 2, 13, 3, 2017, 0),
(10611, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 1, 2, 13, 4, 2017, 0),
(10612, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 2, 2, 13, 4, 2017, 0),
(10613, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 3, 2, 13, 4, 2017, 0),
(10614, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 4, 2, 13, 4, 2017, 0),
(10615, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 5, 2, 13, 4, 2017, 0),
(10616, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 6, 2, 13, 4, 2017, 0),
(10617, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 7, 2, 13, 4, 2017, 0),
(10618, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 8, 2, 13, 4, 2017, 0),
(10619, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 9, 2, 13, 4, 2017, 0),
(10620, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 10, 2, 13, 4, 2017, 0),
(10621, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 74, 1, 7, 1, 2017, 0),
(10622, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 75, 1, 7, 1, 2017, 0);
INSERT INTO `notap` (`idNotaP`, `faltas`, `taller`, `pEscrita`, `labs`, `eOral`, `eEscrita`, `punt`, `pPersonal`, `comp`, `iParticipacion`, `notaParcial`, `recuperacion`, `notaFinal`, `alumno_idAlumno`, `materia_idMateria`, `semestre_idSemestre`, `grado_idGrado`, `periodo_idPeriodo`, `anio_idAnio`, `puesto`) VALUES
(10623, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 76, 1, 7, 1, 2017, 0),
(10624, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 77, 1, 7, 1, 2017, 0),
(10625, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 78, 1, 7, 1, 2017, 0),
(10626, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 79, 1, 7, 1, 2017, 0),
(10627, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 80, 1, 7, 1, 2017, 0),
(10628, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 81, 1, 7, 1, 2017, 0),
(10629, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 82, 1, 7, 1, 2017, 0),
(10630, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 83, 1, 7, 1, 2017, 0),
(10631, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 84, 1, 7, 1, 2017, 0),
(10632, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 85, 1, 7, 1, 2017, 0),
(10633, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 86, 1, 7, 1, 2017, 0),
(10634, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 74, 1, 7, 2, 2017, 0),
(10635, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 75, 1, 7, 2, 2017, 0),
(10636, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 76, 1, 7, 2, 2017, 0),
(10637, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 77, 1, 7, 2, 2017, 0),
(10638, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 78, 1, 7, 2, 2017, 0),
(10639, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 79, 1, 7, 2, 2017, 0),
(10640, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 80, 1, 7, 2, 2017, 0),
(10641, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 81, 1, 7, 2, 2017, 0),
(10642, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 82, 1, 7, 2, 2017, 0),
(10643, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 83, 1, 7, 2, 2017, 0),
(10644, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 84, 1, 7, 2, 2017, 0),
(10645, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 85, 1, 7, 2, 2017, 0),
(10646, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 86, 1, 7, 2, 2017, 0),
(10647, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 74, 2, 7, 3, 2017, 0),
(10648, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 75, 2, 7, 3, 2017, 0),
(10649, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 76, 2, 7, 3, 2017, 0),
(10650, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 77, 2, 7, 3, 2017, 0),
(10651, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 78, 2, 7, 3, 2017, 0),
(10652, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 79, 2, 7, 3, 2017, 0),
(10653, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 80, 2, 7, 3, 2017, 0),
(10654, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 81, 2, 7, 3, 2017, 0),
(10655, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 82, 2, 7, 3, 2017, 0),
(10656, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 83, 2, 7, 3, 2017, 0),
(10657, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 84, 2, 7, 3, 2017, 0),
(10658, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 85, 2, 7, 3, 2017, 0),
(10659, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 86, 2, 7, 3, 2017, 0),
(10660, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 74, 2, 7, 4, 2017, 0),
(10661, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 75, 2, 7, 4, 2017, 0),
(10662, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 76, 2, 7, 4, 2017, 0),
(10663, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 77, 2, 7, 4, 2017, 0),
(10664, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 78, 2, 7, 4, 2017, 0),
(10665, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 79, 2, 7, 4, 2017, 0),
(10666, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 80, 2, 7, 4, 2017, 0),
(10667, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 81, 2, 7, 4, 2017, 0),
(10668, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 82, 2, 7, 4, 2017, 0),
(10669, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 83, 2, 7, 4, 2017, 0),
(10670, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 84, 2, 7, 4, 2017, 0),
(10671, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 85, 2, 7, 4, 2017, 0),
(10672, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 86, 2, 7, 4, 2017, 0),
(10673, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 11, 1, 1, 1, 2017, 0),
(10674, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 12, 1, 1, 1, 2017, 0),
(10675, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 13, 1, 1, 1, 2017, 0),
(10676, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 14, 1, 1, 1, 2017, 0),
(10677, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 15, 1, 1, 1, 2017, 0),
(10678, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 16, 1, 1, 1, 2017, 0),
(10679, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 17, 1, 1, 1, 2017, 0),
(10680, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 18, 1, 1, 1, 2017, 0),
(10681, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 19, 1, 1, 1, 2017, 0),
(10682, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 20, 1, 1, 1, 2017, 0),
(10683, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 11, 1, 1, 2, 2017, 0),
(10684, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 12, 1, 1, 2, 2017, 0),
(10685, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 13, 1, 1, 2, 2017, 0),
(10686, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 14, 1, 1, 2, 2017, 0),
(10687, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 15, 1, 1, 2, 2017, 0),
(10688, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 16, 1, 1, 2, 2017, 0),
(10689, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 17, 1, 1, 2, 2017, 0),
(10690, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 18, 1, 1, 2, 2017, 0),
(10691, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 19, 1, 1, 2, 2017, 0),
(10692, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 20, 1, 1, 2, 2017, 0),
(10693, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 11, 2, 1, 3, 2017, 0),
(10694, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 12, 2, 1, 3, 2017, 0),
(10695, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 13, 2, 1, 3, 2017, 0),
(10696, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 14, 2, 1, 3, 2017, 0),
(10697, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 15, 2, 1, 3, 2017, 0),
(10698, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 16, 2, 1, 3, 2017, 0),
(10699, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 17, 2, 1, 3, 2017, 0),
(10700, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 18, 2, 1, 3, 2017, 0),
(10701, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 19, 2, 1, 3, 2017, 0),
(10702, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 20, 2, 1, 3, 2017, 0),
(10703, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 11, 2, 1, 4, 2017, 0),
(10704, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 12, 2, 1, 4, 2017, 0),
(10705, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 13, 2, 1, 4, 2017, 0),
(10706, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 14, 2, 1, 4, 2017, 0),
(10707, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 15, 2, 1, 4, 2017, 0),
(10708, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 16, 2, 1, 4, 2017, 0),
(10709, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 17, 2, 1, 4, 2017, 0),
(10710, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 18, 2, 1, 4, 2017, 0),
(10711, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 19, 2, 1, 4, 2017, 0),
(10712, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134424, 20, 2, 1, 4, 2017, 0),
(10713, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 11, 1, 1, 1, 2017, 0),
(10714, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 12, 1, 1, 1, 2017, 0),
(10715, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 13, 1, 1, 1, 2017, 0),
(10716, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 14, 1, 1, 1, 2017, 0),
(10717, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 15, 1, 1, 1, 2017, 0),
(10718, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 16, 1, 1, 1, 2017, 0),
(10719, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 17, 1, 1, 1, 2017, 0),
(10720, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 18, 1, 1, 1, 2017, 0),
(10721, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 19, 1, 1, 1, 2017, 0),
(10722, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 20, 1, 1, 1, 2017, 0),
(10723, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 11, 1, 1, 2, 2017, 0),
(10724, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 12, 1, 1, 2, 2017, 0),
(10725, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 13, 1, 1, 2, 2017, 0),
(10726, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 14, 1, 1, 2, 2017, 0),
(10727, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 15, 1, 1, 2, 2017, 0),
(10728, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 16, 1, 1, 2, 2017, 0),
(10729, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 17, 1, 1, 2, 2017, 0),
(10730, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 18, 1, 1, 2, 2017, 0),
(10731, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 19, 1, 1, 2, 2017, 0),
(10732, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 20, 1, 1, 2, 2017, 0),
(10733, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 11, 2, 1, 3, 2017, 0),
(10734, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 12, 2, 1, 3, 2017, 0),
(10735, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 13, 2, 1, 3, 2017, 0),
(10736, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 14, 2, 1, 3, 2017, 0),
(10737, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 15, 2, 1, 3, 2017, 0),
(10738, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 16, 2, 1, 3, 2017, 0),
(10739, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 17, 2, 1, 3, 2017, 0),
(10740, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 18, 2, 1, 3, 2017, 0),
(10741, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 19, 2, 1, 3, 2017, 0),
(10742, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 20, 2, 1, 3, 2017, 0),
(10743, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 11, 2, 1, 4, 2017, 0),
(10744, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 12, 2, 1, 4, 2017, 0),
(10745, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 13, 2, 1, 4, 2017, 0),
(10746, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 14, 2, 1, 4, 2017, 0),
(10747, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 15, 2, 1, 4, 2017, 0),
(10748, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 16, 2, 1, 4, 2017, 0),
(10749, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 17, 2, 1, 4, 2017, 0),
(10750, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 18, 2, 1, 4, 2017, 0),
(10751, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 19, 2, 1, 4, 2017, 0),
(10752, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99988878, 20, 2, 1, 4, 2017, 0),
(10753, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 11, 1, 1, 1, 2017, 0),
(10754, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 12, 1, 1, 1, 2017, 0),
(10755, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 13, 1, 1, 1, 2017, 0),
(10756, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 14, 1, 1, 1, 2017, 0),
(10757, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 15, 1, 1, 1, 2017, 0),
(10758, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 16, 1, 1, 1, 2017, 0),
(10759, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 17, 1, 1, 1, 2017, 0),
(10760, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 18, 1, 1, 1, 2017, 0),
(10761, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 19, 1, 1, 1, 2017, 0),
(10762, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 20, 1, 1, 1, 2017, 0),
(10763, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 11, 1, 1, 2, 2017, 0),
(10764, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 12, 1, 1, 2, 2017, 0),
(10765, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 13, 1, 1, 2, 2017, 0),
(10766, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 14, 1, 1, 2, 2017, 0),
(10767, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 15, 1, 1, 2, 2017, 0),
(10768, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 16, 1, 1, 2, 2017, 0),
(10769, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 17, 1, 1, 2, 2017, 0),
(10770, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 18, 1, 1, 2, 2017, 0),
(10771, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 19, 1, 1, 2, 2017, 0),
(10772, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 20, 1, 1, 2, 2017, 0),
(10773, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 11, 2, 1, 3, 2017, 0),
(10774, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 12, 2, 1, 3, 2017, 0),
(10775, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 13, 2, 1, 3, 2017, 0),
(10776, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 14, 2, 1, 3, 2017, 0),
(10777, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 15, 2, 1, 3, 2017, 0),
(10778, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 16, 2, 1, 3, 2017, 0),
(10779, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 17, 2, 1, 3, 2017, 0),
(10780, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 18, 2, 1, 3, 2017, 0),
(10781, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 19, 2, 1, 3, 2017, 0),
(10782, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 20, 2, 1, 3, 2017, 0),
(10783, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 11, 2, 1, 4, 2017, 0),
(10784, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 12, 2, 1, 4, 2017, 0),
(10785, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 13, 2, 1, 4, 2017, 0),
(10786, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 14, 2, 1, 4, 2017, 0),
(10787, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 15, 2, 1, 4, 2017, 0),
(10788, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 16, 2, 1, 4, 2017, 0),
(10789, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 17, 2, 1, 4, 2017, 0),
(10790, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 18, 2, 1, 4, 2017, 0),
(10791, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 19, 2, 1, 4, 2017, 0),
(10792, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5556678, 20, 2, 1, 4, 2017, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE IF NOT EXISTS `periodo` (
`idPeriodo` int(11) NOT NULL,
  `numeroPeriodo` int(1) DEFAULT NULL,
  `anio_idAnio` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`idPeriodo`, `numeroPeriodo`, `anio_idAnio`) VALUES
(1, 1, 2017),
(2, 2, 2017),
(3, 3, 2017),
(4, 4, 2017),
(5, 1, 2018),
(6, 2, 2018),
(7, 3, 2018),
(8, 4, 2018),
(9, 1, 2019),
(10, 2, 2019),
(11, 3, 2019),
(12, 4, 2019);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE IF NOT EXISTS `profesor` (
`idPro` int(11) NOT NULL,
  `nombrePro` varchar(45) DEFAULT NULL,
  `apellidoPro` varchar(45) DEFAULT NULL,
  `fotoPro` varchar(45) DEFAULT NULL,
  `estadoPro` varchar(45) DEFAULT NULL,
  `identidadPro` bigint(16) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`idPro`, `nombrePro`, `apellidoPro`, `fotoPro`, `estadoPro`, `identidadPro`) VALUES
(1, 'Olga L.', 'Garzón', 'uploads/olga.jpg', 'Activo', 36113277),
(2, 'Emilce A.', 'Anacona', 'uploads/emilce.jpg', 'Activo', 0),
(3, 'Yeison E.', 'Caicedo ', 'uploads/yeison.jpg', 'Activo', 0),
(4, 'Tatiana', 'Segura', NULL, 'Activo', 0),
(5, 'Angelino', 'Buitrago', NULL, 'Inactivo', 0),
(15, 'Probencio', 'Jimenez', NULL, 'Activo', 0),
(16, 'Juliana', 'Apellidiña', NULL, 'Inactivo', 0),
(17, 'ALIRIO', 'GONZALES', NULL, 'Activo', 12168387);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promedio`
--

CREATE TABLE IF NOT EXISTS `promedio` (
`idPromedio` int(11) NOT NULL,
  `valor` float DEFAULT '0',
  `periodo_idPeriodo` int(11) NOT NULL,
  `alumno_idAlumno` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `promedio`
--

INSERT INTO `promedio` (`idPromedio`, `valor`, `periodo_idPeriodo`, `alumno_idAlumno`) VALUES
(1, 0.78, 1, 12168385),
(2, 0.58, 1, 1084567847),
(3, 0.98, 1, 1084567850),
(4, 2.42, 1, 12312313),
(5, 1.5, 1, 1084258334),
(6, 0.21, 1, 2147483647),
(7, 3.08, 1, 23456453),
(8, 2.62, 1, 13435235),
(9, 0, 2, 23456453),
(10, 0, 2, 13435235),
(15, 0.72, 1, 36113201),
(16, 0, 2, 36113201),
(17, 0, 3, 36113201),
(18, 0, 4, 36113201),
(19, 0.95, 1, 1084257413),
(20, 0, 2, 1084257413),
(21, 0, 3, 1084257413),
(22, 0, 4, 1084257413),
(23, 0.3, 1, 12168334),
(24, 0, 2, 12168334),
(25, 0, 3, 12168334),
(26, 0, 4, 12168334),
(27, 0.9, 1, 1084258764),
(28, 0, 2, 1084258764),
(29, 0, 3, 1084258764),
(30, 0, 4, 1084258764),
(31, 0.4, 1, 8889),
(32, 0, 2, 8889),
(33, 0, 3, 8889),
(34, 0, 4, 8889),
(35, 0.16, 1, 55578),
(36, 0, 2, 55578),
(37, 0, 3, 55578),
(38, 0, 4, 55578),
(39, 0.3, 1, 7778),
(40, 0, 2, 7778),
(41, 0, 3, 7778),
(42, 0, 4, 7778),
(43, 0.9, 1, 13),
(44, 0, 2, 13),
(45, 0, 3, 13),
(46, 0, 4, 13),
(47, 0, 1, 44),
(48, 0, 2, 44),
(49, 0, 3, 44),
(50, 0, 4, 44),
(51, 0, 1, 134424),
(52, 0, 2, 134424),
(53, 0, 3, 134424),
(54, 0, 4, 134424),
(55, 0, 1, 99988878),
(56, 0, 2, 99988878),
(57, 0, 3, 99988878),
(58, 0, 4, 99988878),
(59, 0, 1, 5556678),
(60, 0, 2, 5556678),
(61, 0, 3, 5556678),
(62, 0, 4, 5556678);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestre`
--

CREATE TABLE IF NOT EXISTS `semestre` (
`idSemestre` int(11) NOT NULL,
  `numeroSemestre` int(11) DEFAULT NULL,
  `anio_idAnio` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `semestre`
--

INSERT INTO `semestre` (`idSemestre`, `numeroSemestre`, `anio_idAnio`) VALUES
(1, 1, 2017),
(2, 2, 2017),
(3, 1, 2018),
(4, 2, 2018);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`idUsuario` int(11) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `usuario`, `clave`, `rol`) VALUES
(1, 'jeison', 'jeison', 1),
(2, 'lucia', '36113277', 2),
(3, 'belen', 'belen', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
 ADD PRIMARY KEY (`idAlumno`,`grado_idGrado`,`matricula_idMatricula`), ADD UNIQUE KEY `idAlumno_UNIQUE` (`idAlumno`), ADD KEY `fk_alumno_estado1_idx` (`estado_idEstado`), ADD KEY `fk_alumno_grado1_idx` (`grado_idGrado`), ADD KEY `fk_alumno_matricula1_idx` (`matricula_idMatricula`);

--
-- Indices de la tabla `anio`
--
ALTER TABLE `anio`
 ADD PRIMARY KEY (`idAnio`), ADD UNIQUE KEY `idAnio_UNIQUE` (`idAnio`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
 ADD PRIMARY KEY (`idCita`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
 ADD PRIMARY KEY (`idEstado`), ADD UNIQUE KEY `idEstado_UNIQUE` (`idEstado`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
 ADD PRIMARY KEY (`idGrado`), ADD UNIQUE KEY `idGrado_UNIQUE` (`idGrado`);

--
-- Indices de la tabla `logros`
--
ALTER TABLE `logros`
 ADD PRIMARY KEY (`idLogro`,`materia_idMateria`,`periodo_idPeriodo`), ADD KEY `fk_logros_periodo1_idx` (`periodo_idPeriodo`), ADD KEY `fk_logros_materia1_idx` (`materia_idMateria`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
 ADD PRIMARY KEY (`idMateria`,`profesor_idPro`), ADD KEY `fk_materia_profesor1_idx` (`profesor_idPro`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
 ADD PRIMARY KEY (`idMatricula`,`anio_idAnio`), ADD UNIQUE KEY `idMatricula_UNIQUE` (`idMatricula`), ADD KEY `fk_matricula_anio1_idx` (`anio_idAnio`);

--
-- Indices de la tabla `notap`
--
ALTER TABLE `notap`
 ADD PRIMARY KEY (`idNotaP`,`alumno_idAlumno`,`materia_idMateria`,`semestre_idSemestre`,`grado_idGrado`,`periodo_idPeriodo`,`anio_idAnio`), ADD UNIQUE KEY `idNotaP_UNIQUE` (`idNotaP`), ADD KEY `fk_notaP_anio1_idx` (`anio_idAnio`), ADD KEY `fk_notaP_alumno1_idx` (`alumno_idAlumno`), ADD KEY `fk_notaP_materia1_idx` (`materia_idMateria`), ADD KEY `fk_notaP_semestre1_idx` (`semestre_idSemestre`), ADD KEY `fk_notaP_grado1_idx` (`grado_idGrado`), ADD KEY `fk_notaP_periodo1_idx` (`periodo_idPeriodo`);

--
-- Indices de la tabla `periodo`
--
ALTER TABLE `periodo`
 ADD PRIMARY KEY (`idPeriodo`), ADD UNIQUE KEY `idPeriodo_UNIQUE` (`idPeriodo`), ADD KEY `fk_periodo_anio1_idx` (`anio_idAnio`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
 ADD PRIMARY KEY (`idPro`), ADD UNIQUE KEY `idPro_UNIQUE` (`idPro`);

--
-- Indices de la tabla `promedio`
--
ALTER TABLE `promedio`
 ADD PRIMARY KEY (`idPromedio`), ADD UNIQUE KEY `idPromedio` (`idPromedio`);

--
-- Indices de la tabla `semestre`
--
ALTER TABLE `semestre`
 ADD PRIMARY KEY (`idSemestre`,`anio_idAnio`), ADD UNIQUE KEY `idSemestre_UNIQUE` (`idSemestre`), ADD KEY `fk_semestre_anio1_idx` (`anio_idAnio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`idUsuario`), ADD UNIQUE KEY `idUsuario_UNIQUE` (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anio`
--
ALTER TABLE `anio`
MODIFY `idAnio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2020;
--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
MODIFY `idCita` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
MODIFY `idGrado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `logros`
--
ALTER TABLE `logros`
MODIFY `idLogro` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=553;
--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
MODIFY `idMateria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=139;
--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
MODIFY `idMatricula` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `notap`
--
ALTER TABLE `notap`
MODIFY `idNotaP` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10793;
--
-- AUTO_INCREMENT de la tabla `periodo`
--
ALTER TABLE `periodo`
MODIFY `idPeriodo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
MODIFY `idPro` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `promedio`
--
ALTER TABLE `promedio`
MODIFY `idPromedio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT de la tabla `semestre`
--
ALTER TABLE `semestre`
MODIFY `idSemestre` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
ADD CONSTRAINT `fk_alumno_estado1` FOREIGN KEY (`estado_idEstado`) REFERENCES `estado` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_alumno_grado1` FOREIGN KEY (`grado_idGrado`) REFERENCES `grado` (`idGrado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_alumno_matricula1` FOREIGN KEY (`matricula_idMatricula`) REFERENCES `matricula` (`idMatricula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `logros`
--
ALTER TABLE `logros`
ADD CONSTRAINT `fk_logros_materia1` FOREIGN KEY (`materia_idMateria`) REFERENCES `materia` (`idMateria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_logros_periodo1` FOREIGN KEY (`periodo_idPeriodo`) REFERENCES `periodo` (`idPeriodo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
ADD CONSTRAINT `fk_materia_profesor1` FOREIGN KEY (`profesor_idPro`) REFERENCES `profesor` (`idPro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
ADD CONSTRAINT `fk_matricula_anio1` FOREIGN KEY (`anio_idAnio`) REFERENCES `anio` (`idAnio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `notap`
--
ALTER TABLE `notap`
ADD CONSTRAINT `fk_notaP_alumno1` FOREIGN KEY (`alumno_idAlumno`) REFERENCES `alumno` (`idAlumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_notaP_anio1` FOREIGN KEY (`anio_idAnio`) REFERENCES `anio` (`idAnio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_notaP_grado1` FOREIGN KEY (`grado_idGrado`) REFERENCES `grado` (`idGrado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_notaP_materia1` FOREIGN KEY (`materia_idMateria`) REFERENCES `materia` (`idMateria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_notaP_periodo1` FOREIGN KEY (`periodo_idPeriodo`) REFERENCES `periodo` (`idPeriodo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_notaP_semestre1` FOREIGN KEY (`semestre_idSemestre`) REFERENCES `semestre` (`idSemestre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `periodo`
--
ALTER TABLE `periodo`
ADD CONSTRAINT `fk_periodo_anio1` FOREIGN KEY (`anio_idAnio`) REFERENCES `anio` (`idAnio`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `semestre`
--
ALTER TABLE `semestre`
ADD CONSTRAINT `fk_semestre_anio1` FOREIGN KEY (`anio_idAnio`) REFERENCES `anio` (`idAnio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
