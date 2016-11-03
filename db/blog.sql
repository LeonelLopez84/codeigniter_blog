SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `blog` ;
CREATE SCHEMA IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `blog` ;

-- -----------------------------------------------------
-- Table `blog`.`author`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`author` ;

CREATE  TABLE IF NOT EXISTS `blog`.`author` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(100) NOT NULL ,
  `password` VARCHAR(255) NOT NULL ,
  `first_name` VARCHAR(45) NOT NULL ,
  `last_name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blog`.`post`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`post` ;

CREATE  TABLE IF NOT EXISTS `blog`.`post` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(45) NOT NULL ,
  `article` TEXT NOT NULL ,
  `title_clean` VARCHAR(45) NOT NULL ,
  `file` VARCHAR(255) NOT NULL ,
  `author_id` INT NOT NULL ,
  `date_publish` TIMESTAMP NOT NULL ,
  `banner_image` VARCHAR(45) NOT NULL ,
  `featured` TINYINT NOT NULL DEFAULT 0 ,
  `enabled` TINYINT NOT NULL DEFAULT 1 ,
  `comments_enabled` TINYINT NOT NULL DEFAULT 1 ,
  `views` INT NOT NULL ,
  PRIMARY KEY (`id`, `author_id`) ,
  INDEX `fk_post_author1_idx` (`author_id` ASC) ,
  CONSTRAINT `fk_post_author1`
    FOREIGN KEY (`author_id` )
    REFERENCES `blog`.`author` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blog`.`category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`category` ;

CREATE  TABLE IF NOT EXISTS `blog`.`category` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `enabled` TINYINT NOT NULL ,
  `date_created` TIMESTAMP NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blog`.`post_category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`post_category` ;

CREATE  TABLE IF NOT EXISTS `blog`.`post_category` (
  `category_id` INT NOT NULL ,
  `post_id` INT NOT NULL ,
  PRIMARY KEY (`category_id`, `post_id`) ,
  INDEX `fk_category_has_post_post1_idx` (`post_id` ASC) ,
  INDEX `fk_category_has_post_category_idx` (`category_id` ASC) ,
  CONSTRAINT `fk_category_has_post_category`
    FOREIGN KEY (`category_id` )
    REFERENCES `blog`.`category` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_category_has_post_post1`
    FOREIGN KEY (`post_id` )
    REFERENCES `blog`.`post` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blog`.`tag`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`tag` ;

CREATE  TABLE IF NOT EXISTS `blog`.`tag` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `post_id` INT NOT NULL ,
  `tag` VARCHAR(45) NOT NULL ,
  `tag_clean` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`, `post_id`) ,
  INDEX `fk_tag_post1_idx` (`post_id` ASC) ,
  CONSTRAINT `fk_tag_post1`
    FOREIGN KEY (`post_id` )
    REFERENCES `blog`.`post` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blog`.`related`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`related` ;

CREATE  TABLE IF NOT EXISTS `blog`.`related` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `post_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `post_id`) ,
  INDEX `fk_related_post1_idx` (`post_id` ASC) ,
  CONSTRAINT `fk_related_post1`
    FOREIGN KEY (`post_id` )
    REFERENCES `blog`.`post` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blog`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`user` ;

CREATE  TABLE IF NOT EXISTS `blog`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `website` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blog`.`comment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`comment` ;

CREATE  TABLE IF NOT EXISTS `blog`.`comment` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `post_id` INT NOT NULL ,
  `is_reply_to_id` INT NOT NULL DEFAULT 0 ,
  `comment` TEXT NOT NULL ,
  `user_id` INT NOT NULL ,
  `mark_read` TINYINT NOT NULL DEFAULT 0 ,
  `enabled` TINYINT NOT NULL DEFAULT 1 ,
  `date` TIMESTAMP NOT NULL ,
  PRIMARY KEY (`id`, `post_id`, `user_id`) ,
  INDEX `fk_comment_user1_idx` (`user_id` ASC) ,
  INDEX `fk_comment_post1_idx` (`post_id` ASC) ,
  CONSTRAINT `fk_comment_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `blog`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comment_post1`
    FOREIGN KEY (`post_id` )
    REFERENCES `blog`.`post` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blog`.`opcion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`opcion` ;

CREATE  TABLE IF NOT EXISTS `blog`.`opcion` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `opcion` VARCHAR(100) NOT NULL ,
  `enabled` TINYINT(1) NOT NULL DEFAULT 1 ,
  `opcion_id` INT NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`id`, `opcion_id`) )
ENGINE = InnoDB;

USE `blog` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
