______________________________________________________________________
-- Mostra informação detalhada das colunas de uma determinada tabela
SHOW FULL COLUMNS FROM tabela\G

-- Exporta dados da tabela participante para o arquivo externo
SELECT * FROM participante INTO OUTFILE '/participante.sql' FIELDS TERMINATED BY ', ' ENCLOSED BY '''' LINES TERMINATED BY '),\n(';

SELECT * from Participante INTO OUTFILE '/cadastro.txt' FIELDS TERMINATED BY ', ' ENCLOSED BY '''' LINES TERMINATED BY '),\n(';

-- Importa dados da tabela participante (Week-IT 2013) para a tabela usuario (e-Vent-Bdr)
LOAD DATA LOCAL INFILE 'c:/participante.txt' INTO TABLE usuario FIELDS TERMINATED BY ';'