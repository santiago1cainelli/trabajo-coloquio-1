-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2024 a las 19:14:45
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
-- Base de datos: `gestionarticulos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `cuit` varchar(13) DEFAULT NULL,
  `iva` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `direccion`, `cuit`, `iva`, `email`, `telefono`, `usuario`, `password`, `imagen`) VALUES
(1, 'Leo', 'Paredes', 'ROSARIO 1030', '20-17701820-5', 'Monotributo', 'leoparedes@gmail.com', '3476 625876', 'el_leo', '123456', 'leo.jpg'),
(2, 'Julián', 'Ramírez', 'Entre ríos 1580', '20-15801850-5', 'Resp. Inscripto', 'julianramirez@gmail.com', '3414254521', 'julianramirez', 'abc', 'julian.jpg'),
(3, 'Administrador', NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(15) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` longtext DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `stock` double DEFAULT NULL,
  `stockreservado` double DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `nombre`, `descripcion`, `precio`, `stock`, `stockreservado`, `imagen`) VALUES
(1, '100', 'Vasos de vidrio', 'Un juego de 6 vasos de vidrio', 10, 100, 10, 'vasos-de-vidrio.jpg'),
(2, '110', 'Platos', 'Un juego de 12 platos a buen precio', 400, 300, 0, 'platos.jpg'),
(5, '120', 'Cubiertos de madera', 'Un conjunto de cubiertos de madera de alta calidad', 550, 300, 54, 'cubiertos.jpg'),
(6, '130', 'Maceta pintada', 'Una maceta pintada artesanalmente', 1500, 20, 3, 'maceta-pintada.jpg'),
(7, '140', 'Termo', 'Termo para guardar el agua para los mates', 700, 50, 0, 'termo.jpg'),
(8, '150', 'Olla', 'Olla de acero inoxidable', 2000, 60, 30, 'olla.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
