-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2025 a las 00:15:45
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
-- Base de datos: `maquinas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinas_ascardio`
--

CREATE TABLE `maquinas_ascardio` (
  `ID` int(11) DEFAULT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `MODELO` varchar(100) DEFAULT NULL,
  `FECHA_ULTIMA` date DEFAULT NULL,
  `FECHA_PROXIMA` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `maquinas_ascardio`
--

INSERT INTO `maquinas_ascardio` (`ID`, `NOMBRE`, `MODELO`, `FECHA_ULTIMA`, `FECHA_PROXIMA`) VALUES
(33, 'chululu', 'Casique V 16.3', '2025-06-04', '2025-07-09'),
(16, 'Maquina de dialicis', 'V-8', '2025-04-09', '2025-07-23'),
(44, 'baipas', 'v-7', '2025-05-13', '2025-08-21'),
(87, 'baipas', 'lop', '2025-05-05', '2025-07-03');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
