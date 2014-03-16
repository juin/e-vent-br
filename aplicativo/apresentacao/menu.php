<?
require_once(dirname(__FILE__).'/../config.php');
//Cria menu de acordo com o nivel de acesso do usuário.
function menu($nivel=NULL){
    switch ($nivel) {
        case 'Super':
            echo    "<li>Inscrições</li>
                     <li>Certificados</li>
                     <li><a href=\"".URL."apresentacao/Evento/eventos.php". "\">Gerenciar Eventos</a></li>
                     <li>Atividades</li>
                     <li>Tipos de Atividades</li>
                     <li>Locais de Atividades</li>
                     <li>Cadastrar Participante</li>
                     <li>Inscrever Participante</li>
                     <li>Pagamentos</li>";
            break;
        case 'Administrador':
            echo    "<li>Inscrições</li>
                     <li>Certificados</li>
                     <li>Gerenciar Eventos</li>
                     <li>Tipos de Atividades</li>
                     <li>Locais de Atividades</li>";
            break;
        default:
            echo    "<li>Inscrições</li>
                     <li>Certificados</li>";
            break;
    }
    
    
}

?>