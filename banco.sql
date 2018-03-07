CREATE DATABASE  IF NOT EXISTS `banco-zfg` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `banco-zfg`;
-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: banco-zfg
-- ------------------------------------------------------
-- Server version	5.7.18-1

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
-- Table structure for table `clientes_empresas`
--

DROP TABLE IF EXISTS `clientes_empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes_empresas` (
  `id_cliente_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cliente_empresa` varchar(45) DEFAULT NULL,
  `logo_cliente_empresal` varchar(150) DEFAULT NULL,
  `link_cliente_empresa` varchar(150) DEFAULT NULL,
  `data_registro_cliente_empresa` date DEFAULT NULL,
  PRIMARY KEY (`id_cliente_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes_empresas`
--

LOCK TABLES `clientes_empresas` WRITE;
/*!40000 ALTER TABLE `clientes_empresas` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes_empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `destaques_noticias`
--

DROP TABLE IF EXISTS `destaques_noticias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `destaques_noticias` (
  `id_destaque_noticia` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_destaque_noticia` varchar(45) NOT NULL,
  `desc_destaque_noticia` longtext NOT NULL,
  `autor_destaque_noticia` varchar(45) NOT NULL,
  `fonte_destaque_noticia` varchar(45) NOT NULL,
  `data_destaque_noticia` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `capa_destaques_noticia` varchar(150) NOT NULL,
  `fotos_destaque_noticias_id` int(11) NOT NULL,
  PRIMARY KEY (`id_destaque_noticia`,`fotos_destaque_noticias_id`),
  KEY `fk_destaques_noticias_fotos_destaque_noticias1_idx` (`fotos_destaque_noticias_id`),
  CONSTRAINT `fk_destaques_noticias_fotos_destaque_noticias1` FOREIGN KEY (`fotos_destaque_noticias_id`) REFERENCES `fotos_destaque_noticias` (`id_fotos_destaque_noticias`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `destaques_noticias`
--

LOCK TABLES `destaques_noticias` WRITE;
/*!40000 ALTER TABLE `destaques_noticias` DISABLE KEYS */;
/*!40000 ALTER TABLE `destaques_noticias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ficheiro_jornal`
--

DROP TABLE IF EXISTS `ficheiro_jornal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ficheiro_jornal` (
  `id_ficheiro_jornal` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_ficheiro_jornal` varchar(45) NOT NULL,
  PRIMARY KEY (`id_ficheiro_jornal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ficheiro_jornal`
--

LOCK TABLES `ficheiro_jornal` WRITE;
/*!40000 ALTER TABLE `ficheiro_jornal` DISABLE KEYS */;
/*!40000 ALTER TABLE `ficheiro_jornal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fotos`
--

DROP TABLE IF EXISTS `fotos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fotos` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_foto` varchar(45) NOT NULL,
  `fotos_albuns_id` int(11) NOT NULL,
  PRIMARY KEY (`id_foto`,`fotos_albuns_id`),
  KEY `fk_fotos_fotos_albuns1_idx` (`fotos_albuns_id`),
  CONSTRAINT `fk_fotos_fotos_albuns1` FOREIGN KEY (`fotos_albuns_id`) REFERENCES `fotos_albuns` (`id_fto_albuns`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotos`
--

LOCK TABLES `fotos` WRITE;
/*!40000 ALTER TABLE `fotos` DISABLE KEYS */;
/*!40000 ALTER TABLE `fotos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fotos_albuns`
--

DROP TABLE IF EXISTS `fotos_albuns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fotos_albuns` (
  `id_fto_albuns` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_fto_albuns` varchar(45) NOT NULL,
  `data_fto_albuns` timestamp NULL DEFAULT NULL,
  `thumb_fto_albuns` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_fto_albuns`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotos_albuns`
--

LOCK TABLES `fotos_albuns` WRITE;
/*!40000 ALTER TABLE `fotos_albuns` DISABLE KEYS */;
/*!40000 ALTER TABLE `fotos_albuns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fotos_destaque_noticias`
--

DROP TABLE IF EXISTS `fotos_destaque_noticias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fotos_destaque_noticias` (
  `id_fotos_destaque_noticias` int(11) NOT NULL AUTO_INCREMENT,
  `destaque_noticia_id` int(11) NOT NULL,
  `name_fotos_destaque_noticias` varchar(150) NOT NULL,
  PRIMARY KEY (`id_fotos_destaque_noticias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotos_destaque_noticias`
--

LOCK TABLES `fotos_destaque_noticias` WRITE;
/*!40000 ALTER TABLE `fotos_destaque_noticias` DISABLE KEYS */;
/*!40000 ALTER TABLE `fotos_destaque_noticias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fotos_noticias`
--

DROP TABLE IF EXISTS `fotos_noticias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fotos_noticias` (
  `id_foto_noticia` int(11) NOT NULL AUTO_INCREMENT,
  `noticia_id` int(11) NOT NULL,
  `name_foto_noticia` varchar(150) NOT NULL,
  PRIMARY KEY (`id_foto_noticia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotos_noticias`
--

LOCK TABLES `fotos_noticias` WRITE;
/*!40000 ALTER TABLE `fotos_noticias` DISABLE KEYS */;
/*!40000 ALTER TABLE `fotos_noticias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grup_permissao`
--

DROP TABLE IF EXISTS `grup_permissao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grup_permissao` (
  `id_grup_permissao` int(11) NOT NULL AUTO_INCREMENT,
  `nome_grup_permissao` varchar(50) NOT NULL,
  `params_grup_permissao` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_grup_permissao`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grup_permissao`
--

LOCK TABLES `grup_permissao` WRITE;
/*!40000 ALTER TABLE `grup_permissao` DISABLE KEYS */;
INSERT INTO `grup_permissao` VALUES (1,'AdminDesenvolvedor','1,2,3,7'),(2,'testadores','1'),(3,'teste','3');
/*!40000 ALTER TABLE `grup_permissao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jornal`
--

DROP TABLE IF EXISTS `jornal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jornal` (
  `id_jornal` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_jornal` varchar(45) NOT NULL,
  `ficheiro_jornal_id` int(11) NOT NULL,
  PRIMARY KEY (`id_jornal`,`ficheiro_jornal_id`),
  KEY `fk_jornal_ficheiro_jornal1_idx` (`ficheiro_jornal_id`),
  CONSTRAINT `fk_jornal_ficheiro_jornal1` FOREIGN KEY (`ficheiro_jornal_id`) REFERENCES `ficheiro_jornal` (`id_ficheiro_jornal`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jornal`
--

LOCK TABLES `jornal` WRITE;
/*!40000 ALTER TABLE `jornal` DISABLE KEYS */;
/*!40000 ALTER TABLE `jornal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensagens`
--

DROP TABLE IF EXISTS `mensagens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mensagens` (
  `id_mensagens` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_mensageml` varchar(45) NOT NULL,
  `descricao_mensagem` text NOT NULL,
  `autor_mensagem` varchar(45) NOT NULL,
  `fonte_mensagem` varchar(45) NOT NULL,
  `data_mensagem` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_mensagens`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensagens`
--

LOCK TABLES `mensagens` WRITE;
/*!40000 ALTER TABLE `mensagens` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensagens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `noticias`
--

DROP TABLE IF EXISTS `noticias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `noticias` (
  `id_noticia` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_noticia` varchar(50) NOT NULL,
  `capa_noticia` varchar(45) NOT NULL,
  `descricao_noticia` longtext NOT NULL,
  `autor_noticia` varchar(45) NOT NULL,
  `fonte_noticia` varchar(45) NOT NULL,
  `data_noticia` timestamp NULL DEFAULT NULL,
  `fotos_noticias_id_foto_noticia` int(11) NOT NULL,
  PRIMARY KEY (`id_noticia`,`fotos_noticias_id_foto_noticia`),
  KEY `fk_noticias_fotos_noticias1_idx` (`fotos_noticias_id_foto_noticia`),
  CONSTRAINT `fk_noticias_fotos_noticias1` FOREIGN KEY (`fotos_noticias_id_foto_noticia`) REFERENCES `fotos_noticias` (`id_foto_noticia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noticias`
--

LOCK TABLES `noticias` WRITE;
/*!40000 ALTER TABLE `noticias` DISABLE KEYS */;
/*!40000 ALTER TABLE `noticias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `param_permissao`
--

DROP TABLE IF EXISTS `param_permissao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `param_permissao` (
  `id_param_permissao` int(11) NOT NULL AUTO_INCREMENT,
  `nome_param_permissao` varchar(50) NOT NULL,
  PRIMARY KEY (`id_param_permissao`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `param_permissao`
--

LOCK TABLES `param_permissao` WRITE;
/*!40000 ALTER TABLE `param_permissao` DISABLE KEYS */;
INSERT INTO `param_permissao` VALUES (1,'logout'),(2,'permissions_view'),(3,'permissions_grups_list'),(7,'users_view');
/*!40000 ALTER TABLE `param_permissao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tokens_users`
--

DROP TABLE IF EXISTS `tokens_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tokens_users` (
  `id_token_user` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(45) NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `expirado_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_token_user`,`id_user`),
  KEY `fk_tokens_user_users1_idx` (`id_user`),
  CONSTRAINT `fk_tokens_user_users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tokens_users`
--

LOCK TABLES `tokens_users` WRITE;
/*!40000 ALTER TABLE `tokens_users` DISABLE KEYS */;
INSERT INTO `tokens_users` VALUES (8,'7e5b13f1b91f27e27d775fb35bfd2e21',0,'2018-04-06 19:37:00',1),(9,'08e55d38df20c3a06ba1859302fadc3d',0,'2018-04-06 19:40:00',1),(10,'2476dca1c47a56c23bf3a3d4c8d9f0f8',0,'2018-04-06 19:41:00',1);
/*!40000 ALTER TABLE `tokens_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nome_user` varchar(150) NOT NULL,
  `sobrenome_user` varchar(150) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `pass_user` varchar(150) NOT NULL,
  `registro_user` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `foto_user` varchar(150) DEFAULT NULL,
  `id_grup_permissao` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Francisco','Carlos','franc@gmail.com','$2y$10$6To/SbFMQCZXt.FdNwc.puUDf1nW/iY14iRtDKvv3X.0eszl6zegu','2018-02-25 23:23:38',NULL,1),(3,'Admin','Dev','admin@dev.com.br','$2y$10$dLF4tN/LLMQPNoTuLadXr.4bvRcB93veg/gHjMYGqOyvWlU6q7.ji','2018-03-01 23:18:41',NULL,1),(5,'Lauren','Lopes','lalau@gmail.com','$2y$10$MTsY9.RmhNrQtWy5lDliROK2UV6aP/nK1sFv9Ei1uNWadQJzE0uci','2018-03-04 02:43:53',NULL,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videos` (
  `id_video` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_video` varchar(45) NOT NULL,
  `thumb_video` varchar(150) DEFAULT NULL,
  `descricao_video` varchar(150) NOT NULL,
  `videos_albuns_id` int(11) NOT NULL,
  PRIMARY KEY (`id_video`,`videos_albuns_id`),
  KEY `fk_videos_videos_albuns1_idx` (`videos_albuns_id`),
  CONSTRAINT `fk_videos_videos_albuns1` FOREIGN KEY (`videos_albuns_id`) REFERENCES `videos_albuns` (`id_vid_albuns`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos_albuns`
--

DROP TABLE IF EXISTS `videos_albuns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videos_albuns` (
  `id_vid_albuns` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_vid_albuns` varchar(45) NOT NULL,
  `data_vid_albuns` timestamp NULL DEFAULT NULL,
  `thumb_vid_albuns` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_vid_albuns`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos_albuns`
--

LOCK TABLES `videos_albuns` WRITE;
/*!40000 ALTER TABLE `videos_albuns` DISABLE KEYS */;
/*!40000 ALTER TABLE `videos_albuns` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-07 12:24:39
