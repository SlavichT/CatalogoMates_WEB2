-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-09-2024 a las 01:28:19
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
-- Base de datos: `catalogomates`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `material_fabricacion` varchar(50) NOT NULL,
  `descripcion` varchar(510) NOT NULL,
  `requiere_curado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `material_fabricacion`, `descripcion`, `requiere_curado`) VALUES
(1, 'Calabaza', 'Es el tipo de mate más tradicional, hecho a partir del fruto seco de la calabaza. Su interior se cura para absorber los sabores de la yerba y potenciar la experiencia del mate. Tiene un diseño rústico y natural, siendo valorado por los puristas del mate.', 1),
(2, 'Madera', 'Hecho de maderas como algarrobo o palo santo, este tipo de mate tiene un aroma particular que se mezcla con el sabor de la yerba. Debe ser curado antes de su uso, y con el tiempo, adquiere una pátina que intensifica su carácter único.', 1),
(3, 'Vidrio', 'Este mate tiene un cuerpo de vidrio, generalmente cubierto por una funda de cuero. El vidrio no altera el sabor de la yerba, por lo que es ideal para quienes prefieren un sabor puro y fresco. Además, es fácil de limpiar y no necesita ser curado.', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_mate` int(11) NOT NULL,
  `forma_mate` varchar(50) NOT NULL,
  `imagen` varchar(510) NOT NULL,
  `recubrimiento_mate` varchar(50) NOT NULL,
  `id_categoria_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_mate`, `forma_mate`, `imagen`, `recubrimiento_mate`, `id_categoria_fk`) VALUES
(1, 'Imperial', 'https://acdn.mitiendanube.com/stores/001/143/953/products/img_9368-4370cd752e2375a44516987629639789-1024-1024.jpeg', 'Cuero natural', 1),
(2, 'Camionero', 'https://acdn.mitiendanube.com/stores/001/143/953/products/img_9408_jpg-13761fffbc16ea759f16987625852661-1024-1024.jpeg', 'Cuero natural', 2),
(3, 'Torpedo', 'https://d22fxaf9t8d39k.cloudfront.net/72983f3d39e53faf34a2726246593c56ed407d98fa97e9e668df616e424438e143999.png', 'Cuero sintetico', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_mate`),
  ADD KEY `id_categoria_fk` (`id_categoria_fk`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_mate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `id_categoria_fk` FOREIGN KEY (`id_categoria_fk`) REFERENCES `categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
