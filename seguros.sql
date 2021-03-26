-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-03-2021 a las 20:25:06
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `seguros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asegurados`
--

CREATE TABLE `asegurados` (
  `id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `dirección` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `foto_certificado_nacimiento` varchar(150) NOT NULL,
  `foto_carnet_identidad` varchar(150) NOT NULL,
  `create_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asegurados`
--

INSERT INTO `asegurados` (`id`, `plan_id`, `nombre`, `apellidos`, `dirección`, `telefono`, `foto_certificado_nacimiento`, `foto_carnet_identidad`, `create_at`) VALUES
(11, 1, 'Pedro', 'Pérez', 'A', '16516', '080fb723d923036fa128ff5f31a0b2ec.jpg', 'd3b9b8b563c1c45bde6d5abf42a28234.jpg', '2021-03-26'),
(13, 3, 'Juan', 'Ulua', 'Centro', '366334', '4b71a116e8932d52408acd0eb5ce99f5.jpg', '6a5ffddd8dccec5297dbb927927e25db.jpg', '2021-03-26'),
(14, 2, 'Pedro', 'María', 'San José', '4154545245', '5a61194a545b760ada4ed2bba982aebf.jpg', 'a9d37f08c3e734f5eaedc1264c273e54.jpg', '2021-03-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clinicas`
--

CREATE TABLE `clinicas` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `folio` varchar(40) NOT NULL,
  `direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependientes`
--

CREATE TABLE `dependientes` (
  `id` int(11) NOT NULL,
  `asegurado_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `foto_certificado_nacimiento` varchar(150) NOT NULL,
  `foto_carnet_identidad` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE `doctores` (
  `id` int(11) NOT NULL,
  `clinica_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `folio` varchar(40) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `especialidad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `farmacias`
--

CREATE TABLE `farmacias` (
  `id` int(11) NOT NULL,
  `clinica_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorios`
--

CREATE TABLE `laboratorios` (
  `id` int(11) NOT NULL,
  `clinica_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `dirección` varchar(100) NOT NULL,
  `especialidad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `asegurado_id` int(11) NOT NULL,
  `clave_factura` varchar(200) NOT NULL,
  `fecha_pago` date NOT NULL,
  `mes_pago` date NOT NULL,
  `cantidad_pagada` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `precio` double NOT NULL,
  `precio_dependiente` double NOT NULL,
  `descripcion` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`id`, `nombre`, `precio`, `precio_dependiente`, `descripcion`) VALUES
(1, 'Plan Básico', 100, 50, 'consiste en que el asegurado puede hacerse atender con cualquiera de los doctores que forman parte del seguro o en cualquiera de las clínicas afiliadas. En este plan no incluye farmacia ni internación.'),
(2, 'Plan Medio', 200, 100, 'Consiste en que el asegurado puede hacerse atender con cualquiera de los doctores que forman parte del seguro o en cualquiera de las clínicas afiliadas. Además, el seguro cubrirá los gastos de farmacia y laboratorio que fueran resultado de la consulta. En este plan no se incluye gastos de internación.'),
(3, 'Plan Superior', 500, 200, 'Consiste en que el asegurado puede hacerse atender en con cualquiera de los doctores que forman parte del seguro o en cualquiera de las clínicas afiliadas. Además, el seguro cubrirá los gastos de farmacias, laboratorios e internación resultado de una consulta médica.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `asegurado_id` int(11) NOT NULL,
  `clinica_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `laboratorio_id` int(11) DEFAULT NULL,
  `farmacia_id` int(11) DEFAULT NULL,
  `nombre_servicio` varchar(45) NOT NULL,
  `costo` double NOT NULL,
  `fecha_servicio` date NOT NULL,
  `cantidad_pagada_aseguradora` double NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(70) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `url_imagen` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `cargo`, `usuario`, `password`, `rol`, `url_imagen`) VALUES
(1, 'Edgar', 'Pérez', 'Gerente', 'admin', '$2y$10$dT.43g8OqT3tT5tI1yiPme7ZooasGHv5RozEfa8VzuMJYk0Y/ZoS2', 'user', ''),
(2, 'Juan', 'Rios', 'Doctor', 'juan', '$2y$10$93q0ZKVKX0c1xo0v7NVUmeA6tahhYh5JafA2UfWf9VgIeKPkM54V6', 'user', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asegurados`
--
ALTER TABLE `asegurados`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `foto_certificado_nacimiento` (`foto_certificado_nacimiento`,`foto_carnet_identidad`),
  ADD KEY `plan_id` (`plan_id`);

--
-- Indices de la tabla `clinicas`
--
ALTER TABLE `clinicas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_u` (`usuario_id`);

--
-- Indices de la tabla `dependientes`
--
ALTER TABLE `dependientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `foto_certificado_nacimiento` (`foto_certificado_nacimiento`),
  ADD KEY `asegurado_id` (`asegurado_id`);

--
-- Indices de la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctores_ibfk_1` (`clinica_id`),
  ADD KEY `d_u` (`usuario_id`);

--
-- Indices de la tabla `farmacias`
--
ALTER TABLE `farmacias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `farmacias_ibfk_1` (`clinica_id`),
  ADD KEY `f_u` (`usuario_id`);

--
-- Indices de la tabla `laboratorios`
--
ALTER TABLE `laboratorios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laboratorios_ibfk_1` (`clinica_id`),
  ADD KEY `l_u` (`usuario_id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clave_factura` (`clave_factura`),
  ADD KEY `asegurado_id` (`asegurado_id`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clinica_id` (`clinica_id`),
  ADD KEY `laboratorio_id` (`laboratorio_id`),
  ADD KEY `farmacia_id` (`farmacia_id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `asegurado_id` (`asegurado_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asegurados`
--
ALTER TABLE `asegurados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `clinicas`
--
ALTER TABLE `clinicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dependientes`
--
ALTER TABLE `dependientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `farmacias`
--
ALTER TABLE `farmacias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `laboratorios`
--
ALTER TABLE `laboratorios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asegurados`
--
ALTER TABLE `asegurados`
  ADD CONSTRAINT `asegurados_ibfk_1` FOREIGN KEY (`plan_id`) REFERENCES `planes` (`id`);

--
-- Filtros para la tabla `clinicas`
--
ALTER TABLE `clinicas`
  ADD CONSTRAINT `c_u` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `dependientes`
--
ALTER TABLE `dependientes`
  ADD CONSTRAINT `dependientes_ibfk_1` FOREIGN KEY (`asegurado_id`) REFERENCES `asegurados` (`id`);

--
-- Filtros para la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD CONSTRAINT `d_u` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctores_ibfk_1` FOREIGN KEY (`clinica_id`) REFERENCES `clinicas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `farmacias`
--
ALTER TABLE `farmacias`
  ADD CONSTRAINT `f_u` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `farmacias_ibfk_1` FOREIGN KEY (`clinica_id`) REFERENCES `clinicas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `laboratorios`
--
ALTER TABLE `laboratorios`
  ADD CONSTRAINT `l_u` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `laboratorios_ibfk_1` FOREIGN KEY (`clinica_id`) REFERENCES `clinicas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`asegurado_id`) REFERENCES `asegurados` (`id`);

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`clinica_id`) REFERENCES `clinicas` (`id`),
  ADD CONSTRAINT `servicios_ibfk_2` FOREIGN KEY (`laboratorio_id`) REFERENCES `laboratorios` (`id`),
  ADD CONSTRAINT `servicios_ibfk_3` FOREIGN KEY (`farmacia_id`) REFERENCES `farmacias` (`id`),
  ADD CONSTRAINT `servicios_ibfk_4` FOREIGN KEY (`doctor_id`) REFERENCES `doctores` (`id`),
  ADD CONSTRAINT `servicios_ibfk_5` FOREIGN KEY (`asegurado_id`) REFERENCES `asegurados` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
