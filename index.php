<?php
	require_once __DIR__.'/cabecalho.php';
?>

<corpo>

	<!-- conteudo -->
	<div id='conteudo' class='conteudo'>

		<!-- wrap intro -->
		<div style='min-width:100%;max-width:100%;margin:0 auto;'>

			<!-- section -->
			<div class='sectionwrap'>
				<div class='txtintrowrap'>
					<p class='txtintro'>
						Flores e plantas
						<span class='txtintrospan'>
							Sua vida mais bonita
						</span>
					</p>
					<p class='botaointro'>
						conheça a loja
					</p>
				</div>
			</div>
			<!-- section -->

			<div class='produtoswrap'>
			<?php
				$produtos = new ConsultaDatabase($uid);
				$produtos = $produtos->Produtos();
				if ($produtos[0]['pid']!=0) {
					foreach ($produtos as $produto) {
						if ($produto['ativo']!=0) {
							$showcase = new Conforto($uid);
							$showcase = $showcase->Showcase($produto['pid']);
						} // produto ativo
					} // foreach produtos
				} // pid != 0
			?>
			</div> <!-- produtoswrap -->

			<!-- section -->
			<div class='sectionwrap' style='min-height:34vh;/*background-image:url(<?php echo $dominio ?>/img/doug-kelley-rPDuuBEtFI8-unsplash.jpg);*/'>
				<!-- como funciona -->
				<div style='min-width:100%;max-width:100%;display:inline-block;'>
					<p class='titulop' style='margin-top:3%;'>
						Como funciona
					</p>
					<div class='comofuncionaouterwrap'>
						<div class='comofuncionawrap'>
							<div class='comofuncionaimg'>
								<img style='width:auto;max-width:55px;height:auto;' src='<?php echo $dominio ?>/img/truck-icon.png'></img>
							</div>
							<div class='comofuncionatexto'>
								<p class='comofazemostitle'>
									Entrega
								</p>
								<p class='comofazemosdesc'>
									Peços de incríveis para entrega e produtos com entrega grátis
								</p>
							</div>
						</div>
						<div class='comofuncionawrap'>
							<div class='comofuncionaimg'>
								<img style='width:auto;max-width:55px;height:auto;' src='<?php echo $dominio ?>/img/clock-icon.png'></img>
							</div>
							<div class='comofuncionatexto'>
								<p class='comofazemostitle'>
									Prazo
								</p>
								<p class='comofazemosdesc'>
									Tenha os produtos com você rapidamente
								</p>
							</div>
						</div>
						<div class='comofuncionawrap'>
							<div class='comofuncionaimg'>
								<img style='width:auto;max-width:55px;height:auto;' src='<?php echo $dominio ?>/img/bag-icon.png'></img>
							</div>
							<div class='comofuncionatexto'>
								<p class='comofazemostitle'>
									Produtos
								</p>
								<p class='comofazemosdesc'>
									Os melhores produtos selecionados pra você
								</p>
							</div>
						</div>
					</div>
				</div>
				<!-- como funciona -->
			</div>
			<!-- section -->

			<!-- section -->
			<div class='sectionwrap' style='/*background-image:url(<?php echo $dominio ?>/img/olia-gozha-9A_peGrSbZc-unsplash.jpg);*/background-color:azure;'>
				<div class='sectiontexto' style='float:right;'>
					<div class='passos'>
						<p class='descindex' style='text-align:right;'>
							Flores e plantas
						</p>
						<p class='descindexmenor' style='text-align:right;'>
							Decore seus ambientes com mais vida! Agende uma visita e veja como tudo pode ser melhor.
						</p>
					</div>
				</div>
			</div>
			<!-- section -->

			<!-- section -->
			<div class='sectionwrap' style='min-height:34vh;/*background-image:url(<?php echo $dominio ?>/img/tanalee-youngblood-kkJuQhp9Kw0-unsplash.jpg);*/'>
				<div style='min-width:80%;max-width:80%;margin:0 auto;'>
					<div id='testedriveinnerwrap' style='display:flex;flex-direction:column;padding:5% 8%;padding-top:3%;'>
						<p id='testedrivetitle' class='titulop'>
							Inscreva-se
						</p>
						<div id='chamadatestedrive' style='flex:1;'>
							<p class='retorno'>Receba informações sobre descontos e novidades</p>
						</div>
						<div id='formulariotestedrive' style='flex:1;margin-top:3%;'>
							<div class='formularioemaillandingpage'>
								<div style='flex:1;'>
									<label>Seu nome completo</label>
									<input style='min-width:100%;' type='text' placeholder='Seu nome' name='nome' id='nomedrive'>
								</div>
								<div style='flex:1;'>
									<label>Seu melhor e-mail</label>
									<input style='min-width:100%;' type='email' placeholder='E-mail' name='email' id='emaildrive'>
								</div>
							</div>
						</div>
						<p id='testedrive' class='individualcta' style='margin:revert;text-align:center;cursor:pointer;box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;'>Receber</p>
					</div>
				</div>
			</div>
			<!-- section -->
		</div>
		<!-- wrap intro -->

	</div>
	<!-- conteudo -->

	<script>
		$('.botaointro').on('click', function() {
			window.location.href='<?php echo $dominio ?>/loja/';
		});
	</script>

<?php
	require_once __DIR__.'/rodape.php';
?>
