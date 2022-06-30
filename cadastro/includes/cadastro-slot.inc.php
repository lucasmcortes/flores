<?php
        carregaJS();
?>

<div style='min-width:100%;max-width:100%;display:inline-block;margin-top:3%;'>
        <?php
                tituloPagina('cadastro');
                EnviandoImg();
        ?>

        <p id='cadastrado' class='retorno'>
        </p> <!-- result entrar -->

        <div id='id03'>
                <div class='container'>
                        <div style='min-width:100%;max-width:100%;margin:0 auto;display:inline-block:'>

                                <div style='min-width:100%;max-width:100%;display:inline-block;padding:8% 13%;padding-top:3%;'>
                                        <div style='max-width:100%;min-width:100%;margin:0 auto;margin-bottom:7px;display:inline-block;'>
                                                  <input style='max-width:100%;min-width:100%;' type='text' placeholder='Nome' name='nome' id='nome'>
                                        </div>

                                        <div style='max-width:100%;min-width:100%;margin:0 auto;margin-bottom:7px;display:inline-block;'>
                                                <input style='max-width:100%;min-width:100%;' onkeyup='maskIt(this,event,"##/##/####")' type='text' placeholder='Data de nascimento (dd/mm/aaaa)' name='nascimento' id='nascimento'>
                                        </div>

                                        <div id='nivelwrap' style='max-width:100%;min-width:100%;margin:0 auto;margin-bottom:7px;display:inline-block;'>
                                                <div id='nivelinner' style='min-width:100%;max-width:100%;display: flex;flex-direction: row;flex-wrap: wrap;align-content: center;align-items: center;justify-content: space-between;'>
                                                        <p style='color:var(--creme);margin:unset;font-size:13px;'>Nível de acesso:</p>
                                                        <div id='niveis'>
                                                                <p id='n_1' class='niveis opcoes'>
                                                                        Cliente
                                                                </p>
                                                                <p id='n_2' class='niveis opcoes'>
                                                                        Administrador
                                                                </p>
                                                        </div>
                                                        <script>
                                                                valnivel = 0;
                                                                $('.niveis').on('click', function() {
                                                                        valnivel = $(this).attr('id').split('_')[1];
                                                                        if ($(this).hasClass('selecionada')) {
                                                                                $('.niveis').removeClass('selecionada');
                                                                                valnivel = 0;
                                                                                return;
                                                                        }
                                                                        $('.niveis').removeClass('selecionada');
                                                                        $(this).addClass('selecionada');
                                                                });
                                                        </script>
                                                </div>
                                        </div> <!-- nivelwrap -->

                                        <div>
                                                <div style='max-width:100%;min-width:100%;margin:0 auto;margin-bottom:7px;display:inline-block;'>
                                                        <div style='max-width:49%;min-width:49%;margin:0 auto;float:left;'>
                                                                <input style='max-width:100%;min-width:100%;' onkeyup='maskIt(this,event,"###.###.###-##")' type='text' placeholder='CPF' name='cpf' id='cpf'>
                                                        </div>
                                                        <div style='max-width:49%;min-width:49%;margin:0 auto;float:right;'>
                                                                <input style='max-width:100%;min-width:100%;' onkeyup='maskIt(this,event,"(##) ###-###-###")' type='text' placeholder='Telefone' name='telefone' id='telefone'>
                                                        </div>
                                                </div>
                                        </div>

                                        <!-- endereco wrap -->
                                        <div id='enderecowrap'>
                                                <div style='max-width:100%;min-width:100%;margin:0 auto;margin-bottom:7px;display:inline-block;'>
                                                        <div style='max-width:39%;min-width:39%;margin:0 auto;float:left;'>
                                                                <input style='max-width:100%;min-width:100%;' onkeyup='maskIt(this,event,"##.###-###")' max-length='8' type='text' placeholder='CEP' name='cep' id='cep'>
                                                        </div>
                                                        <div style='max-width:59%;min-width:59%;margin:0 auto;float:right;'>
                                                                <input style='max-width:100%;min-width:100%;' type='text' placeholder='Rua' name='rua' id='rua'>
                                                        </div>
                                                </div>

                                                <div style='max-width:100%;min-width:100%;margin:0 auto;margin-bottom:7px;display:inline-block;'>
                                                        <div style='max-width:29%;min-width:29%;margin:0 auto;float:left;'>
                                                                <input style='max-width:100%;min-width:100%;' type='text' placeholder='Número' name='numero' id='numero'>
                                                        </div>
                                                        <div style='max-width:69%;min-width:69%;margin:0 auto;float:right;'>
                                                                <input style='max-width:100%;min-width:100%;' type='text' placeholder='Bairro' name='bairro' id='bairro'>
                                                        </div>
                                                </div>

                                                <div style='max-width:100%;min-width:100%;margin:0 auto;margin-bottom:7px;display:inline-block;'>
                                                        <div style='max-width:79%;min-width:79%;margin:0 auto;float:left;'>
                                                                <input style='max-width:100%;min-width:100%;' type='text' placeholder='Cidade' name='cidade' id='cidade'>
                                                        </div>
                                                        <div style='max-width:19%;min-width:19%;margin:0 auto;float:right;'>
                                                                <input style='max-width:100%;min-width:100%;' type='text' placeholder='Estado' name='estado' id='estado'>
                                                        </div>
                                                </div>

                                                <div style='max-width:100%;min-width:100%;margin:0 auto;margin-bottom:7px;display:inline-block;'>
                                                        <div style='max-width:100%;min-width:100%;margin:0 auto;display:inline-block;'>
                                                                <input style='max-width:100%;min-width:100%;' type='text' placeholder='Complemento' name='complemento' id='complemento'>
                                                        </div>
                                                </div>
                                        </div>
                                        <!-- endereco wrap -->

                                        <div style='max-width:100%;min-width:100%;margin:0 auto;margin-bottom:7px;display:inline-block;'>
                                                  <input style='max-width:100%;min-width:100%;' type='email' placeholder='E-mail' name='email' id='email'>
                                        </div>
                                        <div style='max-width:100%;min-width:100%;margin:0 auto;margin-bottom:7px;display:inline-block;'>
                                                  <input style='max-width:100%;min-width:100%;' type='password' placeholder='Escolha uma senha' name='pwd' id='pwd'>
                                        </div>

                                        <?php
                                                MontaBotao('cadastrar','enviarcadastro');
                                        ?>
                                </div>

                        </div>
                </div> <!-- container -->
        </div><!--id03-->
