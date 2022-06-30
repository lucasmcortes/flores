<?php

include_once __DIR__.'/../includes/setup.inc.php';
require_once __DIR__.'/../includes/cep.inc.php';
BotaoFechar();
EnviandoImg();

echo '
	<div class="content" style="width:100%;max-width:340px;height:auto;overflow:auto;margin:0 auto;">
		<div style="min-width:100%;max-width:100%;padding:21px 13px;">
';
			tituloPagina('novo endereço');
echo "
			<p id='retorno' class='retorno'></p>

			<div id='enderecowrap' style='min-width:100%;max-width:100%;display:inline-block;'>


				<div style='max-width:100%;min-width:100%;margin:0 auto;margin-bottom:7px;display:inline-block;'>
					<p class='listatitulo' data-lista='denominacao'>Denominação</p>
					<div style='max-width:100%;min-width:100%;margin:0 auto;display:inline-block;'>
						<div class='listacontainer' style='border-radius:var(--radius);'>
							<div data-lista='denominacao' class='lista'>
								<p class='opcoes' data-opcao='casa'>
									Casa
								</p>
								<p class='opcoes' data-opcao='trabalho'>
									Trabalho
								</p>
								<p class='opcoes' data-opcao='outro'>
									Outro
								</p>
							</div>
						</div>
					</div>
				</div>

				<div style='max-width:100%;min-width:100%;margin:0 auto;margin-bottom:7px;display:inline-block;'>
					<div style='max-width:39%;min-width:39%;margin:0 auto;float:left;'>
						<label>CEP</label>
						<input style='max-width:100%;min-width:100%;' onkeyup='maskIt(this,event,\"##.###-###\")' max-length='8' type='text' placeholder='CEP' name='cep' id='cep'>
					</div>
					<div style='max-width:59%;min-width:59%;margin:0 auto;float:right;'>
						<label>Rua</label>
						<input style='max-width:100%;min-width:100%;' type='text' placeholder='Rua' name='rua' id='rua'>
					</div>
				</div>

				<div style='max-width:100%;min-width:100%;margin:0 auto;margin-bottom:7px;display:inline-block;'>
					<div style='max-width:29%;min-width:29%;margin:0 auto;float:left;'>
						<label>Número</label>
						<input style='max-width:100%;min-width:100%;' type='text' placeholder='Número' name='numero' id='numero'>
					</div>
					<div style='max-width:69%;min-width:69%;margin:0 auto;float:right;'>
						<label>Bairro</label>
						<input style='max-width:100%;min-width:100%;' type='text' placeholder='Bairro' name='bairro' id='bairro'>
					</div>
				</div>

				<div style='max-width:100%;min-width:100%;margin:0 auto;margin-bottom:7px;display:inline-block;'>
					<div style='max-width:79%;min-width:79%;margin:0 auto;float:left;'>
						<label>Cidade</label>
						<input style='max-width:100%;min-width:100%;' type='text' placeholder='Cidade' name='cidade' id='cidade'>
					</div>
					<div style='max-width:19%;min-width:19%;margin:0 auto;float:right;'>
						<label>UF</label>
						<input style='max-width:100%;min-width:100%;' type='text' placeholder='UF' name='estado' id='estado'>
					</div>
				</div>

				<div style='max-width:100%;min-width:100%;margin:0 auto;margin-bottom:7px;display:inline-block;'>
					<div style='max-width:100%;min-width:100%;margin:0 auto;display:inline-block;'>
						<label>Complemento</label>
						<input class='opcional' style='max-width:100%;min-width:100%;' type='text' placeholder='Complemento' name='complemento' id='complemento'>
					</div>
				</div>

				<div style='min-width:100%;max-width:100%;display:inline-block;margin-top:1.8%;'>
					<div style='min-width:100%;max-width:100%;display:flex;'>
						<div style='flex:1;padding:0px 5%;'>
							<p id='addendereco' class='progresso produtobotoes sombraabaixo'>
								adicionar
							</p>
						</div>
					</div>
				</div>

			</div> <!-- enderecowrap -->

		</div>
	</div>

	<script>
                $(document).ready(function() {
			setEscolhas();
			Progresso();
			Selecionadas();
			abreFundamental();
			$('#addendereco').on('click',function() {
				if (escolhas===selecionadas) {
			                enviandoimg = $('#enviando');
			                enviarform = $('#enviaraltend');
			                retorno = $('#retorno');
			                formulario = $('#enderecowrap');

					$.ajax({
						type: 'POST',
						url: '".$dominio."/endereco/addendereco.php',
						data: {
							denominacao: denominacao,
							cep: $('#cep').val(),
							rua: $('#rua').val(),
							numero: $('#numero').val(),
							bairro: $('#bairro').val(),
							cidade: $('#cidade').val(),
							estado: $('#estado').val(),
							complemento: $('#complemento').val()
						},
						beforeSend: function(altendmod) {
							window.scrollTo(0,0);
							enviandoimg.css('display', 'block');
							formulario.css('display', 'none');
							retorno.css('display', 'none');
						},
						success: function(resultado) {
							enviandoimg.css('display', 'none');
							formulario.css('display', 'inline-block');
							retorno.css('display', 'inline-block');

							if (resultado.includes('sucesso') == true) {
								formulario.remove();
								retorno.html('Endereço adicionado com sucesso');
								setTimeout(function() {
									atualizaEndereco();
									$('#fechar').trigger('click');
								},3600);
							} else {
								bordaRosa();
								retorno.html(resultado);
							}
						}
					});
				}
			});

			$('#fechar').on('click',function() {
				setEscolhas();
				Selecionadas();
				$('.opcoes').removeClass('selecionada');
			});
                });
	</script>
";

?>
