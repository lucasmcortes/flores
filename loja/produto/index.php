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

			// echo $guid;

			// $jsonproduto = array(
			// 	"pid"=>"5",
			// 	"nome"=>"Mangiori",
			// 	"tipo"=>"planta",
			// 	"marca"=>'Natural',
			// 	"medida"=>"unidade",
			// 	"descricao"=>array(
			// 	 	'texto'=>'Planta muito interessante',
			// 	 	'caracteristicas'=>array(
			// 	 		'nacionalidade'=>'brasileira',
			// 	 		'células'=>'eucariontes',
			// 			'núcleo'=>'delimitado'
			// 		),
			// 	 ),
			// 	 "preco"=>array(
			// 	 	"moeda"=>"R$",
			// 	 	"valor"=>"936.99"
			// 	 ),
			// 	 "desconto"=>array(
			// 	 	"quantidade"=>"0",
			// 	 	"tipo"=>"porcentagem"
			// 	 ),
			// 	 "frete"=>array(
			// 	 	"gratis"=>"1",
			// 	 	"limiar"=>"valor",
			// 	 	"quantidade"=>"0"
			// 	 ),
			// 	"sku"=>array(
			// 		"MANGIORIBR"=> array(
			// 			"guid"=>$guid,
			// 			"atributos"=>array(
			// 				"cor"=>"branco"
			// 			),
			// 			"estoque"=>array(
			// 				"codigodebarras"=>"4567890123",
			// 				"quantidade"=>"10",
			// 				"gramas"=>"220",
			// 				"altura"=>"40",
			// 				"largura"=>"130",
			// 				"profundidade"=>"34"
			// 			),
			// 		),
			// 	),
			// );
			//
			// $nomeproarquivoepasta = mb_strtolower(Acentuadas($jsonproduto['nome']));
			// $pasta = __DIR__.'/'.$nomeproarquivoepasta;
			// criarPastaProduto($pasta);
			// mkdir($pasta.'/img', 0755, true);
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
