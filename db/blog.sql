-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2016 a las 22:25:43
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `author`
--

INSERT INTO `author` (`id`, `username`, `email`, `password`, `first_name`, `last_name`) VALUES
(1, 'harry', 'harry.popotes@example.com.mx', '827ccb0eea8a706c4c34a16891f84e7b', 'harry', 'popotes'),
(2, 'leonel', 'leonel.lopez@webstage.com.mx', '827ccb0eea8a706c4c34a16891f84e7b', '', ''),
(3, 'leonel', 'leonel.lopez@webstage.com.mx', '827ccb0eea8a706c4c34a16891f84e7b', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(4) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `is_reply_to_id` int(11) NOT NULL DEFAULT '0',
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `mark_read` tinyint(4) NOT NULL DEFAULT '0',
  `enabled` tinyint(4) NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`post_id`,`user_id`),
  KEY `fk_comment_user1_idx` (`user_id`),
  KEY `fk_comment_post1_idx` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opcion`
--

DROP TABLE IF EXISTS `opcion`;
CREATE TABLE IF NOT EXISTS `opcion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `opcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `opcion_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `opcion`
--

INSERT INTO `opcion` (`id`, `opcion`, `enabled`, `opcion_id`) VALUES
(3, 'Post', 1, 0),
(4, 'Autores', 1, 0),
(5, 'Categorias', 1, 0),
(6, 'Todos los Post', 1, 3),
(7, 'Todas las Categorias', 1, 5),
(8, 'Todos los Autores', 1, 4),
(9, 'Nuevo Autor', 1, 4),
(10, 'Nuevo Post', 1, 3),
(11, 'Nueva Categoria', 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `article` text COLLATE utf8_unicode_ci NOT NULL,
  `title_clean` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `date_publish` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `banner_image` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT '0',
  `enabled` tinyint(4) NOT NULL DEFAULT '1',
  `comments_enabled` tinyint(4) NOT NULL DEFAULT '1',
  `views` int(11) NOT NULL,
  PRIMARY KEY (`id`,`author_id`),
  KEY `fk_post_author1_idx` (`author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post_category`
--

DROP TABLE IF EXISTS `post_category`;
CREATE TABLE IF NOT EXISTS `post_category` (
  `category_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`category_id`,`post_id`),
  KEY `fk_category_has_post_post1_idx` (`post_id`),
  KEY `fk_category_has_post_category_idx` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `related`
--

DROP TABLE IF EXISTS `related`;
CREATE TABLE IF NOT EXISTS `related` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`post_id`),
  KEY `fk_related_post1_idx` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `tag` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `tag_clean` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`,`post_id`),
  KEY `fk_tag_post1_idx` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_post1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comment_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_author1` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `post_category`
--
ALTER TABLE `post_category`
  ADD CONSTRAINT `fk_category_has_post_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_category_has_post_post1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `related`
--
ALTER TABLE `related`
  ADD CONSTRAINT `fk_related_post1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tag`
--
ALTER TABLE `tag`
  ADD CONSTRAINT `fk_tag_post1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
