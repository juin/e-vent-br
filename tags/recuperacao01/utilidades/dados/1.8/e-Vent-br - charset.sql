______________________________________________________________________
-- Mostra todos os conjuntos de caracteres
SHOW CHARACTER SET;

-- Mostra todas as variações as coleções que começem com uft8
SHOW COLLATION LIKE 'utf8%';

-- Mostra o conjunto de caractere do banco de dados (e.g., utf8)
SHOW VARIABLES LIKE “character_set_database”;

-- Mostra a coleção do banco de dados (e.g., utf8_general_ci)
SHOW VARIABLES LIKE “collation_database”;

-- Conjunto de caractere da conexão
SHOW VARIABLES LIKE 'character_set%';

-- Coleção da conexão
SHOW VARIABLES LIKE 'collation%';
______________________________________________________________________
-- Iniciar o "SERVIDOR" com conjunto de caractere e coleção utf8
mysqld --character-set-server=utf8 --collation-server=utf8_general_ci

-- Altera o conjunto de caractere do "BANCO DE DADOS"
ALTER DATABASE e_vent_br CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Altera o conjunto de caractere da "TABELA"
ALTER TABLE usuario CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Definir o conjunto de caractere da "CONEXÃO"
SET NAMES 'utf8';
CHARSET 'utf8';
______________________________________________________________________