<?php

include_once __DIR__.'/../includes/setup.inc.php';

if (isset($_SESSION['l_id'])) {
        $cid = $_POST['cid']??0;
        $quantidade = $_POST['quantidade'];

        if ($cid==0) {echo '0'; return;}

        $carrinhos = new ConsultaDatabase($uid);
        $carrinhos = $carrinhos->Carrinhos();
        $pid = $carrinhos[$cid-1]['pid'];

        $produto = new ConsultaProduto($uid);
        $produto = $produto->Produto($pid);

        if ($quantidade<=$produto['variacoes'][$carrinhos[$cid-1]['sku']]['estoque']['quantidade']) {
                $update =  new UpdateRow();
                $update = $update->UpdateCarrinho($quantidade,$cid);
                if ($update===true) {
                        echo '1';
                } else {
                        echo 'Tente novamente';
                }
        } else {
                echo 'Quantidade máxima para o produto adicionada';
        } // se tem a quantidade necessária no estoque


}

?>
