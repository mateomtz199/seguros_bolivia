-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-04-2021 a las 01:47:20
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
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `foto_certificado_nacimiento` varchar(150) NOT NULL,
  `foto_carnet_identidad` varchar(150) NOT NULL,
  `create_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asegurados`
--

INSERT INTO `asegurados` (`id`, `plan_id`, `nombre`, `apellidos`, `direccion`, `telefono`, `foto_certificado_nacimiento`, `foto_carnet_identidad`, `create_at`) VALUES
(1, 1, 'Olga', 'Brooks', '9597 Cum Calle', '0447648', '2d00ebdb21cd67b01daa9a6ce7fe6b55.jpg', 'cbce5a3240cdb99159c5a67427511c69.jpg', '2021-04-02'),
(2, 2, 'Hermione', 'Stanton', 'Apdo.:862-1264 Nunc Carretera', '0532355', '9d3d1fb9d9e6f7ab1ee1bb50bb6c248a.jpg', '3f57ea34b347dfd5ef34347e4ca5eb74.jpg', '2021-04-02'),
(3, 3, 'Ryan', 'Cannon', '575 Mauris C/', '3563592', '4beb67cf9abc01cd9cdbf7fbb9e2ea8d.jpg', '7128449b330d48e3e949c760055aa652.jpg', '2021-04-02'),
(4, 2, 'Quentin', 'Gordon', '538-6374 Commodo C.', '2119401', 'c4a6c86204b42bfe59f8f1fb3c54ab73.jpg', 'f6b2344723c3ccfff3b9229a7f4c7a91.jpg', '2021-04-02'),
(5, 2, 'Yoko', 'Juarez', '233-8771 Lacus. C.', '5277521', '6f3083808ac89a0232548a90b4ef9664.jpg', '5b4bff7597043bf7b618152ef06befbd.jpg', '2021-04-02'),
(6, 2, 'Brock', 'Maxwell', 'Apdo.:592-6488 Est, Avenida', '2753720', '9f6c6e9bf8758b24d687c2135c02274e.jpg', '4d3b1a110167cfb8e9704a03b99c5634.jpg', '2021-04-02'),
(7, 3, 'Roanna', 'Briggs', 'Apdo.:792-7017 Auctor C/', '6945582', 'ec8bd3442c4b4576cb6e8ac02462f6d9.jpg', 'a956dd6666d921898b0caf2e6eb3c291.jpg', '2021-04-02'),
(8, 1, 'Rylee', 'Carter', 'Apartado núm.: 327, 8935 Sit Calle', '9726382', 'e91b8ff5c68d64f9524bc567821599d3.jpg', '3c2cd4589466e818fbd4c775f396f26a.jpg', '2021-04-02'),
(9, 3, 'Joseph', 'Townsend', 'Apartado núm.: 112, 7619 Sagittis Calle', '8489766', '7ef6b3fb542ffbe38abd6b00018c90d0.jpg', 'c8ee6dc1cfdf627265871a20291c0ee9.jpg', '2021-04-02');

--
-- Disparadores `asegurados`
--
DELIMITER $$
CREATE TRIGGER `seguimiento_update_asegurado` AFTER UPDATE ON `asegurados` FOR EACH ROW INSERT INTO seguimiento_asegurado_plan (asegurado_id, plan_anterior, plan_actual, accion) VALUES(NEW.id, OLD.plan_id, NEW.plan_id, "update")
$$
DELIMITER ;

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

--
-- Volcado de datos para la tabla `dependientes`
--

