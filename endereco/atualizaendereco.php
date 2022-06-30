<?php

include_once __DIR__.'/../includes/setup.inc.php';

if (isset($_SESSION['l_id'])) {
        $mostraendereco = new Conforto($uid);
        $mostraendereco = $mostraendereco->MostraEnderecos($uid);
        echo $mostraendereco;
}

?>
