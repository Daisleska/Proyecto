-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-09-2019 a las 15:00:20
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

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
  `id` int(90) NOT NULL,
  `descripcion` varchar(90) NOT NULL,
  `tipo` enum('Asignacion','Deduccion') NOT NULL,
  `monto` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignacion_deduccion`
--

INSERT INTO `asignacion_deduccion` (`id`, `descripcion`, `tipo`, `monto`) VALUES
(1, 'Seguro Social', 'Deduccion', '1000'),
(2, 'Bono de ProducciÃ³n', 'Asignacion', '1000'),
(3, 'Prima de ProducciÃ³n ', 'Asignacion', '1000'),
(4, 'Memoriales La Victoria C.A', 'Asignacion', '2000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `id` int(11) NOT NULL,
  `id_usuarios` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `actividad` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(90) NOT NULL,
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `nombre`, `id_departamento`) VALUES
(1, 'Secretaria', 1),
(2, 'Secretaria', 2),
(3, 'Asistente', 2),
(4, 'Obrero', 4),
(5, 'Jefe', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `nombre`) VALUES
(1, 'Recursos humanos'),
(2, 'Administrativo'),
(3, 'Informatica'),
(4, 'Almacen'),
(5, 'Administracion'),
(6, 'Produccion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `cedula` varchar(11) NOT NULL,
  `nombres` varchar(90) NOT NULL,
  `apellidos` varchar(90) NOT NULL,
  `direccion` varchar(90) NOT NULL,
  `telefono` varchar(90) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `condicion` enum('Fijo','Contratado') NOT NULL,
  `fecha_venc` date NOT NULL,
  `salario` varchar(90) NOT NULL,
  `ncuenta` varchar(90) NOT NULL,
  `id_cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `cedula`, `nombres`, `apellidos`, `direccion`, `telefono`, `fecha_ingreso`, `condicion`, `fecha_venc`, `salario`, `ncuenta`, `id_cargo`) VALUES
