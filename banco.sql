-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Maio-2020 às 16:05
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncios`
--

CREATE TABLE `anuncios` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `estabelecimento` varchar(100) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `insta` varchar(50) NOT NULL,
  `what` varchar(25) NOT NULL,
  `cep` int(9) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `numero` int(6) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `uf` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `anuncios`
--

INSERT INTO `anuncios` (`id`, `id_usuario`, `id_categoria`, `estabelecimento`, `descricao`, `insta`, `what`, `cep`, `rua`, `numero`, `bairro`, `cidade`, `uf`) VALUES
(46, 9, 2, 'Esmalteria Efraim By Ariane Dias', 'Alongamento e manutenção em fibra e gel.\r\nManicure e pedicure', 'ariane_dias_nails', '31985906795', 33943425, 'Rua Alda Salomão Resende', 31, 'São João de Deus (Justinópolis)', 'Ribeirão das Neves', 'MG'),
(47, 10, 1, 'Espaço Rafaela Alves ', 'Alongamento em gel moldado e fibra \r\nMicroblanding ', '@espaco_rafaelaalves', '31996522909', 31515040, 'Rua Emanuel Marzano Matias', 120, 'Venda Nova', 'Belo Horizonte', 'MG'),
(48, 11, 2, 'Karina Nunes', 'Alongamento de unhas ,manicure e pedicure', '@nunes_nails_studio', '319911164-02', 0, 'Rua Ceará', 1180, 'Bonanza', 'Santa Luzia', 'MG'),
(50, 13, 1, 'Cílios Berbert', 'Alongamento de cílios fio a fio', 'Cilios_berbert', '31 98108-8737', 33110580, 'Avenida Brasília', 4655, 'São Benedito', 'Santa Luzia', 'MG'),
(51, 14, 1, 'Studio Paxiele Primo', 'Alongamento de unha (fibra fio a fio)\r\nManicure, pedicure\r\nEscova e prancha', '@paxieleprimo', '31 999755861', 33015560, 'Rua Domingos Marcelino de Souza', 183, 'Kennedy', 'Santa Luzia', 'MG');

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncios_imagens`
--

CREATE TABLE `anuncios_imagens` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_anuncio` int(11) NOT NULL,
  `url` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `anuncios_imagens`
--

INSERT INTO `anuncios_imagens` (`id`, `id_anuncio`, `url`) VALUES
(26, 47, 'ad6bb01c6e22d30b33b0b83f99fa85e7.jpg'),
(27, 47, 'ed92751685e9057f63559ff7db3fcd50.jpg'),
(28, 47, 'ad991bdd2c79f970aa2cd607adf36ea6.jpg'),
(29, 48, '2812497684fad5dcb13173263e9f58a1.jpg'),
(30, 50, 'db2709b586c783949cbe2ec1f7e6c7ad.jpg'),
(31, 51, 'bdb768683760c0bd59aa15310b87531b.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Salao'),
(2, 'Esmalteria'),
(3, 'Barbearia'),
(4, 'Estetica'),
(5, 'Hair');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados`
--

CREATE TABLE `dados` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `datacadastro` date NOT NULL,
  `senha` varchar(32) NOT NULL DEFAULT '',
  `telefone` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `datacadastro`, `senha`, `telefone`) VALUES
