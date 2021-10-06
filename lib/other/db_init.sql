CREATE DATABASE `just_tasks`;

CREATE TABLE `jt_tasks` (
        `ID` int(11) NOT NULL AUTO_INCREMENT,
        `NAME` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
        `EMAIL` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
        `TEXT` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
        `STATUS` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
        `MODERATED` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
        PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `jt_users` (
     `ID` INT NOT NULL AUTO_INCREMENT,
     `NAME` VARCHAR(45) NULL,
     `LOGIN` VARCHAR(45) NULL,
     `PASS` VARCHAR(45) NULL,
     PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `jt_users` (`NAME`, `LOGIN`, `PASS`) VALUES ('Admin', 'admin', '123');