<?php

include_once __DIR__.'/../includes/setup.inc.php';

if (isset($_SESSION['l_id'])) {

        $denominacao = $_POST['denominacao']?:0;
        $cep = $_POST['cep']?:0;
        $rua = $_POST['rua']?:0;
        $numero = $_POST['numero']?:0;
        $bairro = $_POST['bairro']?:0;
        $cidade = $_POST['cidade']?:0;
        $estado = $_POST['estado']?:0;
        $complemento = $_POST['complemento']?:0;

        foreach ($_POST as $key => $input) {
                if ($key!=('complemento')) {
                        if (empty($input)) {
                                RespostaRetorno('vazio');
                                return;
                        }
                }
        }

        $enderecos = new ConsultaDatabase($uid);
        $enderecos = $enderecos->Enderecos($uid);
        if ($enderecos[0]['eid']!=0) {
                foreach ($enderecos as $endereco) {
                        if ( ($endereco['cep']==$cep) && ($endereco['ativo']==1) ) {
                                echo "Endereço existente";
                                return;
                        }
                }
        } // se ja tem o endereco cadastrado

        $addendereco = new setRow();
        $addendereco = $addendereco->Endereco($uid,$denominacao,$cep,$rua,$numero,$bairro,$cidade,$estado,$complemento,1,$data);
        if ($addendereco===true) {
                echo "sucesso";
        } else {
                echo "Tente novamente";
        } // addendereco true


}

?>
