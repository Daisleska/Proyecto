-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-09-2019 a las 02:53:07
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
(4, '', 'Asignacion', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `id` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'fecha de asistencia'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`id`, `id_empleado`, `fecha_hora`) VALUES
(1, 28147989, '2019-09-03 18:57:19'),
(2, 4400947, '2019-09-04 19:45:51'),
(4, 28147989, '2019-09-05 18:49:14'),
(5, 28147989, '2019-09-06 18:15:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `actividad` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `status` enum('0','1') NOT NULL
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
(1, 'Jefe', 1),
(2, 'Asistente', 2),
(3, 'Secretaria', 3),
(4, 'Gerente', 4),
(5, 'Obrero', 5);

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
(1, 'Almacen'),
(2, 'Recursos Humanos'),
(3, 'Administración'),
(4, 'Informática'),
(5, 'Producción');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dia_lab`
--

CREATE TABLE `dia_lab` (
  `id` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dia_lab`
--

INSERT INTO `dia_lab` (`id`, `id_empleado`, `nombre`) VALUES
(1, 28147989, ' Lunes'),
(2, 28147989, ' Martes'),
(3, 28147989, ' Miercoles'),
(4, 28147989, ' Jueves'),
(5, 28147989, ' Viernes'),
(6, 4400947, ' Miercoles'),
(7, 4400947, ' Jueves'),
(8, 4400947, ' Viernes'),
(9, 4400947, ' Sabado');

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
  `telefono` int(90) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `condicion` enum('Fijo','Contratado') NOT NULL,
  `fecha_venc` date NOT NULL,
  `salario` int(90) NOT NULL,
  `ncuenta` int(90) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `cedula`, `nombres`, `apellidos`, `direccion`, `telefono`, `fecha_ingreso`, `condicion`, `fecha_venc`, `salario`, `ncuenta`, `id_cargo`, `id_departamento`) VALUES
(1, '28147989', 'hector Argenis', 'Hernandez Ceballos', 'cagua', 3590130, '2019-08-08', 'Fijo', '2019-08-31', 1234567, 2147483647, 1, 4),
(2, '4400947', 'nuevoo nuevbo', 'nuevbo', 'cagua', 65432367, '2019-09-05', 'Fijo', '2019-09-28', 5432123, 2147483647, 1, 2);

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
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `estado` enum('aceptado','rechazado') NOT NULL,
  `observaciones` varchar(500) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_entrega` date NOT NULL,
  `fecha_vencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id`, `id_producto`, `estado`, `observaciones`, `cantidad`, `fecha_entrega`, `fecha_vencimiento`) VALUES
(1, 1, 'aceptado', 'ninguna', 1000, '2019-09-06', '2019-09-30');

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
  `id_proveedor` int(11) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `nombre` varchar(90) NOT NULL,
  `fecha` date NOT NULL,
  `presentacion` varchar(90) NOT NULL,
  `stock_min` int(90) NOT NULL,
  `stock_max` int(90) NOT NULL,
  `observacion` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `id_proveedor`, `codigo`, `nombre`, `fecha`, `presentacion`, `stock_min`, `stock_max`, `observacion`) VALUES
(1, 2, 'servi-31', 'hierro', '2019-09-06', 'paletas', 10, 100, 'todo correcto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_proveedor`
--

CREATE TABLE `producto_proveedor` (
  `id` int(11) NOT NULL,
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
  `tipo_rif` varchar(2) NOT NULL,
  `rif` varchar(11) NOT NULL,
  `nombre` varchar(90) NOT NULL,
  `email` varchar(90) NOT NULL,
  `direccion` varchar(90) NOT NULL,
  `telefono` int(90) NOT NULL,
  `tipo_producto` varchar(50) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `tipo_rif`, `rif`, `nombre`, `email`, `direccion`, `telefono`, `tipo_producto`, `fecha_registro`) VALUES
