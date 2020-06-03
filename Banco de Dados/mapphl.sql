-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Jun-2020 às 15:54
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mapphl`
--
CREATE DATABASE IF NOT EXISTS `mapphl` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mapphl`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `foto`
--

CREATE TABLE `foto` (
  `idfoto` int(11) NOT NULL,
  `foto` varchar(300) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `foto`
--

INSERT INTO `foto` (`idfoto`, `foto`, `iduser`) VALUES
(10, 'a69b082e8aa4c22eb0f521acb0266369.jpg', 13),
(11, '1c97258951bc687b96b2bfd4f076f2e2.jpg', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
--

CREATE TABLE `mensagem` (
  `idmens` int(11) NOT NULL,
  `mensagem` text NOT NULL,
  `iddest` int(11) NOT NULL,
  `idem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mensagem`
--

INSERT INTO `mensagem` (`idmens`, `mensagem`, `iddest`, `idem`) VALUES
(11, '&#13;&#10;olá,Como Vai?&#13;&#10;      <br> Enviado Por Paulo Henrique', 11, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagem`
--

CREATE TABLE `postagem` (
  `idpost` int(11) NOT NULL,
  `mensagem` text NOT NULL,
  `arquivo` varchar(300) DEFAULT NULL,
  `idpostador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `telefone`, `email`, `senha`) VALUES
(10, 'Paulo Henrique', '994592774', 'Paulohenriquelg3@gmail.com', '$2y$10$74.XblroolSO2Ig8ltg17u.ENhog0CdilQUXswGbrj5FjlDLFir66'),
(11, 'Aline ', '994613870', 'Aline@gmail.com', '$2y$10$B.KhObY41JveX1eDzk/dSeCPncKaQeTy2KEsjeXNVZxW3ijjoy6v6'),
(12, 'Natan', '994245690', 'Natan@gmail.com', '$2y$10$Nce9IPZvCUH23IrU1YjOXersQ8nuVifpACwCDP.DTKh3t7mGf5RWe'),
(13, 'Elisson', '994794032', 'Elisson@hotmail.com', '$2y$10$EDrIjBh/nn0UbwBw3QrKae9J6Jr4WwfJxHnq872pAZoVUAcs9yKUy'),
(14, 'Vauirlon', '2147483647', 'Vauirlon@gmail.com', '$2y$10$g0.rpCwZFy/azK9PgVt1suZdsrvko7OIMX7Hf6GDF1.4MVBCIo00y'),
(15, 'Paulo Roberto', '994589085', 'PauloR@gmail.com', '$2y$10$ku8SfiNNJaJ3AHlPRHLwpOp1kIyi0.63wAF0u7m5wyWWbYU8Ipqr6'),
(16, 'Jubileu', '994336784', 'Jub@gmail.com', '$2y$10$lvIWP8OhOoh60iwG4viX5e8jIkvNmXy5vwHnKaBeGBPwT5k7vhBt.');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`idfoto`),
  ADD KEY `iduser` (`iduser`);

--
-- Índices para tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`idmens`),
  ADD KEY `iddest` (`iddest`),
  ADD KEY `idem` (`idem`);

--
-- Índices para tabela `postagem`
--
ALTER TABLE `postagem`
  ADD PRIMARY KEY (`idpost`),
  ADD KEY `idpostador` (`idpostador`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `telefone` (`telefone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `foto`
--
ALTER TABLE `foto`
  MODIFY `idfoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `idmens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `postagem`
--
ALTER TABLE `postagem`
  MODIFY `idpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `iduser` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD CONSTRAINT `iddest` FOREIGN KEY (`iddest`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `idem` FOREIGN KEY (`idem`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `postagem`
--
ALTER TABLE `postagem`
  ADD CONSTRAINT `idpostador` FOREIGN KEY (`idpostador`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
