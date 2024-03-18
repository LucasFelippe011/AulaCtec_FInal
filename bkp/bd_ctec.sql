-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/01/2024 às 13:14
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_ctec`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_areas`
--

CREATE TABLE `tb_areas` (
  `idArea` int(11) NOT NULL,
  `area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tb_areas`
--

INSERT INTO `tb_areas` (`idArea`, `area`) VALUES
(1, 'Administrativo'),
(2, 'Tecnologia da Informação');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cursos`
--

CREATE TABLE `tb_cursos` (
  `idCurso` int(11) NOT NULL,
  `dataCad` datetime DEFAULT current_timestamp(),
  `idArea` int(11) DEFAULT NULL,
  `titulo` varchar(255) NOT NULL,
  `subtitulo` varchar(255) DEFAULT NULL,
  `descricao` longtext DEFAULT NULL,
  `publicoAlvo` varchar(255) DEFAULT NULL,
  `cargaHoraria` int(4) DEFAULT NULL,
  `preRequisito` varchar(255) DEFAULT NULL,
  `horario` varchar(255) DEFAULT NULL,
  `ead` tinyint(1) DEFAULT NULL,
  `vagas` int(3) DEFAULT NULL,
  `certificacao` tinyint(1) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT 0.00,
  `img1` varchar(255) DEFAULT NULL,
  `img1Thumb` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `home` tinyint(1) DEFAULT 0,
  `ativo` tinyint(1) DEFAULT 1,
  `cep` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `visualizacao` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tb_cursos`
--

INSERT INTO `tb_cursos` (`idCurso`, `dataCad`, `idArea`, `titulo`, `subtitulo`, `descricao`, `publicoAlvo`, `cargaHoraria`, `preRequisito`, `horario`, `ead`, `vagas`, `certificacao`, `valor`, `img1`, `img1Thumb`, `video`, `home`, `ativo`, `cep`, `latitude`, `longitude`, `ip`, `visualizacao`) VALUES
(31, '2022-10-06 11:16:37', 2, 'Curso de HTML5 e CSS3', 'Aprenda tudo sobre HTML5 e CSS3, a linguagem principal da Web.', 'O que você aprenderá\r\nCompreender os conceitos da linguagem de marcação HTML5\r\nCompreender como organizar seu conteúdo HTML5 usando corretamente as estruturas semânticas da linguagem\r\nCompreender a importância da boa estruturação de páginas HTML 5 para auxiliar na indexação por parte das ferramentas de busca como Google e Bing\r\nAprender como hospedar suas páginas gratuitamente usando o GitHub Pages, Netflify e até o Google Drive!\r\nCompreender os conceitos de registro de domínio e hospedagem de websites\r\nHospedar suas páginas web de forma gratuita na Internet\r\nRegistrar domínios de forma gratuita, para ter endereços web simples e sem o nome de empresas como Wix\r\nTer uma visão geral das tecnologias HTML, CSS e JavaScript', 'Interessados em desenvolvimento na área de T.I', 50, 'O estudante deve estar familiarizado com os procedimentos de instalação de programas em seu computador.', 'Manhã: 8h30 às 11h30 - Tarde: 14h às 17h - Noite: 19h às 22h', 0, 20, 1, 500.00, 'html5-g.jpg', 'html5-p.jpg', 'epDCjksKMok', 1, 1, NULL, NULL, NULL, NULL, 18),
(32, '2022-10-06 11:16:37', 2, 'Curso de Bootstrap', 'Aprenda tudo sobre Bootstrap, o principal framwork de CSS para websites', 'O que você aprenderá\r\n\r\nCriar sites responsivos utilizando Bootstrap 4\r\n\r\nAplicar os plugins JavaScript do Bootstrap 4 de forma adequada\r\n\r\nCriar projetos para seu portfólio ou para seus clientes\r\n\r\nTrabalhar como desenvolvedores Front-End utilizando Bootstrap 4', 'Interessados em desenvolvimento na área de T.I', 50, 'O estudante deve estar familiarizado com os procedimentos de instalação de programas em seu computador.', 'Manhã: 8h30 às 11h30 - Tarde: 14h às 17h - Noite: 19h às 22h', 0, 20, 1, 500.00, 'boostrap-g.jpg', 'boostrap-p.jpg', 'epDCjksKMok', 1, 1, NULL, NULL, NULL, NULL, 11),
(33, '2022-10-06 11:16:37', 1, 'Curso de Administração', 'Aprenda tudo sobre ADM, o mais completo para o mercado de trabalho', 'O curso de Administração é a escolha ideal para muitos estudantes. Isso porque se trata de uma opção bastante ampla, tanto no sentido de formação — com disciplinas que englobam os campos de humanas e exatas — quanto em relação às possibilidades de atuação.\r\n\r\nSe você está pensando em ingressar em uma graduação na área, mas ainda tem algumas dúvidas sobre o assunto, saiba que este guia foi feito justamente pensando em você.\r\n\r\nIsso mesmo! Neste post, reunimos as principais informações que um futuro administrador precisa saber antes de entrar na graduação. Afinal de contas, sabemos que são muitos os aspectos a serem considerados no momento de fazer a escolha de um curso, como os seus principais objetivos, disciplinas que compõem a grade curricular, possibilidades de atuação para os formados, entre outros. Vamos começar?', 'Interessados em uma carreira profissional', 200, 'Ser maior de idade e ensino médio completo.', 'Manhã: 8h30 às 11h30 - Tarde: 14h às 17h - Noite: 19h às 22h', 0, 200, 1, 605.50, 'adm-g.png', 'adm-p.png', '_UR7oEt3vmg', 0, 1, NULL, NULL, NULL, NULL, 7),
(34, '2022-10-06 11:16:37', 1, 'Curso de Gestão Financeira', 'Aprenda tudo sobre gestão financeira, o mais completo para o mercado de trabalho.', 'No curso de Gestão Financeira você ganha o preparo ideal para reinar na organização de tudo que envolve o setor. Aprenda técnicas de gestão, otimização de investimentos e controle de custos. Prepare-se para trabalhar no departamento financeiro de empresas de vários setores, corretoras, bancos ou ajudar pessoas físicas a melhorar suas finanças.', 'Interessados em uma carreira profissional', 120, 'Ser maior de idade e ensino médio completo.', 'Manhã: 8h30 às 11h30 - Tarde: 14h às 17h - Noite: 19h às 22h', 0, 100, 1, 800.00, 'adm-financeiro.jpg', 'adm-financeiro-p.jpg', '_UR7oEt3vmg', 1, 1, NULL, NULL, NULL, NULL, 24),
(49, '2022-10-06 11:16:37', 1, 'Contabilidade', 'Nota Fiscal', 'Nota Fiscal é o recibo que comprova transações de venda de produto ou serviço entre uma empresa e pessoa física ou, até mesmo, entre empresas.\r\n\r\nA nota fiscal, basicamente, documenta uma transação e também serve para recolhimento de impostos de transações comerciais. Por este motivo, esse é um documento que merece uma atenção especial em empresas de todos os tamanhos. ', 'Contador ', 40, 'Administrativo', '18:00 as 20:00', 1, 4, 1, 21.00, 'administracao.jpg', 'administracao-p.jpg', 'cbFo0_F4PlE', 0, 1, NULL, NULL, NULL, NULL, 4),
(50, '2022-10-06 11:16:37', 2, 'Curso de HTML5', 'Aprenda tudo sobre HTML5 e CSS3, a linguagem principal da Web.', 'O que você aprenderá\r\nCompreender os conceitos da linguagem de marcação HTML5\r\nCompreender como organizar seu conteúdo HTML5 usando corretamente as estruturas semânticas da linguagem\r\nCompreender a importância da boa estruturação de páginas HTML 5 para auxiliar na indexação por parte das ferramentas de busca como Google e Bing\r\nAprender como hospedar suas páginas gratuitamente usando o GitHub Pages, Netflify e até o Google Drive!\r\nCompreender os conceitos de registro de domínio e hospedagem de websites\r\nHospedar suas páginas web de forma gratuita na Internet\r\nRegistrar domínios de forma gratuita, para ter endereços web simples e sem o nome de empresas como Wix\r\nTer uma visão geral das tecnologias HTML, CSS e JavaScript', 'Interessados em desenvolvimento na área de T.I', 50, 'O estudante deve estar familiarizado com os procedimentos de instalação de programas em seu computador.', 'Manhã: 8h30 às 11h30 - Tarde: 14h às 17h - Noite: 19h às 22h', 1, 20, 1, 500.00, 'html-g.png', 'html-p.jpg', 'epDCjksKMok', 0, 1, NULL, NULL, NULL, NULL, 12),
(51, '2022-10-06 11:16:37', 2, 'Curso de CSS3', 'Aprenda tudo sobre HTML5 e CSS3, a linguagem principal da Web.', 'O que você aprenderá\r\nCompreender os conceitos da linguagem de marcação HTML5\r\nCompreender como organizar seu conteúdo HTML5 usando corretamente as estruturas semânticas da linguagem\r\nCompreender a importância da boa estruturação de páginas HTML 5 para auxiliar na indexação por parte das ferramentas de busca como Google e Bing\r\nAprender como hospedar suas páginas gratuitamente usando o GitHub Pages, Netflify e até o Google Drive!\r\nCompreender os conceitos de registro de domínio e hospedagem de websites\r\nHospedar suas páginas web de forma gratuita na Internet\r\nRegistrar domínios de forma gratuita, para ter endereços web simples e sem o nome de empresas como Wix\r\nTer uma visão geral das tecnologias HTML, CSS e JavaScript', 'Interessados em desenvolvimento na área de T.I', 50, 'O estudante deve estar familiarizado com os procedimentos de instalação de programas em seu computador.', 'Manhã: 8h30 às 11h30 - Tarde: 14h às 17h - Noite: 19h às 22h', 0, 20, 1, 500.00, 'css-g.jpg', 'css-p.jpg', 'epDCjksKMok', 0, 1, NULL, NULL, NULL, NULL, 9);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_login`
--

CREATE TABLE `tb_login` (
  `idLogin` int(11) NOT NULL,
  `dataCad` datetime NOT NULL DEFAULT current_timestamp(),
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tb_login`
--

INSERT INTO `tb_login` (`idLogin`, `dataCad`, `nome`, `email`, `senha`) VALUES
(12, '2023-09-27 21:16:56', 'Sandromir Almeida', 'sandromir@ctsdigital.com.br', '498564a0f73a6d35ea7addfbfb887462');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_areas`
--
ALTER TABLE `tb_areas`
  ADD PRIMARY KEY (`idArea`);

--
-- Índices de tabela `tb_cursos`
--
ALTER TABLE `tb_cursos`
  ADD PRIMARY KEY (`idCurso`);

--
-- Índices de tabela `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`idLogin`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_areas`
--
ALTER TABLE `tb_areas`
  MODIFY `idArea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_cursos`
--
ALTER TABLE `tb_cursos`
  MODIFY `idCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de tabela `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `idLogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
