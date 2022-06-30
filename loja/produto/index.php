<?php
	require_once __DIR__.'/../../cabecalho.php';
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
							Novo produto
						</p>
						<p class='descindexmenor' style='text-align:right;'>
							Cadastre um novo produto no seu estoque
						</p>
					</div>
				</div>
			</div>
			<!-- sob medida -->
		</div>
		<!-- wrap intro -->



		<?php
			///// SALVAR PRODUTO NO JSON

			// $guid = mb_strtoupper(Guid());
			// do {
			// 	$guid = mb_strtoupper(Guid());
			// } while ($guid==$produto['guid']);
			//
			// $jsonproduto = array(
			// 	"pid"=>"2",
			// 	"nome"=>"BMW",
			// 	"tipo"=>"carro",
			// 	"marca"=>'BMW',
			// 	"medida"=>"unidade",
			// 	"descricao"=>array(
			// 	 	'texto'=>'Carro seminovo disponível para entrega imediata',
			// 	 	'caracteristicas'=>array(
			// 	 		'câmbio'=>'automático',
			// 	 		'tração'=>'dianteira',
			// 			'portas'=>'2'
			// 		),
			// 	 ),
			// 	 "preco"=>array(
			// 	 	"moeda"=>"R$",
			// 	 	"valor"=>"390000.00"
			// 	 ),
			// 	 "desconto"=>array(
			// 	 	"quantidade"=>"10",
			// 	 	"tipo"=>"porcentagem"
			// 	 ),
			// 	 "frete"=>array(
			// 	 	"gratis"=>"1",
			// 	 	"limiar"=>"valor",
			// 	 	"quantidade"=>"0"
			// 	 ),
			// 	"sku"=>array(
			// 		"BMWBR"=> array(
			// 			"guid"=>"8AA88030-F81B-9083-F014-6D823AD829A6",
			// 			"atributos"=>array(
			// 				"cor"=>"branco"
			// 			),
			// 			"estoque"=>array(
			// 				"codigodebarras"=>"1234567890",
			// 				"quantidade"=>"10",
			// 				"gramas"=>"1350",
			// 				"altura"=>"150",
			// 				"largura"=>"350",
			// 				"profundidade"=>"500"
			// 			),
			// 		),
			// 		"BMWPR"=> array(
			// 			"guid"=>"556F9417-C207-0C94-B4AE-A962FDB5D27F",
			// 			"atributos"=>array(
			// 				"cor"=>"preto"
			// 			),
			// 			"estoque"=>array(
			// 				"codigodebarras"=>"1234567890",
			// 				"quantidade"=>"10",
			// 				"gramas"=>"1350",
			// 				"altura"=>"150",
			// 				"largura"=>"350",
			// 				"profundidade"=>"500"
			// 			),
			// 		),
			// 	),
			// );
			//
			// $nomeproarquivoepasta = mb_strtolower(Acentuadas($jsonproduto['nome']));
			// $pasta = __DIR__.'/'.$nomeproarquivoepasta;
			// criarPastaProduto($pasta);
			//
			// $insereproduto = json_encode($jsonproduto, JSON_PRETTY_PRINT);
			// $nomearquivo = $nomeproarquivoepasta.'.txt';
			// $nomecompletotudo = $pasta.'/'.$nomearquivo;
			// $salva = fopen($nomecompletotudo, 'a');
			// fwrite($salva, $insereproduto);
			// fclose($salva);
		?>

	</div>
	<!-- conteudo -->

<?php
	require_once __DIR__.'/../../rodape.php';
?>
