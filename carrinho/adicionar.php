<?php

include_once __DIR__.'/../includes/setup.inc.php';

$resolvido = 0;
$estaNoCarrinho = 0;

$pid = $_POST['pid'];
$quantidade = $_POST['quantidade']?:1;
$selecionadas = $_POST['opcoesselecionadas'];

$produto = new ConsultaProduto($uid);
$produto = $produto->Produto($pid);
$atributos = array_keys($selecionadas); // nomes dos atributos cujas seleções estão dentro da variável $selecionadas

foreach ($produto['variacoes'] as $variacao) {
        $encontro = 0; // reseta pra testar no próximo sku pra ver se match a quantidade de atributos escolhidos
        foreach ($atributos as $atributo) {
                if ($variacao['atributos'][$atributo]==$selecionadas[$atributo]) {
                        $encontro++;
                        if ($encontro==count($atributos)) {
                                $sku = $variacao['sku'];
                                $quantidadeDisponivel = $variacao['estoque']['quantidade'];
                                break;
                        } // se o sku tem a mesma quantidade de atributos que match
                } // se aquele sku tem aquele atributo com aquela configuração
        } // cada atributo
} // em cada sku

if (isset($_SESSION['l_id'])) {

        $carrinho = new ConsultaDatabase($uid);
        $carrinho = $carrinho->Carrinho($uid);
        if ($carrinho[0]['cid']!=0) {
                foreach($carrinho as $item) {
                        if ($item['pid']==$pid) {
                                if ($item['presente']==1) {
                                        if ($item['sku']==$sku) {
                                                // se é o mesmo item que já tem e só adicionou de novo em vez de mudar a quantidade
                                                // muda a quantidade da mesma entrada na db em vez de criar outro item na lista de itens do carrinho
                                                $cid = $item['cid'];
                                                $estaNoCarrinho = 1;
                                                $quantidadeNoCarrinho = $item['quantidade'];
                                        }
                                } // ativo
                        } // pid = pid
                } // foreach item
        } // ve se o item adicionado é algum com o mesmo sku que já tem no carrinho

        $quantidadeNoCarrinho = $quantidadeNoCarrinho?:0;
        $quantidadeDesejada = $quantidade+$quantidadeNoCarrinho;
        if ($estaNoCarrinho==1) {
                if ($quantidadeDisponivel<$quantidadeDesejada) {
                        echo 'Quantidade máxima para o produto adicionada'.$quantidadeNoCarrinho;
                } else {
                        $update = new UpdateRow();
                        $update = $update->UpdateCarrinho($quantidadeDesejada,$cid);
                        if ($update===true) {
                                $resolvido = 1;
                        }
                } // se tem a quantidade em estoque
        } else if ($estaNoCarrinho==0) {
                if ($quantidadeDisponivel>=$quantidadeDesejada) {
                        $add = new setRow();
                        $add = $add->AddCarrinho($uid,$pid,$sku,$quantidade,$data,1);
                        if ($add===true) {
                                $resolvido = 1;
                        }
                } else {
                        echo 'Quantidade máxima para o produto adicionada';
                }// se tem a quantidade necessária em estoque
        } // estaNoCarrinho

        if ($resolvido==1) {
                $mostracarrinho = new Conforto($uid);
                $mostracarrinho = $mostracarrinho->MostraCarrinho();
                echo $mostracarrinho;
        } // resolvido

} else {
        echo "
                <script>
                        sessionStorage.setItem('".$sku."', '".$quantidade."');
                        console.log($(this).val(sessionStorage.getItem('".$sku."')));
                </script>
        ";
}

?>
