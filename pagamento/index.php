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

                        <div class='pagamentoinnerwrap'>
                                <div class='itensinnerwrap wrappinho' style='min-width:50%;'>
                                        <p class='listatitulo'>
                                               Itens
                                        </p>
                                        <div class='itenscarrinho itenscarrinhomaior' style='padding:0;'></div>
                                </div> <!-- itensinnerwrap -->

                                <div class='detalhespagamentowrap'>
                                        <div class='totalinnerwrap wrappinho'>
                                                <p class='listatitulo'>
                                                       Total
                                                </p>
                                                <div class='totalcarrinho listacontainer'></div>
                                        </div> <!-- totalinnerwrap -->

                                        <div class='formainnerwrap wrappinho'>
                                                <p class='listatitulo' data-lista='pagamento'>
                                                       Forma de pagamento
                                                </p>
                                                <div style='padding-bottom:3%;'>
                                                        <div class='listacontainer' style='align-items:center;'>
                                                                <div class='lista' data-lista='pagamento' style='min-width:100%;'>
                                                                        <p class='opcoes' data-opcao='cartao'>
                                                                                <img class='pagamentoicon' src='<?php echo $dominio ?>/img/cartao.png'></img>Cartão
                                                                        </p>
                                                                        <p class='opcoes' data-opcao='paypal'>
                                                                                <img class='pagamentoicon' src='<?php echo $dominio ?>/img/pix.png'></img>PayPal
                                                                        </p>
                                                                        <p class='opcoes' data-opcao='pagseguro'>
                                                                                <img class='pagamentoicon' src='<?php echo $dominio ?>/img/pix.png'></img>PagSeguro
                                                                        </p>
                                                                        <p class='opcoes' data-opcao='boleto'>
                                                                                <img class='pagamentoicon' src='<?php echo $dominio ?>/img/boleto.png'></img>Boleto
                                                                        </p>
                                                                        <p class='opcoes' data-opcao='pix'>
                                                                                <img class='pagamentoicon' src='<?php echo $dominio ?>/img/pix.png'></img>Pix
                                                                        </p>
                                                                </div>
                                                        </div>

                                                        <div class='detalhespagamento'>
                                                                <div class='formadepagamento'></div>
                                                        </div>
                                                </div>
                                        </div> <!-- formainnerwrap -->

                                        <div class='continuarinnerwrap'>
                                                <div style='min-width:100%;max-width:100%;'>
                                                        <p id='addpagamento' class='progresso produtobotoes sombraabaixo'>
                                                                continuar
                                                        </p>
                                                </div>
                                        </div> <!-- continuarinnerwrap -->

                                </div> <!-- detalhespagamentowrap -->

                        </div> <!-- pagamentoinnerwrap -->

                        <script>
                                $(document).ready(function() {
                                        atualizaCarrinho();
                                        setEscolhas();
                                        Progresso();
                                        Selecionadas();

                                        $('.opcoes').on('click', function() {
                                                if (window[listadeopcoes]!=0) {
                                                        pagamentoEscolhido(window[listadeopcoes]);
                                                } else {
                                                        $('.formadepagamento').empty();
                                                }
                                        });

                                        $('#addpagamento').on('click',function() {
                                                if (escolhas===selecionadas) {
                                                        escolhePagamento(pagamento);
                                                }
                                        });
                                });
                        </script>

                </div> <!-- wrap -->
        </div>
        <!-- conteudo -->

<?php
        require_once __DIR__.'/../rodape.php';
?>
