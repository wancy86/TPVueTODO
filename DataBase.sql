/*https://github.com/ancor-dev/sublime-sql-snippets*/

CREATE DATABASE if not exists `TODO_DB` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

use TODO_DB;

CREATE TABLE IF NOT EXISTS `user` (
  `uid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `login_name` VARCHAR(255),
  `email` VARCHAR(255),
  `phone` VARCHAR(255),
  `password` VARCHAR(255),
  `entry_date` datetime,
  PRIMARY KEY `pk_uid`(`uid`)
) ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `issue` (
  `iid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255),
  `uid` int,
  `entry_date` datetime,
  PRIMARY KEY `pk_iid`(`iid`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `comment` (
  `cid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `iid` int,
  `content` VARCHAR(500),
  `entry_date` datetime,
  PRIMARY KEY `pk_cid`(`cid`)
) ENGINE = InnoDB;