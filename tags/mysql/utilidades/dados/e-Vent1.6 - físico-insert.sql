-- =========================
-- Banco de Dados e-event-br (Insert)
-- =========================

-- =============
-- Tabela Cidade
-- =============
INSERT INTO Cidade (nome) VALUES 
	('cidade 1'),
	('cidade 2'),
	('cidade 3');

-- ==============
-- Tabela Usuario
-- ==============
INSERT INTO Usuario (cod_usuario, nome_certificado, sexo, data_nascimento, cpf, rg, login, senha, telefone1, email, instituicao, categoria, nivel_acesso, notifica, status, data_hora_cadastro) VALUES 
	(1, 'Jos� da Silva Xavier', 'Masculino', '1928-05-26', '11111111111', '1111111111', 'josesxavier', '123', '7799876985', 'josesxavier@gmail.com', 'IFBA', 'Estudante', 'Comum', 'Sim', 'Ativo', now()),
	(2, 'Felipe Souza Cruz', 'Masculino', '1989-07-06', '22222222222', '2222222222', 'felipecruz', '123', '7794853678', 'felipecruz@gmail.com', 'Coelba', 'Profissional', 'Comum', 'N�o', 'Ativo', now());

-- =============
-- Tabela Evento
-- =============
INSERT INTO Evento (cod_evento, nome, sigla, data_inicio, data_fim, status, pagamento) VALUES
	(1, 'Semana de Tecnologia da Informa��o', 'Week-IT 2013', '2013-07-04', '2013-07-07', 'Encerrado', 'Gratuito'),
	(2, 'Semana de Ci�ncia e Tecnologia', 'SECITEC 2013', '2013-10-16', '2013-10-20', 'Encerrado', 'Gratuito');

-- =====================
-- Tabela Usuario_Evento (Planeja)
-- =====================
INSERT INTO Usuario_Evento (cod_usuario, cod_evento, funcao) VALUES (1, 1, 'Coordenador');

-- =====================
-- Tabela Atividade_Tipo
-- =====================
INSERT INTO Atividade_Tipo (cod_atividade_tipo, nome) VALUES 
	(1, 'Minicurso'), 
	(2, 'Palestra'), 
	(3, 'Mesa Redonda'), 
	(4, 'Maratona'), 
	(5, 'Atividade Cultural'), 
	(6, 'Atividade Esportiva');

-- ======================
-- Tabela Atividade_Valor
-- ======================
INSERT INTO Atividade_Valor (cod_atividade_tipo, cod_evento, valor_estudante, valor_professor, valor_profissional) VALUES
	(1, 1, 10.0, 20.0, 30.0);

-- ================
-- Tabela Atividade
-- ================
INSERT INTO Atividade (cod_atividade, nome, resumo, conhecimento_aprendido, conteudo_programatico, prerequisito,
publico_alvo, ferramenta, carga_horaria, vagas, tipo_frequencia, status, cod_atividade_tipo, cod_evento) VALUES
	(1, 'Gest�o de Refer�ncias Bibliogr�ficas em Artigos e Monografias com o EndNote', 
	 'O EndNote � um software que permite aos utilizadores guardar, organizar e usar as refer�ncias bibliogr�ficas encontradas nas pesquisas. O objetivo deste minicurso � apresentar os principais recursos do EndNote para que os discentes concluintes, os discentes de inicia��o cient�fica ou pesquisadores possam criar as cita��es e as refer�ncias bibliogr�ficas nos Trabalhos de Conclus�o de Curso e nas publica��es de artigos nacional ou internacional de forma autom�tica e eficiente.',
  	 'Organizar as refer�ncias pesquisadas (livros, artigos, monografias, disserta��es, teses); Importar refer�ncias do Scopus automaticamente para o EndNote; Encontrar refer�ncias em um clique a partir das palavras-chave; Visualizar as refer�ncias em PDF;Inserir as refer�ncias automaticamente em artigos cient�ficos ou monografias utilizando o MS-Word; Mudar o formato de apresenta��o das cita��es e refer�ncias em um clique.',
	 'Organizar as refer�ncias pesquisadas (livros, artigos, monografias, disserta��es, teses); Importar refer�ncias do Scopus automaticamente para o EndNote; Encontrar refer�ncias em um clique a partir das palavras-chave; Visualizar as refer�ncias em PDF;Inserir as refer�ncias automaticamente em artigos cient�ficos ou monografias utilizando o MS-Word; Mudar o formato de apresenta��o das cita��es e refer�ncias em um clique. Cria��o de nova biblioteca; Cria��o manual de refer�ncias; Cria��o autom�tica de refer�ncias; Usando o campo Notes para fichamento; Usando o campo URL para informar o DOI (Digital Object Identifier); Cria��o de grupos; Inserir documento PDF para as refer�ncias; Visualizar refer�ncia em PDF; Pesquisar e ordenar refer�ncias; Estilos bibliogr�ficos para Artigo e TCC (norma ABNT); Inserir cita��o no MS-Word; Inserir v�rias cita��es no MS-Word; Excluir cita��es amb�guas; Excluir autor no MS-Word; Sufixo e prefixo nas cita��es; C�pia de seguran�a.',
	 'Nenhum',
	 'Discentes Concluintes, Discentes de Inicia��o Cient�fica e Pesquisadores',
	 'MS-Word 2007 e EndNote X6',
	 8, 35, 'Atividade', 'Confirmada', 1, 1);
	 
-- ========================
-- Tabela Usuario_Atividade (Trabalha)
-- ========================
INSERT INTO Usuario_Atividade (cod_usuario, cod_atividade, funcao) VALUES
		(1, 1, 'Ministrante'),
		(2, 1, 'Monitor');

-- ============
-- Tabela Local
-- ============
INSERT INTO Local (cod_local, nome, sigla, bloco) VALUES
	(1, 'Lab. de Simula��o Computacional', 'G1', 'Bloco G'),
	(2, 'Lab. de Linguagem de Programa��o I', 'B12', 'Bloco B'),
	(3, 'Lab. de Linguagem de Programa��o II', 'C3/3', 'Bloco C');

-- =======================
-- Tabela Atividade_Agenda
-- =======================
INSERT INTO Atividade_Agenda (cod_atividade_agenda, data, horario_inicio, horario_fim, cod_local, cod_atividade) VALUES
	(1, '2013-06-06', '14:00', '18:00', 2, 1);

-- =========
-- Inscricao
-- =========
INSERT INTO Inscricao (cod_inscricao, cod_usuario, cod_evento, data_hora, forma_pagamento, status) VALUES
	(1, 1, 1, now(), '� vista', 'Confirmada');

-- ===================
-- Inscricao_Historico
-- ===================
INSERT INTO Inscricao_Historico (cod_inscricao, cod_atividade_agenda, valor_pago, frequente) VALUES
	(1, 1, 80.0, 'Presente');

-- ===========
-- Certificado
-- ===========
INSERT INTO Certificado (cod_certificado, data_hora_emissao, cod_validacao, cod_inscricao) VALUES
	(1, now(), 'AB8387CD841sT9672Wqw', 1);

-- ======
-- Boleto
-- ======
-- INSERT INTO Boleto (cod_boleto, cod_barras, data_hora_pagamento, status, cod_inscricao) VALUES
	-- ();

-- ============
-- Configuracao
-- ============
INSERT INTO Configuracao (data_evento_visivel) VALUES
	('2011-01-01');