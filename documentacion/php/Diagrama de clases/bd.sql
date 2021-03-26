SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `asegurados`;
DROP TABLE IF EXISTS `pagos`;
DROP TABLE IF EXISTS `clinicas`;
DROP TABLE IF EXISTS `laboratorios`;
DROP TABLE IF EXISTS `farmacias`;
DROP TABLE IF EXISTS `doctores`;
DROP TABLE IF EXISTS `servicios`;
DROP TABLE IF EXISTS `planes`;
DROP TABLE IF EXISTS `dependientes`;
DROP TABLE IF EXISTS `usuarios`;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE `asegurados` (
    `id` INTEGER(11) NOT NULL,
    `plan_id` INTEGER(11) NOT NULL,
    `nombre` VARCHAR(50) NOT NULL,
    `apellidos` VARCHAR(80) NOT NULL,
    `dirección` VARCHAR(100) NOT NULL,
    `telefono` VARCHAR(15) NOT NULL,
    `foto_certificado_nacimiento` VARCHAR(150) NOT NULL,
    `foto_carnet_identidad` VARCHAR(150) NOT NULL,
    `create_at` DATE NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE (`foto_certificado_nacimiento`, `foto_carnet_identidad`)
);

CREATE TABLE `pagos` (
    `id` INTEGER(11) NOT NULL,
    `asegurado_id` INTEGER(11) NOT NULL,
    `clave_factura` VARCHAR(200) NOT NULL,
    `fecha_pago` DATE NOT NULL,
    `mes_pago` DATE NOT NULL,
    `cantidad_pagada` DOUBLE NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE (`clave_factura`)
);

CREATE TABLE `clinicas` (
    `id` INTEGER(11) NOT NULL,
    `nombre` VARCHAR(100) NOT NULL,
    `folio` VARCHAR(40) NOT NULL,
    `direccion` VARCHAR(100) NOT NULL,
    `usuario` VARCHAR(50) NOT NULL,
    `password` VARCHAR(70) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE (`usuario`)
);

CREATE TABLE `laboratorios` (
    `id` INTEGER(11) NOT NULL,
    `clinica_id` INTEGER(11),
    `nombre` VARCHAR(50) NOT NULL,
    `dirección` VARCHAR(100) NOT NULL,
    `especialidad` VARCHAR(100) NOT NULL,
    `usuario` VARCHAR(50) NOT NULL,
    `password` VARCHAR(70) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE (`usuario`)
);

CREATE TABLE `farmacias` (
    `id` INTEGER(11) NOT NULL,
    `clinica_id` INTEGER(11),
    `nombre` VARCHAR(150) NOT NULL,
    `direccion` VARCHAR(100) NOT NULL,
    `usuario` VARCHAR(50) NOT NULL,
    `password` VARCHAR(70) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE (`usuario`)
);

CREATE TABLE `doctores` (
    `id` INTEGER(11) NOT NULL,
    `clinica_id` INTEGER(11),
    `folio` VARCHAR(40) NOT NULL,
    `nombre` VARCHAR(50) NOT NULL,
    `apellidos` VARCHAR(80) NOT NULL,
    `especialidad` VARCHAR(100) NOT NULL,
    `usuario` VARCHAR(50) NOT NULL,
    `password` VARCHAR(70) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE (`usuario`)
);

CREATE TABLE `servicios` (
    `id` INTEGER(11) NOT NULL,
    `asegurado_id` INTEGER(11) NOT NULL,
    `clinica_id` INTEGER(11),
    `doctor_id` INTEGER(11),
    `laboratorio_id` INTEGER(11),
    `farmacia_id` INTEGER(11),
    `nombre_servicio` VARCHAR(45) NOT NULL,
    `costo` DOUBLE NOT NULL,
    `fecha_servicio` DATE NOT NULL,
    `cantidad_pagada_aseguradora` DOUBLE NOT NULL,
    `activo` BOOLEAN NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `planes` (
    `id` INTEGER(11) NOT NULL,
    `nombre` VARCHAR(20) NOT NULL,
    `precio` DOUBLE NOT NULL,
    `precio_dependiente` DOUBLE NOT NULL,
    `descripcion` VARCHAR(200) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `dependientes` (
    `id` INTEGER(11) NOT NULL,
    `asegurado_id` INTEGER(11) NOT NULL,
    `nombre` VARCHAR(50) NOT NULL,
    `apellidos` VARCHAR(80) NOT NULL,
    `direccion` VARCHAR(100) NOT NULL,
    `telefono` VARCHAR(15) NOT NULL,
    `foto_certificado_nacimiento` VARCHAR(150) NOT NULL,
    `foto_carnet_identidad` VARCHAR(150) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE (`foto_certificado_nacimiento`)
);

CREATE TABLE `usuarios` (
    `id` INTEGER(11) NOT NULL,
    `nombre` VARCHAR(50) NOT NULL,
    `apellidos` VARCHAR(80) NOT NULL,
    `cargo` VARCHAR(45) NOT NULL,
    `usuario` VARCHAR(50) NOT NULL,
    `password` VARCHAR(70) NOT NULL,
    `rol` VARCHAR(20) NOT NULL,
    `url_imagen` VARCHAR(150),
    PRIMARY KEY (`id`),
    UNIQUE (`url_imagen`)
);

ALTER TABLE `asegurados` ADD FOREIGN KEY (`plan_id`) REFERENCES `planes`(`id`);
ALTER TABLE `pagos` ADD FOREIGN KEY (`asegurado_id`) REFERENCES `asegurados`(`id`);
ALTER TABLE `laboratorios` ADD FOREIGN KEY (`clinica_id`) REFERENCES `clinicas`(`id`);
ALTER TABLE `farmacias` ADD FOREIGN KEY (`clinica_id`) REFERENCES `clinicas`(`id`);
ALTER TABLE `doctores` ADD FOREIGN KEY (`clinica_id`) REFERENCES `clinicas`(`id`);
ALTER TABLE `servicios` ADD FOREIGN KEY (`clinica_id`) REFERENCES `clinicas`(`id`);
ALTER TABLE `servicios` ADD FOREIGN KEY (`laboratorio_id`) REFERENCES `laboratorios`(`id`);
ALTER TABLE `servicios` ADD FOREIGN KEY (`farmacia_id`) REFERENCES `farmacias`(`id`);
ALTER TABLE `servicios` ADD FOREIGN KEY (`doctor_id`) REFERENCES `doctores`(`id`);
ALTER TABLE `servicios` ADD FOREIGN KEY (`asegurado_id`) REFERENCES `asegurados`(`id`);
ALTER TABLE `dependientes` ADD FOREIGN KEY (`asegurado_id`) REFERENCES `asegurados`(`id`);