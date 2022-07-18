<?php
	require_once __DIR__.'/../../cabecalho.php';
?>

<corpo>

	<!-- conteudo -->
	<div id='conteudo' class='conteudo'>

		<!-- wrap -->
	        <div class='wrap'>

			<?php
				$produtoUrl = $fragmentoatual;
				$produtos = new ConsultaDatabase($uid);
				$produtos = $produtos->ProdutoURL($produtoUrl);
				if ($produtos['pid']!=0) {
					$produto = new ConsultaProduto($uid);
					$produto = $produto->Produto($produtos['pid']);

					($produto['desconto']['tipo']=='porcentagem') ? $desconto = '<b>'.$produto['desconto']['quantidade'].'%</b> de desconto' : $desconto = 'com <b>'.Dinheiro($produto['desconto']['quantidade']).'</b> de desconto';

					echo "
					<!-- item -->
					<div class='produtoinnerwrap' data-pid='".$produtos['pid']."'>
						<div class='produtoimgwrap'>
							<div class='produtoimginnerwrap'>
								<img class='produtoimg'></img>
								<p class='desconto' data-desconto='".$produto['desconto']['quantidade']."'>
									".$desconto."
								</p>
							</div>
							<!-- imagens -->
							<div class='produtoimgscrollouterwrap'>
								<p class='imgscrollcntrl retornar' style='left:0;'>
									⟨
								</p>
								<div class='produtoimgscrollwrap'>
					";

							foreach ($produto['imagens'] as $imagem) {
								echo "
									<div class='produtoimgscrollinnerwrap'>
										<img class='produtoimgscroll' src='".$dominio."/loja/produto/".$produtos['url']."/img/".$imagem."'></img>
									</div>
								";
							} // foreach imagem do produto

					echo "
								</div>
								<p class='imgscrollcntrl prosseguir' style='right:0;'>
									⟩
								</p>
							</div>
							<!-- imagens -->
						</div>
						<div class='produtoinfowrap'>
							<div style='position:relative;min-width:100%;max-width:100%;'>
								<p class='produtonome' data-nome='".$produto['nome']."'>
									".$produto['nome']."
								</p>
								<p class='produtonovidade'>
									novidade
								</p>
							</div>
							<div class='produtoprecowrap'>
								<p class='preco' data-preco='".$produto['preco']['valor']."'>
								";
								if ($produto['desconto']['quantidade']>0) {
									echo  "<span style='font-size:13px;text-decoration:line-through;'>".Dinheiro($produto['preco']['valor'])."</span> <span style='min-width:100%;display:inline-block;font-size:13px;'>com ".$desconto."</span> <span style='font-size:26px;min-width:100%;display:inline-block;'>".Dinheiro($produto['preco']['atual'])."</span>";
								} else {
									echo "<span style='font-size:34px;'>".Dinheiro($produto['preco']['valor'])."</span>";
								} // se tá com desconto
								echo "
								</p>
					";
					if ($produto['frete']['gratis']==1) {
						if ($produto['frete']['quantidade']>0) {
							($produto['medida']=='unidade') ? $medidafretegratis = 'unidade(s)' : $medidafretegratis = 'gramas';
							($produto['frete']['limiar']=='valor') ? $limiar = Dinheiro($produto['frete']['quantidade']) : $limiar = $produto['frete']['quantidade'].' '. $medidafretegratis;
							$especificacaodofrete = 'frete grátis para compras acima de '. $limiar;
						} else {
							$especificacaodofrete = 'frete grátis';
						} // especificacao para gratuidade
						echo "
								<p class='freteprodutotag'>
									".$especificacaodofrete."
								</p>
						";
					} // if frete gratis
					echo "
							</div>
							<p class='descricao'>
								".$produto['descricao']['texto']."
							</p>
					";

					// CADA CARACTERISTICA
					$caracteristicas = array_keys($produto['descricao']['caracteristicas']);
					$c=1;
					foreach ($caracteristicas as $caracteristica) {
						// a cada 3, abre um p
						if ($c % 3 == 1) { echo "<p class='caracteristicas'>"; }
						echo '<span class="caracteristica"><b>'.ucfirst($caracteristica).'</b> '.ucfirst($produto['descricao']['caracteristicas'][$caracteristica]).'</span>';
						$c++; // aumenta no contador de spans de caracteristicas mostrados
						// a cada 4, fecha o p
						if ($c % 4 == 1) {echo "</p>";}
					} // foreach lista

					echo "
							<div class='produtoespecificacoes'>
					";

					$listas = array_keys($produto['listas']);
					foreach ($listas as $lista) {
						if ($lista=='cor') {
							$c=1;
							echo "
								<p class='listatitulo' data-lista='".$lista."'>
									".ucwords($lista)."
								</p>
								<div class='listacontainer'>
									<div class='lista' data-lista='".$lista."'>
							";
							foreach ($produto['listas'][$lista] as $cor) {
								CoresTranslatorOpcao($cor);
								$c++;
							} // cada opcao
							echo "
									</div>
								</div> <!-- listacontainer -->
							";
						} else {
							echo "
									<p class='listatitulo' data-lista='".$lista."'>
										".ucwords($lista)."
									</p>
									<div class='listacontainer'>
										<div class='lista' data-lista='".$lista."'>
								";
							foreach ($produto['listas'][$lista] as $opcao) {
								echo "
											<p class='opcoes' data-opcao='".$opcao."'>
												".ucwords($opcao)."
											</p>
								";
							} // cada opcao

							echo "
										</div> <!-- lista -->
									</div> <!-- listacontainer -->
							";
						} // se é lista de cor ou outro atributo
					} // foreach lista

					echo "
								 <p class='listatitulo'>
									Quantidade
								 </p>
								 <div class='listacontainer quantidadecontainer' style='flex-direction:row;'>
									 <p class='qntcntrl subtrair'>
										 -
									 </p>
									 <input class='quantidade' type='number' min='1' value='1' style='text-align:center;'></input>
									 <p class='qntcntrl aumentar'>
										 +
									 </p>
								 </div>
							</div>
					";

					echo "
							<div style='min-width:100%;max-width:100%;padding:5%;'>
								 <p class='adicionar produtobotoes sombraabaixo progresso'>
									 adicionar
								 </p>
							</div>
							<div style='min-width:100%;max-width:100%;display:flex;'>
								<div style='min-width:50%;max-width:50%;padding:0px 5%;'>
									<p class='botaosecundario produtobotoes sombraabaixo'>
										compartilhar
									</p>
								</div>
								<div style='min-width:50%;max-width:50%;padding:0px 5%;'>
									<p class='botaosecundario produtobotoes sombraabaixo'>
										copiar link
									</p>
								</div>
							</div>
						</div>
					</div>
					<!-- item -->
					";
				} // produto existente
			?>

		</div>
		<!-- wrap -->

		<script>
			$(document).ready(function() {
				controleQuantidade();
				setEscolhas();
				Progresso();
				Selecionadas();
				$('.adicionar').on('click',function() {
					if (escolhas===selecionadas) {
						const opcoesselecionadas = {};
						$('.lista').each(function() {
							opcoesselecionadas[$(this).data('lista')] = window[$(this).data('lista')];
						});

						pid = $(this).parent().parent().parent().closest('.produtoinnerwrap').data('pid');
						quantidade = $(this).parent().siblings('.produtoespecificacoes').find('.quantidade').val();

						adicionarCarrinho(pid,quantidade,opcoesselecionadas);
					} // só continua se todas escolhas foram feitas
				});
			});
		</script>

	</div>
	<!-- conteudo -->

<?php
	require_once __DIR__.'/../../rodape.php';
?>
