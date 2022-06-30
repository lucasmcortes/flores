<?php

include_once __DIR__.'/../includes/setup.inc.php';

if (isset($_SESSION['l_id'])) {
        $total = new Conforto($uid);
        $total = $total->TotalPagamento();

        echo "
                <p>endereço para entrega: eid = ".$_SESSION['endereco']."</p>
                <p>forma de pagamento: ".$_SESSION['pagamento']."</p>
                <p>total a pagar: ".Dinheiro($total['total'])."</p>
        ";
}

?>
