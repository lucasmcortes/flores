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

                <p style='padding:1% 8%;background-color:var(--amarelo);'>
                       Confirmação
                </p>
                <div class='confirmacao' style='max-height:100%;'></div>

                <div style='min-width:100%;max-width:100%;display:inline-block;margin-top:1.8%;'>
                        <div style='min-width:100%;max-width:100%;display:flex;'>
                                <div style='flex:1;padding:0px 5%;'>
                                        <p id='addconfirmacao' class='progresso produtobotoes sombraabaixo'>
                                                confirmar pedido
                                        </p>
                                </div>
                        </div>
                </div>

                <script>
                        $(document).ready(function() {
                                atualizaConfirmacao();
                                $('#addconfirmacao').on('click',function() {
                                        console.log('show');
                                });
                        });
                </script>
        </div>
        <!-- conteudo -->

<?php
        require_once __DIR__.'/../rodape.php';
?>
