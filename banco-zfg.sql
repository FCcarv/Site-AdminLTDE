-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 14-Maio-2018 às 12:33
-- Versão do servidor: 5.7.18-1
-- PHP Version: 7.0.20-2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banco-zfg`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `parent_categoria` int(11) DEFAULT NULL,
  `title_categoria` varchar(255) DEFAULT NULL,
  `content_categoria` text,
  `date_categoria` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `slug_categoria` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `parent_categoria`, `title_categoria`, `content_categoria`, `date_categoria`, `slug_categoria`) VALUES
(3, NULL, 'PHP-videoaulas', 'conteudo php', '2018-04-07 11:47:32', 'php-videoaulas'),
(4, NULL, 'PHP 7 e suas novidades', 'Conteúdo atualizado de PHP entre outras linguagens de backend.', '2018-04-05 00:11:05', 'php-7-e-suas-novidades'),
(9, NULL, 'Redes Sociais ', 'Assuntos como sociais e redes sociais como facebook  .', '2018-04-07 11:58:11', 'redes-sociais'),
(10, 3, 'Novidades do PHP 7', 'Todos as seguintes novidades.', '2018-04-07 11:47:50', 'novidades-do-php-7'),
(11, 23, 'Pintura em tela.', 'Como se faz uma excelente pintura em tela.', '2018-04-07 11:57:25', 'pintura-em-tela'),
(16, 9, 'Instagram e Google plus', 'Coloque suas fotos ao alcance dos seus amigos e curta junto com eles.', '2018-04-07 11:46:49', 'instagram-e-google-plus'),
(23, NULL, 'Artesanatos', 'Pessoas que fazem esse trabalho são verdadeiros artistas. ', '2018-04-07 11:50:48', 'artesanatos'),
(25, 4, 'array', 'dados e grande quantidadees', '2018-04-06 14:08:30', 'array');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes_empresas`
--