(1, '28147989', 'Hector Argenis', 'Hernandez Ceballos', 'San Mateo', '3590130', '2019-08-03', 'Contratado', '2019-08-11', '93049788', '98467890', 1),
(2, '28496463', 'Daisleska Victoria', 'Vilera Vasquez', 'La Victoria', '8436551', '2019-08-12', 'Contratado', '2019-08-21', '40000', '874763', 2),
(3, '25873122', 'Juan Carlos', 'Figueredo EspaÃ±a', 'La Victoria', '3163502', '2019-08-13', 'Fijo', '2023-08-13', '250000', '0134567894657675', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados_has_dias_lab`
--

CREATE TABLE `empleados_has_dias_lab` (
  `id` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `dia` enum('Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados_has_dias_lab`
--

INSERT INTO `empleados_has_dias_lab` (`id`, `id_empleado`, `dia`) VALUES
(1, 1, 'Lunes'),
(2, 1, 'Martes'),
(3, 1, 'Miércoles'),
(4, 1, 'Jueves'),
(5, 1, 'Viernes'),
(6, 1, 'Sábado'),
(7, 1, 'Domingo'),
(8, 2, 'Lunes'),
(9, 2, 'Martes'),
(10, 2, 'Miércoles'),
(11, 2, 'Jueves');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_pago`
--

CREATE TABLE `empleado_pago` (
  `id_empleado` int(11) NOT NULL,
  `id_pago` int(11) NOT NULL,
  `horas_justificadas` varchar(90) NOT NULL,
  `horas_sobre_t` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_producto`
--

CREATE TABLE `empleado_producto` (
  `id_empleado` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `linea_produccion` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id` int(90) NOT NULL,
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
  `id_materiaprima` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad_u_mp` int(90) NOT NULL,
  `cantidad_exist_mp` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiaprima_proveedor`
--

CREATE TABLE `materiaprima_proveedor` (
  `id_materiaprima` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `cantidad_c_mp` int(90) NOT NULL,
  `cantidad_exist_mp` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_prima`
--

CREATE TABLE `materia_prima` (
  `id` int(11) NOT NULL,
  `codigo` varchar(11) NOT NULL,
  `nombre` varchar(90) NOT NULL,
  `fecha` date NOT NULL,
  `presentacion` varchar(90) NOT NULL,
  `stock_min` int(90) NOT NULL,
  `stock_max` int(90) NOT NULL,
  `filial` varchar(90) NOT NULL,
  `observacion` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id` int(11) NOT NULL,
  `sueldo` varchar(90) NOT NULL,
  `monto` varchar(90) NOT NULL,
  `fecha` date NOT NULL,
  `periodo` varchar(90) NOT NULL
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
  `id` int(11) NOT NULL,
  `codigo` varchar(11) NOT NULL,
  `nombre` varchar(90) NOT NULL,
  `fecha` date NOT NULL,
  `presentacion` varchar(90) NOT NULL,
  `stock_min` int(90) NOT NULL,
  `stock_max` int(90) NOT NULL,
  `observacion` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_proveedor`
--

CREATE TABLE `producto_proveedor` (
  `id_producto` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `cantidad_d_p` int(90) NOT NULL,
  `cantidad_exist_p` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `cedula` varchar(11) NOT NULL,
  `nombre` varchar(90) NOT NULL,
  `email` varchar(90) NOT NULL,
  `direccion` varchar(90) NOT NULL,
  `telefono` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `cedula`, `nombre`, `email`, `direccion`, `telefono`) VALUES
(1, 'J4536722', 'Inica Cagua C.A', 'inicacca@gmail.com', 'Cagua', 6548965);

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
(1, 'Dailes', 'dvilera610@gmail.com', '044598473886535a33126083e3d2e1170e4a67befe897a83ad95a33209a64b3a', 'Usuario 1', 'Mascota', 'Sandy', 'N'),
(2, 'Hector Hernandez', 'hectorher149@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Admin', 'nombre de mascota', 'body', 'N'),
(3, 'Alejandro', 'darvisalfonso@gmail.com', '67d9f1c944a4ee6ef3634298c97639c81927a228d6aa490b343abf594e45aecf', 'Usuario 1', 'nombre de mascota', 'pelusa', 'S');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo` (`tipo`);

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nombre` (`id_usuarios`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_departamentos` (`id_departamento`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- Indices de la tabla `empleados_has_dias_lab`
--
ALTER TABLE `empleados_has_dias_lab`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `empleado_pago`
--
ALTER TABLE `empleado_pago`
  ADD KEY `ci_e` (`id_empleado`),
  ADD KEY `id_pago` (`id_pago`);

--
-- Indices de la tabla `empleado_producto`
--
ALTER TABLE `empleado_producto`
  ADD KEY `ci_e` (`id_empleado`),
  ADD KEY `cod_p` (`id_producto`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materiaprima_producto`
--
ALTER TABLE `materiaprima_producto`
  ADD KEY `cod_mp` (`id_materiaprima`),
  ADD KEY `cod_p` (`id_producto`);

--
-- Indices de la tabla `materiaprima_proveedor`
--
ALTER TABLE `materiaprima_proveedor`
  ADD KEY `cod_mp` (`id_materiaprima`),
  ADD KEY `ci_pro` (`id_proveedor`);

--
-- Indices de la tabla `materia_prima`
--
ALTER TABLE `materia_prima`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto_proveedor`
--
ALTER TABLE `producto_proveedor`
  ADD KEY `cod_p` (`id_producto`),
  ADD KEY `ci_pro` (`id_proveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `empleados_has_dias_lab`
--
ALTER TABLE `empleados_has_dias_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int(90) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materia_prima`
--
ALTER TABLE `materia_prima`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Filtros para la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD CONSTRAINT `usuario_auditoria` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD CONSTRAINT `rest_dep` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `rest_cargo` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleados_has_dias_lab`
--
ALTER TABLE `empleados_has_dias_lab`
  ADD CONSTRAINT `rest_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado_pago`
--
ALTER TABLE `empleado_pago`
  ADD CONSTRAINT `empleado_pago_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleado_pago_ibfk_2` FOREIGN KEY (`id_pago`) REFERENCES `pago` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado_producto`
--
ALTER TABLE `empleado_producto`
  ADD CONSTRAINT `empleado_producto_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rest_emp` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `materiaprima_proveedor`
--
ALTER TABLE `materiaprima_proveedor`
  ADD CONSTRAINT `materiaprima_proveedor_ibfk_1` FOREIGN KEY (`id_materiaprima`) REFERENCES `materia_prima` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materiaprima_proveedor_ibfk_2` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `materia_prima`
--
ALTER TABLE `materia_prima`
  ADD CONSTRAINT `materia_prima_ibfk_1` FOREIGN KEY (`id`) REFERENCES `materiaprima_producto` (`id_materiaprima`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pago_asignaciondeduccion` (`id_pago`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pago_asignaciondeduccion`
--
ALTER TABLE `pago_asignaciondeduccion`
  ADD CONSTRAINT `pago_asignaciondeduccion_ibfk_1` FOREIGN KEY (`id_ad`) REFERENCES `asignacion_deduccion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id`) REFERENCES `materiaprima_producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto_proveedor`
--
ALTER TABLE `producto_proveedor`
  ADD CONSTRAINT `producto_proveedor_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios_has_privilegios`
--
ALTER TABLE `usuarios_has_privilegios`
  ADD CONSTRAINT `usuarios_has_privilegios_ibfk_1` FOREIGN KEY (`id_privilegio`) REFERENCES `privilegios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_has_privilegios_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
