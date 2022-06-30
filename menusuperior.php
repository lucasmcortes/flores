<?php
	include_once __DIR__.'/includes/setup.inc.php';
	carregaJS();
?>

<div id='fecharsuperior'>
	<span style='transform:rotate(-45deg);'></span>
	<span style='transform:rotate(45deg);'></span>
</div>

<div id='outerwrapsuperior'>
	<div class='optionsmenuwrap'>
		<div class='optionsmenuinnerwrap'>

			<div style='min-width:100%;max-width:100%;display: flex;flex-wrap: wrap;align-content: flex-start;justify-content: center;align-items: flex-start;flex-direction: column;'>
				<div style='min-width:100%;max-width:100%;display:inline-block;margin-bottom:8%;'>
					<div style='min-width:100%;max-width:100%;display:inline-block;'>
						<img style='height:auto;width:100%;max-width:180px;float:left;' src='<?php echo $dominio ?>/img/logo.png'></img>
					</div>
				</div>
				<?php
					if (isset($_SESSION['l_id'])) {
						echo "
							<div class='superiorcoluna'>
						                <div class='superiorrow'>
									<a href='".$dominio."' id='superior_inicio' class='superioritem menuitem'>Início</a>
								</div>
						                <div class='superiorrow'>
						                        <a href='".$dominio."/minhaconta' id='superior_minhaconta' class='superioritem menuitem'>Minha conta</a>
								</div>
						                <div class='superiorrow'>
						                        <a href='".$dominio."/carrinho' id='superior_carrinho' class='superioritem menuitem'>Carrinho</a>
								</div>
						                <div class='superiorrow'>
						                        <a href='".$dominio."/loja' id='superior_loja' class='superioritem menuitem'>Loja</a>
								</div>
						                <div class='superiorrow'>
						                        <a href='".$dominio."/contato'id='superior_contato' class='superioritem menuitem'>Fale conosco</a>
								</div>
						        </div>
						";
					} else {
						echo "
							<div class='superiorcoluna'>
						                <div class='superiorrow'>
									<a href='".$dominio."/entrar' id='superior_entrar' class='superioritem menuitem'>Iniciar sessão</a>
								</div>
						                <div class='superiorrow'>
						                        <a href='".$dominio."/carrinho' id='superior_carrinho' class='superioritem menuitem'>Carrinho</a>
								</div>
						                <div class='superiorrow'>
						                        <a href='".$dominio."/loja' id='superior_loja' class='superioritem menuitem'>Loja</a>
								</div>
						                <div class='superiorrow'>
						                        <a href='".$dominio."/contato'id='superior_contato' class='superioritem menuitem'>Fale conosco</a>
								</div>
						        </div>
						";
					} // menu logado:visitante
				?>
			</div>
			<div class='flexbreak'></div>
			<?php
				if (isset($_SESSION['l_id'])) {
					echo "
						<div class='superiorrow'>
							<a href='".$dominio."/entrar/logout'id='superior_encerrar' class='superioritem menuitem'>Encerrar sessão</a>
						</div>
					";
				}
			?>

		</div> <!-- optionsmenuinnerwrap -->
	</div> <!-- optionsmenuwrap -->
</div>

<script>
	abreSuperior();
	fechaSuperior();
	$('#superior_areacliente').on('click', function () {
		window.location.href = '<?php echo $dominio ?>/entrar';
	});
</script>
