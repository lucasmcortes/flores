<?php

include_once __DIR__.'/../setup.inc.php';
BotaoFechar();

if (isset($uid)) {
	echo "
	<!-- items -->
	<div class='items'>
	";
	tituloPagina('suporte');
	EnviandoImg();
	echo "
	<div id='resultado' style='text-align:center;margin:0 auto;'>
			<div style='min-width:100%;max-width:100%;display:inline-block;margin:3% auto;'>
				<p id='resultadotexto' style='margin:0 auto;'>
					envie sua mensagem
				</p>
			</div>
			<div style='min-width:100%;max-width:100%;margin:3px auto;'>
				<div style='min-width:100%;max-width:100%;display:inline-block;'>
					<textarea id='mensagemsuporte' rows='8' style='vertical-align:middle;border:1px solid var(--preto);border-radius:var(--radius);'></textarea>
				</div>
			</div>

			<!-- img_sup_outer_wrap -->
			<div id='img_sup_outer_wrap' style='max-width:100%;min-width:100%;margin:0 auto;margin-bottom7px;display:inline-block;'>
				<div id='img_sup_wrap' style='max-width:100%;min-width:100%;margin:13px auto;display:inline-block;border:1px dashed var(--preto);padding:0px 13px;border-radius:var(--radius);'>
					<label id='label_img_sup' for='img_sup' class='upload'>
						<!--<img class='uploadicon' src='".$dominio."/img/addimg.png'></img>-->
						<p class='uploadcaption'>
							adicionar imagem
						</p>
					</label>
					<input type='file' name='img_sup' id='img_sup' class='plimgupload'  accept='image/jpeg,image/gif,image/png,application/pdf,image/x-eps' style='display:none;'>
					<div style='min-width:100%;max-width:100%;display:inline-block;'>
						<div id='progressBarWrap_sup' style='position:relative;width:100%;height:16px;border:1px solid var(--preto);border-radius:var(--circulo);display:inline-block;'>
							<div id='progressBar_sup' style='background-color:var(--branco);width:0;min-height:14px;margin:0 auto;float:left;border-radius:var(--circulo);vertical-align:top;'></div>
							<p id='statusUpload_sup' style='position:absolute;left:0;right:0;margin:auto;padding:1%;text-align:center;font-size:13px;color:var(--preto);'></p>
						</div>
					</div>
				</div>


				<script>
					img_sup_outer_wrap = $('#img_sup_outer_wrap').html();
					function uploadFileSup(elemento) {
						file = document.getElementById(elemento).files[0];

						formdata = new FormData();
						formdata.append('img_sup', file);
						formdata.append('uploaded_file_name', file.name);

						ajax = new XMLHttpRequest();
						ajax.upload.addEventListener('progress', progressHandler, false);
						ajax.addEventListener('load', completeHandler, false);
						ajax.addEventListener('error', errorHandler, false);
						ajax.addEventListener('abort', abortHandler, false);

						ajax.open('POST','".$dominio."/includes/suporte/addimgsup.inc.php');
						ajax.send(formdata);
					}

					function progressHandler(event) {
						percent = (event.loaded / event.total) * 100;
						$('#progressBar_sup').width(Math.round(percent) + '%');
						document.getElementById('statusUpload_sup').innerHTML = Math.round(percent) + '%';
					}

					function completeHandler(event) {
						document.getElementById('img_sup_wrap').innerHTML = event.target.responseText;
						$('#remove_img_sup').on('click',function() {
							$('#img_sup_outer_wrap').html(img_sup_outer_wrap);
							$.ajax({
								url: '".$dominio."/includes/suporte/unsetsup.inc.php'
							});
						});
					}

					function errorHandler(event) {
						document.getElementById('img_sup_wrap').innerHTML = 'Upload falhou';
					}

					function abortHandler(event) {
						document.getElementById('img_sup_wrap').innerHTML = 'Upload cancelado';
					}

					$('#img_sup').change(function() {
						uploadFileSup($(this).attr('id'));
					});
				</script>
			</div>
			<!-- img_sup_outer_wrap -->
			<div style='min-width:100%;max-width:100%;display:inline-block;'>
	";
				MontaBotao('enviar','enviarsuporte');

	echo "
			</div>
		</div>
	</div>
	<!-- items -->

	<script>
		abreFundamental();

		formularioinicial = $('#resultado').html();
		$('#enviarsuporte').on('click',function () {
			if ($('#mensagemsuporte').val()!='') {

				$.ajax({
					type: 'POST',
					url: '".$dominio."/includes/suporte/suporte.inc.php',
					data: {
						uid: '".$uid."',
						mensagem: $('#mensagemsuporte').val()
					},
					beforeSend: function() {
						$('#resultado').css('display','none');
						$('#enviando').css('display','inline-block');
					},
					success: function(confirmacao) {
						$('#enviando').css('display','none');
						$('#resultado').css('display','block');
						$('#resultado').html(confirmacao);
						if (confirmacao.includes('sucesso') == true) {
							$('#resultado').append('<img id=\"sucessogif\" src=\"".$dominio."/img/sucesso.gif\">');
						} else {
							$('#resultado').html(formularioinicial);
							if (confirmacao.includes('Digite') == true) {
								$('#mensagemsuporte').attr('placeholder', confirmacao);
								setTimeout(function () {
									$('#mensagemsuporte').focus();
								},900);
							}
						}
					}
				});
			} else {
				$('#mensagemsuporte').attr('placeholder', 'Digite uma mensagem para enviar');
			}
		});
	</script>
	";
} else {
	echo "
		<script>
			$('#fechar').trigger('click');
		</script>
	";
}// $_post
?>
