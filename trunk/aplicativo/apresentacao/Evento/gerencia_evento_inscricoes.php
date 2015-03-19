<?php
require_once (dirname(__FILE__) . '/../../config.php');
require_once (APRESENTACAO . 'cabecalho.php');
require_once (PERSISTENCIAS . 'PersistenciaEvento.php');
require_once (PERSISTENCIAS . 'PersistenciaAtividade.php');
require_once (PERSISTENCIAS . 'PersistenciaInscricao.php');
require_once (PERSISTENCIAS . 'PersistenciaUsuario.php');
require_once (UTILIDADES);


$cod_evento = $_GET['cod_evento'];?>
<div class="row">	
		<div class="large-3 medium-3 small-3 columns">
		</div>
			<div class="large-7 medium-7 small-7 columns">		
				<div class="row gerenciamento-usuario-titulo">
					<h2>Gerenciamento de Inscrições</h2>
				</div>
			</div>
</div>
<div class="row corpo">	
		<? require_once(APRESENTACAO.'menu_esquerdo.php'); ?>
		<? $eventos_andamento = PersistenciaEvento::getInstancia()->selecionarEventosPorStatus(EVENTO_STATUS_ANDAMENTO); ?>
		<div class="large-9 medium-9 small-9 columns">
			<div class="panel">
				<select>
					<option>Selecione o evento que deseja consultar</option>
					<? if($eventos_andamento!=NULL){
	                foreach ($eventos_andamento as $andamento) {?>
	                <option id="<? echo $andamento->getCodEvento();?>"><? echo utf8_encode($andamento->getNome())." - ".$andamento->getSigla();?></option>
	                <? } }?>
				</select>
				<?
					$inscricoes = PersistenciaInscricao::getInstancia()->selecionarInscricoesPorEvento(1);
				?>
				<div class="lista-inscricoes">
					<table>
						<thead>
							<th>Código</th>
							<th>Participante</th>
							<th>Data/Hora</th>
							<th>Status</th>
						</thead>
						<tbody>
							<? if($inscricoes!=NULL){
								foreach($inscricoes as $inscricao){?>
							<tr>
								<td><? echo $inscricao->getCodInscricao(); ?></td>
								<? $usuario = PersistenciaUsuario::getInstancia()->selecionarPorCodigo($inscricao->getCodUsuario());?>
								<td><? echo $usuario[0]->getNomeCertificado(); ?></td>
								<td><? echo $inscricao->getDataHoraInscricao(); ?></td>
								<td><? echo $inscricao->getStatus(); ?></td>
							</tr>
							<?	}
							}?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
 	</div>
 <? require_once(APRESENTACAO.'rodape.php');?>