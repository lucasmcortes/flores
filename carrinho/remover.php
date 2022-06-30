<?php

include_once __DIR__.'/../includes/setup.inc.php';

if (isset($_SESSION['l_id'])) {
        $cid = $_POST['cid'];

        $remover =  new UpdateRow();
        $remover = $remover->RemoveCarrinho($cid);
        if ($remover===true) {
                echo '
                        <script>
                                atualizaCarrinho();
                        </script>
                ';
        } else {
                echo 'erro ao remover';
        }
}

?>
