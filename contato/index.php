<?php
	require_once __DIR__.'/../cabecalho.php';
?>

<corpo>

	<!-- conteudo -->
	<div id='conteudo' class='conteudo'>

		<!-- wrap contato -->
		<div id='contato' style='min-width:100%;max-width:100%;margin:0 auto;;float:left;'>
			<!-- contato -->
			<div id='contatowrap' class='formulariowrap' style='/*background-image:url(<?php echo $dominio ?>/img/2610211920.png);*/'>
				<div id='content' class='content'>
					<div class='titulosouterwrap'>
						<div class='titulosinnerwrap'>
							<p class='titulop'>
								Vamos crescer juntos
							</p>
						</div>
					</div>

					<div id='id03'>
						<div style='min-width:100%;max-width:100%;'>
							<p id='contatoretorno' class='retorno' style='margin-top:1%;padding:1% 1.8%;background-color:var(--azul);border-radius:var(--circulo);'>
								Envie sua mensagem :)
							</p>
						</div>

						<?php EnviandoImg(); ?>

						<div id='contatocontent' class='container'>
							<div style='min-width:100%;max-width:100%;margin:0 auto;text-align:center;'>
							<?php
								echo "
									<div style='max-width:100%;min-width:100%;margin:0 auto;margin-bottom:7px;display:inline-block;'>
										  <input style='max-width:100%;min-width:100%;' type='text' placeholder='Qual o seu nome?' name='nome' id='nome'>
									</div>

									<div style='max-width:100%;min-width:100%;margin:0 auto;margin-bottom:7px;display:inline-block;'>
										<div style='max-width:49%;min-width:49%;margin:0 auto;float:left;'>
											<input type='text' placeholder='Seu celular' onkeyup=\"maskIt(this,event,'(##) ###-###-###')\" name='telefone' id='telefone' style='max-width:100%;min-width:100%;'>
										</div>
										<div style='max-width:49%;min-width:49%;margin:0 auto;float:right;'>
										      <input style='max-width:100%;min-width:100%;' type='text' placeholder='Seu e-mail' name='email' id='email'>
										</div>
									</div>
									<div style='max-width:100%;min-width:100%;margin:0 auto;margin-bottom:7px;display:inline-block;'>
										<textarea style='max-width:100%;min-width:100%;border-radius:var(--radius);' rows='9' id='mensagem' name='mensagem' placeholder='Conte o seu desafio para podermos chegar na melhor solução para sua empresa'></textarea>
									</div>
								";
							?>
							</div>

							<div style='min-width:72%;max-width:72%;margin:0 auto;margin-top:3px;display:inline-block;'>
								<?php MontaBotao('enviar','enviarmensagem'); ?>
							</div>

						</div> <!--container -->
					</div><!--id03-->
				</div> <!-- content -->
			</div>
			<!-- contato -->

			<script>
				$(document).ready(function() {

					var enviandoimg = $('#enviando');
					var enviar = $('#enviarmensagem');
					var cresposta = $('#contatoretorno');
					var ccontainer = $('#contatocontent');
					var ccontainerform = $('#contatocontent').html();
					var windowWidth = $(window).width();

					function EnviarContato() {
						var cnome = $('#nome').val();
						var cemail = $('#email').val();
						var ctelefone = $('#telefone').val();
						var cassunto = 'Ophanim Index';
						var cmensagem = $('#mensagem').val();

						$.ajax({
							type: "POST",
							dataType: "html",
							async: true,
							url: "<?php echo $dominio ?>/contato/contatoindex.inc.php",
							data: {
								submitcontato: enviar.html(),
								wwidth: windowWidth,
								connome: cnome,
								conemail: cemail,
								contelefone: ctelefone,
								conassunto: cassunto,
								conmensagem: cmensagem
							},
							beforeSend:function(){
								ccontainer.css({'visibility':'hidden'});
								enviandoimg.css('display', 'block');
							},
							success: function(enviocontato) {
								enviandoimg.css('display', 'none');
								ccontainer.css({'visibility':'visible'});

								if (enviocontato.includes("todos")===true) { /* preencher */

								} else { /* enviado */
									ccontainer.html("<img style='width:auto;max-width:180px;height:auto;' src='<?php echo $dominio ?>/img/0611212151.png'></img>");
								}

								cresposta.empty();
								cresposta.html(enviocontato);

							},
							error: function(enviocontato) {
								enviandoimg.css('display', 'none');
								ccontainer.css({'visibility':'visible'});
								cresposta.empty();
								cresposta.html('Tente novamente!');
							}
						});
					}

					enviar.click(function() {
						EnviarContato();
					});
				}); /* document ready */
			</script>
		</div>
		<!-- wrap contato -->

	</div>
	<!-- conteudo -->

<?php
	require_once __DIR__.'/../rodape.php';
?>
