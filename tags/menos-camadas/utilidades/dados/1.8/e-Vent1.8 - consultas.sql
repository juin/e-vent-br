-- 16:32 16/03/2014

-- Exporta a tabela estado de Cremildo
select cod_estado, nom_estado from estado INTO OUTFILE '/cadastro.txt' FIELDS TERMINATED BY ', ' ENCLOSED BY '''' LINES TERMINATED BY '),\n(';

-- Seleciona as cidades de um determinado estado
select a.nome from Cidade a, Estado b where a.cod_estado = b.cod_estado and b.nome = 'Bahia';