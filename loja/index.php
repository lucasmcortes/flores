<?php
	require_once __DIR__.'/../cabecalho.php';
?>

<corpo>

	<!-- conteudo -->
	<div id='conteudo' class='conteudo'>
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
										<img class='imgloja' alt='".$item['nome']."' title='".$item['nome']."' aria-label='".$item['nome']."' src='".$dominio."/loja/produto/".$produto['url']."/img/".reset($item['imagens'])."'></img>
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

		<script>
			$('.wrapitemloja').on('click',function() {
				window.location.href='<?php echo $dominio ?>/loja/produto/'+$(this).data('item');
			});

			$('.wrapitemloja').hover(
	                        function() {
	                                $(this).addClass('sombrawrapitemloja');
	                        }, function() {
	                                $(this).removeClass('sombrawrapitemloja');
	                        }
	                );
		</script>


	</div>
	<!-- conteudo -->

<?php
	require_once __DIR__.'/../rodape.php';
?>
