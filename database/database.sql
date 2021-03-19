-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 19/03/2021 às 17:58
-- Versão do servidor: 10.4.17-MariaDB
-- Versão do PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `database`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id_carrinho` int(11) NOT NULL,
  `nome_produto` varchar(200) NOT NULL,
  `categoria` varchar(200) NOT NULL,
  `preco_produto` float NOT NULL,
  `qtd_produto` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `cpf` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `endereço` varchar(200) NOT NULL,
  `telefone` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `estado` varchar(200) NOT NULL,
  `cep` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `cpf`, `email`, `endereço`, `telefone`, `cidade`, `estado`, `cep`) VALUES
(6, 'Luiza Maria', '123.123.123-12', 'luizamaria123@gmail.com', 'Rua dos bobos', '99912-9890', 'Recife', 'Pernambuco', '12654-098'),
(7, 'Cremildo Luiz', '123.123.000-00', 'cremildo123@gmail.com', 'Rua dos bobos', '99999-0000', 'Recife', 'Pernambuco', '12313-000');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id_func` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `cpf` varchar(200) NOT NULL,
  `credencial` varchar(200) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`id_func`, `nome`, `senha`, `cpf`, `credencial`, `tipo`) VALUES
(1, 'André Luan', '123456', '12374322900', '654-789', 'Gerente'),
(2, 'André Luan FIrmino de Santana', '123456', '12343567800', '789-654', 'Operador de caixa'),
(5, 'Andrea Manu', '123456', '123.456.789-00', '987-567', 'Gerente'),
(6, 'João', '123456', '123.123.123-00', '123-123', 'Operador de caixa');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `numero_pdd` int(11) NOT NULL,
  `forma_pag` varchar(200) NOT NULL,
  `id_func` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido_rlz`
--

CREATE TABLE `pedido_rlz` (
  `id_pedido` int(11) NOT NULL,
  `numero_pdd` int(11) NOT NULL,
  `forma_pag` varchar(200) NOT NULL,
  `data_fnz` datetime(6) NOT NULL,
  `valor_tot` float NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_func` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `pedido_rlz`
--

INSERT INTO `pedido_rlz` (`id_pedido`, `numero_pdd`, `forma_pag`, `data_fnz`, `valor_tot`, `id_cliente`, `id_func`) VALUES
(7, 4435, 'Dinheiro', '2021-03-18 14:41:20.000000', 2.4, 6, 1),
(8, 557788, 'Dinheiro', '2021-03-18 14:42:47.000000', 2.4, 6, 1),
(9, 7896, 'Dinheiro', '2021-03-18 14:44:33.000000', 2.4, 6, 1),
(10, 869705, 'Dinheiro', '2021-03-18 17:56:32.000000', 8.4, 6, 1),
(11, 78900, 'Dinheiro', '2021-03-18 21:08:00.000000', 7.2, 6, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `categoria` varchar(200) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor_und` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `categoria`, `quantidade`, `valor_und`) VALUES
(9, 'Banana', 'Frutas e legumes', 27, 1.2),
(10, 'Shin cola', 'Bebidas', 20, 4),
(11, 'Banana', 'Frutas e legumes', 20, 1.5);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id_carrinho`),
  ADD KEY `fk_carrinho_pedido` (`id_pedido`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_func`);

--
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pedido_cliente` (`id_cliente`),
  ADD KEY `fk_pedido_func` (`id_func`);

--
-- Índices de tabela `pedido_rlz`
--
ALTER TABLE `pedido_rlz`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `fk_pedidofz_cliente` (`id_cliente`),
  ADD KEY `fk_pedidofz_func` (`id_func`) USING BTREE;

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_func` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `pedido_rlz`
--
ALTER TABLE `pedido_rlz`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `fk_carrinho_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id`);

--
-- Restrições para tabelas `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `fk_pedido_func` FOREIGN KEY (`id_func`) REFERENCES `funcionario` (`id_func`);

--
-- Restrições para tabelas `pedido_rlz`
--
ALTER TABLE `pedido_rlz`
  ADD CONSTRAINT `fk_pedidofz_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `fk_pedidofz_func` FOREIGN KEY (`id_func`) REFERENCES `funcionario` (`id_func`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
