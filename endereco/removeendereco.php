<?php

include_once __DIR__.'/../includes/setup.inc.php';

if (isset($_SESSION['l_id'])) {

        $eid = $_POST['eid']?:0;

        $remover =  new UpdateRow();
        $remover = $remover->RemoveEndereco($eid);
        if ($remover===true) {
                echo '<script>atualizaEndereco();</script>';
        } else {
                echo 'erro ao remover';
        }


}

?>
