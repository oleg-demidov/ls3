--
-- База данных LiveStreet CMS 3.0.0
--

-- --------------------------------------------------------

--
-- Структура таблицы `prefix_session`
--

CREATE TABLE IF NOT EXISTS `prefix_session` (
  `session_key` varchar(32) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `session_ip_create` varchar(40) NOT NULL,
  `session_ip_last` varchar(40) NOT NULL,
  `session_date_create` datetime DEFAULT NULL,
  `session_date_last` datetime NOT NULL,
  `session_date_close` datetime DEFAULT NULL,
  `session_extra` text,
   PRIMARY KEY (`session_key`),
   KEY `session_date_last` (`session_date_last`),
   KEY `user_id` (`user_id`),
   KEY `session_date_close` (`session_date_close`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `prefix_content`
--

CREATE TABLE `prefix_content` ( 
    `id` BIGINT NOT NULL AUTO_INCREMENT , 
    `user_id` BIGINT NOT NULL , 
    `type` VARCHAR(50) NULL DEFAULT NULL , 
    `title` VARCHAR(255) NULL DEFAULT NULL , 
    `text_hash` VARCHAR(32) NOT NULL , 
    `count_read` INT NULL DEFAULT '0' , 
    `count_comment` INT NOT NULL DEFAULT '0' , 
    `count_favourite` INT NULL DEFAULT '0' , 
    `status` TINYINT NOT NULL DEFAULT '0' , 
    `date_publish` DATETIME NULL DEFAULT NULL , 
    `date_change` DATETIME on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    `date_add` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`), 
    INDEX (`type`), 
    INDEX (`user_id`), 
    INDEX (`text_hash`), 
    INDEX (`date_add`), 
    INDEX (`date_change`), 
    INDEX (`date_publish`), 
    INDEX (`status`), 
    INDEX (`count_read`), 
    INDEX (`count_comment`), 
    INDEX (`count_favourite`)
) ENGINE = InnoDB;

-- --------------------------------------------------------

--
-- Структура таблицы `ls3_user`
--

CREATE TABLE `prefix_user` (
  `id` bigint(20) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `date_register` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_activate` int(11) DEFAULT NULL,
  `activate` tinyint(4) DEFAULT '0',
  `activate_key` varchar(32) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `about` text DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `timezone` varchar(100) DEFAULT NULL,
  `ip_register` varchar(40) DEFAULT NULL,
    PRIMARY KEY (`id`),
   KEY `login` (`login`),
   KEY `date_register` (`date_register`),
   KEY `activate` (`activate`),
   KEY `first_name` (`first_name`),
   KEY `last_name` (`last_name`),
   KEY `sex` (`sex`),
   KEY `birthday` (`birthday`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;





