	<? if(basename($_SERVER["SCRIPT_NAME"])!="login.php"){ ?>
		<div class="row footer">	
			<div class="large-12 medium-12 small-12 columns foo">	
				<div class="zurb-footer-bottom">	
		  			<div class="large-7 columns">
		  				<ul class="inline-list right">
							<li><a href="#">Sobre</a></li>
							<li><a href="#">Manual</a></li>	
							<li><a href="#">Contato</a></li>		  					
		  				</ul>	
	    			</div>          
	  			</div>		
			</div>
		</div>
	<? } ?>
	<script src="<? echo SCRIPTS_JS; ?>jquery.js"></script>
	<script src="<? echo SCRIPTS_JS; ?>foundation.min.js"></script>
	<script src="<? echo SCRIPTS_JS; ?>foundation.tab.js"></script>
	<script src="<? echo SCRIPTS_JS; ?>foundation.reveal.js"></script>
	<script src="<? echo SCRIPTS_JS; ?>foundation.tooltip.js"></script>
	<script>
		$(document).foundation();
	</script>
	

</body>
</html>
