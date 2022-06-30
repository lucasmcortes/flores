<?php

include_once __DIR__.'/../../includes/setup.inc.php';
carregaJS();
BotaoFechar();

echo "
	<img style='height:auto;width:100%;max-width:180px;margin-top:-8%;margin-bottom:5%;' src='".$dominio."/img/logo.png'></img>
";

include_once __DIR__.'/../includes/entrar-slot.inc.php';

?>
<script>
	abreFundamental();
	$(document).ready(function() {
		setFulldamental();
	});
</script>
