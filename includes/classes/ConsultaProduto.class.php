	<?php

	class ConsultaProduto extends ConsultaDatabase {
		public $uid;

		public function __construct($user) {
			$this->uid = $user;
		}

		public function Produto($pid) {
			$img = [];
			$skus = [];
			$produto = [];
			$variacoes = [];

			$produtodb = parent::Produto($pid);
			if ($produtodb['ativo']!=0) {
				$produto = json_decode(file_get_contents(implode(glob(__DIR__.'/../../loja/produto/'.$produtodb['url'].'/'.$produtodb['url'].'.txt', GLOB_BRACE))),true);
				$imagens = glob(__DIR__.'/../../loja/produto/'.$produtodb['url'].'/img/*', GLOB_BRACE);
				if (!empty($imagens)) {
					foreach ($imagens as $imagem) {
						$img[] = basename($imagem);
					} // foreach imagem
				} // tem imagens do produto

				$pid = $produto['pid'];
				$cadastrado = $produtodb['cadastrado'];
				$nome = $produto['nome'];
				$tipo = $produto['tipo'];
				$marca = $produto['marca'];
				($produto['medida']=='unidade') ? $medida = 'un.' : $medida = $produto['medida'];
				$descricao = array(
					'texto'=>$produto['descricao']['texto']
				);
				// cada caracteristica vira uma entrada
				$caracteristicas = [];
				foreach ($produto['descricao']['caracteristicas'] as $key => $caracteristica) {
					$caracteristicas += [$key => $caracteristica ?? 0];
				} // foreach atributo
				$descricao['caracteristicas'] = $caracteristicas;


				$precovalor = $produto['preco']['valor'];
				$descontoqnt = $produto['desconto']['quantidade']?:0;
				$descontotipo = $produto['desconto']['tipo']?:0;

				// se o desconto é em porcentagem ou em dinheiro
				($descontotipo=='porcentagem') ? $precoatual = $precovalor - ($descontoqnt*($precovalor/100)) : $precoatual = $precovalor - $descontoqnt;
				$preco = array(
					'moeda'=>$produto['preco']['moeda'],
					'valor'=>$produto['preco']['valor'],
					'atual'=>$precoatual
				);


				$desconto = array(
					'quantidade'=>$produto['desconto']['quantidade'],
					'tipo'=>$produto['desconto']['tipo'],
					'exibicao'=>($descontotipo=='porcentagem') ? $produto['desconto']['quantidade'].'%' : '-'.Dinheiro($descontoqnt)
				);
				$frete = array(
					'gratis'=>$produto['frete']['gratis'],
					'limiar'=>$produto['frete']['limiar'],
					'quantidade'=>$produto['frete']['quantidade'],
				);

				if (!empty($produto['sku'])) {
					$skus = array_keys($produto['sku']);
					foreach ($skus as $key => $sku) {
						$stock_keeping_unit = $skus[$key];

						$variacoes[$stock_keeping_unit] = array(
							'sku'=>$stock_keeping_unit,
							'guid'=>$produto['sku'][$stock_keeping_unit]['guid'],
							'estoque'=>array(
								'codigodebarras'=>$produto['sku'][$stock_keeping_unit]['estoque']['codigodebarras'],
								'quantidade'=>$produto['sku'][$stock_keeping_unit]['estoque']['quantidade'],
								'gramaspormedida'=>$produto['sku'][$stock_keeping_unit]['estoque']['gramas'],
								'altura'=>$produto['sku'][$stock_keeping_unit]['estoque']['altura'],
								'largura'=>$produto['sku'][$stock_keeping_unit]['estoque']['largura'],
								'profundidade'=>$produto['sku'][$stock_keeping_unit]['estoque']['profundidade']
							)
						);

						// cada atributo vira uma entrada
						$atributos = array(
							'atributos'=>[]
						);
						foreach ($produto['sku'][$stock_keeping_unit]['atributos'] as $key => $atributo) {
							$atributos['atributos'] += [$key => $produto['sku'][$stock_keeping_unit]['atributos'][$key] ?? 0];
						} // foreach atributo
						$variacoes[$stock_keeping_unit] += $atributos;
					} // foreach sku

					$opcoes = [];
					$listas = [];
					foreach ($variacoes as $sku) {
						if ($sku['estoque']['quantidade']>0) {
							foreach ($sku['atributos'] as $atributo => $valor) {
								// lista os atributos e os valores
								$opcoes[$atributo][] = $valor;
							} // foreach atributo
						} // tem no estoque
					} // foreach sku
					foreach ($opcoes as $key => $opcao) {
						$listas[$key] = array_unique($opcao);
					}

				} // !empty skus
			} // produto ativo

			return $this->resultado = $resultado = array(
				'pid'=>$pid??0,
				'cadastrado'=>$cadastrado??0,
				'nome'=>$nome??0,
				'tipo'=>$tipo??0,
				'marca'=>$marca??0,
				'descricao'=>$descricao??0,
				'medida'=>$medida??0,
				'preco'=>$preco??0,
				'desconto'=>$desconto??0,
				'frete'=>$frete??0,
				'imagens'=>$img??0,
				'variacoes'=>$variacoes??0,
				'listas'=>$listas??0
			);
		} // Produto

	} // class

?>
