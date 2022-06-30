<?php

include_once __DIR__.'/../includes/setup.inc.php';

if (isset($_SESSION['l_id'])) {
        $forma = $_POST['forma'];

        if ($forma=='cartao') {
                echo "
                        <div style='display:inline-block;min-width: auto;max-width: 450px;padding: 1.2%;padding-top: 0.6%;background-color: var(--cinza);border-radius: var(--radius);'>
                                <div style='min-width:100%;max-width:100%;margin:0 auto;text-align:center;'>
                                        <div style='max-width:100%;min-width:100%;margin:0 auto;margin-bottom:7px;display:inline-block;'>
                                                <label>Nome no cartão</label>
                                                  <input style='max-width:100%;min-width:100%;' type='text' placeholder='Nome no cartão' value='".$usuario['nome']."' name='nomecartao' id='nomecartao'>
                                        </div>

                                        <div style='max-width:100%;min-width:100%;margin:0 auto;margin-bottom:7px;display:inline-block;'>
                                                <label>Número do cartão</label>
                                                  <input style='max-width:100%;min-width:100%;' type='text' onkeyup=\"maskIt(this,event,'#### #### #### ####')\" placeholder='XXXX XXXX XXXX XXXX' name='numerocartao' id='numerocartao'>
                                        </div>

                                        <div style='max-width:100%;min-width:100%;margin:0 auto;margin-bottom:7px;display:inline-block;'>
                                                <div style='max-width:49%;min-width:49%;margin:0 auto;float:left;'>
                                                        <label>Expiração</label>
                                                        <input type='text' onkeyup=\"maskIt(this,event,'##/##')\" placeholder='MM/AA' name='expiracao' id='expiracao' style='max-width:100%;min-width:100%;'>
                                                </div>
                                                <div style='max-width:49%;min-width:49%;margin:0 auto;float:right;'>
                                                        <label>CVC</label>
                                                        <input type='text' onkeyup=\"maskIt(this,event,'###')\" placeholder='CVC' name='mes' id='mes' style='max-width:100%;min-width:100%;'>
                                                </div>
                                        </div>
                                </div>
                        </div>
                ";
        } else if ($forma=='paypal') {
                echo "pagamento com paypal";
        } else if ($forma=='boleto') {
                echo "pagamento com boleto";
        } else if ($forma=='pix') {
                echo "pagamento com pix";
        } else if ($forma=='pagseguro') {
                echo "pagamento com pagseguro";
        }

}

?>
