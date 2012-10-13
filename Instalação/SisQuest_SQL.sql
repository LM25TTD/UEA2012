-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 24/05/2012 às 01h43min
-- Versão do Servidor: 5.5.16
-- Versão do PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT=0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `db_leandro_kevin`
--
DROP DATABASE IF EXISTS `db_leandro_kevin`;
CREATE DATABASE `db_leandro_kevin` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `db_leandro_kevin`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_area`
--

DROP TABLE IF EXISTS `tb_area`;
CREATE TABLE IF NOT EXISTS `tb_area` (
  `Id_Area` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Cadastrante` varchar(20) DEFAULT NULL,
  `Nome_Area` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_Area`),
  KEY `Cadastrante` (`Cadastrante`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `tb_area`
--

INSERT INTO `tb_area` (`Id_Area`, `Cadastrante`, `Nome_Area`) VALUES
(1, 'lmab', 'Informatica'),
(5, 'lmab', 'Matematica');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_assunto`
--

DROP TABLE IF EXISTS `tb_assunto`;
CREATE TABLE IF NOT EXISTS `tb_assunto` (
  `Id_Assunto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Cadastrante` varchar(20) DEFAULT NULL,
  `Id_Disciplina` int(10) unsigned NOT NULL,
  `Nome_Assunto` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_Assunto`),
  KEY `Id_Disciplina` (`Id_Disciplina`),
  KEY `Cadastrante` (`Cadastrante`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `tb_assunto`
--

INSERT INTO `tb_assunto` (`Id_Assunto`, `Cadastrante`, `Id_Disciplina`, `Nome_Assunto`) VALUES
(1, 'lmab', 1, 'SQL'),
(2, 'lmab', 2, 'Windows'),
(4, 'lmab', 9, 'Geral'),
(5, 'lmab', 9, 'Raciocinio Logico'),
(6, 'lmab', 10, 'Geral');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_disciplina`
--

DROP TABLE IF EXISTS `tb_disciplina`;
CREATE TABLE IF NOT EXISTS `tb_disciplina` (
  `Id_Disciplina` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Cadastrante` varchar(20) DEFAULT NULL,
  `Id_Area` int(10) unsigned NOT NULL,
  `Nome_Disciplina` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_Disciplina`),
  KEY `Id_Area` (`Id_Area`),
  KEY `Cadastrante` (`Cadastrante`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `tb_disciplina`
--

INSERT INTO `tb_disciplina` (`Id_Disciplina`, `Cadastrante`, `Id_Area`, `Nome_Disciplina`) VALUES
(1, 'lmab', 1, 'Banco de Dados'),
(2, 'lmab', 1, 'Sistemas Operacionais'),
(9, 'lmab', 5, 'Matematica'),
(10, 'lmab', 1, 'Redes de Computadores');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_questao`
--

DROP TABLE IF EXISTS `tb_questao`;
CREATE TABLE IF NOT EXISTS `tb_questao` (
  `Id_Questao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Cadastrante` varchar(20) DEFAULT NULL,
  `Id_Assunto` int(10) unsigned NOT NULL,
  `Enunciado_Questao` varchar(1000) NOT NULL,
  `Dificuldade` enum('1','2','3','4','5') NOT NULL,
  `Alternativa_Correta` int(10) unsigned NOT NULL,
  `Alternativa_1` varchar(500) NOT NULL,
  `Alternativa_2` varchar(500) NOT NULL,
  `Alternativa_3` varchar(500) NOT NULL,
  `Alternativa_4` varchar(500) NOT NULL,
  `Alternativa_5` varchar(500) NOT NULL,
  PRIMARY KEY (`Id_Questao`),
  KEY `Id_Assunto` (`Id_Assunto`),
  KEY `Cadastrante` (`Cadastrante`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Extraindo dados da tabela `tb_questao`
--

INSERT INTO `tb_questao` (`Id_Questao`, `Cadastrante`, `Id_Assunto`, `Enunciado_Questao`, `Dificuldade`, `Alternativa_Correta`, `Alternativa_1`, `Alternativa_2`, `Alternativa_3`, `Alternativa_4`, `Alternativa_5`) VALUES
(2, 'lmab', 1, 'Num sistema gerenciador de bancos de dados, o mecanismo de lock (bloqueio) viabiliza a obtenção de uma importante propriedade das transações. Essa propriedade é:', '2', 2, ' atomicidade;', 'consistência;', 'durabilidade;', 'independência de dados;', 'isolamento.'),
(3, 'lmab', 2, 'Em que ano foi lançado a mais nova versão, o windows 8?', '5', 2, '2013', '2012', '2011', '2010', '2009'),
(4, 'lmab', 1, 'Dadas as tabelas: Aluno que contém as colunas Nome e Cidade; e Cidade que contém a coluna Nome. Uma query SQL que retorna apenas os alunos cujas cidades constem na tabela de cidades é?', '2', 5, 'SELECT Aluno.Nome FROM Aluno WHERE Aluno.Cidade IN (SELECT COUNT(Nome) FROM Cidade);', 'SELECT Nome FROM Aluno,Cidade WHERE Aluno.Cidade = Cidade.Nome;', 'SELECT Nome FROM Aluno HAVING Aluno.Cidade = Cidade.Nome;', 'SELECT Cidade.Nome FROM Aluno LEFT JOIN Cidade WHERE Aluno.Cidade = Cidade.Nome;', 'SELECT a.Nome FROM Aluno a,Cidade b WHERE a.Cidade = b.Nome;'),
(5, 'lmab', 1, 'Uma empresa possui informações sobre as horas extras trabalhadas de seus funcionários em uma tabela que, além de outras colunas, contém as colunas de horário de entrada e horário de saída e o valor total a ser pago pelas horas trabalhadas. Baseado nas informações apresentadas, é correto afirmar que esta tabela ', '3', 4, ' encontra-se na segunda forma normal.', 'encontra-se na primeira forma normal, mas não na segunda forma normal.', 'encontra-se na segunda forma normal, mas não na terceira forma normal.', 'não encontra-se na primeira forma normal.', 'encontra-se na terceira forma normal.'),
(6, 'lmab', 1, 'A função string do banco de dados MYSQL que retorna a posição da primeira ocorrência de uma string é denominada ', '5', 3, 'STRCHR.', 'RPAD.', 'INSTR.', ' RTRIM.', 'ELT.'),
(7, 'lmab', 1, 'No banco de dados PostgreSQL, a função COALESCE ', '5', 4, 'retorna verdade ou falso conforme o padrão corresponda ou não à cadeia de caracteres fornecida. Este operador é muito semelhante ao LIKE, exceto por interpretar o padrão utilizando a definição de expressão regular do padrão SQL. ', 'é uma expressão condicional genérica, semelhante às declarações if/else de outras linguagens.', 'é uma declaração SELECT arbitrária, ou uma subconsulta. A subconsulta é processada para determinar se retorna alguma linha.', 'retorna o primeiro de seus argumentos que não for nulo. Só retorna nulo quando todos os seus argumentos são nulos.', 'permite a conversão do carimbo do tempo (time stamp) para uma zona horária diferente.'),
(8, 'lmab', 1, 'No Microsoft SQL Server, a função STDEV (Transact- SQL) retorna', '5', 5, 'a soma de todos os valores ou somente os valores DISTINCT na expressão.', 'o valor mínimo na expressão.', 'o número de linhas afetadas pela última instrução executada.', 'a variância estatística para o preenchimento de todos os valores da expressão especificada.', 'o desvio padrão estatístico de todos os valores da expressão especificada.'),
(9, 'lmab', 1, 'A instrução JOIN em SQL é utilizada para consultar informações de duas ou mais tabelas, baseadas em relações entre colunas destas tabelas. Um dos tipos de JOIN é o INNER JOIN que retorna linhas ', '5', 5, ' não importando a correspondência entre as tabelas, criando uma relação entre as linhas e colunas.', 'quando existir correspondência em apenas uma das tabelas.', 'não importando a correspondência entre as tabelas, criando uma relação entre as linhas, apenas.', 'não importando a correspondência entre as tabelas, criando uma relação entre as colunas, apenas.', 'quando existir ao menos uma correspondência em ambas as tabelas.'),
(10, 'lmab', 1, 'No SQL, os controles de transação e concorrência definem diferentes tipos de isolamento para prevenir fenômenos indesejáveis que podem ocorrer em transações concorrentes. Estes fenômenos indesejáveis são: Dirt read, Nonrepeatable read e ', '5', 4, 'Unsynchronized read.', 'Sequential read.', 'Random read.', 'Phantom read.', 'Overlapped read.'),
(11, 'lmab', 1, 'No modelo de entidade-relacionamento, a técnica Bottom- Up.', '4', 3, 'inicia a modelagem nos conceitos mais importantes e navega em direção aos menos importantes. É comum que modelos E-R se desenvolvam em torno de algumas entidades que representam os conceitos mais importantes de um domínio ou aplicação.', 'inicia a modelagem partindo de entidades altamente abstratas e aplicando transformações que permitem encontrar entidades menos abstratas e mais representativas do sistema que está sendo desenvolvido.', 'parte dos conceitos mais elementares para construir conceitos mais complexos.', 'utiliza três símbolos na linha de relação entre as entidades, para determinar o relacionamento a cardinalidade e ligação entre as chaves primárias e estrangeiras.', 'ou associativa, indica junto à entidade quantas ocorrências da mesma relação podem estar associadas a uma determinada entidade ou a outros relacionamentos.'),
(12, 'lmab', 1, 'Uma das opções para a criação de um banco de dados Oracle se dá pela utilização do Database Configuration Assistant (DBCA). Em uma das páginas de configuração desse assistente é possível listar as funcionalidades padrão do banco de dados, como Oracle JVM, Oracle Text e', '5', 3, 'OLTP2 (Online Transaction Processing).', 'DSSW (Data Warehousing).', 'XDB Protocol.', 'DBCA Templates.', 'UTC Timing.'),
(13, 'lmab', 1, 'A função LAST_INSERT_ID, em MYSQL', '5', 5, 'retorna com o identificador do último octeto, dado um endereço de rede no formato IPv4.', 'utiliza o identificador da coluna informada para gerar um novo número de identificação.', 'retorna o número de identificação dos arquivos de índice da base de dados.', 'retorna o identificador universal exclusivo para a tabela informada.', 'retorna o último valor para uma coluna que tenha a propriedade de auto incremento.'),
(14, 'lmab', 1, 'Em PostgreSQL, um conjunto de funções e expressões estão disponíveis para a geração de arquivos XML. A função, similar a função xmlconcat, que concatena as colunas xml entre linhas de uma tabela é denominada de ', '5', 1, ' xmllist.', 'xmlrowcat.', 'xmlgrep.', 'xmlagg.', 'xmlconcr.'),
(15, 'lmab', 1, 'Assinale a alternativa que define corretamente o comando DROP na Linguagem SQL-99.', '4', 2, 'O comando DROP pode ser usado para eliminar elementos de esquemas nomeados, como tabelas, domínios ou restrições.', 'O comando DROP pode ser usado para eliminar somente tabelas.', 'O comando DROP pode ser usado para criar tabelas.', 'O comando DROP pode ser usado para eliminar somente esquemas.', 'O comando DROP pode ser usado para eliminar uma tupla de uma determinada tabela.'),
(16, 'lmab', 1, 'Assinale a seguir a alternativa que NÃO apresenta uma funcionalidade da Linguagem SQL.', '4', 3, 'A SQL tem a capacidade de especificar as restrições genéricas, chamadas asserções, usando o comando CREATE ASSERTION.', 'A SQL possui construtores de linguagem para a especificação de visões (views), também conhecidas como tabelas virtuais, usando o comando CREATE VIEW.', 'A SQL possui construtores de linguagem para a criação de gatilhos (triggers).', 'A SQL possui comandos para controle de transações.', 'A SQL possui comandos capazes de garantir a replicação de dados na arquitetura MASTER e SLAVE.'),
(17, 'lmab', 1, 'Assinale a seguir a alternativa que NÃO apresenta uma versão do Microsoft Windows Server 2003. ', '2', 4, 'Windows Server 2003, Web Edition.', 'Windows Server 2003, Standard Edition.', 'Windows Server 2003, Enterprise Edition.', 'Windows Server 2003, Professional Edition.', 'Windows Server 2003, Datacenter Edition.'),
(18, 'lmab', 1, 'O Microsoft Windows Server 2003 suporta várias ferramentas poderosas de linha de comando, que facilitam o gerenciamento do Active Directory. Assinale a alternativa que NÃO apresenta uma destas ferramentas.', '3', 5, ' DSQUICKLY.', 'DSADD.', ' DSGET.', 'DSMOVE.', 'DSQUERY.'),
(19, 'lmab', 1, 'Qual dos parâmetros abaixo o comando DSADD GROUP NÃO pode assumir após o parâmetro ND? ', '5', 1, '-members', '-secgrp', '-scope', '-session', '-samid'),
(20, 'lmab', 1, 'Com relação à linguagem SQL é correto afirmar: ', '4', 2, 'Diferentemente de outras linguagens, considera os valores nulo, zero ou um espaço vazio em branco a mesma coisa.', 'Considerando a existência de uma tabela chamada EMPLOYEE com um campo chave primária chamado ID, a instrução DELETE * FROM EMPLOYEE WHERE ID = 125 está correta.', 'A DML permite criar a estrutura (os metadados) de um banco de dados. Já a DDL permite manipular os dados contidos no banco de dados.', 'São instruções DDL: CREATE DATABASE, CREATE TABLE, ALTER TABLE, CREATE INDEX, UPDATE, DROP INDEX e DROP TABLE.', 'Constraints são definidas para evitar que valores incorretos ou inválidos sejam inseridos. Algumas das principais constraints são: NOT NULL, PRIMARY KEY e CHECK.'),
(21, 'lmab', 4, 'O investimento necessário para montar uma pequena empresa é de R$ 10.000,00. Esse investimento renderá R$ 6.000,00 no final do primeiro ano, e R$ 5.500,00 no final do segundo. Depois desses dois anos, o dono dessa empresa pretende fechá-la. A taxa interna de retorno (TIR), anual, desse projeto é', '2', 1, '1%', '1,5%', '5%', '10%', '15%'),
(22, 'lmab', 4, 'No Brasil, quase toda a produção de latas de alumínio é reciclada. As empresas de reciclagem pagam R$ 320,00 por 100 kg de latas usadas, sendo que um quilograma corresponde a 74 latas.', '1', 2, '23,15', '23,98', '28,80', '28,96', '30,40'),
(23, 'lmab', 4, 'Uma moeda não tendenciosa é lançada até que sejam obtidos dois resultados consecutivos iguais. Qual a probabilidade de a moeda ser lançada exatamente três vezes?', '2', 3, '1/8', '1/4', '1/3', '1/2', '3/4'),
(24, 'lmab', 4, 'Uma loja oferece um aparelho celular por R$ 1.344,00 à vista. Esse aparelho pode ser comprado a prazo, com juros de 10% ao mês, em dois pagamentos mensais iguais: um, no ato da compra, e outro, um mês após a compra.  O valor de cada um dos pagamentos mensais é, em reais, de', '1', 4, '704,00', '705,60', '719,00', '739,20', '806,40'),
(25, 'lmab', 4, 'Um investimento rende a taxa nominal de 12% ao ano com capitalização trimestral. A taxa efetiva anual do rendimento correspondente é, aproximadamente,', '1', 5, '12%', '12,49%', '12,55%', '13%', '13,43%'),
(26, 'lmab', 4, 'João tomou um empréstimo de R$ 900,00 a juros compostos de 10% ao mês. Dois meses depois, João pagou R$ 600,00 e, um mês após esse pagamento, liquidou o empréstimo. O valor desse último pagamento foi, em reais, aproximadamente,', '2', 1, '240,00', '330,00', '429,00', '489,00', '538,00'),
(27, 'lmab', 5, 'Um casal de idosos determinou, em testamento, que a quantia de R$ 4.950,00 fosse doada aos três filhos de seu sobrinho que os ajudara nos últimos anos. O casal determinou, também, que a quantia fosse distribuída em razão inversamente proporcional à idade de cada filho por ocasião da doação. Sabendo que as idades dos filhos eram 2, 5 e x anos respectivamente, e que o filho de x anos recebeu R$ 750,00, a idade desconhecida é, em anos,', '2', 2, '4', '6', '7', '9', '8'),
(28, 'lmab', 5, 'Em fevereiro de 2012, quatro irmãos, todos nascidos em janeiro, respectivamente nos anos de 1999, 1995, 1993 e 1989, se reuniram para abrir o testamento do pai que havia morrido pouco antes. Estavam ansiosos para repartir a herança de R$ 85.215,00. O texto do testamento dizia que a herança seria destinada apenas para os filhos cuja idade, em anos completos e na data da leitura do testamento, fosse um número divisor do valor da herança. Os filhos que satisfizessem essa condição deveriam dividir igualmente o valor herdado. O que cada filho herdeiro recebeu foi', '3', 3, 'R$ 85.215,00.', 'R$ 42.607,50.', 'R$ 28.405,00.', 'R$ 21.303,75.', 'R$ 0,00.'),
(29, 'lmab', 5, 'O dono de uma obra verificou que, com o ritmo de trabalho de 15 trabalhadores, todos trabalhando apenas 4 horas por dia, o restante de sua obra ainda levaria 12 dias para ser encerrado. Para terminar a obra com 9 dias de trabalho o dono da obra resolveu alterar o número de horas de trabalho por dia dos trabalhadores. Com a proposta feita, cinco trabalhadores se desligaram da obra. Com o pessoal reduzido, o número de horas de trabalho por dia aumentou ainda mais e, mesmo assim, houve acordo e as obras foram retomadas, mantendo-se o prazo final de 9 dias. Após três dias de trabalho nesse novo ritmo de mais horas de trabalho por dia, cinco trabalhadores se desligaram da obra. O dono desistiu de manter fixa a previsão do prazo, mas manteve o número de horas de trabalho por dia conforme o acordo. Sendo assim, os trabalhadores restantes terminaram o que faltava da obra em uma quantidade de dias igual a ', '4', 4, '42.', '36.', '24.', '12.', '8.'),
(30, 'lmab', 5, 'Para cadastrar-se em um site de compras coletivas, Guilherme precisará criar uma senha numérica com, no mínimo, 4 e, no máximo, 6 dígitos. Ele utilizará apenas algarismos de sua data de nascimento: 26/03/1980.', '3', 5, '5.040', '8.400', '16.870', '20.160', '28.560'),
(31, 'lmab', 5, 'Um grupo de 40 pessoas, homens e mulheres, está reunido em uma sala. Todos têm mais de 30 e menos de 50 anos. Alguns homens têm menos de 40 anos, e algumas mulheres, mais de 35 anos. Considere que a idade de cada pessoa seja representada por um número inteiro (anos completados até a presente data). Desse modo, afirma-se que, nesse grupo, há', '5', 1, '19 pessoas, no mínimo, de idades diferentes.', ' um homem, pelo menos, de 45 anos.', 'alguma mulher de 39 anos.', 'pessoas com a mesma idade.', 'um homem e uma mulher, necessariamente, cujas idades são iguais.'),
(32, 'lmab', 5, 'Uma pessoa dispõe de balas de hortelã, de caramelo e de coco e pretende “montar” saquinhos com 13 balas cada, de modo que, em cada saquinho, haja, no mínimo, três balas de cada sabor. Um saquinho diferencia-se de outro pela quantidade de balas de cada sabor. Por exemplo, seis balas de hortelã, quatro de coco e três de caramelo compõem um saquinho diferente de outro que contenha seis balas de coco, quatro de hortelã e três de caramelo. Sendo assim, quantos saquinhos diferentes podem ser “montados”?', '4', 2, '4', '6', '9', '12', '15'),
(33, 'lmab', 5, 'Marcelo vai passar quatro dias na praia e leva em sua bagagem sete camisetas (três camisetas brancas diferentes, uma preta, uma amarela, uma vermelha e uma laranja) e quatro bermudas (uma preta, uma cinza, uma branca e uma azul). De quantos modos distintos Marcelo poderá escolher uma camiseta e uma bermuda para vestir-se, de modo que as peças escolhidas sejam de cores diferentes?', '5', 3, '14', '17', '24', '26', '28'),
(34, 'lmab', 5, 'Se todos os anagramas da palavra BRASIL forem dispostos em ordem alfabética, o primeiro anagrama cuja última letra é “B” ocupará que posição?', '3', 4, '5ª', '25ª', '34ª', '49ª', '121ª'),
(35, 'lmab', 5, 'Eu sou homem. O filho de Cláudio é pai do meu filho. Nesse caso, o que sou de Cláudio?', '1', 2, 'Pai.', 'Avô.', 'Neto.', 'Filho.', 'Bisavô.'),
(36, 'lmab', 5, 'Existem três caixas idênticas e separadas umas das outras. Dentro de cada uma dessas caixas existem duas caixas menores, e dentro de cada uma dessas caixas menores outras seis caixas menores ainda. Separando-se todas essas caixas, tem-se um total de caixas igual a: ', '2', 3, '108.', '45.', '39.', '36.', '72.'),
(37, 'lmab', 5, 'Quando volta a energia elétrica depois de um período sem energia, um rádio relógio elétrico reinicia a marcação do horário das 12:00. Plínio esteve ausente de sua casa por 10 horas e, ao retornar, notou que seu rádio relógio marcava 16:35, quando o horário correto deveria ser 19:40. Sabendo que a diferença de horário se deve à falta de luz em um intervalo de tempo do período em que Plínio esteve fora de casa, o horário em que se deu o início da falta de energia elétrica foi:', '3', 4, '16:05.', '15:05.', '14:05.', '16:35.', '18:35.'),
(38, 'lmab', 5, 'Cada 100 kg de material A usado para reciclagem permite a produção de 25 kg do material B. Cada 200 kg de material B usado para reciclagem permite a produção de 8 kg do material C. A produção de 100 kg do material C, apenas com o uso de material B reciclado a partir do material A, exigirá uma quantidade do material A, em quilogramas, igual a:', '4', 5, '12 mil.', '10 mil.', '1 mil.', '8 mil.', '4 mil.'),
(39, 'lmab', 5, 'Qual é o capital no qual uma taxa de 13% foi aplicada resultando R$ 52.000,00 de porcentagem? ', '2', 1, '250.000,00', '4.000,00', '6.760,00', '400.000,00', '452.000,00.'),
(40, 'lmab', 5, 'Qual das relações abaixo representa uma função? ', '5', 2, 'R={(-2, 0), (-2, 0), (0, 2), (1, 1)}', 'S={(-2, 0), (-2, 0), (1, 2), (1, 1)}', 'T={(-2, 3), (0, 1), (1, 2)}', 'U={(-2, 0), (0, 0), (1, 2), (1, 1)}', 'V= {(1, 0), (0, 1), (1, 1)}'),
(41, 'lmab', 6, 'Sobre os firewalls é correto afirmar: ', '4', 3, 'Protegem contra ameaças internas, como um funcionário insatisfeito ou um funcionário que coopera, sem querer, com um atacante externo.', 'Protegem contra a transferência de programas ou arquivos infectados por vírus varrendo todos os arquivos, mensagens e e-mails que chegam, em busca de vírus.', 'Apesar de um firewall oferecer local para monitorar eventos relacionados à segurança, auditorias e alarmes não podem ser implementados no sistema de firewall.', ' Definem um único ponto de estrangulamento que mantém usuários não autorizados fora da rede protegida e oferecem proteção contra diversos tipos de ataques de falsificação e roteamento do IP.', 'São plataformas convenientes exclusivamente para funções da Internet que estão relacionadas à segurança, como determinar os serviços de Internet que podem ser acessados, filtrar o tráfego com base no IP etc.'),
(42, 'lmab', 6, 'O protocolo DNS, usado para transformar nomes de máquinas em endereços de rede, é construído com base em consultas a registros de recursos (RR) que possuem um tipo, como, por exemplo:', '5', 4, 'COM, ORG e BR.', 'A, NS, TXT e MX.', 'authoritative e non-authoritative.', 'GLUE e RECURSIVE.', 'question, reply e authority.'),
(43, 'lmab', 6, 'Redes Ethernet que usam switches no lugar de hubs como ponto de conexão central para as máquinas conectadas a elas possuem como vantagem ', '4', 5, 'a homogeneidade dos enlaces, garantido que todas as portas tenham a mesma velocidade.', 'a capacidade de processar pacotes até o nível de rede, simplificando a administração.', 'a eliminação de colisões, permitindo que a vazão total roteada seja proporcional ao número de portas.', 'a filtragem de pacotes com base no endereço IP do remetente, aumentando a segurança da rede.', 'a ausência de buffers no switch, permitindo um desempenho mais uniforme e previsível.'),
(44, 'lmab', 6, 'Considerando o conjunto de protocolos da Internet, o protocolo TCP ', '3', 1, 'é um protocolo simples e leve, que provê serviços sem conexão.', ' provê um serviço de entrega confiável de mensagens orientado a conexão.', 'provê um serviço de entrega não-confiável de mensagens.', 'não limita a taxa de envio de pacotes de dados, maximizando a utilização da capacidade do enlace.', 'é apropriado para aplicações de tempo real, pois entrega todos os pacotes dentro de um limite de tempo pré-estabelecido.'),
(45, 'lmab', 6, 'Sistemas operacionais baseado em Unix, como o Linux, permitem administração remota através de SSH. Este protocolo fornece uma linha de comando remota segura,', '5', 1, 'mas não possui mecanismos para identificação segura de máquinas remotas.', 'nunca permitindo o uso de mecanismos de autenticação que usem senhas devido a sua inerente insegurança.', 'nunca permitindo a execução de aplicações gráficas remotamente devido ao risco de serem controladas por atacantes.', 'transmitindo senhas em texto claro durante a autenticação para maior segurança.', 'livre de interceptação dos dados transmitidos e das informações de autenticação.'),
(46, 'lmab', 6, 'O sistema de virtualização VMware, quando executado em um processador x86 sem extensões de virtualização, se comporta como um hipervisor:', '4', 2, '', 'tipo 2, empregando tradução binária para acelerar a execução do hóspede.', 'tipo 1, empregando trap and emulate para acelerar a execução do hóspede.', 'tipo 1, empregando interpretação pura para acelerar a execução do hóspede.', ' tipo 1, emulando apenas os dispositivos de E/S para acelerar a execução do hóspede.'),
(47, 'lmab', 6, 'Um firewall é um mecanismo que isola uma rede do resto da Internet por meio ', '5', 3, 'da verificação de vírus de computador e outros tipos de malware em mensagens de e-mail.', 'da autenticação de usuários por meio de mecanismos biométricos.', 'da filtragem seletiva de pacotes, usando apenas informações do cabeçalho do pacote.', 'do estabelecimento de uma área de alta segurança, chamada DMZ (demilitarized zone), ao redor do gateway.', 'da verificação de assinaturas de ataques contidas em um banco de dados.'),
(48, 'lmab', 6, 'Um sistema criptográfico de chaves públicas, como o RSA, permite que um usuário autentique uma mensagem com uma assinatura digital cifrando esta mensagem', '1', 4, 'com a sua chave privada.', 'com a sua chave pública.', 'com a chave privada do destinatário da mensagem.', 'com a chave pública do destinatário da mensagem.', 'duas vezes, uma com a chave pública e outra com a chave privada do destinatário da mensagem.'),
(49, 'lmab', 6, 'Um conjunto de discos configurados para funcionar em RAID nível 5 escrevem os dados em ', '2', 5, ' faixas de k setores distribuídas consecutivamente pelos discos, com mais uma faixa de paridade em um disco de paridade.', 'bits distribuídos consecutivamente pelos discos, com mais um bit de paridade em um disco de paridade.', 'faixas de k setores distribuídas consecutivamente pelos discos.', 'faixas de k setores duplicadas e distribuídas consecutivamente pelos discos.', 'faixas de k setores distribuídas consecutivamente pelos discos, com mais uma faixa de paridade intercalada uniformemente entre todos os discos.'),
(50, 'lmab', 6, 'A função de Servidor DNS no Windows Server 2008 apresenta quatro novos recursos aprimorados para oferecer novas habilidades ao serviço de Servidor DNS ou para melhorar seu desempenho; dentre eles, é INCORRETO incluir: ', '3', 1, 'nomes únicos globais.', 'carregamento de zona em segundo plano.', 'suporte a IP versão 6 (Ipv6).', 'suporte a controladores de domínio somente para leitura (RODC).', 'suporte ao Protocolo de Status de Certificados Online.'),
(51, 'lmab', 6, 'É um dispositivo que não só examina os cabeçalhos de todos os pacotes que passam por ele, mas também executa uma inspeção profunda de pacote. Quando tal dispositivo observa o pacote suspeito, ou uma série de pacotes suspeitos, ele envia um alerta ao administrador da rede que pode examinar o tráfego minuciosamente e tomar as ações necessárias.  O dispositivo citado acima é conhecido como', '5', 2, ' IPS.', ' IDS.', 'Firewall de filtragem de pacotes.', 'SSL.', 'DMZ.'),
(52, 'lmab', 6, 'Sobre os rootkits é correto afirmar: ', '5', 3, 'O nome rootkit indica que as ferramentas que o compõem são usadas exclusivamente para obter acesso privilegiado (root ou Administrator) em um computador.', ' Podem fornecer sniffers, para capturar informações na rede onde o computador está localizado, como, por exemplo, senhas que estejam trafegando em claro, ou seja, sem qualquer método de criptografia.', 'Pode fornecer programas com as mais diversas funcionalidades, exceto backdoors que servem para assegurar o acesso futuro do invasor ao computador comprometido.', 'São projetados para ficarem visíveis juntamente com uma aplicação conhecida. Sua identificação é sempre uma tarefa bem fácil.', 'São um softwares construídos exclusivamente para capturar e armazenar as teclas digitadas pelo usuário. Dentre as informações capturadas podem estar senhas bancárias, números de cartões de crédito etc.'),
(53, 'lmab', 6, 'O TCP/IP é um conjunto de protocolos de comunicação utilizado em redes de computadores. Ele é dividido em várias camadas, onde cada camada é responsável pela execução de uma tarefa. O procolo UDP é utilizado na camada ', '4', 2, 'de sessão.', 'de internet.', 'da aplicação.', 'física.', 'de transporte.'),
(54, 'lmab', 6, 'Em uma rede de computadores utilizando o padrão Fast Ethernet, a taxa nominal de transmissão é de ', '3', 5, '10 megabytes por segundo.', '100 megabytes for segundo.', '10 megabits por segundo.', '100 megabits por segundo.', '100 gigabits por segundo.'),
(55, 'lmab', 6, 'Numa rede com topologia estrela, esse equipamento repete para todas as suas portas os bits que chegam, de forma semelhante ao que ocorre na topologia linear. Isso significa que se um computador enviar um pacote para outro, todas as demais estações conectadas nesse equipamento receberão esse mesmo pacote e perderão tempo para descartá-lo.  O equipamento citado é o ', '5', 1, 'hub.', 'switch.', 'modem.', 'roteador estático.', 'roteador dinâmico.'),
(56, 'lmab', 6, 'No modelo de referência TCP/IP, a camada responsável por converter as tensões elétricas recebidas pela placa de rede em bits 0 ou 1 é a camada', '4', 2, 'física.', 'de rede.', 'de enlace.', 'inter-redes.', 'de link de dados.'),
(57, 'lmab', 6, 'Na comunicação de dados:', '3', 3, 'Somente sinais digitais podem ser utilizados para transportar o conteúdo de informação.', 'A largura de banda é uma propriedade física do meio de transmissão.', 'Apenas sinais analógicos são constituídos por diferentes frequências.', 'Sinais digitais não sofrem os efeitos prejudiciais que conduzem à atenuação do sinal.', 'Apenas sinais analógicos podem ser utilizados para transportar o conteúdo de informação.'),
(58, 'lmab', 6, 'É um meio de transmissão no qual os repetidores somente são necessários a cada 50 quilômetros de distância em linhas longas; não desperdiça luz e dificilmente é interceptada. Trata-se de.', '5', 4, ' fibra ótica.', 'cabo coaxial.', ' rádio.', 'par trançado, categoria 7.', 'par trançado, categoria 6.'),
(59, 'lmab', 6, 'Numa área ocupada por uma corporação, a rede que utiliza a faixa de frequência de 2.4 GHz é configurada com estações base estrategicamente posicionadas e conectadas à fiação de cobre ou fibra ótica. A potência de transmissão das estações base e das demais estações é ajustada para alcance não superior à 5 metros, tornando cada sala uma única célula, cujo canal cobre toda a largura de banda disponível (11 a 54 Mbps) e todas as estações em sua célula. A rede em questão é uma WLAN, padrão IEEE 802.11 ', '4', 2, 'a', 'b', 'g', 'n', 'ac'),
(60, 'lmab', 6, 'Uma das características do Quality of Service (QoS) em redes de computadores é que', '2', 1, 'em caso de queda de desempenho da rede abaixo de um certo limiar, um alarme é acionado para que outros servidores de rede possam ajudar no roteamento dos pacotes.', 'servidores de rede garantem atender toda a demanda de comunicação sem perda de pacotes nem atrasos.', 'aplicações que necessitam de maior confiabilidade na transmissão usam um canal reservado nos servidores que tem QoS.', 'conexões de rede têm banda suficiente para atender a demanda de comunicação, evitando que os servidores de rede fiquem sobrecarregados.', 'aplicações que necessitam de maior confiabilidade na transmissão marcam seus pacotes para que os servidores de rede possam dar tratamento diferenciado.'),
(61, 'lmab', 2, 'Considere a afirmativa abaixo. O Registro do Windows é um banco de dados hierárquico que armazena opções de configuração nos Sistemas Operacionais Microsoft Windows. Nele estão configurações de componentes de baixo nível do sistema operacional bem como de aplicações rodando na plataforma: o núcleo (''kernel''), ''drivers'' de dispositivos, serviços, SAM, interface de usuário e aplicações de terceiros. O Registro também dá acesso a contadores para análise de desempenho. Esta afirmativa é ', '5', 2, 'correta.', ' incorreta porque o registro não é um banco de dados hierárquico.', 'incorreta porque o registro não armazena informações do núcleo (''kernel'').', ' incorreta porque o registro não dá acesso a contadores para análise de desempenho.', 'incorreta porque o registro não armazena informação referente ao SAM.'),
(62, 'lmab', 2, 'Quando a memória é alocada dinamicamente, o sistema operacional deve gerenciá-la, em termos gerais, de duas maneiras: ', '2', 3, 'relocação e proteção.', 'paginação e troca de processos.', 'proteção e mapa de bits.', 'mapa de bits e lista de disponíveis.', 'troca de processos e relocação.'),
(63, 'lmab', 2, 'Quando segmentos de memória alocados a processos e segmentos de memória livres são mantidos em uma lista ordenada por endereço, é possível utilizar diversos algoritmos para alocar memória a um processo recém criado. Presumindo que o gerenciador de memória saiba o tamanho de memória que deve ser alocada ao processo, ele procurará ao longo da lista de segmentos de memória por um segmento livre que seja suficientemente grande para esse processo. O segmento é quebrado em duas partes, se for o caso, sendo uma parte alocada ao processo e a sobra transforma-se em um segmento de memória livre. O texto trata do algoritmo ', '5', 4, 'next fit.', 'first fit.', 'best fit.', ' worst fit.', 'back fit.'),
(64, 'lmab', 2, 'Em relação à implementação de um sistema de arquivos e aos tamanhos das tabelas de arquivos usadas pelo método de alocação por lista encadeada, aqui tratada por tabela de arquivos, e ao método de alocação i-nodes, aqui tratado por tabela de i-nodes, é correto afirmar que o tamanho', '4', 3, 'das duas tabelas, a de arquivos e a de i-nodes, é proporcional apenas ao número de arquivos abertos.', 'da tabela de i-nodes é proporcional ao tamanho do disco.', 'da tabela de i-nodes se relaciona proporcionalmente ao tamanho dos arquivos abertos e ao tamanho do disco.', 'da tabela de arquivos é proporcional ao tamanho do disco.', 'da tabela de arquivos se relaciona proporcionalmente ao tamanho dos arquivos abertos e ao tamanho do disco.'),
(65, 'lmab', 2, 'As distribuições Linux utilizam sistemas de arquivos padronizados para organizarem os dados na gravação e na leitura. O recurso denominado Journaling permite recuperar um sistema após um desastre no disco em uma velocidade muito maior que nos sistemas de arquivos que não o utilizam. Sistemas de arquivos que empregam esse recurso, utilizados pelo Linux, são', '5', 1, ' REISERFS e EXT3.', 'REISERFS e VFAT.', 'EXT2 e EXT3.', 'EXT1 e VFAT.', 'EXT2 e VFAT.'),
(66, 'lmab', 2, 'O Linux é uma variante open source do Unix. De modo geral, o sistema de arquivos inclui o diretório raiz e um conjunto mínimo de arquivos e sub-diretórios. Dois diretórios são de grande importância; o primeiro, que armazena a maioria dos programas padrão, juntamente com manuais online e bibliotecas; o segundo, que abriga arquivos de configuração e dados específicos ao sistema, como diretórios spool, arquivos de log, além de informações contábeis. Esses diretórios são conhecidos, respectivamente, por', '4', 2, '/usr e /lib.', '/usr e /var.', '/bin e /lib.', '/bin e /var.', '/bin2 e /var.'),
(67, 'lmab', 2, 'Analisando-se as características do Sistema Operacional Windows Vista e Windows 7, verifica-se que a maior deficiência da versão de 32 bits em relação a de 64 bits é a impossibilidade de acesso à memória RAM do tipo DDR, para valores acima de ', '2', 3, '1 GB.', '2 GB.', '3 GB.', '4 GB.', '5 GB.'),
(68, 'lmab', 2, 'Sobre o processo de instalação e configuração do Windows Server 2003 é correto afirmar: ', '3', 3, 'Ao configurar a placa de rede do servidor é necessário configurar o protocolo TCP/IP, definindo um endereço dinâmico dentro da rede, pois no processo de instalação não é possível definir um endereço estático.', 'Uma boa instalação do Windows Server 2003 não é finalizada com a instalação do produto, pois uma série de procedimentos técnicos deve ser realizada após a instalação, com o objetivo de garantir segurança na rede e a melhor performance possível.', 'Não é possível instalar o servidor em um domínio já existente.', 'O nome do servidor não deve passar de 50 caracteres e a senha para a conta Administrador do servidor não pode conter caracteres como @, !, ? e outros.', 'Não é aconselhável dividir o disco em partições, pois será necessário todo o espaço disponível para armazenar o sistema operacional, os aplicativos e os dados.'),
(69, 'lmab', 2, 'No Linux, a quantidade de serviços ativos está diretamente relacionada ao nível de exposição do servidor. Quanto mais serviços, mais portas para serem pesquisadas e abusadas, e maiores as chances de algum serviço conter alguma vulnerabilidade que possa ser explorada em uma invasão do sistema. O comando presente em diversas distribuições Linux e que permite finalizar serviços desnecessários é o ', '5', 2, 'cron.', 'srvstop.', 'chmod.', 'chkconfig.', 'ifconfig.'),
(70, 'lmab', 2, 'O disco rígido do computador pode ser divido em partes lógicas, chamadas de partições, que são formatadas para um devido sistema de arquivos. O sistema de arquivos desenvolvido especificamente para sistemas operacionais Linux é chamado de ', '1', 2, 'FAT32.', 'EXT2.', 'iso9660.', 'HFS+.', 'NTFS.'),
(71, 'lmab', 1, 'Abaixo estão elencadas características inerentes à 1a, 2a e 3a formas normais, utilizando-se os conceitos de tabelas, linhas e colunas. A característica que define exclusivamente a 2a FN, diferenciando-a da 1a FN, e não caracterizando-a como 3a FN, é:', '3', 1, ' nenhuma coluna não-chave depende parcialmente da chave primária;', 'todas as colunas contêm somente valores atômicos;', 'nenhuma coluna não-chave é determinada transitivamente pela chave primária;', 'todas as linhas da tabela são unívocas;', 'nenhuma coluna não-chave é funcionalmente independente da chave primária.'),
(74, 'lmab', 1, 'Para remover uma asserção utilizamos o comando...', '1', 3, 'DELETE ASSERTION', 'REMOVE ASSERTION', 'DROP ASSERTION', 'APAGAR ASSERTION', 'SELECT ASSERTION'),
(75, 'lmab', 1, 'O que faz o comando SHOULD?', '1', 4, 'Deleta uma tabela.', 'Deleta um registro da tabela.', 'Mostra a estrutura de uma tabela.', 'Não existe.', 'Indica que uma coluna deveria ser de um tipo.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_resolucao`
--

DROP TABLE IF EXISTS `tb_resolucao`;
CREATE TABLE IF NOT EXISTS `tb_resolucao` (
  `Id_Resolucao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Cadastrante` varchar(20) NOT NULL,
  `Id_Questao` int(10) unsigned NOT NULL,
  `DataRealizacao` date NOT NULL,
  `Acertou` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id_Resolucao`),
  KEY `Cadastrante` (`Cadastrante`),
  KEY `Id_Questao` (`Id_Questao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

DROP TABLE IF EXISTS `tb_usuario`;
CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `Usuario_Login` varchar(20) NOT NULL,
  `Senha` char(41) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `Nome` varchar(200) NOT NULL,
  `Data_Nascimento` date NOT NULL,
  `Telefone` varchar(13) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Rua` varchar(100) NOT NULL,
  `Numero` varchar(10) NOT NULL,
  `Bairro` varchar(100) NOT NULL,
  `Complemento` varchar(100) DEFAULT NULL,
  `Cidade` varchar(100) NOT NULL,
  `Estado` varchar(100) NOT NULL,
  `Cep` varchar(10) NOT NULL,
  `TipoUsuario` enum('1','2','3') NOT NULL,
  `Cadastrante` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Usuario_Login`),
  KEY `Cadastrante` (`Cadastrante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`Usuario_Login`, `Senha`, `Nome`, `Data_Nascimento`, `Telefone`, `Email`, `Rua`, `Numero`, `Bairro`, `Complemento`, `Cidade`, `Estado`, `Cep`, `TipoUsuario`, `Cadastrante`) VALUES
('aluno_teste', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'Aluno Teste', '1991-03-05', '(45)6464-5454', 'aluno2@teste.com', 'rua teste2', '2229', 'bairro teste', 'teste1', 'Manaus', 'Rondonia', '69500-002', '3', 'lmab'),
('lmab', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'Leandro Mauricio Bentes', '1991-01-01', '(12)2424-5455', 'lmab.eng@uea.edu.br', 'Pedrinhas', '1234', 'Japim', '11', 'Manaus', 'Amazonas', '69050-121', '1', NULL),
('professor_teste', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'Professor Teste', '1990-09-15', '(56)5656-5656', 'prof@gmail.com', 'Rua 8', '1441', 'Aleixo', 'Condominio Juju', 'Manaus', 'Amazonas', '69085-522', '2', 'lmab');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `tb_area`
--
ALTER TABLE `tb_area`
  ADD CONSTRAINT `tb_area_ibfk_1` FOREIGN KEY (`Cadastrante`) REFERENCES `tb_usuario` (`Usuario_Login`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para a tabela `tb_assunto`
--
ALTER TABLE `tb_assunto`
  ADD CONSTRAINT `tb_assunto_ibfk_1` FOREIGN KEY (`Id_Disciplina`) REFERENCES `tb_disciplina` (`Id_Disciplina`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_assunto_ibfk_2` FOREIGN KEY (`Cadastrante`) REFERENCES `tb_usuario` (`Usuario_Login`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para a tabela `tb_disciplina`
--
ALTER TABLE `tb_disciplina`
  ADD CONSTRAINT `tb_disciplina_ibfk_1` FOREIGN KEY (`Id_Area`) REFERENCES `tb_area` (`Id_Area`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_disciplina_ibfk_2` FOREIGN KEY (`Cadastrante`) REFERENCES `tb_usuario` (`Usuario_Login`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para a tabela `tb_questao`
--
ALTER TABLE `tb_questao`
  ADD CONSTRAINT `tb_questao_ibfk_1` FOREIGN KEY (`Id_Assunto`) REFERENCES `tb_assunto` (`Id_Assunto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_questao_ibfk_2` FOREIGN KEY (`Cadastrante`) REFERENCES `tb_usuario` (`Usuario_Login`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para a tabela `tb_resolucao`
--
ALTER TABLE `tb_resolucao`
  ADD CONSTRAINT `tb_resolucao_ibfk_1` FOREIGN KEY (`Cadastrante`) REFERENCES `tb_usuario` (`Usuario_Login`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_resolucao_ibfk_2` FOREIGN KEY (`Id_Questao`) REFERENCES `tb_questao` (`Id_Questao`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `fk_tb_usuario_tb_usuario1` FOREIGN KEY (`Cadastrante`) REFERENCES `tb_usuario` (`Usuario_Login`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
