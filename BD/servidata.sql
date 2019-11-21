-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2019 a las 01:21:32
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
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_ubicacion` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `ce` varchar(90) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paletas` varchar(90) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id`, `id_producto`, `id_ubicacion`, `stock`, `ce`, `paletas`) VALUES
(1, 1, 1, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_deduccion`
--

CREATE TABLE `asignacion_deduccion` (
  `id` int(90) NOT NULL,
  `descripcion` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` enum('Asignacion','Deduccion') COLLATE utf8_unicode_ci NOT NULL,
  `monto` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `asignacion_deduccion`
--

INSERT INTO `asignacion_deduccion` (`id`, `descripcion`, `tipo`, `monto`) VALUES
(1, 'Memoriales La Victoria C.A', 'Deduccion', 15000),
(2, 'Prima por Hijo', 'Asignacion', 50000),
(3, 'prima hijo', 'Asignacion', 12000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `id` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'fecha de asistencia',
  `status` enum('A','NACJ','NASJ','Sin Marcar') COLLATE utf8_unicode_ci NOT NULL,
  `justificacion` enum('Permiso','Reposo','','') COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`id`, `id_empleado`, `fecha_hora`, `status`, `justificacion`) VALUES
(4, 1, '2019-11-13 04:30:00', 'Sin Marcar', ''),
(5, 3, '2019-11-13 04:30:00', 'Sin Marcar', ''),
(6, 1, '2019-11-15 04:30:00', 'Sin Marcar', ''),
(7, 1, '2019-11-16 04:30:00', 'Sin Marcar', ''),
(8, 1, '2019-11-21 04:30:00', 'Sin Marcar', ''),
(9, 3, '2019-11-21 04:30:00', 'Sin Marcar', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `actividad` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `salario` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `nombre`, `salario`, `id_departamento`) VALUES
(1, 'Jefe', '1000000', 1),
(2, 'Asistente', '400000', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cestaticket`
--

CREATE TABLE `cestaticket` (
  `id` int(11) NOT NULL,
  `monto` varchar(90) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cestaticket`
--

INSERT INTO `cestaticket` (`id`, `monto`) VALUES
(1, '25000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(90) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `cantidad` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `paletas` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `observacion` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `destino` varchar(90) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dia_lab`
--

CREATE TABLE `dia_lab` (
  `id` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `dia_lab`
--

INSERT INTO `dia_lab` (`id`, `id_empleado`, `nombre`) VALUES
(31, 1, ' Lunes'),
(32, 1, ' Martes'),
(33, 1, ' MiÃ©rcoles'),
(34, 1, ' Jueves'),
(35, 1, ' Viernes'),
(36, 1, ' SÃ¡bado'),
(37, 1, ' Domingo'),
(41, 2, ' Lunes'),
(42, 2, ' Martes'),
(43, 2, ' MiÃ©rcoles'),
(44, 3, ' Martes'),
(45, 3, ' MiÃ©rcoles'),
(46, 3, ' Jueves');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `cedula` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `nombres` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `condicion` enum('Fijo','Contratado') COLLATE utf8_unicode_ci NOT NULL,
  `fecha_venc` date NOT NULL,
  `ncuenta` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `cedula`, `nombres`, `apellidos`, `direccion`, `telefono`, `fecha_ingreso`, `condicion`, `fecha_venc`, `ncuenta`, `id_cargo`, `id_departamento`) VALUES
(1, '25873122', 'Juan Carlos', 'Figueredo ', 'La Victoria', '04243160235', '2019-10-08', 'Fijo', '2024-10-18', '01354567898765432345', 2, 2),
(2, '28147989', 'Hector Argenis', 'Hernandez Ceballo', 'San Mateo', '04243590130', '2019-10-09', 'Contratado', '2019-11-06', '01915678890998787654', 1, 2),
(3, '18610668', 'Eynsterd Samuel', 'Velazco', 'Zuata', '04163462604', '2019-10-08', 'Fijo', '2019-10-30', '01027693406500432765', 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_asig`
--

CREATE TABLE `empleado_asig` (
  `id` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_asignaciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `empleado_asig`
--

INSERT INTO `empleado_asig` (`id`, `id_empleado`, `id_asignaciones`) VALUES
(1, 1, 2),
(2, 1, 1),
(3, 2, 1),
(4, 2, 2),
(5, 3, 1),
(6, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_pago`
--

CREATE TABLE `empleado_pago` (
  `id_empleado` int(11) NOT NULL,
  `id_pago` int(11) NOT NULL,
  `horas_justificadas` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `horas_sobre_t` varchar(90) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_producto`
--

CREATE TABLE `empleado_producto` (
  `id_empleado` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `linea_produccion` varchar(90) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enviados`
--

CREATE TABLE `enviados` (
  `id` int(11) NOT NULL,
  `id_productos` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `id_ubicacion` int(11) NOT NULL,
  `id_codigo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `observacion` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `enviados`
--

INSERT INTO `enviados` (`id`, `id_productos`, `id_ubicacion`, `id_codigo`, `cantidad`, `fecha_registro`, `observacion`) VALUES
(1, '0', 2, 0, 100, '2019-11-06', NULL),
(2, '0', 2, 0, 100, '2019-11-06', NULL),
(3, '0', 2, 0, 40, '2019-11-06', NULL),
(4, '0', 2, 0, 1000, '2019-11-06', NULL),
(5, '0', 2, 0, 100, '2019-11-06', NULL),
(6, '0', 2, 0, 10, '2019-11-06', NULL),
(7, '0', 1, 0, 50, '2019-11-08', NULL),
(8, '0', 2, 0, 50, '2019-11-08', NULL),
(9, '0', 1, 0, 100, '2019-11-08', NULL),
(10, '0', 0, 0, 0, '2019-11-08', NULL),
(11, '0', 2, 7272727, 10, '2019-11-08', NULL),
(12, '0', 1, 2, 200, '2019-11-08', NULL),
(13, '0', 2, 2, 90, '2019-11-08', NULL),
(14, '0', 1, 12356, 12, '2019-11-08', NULL),
(15, '0', 1, 0, 12, '2019-11-08', NULL),
(16, '', 2, 12356, 11, '2019-11-08', NULL),
(17, '1', 2, 2, 11, '2019-11-08', NULL),
(18, '', 2, 2, 14, '2019-11-08', NULL),
(19, '', 1, 12356, 10, '2019-11-20', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
  `tiempo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `motivo` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `tiempo`, `motivo`, `id_producto`, `cantidad`) VALUES
(1, '2019-11-05 21:42:52', 'ingreso', 1, 100),
(2, '2019-11-05 21:46:05', 'egreso', 5, -10),
(3, '2019-11-05 21:50:20', 'ingreso', 5, 100),
(4, '2019-11-08 13:38:04', 'Egreso', 1, -9),
(5, '2019-11-08 15:43:29', 'Ingreso', 1, 9),
(6, '2019-11-08 16:30:41', 'Ingreso', 5, 1),
(7, '2019-11-20 15:46:33', 'Egreso', 1, -5),
(8, '2019-11-20 15:47:22', 'Egreso', 1, -2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_mp`
--

CREATE TABLE `historial_mp` (
  `id` int(255) NOT NULL,
  `tiempo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `motivo` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `id_materia_prima` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `historial_mp`
--

INSERT INTO `historial_mp` (`id`, `tiempo`, `motivo`, `id_materia_prima`, `cantidad`) VALUES
(1, '2019-11-08 15:31:55', 'ingrero', 3, 1000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int(11) NOT NULL,
  `id_productos` int(11) NOT NULL,
  `estado` enum('aceptado','rechazado') COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_entrega` date NOT NULL,
  `fecha_vencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id`, `id_productos`, `estado`, `observaciones`, `cantidad`, `fecha_entrega`, `fecha_vencimiento`) VALUES
(1, 1, 'aceptado', 'ninguna', 160, '2019-09-06', '2019-09-30'),
(6, 2, 'aceptado', 'ninguno', 440, '2019-10-08', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiaprima_producto`
--

CREATE TABLE `materiaprima_producto` (
  `id_materiaprima` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad_u_mp` int(90) NOT NULL,
  `cantidad_exist_mp` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiaprima_proveedor`
--

CREATE TABLE `materiaprima_proveedor` (
  `id_materiaprima` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `cantidad_c_mp` int(90) NOT NULL,
  `cantidad_exist_mp` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_prima`
--

CREATE TABLE `materia_prima` (
  `id` int(11) NOT NULL,
  `codigo` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `presentacion` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `unidad` enum('Kgs','Lts') COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `stock_minimo` int(11) NOT NULL,
  `stock_maximo` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `borrado` enum('N','S') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `activo` enum('S','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `materia_prima`
--

INSERT INTO `materia_prima` (`id`, `codigo`, `nombre`, `presentacion`, `unidad`, `stock`, `stock_minimo`, `stock_maximo`, `borrado`, `activo`) VALUES
(1, 'C1903', 'XILENO ', 'BARITANQUE DE 1000 LTS ', 'Lts', 5050, 1000, '100000', 'N', 'S'),
(2, '2h2h22', 'madera', 'tablas', 'Lts', 30, 10, '40', 'N', 'S'),
(3, '2h2fkfk', 'agua', 'paletas', 'Lts', 3000, 100, '10000', 'N', 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomina`
--

CREATE TABLE `nomina` (
  `id` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_prenomina` int(11) NOT NULL,
  `sueldo` varchar(90) NOT NULL,
  `total_asig` varchar(90) NOT NULL,
  `total_deducc` varchar(90) NOT NULL,
  `monto` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(255) NOT NULL,
  `titulo` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `mensaje` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `titulo`, `mensaje`) VALUES
(1, 'Inventario', '1 artÃ­culo requiere atenciÃ³n'),
(2, 'Inventario', '1 artÃ­culo requiere atenciÃ³n'),
(3, 'Inventario', '2 artÃ­culos requieren atenciÃ³n'),
(4, 'Inventario', '2 artÃ­culos requieren atenciÃ³n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones_detalles`
--

CREATE TABLE `notificaciones_detalles` (
  `id` int(255) NOT NULL,
  `id_notificaciones` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `visto` enum('N','S') COLLATE utf8_unicode_ci DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id` int(11) NOT NULL,
  `sueldo` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `monto` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `periodo` varchar(90) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_asignaciondeduccion`
--

CREATE TABLE `pago_asignaciondeduccion` (
  `id_pago` int(90) NOT NULL,
  `id_ad` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_edicion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` varchar(60) CHARACTER SET utf8 NOT NULL DEFAULT 'En Espera',
  `tipo` enum('interno','externo') COLLATE utf8_unicode_ci NOT NULL,
  `id_proveedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `fecha_registro`, `fecha_edicion`, `estado`, `tipo`, `id_proveedor`) VALUES
(1, '2019-11-08 03:03:58', '2019-11-08 02:42:53', 'Cancelado', 'interno', 1),
(2, '2019-11-08 17:33:06', '2019-11-08 03:20:35', 'Cancelado', 'interno', NULL),
(3, '2019-11-08 16:43:26', '2019-11-08 16:43:26', 'En Espera', 'interno', NULL),
(4, '2019-11-08 17:25:36', '2019-11-08 17:25:36', 'En Espera', 'interno', NULL),
(6, '2019-11-20 16:42:31', '2019-11-20 16:42:31', 'En Espera', 'interno', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_detalles`
--

CREATE TABLE `pedido_detalles` (
  `id` int(11) NOT NULL,
  `id_pedido` int(25) NOT NULL,
  `tiempo_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tiempo_modificado` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `id_producto` int(11) NOT NULL,
  `id_proveedor_personalizado` int(11) DEFAULT NULL,
  `cantidad_solicitada` int(11) NOT NULL,
  `cantidad_despachada` int(11) DEFAULT NULL,
  `observaciones` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pedido_detalles`
--

INSERT INTO `pedido_detalles` (`id`, `id_pedido`, `tiempo_registro`, `tiempo_modificado`, `id_producto`, `id_proveedor_personalizado`, `cantidad_solicitada`, `cantidad_despachada`, `observaciones`) VALUES
(1, 2, '2019-11-08 03:20:35', NULL, 1, NULL, 10, NULL, NULL),
(2, 3, '2019-11-08 16:43:26', NULL, 2, NULL, 9, NULL, NULL),
(3, 3, '2019-11-08 16:43:26', NULL, 1, NULL, 19, NULL, NULL),
(4, 4, '2019-11-08 17:25:36', NULL, 1, NULL, 9, NULL, NULL),
(5, 6, '2019-11-20 16:42:31', NULL, 1, NULL, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `motivo` enum('Reposo','Permiso') COLLATE utf8_unicode_ci DEFAULT NULL,
  `cantidad_dias` int(11) NOT NULL,
  `inicio_permiso` date NOT NULL,
  `fin_permiso` date NOT NULL,
  `resta` int(11) NOT NULL,
  `status` enum('En Curso','Cumplido') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'En Curso',
  `id_empleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `motivo`, `cantidad_dias`, `inicio_permiso`, `fin_permiso`, `resta`, `status`, `id_empleado`) VALUES
(1, 'Reposo', 3, '2019-11-10', '2019-11-12', 0, 'Cumplido', 3),
(2, 'Permiso', 3, '2019-10-20', '2019-10-22', 3, 'Cumplido', 3),
(3, 'Reposo', 4, '2019-11-12', '2019-11-15', 3, 'En Curso', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prenomina_empleado`
--

CREATE TABLE `prenomina_empleado` (
  `id` int(11) NOT NULL,
  `id_prenomina` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prenomina_empleado`
--

INSERT INTO `prenomina_empleado` (`id`, `id_prenomina`, `id_empleado`) VALUES
(7, 3, 1),
(8, 3, 2),
(9, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pre_nomina`
--

CREATE TABLE `pre_nomina` (
  `id` int(11) NOT NULL,
  `quincena` int(90) NOT NULL,
  `mes` int(90) NOT NULL,
  `anio` int(90) NOT NULL,
  `status` enum('Procesando','Aprobado') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pre_nomina`
--

INSERT INTO `pre_nomina` (`id`, `quincena`, `mes`, `anio`, `status`) VALUES
(3, 1, 10, 2019, 'Procesando');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE `privilegios` (
  `id` int(11) NOT NULL,
  `modulo` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `privilegio` varchar(90) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `cantidad` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `paletas` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `observacion` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `status` enum('Sin Almacenar','Almacenando','Completo') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `presentacion` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `unidad` enum('Kgs','Lts') COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `stock_minimo` int(11) NOT NULL,
  `stock_maximo` int(11) NOT NULL,
  `borrado` enum('N','S') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `activo` enum('S','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S',
  `valor_unitario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `nombre`, `presentacion`, `unidad`, `stock`, `stock_minimo`, `stock_maximo`, `borrado`, `activo`, `valor_unitario`) VALUES
(1, '12356', 'hierro', 'paletas', 'Kgs', 3, 5, 30, 'N', 'S', NULL),
(2, '7272727', 'metal', 'paletas', 'Lts', 80, 10, 5000, 'N', 'S', NULL),
(3, 'nuh779', 'cosa', 'paletas', 'Kgs', 10, 10, 200, 'N', 'S', NULL),
(4, '32020', 'madera', 'flota', 'Lts', 56, 10, 100, 'N', 'N', NULL),
(5, '2h2h22', 'koll', 'tablas', 'Lts', 870, 9, 900, 'N', 'S', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `cod_rif` enum('V','J','E','G') COLLATE utf8_unicode_ci NOT NULL,
  `cedula` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `borrado` enum('N','S') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `cod_rif`, `cedula`, `nombre`, `email`, `direccion`, `telefono`, `borrado`) VALUES
(2, 'V', '25873122', 'Juan Carlos Figueredo', 'juan2912@gmail.com', 'La Victoria', '3163502', 'N'),
(4, 'J', 'J-1345678', 'Inica Cagua C.A', 'inicacca@gmail.com', 'Cagua ', '9876556', 'S'),
(5, 'V', '29554496', 'holahhh', 'holgggggga@gmail.com', 'aahha', '23456787654', 'N'),
(6, 'V', '23353454', 'esaaaaaa', '', 'gagu', '342342323', 'N'),
(7, 'V', '099988', 'koll', 'hectorher149@gmail.com', '', '8889998', 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibidos`
--

CREATE TABLE `recibidos` (
  `id` int(11) NOT NULL,
  `id_pmp` int(11) NOT NULL,
  `cantidad` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `observacion` varchar(90) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ce` varchar(90) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `recibidos`
--

INSERT INTO `recibidos` (`id`, `id_pmp`, `cantidad`, `fecha`, `observacion`, `ce`) VALUES
(2, 1, '102002', '2019-10-07', '8jjkk', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `bloqueado` enum('N','S') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `borrado` enum('N','S') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `tipo` enum('I','E') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`id`, `nombre`, `bloqueado`, `borrado`, `tipo`) VALUES
(1, 'produccion', 'N', 'N', 'I'),
(2, 'almacen', 'N', 'N', 'I');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_usuario` enum('Admin','Usuario 1','Usuario 2') COLLATE utf8_unicode_ci NOT NULL,
  `pregunta` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `respuesta` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `borrado` enum('S','N') COLLATE utf8_unicode_ci DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `clave`, `tipo_usuario`, `pregunta`, `respuesta`, `borrado`) VALUES
(1, 'Daileska Vilera', 'dvilera610@gmail.com', '044598473886535a33126083e3d2e1170e4a67befe897a83ad95a33209a64b3a', 'Usuario 1', 'Mascota', 'Sandy', 'S'),
(2, 'hector hernandez', 'hectorher149@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Admin', 'nombre de mascota', 'body', 'N'),
(3, 'Alejandro', 'darvisalfonso@gmail.com', '67d9f1c944a4ee6ef3634298c97639c81927a228d6aa490b343abf594e45aecf', 'Usuario 1', 'nombre de mascota', 'pelusa', 'S'),
(4, 'Genessi', 'genessie@gmail.com', '8491502322172e09ec7222d33941d33afbfcc22ab0c4dd1033dd72232308675a', 'Admin', 'mes de nacimiento', 'noviembre', 'S');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_ubicacion` (`id_ubicacion`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `rest_asis` (`id_empleado`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `rest_dia` (`id_empleado`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- Indices de la tabla `empleado_asig`
--
ALTER TABLE `empleado_asig`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empl` (`id_empleado`),
  ADD KEY `asig` (`id_asignaciones`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ubicacion` (`id_ubicacion`),
  ADD KEY `id_codigo` (`id_codigo`),
  ADD KEY `id_productos` (`id_productos`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `historial_mp`
--
ALTER TABLE `historial_mp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_materia_prima` (`id_materia_prima`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventario_producto` (`id_productos`);

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
-- Indices de la tabla `nomina`
--
ALTER TABLE `nomina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_prenomina` (`id_prenomina`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
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
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedido_detalles`
--
ALTER TABLE `pedido_detalles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `prenomina_empleado`
--
ALTER TABLE `prenomina_empleado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_prenomina` (`id_prenomina`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `pre_nomina`
--
ALTER TABLE `pre_nomina`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `asignacion_deduccion`
--
ALTER TABLE `asignacion_deduccion`
  MODIFY `id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cestaticket`
--
ALTER TABLE `cestaticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `empleado_asig`
--
ALTER TABLE `empleado_asig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `enviados`
--
ALTER TABLE `enviados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `historial_mp`
--
ALTER TABLE `historial_mp`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `materia_prima`
--
ALTER TABLE `materia_prima`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `nomina`
--
ALTER TABLE `nomina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pedido_detalles`
--
ALTER TABLE `pedido_detalles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `prenomina_empleado`
--
ALTER TABLE `prenomina_empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pre_nomina`
--
ALTER TABLE `pre_nomina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `recibidos`
--
ALTER TABLE `recibidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `rest_asis` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD CONSTRAINT `rest_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `dia_lab`
--
ALTER TABLE `dia_lab`
  ADD CONSTRAINT `rest_dia` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `rest_cargo` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado_asig`
--
ALTER TABLE `empleado_asig`
  ADD CONSTRAINT `asig` FOREIGN KEY (`id_asignaciones`) REFERENCES `asignacion_deduccion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empl` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `inventario_producto` FOREIGN KEY (`id_productos`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `materiaprima_proveedor`
--
ALTER TABLE `materiaprima_proveedor`
  ADD CONSTRAINT `materiaprima_proveedor_ibfk_2` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `nomina`
--
ALTER TABLE `nomina`
  ADD CONSTRAINT `nomina_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nomina_ibfk_2` FOREIGN KEY (`id_prenomina`) REFERENCES `pre_nomina` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `dias_permiso` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prenomina_empleado`
--
ALTER TABLE `prenomina_empleado`
  ADD CONSTRAINT `prenomina_empleado_ibfk_1` FOREIGN KEY (`id_prenomina`) REFERENCES `pre_nomina` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prenomina_empleado_ibfk_2` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto_proveedor`
--
ALTER TABLE `producto_proveedor`
  ADD CONSTRAINT `producto_proveedor_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
