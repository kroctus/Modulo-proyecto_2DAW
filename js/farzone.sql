-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-04-2020 a las 20:44:38
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `farzone`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `sexo` varchar(10) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fec_nacimiento` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `correo` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `ubicacion` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `imagen` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `password`, `nombre`, `apellido`, `sexo`, `fec_nacimiento`, `correo`, `ubicacion`, `imagen`) VALUES
(65, 'camila28', 'Fairy_tail21', 'AJO', 'SOLTENSIO', 'otro', '2020-04-15', '', '', ''),
(66, 'camila26', 'c1edaa417801b16c17e71f70bd10d8fa', 'dfssxdf', 'cxvxcvxcv', 'otro', '2020-04-29', '', '', ''),
(67, 'camila29', 'c1edaa417801b16c17e71f70bd10d8fa', 'Camila', 'santiago de payano', 'otro', '2000-12-01', '', '', ''),
(68, 'franloga', '93f06a5c49ddf03f8c89fa8111a01523', 'Francisco', 'mdklsjdjsodjo', 'hombre', '2020-04-14', '', '', ''),
(69, 'camila2999', 'c1edaa417801b16c17e71f70bd10d8fa', 'sadasd', 'asdasd', 'otro', '2020-03-31', 'nada', 'nada', 'no_imagen.png'),
(70, 'gabriel21', 'c1edaa417801b16c17e71f70bd10d8fa', 'Gabriel', 'Payano', 'otro', '2000-08-21', 'nada', 'nada', 'no_imagen.png'),
(71, 'sadasd', 'c1edaa417801b16c17e71f70bd10d8fa', 'sadasd', 'sadsad', 'mujer', '2020-04-24', 'nada', 'nada', 'no_imagen.png'),
(72, 'gabriel23', 'Fairy_tail21', 'pedro', 'Payano', 'hombre', '2020-04-16', 'nada', 'nada', 'no_imagen.png'),
(73, 'SpaceWalker', 'Fairy_tail21', 'alberto', 'Hernandez', 'otro', '2000-11-08', 'nada', 'nada', 'no_imagen.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
