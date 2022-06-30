<?php
	require_once __DIR__.'/../cabecalho.php';
?>

<corpo>

	<!-- conteudo -->
	<div id='conteudo' class='conteudo'>

		<p class='listatitulo'>
                       Itens
                </p>
                <div class='itenscarrinho itenscarrinhomaior'>
		</div>

		<div style='min-width:100%;max-width:100%;display:flex;'>
			<div style='flex:1;padding:0px 5%;'>
				<p id='loja' class='fechacarrinho botaosecundario produtobotoes sombraabaixo'>
					escolher mais
				</p>
			</div>
			<div style='flex:1;padding:0px 5%;'>
				<p id='comprar' class='produtobotoes sombraabaixo'>
					comprar
				</p>
			</div>
		</div>

		<script>
                        $(document).ready(function() {
	                        $('#comprar').on('click',function() {
	                                window.location.href = '<?php echo $dominio ?>/endereco';
	                        });
	                        $('#loja').on('click',function() {
	                                window.location.href = '<?php echo $dominio ?>/loja';
	                        });

                                atualizaCarrinho();
                                setEscolhas();
                                Progresso();
                                Selecionadas();
                        });
                </script>

	</div>
	<!-- conteudo -->

<?php
	require_once __DIR__.'/../rodape.php';
?>
