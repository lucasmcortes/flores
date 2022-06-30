<?php

        echo "
                <!-- menutopwrap -->
                <div id='menutopwrap'>
                        <div id='menutopinnerwrap'>
                        <img id='logotop' style='max-width:90px;' src='".$dominio."/img/logo.png'></img>
                        <div id='opcoestop'>
                                <div id='inneropcoestop'>
                                        <a href='".$dominio."/minhaconta'>Minha conta</a>
                                        <a href='".$dominio."/carrinho'>Carrinho</a>
                                        <a href='".$dominio."/loja'>Loja</a>
                                </div>
                        </div>
                        <div class='flexflex'></div>


        ";

        if (isset($_SESSION['l_id'])) {
                echo "
                <div class='buttontopwraplogado'>
                        <div id='infotopwrap'>
                                <div id='infotop'>
                                        <p style='display:inline-block;vertical-align:middle;'>Olá, ".NomeCliente($_SESSION['l_nome'])."!</p>
                                </div>
                        </div>
                ";
        } else {
                echo "
                        <div class='buttontopwrap'>
                                <div id='top_areacliente'>
                                        <img src='".$dominio."/img/user.png' style='max-width:21px;'></img>
                                </div>
                ";
        }

        echo "
                </div>
                        <!-- buttonwrap -->

                                <div id='abremenusuperior'>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                </div>
                        </div>
        ";
        if (isset($_SESSION['l_id'])) {
                echo "
                        <div class='flexbreak'></div>
                        ";
        } // logado
        echo "

                        <div id='banneraviso' class='banneraviso'>
                                <button id='fechabanneraviso' class='fechabanneraviso' aria-label='fechar' tabindex='0'>✕</button>
                                <div>
                                        <p id='banneravisomsg'></p>
                                </div>
                        </div>

                </div>
                </div>
                <!-- menutopwrap -->

                <div id='abrecarrinhofixed' class='carrinhofixed mostracarrinho'>
                        <span class='info' aria-label='carrinho'>
                                <div style='position:relative;display:flex;align-items:center;height:34px;width:34px;background-color:var(--bege);border-radius:var(--circulo);'>
                                        <div class='carrinhonotificacao'><p>".$qntitenscarrinho."</p></div>
                                        <img style='max-width:21px;' src='".$dominio."/img/carrinho.png'></img>
                                </div>
                        </span>
                </div>

                <script>

                        $('#top_areacliente').on('click', function () {
                                loadFundamental('".$dominio."/entrar/includes/entrarfundamental.inc.php');
                        });

                        $('#top_logout').on('click', function () {
                                window.location.href='".$dominio."/entrar/logout'
                        });

                        window.addEventListener('load', function() {
                                $('#abremenusuperior').on('click', function() {
                                        if ($('#superior').css('left')!='0px') {
                                                $('#fechar').trigger('click');
                                                $('#fecharvestimenta').trigger('click');
                                                $('#fechacarrinho').trigger('click');
                                                $('#fechabanneraviso').trigger('click');
                                                loadSuperior('".$dominio."/menusuperior.php');
                                                $(this).addClass('open');
                                        } else if ($('#superior').css('left')=='0px') {
                                                $('#fecharsuperior').trigger('click');
                                                $(this).removeClass('open');
                                        }
                                });
                        });

                        $(document).ready(function(cms) {
                                $(document).click(function(cms) {
                                        if ($(cms.target).closest('.fundamental').attr('id')==='fundamental') return;
                                        if ($(cms.target).closest('.iconesuporte').attr('id')==='msgsuporteicon') return;
                                        if ($('#superior').css('left')=='0px') {
                                                if (cms.pageX>340) {
                                                        $('#fechar').trigger('click');
                                                        $('#fecharvestimenta').trigger('click');
                                                        $('#fecharsuperior').trigger('click');
                                                        $('#fechabanneraviso').trigger('click');
                                                        $('#abremenusuperior').removeClass('open');
                                                }
                                        }
                                });
                        });

                        $('.mostracarrinho').on('click', function() {
                                abreCarrinho();
                        });

                        $(document).ready(function() {
                                podefecharmenutopporcausadocarrinho = 1;
                                var prevScrollpos = window.pageYOffset;
                                window.onscroll = function() {
                                        var currentScrollPos = window.pageYOffset;

                                        if (prevScrollpos >= currentScrollPos) {
                                                abreMenuTop();
                                        } else if (prevScrollpos < currentScrollPos) {
                                                if (podefecharmenutopporcausadocarrinho===1) {
                                                        fechaMenuTop();
                                                }
                                        }

                                        prevScrollpos = currentScrollPos;
                                }
                        });
                </script>
        ";

?>
