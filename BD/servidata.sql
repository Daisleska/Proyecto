-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-07-2019 a las 16:02:55
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `servidata`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_deduccion`
--

CREATE TABLE `asignacion_deduccion` (
  `id_ad` int(90) NOT NULL,
  `descripcion_ad` varchar(90) NOT NULL,
  `tipo_ad` int(90) NOT NULL,
  `monto_ad` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignacion_deduccion`
--

INSERT INTO `asignacion_deduccion` (`id_ad`, `descripcion_ad`, `tipo_ad`, `monto_ad`) VALUES
(4, 'bono produccion por ', 0, '120999999');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `ci_e` int(90) NOT NULL,
  `nombres_e` varchar(90) NOT NULL,
  `apellidos_e` varchar(90) NOT NULL,
  `direccion_e` varchar(90) NOT NULL,
  `telefono_e` int(90) NOT NULL,
  `fecha_ingreso_e` date NOT NULL,
  `condicion_e` enum('Fijo','Contratado') NOT NULL,
  `fecha_venc_e` date NOT NULL,
  `cargo_e` varchar(90) NOT NULL,
  `salario_e` int(90) NOT NULL,
  `ncuenta_e` int(90) NOT NULL,
  `id_horario` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_pago`
--

CREATE TABLE `empleado_pago` (
  `ci_e` int(90) NOT NULL,
  `id_pago` int(90) NOT NULL,
  `horas_justificadas` varchar(90) NOT NULL,
  `horas_sobre_t` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_producto`
--

