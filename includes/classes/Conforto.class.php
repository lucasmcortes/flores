<?php

	include_once __DIR__.'/../setup.inc.php';

	class Conforto extends ConsultaDatabase {
			public $uid;

			public function __construct($user) {
				$this->uid = $user;
			}

			public function MostraCarrinho() {
				global $dominio;
				$carrinho = parent::Carrinho($this->uid);

				if ($carrinho[0]['cid']!=0) {
					$mostra = '';
					array_reverse($carrinho);
					foreach($carrinho as $item) {
						$sku = new ConsultaProduto($this->uid);
						$sku = $sku->Produto($item['pid']);

						$produto = parent::Produto($item['pid']);
						$mostra .= "
							<div class='mostraitemcarrinhowrap' data-lugar='".$item['cid']."'>
								<div class='carrinhoimg'>
									<img class='imgcarrinho' alt='".$sku['nome']."' title='".$sku['nome']."' aria-label='".$sku['nome']."' src='".$dominio."/loja/produto/".$produto['url']."/img/".reset($sku['imagens'])."'></img>
								</div>
								<div class='carrinhotextos'>
									<p class='itemtitulocarrinho' data-url='".$produto['url']."'>".ucwords($sku['nome'])."</p>
						";

						if ($sku['variacoes'][$item['sku']]['atributos']['cor']) {
							$mostra .= "<p>Cor: <b>".ucwords($sku['variacoes'][$item['sku']]['atributos']['cor'])."</b></p>";
						}

						if (array_key_exists('tamanho',$sku['variacoes'][$item['sku']]['atributos'])) {
							$mostra .= "<p>Tamanho: <b>".ucwords($sku['variacoes'][$item['sku']]['atributos']['tamanho'])."</b></p>";
						}

						$mostra .= "
									<p style='color:var(--azul);'>".mb_strtoupper($item['sku'])."</p>
								</div>
								<div class='carrinhopreco'>
									<div class='carrinhoprecoinner'>
										<span class='info' aria-label='remover'>
											<img class='removecarrinho' data-cid='".$item['cid']."' src='".$dominio."/img/remover.png'></img>
										</span>
										<p>".Dinheiro($sku['preco']['atual'])."/".$sku['medida']."</p>
									</div>
								</div>
								<div class='flexbreak'></div>

								<div class='carrinhoquantidade' data-lugar='".$item['cid']."'>
									<p class='qntcntrl subtrair'>
										-
									</p>
									<input class='quantidade' data-lugar='".$item['cid']."' type='number' min='1' value='".$item['quantidade']."' style='max-width:50px;'></input>
									<p class='qntcntrl aumentar'>
										+
									</p>
								</div>
							</div>
						";
					} // foreach item no carrinho
					$mostra .= "
						<script>
							$(document).ready(function() {
								controleQuantidade();
								$('.qntcntrl').on('click',function() {
									updateQuantidade($(this).siblings('.quantidade').data('lugar'),$(this).siblings('.quantidade').val());
								});
								$('.removecarrinho').on('click',function() {
									removeCarrinho($(this).data('cid'));
								});
								$('.carrinhonotificacao').css('display','block');
								$('.carrinhonotificacao').html('<p>".count($carrinho)."</p>');
							});
						</script>
					";
				} else {
					$mostra = "
						<div style='position:relative;margin:5px auto;'>
							<!-- <img style='max-width:300px;width:100%;height:auto;' src='".$dominio."/img/2011212323.png'></img> -->
							<div style='position:absolute;text-align:center;top:34%;right:0;left:0;'>
								<p style='padding:1% 3%;border-radius:var(--circulo);background-color:var(--amarelo);display:inline-block;'>
									O carrinho está preparado para as suas compras
								</p>
							</div>
						</div>

						<script>
							$(document).ready(function() {
								$('.carrinhonotificacao').css('display','none');
								totalPagamento();
							});
						</script>
					";
				} // cid != 0
				return $this->resultado = $mostra;
			} // MostraCarrinho

			public function TotalPagamento() {
				$string = '';
				$total = 0;
                                $itens = parent::Carrinho($this->uid);

                                if ($itens[0]['cid']!=0) {
                                        $precos_total_item_carrinho = [];
                                        foreach ($itens as $item) {
						$produto = new ConsultaProduto($this->uid);
						$produto = $produto->Produto($item['pid']);

						$preco = $produto['preco']['valor'];
						$desconto = $produto['desconto']['quantidade']?:0;
						$descontotipo = $produto['desconto']['tipo']?:0;

						// se o desconto é em porcentagem ou em dinheiro
						($descontotipo=='porcentagem') ? $precos_total_item_carrinho[$item['cid']] = $item['quantidade']*($preco - ($desconto = ($desconto/$preco??1) * 100)) : $precos_total_item_carrinho[$item['cid']] = $item['quantidade']*($preco - $desconto);

						$string .= $item['quantidade'].' x '.Dinheiro($preco).' ';
						($descontotipo=='porcentagem') ? $string .= '(-'.$desconto.'%)' : $string .= '(-'.Dinheiro($desconto).')';
						$string .= ' = '.Dinheiro($precos_total_item_carrinho[$item['cid']]).'<br>';

                                        } // foreach
					$total = array_sum($precos_total_item_carrinho);
                                        $string .= "__________________<br>";
                                        $string .= Dinheiro($total);
                                } else {
					$permissao = $this->PermissaoComprar($this->uid);
				} // cid != 0
				return $this->resultado = array(
					'string'=>$string,
					'total'=>$total
				);
			} // TotalPagamento

			public function MostraEnderecos($uid) {
				global $dominio;

				$carrinho = parent::Carrinho($uid);
                               if ($carrinho[0]['cid']!=0) {
				       echo "
				       <p class='listatitulo' data-lista='endereco' >
					      Escolha o endereço para a entrega
				       </p>
				       <div class='listacontainer'>
					       <div data-lista='endereco' class='lista'>
				       ";
	                                $enderecos = parent::Enderecos($uid);
	                                if ($enderecos[0]['eid']!=0) {
						foreach ($enderecos as $endereco) {
							if ($endereco['cep']!=0) {
								($endereco['complemento']==0) ? $complemento = '' : $complemento = $endereco['complemento'];
								echo "
									<div class='opcoes enderecos' data-opcao='".$endereco['eid']."'>
										<div>
											<p><b>".ucfirst($endereco['denominacao'])."</b></p>
											<p>".$endereco['rua'].", ".$endereco['numero']." - ".$complemento."</p>
											<p>".$endereco['bairro']." - ".$endereco['cidade'].", ".$endereco['estado']."</p>
											<p>CEP.: ".$endereco['cep']."</p>
										</div>
										<img class='removeendereco' data-eid='".$endereco['eid']."' style='max-width:15px;cursor:pointer;position:absolute;top:5px;right:5px;' src='".$dominio."/img/red-x.svg'></img>
									</div>
								";
							} // cep != 0
						} // foreach endereco
						echo "
							<div class='flexbreak'></div>
							<div class='opcoes enderecos novoendereco' data-opcao='0'>
								<div class='novo'>
									<p>Enviar para novo endereço</p>
								</div>
							</div>
						";
	                                } else {
						echo "
							<div class='opcoes enderecos novoendereco' data-opcao='0'>
								<div class='novo'>
									<p>Cadastrar novo endereço</p>
								</div>
							</div>
						";
	                                } // eid != 0
					echo "
						</div>
				       </div>
		                       <div style='min-width:100%;max-width:100%;margin-top:3%;'>
		                               <div style='min-width:50%;max-width:50%;margin:0 auto;'>
		                                        <p id='continuar' class='produtobotoes sombraabaixo progresso'>
		                                                continuar
		                                        </p>
		                                </div>
		                       </div>

		                       <script>
		                               $(document).ready(function () {
		                                       setEscolhas();
		                                       Progresso();
		                                       Selecionadas();
		                                       $('#continuar').on('click',function() {
		                                               if (escolhas===selecionadas) {
							              escolheEndereco($('.selecionada').data('opcao'));
							      }
		                                       });
		                                       $('.removeendereco').on('click',function() {
		                                               removeEndereco($(this).data('eid'));
		                                       });
		                               });
		                       </script>
				       ";
                                } else {
                                        $permissao = $this->PermissaoComprar($this->uid);
                                } // se tem itens no carrinho
			} // MostraEndereco

			public function PermissaoComprar() {
				$carrinho = parent::Carrinho($this->uid);
				if ($carrinho[0]['cid']==0) {
					redirectToLogin();
				}
			} // PermissaoComprar

	} // conforto

?>
