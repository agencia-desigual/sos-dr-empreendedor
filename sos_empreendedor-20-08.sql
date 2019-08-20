-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20-Ago-2019 às 16:28
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sos_empreendedor`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo_altera`
--

CREATE TABLE `cargo_altera` (
  `Id` int(11) NOT NULL,
  `Id_meta` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `mes` int(11) NOT NULL,
  `ano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `metas`
--

CREATE TABLE `metas` (
  `Id_meta` int(11) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `mes` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `tipo_meta` varchar(100) NOT NULL,
  `meta_bronze` float NOT NULL,
  `por_bronze` float NOT NULL,
  `meta_prata` float NOT NULL,
  `por_prata` float NOT NULL,
  `meta_ouro` float NOT NULL,
  `por_ouro` float NOT NULL,
  `meta_safira` float NOT NULL,
  `por_safira` float NOT NULL,
  `meta_diamante` float NOT NULL,
  `por_diamante` float NOT NULL,
  `por_total` float NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `metas`
--

INSERT INTO `metas` (`Id_meta`, `cargo`, `mes`, `ano`, `tipo_meta`, `meta_bronze`, `por_bronze`, `meta_prata`, `por_prata`, `meta_ouro`, `por_ouro`, `meta_safira`, `por_safira`, `meta_diamante`, `por_diamante`, `por_total`, `valor`) VALUES
(41, 'Medicina e Segurança do Trabalho', 7, 2019, 'dinheiro', 60, 100, 70, 100, 80, 99, 90, 0, 100, 0, 78.87, 78.87),
(43, 'Medicina e Segurança do Trabalho', 8, 2019, 'dinheiro', 100, 100, 200, 100, 300, 100, 400, 82, 500, 0, 65.798, 328.99),
(44, 'Laboratório', 8, 2019, 'dinheiro', 50, 100, 150, 100, 300, 100, 500, 100, 800, 85, 84.9987, 679.99),
(45, 'Laboratório', 7, 2019, 'dinheiro', 500, 100, 800, 100, 850, 96, 900, 0, 1000, 0, 81.235, 812.35),
(46, 'Recepção', 8, 2019, 'dinheiro', 50, 100, 100, 79, 200, 0, 300, 0, 400, 0, 19.63, 78.52),
(47, 'Gestão da agenda', 8, 2019, 'dinheiro', 20, 100, 40, 100, 80, 85, 160, 0, 400, 0, 16.955, 67.82),
(48, 'Call Center (Receptivo)', 8, 2019, 'dinheiro', 1000, 100, 2000, 100, 3500, 100, 4000, 90, 5500, 0, 65.2355, 3587.95),
(49, 'Promotor quiosque', 8, 2019, 'dinheiro', 50, 100, 100, 88, 200, 0, 300, 0, 400, 0, 21.885, 87.54),
(50, 'Call Center (Ativo)', 8, 2019, 'dinheiro', 20, 100, 40, 100, 200, 42, 300, 0, 400, 0, 20.8625, 83.45),
(51, 'Promotor Oftalmo', 8, 2019, 'numero', 0, 100, 0, 100, 0, 100, 0, 100, 0, 100, 0, 0),
(52, 'Promotor Odonto', 8, 2019, 'numero', 0, 100, 0, 100, 0, 100, 0, 100, 0, 100, 0, 0),
(53, 'Recepção', 7, 2019, 'dinheiro', 10, 100, 40, 100, 60, 100, 80, 100, 400, 22, 21.86, 87.44),
(54, 'Gestão da agenda', 7, 2019, 'dinheiro', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(55, 'Call Center (Receptivo)', 7, 2019, 'dinheiro', 500, 100, 592.22, 99, 687.22, 0, 758.44, 0, 945.42, 0, 62.0888, 587),
(56, 'Promotor quiosque', 7, 2019, 'porcentagem', 20, 100, 40, 100, 60, 100, 80, 100, 100, 87, 87, 87),
(57, 'Call Center (Ativo)', 7, 2019, 'dinheiro', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(58, 'Promotor Oftalmo', 7, 2019, 'dinheiro', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(59, 'Promotor Odonto', 7, 2019, 'dinheiro', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `metas_clinica`
--

CREATE TABLE `metas_clinica` (
  `Id_meta_clinica` int(11) NOT NULL,
  `tipo_meta` varchar(11) NOT NULL,
  `realizado` float NOT NULL,
  `meta` float NOT NULL,
  `porcentagem` float NOT NULL,
  `mes` int(11) NOT NULL,
  `ano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `metas_clinica`
--

INSERT INTO `metas_clinica` (`Id_meta_clinica`, `tipo_meta`, `realizado`, `meta`, `porcentagem`, `mes`, `ano`) VALUES
(10, 'dinheiro', 45000, 100000, 45, 8, 2019),
(11, 'dinheiro', 7824.44, 8900, 87.9, 7, 2019);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `Id_usuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`Id_usuario`, `nome`, `email`, `senha`, `data_cadastro`) VALUES
(1, 'Edilson Pereira', 'edilson@desigual.com.br', '202cb962ac59075b964b07152d234b70', '2019-07-21 13:16:53'),
(2, 'Gustavo', 'gustavo@sosdr.com', '1a3468c0ab84bf9c1b8aec04533a2558', '2019-07-25 16:53:14'),
(3, 'Caio', 'caio@sosdr.com', '1a3468c0ab84bf9c1b8aec04533a2558', '2019-07-25 16:53:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cargo_altera`
--
ALTER TABLE `cargo_altera`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_meta` (`Id_meta`);

--
-- Indexes for table `metas`
--
ALTER TABLE `metas`
  ADD PRIMARY KEY (`Id_meta`);

--
-- Indexes for table `metas_clinica`
--
ALTER TABLE `metas_clinica`
  ADD PRIMARY KEY (`Id_meta_clinica`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cargo_altera`
--
ALTER TABLE `cargo_altera`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `metas`
--
ALTER TABLE `metas`
  MODIFY `Id_meta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `metas_clinica`
--
ALTER TABLE `metas_clinica`
  MODIFY `Id_meta_clinica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cargo_altera`
--
ALTER TABLE `cargo_altera`
  ADD CONSTRAINT `cargo_altera_ibfk_1` FOREIGN KEY (`Id_meta`) REFERENCES `metas` (`Id_meta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
