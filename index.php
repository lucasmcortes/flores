<?php
	require_once __DIR__.'/cabecalho.php';
?>

<corpo>

	<!-- conteudo -->
	<div id='conteudo' class='conteudo'>

		<!-- wrap intro -->
		<div style='min-width:100%;max-width:100%;margin:0 auto;'>
			<!-- section -->
			<div class='sectionwrap' style='/*background-image:url(<?php echo $dominio ?>/img/olia-gozha-9A_peGrSbZc-unsplash.jpg);*/background-color:aquamarine;'>
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
			<div class='produtoswrap'>

			<?php
				$produtos = new ConsultaDatabase($uid);
				$produtos = $produtos->Produtos();
				if ($produtos[0]['pid']!=0) {
					foreach ($produtos as $produto) {
						if ($produto['ativo']!=0) {
							$item = new ConsultaProduto($uid);
							$item = $item->Produto($produto['pid']);
							echo "
								<div class='wrapitemloja' data-item='".$produto['url']."'>
									<div class='innerwrapitemloja'>
							";
							if ($item['desconto']['quantidade']>0) {
								echo "<p class='descontoitemloja'>".$item['desconto']['exibicao']."</p>";
							}
							echo "
										<div class='wrapimgloja'>
							";

							if (!reset($item['imagens'])) {
								echo "<img class='imgloja' alt='".$item['nome']."' title='".$item['nome']."' aria-label='".$item['nome']."' src='".$dominio."/img/addimg.png'></img>";
							} else {
								echo "<img class='imgloja' alt='".$item['nome']."' title='".$item['nome']."' aria-label='".$item['nome']."' src='".$dominio."/loja/produto/".$produto['url']."/img/".reset($item['imagens'])."'></img>";
							} // imagem produto

							echo "
										</div>
										<div class='wrapinfoloja'>
											<p class='nomeitemloja'>".$item['nome']."</p>
											<div class='precoitemloja'>
												<p class='precodescontoloja'>".Dinheiro($item['preco']['valor'])."</p>
												<p class='precoatual'>".Dinheiro($item['preco']['atual'])."</p>
											</div>
										</div>
							";
										$listas = array_keys($item['listas']);
										$c=1;
										foreach ($listas as $lista) {
											if ($lista=='cor') {
												echo "
													<div class='lojacoreswrap'>
												";
												foreach ($item['listas'][$lista] as $cor) {
													if ($c==1) {echo"<div class='lojacorescontainer'>";}
													CoresTranslator($cor);
													if ($c / 5 == 1) {echo "</div>";}
													$c++;
												} // cada opcao
												echo "
												</div> <!-- lojacoreswrap -->
												";
											} // cor
										} // foreach lista
							echo "
									</div>
								</div>

									<p class='botaoitemloja'>ver produto →</p>
								</div>
							";
						} // produto ativo
					} // foreach produtos
				} // pid != 0
			?>
			</div> <!-- produtoswrap -->

			<!-- section -->
			<div class='sectionwrap' style='/*background-image:url(<?php echo $dominio ?>/img/doug-kelley-rPDuuBEtFI8-unsplash.jpg);*/background-color:orchid;'>
				<!-- como funciona -->
				<div style='min-width:100%;max-width:100%;display:inline-block;'>
					<p class='titulop' style='margin-top:3%;'>
						Como funciona
					</p>
					<div class='comofuncionaouterwrap'>
						<div class='comofuncionawrap'>
							<div class='comofuncionaimg'>
								<img style='width:auto;max-width:55px;height:auto;' src='https://www.ophanim.com.br/img/0111211043.png'></img>
							</div>
							<div class='comofuncionatexto'>
								<p class='comofazemostitle'>
									Identidade
								</p>
								<p class='comofazemosdesc'>
									Evidenciamos as melhores características da sua marca através de dispositivos físicos e digitais
								</p>
							</div>
						</div>
						<div class='comofuncionawrap'>
							<div class='comofuncionaimg'>
								<img style='width:auto;max-width:55px;height:auto;' src='https://www.ophanim.com.br/img/0111211058.png'></img>
							</div>
							<div class='comofuncionatexto'>
								<p class='comofazemostitle'>
									Expressão
								</p>
								<p class='comofazemosdesc'>
									Potencialização da comunicação da sua empresa com os seus clientes em mídias impressas e sociais
								</p>
							</div>
						</div>
						<div class='comofuncionawrap'>
							<div class='comofuncionaimg'>
								<img style='width:auto;max-width:55px;height:auto;' src='https://www.ophanim.com.br/img/0111211101.png'></img>
							</div>
							<div class='comofuncionatexto'>
								<p class='comofazemostitle'>
									Atenção
								</p>
								<p class='comofazemosdesc'>
									As demandas do público interpretadas para aprimoramento da atuação no mercado
								</p>
							</div>
						</div>
					</div>
				</div>
				<!-- como funciona -->
			</div>
			<!-- section -->
			<!-- section -->
			<div class='sectionwrap' style='/*background-image:url(<?php echo $dominio ?>/img/tanalee-youngblood-kkJuQhp9Kw0-unsplash.jpg);*/background-color:forestgreen;'>
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
		</div>
		<!-- wrap intro -->

	</div>
	<!-- conteudo -->

<?php
	require_once __DIR__.'/rodape.php';
?>
