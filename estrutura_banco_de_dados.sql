SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `agenda` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `agenda`;

DROP TABLE IF EXISTS `contatos`;
CREATE TABLE IF NOT EXISTS `contatos`(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nome` text NOT NULL,
    `endereco`text NOT NULL,
    `cidade` text NOT NULL,
    `estado` text NOT NULL,
    `email` text NOT NULL,
    `telefone`, text NOT NULL,
    PRIMARY KEY (`id`)
);