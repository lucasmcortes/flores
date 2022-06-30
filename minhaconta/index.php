<?php
	require_once __DIR__.'/../cabecalho.php';
	if (!isset($_SESSION['l_id'])) {
		redirectToLogin();
	}
?>

<corpo>

	<!-- conteudo -->
	<div id='conteudo' class='conteudo'>

		<!-- wrap intro -->
		<div style='min-width:100%;max-width:100%;margin:0 auto;'>
			<!-- sob medida -->
			<div id='medidawrap' class='sectionwrap' style='min-width:100%;max-width:100%;background-position:center;background-image:url(<?php echo $dominio ?>/img/flor.png);'>
				<div class='sectiontexto' style='float:right;'>
					<div class='passos'>
						<p class='descindex' style='text-align:right;'>
							Minha conta
						</p>
						<p class='descindexmenor' style='text-align:right;'>
							Informações
						</p>
					</div>
				</div>
			</div>
			<!-- sob medida -->
		</div>
		<!-- wrap intro -->

	</div>
	<!-- conteudo -->

<?php
	require_once __DIR__.'/../rodape.php';
?>