INSERT INTO `dependientes` (`id`, `asegurado_id`, `nombre`, `apellidos`, `direccion`, `telefono`, `foto_certificado_nacimiento`, `foto_carnet_identidad`) VALUES
(1, 1, 'Aphrodite', 'Ware', 'Apdo.:404-9573 Magna. C/', '1446370', '22081ccee7b5131eb311930d1ee21d94.jpg', '47edb0b9cd70407185995f128927b765.jpg'),
(2, 2, 'Calista', 'Schwartz', 'Apdo.:144-3631 Diam. Calle', '2693310', '9eb8fc9aa2dcd12c51d0a64664287061.jpg', 'fec47a968bfce891e1ea243c835f0b63.jpg'),
(4, 2, 'Joseph', 'Townsend', 'Apartado núm.: 112, 7619 Sagittis Calle', '8489766', '9ab4350bf1c21b5846cf8283eb3283a7.jpg', '53b847a9296633832231e0844fffd784.jpg'),
(5, 2, 'Hanna', 'Green', 'Apartado núm.: 201, 4990 Urna. Carretera', '2861899', '9ae68f72f0786fc4e9c6868f4cc6e86b.jpg', '03e56f5ac66d252122e03f18d8293a34.jpg'),
(6, 5, 'Thane', 'Wiley', '891 Molestie Calle', '9457413', '54edebee8a40a5d7a563836d85defd35.jpg', '9a211480ba5a7dbd45660f0ebe4f9bed.jpg'),
(7, 5, 'Samantha', 'Tate', '589 Donec C/', '6868665', '43bcb5c7318bdcce6b0a8533f58135d8.jpg', 'a19b7478ff09631268b0f02a42a286cc.jpg');

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
  `fecha_pago` timestamp NOT NULL DEFAULT current_timestamp(),
  `mes_pago` date NOT NULL,
  `cantidad_pagada` double NOT NULL,
  `nmes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `asegurado_id`, `clave_factura`, `fecha_pago`, `mes_pago`, `cantidad_pagada`, `nmes`) VALUES
(1, 5, '114560c7a821bffbed57ba8abe953543[Asegurado: Yoko Juarez, Plan: Plan Medio, Costo x mes: 200, Dependientes: 2, Último mes: 2021-04-02, Fecha termino: 2021-05-02, meses pagados: 1]', '2021-04-02 18:41:37', '2021-05-02', 400, 1),
(2, 1, '5a5c642b9a83282e4c00d4d34e2feed0[Asegurado: Olga Brooks, Plan: Plan Básico, Costo x mes: 100, Dependientes: 1, Último mes: 2021-04-02, Fecha termino: 2021-06-02, meses pagados: 2]', '2021-04-02 18:49:06', '2021-06-02', 300, 2),
(3, 8, '', '2021-04-02 20:11:13', '2020-12-16', 200, 1),
(8, 7, 'hefd', '2021-04-02 20:12:46', '2020-12-31', 200, 1),
(9, 8, 'sdfsdfs', '2021-04-02 20:21:29', '2021-01-16', 200, 1),
(10, 8, 'zxzx', '2021-04-02 21:30:53', '2021-02-16', 200, 1);

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
-- Estructura de tabla para la tabla `seguimiento_asegurado_plan`
--

CREATE TABLE `seguimiento_asegurado_plan` (
  `id` int(11) NOT NULL,
  `asegurado_id` int(11) NOT NULL,
  `plan_anterior` int(11) NOT NULL,
  `plan_actual` int(11) NOT NULL,
  `accion` varchar(45) NOT NULL,
  `fecha_cambio` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `seguimiento_asegurado_plan`
--

INSERT INTO `seguimiento_asegurado_plan` (`id`, `asegurado_id`, `plan_anterior`, `plan_actual`, `accion`, `fecha_cambio`) VALUES
(1, 5, 3, 3, 'update', '2021-04-02 18:40:01'),
(2, 5, 3, 2, 'update', '2021-04-02 18:40:41');

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
  ADD KEY `dependientes_ibfk_1` (`asegurado_id`);

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
-- Indices de la tabla `seguimiento_asegurado_plan`
--
ALTER TABLE `seguimiento_asegurado_plan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seg_plan1` (`plan_actual`),
  ADD KEY `seg_pla2` (`plan_anterior`),
  ADD KEY `seg_aseg` (`asegurado_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `clinicas`
--
ALTER TABLE `clinicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dependientes`
--
ALTER TABLE `dependientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `seguimiento_asegurado_plan`
--
ALTER TABLE `seguimiento_asegurado_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `dependientes_ibfk_1` FOREIGN KEY (`asegurado_id`) REFERENCES `asegurados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `seguimiento_asegurado_plan`
--
ALTER TABLE `seguimiento_asegurado_plan`
  ADD CONSTRAINT `seg_aseg` FOREIGN KEY (`asegurado_id`) REFERENCES `asegurados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seg_pla2` FOREIGN KEY (`plan_anterior`) REFERENCES `planes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seg_plan1` FOREIGN KEY (`plan_actual`) REFERENCES `planes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