(7, 'carlos martins', 'carloscgm@yahoo.com.br', '0000-00-00', '5f00d4ad44b1e476da6d9a13aaf73f20', 0),
(8, 'carlosssss', 'carloscgmmm@yahoo', '2020-05-22', '202cb962ac59075b964b07152d234b70', 0),
(9, 'Ariane dias', 'arianeisac@hotmail.com', '2020-05-22', 'e4c90119b946e855c2ca4406e5f4951d', 0),
(10, 'Rafaela Alves Soares ', 'rafa.alves2942@gmail.com', '2020-05-22', 'b5b03f06271f8917685d14cea7c6c50a', 0),
(11, 'karinaaparecidanunes01@gmail.com', 'karinaaparecidanunes01@gmail.com', '2020-05-22', '97ce9e4d99f5233e57bd623dc659bf7e', 0),
(12, 'Pollyanna', 'polly1987a@hotmail.com', '2020-05-22', 'f5c15ab94a5e4da212e37c8d4f3e9bf1', 0),
(13, 'Ingryd Berbert', 'ingrydmoraes66@gmail.com', '2020-05-22', '5f812cebf62207fcd0b80b4111545def', 0),
(14, 'Paxiele Roberta Primo', 'robertapaxiele@yahoo.com.br', '2020-05-23', '3d392b11591cfe90de516ac63e01e668', 0),
(15, 'Débora Emanuelle', 'deboraenzoj@gmail.com', '2020-05-23', '91eb6479963e1acb4b14fdae71904d6e', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_token`
--

CREATE TABLE `usuarios_token` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `hash` varchar(32) DEFAULT NULL,
  `used` tinyint(1) DEFAULT 0,
  `expirado_em` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios_token`
--

INSERT INTO `usuarios_token` (`id`, `id_usuario`, `hash`, `used`, `expirado_em`) VALUES
(1, 7, '88652eee7a48cf186eb13aaf28d8ae89', 0, '2020-07-24 06:31:00'),
(2, 7, '04f38144347b219936ca43fced68fd73', 0, '2020-07-24 06:31:00'),
(3, 7, '7fa9abcf8e4eb7ab8d4ec1ec68beea8e', 0, '2020-07-24 06:37:00'),
(4, 7, '4910675ae311ffdc8563d9058695796f', 0, '2020-07-24 06:47:00'),
(5, 7, '0aeb4ef746b42d331c086ebf8b6c0bd7', 0, '2020-07-25 03:16:00'),
(6, 7, '6a521be1f8fbe9b6d8095201c2a84d80', 0, '2020-07-25 03:17:00'),
(7, 7, '82a332072c7908cfd7d7a7ac9d433631', 0, '2020-07-25 03:18:00'),
(8, 7, '3075f1ea08b35390ae7412f68693a25d', 0, '2020-07-25 03:42:00'),
(9, 7, 'ee4e0fba256b30c2f28a9cd48c648e5a', 0, '2020-07-25 04:53:00'),
(10, 7, 'f54abac415dd193e550b2018cd69410a', 0, '2020-07-25 04:54:00'),
(11, 7, '45a87f2e2b5b5941aed9970f2519390d', 0, '2020-07-25 04:54:00'),
(12, 7, '168205d8736075618cb0322485b0f0a3', 0, '2020-07-25 04:56:00'),
(13, 7, '01fa19d9af11a678d19c7f555f125cfa', 0, '2020-07-25 05:16:00'),
(14, 7, 'e690f7dc7eecc8f391f2c84a592aea16', 0, '2020-07-25 05:17:00'),
(15, 7, 'd118583e1521e320ad1276bdca01f26d', 0, '2020-07-25 05:30:00'),
(16, 7, '99a2c03a74052cc76c58f40b9d239e31', 0, '2020-07-26 18:34:00'),
(17, 7, '81dee572c00e0d8eb41d7cbde4de92e0', 1, '2020-07-26 18:36:00'),
(18, 7, 'd0c0426ee052b3bc11376bdd61d845b1', 1, '2020-07-26 20:26:00'),
(19, 7, '3a7b8e75130fdd2dcb458ab2ecd04b4c', 1, '2020-07-26 20:29:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `anuncios_imagens`
--
ALTER TABLE `anuncios_imagens`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `dados`
--
ALTER TABLE `dados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios_token`
--
ALTER TABLE `usuarios_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `anuncios_imagens`
--
ALTER TABLE `anuncios_imagens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `dados`
--
ALTER TABLE `dados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `usuarios_token`
--
ALTER TABLE `usuarios_token`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
