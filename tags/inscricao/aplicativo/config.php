<?php

//Contantes de Enderecos
define('MODULO_DIRETORIO', dirname(__FILE__).'/');
define('URL','http://localhost/e-vent/aplicativo/');
define('BASE',MODULO_DIRETORIO);
define('CLASSES',BASE.'classes/');
define('FACHADAS',BASE.'fachada/');
define('PERSISTENCIAS',BASE.'persistencia/');
define('APRESENTACAO',BASE.'apresentacao/');
define('SCRIPTS',URL.'../recursos/js/' );
define('UTILIDADES',BASE.'utilidades.php');
//Constantes de Banco de Dados
//Acesso
define('ACESSO_SERVIDOR','localhost');
define('ACESSO_USUARIO','e_vent');
define('ACESSO_SENHA','3v3nt');
define('ACESSO_NOME_BANCO','e_event_br');
//Convencoes de estados e numeracoes
define('USUARIO_ATIVIDADE_FUNCAO_MINISTRANTE','Ministrante');
define('USUARIO_ATIVIDADE_FUNCAO_MONITOR','Monitor');
define('ATIVIDADE_TIPO_FREQUENCIA_EVENTO','Evento');
define('ATIVIDADE_TIPO_FREQUENCIA_ATIVIDADE','Atividade');
define('ATIVIDADE_STATUS_CONFIRMADA','Confirmada');
define('ATIVIDADE_STATUS_CANCELADA','Cancelada');
define('USUARIO_SEXO_FEMININO','Feminino');
define('USUARIO_SEXO_MASCULINO','Masculino');
define('USUARIO_SEXO_NAO','Nao declarar');
define('USUARIO_CATEGORIA_ESTUDANTE','Estudante');
define('USUARIO_CATEGORIA_PROFESSOR','Professor');
define('USUARIO_CATEGORIA_PROFISSIONAL','Profissional');
define('USUARIO_CATEGORIA_OUTROS','Outros');
define('USUARIO_NIVEL_ACESSO_SUPER','Super');
define('USUARIO_NIVEL_ACESSO_ADM','Administrador');
define('USUARIO_NIVEL_ACESSO_COMUM','Comum');
define('USUARIO_NOTIFICA_SIM','Sim');
define('USUARIO_NOTIFICA_NAO','Nao');
define('USUARIO_STATUS_ATIVO','Ativo');
define('USUARIO_STATUS_INATIVO','Inativo');
define('USUARIO_EVENTO_FUNCAO_COORD','Coordenador');
define('USUARIO_EVENTO_FUNCAO_AUX','Auxiliar');
define('INSCRICAO_HISTORICO_FREQUENTE_NAO_LANCADO','Nao lancado');
define('INSCRICAO_HISTORICO_FREQUENTE_PRESENTE','Presente');
define('INSCRICAO_HISTORICO_FREQUENTE_AUSENTE','Ausente');
define('EVENTO_STATUS_TODOS','%');
define('EVENTO_STATUS_ANDAMENTO','Andamento');
define('EVENTO_STATUS_ENCERRADO','Encerrado');
define('EVENTO_STATUS_CANCELADO','Cancelado');
define('EVENTO_STATUS_PUBLICADO','Publicado');
define('EVENTO_PAGAMENTO_GRATUITO','Gratuito');
define('EVENTO_PAGAMENTO_PAGO','Pago');
define('BOLETO_STATUS_ABERTO','Aberto');
define('BOLETO_STATUS_PAGO','Pago');
define('BOLETO_STATUS_CANCELADO','Cancelado');
define('INSCRICAO_FORMA_PGTO_VISTA','Vista');
define('INSCRICAO_FORMA_PGTO_BOLETO','Boleto');
define('INSCRICAO_FORMA_PGTO_DEPOSITO','Deposito');
define('INSCRICAO_STATUS_ANDAMENTO','Andamento');
define('INSCRICAO_STATUS_CONFIRMADA','Confirmada');
define('INSCRICAO_STATUS_CANCELADA','Cancelada');

?>