<?php

include_once __DIR__.'/../includes/setup.inc.php';

if (isset($_SESSION['l_id'])) {
        $carrinho = new Conforto($uid);
        $carrinho = $carrinho->MostraCarrinho();
        echo $carrinho;
} else {
        echo "
                <div class='carrinhodisponivelwrap'>
                        <img style='max-width:300px;width:100%;height:auto;' src='".$dominio."/img/2011212323.png'></img>
                        <div style='position:absolute;text-align:center;top:34%;right:0;left:0;'>
                                <p style='padding:1% 3%;border-radius:var(--circulo);background-color:var(--amarelo);display:inline-block;'>
                                        O carrinho está preparado para as suas compras
                                </p>
                        </div>
                </div>

                <script>
                        $(document).ready(function() {
                                $('.carrinhonotificacao').css('display','none');
                                totalPagamento();
                        });
                </script>
        ";
}

?>
