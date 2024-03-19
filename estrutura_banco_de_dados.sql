SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `db_agenda` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `db_agenda`;

DROP TABLE IF EXISTS `tb_contatos`;
CREATE TABLE IF NOT EXISTS `tb_contatos`(
    `con_id` int(11) NOT NULL AUTO_INCREMENT,
    `con_nome` text NOT NULL,
    `con_endereco`text NOT NULL,
    `con_cidade` text NOT NULL,
    `con_estado` text NOT NULL,
    `con_email` text NOT NULL,
    `con_telefone` text NOT NULL,
    PRIMARY KEY (`con_id`)
);