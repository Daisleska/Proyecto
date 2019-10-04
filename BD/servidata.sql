-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2019 a las 01:34:42
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
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `id` int(11) NOT NULL,
  `id_produccion` int(11) NOT NULL,
  `existencia` varchar(90) NOT NULL,
  `ce` varchar(90) NOT NULL,
  `paletas` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Memoriales La Victoria C.A', 'Deduccion', '10000'),
(2, 'Prima por Hijo', 'Asignacion', '50000'),
(8, 'Memoriales La Victor', 'Deduccion', '50000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `id` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'fecha de asistencia',
  `estado` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`id`, `id_empleado`, `fecha_hora`, `estado`) VALUES
(1, 28147989, '2019-09-03 18:57:19', ''),
(2, 4400947, '2019-09-04 19:45:51', ''),
(4, 28147989, '2019-09-05 18:49:14', ''),
(5, 28147989, '2019-09-06 18:15:50', ''),
(6, 25873122, '2019-09-07 00:52:29', ''),
(7, 28147989, '2019-09-15 16:56:33', ''),
(8, 25946044, '2019-09-15 17:00:02', ''),
(9, 25873122, '2019-09-15 17:03:22', ''),
(10, 0, '2019-10-01 17:18:11', ''),
(11, 1, '2019-10-03 16:38:24', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
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
  `salario` varchar(90) NOT NULL,
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `nombre`, `salario`, `id_departamento`) VALUES
(1, 'Jefe', '1000000', 1),
(2, 'Asistente', '400000', 2),
(3, 'Secretaria', '250000', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cestaticket`
--

CREATE TABLE `cestaticket` (
  `id` int(11) NOT NULL,
  `monto` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cestaticket`
--

INSERT INTO `cestaticket` (`id`, `monto`) VALUES
(1, '50000');

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
-- Estructura de tabla para la tabla `despachos`
--

CREATE TABLE `despachos` (
  `id` int(11) NOT NULL,
  `id_almacen` int(11) NOT NULL,
  `cantidad` varchar(90) NOT NULL,
  `paletas` varchar(90) NOT NULL,
  `observacion` varchar(90) NOT NULL,
  `fecha` date NOT NULL,
  `destino` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(9, 4400947, ' Sabado'),
(10, 25873122, ' Lunes'),
(11, 25873122, ' Martes'),
(12, 25873122, ' Miercoles'),
(13, 25873122, ' Jueves'),
(14, 25873122, ' Viernes'),
(15, 25873122, ' Lunes'),
(16, 25873122, ' Martes'),
(17, 25873122, ' Miercoles'),
(18, 25873122, ' Jueves'),
(19, 25873122, ' Viernes');

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
(1, '28147989', 'Hector Argenis', 'Hernandez Ceballos', 'cagua', 3590130, '0000-00-00', 'Fijo', '0000-00-00', 1234567, 2147483647, 1, 4);

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
-- Estructura de tabla para la tabla `enviados`
--

CREATE TABLE `enviados` (
  `id` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `cantidad` varchar(90) NOT NULL,
  `filial` enum('Produccion') NOT NULL,
  `observacion` varchar(90) NOT NULL
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
  `presentacion` varchar(90) NOT NULL,
  `unidad` enum('Kgs','Lts') NOT NULL,
  `stock_max` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia_prima`
--

INSERT INTO `materia_prima` (`id`, `codigo`, `nombre`, `presentacion`, `unidad`, `stock_max`) VALUES
(1, 'C1903', 'XILENO ', 'BARITANQUE DE 1000 LTS ', 'Lts', '100000');

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
-- Estructura de tabla para la tabla `pre_nomina`
--

CREATE TABLE `pre_nomina` (
  `id` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `total` varchar(90) NOT NULL,
  `quincena` varchar(90) NOT NULL,
  `status` enum('1','2','3') NOT NULL
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
-- Estructura de tabla para la tabla `produccion`
--

CREATE TABLE `produccion` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` varchar(90) NOT NULL,
  `paletas` varchar(90) NOT NULL,
  `observacion` varchar(90) NOT NULL,
  `fecha` date NOT NULL,
  `status` enum('Sin Almacenar','Almacenando','Completo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(90) NOT NULL,
  `presentacion` varchar(90) NOT NULL,
  `unidad` enum('Kgs','Lts') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `presentacion`, `unidad`) VALUES
(1, 'hierro', 'paletas', 'Kgs');

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
  `cedula` varchar(90) NOT NULL,
  `nombre` varchar(90) NOT NULL,
  `email` varchar(90) NOT NULL,
  `direccion` varchar(90) NOT NULL,
  `telefono` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `cedula`, `nombre`, `email`, `direccion`, `telefono`) VALUES
(2, '25873122', 'Juan Carlos Figueredo', 'juan2912@gmail.com', 'La Victoria', '3163502'),
(4, 'J-1345678', 'Inica Cagua C.A', 'inicacca@gmail.com', 'Cagua ', '9876556');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibidos`
--

CREATE TABLE `recibidos` (
  `id` int(11) NOT NULL,
  `id_pmp` int(11) NOT NULL,
  `cantidad` varchar(90) NOT NULL,
  `fecha` date NOT NULL,
  `observacion` varchar(90) NOT NULL,
  `ce` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Daileska Vilera', 'dvilera610@gmail.com', '044598473886535a33126083e3d2e1170e4a67befe897a83ad95a33209a64b3a', 'Usuario 1', 'Mascota', 'Sandy', 'S'),
(2, 'hector hernandez', 'hectorher149@gmail.com', '9010e72389a80487d473017425c6ec7951068abed82a4df32459c91f0e45d2ea', 'Usuario 1', 'nombre de mascota', 'body', 'N'),
(3, 'Alejandro', 'darvisalfonso@gmail.com', '67d9f1c944a4ee6ef3634298c97639c81927a228d6aa490b343abf594e45aecf', 'Usuario 1', 'nombre de mascota', 'pelusa', 'S'),
(4, 'Genessi', 'genessie@gmail.com', '8491502322172e09ec7222d33941d33afbfcc22ab0c4dd1033dd72232308675a', 'Admin', 'mes de nacimiento', 'noviembre', 'S');

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
(72, 4, 18, 'No');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_departamentos` (`id_departamento`);

--
-- Indices de la tabla `cestaticket`
--
ALTER TABLE `cestaticket`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `despachos`
--
ALTER TABLE `despachos`
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
-- Indices de la tabla `enviados`
--
ALTER TABLE `enviados`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `pre_nomina`
--
ALTER TABLE `pre_nomina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `produccion`
--
ALTER TABLE `produccion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
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
-- Indices de la tabla `recibidos`
--
ALTER TABLE `recibidos`
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
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asignacion_deduccion`
--
ALTER TABLE `asignacion_deduccion`
  MODIFY `id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cestaticket`
--
ALTER TABLE `cestaticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `despachos`
--
ALTER TABLE `despachos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dia_lab`
--
ALTER TABLE `dia_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `enviados`
--
ALTER TABLE `enviados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `materia_prima`
--
ALTER TABLE `materia_prima`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pre_nomina`
--
ALTER TABLE `pre_nomina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `produccion`
--
ALTER TABLE `produccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `recibidos`
--
ALTER TABLE `recibidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios_has_privilegios`
--
ALTER TABLE `usuarios_has_privilegios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

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
  ADD CONSTRAINT `empleado_producto_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rest_emp` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `materiaprima_proveedor`
--
ALTER TABLE `materiaprima_proveedor`
  ADD CONSTRAINT `materiaprima_proveedor_ibfk_2` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `producto_proveedor`
--
ALTER TABLE `producto_proveedor`
  ADD CONSTRAINT `producto_proveedor_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
