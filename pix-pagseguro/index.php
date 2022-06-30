<?php
	require_once __DIR__.'/../cabecalho.php';
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
							PIX
						</p>
						<p class='descindexmenor' style='text-align:right;'>
							https://dev.pagseguro.uol.com.br/reference/pix-oauth
						</p>
					</div>
				</div>
			</div>
			<!-- sob medida -->
		</div>
		<!-- wrap intro -->
		<?php
			$curl = curl_init();

			curl_setopt_array($curl, [
			  CURLOPT_URL => "https://secure.sandbox.api.pagseguro.com/pix/oauth2",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => "{\"grant_type\":\"client_credentials\"}",
			  CURLOPT_HTTPHEADER => [
			    "Accept: application/json",
			    "Content-Type: application/json",
			    "Password: '.$PagSeguroSecret.'",
			    "Username: '.$PagSeguroClientID.'"
			  ],
			]);

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  echo $response;
			}
		?>

	</div>
	<!-- conteudo -->

<?php
	require_once __DIR__.'/../rodape.php';
?>