CREATE TABLE `empleado_producto` (
  `ci_e` int(90) NOT NULL,
  `cod_p` int(90) NOT NULL,
  `linea_produccion` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id_horario` int(90) NOT NULL,
  `horas_pa` varchar(90) NOT NULL,
  `horas_t` varchar(90) NOT NULL,
  `fecha` date NOT NULL,
  `dia` enum('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiaprima_producto`
--

CREATE TABLE `materiaprima_producto` (
  `cod_mp` int(90) NOT NULL,
  `cod_p` int(90) NOT NULL,
  `cantidad_u_mp` int(90) NOT NULL,
  `cantidad_exist_mp` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiaprima_proveedor`
--

CREATE TABLE `materiaprima_proveedor` (
  `cod_mp` int(90) NOT NULL,
  `ci_pro` int(90) NOT NULL,
  `cantidad_c_mp` int(90) NOT NULL,
  `cantidad_exist_mp` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_prima`
--

CREATE TABLE `materia_prima` (
  `cod_mp` int(90) NOT NULL,
  `nombre_mp` varchar(90) NOT NULL,
  `fecha_mp` date NOT NULL,
  `presentacion_mp` varchar(90) NOT NULL,
  `stock_min_mp` int(90) NOT NULL,
  `stock_max_mp` int(90) NOT NULL,
  `filial_mp` varchar(90) NOT NULL,
  `observacion_mp` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` int(90) NOT NULL,
  `sueldo_pago` varchar(90) NOT NULL,
  `monto_pago` varchar(90) NOT NULL,
  `fecha_pago` date NOT NULL,
  `periodo_pago` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_asignaciondeduccion`
--

CREATE TABLE `pago_asignaciondeduccion` (
  `id_pago` int(90) NOT NULL,
  `id_ad` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE `privilegios` (
  `id` int(11) NOT NULL,
  `modulo` varchar(90) NOT NULL,
  `privilegio` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `privilegios`
--

INSERT INTO `privilegios` (`id`, `modulo`, `privilegio`) VALUES
(1, 'proveedor', 'registrar'),
(2, 'proveedor', 'listado'),
(3, 'proveedor', 'modificar'),
(4, 'proveedor', 'eliminar'),
(5, 'materiaprima', 'registrar'),
(6, 'materiaprima', 'listado'),
(7, 'materiaprima', 'modificar'),
(8, 'materiaprima', 'eliminar'),
(9, 'inventario', 'registrar'),
(10, 'inventario', 'listado'),
(11, 'inventario', 'modificar'),
(12, 'inventario', 'eliminar'),
(13, 'empleado', 'registrar'),
(14, 'empleado', 'listado'),
(15, 'empleado', 'modificar'),
(16, 'empleado', 'eliminar'),
(17, 'asistencia', 'registrar'),
(18, 'asistencia', 'listado'),
(19, 'asistencia', 'modificar'),
(20, 'asistencia', 'eliminar'),
(21, 'asigdeducc', 'registrar'),
(22, 'asigdeducc', 'listado'),
(23, 'asigdeducc', 'modificar'),
(24, 'asigdeducc', 'eliminar'),
(25, 'nomina', 'registrar'),
(26, 'nomina', 'listado'),
(27, 'nomina', 'modificar'),
(28, 'nomina', 'eliminar'),
(32, 'mantenimiento', 'bitacora'),
(33, 'mantenimiento', 'respaldo'),
(34, 'mantenimiento', 'recuperacion'),
(35, 'mantenimiento', 'listado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `cod_p` int(90) NOT NULL,
  `nombre_p` varchar(90) NOT NULL,
  `fecha_p` date NOT NULL,
  `presentacion_p` varchar(90) NOT NULL,
  `stock_min_p` int(90) NOT NULL,
  `stock_max_p` int(90) NOT NULL,
  `observacion_p` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_proveedor`
--

CREATE TABLE `producto_proveedor` (
  `cod_p` int(90) NOT NULL,
  `ci_pro` int(90) NOT NULL,
  `cantidad_d_p` int(90) NOT NULL,
  `cantidad_exist_p` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `ci_pro` int(90) NOT NULL,
  `nombre_pro` varchar(90) NOT NULL,
  `email_pro` varchar(90) NOT NULL,
  `direccion_pro` varchar(90) NOT NULL,
  `telefono_pro` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`ci_pro`, `nombre_pro`, `email_pro`, `direccion_pro`, `telefono_pro`) VALUES
(1234, 'inica', 'inica@gmail.com', 'direccion_pro', 2147483647),
(1234567, 'inicaa', 'inica@gmail.co', 'direccion_pro', 2147483647);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(90) NOT NULL,
  `correo` varchar(90) NOT NULL,
  `clave` varchar(90) NOT NULL,
  `tipo_usuario` enum('Admin','Usuario 1','Usuario 2') NOT NULL,
  `pregunta` text NOT NULL,
  `respuesta` text NOT NULL,
  `borrado` enum('S','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `clave`, `tipo_usuario`, `pregunta`, `respuesta`, `borrado`) VALUES
(1, 'dailes', 'dvilera610@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Usuario 1', 'color', 'azul', 'S'),
(2, 'hector hernandez', 'hectorher149@gmail.com', '53c6dd220f272d3e88bb3b404d32ff65af6f749ee94c90405fd7a15819bbcf40', '', 'nombre de mascota', 'body', 'N'),
(3, 'alejandro', 'darvisalfonso@gmail.com', '67d9f1c944a4ee6ef3634298c97639c81927a228d6aa490b343abf594e45aecf', 'Usuario 1', 'nombre de mascota', 'pelusa', 'N');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_has_privilegios`
--

CREATE TABLE `usuarios_has_privilegios` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_privilegio` int(11) NOT NULL,
  `status` enum('Si','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios_has_privilegios`
--

INSERT INTO `usuarios_has_privilegios` (`id`, `id_usuario`, `id_privilegio`, `status`) VALUES
(1, 1, 1, 'No'),
(2, 1, 2, 'No'),
(3, 1, 3, 'No'),
(4, 1, 4, 'No'),
(5, 1, 5, 'No'),
(6, 1, 6, 'No'),
(7, 1, 7, 'No'),
(8, 1, 8, 'No'),
(9, 1, 9, 'No'),
(10, 1, 10, 'No'),
(11, 1, 11, 'No'),
(12, 1, 12, 'No'),
(13, 1, 13, 'No'),
(14, 1, 14, 'No'),
(15, 1, 15, 'No'),
(16, 1, 16, 'No'),
(17, 1, 17, 'No'),
(18, 1, 18, 'No'),
(19, 2, 1, 'No'),
(20, 2, 2, 'No'),
(21, 2, 3, 'No'),
(22, 2, 4, 'No'),
(23, 2, 5, 'No'),
(24, 2, 6, 'No'),
(25, 2, 7, 'No'),
(26, 2, 8, 'No'),
(27, 2, 9, 'No'),
(28, 2, 10, 'No'),
(29, 2, 11, 'No'),
(30, 2, 12, 'No'),
(31, 2, 13, 'No'),
(32, 2, 14, 'No'),
(33, 2, 15, 'No'),
(34, 2, 16, 'No'),
(35, 2, 17, 'No'),
(36, 2, 18, 'No'),
(37, 3, 1, 'No'),
(38, 3, 2, 'No'),
(39, 3, 3, 'No'),
(40, 3, 4, 'No'),
(41, 3, 5, 'No'),
(42, 3, 6, 'No'),
(43, 3, 7, 'No'),
(44, 3, 8, 'No'),
(45, 3, 9, 'No'),
(46, 3, 10, 'No'),
(47, 3, 11, 'No'),
(48, 3, 12, 'No'),
(49, 3, 13, 'No'),
(50, 3, 14, 'No'),
(51, 3, 15, 'No'),
(52, 3, 16, 'No'),
(53, 3, 17, 'No'),
(54, 3, 18, 'No');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignacion_deduccion`
--
ALTER TABLE `asignacion_deduccion`
  ADD PRIMARY KEY (`id_ad`),
  ADD KEY `id_tipo` (`tipo_ad`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`ci_e`),
  ADD KEY `id_horario` (`id_horario`);

--
-- Indices de la tabla `empleado_pago`
--
ALTER TABLE `empleado_pago`
  ADD KEY `ci_e` (`ci_e`),
  ADD KEY `id_pago` (`id_pago`);

--
-- Indices de la tabla `empleado_producto`
--
ALTER TABLE `empleado_producto`
  ADD KEY `ci_e` (`ci_e`),
  ADD KEY `cod_p` (`cod_p`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indices de la tabla `materiaprima_producto`
--
ALTER TABLE `materiaprima_producto`
  ADD KEY `cod_mp` (`cod_mp`),
  ADD KEY `cod_p` (`cod_p`);

--
-- Indices de la tabla `materiaprima_proveedor`
--
ALTER TABLE `materiaprima_proveedor`
  ADD KEY `cod_mp` (`cod_mp`),
  ADD KEY `ci_pro` (`ci_pro`);

--
-- Indices de la tabla `materia_prima`
--
ALTER TABLE `materia_prima`
  ADD PRIMARY KEY (`cod_mp`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id_pago`);

--
-- Indices de la tabla `pago_asignaciondeduccion`
--
ALTER TABLE `pago_asignaciondeduccion`
  ADD KEY `id_pago` (`id_pago`),
  ADD KEY `id_ad` (`id_ad`);

--
-- Indices de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`cod_p`);

--
-- Indices de la tabla `producto_proveedor`
--
ALTER TABLE `producto_proveedor`
  ADD KEY `cod_p` (`cod_p`),
  ADD KEY `ci_pro` (`ci_pro`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`ci_pro`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_has_privilegios`
--
ALTER TABLE `usuarios_has_privilegios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_privilegio` (`id_privilegio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignacion_deduccion`
--
ALTER TABLE `asignacion_deduccion`
  MODIFY `id_ad` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `ci_e` int(90) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id_horario` int(90) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materia_prima`
--
ALTER TABLE `materia_prima`
  MODIFY `cod_mp` int(90) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id_pago` int(90) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `cod_p` int(90) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `ci_pro` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1234568;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios_has_privilegios`
--
ALTER TABLE `usuarios_has_privilegios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`id_horario`) REFERENCES `horario` (`id_horario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado_pago`
--
ALTER TABLE `empleado_pago`
  ADD CONSTRAINT `empleado_pago_ibfk_1` FOREIGN KEY (`ci_e`) REFERENCES `empleado` (`ci_e`) ON UPDATE CASCADE,
  ADD CONSTRAINT `empleado_pago_ibfk_2` FOREIGN KEY (`id_pago`) REFERENCES `pago` (`id_pago`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado_producto`
--
ALTER TABLE `empleado_producto`
  ADD CONSTRAINT `empleado_producto_ibfk_1` FOREIGN KEY (`ci_e`) REFERENCES `empleado` (`ci_e`) ON UPDATE CASCADE,
  ADD CONSTRAINT `empleado_producto_ibfk_2` FOREIGN KEY (`cod_p`) REFERENCES `producto` (`cod_p`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `materiaprima_producto`
--
ALTER TABLE `materiaprima_producto`
  ADD CONSTRAINT `materiaprima_producto_ibfk_1` FOREIGN KEY (`cod_mp`) REFERENCES `materia_prima` (`cod_mp`) ON UPDATE CASCADE,
  ADD CONSTRAINT `materiaprima_producto_ibfk_2` FOREIGN KEY (`cod_p`) REFERENCES `producto` (`cod_p`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `materiaprima_proveedor`
--
ALTER TABLE `materiaprima_proveedor`
  ADD CONSTRAINT `materiaprima_proveedor_ibfk_1` FOREIGN KEY (`cod_mp`) REFERENCES `materia_prima` (`cod_mp`) ON UPDATE CASCADE,
  ADD CONSTRAINT `materiaprima_proveedor_ibfk_2` FOREIGN KEY (`ci_pro`) REFERENCES `proveedor` (`ci_pro`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pago_asignaciondeduccion`
--
ALTER TABLE `pago_asignaciondeduccion`
  ADD CONSTRAINT `pago_asignaciondeduccion_ibfk_1` FOREIGN KEY (`id_pago`) REFERENCES `pago` (`id_pago`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pago_asignaciondeduccion_ibfk_2` FOREIGN KEY (`id_ad`) REFERENCES `asignacion_deduccion` (`id_ad`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto_proveedor`
--
ALTER TABLE `producto_proveedor`
  ADD CONSTRAINT `producto_proveedor_ibfk_1` FOREIGN KEY (`cod_p`) REFERENCES `producto` (`cod_p`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_proveedor_ibfk_2` FOREIGN KEY (`ci_pro`) REFERENCES `proveedor` (`ci_pro`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios_has_privilegios`
--
ALTER TABLE `usuarios_has_privilegios`
  ADD CONSTRAINT `usuarios_has_privilegios_ibfk_1` FOREIGN KEY (`id_privilegio`) REFERENCES `privilegios` (`id`),
  ADD CONSTRAINT `usuarios_has_privilegios_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
