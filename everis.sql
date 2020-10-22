-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Out-2020 às 19:39
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `everis`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamados`
--

CREATE TABLE `chamados` (
  `id_chamado` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_comentario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `id_chamado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `nome_perfil` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `nome_perfil`) VALUES
(1, 'Cliente'),
(2, 'Funcionários');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `cpf` text NOT NULL,
  `id_perfil_usuario` int(11) NOT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `nome`, `cpf`, `id_perfil_usuario`, `usuario`, `senha`) VALUES
(1, 'Jefferson Magalhães', '424.620.448-09', 1, 'jeffemag', '12345'),
(2, 'Rafael Evangelista', '37356246856', 1, 'rafa1', '12345'),
(3, 'Conceição Paraizo', '29513119823', 1, 'con1', '12345'),
(4, 'Rodrigo Ferraz', '04111545912', 1, 'rodrigo1', '12345'),
(5, 'Fabricio Mauricio Silva', '39544119892', 1, 'fab1', '12345'),
(6, 'Larissa Matoozo', '42462044809', 1, 'lari1', '12345');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `chamados`
--
ALTER TABLE `chamados`
  ADD PRIMARY KEY (`id_chamado`);

--
-- Índices para tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Índices para tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chamados`
--
ALTER TABLE `chamados`
  MODIFY `id_chamado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