CREATE TABLE `clientes_empresas` (
  `id_cliente_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cliente_empresa` varchar(45) DEFAULT NULL,
  `logo_cliente_empresal` varchar(150) DEFAULT NULL,
  `link_cliente_empresa` varchar(150) DEFAULT NULL,
  `data_registro_cliente_empresa` date DEFAULT NULL,
  PRIMARY KEY (`id_cliente_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `destaques_noticias`
--

CREATE TABLE `destaques_noticias` (
  `id_destaque_noticia` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_destaque_noticia` varchar(45) NOT NULL,
  `desc_destaque_noticia` longtext NOT NULL,
  `autor_destaque_noticia` varchar(45) NOT NULL,
  `fonte_destaque_noticia` varchar(45) NOT NULL,
  `data_destaque_noticia` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `capa_destaques_noticia` varchar(150) NOT NULL,
  `fotos_destaque_noticias_id` int(11) NOT NULL,
  PRIMARY KEY (`id_destaque_noticia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ficheiro_jornal`
--

CREATE TABLE `ficheiro_jornal` (
  `id_ficheiro_jornal` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_ficheiro_jornal` varchar(45) NOT NULL,
  PRIMARY KEY (`id_ficheiro_jornal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos`
--

CREATE TABLE `fotos` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_foto` varchar(45) NOT NULL,
  `fotos_albuns_id` int(11) NOT NULL,
  PRIMARY KEY (`id_foto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos_albuns`
--

CREATE TABLE `fotos_albuns` (
  `id_fto_albuns` int(11) NOT NULL,
  `titulo_fto_albuns` varchar(45) NOT NULL,
  `data_fto_albuns` timestamp NULL DEFAULT NULL,
  `thumb_fto_albuns` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos_destaque_noticias`
--

CREATE TABLE `fotos_destaque_noticias` (
  `id_fotos_destaque_noticias` int(11) NOT NULL,
  `destaque_noticia_id` int(11) NOT NULL,
  `name_fotos_destaque_noticias` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos_noticias`
--

CREATE TABLE `fotos_noticias` (
  `id_foto_noticia` int(11) NOT NULL,
  `noticia_id` int(11) NOT NULL,
  `name_foto_noticia` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `grup_permissao`
--

CREATE TABLE `grup_permissao` (
  `id_grup_permissao` int(11) NOT NULL,
  `nome_grup_permissao` varchar(50) NOT NULL,
  `params_grup_permissao` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `grup_permissao`
--

INSERT INTO `grup_permissao` (`id_grup_permissao`, `nome_grup_permissao`, `params_grup_permissao`) VALUES
(1, 'AdminDesenvolvedor', '1,2,3,7,8,9,10,11,14,15,16,17,18,19,20'),
(2, 'Administradores', '1,7,8,9'),
(3, 'Diretores', '1,8,9'),
(4, 'Editores', '1,8,9');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jornal`
--

CREATE TABLE `jornalRegional` (
  `id_jornal` int(11) NOT NULL,
  `titulo_jornal` varchar(45) NOT NULL,
  `link_jornal` varchar(45) NOT NULL,
  `dataReg_jornal` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `id_mensagens` int(11) NOT NULL,
  `titulo_mensageml` varchar(45) NOT NULL,
  `descricao_mensagem` text NOT NULL,
  `autor_mensagem` varchar(45) NOT NULL,
  `fonte_mensagem` varchar(45) NOT NULL,
  `data_mensagem` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(11) NOT NULL,
  `titulo_noticia` varchar(50) NOT NULL,
  `capa_noticia` varchar(45) NOT NULL,
  `descricao_noticia` longtext NOT NULL,
  `autor_noticia` varchar(45) NOT NULL,
  `fonte_noticia` varchar(45) NOT NULL,
  `data_noticia` timestamp NULL DEFAULT NULL,
  `fotos_noticias_id_foto_noticia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `param_permissao`
--

CREATE TABLE `param_permissao` (
  `id_param_permissao` int(11) NOT NULL,
  `nome_param_permissao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `param_permissao`
--

INSERT INTO `param_permissao` (`id_param_permissao`, `nome_param_permissao`) VALUES
(1, 'logout'),
(2, 'permissions_view'),
(3, 'permissions_grups_list'),
(7, 'users_view'),
(8, 'users_edit'),
(9, 'users_perfil'),
(10, 'category_view'),
(11, 'add_category_view'),
(14, 'sub_category_view'),
(15, 'edit_category_view'),
(16, 'del_category_view'),
(17, 'posts_view'),
(18, 'add_posts_view'),
(19, 'posts_edit_view'),
(20, 'posts_del_view');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id_post` int(11) NOT NULL,
  `title_post` varchar(255) DEFAULT NULL,
  `subtitle_post` varchar(255) NOT NULL,
  `content_post` longtext,
  `categoria_post` int(11) DEFAULT NULL,
  `cat_parent_post` int(11) DEFAULT NULL,
  `type_post` varchar(255) DEFAULT NULL,
  `cover_post` varchar(255) DEFAULT NULL,
  `autor_post` varchar(255) DEFAULT NULL,
  `permissao_post` int(11) NOT NULL,
  `views_post` decimal(10,0) DEFAULT '0',
  `last_views_post` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status_post` int(11) DEFAULT NULL,
  `date_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `slug_post` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts_gallery`
--

CREATE TABLE `posts_gallery` (
  `id_post` int(11) DEFAULT NULL,
  `id_gallery` int(11) NOT NULL,
  `image_gallery` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `date_gallery` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `siteviews`
--

CREATE TABLE `siteviews` (
  `id_siteviews` int(11) NOT NULL,
  `date_siteviews` date NOT NULL,
  `users_siteviews` decimal(10,0) NOT NULL,
  `views_siteviews` decimal(10,0) NOT NULL,
  `pages_siteviews` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `siteviews_agent`
--

CREATE TABLE `siteviews_agent` (
  `id_agent` int(11) NOT NULL,
  `name_agent` varchar(255) CHARACTER SET latin1 NOT NULL,
  `views_agent` decimal(10,0) NOT NULL,
  `lastview_agent` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `siteviews_online`
--

CREATE TABLE `siteviews_online` (
  `id_online` int(11) NOT NULL,
  `session_online` varchar(255) CHARACTER SET latin1 NOT NULL,
  `startview_online` timestamp NULL DEFAULT NULL,
  `endview_online` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `ip_online` varchar(255) CHARACTER SET latin1 NOT NULL,
  `url_online` varchar(255) CHARACTER SET latin1 NOT NULL,
  `agent_online` varchar(255) CHARACTER SET latin1 NOT NULL,
  `name_agent` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tokens_users`
--

CREATE TABLE `tokens_users` (
  `id_token_user` int(11) NOT NULL,
  `hash` varchar(45) NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `expirado_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tokens_users`
--

INSERT INTO `tokens_users` (`id_token_user`, `hash`, `used`, `expirado_em`, `id_user`) VALUES
(65, 'f0813d891c67aff40696eeaf3fdb624e', 0, '2018-04-09 00:29:00', 6),
(66, '273931945fdd9641996ed9f74856a1e9', 0, '2018-04-09 00:29:00', 6),
(67, '50744027a6f6eeb1e62f0025472b947a', 0, '2018-04-09 01:17:00', 6),
(68, '255784fd89c45d97c063b5dc46dacd45', 0, '2018-04-09 01:51:00', 6),
(69, 'f9478475f2c04c1d95faa93d9ac0654c', 0, '2018-04-09 14:29:00', 6),
(70, '604a4fcd0c68ccfedefa3156431e8100', 1, '2018-03-09 14:43:31', 6),
(71, 'c090db166e9f7a6be583c8dc632e78d3', 1, '2018-03-09 16:59:38', 6),
(72, 'ed50340da9d93a14a963ef712534ce90', 1, '2018-03-09 17:11:09', 6),
(73, '7e777de243f19a24ac946920d1e44d87', 0, '2018-05-07 10:42:00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nome_user` varchar(150) NOT NULL,
  `sobrenome_user` varchar(150) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `pass_user` varchar(150) NOT NULL,
  `registro_user` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `foto_user` varchar(150) DEFAULT NULL,
  `id_grup_permissao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id_user`, `nome_user`, `sobrenome_user`, `email_user`, `pass_user`, `registro_user`, `foto_user`, `id_grup_permissao`) VALUES
(1, 'Admin', 'LTE', 'adminLTE@gmail.com', '$2y$10$6To/SbFMQCZXt.FdNwc.puUDf1nW/iY14iRtDKvv3X.0eszl6zegu', '2018-05-14 15:32:23', '7820eaa5321e7d0a918ac9d18e4a783f.jpg', 1),
(6, 'Admin', 'Develop', 'webmaster.frcarlos@gmail.com', '$2y$10$ncX3lORlGMQBt9a0eSxzC.LlTL0O/GeVakgbEVlZO3uayHLAJonHW', '2018-03-16 03:51:58', 'ca6bdd3b7b708e23c9c0614714ce1ad7.jpg', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `videos`
--

CREATE TABLE `videos` (
  `id_video` int(11) NOT NULL,
  `titulo_video` varchar(45) NOT NULL,
  `thumb_video` varchar(150) DEFAULT NULL,
  `descricao_video` varchar(150) NOT NULL,
  `videos_albuns_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `videos_albuns`
--

CREATE TABLE `videos_albuns` (
  `id_vid_albuns` int(11) NOT NULL,
  `titulo_vid_albuns` varchar(45) NOT NULL,
  `data_vid_albuns` timestamp NULL DEFAULT NULL,
  `thumb_vid_albuns` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `clientes_empresas`
--
ALTER TABLE `clientes_empresas`
  ADD PRIMARY KEY (`id_cliente_empresa`);

--
-- Indexes for table `destaques_noticias`
--
ALTER TABLE `destaques_noticias`
  ADD PRIMARY KEY (`id_destaque_noticia`,`fotos_destaque_noticias_id`),
  ADD KEY `fk_destaques_noticias_fotos_destaque_noticias1_idx` (`fotos_destaque_noticias_id`);

--
-- Indexes for table `ficheiro_jornal`
--
ALTER TABLE `ficheiro_jornal`
  ADD PRIMARY KEY (`id_ficheiro_jornal`);

--
-- Indexes for table `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id_foto`,`fotos_albuns_id`),
  ADD KEY `fk_fotos_fotos_albuns1_idx` (`fotos_albuns_id`);

--
-- Indexes for table `fotos_albuns`
--
ALTER TABLE `fotos_albuns`
  ADD PRIMARY KEY (`id_fto_albuns`);

--
-- Indexes for table `fotos_destaque_noticias`
--
ALTER TABLE `fotos_destaque_noticias`
  ADD PRIMARY KEY (`id_fotos_destaque_noticias`);

--
-- Indexes for table `fotos_noticias`
--
ALTER TABLE `fotos_noticias`
  ADD PRIMARY KEY (`id_foto_noticia`);

--
-- Indexes for table `grup_permissao`
--
ALTER TABLE `grup_permissao`
  ADD PRIMARY KEY (`id_grup_permissao`);

--
-- Indexes for table `jornal`
--
ALTER TABLE `jornal`
  ADD PRIMARY KEY (`id_jornal`,`ficheiro_jornal_id`),
  ADD KEY `fk_jornal_ficheiro_jornal1_idx` (`ficheiro_jornal_id`);

--
-- Indexes for table `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id_mensagens`);

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`,`fotos_noticias_id_foto_noticia`),
  ADD KEY `fk_noticias_fotos_noticias1_idx` (`fotos_noticias_id_foto_noticia`);

--
-- Indexes for table `param_permissao`
--
ALTER TABLE `param_permissao`
  ADD PRIMARY KEY (`id_param_permissao`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `posts_gallery`
--
ALTER TABLE `posts_gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `siteviews`
--
ALTER TABLE `siteviews`
  ADD PRIMARY KEY (`id_siteviews`),
  ADD KEY `idx_1` (`date_siteviews`);

--
-- Indexes for table `siteviews_agent`
--
ALTER TABLE `siteviews_agent`
  ADD PRIMARY KEY (`id_agent`),
  ADD KEY `idx_1` (`name_agent`);

--
-- Indexes for table `siteviews_online`
--
ALTER TABLE `siteviews_online`
  ADD PRIMARY KEY (`id_online`);

--
-- Indexes for table `tokens_users`
--
ALTER TABLE `tokens_users`
  ADD PRIMARY KEY (`id_token_user`,`id_user`),
  ADD KEY `fk_tokens_user_users1_idx` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id_video`,`videos_albuns_id`),
  ADD KEY `fk_videos_videos_albuns1_idx` (`videos_albuns_id`);

--
-- Indexes for table `videos_albuns`
--
ALTER TABLE `videos_albuns`
  ADD PRIMARY KEY (`id_vid_albuns`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `clientes_empresas`
--
ALTER TABLE `clientes_empresas`
  MODIFY `id_cliente_empresa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `destaques_noticias`
--
ALTER TABLE `destaques_noticias`
  MODIFY `id_destaque_noticia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ficheiro_jornal`
--
ALTER TABLE `ficheiro_jornal`
  MODIFY `id_ficheiro_jornal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fotos_albuns`
--
ALTER TABLE `fotos_albuns`
  MODIFY `id_fto_albuns` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fotos_destaque_noticias`
--
ALTER TABLE `fotos_destaque_noticias`
  MODIFY `id_fotos_destaque_noticias` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fotos_noticias`
--
ALTER TABLE `fotos_noticias`
  MODIFY `id_foto_noticia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grup_permissao`
--
ALTER TABLE `grup_permissao`
  MODIFY `id_grup_permissao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jornal`
--
ALTER TABLE `jornal`
  MODIFY `id_jornal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id_mensagens` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `param_permissao`
--
ALTER TABLE `param_permissao`
  MODIFY `id_param_permissao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `posts_gallery`
--
ALTER TABLE `posts_gallery`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
--
-- AUTO_INCREMENT for table `siteviews`
--
ALTER TABLE `siteviews`
  MODIFY `id_siteviews` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `siteviews_agent`
--
ALTER TABLE `siteviews_agent`
  MODIFY `id_agent` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `siteviews_online`
--
ALTER TABLE `siteviews_online`
  MODIFY `id_online` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tokens_users`
--
ALTER TABLE `tokens_users`
  MODIFY `id_token_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `videos_albuns`
--
ALTER TABLE `videos_albuns`
  MODIFY `id_vid_albuns` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `destaques_noticias`
--
ALTER TABLE `destaques_noticias`
  ADD CONSTRAINT `fk_destaques_noticias_fotos_destaque_noticias1` FOREIGN KEY (`fotos_destaque_noticias_id`) REFERENCES `fotos_destaque_noticias` (`id_fotos_destaque_noticias`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fk_fotos_fotos_albuns1` FOREIGN KEY (`fotos_albuns_id`) REFERENCES `fotos_albuns` (`id_fto_albuns`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `jornal`
--
ALTER TABLE `jornal`
  ADD CONSTRAINT `fk_jornal_ficheiro_jornal1` FOREIGN KEY (`ficheiro_jornal_id`) REFERENCES `ficheiro_jornal` (`id_ficheiro_jornal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `fk_noticias_fotos_noticias1` FOREIGN KEY (`fotos_noticias_id_foto_noticia`) REFERENCES `fotos_noticias` (`id_foto_noticia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tokens_users`
--
ALTER TABLE `tokens_users`
  ADD CONSTRAINT `fk_tokens_user_users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `fk_videos_videos_albuns1` FOREIGN KEY (`videos_albuns_id`) REFERENCES `videos_albuns` (`id_vid_albuns`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
