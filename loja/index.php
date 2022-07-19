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
						$showcase = new Conforto($uid);
						$showcase = $showcase->Showcase($produto['pid']);
					} // produto ativo
				} // foreach produtos
			} // pid != 0
		?>
		</div> <!-- produtoswrap -->

	</div>
	<!-- conteudo -->

<?php
	require_once __DIR__.'/../rodape.php';
?>
