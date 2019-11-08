-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: abc
-- ------------------------------------------------------
-- Server version	10.1.37-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `expediente`
--

DROP TABLE IF EXISTS `expediente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expediente` (
  `id_codigo` int(3) NOT NULL AUTO_INCREMENT,
  `ced` text COLLATE latin1_spanish_ci,
  `nomb` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `apel` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `lnac` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `sexo` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `e_civil` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `t_sang` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `direc` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  `telefon` text COLLATE latin1_spanish_ci,
  `peso` text COLLATE latin1_spanish_ci,
  `estatura` text COLLATE latin1_spanish_ci,
  `ope` varchar(40) COLLATE latin1_spanish_ci DEFAULT NULL,
  `p_pitui` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `a_d_obe` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
  `a_d_buli` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
  `c_a` text COLLATE latin1_spanish_ci,
  `c_ana` text COLLATE latin1_spanish_ci,
  `c_este` text COLLATE latin1_spanish_ci,
  `m_alergi` text COLLATE latin1_spanish_ci,
  `m_consu` text COLLATE latin1_spanish_ci,
  `c_ohol` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
  `fuma` text COLLATE latin1_spanish_ci,
  `c_dr` text COLLATE latin1_spanish_ci,
  PRIMARY KEY (`id_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expediente`
--

LOCK TABLES `expediente` WRITE;
/*!40000 ALTER TABLE `expediente` DISABLE KEYS */;
INSERT INTO `expediente` VALUES (22,'V25841227','rodolfo','silva',NULL,NULL,NULL,NULL,NULL,'paya','0412',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','2',NULL,NULL,NULL),(23,'V25841227','rodolfo','silva',NULL,NULL,NULL,NULL,NULL,'paya','0412',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','2',NULL,NULL,NULL),(24,'V25841227','rodolfo','silva',NULL,NULL,NULL,NULL,NULL,'paya','0412',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','2',NULL,NULL,NULL),(25,'V25841227','rodolfo','silva',NULL,NULL,NULL,NULL,NULL,'paya','0412',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','2',NULL,NULL,NULL),(26,'V25841227','rodolfo','silva',NULL,NULL,NULL,NULL,NULL,'paya','0412',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','2',NULL,NULL,NULL),(27,'V25841227','rodolfo','silva',NULL,NULL,NULL,NULL,NULL,'paya','0412',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','2',NULL,NULL,NULL),(28,'V25841227','rodolfo','silva',NULL,NULL,NULL,NULL,NULL,'paya','0412',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','2',NULL,NULL,NULL),(29,'V25841227','rodolfo','silva',NULL,NULL,NULL,NULL,NULL,'paya','0412',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','2',NULL,NULL,NULL),(30,'V25841227','rodolfo','silva',NULL,NULL,NULL,NULL,NULL,'paya','0412',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','2',NULL,NULL,NULL),(31,'V25841227','rodolfo','silva',NULL,NULL,NULL,NULL,NULL,'paya','0412',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','2',NULL,NULL,NULL),(32,'V25841227','rodolfo','silva',NULL,NULL,NULL,NULL,NULL,'paya','0412',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','2',NULL,NULL,NULL),(33,'V25841227','rodolfo','silva',NULL,NULL,NULL,NULL,NULL,'paya','0412',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','2',NULL,NULL,NULL),(34,'V25841227','rodolfo','silva',NULL,NULL,NULL,NULL,NULL,'paya','0412',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','2',NULL,NULL,NULL),(35,'V25841227','rodolfo','silva',NULL,NULL,NULL,NULL,NULL,'paya','0412',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','2',NULL,NULL,NULL),(36,'V25841227','rodolfo','silva',NULL,NULL,NULL,NULL,NULL,'paya','0412',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','2',NULL,NULL,NULL),(37,'V25841227','rodolfo','silva',NULL,NULL,NULL,NULL,NULL,'paya','0412',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','2',NULL,NULL,NULL),(38,'E7241675','UPTA','POLITECNICO','0000-00-00','LA VICTORIA','Masculino','Soltero / Soltera','A+','GIRARDOT','0412','1','1.90','JASD','Elija la opcion','No','No','No','No',NULL,'','HIHK','Si','No','No'),(39,'E7241675','UPTA','POLITECNICO','0000-00-00','LA VICTORIA','Masculino','Soltero / Soltera','A+','GIRARDOT','0412','1','1.90','JASD','Elija la opcion','No','No','No','No','Si','','HIHK','Si','No','No'),(40,'V52878858','JESUS','RAMIREZ','2019-10-11','CASTAÃ‘O','Femenino','Soltero / Soltera','B+','VICTORIA','0412','80KG','1,20','2','Vacio','No','No','Si','Si','Si','PARACETAMOL','CRIPI','Si','Si','Si');
/*!40000 ALTER TABLE `expediente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingreso`
--

DROP TABLE IF EXISTS `ingreso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingreso` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `correo` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `cedula` int(10) DEFAULT NULL,
  `contraseña` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingreso`
--

LOCK TABLES `ingreso` WRITE;
/*!40000 ALTER TABLE `ingreso` DISABLE KEYS */;
/*!40000 ALTER TABLE `ingreso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mediciones`
--

DROP TABLE IF EXISTS `mediciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mediciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `medicion` text COLLATE latin1_spanish_ci NOT NULL,
  `tipo` enum('%','unidad','gldl','mgdl','ml','+') COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mediciones`
--

LOCK TABLES `mediciones` WRITE;
/*!40000 ALTER TABLE `mediciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `mediciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paciente` (
  `Nombres` int(11) NOT NULL AUTO_INCREMENT,
  `Apellidos` int(11) NOT NULL,
  `Cedula` int(11) NOT NULL,
  `Direccion` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `Movil` int(11) NOT NULL,
  `Telefono_Local` int(11) NOT NULL,
  `Correo` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `Genero` text COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`Nombres`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente`
--

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente_has_sintomas`
--

DROP TABLE IF EXISTS `paciente_has_sintomas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paciente_has_sintomas` (
  `id_paciente` float NOT NULL AUTO_INCREMENT,
  `id_sintoma` float NOT NULL,
  PRIMARY KEY (`id_paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente_has_sintomas`
--

LOCK TABLES `paciente_has_sintomas` WRITE;
/*!40000 ALTER TABLE `paciente_has_sintomas` DISABLE KEYS */;
/*!40000 ALTER TABLE `paciente_has_sintomas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recuperar_clave`
--

DROP TABLE IF EXISTS `recuperar_clave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recuperar_clave` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nivel_usuario` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `correo` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `pregunta` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `respuesta` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recuperar_clave`
--

LOCK TABLES `recuperar_clave` WRITE;
/*!40000 ALTER TABLE `recuperar_clave` DISABLE KEYS */;
INSERT INTO `recuperar_clave` VALUES (1,'6','UPTA@GMAIL.COM','COMO SE LLAMA SU PER','MAX');
/*!40000 ALTER TABLE `recuperar_clave` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro`
--

DROP TABLE IF EXISTS `registro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registro` (
  `id_registro` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `cedula` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `correo` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `pregunta_secreta` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `respuesta_secreta` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `contrasena` text COLLATE latin1_spanish_ci NOT NULL,
  `rcontrasena` text COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_registro`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro`
--

LOCK TABLES `registro` WRITE;
/*!40000 ALTER TABLE `registro` DISABLE KEYS */;
INSERT INTO `registro` VALUES (34,'carolina','V5278858','car21@gmail.com','','','$2y$10$pIDElpz3FN0tknWbDqvvAOLFLmsPa3HhFOHNMIM3VdCmr9v86aYbK',''),(35,'RODOLFO','V15818386','RJPC77@GMAIL.COM','Donde Nacio','TURMERO','$2y$10$n1U1/b.aMS0RU/o9q3TCn.0LUyjK5QPspqH8TIndJjbeAjvqfVnCi',''),(47,'gabriel','V27536173','elgaboo103@gmail.com','Donde Nacio','maracay','$2y$10$3az71tK5YgYXpj5PN9ViXezzDq91w.N5jtOOAP7KIbn1q4vlQ55CG','$2y$10$3az71tK5YgYXpj5PN9ViXezzDq91w.N5jtOOAP7KIbn1q4vlQ55CG');
/*!40000 ALTER TABLE `registro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sintomas`
--

DROP TABLE IF EXISTS `sintomas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sintomas` (
  `Sintoma` text COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sintomas`
--

LOCK TABLES `sintomas` WRITE;
/*!40000 ALTER TABLE `sintomas` DISABLE KEYS */;
/*!40000 ALTER TABLE `sintomas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trastornos`
--

DROP TABLE IF EXISTS `trastornos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trastornos` (
  `trastorno` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_paciente` int(11) NOT NULL,
  PRIMARY KEY (`trastorno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trastornos`
--

LOCK TABLES `trastornos` WRITE;
/*!40000 ALTER TABLE `trastornos` DISABLE KEYS */;
/*!40000 ALTER TABLE `trastornos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
  `nombre` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `ape` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `correo` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `password` text COLLATE latin1_spanish_ci,
  `pregunta` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `respuesta` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `prof` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `nivel_usuario` text COLLATE latin1_spanish_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'V25841227','rodolfo',NULL,'rj@gmail.com','5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5','donde nacio','maracay',NULL,'Admin'),(2,'V7241675','JESUSU','GARCIA','RJPC77@GMAIL.COM','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92','MI ID','dos','INFORMATICA','5'),(3,'E81725030','jorgue','dominguez','jodocha@gmail.com','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92','cuarto dios del pant','cacuilo','ing','8'),(4,'V5278858','PEDRO','RAMON','UPTA@GMAIL.COM','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92','COMO SE LLAMA SU PER','JFK','ELECTRICIDAD','3');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `valores`
--

DROP TABLE IF EXISTS `valores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `valores` (
  `minimo` int(10) NOT NULL AUTO_INCREMENT,
  `maximo` int(10) NOT NULL,
  `nivel` enum('Normal','leve','Moderada','Grave','') COLLATE latin1_spanish_ci NOT NULL,
  `id_medicion` decimal(10,0) NOT NULL,
  PRIMARY KEY (`minimo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valores`
--

LOCK TABLES `valores` WRITE;
/*!40000 ALTER TABLE `valores` DISABLE KEYS */;
/*!40000 ALTER TABLE `valores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `valores-paciente`
--

DROP TABLE IF EXISTS `valores-paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `valores-paciente` (
  `Peso` float NOT NULL AUTO_INCREMENT,
  `Estatura` float NOT NULL,
  `ind_masa_M` float NOT NULL,
  `albumina_serica` float NOT NULL,
  `transferrina_serica` float NOT NULL,
  `linfocitos` float NOT NULL,
  `ihr` float NOT NULL,
  `id_paciente` text COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`Peso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valores-paciente`
--

LOCK TABLES `valores-paciente` WRITE;
/*!40000 ALTER TABLE `valores-paciente` DISABLE KEYS */;
/*!40000 ALTER TABLE `valores-paciente` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-23 14:35:32
