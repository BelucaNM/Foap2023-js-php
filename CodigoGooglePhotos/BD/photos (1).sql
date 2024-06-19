-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-06-2024 a las 13:53:45
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
-- Base de datos: `foap2023photos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `idPropietario` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `url` varchar(300) NOT NULL,
  `fechaRegistroBD` datetime NOT NULL,
  `fechaFotografia` datetime NOT NULL,
  `ubicacion` point NOT NULL,
  `album` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `photos`
--

INSERT INTO `photos` (`id`, `idPropietario`, `nombre`, `url`, `fechaRegistroBD`, `fechaFotografia`, `ubicacion`, `album`) VALUES
(1, 6, 'foto1', './imgApp/bob-brewer-dbK1lncRcWk-unsplash.jpg', '2024-06-17 00:00:00', '0000-00-00 00:00:00', 0x00000000010100000088ba0f406a93fb3faa656b7d919c4440, 'Foap2023'),
(2, 6, 'foto5', './imgApp/maureen-eijpe-ymXfdg_37nA-unsplash.jpg', '2024-06-17 13:02:00', '0000-00-00 00:00:00', 0x00000000010100000001fa7dffe685fa3fffd59931bb9b4440, 'Foap2023'),
(3, 6, 'foto1', './imgApp/batuhan-dogan-dNMttFMU_hI-unsplash.jpg', '2024-06-17 13:12:00', '0000-00-00 00:00:00', 0x00000000010100000031d0b52fa0b7fb3f071dbe96a19c4440, 'Foap2023'),
(5, 6, 'PruebaUbicacion', './imgApp/IMG_20240618_125214108.jpg', '2024-06-18 13:48:00', '1970-01-01 01:00:00', 0x0000000001010000007b7293dc12c7fb3f4546b46c8f9c4440, 'Foap2023');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iPropietario` (`idPropietario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `rPropietario` FOREIGN KEY (`idPropietario`) REFERENCES `personas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
