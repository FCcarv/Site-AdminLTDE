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
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `parent_categoria` varchar(100) DEFAULT NULL,
  `title_categoria` varchar(255) DEFAULT NULL,
  `content_categoria` text,
  `date_categoria` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `views_categoria` decimal(10,0) DEFAULT NULL,
  `last_view_categoria` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `slug_categoria` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'null','video aulas','Conteudo video aulas','2018-03-28 17:10:53',NULL,NULL,'video-aulas'),(2,'null','Conteúdo  Artesanatos','Artesanatos e outros trabalhos manuais.','2018-03-28 17:12:36',NULL,NULL,'conteudo-artesanatos');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grup_permissao`
--

LOCK TABLES `grup_permissao` WRITE;
/*!40000 ALTER TABLE `grup_permissao` DISABLE KEYS */;
INSERT INTO `grup_permissao` VALUES (1,'AdminDesenvolvedor','1,2,3,7,8,9,10,11,14'),(2,'Administradores','1,7,8,9'),(3,'Diretores','1,8,9'),(4,'Editores','1,8,9');
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `param_permissao`
--

LOCK TABLES `param_permissao` WRITE;
/*!40000 ALTER TABLE `param_permissao` DISABLE KEYS */;
INSERT INTO `param_permissao` VALUES (1,'logout'),(2,'permissions_view'),(3,'permissions_grups_list'),(7,'users_view'),(8,'users_edit'),(9,'users_perfil'),(10,'category_view'),(11,'add_category_view'),(14,'sub_category_view');
/*!40000 ALTER TABLE `param_permissao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `name_post` varchar(255) DEFAULT NULL,
  `title_post` varchar(255) DEFAULT NULL,
  `content_post` longtext,
  `cover_post` varchar(255) DEFAULT NULL,
  `date_post` timestamp NULL DEFAULT NULL,
  `autor_post` int(11) DEFAULT NULL,
  `categoria_post` int(11) DEFAULT NULL,
  `cat_parent_post` int(11) DEFAULT NULL,
  `views_post` decimal(10,0) DEFAULT '0',
  `last_views_post` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status_post` int(11) DEFAULT NULL,
  `type_post` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts_gallery`
--

DROP TABLE IF EXISTS `posts_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts_gallery` (
  `id_post` int(11) DEFAULT NULL,
  `id_gallery` int(11) NOT NULL AUTO_INCREMENT,
  `image_gallery` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `date_gallery` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_gallery`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts_gallery`
--

LOCK TABLES `posts_gallery` WRITE;
/*!40000 ALTER TABLE `posts_gallery` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts_gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siteviews`
--

DROP TABLE IF EXISTS `siteviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `siteviews` (
  `id_siteviews` int(11) NOT NULL AUTO_INCREMENT,
  `date_siteviews` date NOT NULL,
  `users_siteviews` decimal(10,0) NOT NULL,
  `views_siteviews` decimal(10,0) NOT NULL,
  `pages_siteviews` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id_siteviews`),
  KEY `idx_1` (`date_siteviews`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siteviews`
--

LOCK TABLES `siteviews` WRITE;
/*!40000 ALTER TABLE `siteviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `siteviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siteviews_agent`
--

DROP TABLE IF EXISTS `siteviews_agent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `siteviews_agent` (
  `id_agent` int(11) NOT NULL AUTO_INCREMENT,
  `name_agent` varchar(255) CHARACTER SET latin1 NOT NULL,
  `views_agent` decimal(10,0) NOT NULL,
  `lastview_agent` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_agent`),
  KEY `idx_1` (`name_agent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siteviews_agent`
--

LOCK TABLES `siteviews_agent` WRITE;
/*!40000 ALTER TABLE `siteviews_agent` DISABLE KEYS */;
/*!40000 ALTER TABLE `siteviews_agent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siteviews_online`
--

DROP TABLE IF EXISTS `siteviews_online`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `siteviews_online` (
  `id_online` int(11) NOT NULL AUTO_INCREMENT,
  `session_online` varchar(255) CHARACTER SET latin1 NOT NULL,
  `startview_online` timestamp NULL DEFAULT NULL,
  `endview_online` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `ip_online` varchar(255) CHARACTER SET latin1 NOT NULL,
  `url_online` varchar(255) CHARACTER SET latin1 NOT NULL,
  `agent_online` varchar(255) CHARACTER SET latin1 NOT NULL,
  `name_agent` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_online`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siteviews_online`
--

LOCK TABLES `siteviews_online` WRITE;
/*!40000 ALTER TABLE `siteviews_online` DISABLE KEYS */;
/*!40000 ALTER TABLE `siteviews_online` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tokens_users`
--

LOCK TABLES `tokens_users` WRITE;
/*!40000 ALTER TABLE `tokens_users` DISABLE KEYS */;
INSERT INTO `tokens_users` VALUES (65,'f0813d891c67aff40696eeaf3fdb624e',0,'2018-04-09 00:29:00',6),(66,'273931945fdd9641996ed9f74856a1e9',0,'2018-04-09 00:29:00',6),(67,'50744027a6f6eeb1e62f0025472b947a',0,'2018-04-09 01:17:00',6),(68,'255784fd89c45d97c063b5dc46dacd45',0,'2018-04-09 01:51:00',6),(69,'f9478475f2c04c1d95faa93d9ac0654c',0,'2018-04-09 14:29:00',6),(70,'604a4fcd0c68ccfedefa3156431e8100',1,'2018-03-09 14:43:31',6),(71,'c090db166e9f7a6be583c8dc632e78d3',1,'2018-03-09 16:59:38',6),(72,'ed50340da9d93a14a963ef712534ce90',1,'2018-03-09 17:11:09',6);
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Francisco','Carlos ','franc@gmail.com','$2y$10$6To/SbFMQCZXt.FdNwc.puUDf1nW/iY14iRtDKvv3X.0eszl6zegu','2018-03-19 22:04:52','7820eaa5321e7d0a918ac9d18e4a783f.jpg',1),(6,'Admin','Develop','webmaster.frcarlos@gmail.com','$2y$10$ncX3lORlGMQBt9a0eSxzC.LlTL0O/GeVakgbEVlZO3uayHLAJonHW','2018-03-16 03:51:58','ca6bdd3b7b708e23c9c0614714ce1ad7.jpg',1),(7,'Luara l','Letícia','lu@gmail.com','$2y$10$vZbZvI.006uxDmkDGc49v.iSbnYXmnX7OkMkLDzbqZecNNV/hJPT2','2018-03-19 18:08:57','fabdd477e1a0dd0e369a233972f54d05.jpg',4);
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

-- Dump completed on 2018-04-01 17:41:56
