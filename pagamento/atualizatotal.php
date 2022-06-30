<?php

include_once __DIR__.'/../includes/setup.inc.php';

if (isset($_SESSION['l_id'])) {
        $total = new Conforto($uid);
        $total = $total->TotalPagamento($uid);
        //echo $total['string']; // mostra conta e o total
        echo "<p style='margin:0;font-weight:700;font-size: 23px;text-align:left;'>".Dinheiro($total['total'])."</p>"; // mostra o total
}

?>