</div> <!-- content -->

<script>
        $(document).ready(function() {
                enviandoimg = $('#enviando');
                enviarform = $('#enviarcadastro');
                cadastrando = $('#cadastrado');
                formulario = $('#id03');

                function EnviarCadastro() {
                        valnome = $('#nome').val();
                        valnascimento = $('#nascimento').val();
                        valcpf = $('#cpf').val();
                        valtelefone = $('#telefone').val();
                        valemail = $('#email').val();
                        valpwd = $('#pwd').val();

                        valcep = $('#cep').val();
                        valrua = $('#rua').val();
                        valnumero = $('#numero').val();
                        valbairro = $('#bairro').val();
                        valcidade = $('#cidade').val();
                        valestado = $('#estado').val();
                        valcomplemento = $('#complemento').val();

                        $.ajax({
                                type: 'POST',
                                dataType: 'html',
                                async: true,
                                url: '<?php echo $dominio ?>/cadastro/includes/cadastro.inc.php',
                                data: {
                                        submitcadastro: 1,
                                        nome: valnome,
                                        nascimento: valnascimento,
                                        nivel: valnivel,
                                        cpf: valcpf,
                                        telefone: valtelefone,
                                        email: valemail,
                                        cep: valcep,
                                        rua: valrua,
                                        numero: valnumero,
                                        bairro: valbairro,
                                        cidade: valcidade,
                                        estado: valestado,
                                        complemento: valcomplemento,
                                        pwd: valpwd
                                },
                                beforeSend: function(possivel) {
                                        window.scrollTo(0,0);
                                        enviandoimg.css('display', 'block');
                                        formulario.css('display', 'none');
                                        cadastrando.css('display', 'none');
                                },
                                success: function(possivel) {
                                        window.scrollTo(0,0);

                                        enviandoimg.css('display', 'none');
                                        formulario.css('display', 'block');
                                        cadastrando.css('display', 'block');

                                        if (possivel.includes('sucesso') == true) {
                                                formulario.css('display', 'none');
                                        }

                                        cadastrando.empty();
                                        cadastrando.html(possivel);
                                }
                        });
                }

                enviarform.click(function() {
                        EnviarCadastro();
                });

                $(document).keypress(function(keyp) {
                        if (keyp.keyCode == 13) {
                                EnviarCadastro();
                        }
                });
        }); /* document ready */
</script>