(2, 'j', '9398383923', 'inica', 'inica@gmail.com', 'cagua', 1402232, 'materia', '2019-09-06');

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
(1, 'daileska vilera', 'dvilera610@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Usuario 1', 'color', 'azul', 'S'),
(2, 'hector hernandez', 'hectorher149@gmail.com', '9010e72389a80487d473017425c6ec7951068abed82a4df32459c91f0e45d2ea', 'Usuario 1', 'nombre de mascota', 'body', 'N'),
(3, 'alejandro', 'darvisalfonso@gmail.com', '67d9f1c944a4ee6ef3634298c97639c81927a228d6aa490b343abf594e45aecf', 'Usuario 1', 'nombre de mascota', 'pelusa', 'S'),
(4, 'Genessi', 'genessie@gmail.com', '8491502322172e09ec7222d33941d33afbfcc22ab0c4dd1033dd72232308675a', 'Admin', 'mes de nacimiento', 'noviembre', 'S'),
(5, 'carmen figueroa h', 'carmen123@gmail.com', '12e36c5523ceb66a61fb00c56d8258fd4ceaeeece6561b77d713a59b964f01cc', 'Admin', 'nieto mayor', 'hector', 'N'),
(6, 'ana ', 'ana149@gmail.com', '246b7556cc1e9da32673b5c1ca930f53b6cc1393681f2608bafc39308d66f876', 'Admin', 'color', 'rojo', 'N'),
(7, 'derek hernandez', 'derek149@gmail.com', '08bd27edcf2e98432d2e84b107f8b735d81d425de08a4063b57bbb7e0bb2cf84', 'Admin', 'color', 'verde', 'N'),
(8, 'ismael', 'ismael149@gmail.com', '91b4d142823f7d20c5f08df69122de43f35f057a988d9619f6d3138485c9a203', 'Admin', 'color', 'morado', 'N'),
(9, '', '', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 'Admin', '', '', 'S'),
(10, 'yose', 'yose@gmail.com', 'e0bc60c82713f64ef8a57c0c40d02ce24fd0141d5cc3086259c19b1e62a62bea', 'Admin', 'color', 'rojo', 'N');

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
(54, 3, 18, 'No'),
(55, 4, 1, 'No'),
(56, 4, 2, 'No'),
(57, 4, 3, 'No'),
(58, 4, 4, 'No'),
(59, 4, 5, 'No'),
(60, 4, 6, 'No'),
(61, 4, 7, 'No'),
(62, 4, 8, 'No'),
(63, 4, 9, 'No'),
(64, 4, 10, 'No'),
(65, 4, 11, 'No'),
(66, 4, 12, 'No'),
(67, 4, 13, 'No'),
(68, 4, 14, 'No'),
(69, 4, 15, 'No'),
(70, 4, 16, 'No'),
(71, 4, 17, 'No'),
(72, 4, 18, 'No'),
(73, 5, 1, 'No'),
(74, 5, 2, 'No'),
(75, 5, 3, 'No'),
(76, 5, 4, 'No'),
(77, 5, 5, 'No'),
(78, 5, 6, 'No'),
(79, 5, 7, 'No'),
(80, 5, 8, 'No'),
(81, 5, 9, 'No'),
(82, 5, 10, 'No'),
(83, 5, 11, 'No'),
(84, 5, 12, 'No'),
(85, 5, 13, 'No'),
(86, 5, 14, 'No'),
(87, 5, 15, 'No'),
(88, 5, 16, 'No'),
(89, 5, 17, 'No'),
(90, 5, 18, 'No'),
(91, 6, 1, 'No'),
(92, 6, 2, 'No'),
(93, 6, 3, 'No'),
(94, 6, 4, 'No'),
(95, 6, 5, 'No'),
(96, 6, 6, 'No'),
(97, 6, 7, 'No'),
(98, 6, 8, 'No'),
(99, 6, 9, 'No'),
(100, 6, 10, 'No'),
(101, 6, 11, 'No'),
(102, 6, 12, 'No'),
(103, 6, 13, 'No'),
(104, 6, 14, 'No'),
(105, 6, 15, 'No'),
(106, 6, 16, 'No'),
(107, 6, 17, 'No'),
(108, 6, 18, 'No'),
(109, 7, 1, 'No'),
(110, 7, 2, 'No'),
(111, 7, 3, 'No'),
(112, 7, 4, 'No'),
(113, 7, 5, 'No'),
(114, 7, 6, 'No'),
(115, 7, 7, 'No'),
(116, 7, 8, 'No'),
(117, 7, 9, 'No'),
(118, 7, 10, 'No'),
(119, 7, 11, 'No'),
(120, 7, 12, 'No'),
(121, 7, 13, 'No'),
(122, 7, 14, 'No'),
(123, 7, 15, 'No'),
(124, 7, 16, 'No'),
(125, 7, 17, 'No'),
(126, 7, 18, 'No'),
(127, 8, 1, 'No'),
(128, 8, 2, 'No'),
(129, 8, 3, 'No'),
(130, 8, 4, 'No'),
(131, 8, 5, 'No'),
(132, 8, 6, 'No'),
(133, 8, 7, 'No'),
(134, 8, 8, 'No'),
(135, 8, 9, 'No'),
(136, 8, 10, 'No'),
(137, 8, 11, 'No'),
(138, 8, 12, 'No'),
(139, 8, 13, 'No'),
(140, 8, 14, 'No'),
(141, 8, 15, 'No'),
(142, 8, 16, 'No'),
(143, 8, 17, 'No'),
(144, 8, 18, 'No'),
(145, 9, 1, 'No'),
(146, 9, 2, 'No'),
(147, 9, 3, 'No'),
(148, 9, 4, 'No'),
(149, 9, 5, 'No'),
(150, 9, 6, 'No'),
(151, 9, 7, 'No'),
(152, 9, 8, 'No'),
(153, 9, 9, 'No'),
(154, 9, 10, 'No'),
(155, 9, 11, 'No'),
(156, 9, 12, 'No'),
(157, 9, 13, 'No'),
(158, 9, 14, 'No'),
(159, 9, 15, 'No'),
(160, 9, 16, 'No'),
(161, 9, 17, 'No'),
(162, 9, 18, 'No'),
(163, 10, 1, 'No'),
(164, 10, 2, 'No'),
(165, 10, 3, 'No'),
(166, 10, 4, 'No'),
(167, 10, 5, 'No'),
(168, 10, 6, 'No'),
(169, 10, 7, 'No'),
(170, 10, 8, 'No'),
(171, 10, 9, 'No'),
(172, 10, 10, 'No'),
(173, 10, 11, 'No'),
(174, 10, 12, 'No'),
(175, 10, 13, 'No'),
(176, 10, 14, 'No'),
(177, 10, 15, 'No'),
(178, 10, 16, 'No'),
(179, 10, 17, 'No'),
(180, 10, 18, 'No');

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
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `dia_lab`
--
ALTER TABLE `dia_lab`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cargo` (`id_cargo`);

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
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventario_producto` (`id_producto`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_proveedor` (`id_proveedor`);

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
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `dia_lab`
--
ALTER TABLE `dia_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios_has_privilegios`
--
ALTER TABLE `usuarios_has_privilegios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD CONSTRAINT `rest_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `rest_cargo` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `producto_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
