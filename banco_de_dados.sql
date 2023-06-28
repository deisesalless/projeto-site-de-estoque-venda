-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/06/2023 às 19:40
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banco_de_dados`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `jalecos`
--

CREATE TABLE `jalecos` (
  `COD_JALECO` int(11) NOT NULL,
  `MODELO_JALECO` varchar(45) NOT NULL,
  `DESCRICAO_JALECO` varchar(300) NOT NULL,
  `TAMANHO_JALECO` varchar(45) NOT NULL,
  `PRECO_JALECO` varchar(45) NOT NULL,
  `FOTO_JALECO` varchar(45) NOT NULL,
  `FILA_COMP_JALECO` varchar(10) NOT NULL DEFAULT 'Sim',
  `VENDAS_COD_VENDA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `jalecos`
--

INSERT INTO `jalecos` (`COD_JALECO`, `MODELO_JALECO`, `DESCRICAO_JALECO`, `TAMANHO_JALECO`, `PRECO_JALECO`, `FOTO_JALECO`, `FILA_COMP_JALECO`, `VENDAS_COD_VENDA`) VALUES
(1, 'Jaleco Azul - alterado', 'Mangas bufantes', 'P', '369.00', 'imagem/jaleco_azul_mangas_bufantes.jpg', 'Vendido', 1),
(2, 'jaleco Branco', 'Barra arredondada', 'M', '389.00', 'imagem/jaleco_barra_arredondada.jpg', 'Vendido', 1),
(3, 'Jaleco Branco', 'Botoes transparentes', 'G', '269.00', 'imagem/jaleco_branco_com_botoes_transparentes', 'Nao', NULL),
(4, 'Jaleco Preto', 'Mangas bufantes', 'M', '359.00', 'imagem/jaleco_preto_mangas_bufantes.jpg', 'Sim', NULL),
(5, 'Jaleco Branco', 'Botoes brancos', 'G', '349.00', 'imagem/jaleco_branco_botoes_brancos.jpg', 'Sim', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `COD_USER` int(11) NOT NULL,
  `NOME_USER` varchar(45) NOT NULL,
  `LOGIN_USER` varchar(45) NOT NULL,
  `SENHA_USER` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`COD_USER`, `NOME_USER`, `LOGIN_USER`, `SENHA_USER`) VALUES
(1, 'administrador', 'admin', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `COD_VENDA` int(11) NOT NULL,
  `DATA_VENDA` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `vendas`
--

INSERT INTO `vendas` (`COD_VENDA`, `DATA_VENDA`) VALUES
(1, '0000-00-00');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `jalecos`
--
ALTER TABLE `jalecos`
  ADD PRIMARY KEY (`COD_JALECO`),
  ADD KEY `fk_JALECOS_VENDAS1_idx` (`VENDAS_COD_VENDA`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`COD_USER`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`COD_VENDA`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `jalecos`
--
ALTER TABLE `jalecos`
  MODIFY `COD_JALECO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `COD_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `COD_VENDA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `jalecos`
--
ALTER TABLE `jalecos`
  ADD CONSTRAINT `fk_JALECOS_VENDAS1` FOREIGN KEY (`VENDAS_COD_VENDA`) REFERENCES `vendas` (`COD_VENDA`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
