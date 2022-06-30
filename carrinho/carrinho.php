<?php

include_once __DIR__.'/../includes/setup.inc.php';

echo "
        <div id='carrinho'>
                <div id='franjacarrinho' class='franjacarrinho'>
                        <div class='franja'>
                                <span class='linha'></span>
                                <span class='linha'></span>
                                <span class='linha'></span>
                        </div>
                </div>
                <p style='font-size:21px;text-align:center;'>Carrinho</p>
                <div class='carrinhoinnerwrap'>
                        <div id='fechacarrinho' class='fechacarrinho' aria-label='fechar'>
                                <span style='transform:rotate(-45deg);'></span>
                                <span style='transform:rotate(45deg);'></span>
                        </div>
                        <div id='itenscarrinhoportatil' class='itenscarrinho'>
";

                                $mostracarrinho = new Conforto($uid);
                                $mostracarrinho = $mostracarrinho->MostraCarrinho();
                                echo $mostracarrinho;

echo "
                        </div>
                </div>
                <div style='min-width:100%;max-width:100%;display:flex;'>
                        <div style='flex:1;padding:0px 5%;'>
                                <p class='vercarrinho botaosecundario produtobotoes sombraabaixo'>
                                        ver carrinho
                                </p>
                        </div>
                        <div style='flex:1;padding:0px 5%;'>
                                <p id='comprar' class='produtobotoes sombraabaixo'>
                                        comprar
                                </p>
                        </div>
                </div>
        </div>

        <script>
                $('.vercarrinho').on('click',function() {
                        window.location.href = '".$dominio."/carrinho';
                });

                $('#comprar').on('click',function() {
                        window.location.href = '".$dominio."/endereco';
                });

                $(document).ready(function() {
                        const callback = function(mutationsList, observeritenscarrinho) {
                                for (const mutation of mutationsList) {
                                        if ($('#carrinho').css('display')!='none') {
                                                if ('".$fragmentoatual."'=='confirmacao') {
                                                        atualizaConfirmacao();
                                                }
                                        }
                                }
                        };

                        const observeritenscarrinho = new MutationObserver(callback);
                        const config = { attributes: true, childList: true, subtree: true };
                        observeritenscarrinho.observe(document.getElementById('itenscarrinhoportatil'), config);
                });
        </script>
";

?>
