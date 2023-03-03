-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Jan-2023 às 15:57
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdlojanatkos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `itensvenda`
--

CREATE TABLE `itensvenda` (
  `id` int(15) NOT NULL,
  `idvenda` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `idproduto` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qtd` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `itensvenda`
--

INSERT INTO `itensvenda` (`id`, `idvenda`, `idproduto`, `qtd`) VALUES
(1, '1', '15', 1),
(2, '1', '14', 1),
(3, '1', '16', 1),
(4, '2', '20', 1),
(5, '2', '14', 1),
(6, '3', '14', 2),
(7, '4', '13', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(15) NOT NULL,
  `nome` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `imagem`) VALUES
(13, 'Sabonete de Coco', '10.00', 'ab57a6e2a1b5fb49612d35ca8a8bf532.jpeg'),
(14, 'Sabonete de Sândalo, Rosas e Jabuticaba', '12.00', 'a0f8f501260d4cb876ecc8312730b58c.jpeg'),
(15, 'Condicionador de Coco', '20.00', 'd91f18654f4a235c55ff7d2b468c05c7.jpeg'),
(16, 'Shampoo de Coco', '27.00', '61c83b5abcc27ba320fd91f3f98f8ce0.jpeg'),
(17, 'Sabonete de Capim limão e Aloe Vera', '11.00', 'd00e60fa416dffa2e9c14ecfad02b85d.jpeg'),
(18, 'Shampoo de Capim limão e Aloe Vera', '33.00', 'e9ccfcc913f47254ba55e673a636fc19.jpeg'),
(19, 'Condicionador de Capim limão e Aloe Vera', '29.00', 'b4edeb30d116f1d66670992c1ae5e941.jpeg'),
(20, 'Shampoo de Sândalo, Rosas e Jabuticaba', '25.00', 'dee71116c68807089427973bfcc8b319.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id` int(15) NOT NULL,
  `valor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`id`, `valor`) VALUES
(1, 59),
(2, 37),
(3, 24),
(4, 10);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `itensvenda`
--
ALTER TABLE `itensvenda`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `itensvenda`
--
ALTER TABLE `itensvenda`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
