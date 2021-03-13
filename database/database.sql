-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 13/03/2021 às 23:30
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
  `preco_produto` float NOT NULL,
  `qtd_produto` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `carrinho`
--

INSERT INTO `carrinho` (`id_carrinho`, `nome_produto`, `preco_produto`, `qtd_produto`, `id_pedido`) VALUES
(2, 'Banana', 20, 10, 16);

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
(4, 'André Luan FIrmino de Santana', '123.748.044-29', 'andreluan123@gmail.com', 'Rua José Alfredo/Centro/Recife/123', '78976-4534', '', '', '76543-212'),
(5, 'Luiza', '12343567800', 'andreluan176@gmail.com', 'Ruablablabla', '99107-2916', 'Recife', 'Piauí', '76543-212');

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
(2, 'André Luan FIrmino de Santana', '123456', '12343567800', '789-654', 'Operador de caixa');

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

--
-- Despejando dados para a tabela `pedido`
--

INSERT INTO `pedido` (`id`, `numero_pdd`, `forma_pag`, `id_func`, `id_cliente`) VALUES
(5, 4435, 'Débito', 1, 4),
(6, 4435, 'Dinheiro', 1, 4),
(7, 1234, 'Débito', 1, 4),
(8, 78906, 'Débito', 1, 4),
(9, 7890611, 'Débito', 1, 5),
(10, 789060, 'Débito', 1, 4),
(11, 4435, 'Débito', 1, 4),
(12, 1234, 'Débito', 1, 4),
(13, 176, 'Débito', 1, 4),
(14, 1251745374, 'Crédito', 1, 4),
(15, 8909, 'Débito', 1, 4),
(16, 6098, 'Débito', 1, 4);

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
(6, 'Banana', 'Frutas e legumes', 20, 1.2),
(7, 'Abacate', 'Frutas e legumes', 10, 2),
(8, 'Schin cola', 'Bebidas', 20, 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto_cliente`
--

CREATE TABLE `produto_cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `categoria` varchar(200) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor_und` float NOT NULL,
  `id_pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD KEY `fk_pedidofz_func` (`id_func`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produto_cliente`
--
ALTER TABLE `produto_cliente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_func` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
