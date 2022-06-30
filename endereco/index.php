<?php

include_once __DIR__.'/../includes/setup.inc.php';

if (!isset($_SESSION['l_id'])) {
        redirectToLogin();
} else {
        require_once __DIR__.'/../cabecalho.php';
}

?>

<corpo>

	<!-- conteudo -->
	<div id='conteudo' class='conteudo'>
                <div class='wrap'>
                        <div class='enderecoentrega'>
                                <?php
                                        $mostraendereco = new Conforto($uid);
                                        $mostraendereco = $mostraendereco->MostraEnderecos($uid);
                                        echo $mostraendereco;
                                ?>
                        </div>
                </div>
        </div>
        <!-- conteudo -->

<?php
        require_once __DIR__.'/../rodape.php';
?>
