<?
//Cria menu de acordo com o nivel de acesso do usuário.
function menu($nivel=NULL){
    switch ($nivel) {
        case 'Super':
            echo    "<li>Gerenciar Eventos</li>
                     <li>Atividades</li>
                     <li>Tipos de Atividades</li>
                     <li>Locais de Atividades</li>
                     <li>Cadastrar Participante</li>
                     <li>Inscrever Participante</li>
                     <li>Pagamentos</li>";
            break;
        case 'Administrador':
            echo    "<li>Gerenciar Eventos</li>
                     <li>Tipos de Atividades</li>
                     <li>Locais de Atividades</li>";
            break;
        case 'Monitor':
            echo    "<li>Atividades</li>";
            break;
        default:
            
            break;
    }
    
    
}

?>