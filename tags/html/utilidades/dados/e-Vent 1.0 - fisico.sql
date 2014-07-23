-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.



CREATE TABLE Cidade (
cod_cidade integer PRIMARY KEY,
nome varchar(40)
);

CREATE TABLE Telefone (
cod_telefone integer PRIMARY KEY,
cod_usuario integer,
fone varchar(12)
);

CREATE TABLE Usuario_Atividade (
cod_usario integer,
cod_atividade integer,
funcao enum("ministrante","monitor"),
PRIMARY KEY(cod_usario,cod_atividade)
);

CREATE TABLE Atividade (
cod_atividade integer PRIMARY KEY,
cod_evento integer,
cod_atividade_tipo integer,
carga_horaria integer,
descricao text,
vagas integer,
titulo varchar(100),
tipo_frequencia ENUM('evento', 'atividade'),
status enum("cancelado","confirmada")
);

CREATE TABLE Usuario (
cod_usuario integer PRIMARY KEY,
data_hora_cadastro datetime,
Dados Número(4),
nome varchar(40),
sobrenome varchar(80),
cpf varchar(11),
rg varchar(10),
login varchar(30),
senha varchar(32),
Contatos Número(4),
cod_cidade integer,
email varchar(100),
endereco varchar(100),
lattes varchar(40),
instituicao varchar(60),
Flags Número(4),
status enum("ativo","inativo"),
notifica integer,
categoria enum("estudante","professor","profissional"),
nivel_acesso enum("super","administrador","comum"),
FOREIGN KEY(cod_cidade) REFERENCES Cidade (cod_cidade)
);

CREATE TABLE Boleto (
cod_boleto integer PRIMARY KEY,
cod_inscricao integer,
cod_barras varchar(30),
status enum("aberto","pago","cancelado"),
data_hora_pagamento datetime
);

CREATE TABLE Evento (
cod_evento integer PRIMARY KEY,
Datas Número(4),
data_inicio date,
data_fim date,
data_publicado date,
Configurações Número(4),
nome varchar(100),
sigla varchar(10),
pagamento char(1),
status enum("andamento","cancelado","publicado","encerrado"),
url_gabarito_atividade varchar(80),
url_gabarito_evento varchar(80)
);

CREATE TABLE Inscricao (
cod_inscricao integer PRIMARY KEY,
cod_usuario integer,
cod_evento integer,
forma_pagamento enum("vista","boleto"),
data_hora datetime,
status enum("andamento","confirmada","cancelada"),
FOREIGN KEY(cod_usuario) REFERENCES Usuario (cod_usuario),
FOREIGN KEY(cod_evento) REFERENCES Evento (cod_evento)
);

CREATE TABLE Usuario_evento (
cod_usuario integer,
cod_evento integer,
funcao enum("coordenador","auxiliar"),
PRIMARY KEY(cod_usuario,cod_evento),
FOREIGN KEY(cod_usuario) REFERENCES Usuario (cod_usuario),
FOREIGN KEY(cod_evento) REFERENCES Evento (cod_evento)
);

CREATE TABLE Certificado (
cod_certificado integer PRIMARY KEY,
cod_inscricao integer,
data_hora_emissao datetime,
data_hora_salvo datetime,
data_hora_enviado datetime,
cod_validacao varchar(100),
FOREIGN KEY(cod_inscricao) REFERENCES Inscricao (cod_inscricao)
);

CREATE TABLE Atividade_tipo (
cod_atividade_tipo integer PRIMARY KEY,
nome varchar(40)
);

CREATE TABLE Valor_atividade_tipo (
cod_atividade_tipo integer,
cod_evento integer,
valor_cat1 integer,
valor_cat2 integer,
valor_cat3 integer,
valor_cat4 integer,
PRIMARY KEY(cod_atividade_tipo,cod_evento),
FOREIGN KEY(cod_atividade_tipo) REFERENCES Atividade_tipo (cod_atividade_tipo),
FOREIGN KEY(cod_evento) REFERENCES Evento (cod_evento)
);

CREATE TABLE Atividade_agenda (
cod_atividade_agenda integer PRIMARY KEY,
cod_local integer,
cod_atividade integer,
data_hora datetime,
FOREIGN KEY(cod_atividade) REFERENCES Atividade (cod_atividade)
);

CREATE TABLE Local (
cod_local integer PRIMARY KEY,
nome varchar(30)
);

CREATE TABLE Agendamento_inscricao (
cod_atividade_agenda integer,
cod_inscricao integer,
valor integer,
frequente enum("S","N"),
observacao text,
PRIMARY KEY(cod_atividade_agenda,cod_inscricao),
FOREIGN KEY(cod_atividade_agenda) REFERENCES Atividade_agenda (cod_atividade_agenda),
FOREIGN KEY(cod_inscricao) REFERENCES Inscricao (cod_inscricao)
);

CREATE TABLE Configuracao (
agencia varchar(10),
conta_corrente varchar(10),
data_evento_visivel date
);

ALTER TABLE Telefone ADD FOREIGN KEY(cod_usuario) REFERENCES Usuario (cod_usuario);
ALTER TABLE Usuario_Atividade ADD FOREIGN KEY(cod_usario) REFERENCES Usuario (cod_usuario);
ALTER TABLE Usuario_Atividade ADD FOREIGN KEY(cod_atividade) REFERENCES Atividade (cod_atividade);
ALTER TABLE Atividade ADD FOREIGN KEY(cod_evento) REFERENCES Evento (cod_evento);
ALTER TABLE Atividade ADD FOREIGN KEY(cod_atividade_tipo) REFERENCES Atividade_tipo (cod_atividade_tipo);
ALTER TABLE Boleto ADD FOREIGN KEY(cod_inscricao) REFERENCES Inscricao (cod_inscricao);
ALTER TABLE Atividade_agenda ADD FOREIGN KEY(cod_local) REFERENCES Local (cod_local);
