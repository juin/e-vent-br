<?php

class ModeloConfiguracao{
			
	public function get_url_site(){
		return $this->url_site;		
	}
	
	public function set_url_site(){}
	
	public function get_data_evento_visivel(){
		return $this->data_evento_visivel;
	}
	
	public function set_data_evento_visivel(){}
}

//Define as configurações iniciais do sistema, URL_SITE e DATA_EVENTO_VISIVEL
$config = new ModeloConfiguracao('http://localhost/e-vent/aplicativo','25/01/2014');

?>