<?php
        require_once __DIR__.'/setup.inc.php';
        header("Content-type: text/javascript");
?>

/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */

/* altura do conteudo relativa ao tamanho do menutopwrap */
alturaHeader = $("#menutopwrap").outerHeight();
<?php
        // margin top diferente pra index
        if (getcwd() == ('/home2/lucasc15/public_html/'.$nomedaloja)) {
                echo '
        		$(".conteudo").css({
                                "margin-top": $("#menutopwrap").outerHeight()
                        });
                ';
        } else {
                echo '
        		$(".conteudo").css({
                                "margin-top": alturaHeader
                        });
                ';
        }
?>
/* altura do conteudo relativa ao tamanho do menutopwrap */

/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */

/* carregando por cima da pagina toda */
document.addEventListener('DOMContentLoaded', function () {
        $("#loader").fadeOut("fast", function() {
                $('extremos').css('display','block');
                $('body').css({
                        'position':'static',
                        'width':'100%',
                        'overflow-y':'visible'
                });

                window.scrollTo(0,0);
        });
});
/* carregando por cima da pagina toda */

/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */

function larguraInterna() {
        $(window).on('scroll', function () {
                /* largura interna */
                larguraInterna = window.innerWidth;
                if (larguraInterna > 680) {
                        marginTopFundamental = '0.9%';
                } else if (larguraInterna <= 680) {
                        marginTopFundamental = '7vh';
                }
                /* largura interna */

                /*$('#fundamental').css('margin-top', marginTopFundamental);*/
        });
}

/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */

function visitaWidth() {
        /* visita width */
        $.ajax({
                type: 'POST',
                dataType: 'html',
                async: true,
                url: '<?php echo $dominio ?>/includes/visita_width.inc.php',
                data: {visWidth: larguraInterna}
        });
        /* visita width */
}

/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */

function loadFundamental(caminho) {
        $('#fundamental').html();
        $('#fundamental').load(caminho);
        $('#fundamental').fadeIn(180);
}

/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */

function loadSuperior(caminho) {
        $('#superior').html();
        $('#superior').load(caminho);
        $('#superior').fadeIn(180);
}

/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */

function loadVestimenta(caminho) {
        $('#vestimenta').html();
        $('#vestimenta').load(caminho);
        $('#vestimenta').fadeIn(180);
}

/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */

function setFundamental() {
        /* fundamental */
        $('#fundamental').css({
                'position': 'absolute',
                'width':'90%',
                'top': $(window).scrollTop(),
                'left': '0',
                'right': '0',
                'overflow':'scroll',
                'margin-left': 'auto',
                'margin-right': 'auto',
                'text-align': 'center',
                'border-radius': 'var(--radius)',
                'border': '3px solid var(--creme)',
                'background-color': 'var(--cremelight)',
                'z-index': '999999999',
                '-webkit-box-shadow': '0px 10px 13px -7px #000000, 5px 5px 15px 5px rgba(0,0,0,0)',
                'box-shadow': '0px 10px 13px -7px #000000, 5px 5px 15px 5px rgba(0,0,0,0)'
        });

        window.addEventListener('scroll', function (event) {
                scrollPos = $(window).scrollTop();
                document.getElementById('fundamental').style.top = ((scrollPos) + 'px');
        });
        /* fundamental */
}

/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */

function setFulldamental() {
	$('#fundamental').css({
		'top':$(window).scrollTop(),
		'width':'100%',
		'max-width':'100%',
		'max-height':'100vh',
		'height':'100vh',
		'border':'0',
		'display':'flex',
		'flex-direction':'column',
		'flex-wrap':'wrap',
		'justify-content':'center',
                'flex-wrap':'wrap',
                'align-items':'center',
		'overflow':'auto',
		'border-radius':'0'
	});
}

/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */

function setSuperior() {
        /* superior */
        $('#superior').css({
                'position': 'fixed',
                'top': '0',
                'height':'100%',
                'left': '-340px',
                'text-align': 'center',
                'background-color': 'var(--branco)',
                'z-index': '111'
        });
        /* superior */
}

/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */

function setVestimenta() {
        /* vestimenta */
        $('#vestimenta').css({
                'position': 'absolute',
                'width':'90%',
                'max-width': '320px',
                'top': $(window).scrollTop() + 72 + 'px',
                'left': '0',
                'right': '0',
                'margin-left': 'auto',
                'margin-right': 'auto',
                'text-align': 'center',
                'border-radius': 'var(--radius)',
                'border': '0px solid var(--preto)',
                'background-color': 'var(--branco)',
                'z-index': '999999999',
                '-webkit-box-shadow': '0px 10px 13px -7px #000000, 5px 5px 15px 5px rgba(0,0,0,0)',
                'box-shadow': '0px 10px 13px -7px #000000, 5px 5px 15px 5px rgba(0,0,0,0)',
        });

        window.addEventListener('scroll', function (event) {
                var scrollPos = $(window).scrollTop();
                document.getElementById('vestimenta').style.top = ((scrollPos + 72) + 'px');
        });
        /* vestimenta */
}

/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */

/* abre fundamental */
function abreFundamental() {
        if ($(window).width()>600) {
                if (($(window).width() / 2)>450) {
                        fundamentalmaxwidth = '450px';
                } else {
                        fundamentalmaxwidth = ($(window).width() / 2) + 'px';
                }
        } else {
                fundamentalmaxwidth ='340px';
        }

        $("#fundamental").css({
                "display": "block",
                "width": "90%",
                "max-height":$(window).height() - 34 + 'px',
                "max-width": fundamentalmaxwidth,
                "top": $(window).scrollTop()
        });

        $("extremos").css({
                "pointer-events": "none",
                "opacity": "0.72",
                "-webkit-filter":"blur(3px)"
        });
}
/* abre fundamental */

/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */

/* abre superior */
function abreSuperior() {

        scrollPos = $(window).scrollTop();

        $("#superior").css({
                "display": "block",
                "left": "0"
        });

        $("extremos").css({
                "pointer-events": "none",
                "opacity": "0.72",
                "-webkit-filter":"blur(3px)"
        });
}
/* abre superior */

/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */

/* abre vestimenta */
function abreVestimenta() {
        $("#vestimenta").css({
                "display": "block",
                "width": "90%",
                "max-width": "320px",
                "top": $(window).scrollTop() + 72 + 'px'
        });

        $("#fundamental").css({
                "-webkit-filter":"blur(3px)"
        });

        $("extremos").css({
                "pointer-events": "none",
                "opacity": "0.72"
        });
}
/* abre vestimenta */

/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */

/* fecha fundamental */
function fechaFundamental() {
        $('#fechar').on('click', function() {
                $("#fundamental").css("max-width", "0px");
                $("#fundamental").fadeOut(180);
                $("#fundamental").empty();
                $('#fecharvestimenta').trigger("click");

                setTimeout(function(){
                        $("extremos").css({
                                "pointer-events": "auto",
                                "opacity": "1",
                                "-webkit-filter":"blur(0px)"
                        });
                }, 180);
        });
}
/* fecha fundamental */

/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */

/* fecha superior */
function fechaSuperior() {
        $('#fecharsuperior').on('click', function() {
                $('body').animate({
                        marginLeft:bodymargininicial+'px'
                }, 90, 'linear');
                $("#superior").fadeOut(180);
                $("#superior").css('left','-340px');
                $('#abremenusuperior').removeClass('open');

                setTimeout(function(){
                        $("extremos").css({
                                "pointer-events": "auto",
                                "opacity": "1",
                                "-webkit-filter":"blur(0px)"
                        });
                }, 180);
        });
}
/* fecha superior */

/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */

/* fecha menu */
function fechaMenu() {
        $('#fechar').on('click', function() {
                $("#superior").css("max-width", "0px");
                $("#superior").fadeOut(180);
                $("#superior").html("");

                setTimeout(function(){
                        $("extremos").css({
                                "pointer-events": "auto",
                                "opacity": "1",
                                "-webkit-filter":"blur(0px)"
                        });
                }, 180);
        });
}
/* fecha menu */

/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */

/* fecha vestimenta */
function fechaVestimenta() {
        $('#fecharvestimenta').on('click', function() {
                $("#vestimenta").css("max-width", "0px");
                $("#vestimenta").fadeOut(180);
                $("#vestimenta").html("");

                $("#fundamental").css({
                        "-webkit-filter":"blur(0px)"
                });

                if ($('#fundamental').html()=='') {
                        setTimeout(function(){
                                $("extremos").css({
                                        "pointer-events": "auto",
                                        "opacity": "1",
                                        "-webkit-filter":"blur(0px)"
                                });
                        }, 180);
                }
        });
}
/* fecha vestimenta */

/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */

/* input borders */
function bordaRosa() {
        $(':input').each(function(index, item) {
                if ($(item).val() == '') {
                        if ($(this).hasClass('opcional')) {

                        } else {
                                $(item).addClass('bordarosa');
                        }
                } else {
                        if ($(item).hasClass('bordarosa')) {
                                $(item).removeClass('bordarosa');
                        }
                }
        });
}
function tiraBordaRosa() {
        $(':input').each(function(index, item) {
                if ($(item).hasClass('bordarosa')) {
                        $(item).removeClass('bordarosa');
                }
        });
}
/* input borders */

/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */

/**
* Função para aplicar máscara em campos de texto
* Copyright (c) 2008, Dirceu Bimonti Ivo - http://www.bimonti.net
* All rights reserved.
* @constructor
*/
/* Version 0.27 */
/**
* Função Principal
* @param w - O elemento que será aplicado (normalmente this).
* @param e - O evento para capturar a tecla e cancelar o backspace.
* @param m - A máscara a ser aplicada.
* @param r - Se a máscara deve ser aplicada da direita para a esquerda. Veja Exemplos.
* @param a -
* @returns null
*/
function maskIt(w,e,m,r,a){
// Cancela se o evento for Backspace
if (!e) var e = window.event
if (e.keyCode) code = e.keyCode;
else if (e.which) code = e.which;

// Variáveis da função
var txt = (!r) ? w.value.replace(/[^\d]+/gi,'') : w.value.replace(/[^\d]+/gi,'').reverse();
var mask = (!r) ? m : m.reverse();
var pre = (a ) ? a.pre : "";
var pos = (a ) ? a.pos : "";
var ret = "";

if(code == 9 || code == 8 || txt.length == mask.replace(/[^#]+/g,'').length) return false;

// Loop na máscara para aplicar os caracteres
for(var x=0,y=0, z=mask.length;x<z && y<txt.length;){
if(mask.charAt(x)!='#'){
ret += mask.charAt(x); x++;
} else {
ret += txt.charAt(y); y++; x++;
}
}

// Retorno da função
ret = (!r) ? ret : ret.reverse()
w.value = pre+ret+pos;

}

// Novo método para o objeto 'String'
String.prototype.reverse = function(){
return this.split('').reverse().join('');
};
/* Função para aplicar máscara em campos de texto */

/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */

/* Esquema pra definir os values quando já haviam sido preenchidos anteriormente pelo usuário (enquanto na mesma aba) */

function pegaInputValues() {
        $('input, textarea').on('keyup', function() {
                if ($(this).attr('type') !== 'password') {
                        sessionStorage.setItem($(this).attr('id'), $(this).val());
                }
        });
}
/* pegaInputValues(); */

function colocaInputValues() {
        $('input, textarea').each(function() {
                if ($(this).attr('type') !== 'password') {
                        if ($(this).attr('id').includes('porpagina')) {
                                //seekbar
                        } else {
                                if ( (!$(this).hasClass('configuracao')) && ($(this).attr('id').includes('desconto')==false) && ($(this).attr('id').includes('kilometragem')==false) && ($(this).attr('id').includes('km')==false) ) {
                                        if (sessionStorage.getItem($(this).attr('id')) !== '') {
                                                $(this).val(sessionStorage.getItem($(this).attr('id')));
                                        } else {
                                                $(this).val('');
                                        }
                                }
                        }
                }
        });
}
/* colocaInputValues(); */
/* Esquema pra definir os values quando já haviam sido preenchidos anteriormente pelo usuário (enquanto na mesma aba) */

/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */

$('.menuitem').on('click', function() {
        makom = $(this).attr('id').split('_')[1];
        window.scrollTo({
                top: document.getElementById(makom+'wrap').offsetTop - alturaHeader,
                left: 0,
                behavior: 'smooth'
        });
        $('#fechar').trigger('click');
        $('#fecharvestimenta').trigger('click');
        $('#fecharsuperior').trigger('click');
        $('#abremenusuperior').removeClass('open');
});
$('.botaointro').on('click', function() {
        window.scrollTo({
                top: document.getElementById('contatowrap').offsetTop - alturaHeader,
                behavior: 'smooth'
        });
});
$('#logotop').on('click', function() {
        window.location.href='<?php echo $dominio ?>';
});

/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */

if (typeof bodymargininicial !== 0) {
        bodymargininicial = window.getComputedStyle(document.body).getPropertyValue('margin-left').split('px')[0];
        bodymarginincrementada = parseInt(bodymargininicial) + 136;
}

/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */

function abreCarrinho() {
        carrinhoalturainicial = $('#carrinho').height();
        atualizaCarrinho();
        $('#carrinho').removeClass('fechaCarrinho');
        $('#carrinho').addClass('abreCarrinho');
        setTimeout(function(){
                $('#carrinho').css('display','flex');
        },330);
}

function resetCarrinho() {
        $('#carrinho').css({
                'top':'unset',
                'bottom':'0',
                'display':'none',
                'padding-top':'0',
        });
        $('.itenscarrinho').css({
                'max-height':'180px'
        });
}

function fechaCarrinho() {
        $('#carrinho').removeClass('abreCarrinho');
        $('#carrinho').addClass('fechaCarrinho');
        setTimeout(function() {
                resetCarrinho();
        },330);
}

function atualizaCarrinho() {
        $.ajax({
                type: 'POST',
                dataType: 'html',
                async: true,
                url: '<?php echo $dominio ?>/carrinho/atualiza.php',
                success: function(atualizacarrinho) {
                        $('.itenscarrinho').html(atualizacarrinho);
                        totalPagamento();
                        atualizaEndereco();
                }
        });
}

function totalPagamento() {
        $.ajax({
                type: 'POST',
                dataType: 'html',
                async: true,
                url: '<?php echo $dominio ?>/pagamento/atualizatotal.php',
                success: function(atualizatotal) {
                        $('.totalcarrinho').html(atualizatotal);
                }
        });
}

function pagamentoEscolhido(forma) {
        $.ajax({
                type: 'POST',
                dataType: 'html',
                async: true,
                data: {
                        forma: forma
                },
                url: '<?php echo $dominio ?>/pagamento/pagamentoescolhido.php',
                success: function(formadepagamento) {
                        $('.formadepagamento').html(formadepagamento);
                }
        });
}

function removeCarrinho(cid) {
        $.ajax({
                type: 'POST',
                dataType: 'html',
                async: true,
                url: '<?php echo $dominio ?>/carrinho/remover.php',
                data: {
                        cid: cid
                },
                success: function(removendo) {
                        atualizaCarrinho();
                }
        });
}

function atualizaEndereco() {
        $.ajax({
                type: 'POST',
                dataType: 'html',
                async: true,
                url: '<?php echo $dominio ?>/endereco/atualizaendereco.php',
                beforeSend: function() {
                        $('.enderecoentrega').html("<div id='enviando'><div id='enviandospinner'></div></div>");
                },
                success: function(atualizaendereco) {
                        $('.enderecoentrega').html(atualizaendereco);
                }
        });
}

function removeEndereco(eid) {
        $.ajax({
                type: 'POST',
                dataType: 'html',
                async: true,
                url: '<?php echo $dominio ?>/endereco/removeendereco.php',
                data: {
                        eid: eid
                },
                success: function(removendo) {
                        atualizaEndereco();
                }
        });
}

function escolheEndereco(eid) {
        $.ajax({
                type: 'POST',
                dataType: 'html',
                async: true,
                url: '<?php echo $dominio ?>/endereco/escolheendereco.php',
                data: {
                        eid: eid
                },
                success: function(escolhendo) {
                        window.location.href = '<?php echo $dominio ?>/pagamento';
                }
        });
}

function escolhePagamento(forma) {
        $.ajax({
                type: 'POST',
                dataType: 'html',
                async: true,
                url: '<?php echo $dominio ?>/pagamento/escolhepagamento.php',
                data: {
                        forma: forma
                },
                success: function(escolhendo) {
                        window.location.href = '<?php echo $dominio ?>/confirmacao';
                }
        });
}

$(document).ready(function() {
        $('.lista').each(function() {
                if ($(this).children().length==1) {
                        // coloca .selecionda na primeira opcao das listas que so tem uma opcao
                        $(this).children().addClass('selecionada');
                }
        });
});
function Selecionadas() {
        $('.opcoes').on('click', function(selecao) {
                listadeopcoes = $(this).parent().data('lista');
                if ($(this).hasClass('selecionada')) {
                        $('.lista[data-lista="'+listadeopcoes+'"]').children('.opcoes').removeClass('selecionada');
                        selecionadas = 0;
                        window[listadeopcoes] = 0;
                        selecao.preventDefault();
                        return;
                }

                $('.lista[data-lista="'+listadeopcoes+'"]').find('*').removeClass('selecionada');

                $(this).addClass('selecionada');
                window[listadeopcoes] = $(this).data('opcao');
                $('.listatitulo[data-lista='+$(this).parent().data('lista')+']').find('.aviso').remove();

                selecionadas = $('.selecionada').length;

                if ($(this).hasClass('enderecos')) {
                        /* adicionar novo endereço */
                        if ($(this).data('opcao')===0) {
                                loadFundamental('<?php echo $dominio ?>/endereco/novoendereco.php');
                        };
                }
                selecao.preventDefault();

        });
}

function setEscolhas() {
        selecionadas = 0;
        escolhas = parseInt($('.lista').length);
}

function Progresso() {
        $('.progresso').on('click',function() {
                $('.lista').each(function() {
                        if ($(this).find('.selecionada').length==0) {
                                if ($('.listatitulo[data-lista='+$(this).data('lista')+']').children().length==0) {
                                        // só coloca um aviso
                                        $('.listatitulo[data-lista='+$(this).data('lista')+']').append("<p class='aviso'>Escolha uma opção:</p>");
                                }
                        }
                });
        });
}

$('.fechacarrinho').on('click',function() {
        fechaCarrinho();
});;

function abreFranja() {
        $('#carrinho').css({
                'top':alturaHeader
        });
        $('.itenscarrinho').css({
                'max-height':'100%'
        });

        abreMenuTop();
}

function atualizaConfirmacao() {
        $.ajax({
                type: 'POST',
                dataType: 'html',
                async: true,
                url: '<?php echo $dominio ?>/confirmacao/atualizaconfirmacao.php',
                success: function(atualizaconfirmacao) {
                        $('.confirmacao').html(atualizaconfirmacao);
                }
        });
}

function controleQuantidade() {
       $('.qntcntrl').off().on('click',function() {
                       if ($(this).hasClass('aumentar')) {
                               quantidade = parseFloat($(this).siblings('.quantidade').val()) + 1;
                       } else {
                               if ($(this).siblings('.quantidade').val()>1) {
                                       if ($(this).siblings('.quantidade').val() > 0) {
                                               quantidade = parseFloat($(this).siblings('.quantidade').val()) - 1;
                                       } else {
                                               quantidade = 0;
                                       }
                               } // >1
                       }

                       $(this).siblings('.quantidade').val(quantidade);
                       updateQuantidade();
       });
}

function adicionarCarrinho(pid,quantidade,opcoesselecionadas) {
        $.ajax({
                type: 'POST',
                dataType: 'html',
                async: true,
                url: '<?php echo $dominio ?>/carrinho/adicionar.php',
                data: {
                        pid: pid,
                        quantidade: quantidade,
                        opcoesselecionadas: opcoesselecionadas

                },
                success: function(adicionando) {
                        if (adicionando.includes('máxima')) {
                                $('#banneravisomsg').html(adicionando);
                                mostraBannerAviso();
                        } else {
                                $('.itenscarrinho').html(adicionando);
                                abreCarrinho();
                        }
                }
        });
}

function updateQuantidade(cid,quantidade) {
        if (quantidade>0) {
                $.ajax({
                        type: 'POST',
                        dataType: 'html',
                        async: true,
                        data: {
                                quantidade: quantidade || 0,
                                cid: cid || 0
                        },
                        url: '<?php echo $dominio ?>/carrinho/updatecarrinho.php',
                        success: function(updatecarrinho) {
                                if (updatecarrinho==1) {
                                        atualizaCarrinho();
                                } else {
                                        if (updatecarrinho!=0) {
                                                $('#banneravisomsg').html(updatecarrinho);
                                                mostraBannerAviso();
                                        }
                                }
                        }
                });
        } else {
                removeCarrinho(cid);
        }
}

function mostraBannerAviso() {
        if (menutopaberto==0) {
                abreMenuTop();
        }

        $('#banneraviso').css('display','block');
        setTimeout(function(){
                $('#fechabanneraviso').trigger('click');
        }, 1000);
}

$(document).ready(function() {
        $('#fechabanneraviso').on('click',function() {
                $('#banneraviso').fadeOut('slow');
        });
});

function ucfirst(string) {
        return string[0].toUpperCase() + string.slice(1)
}

$(document).ready(function() {
        $('.produtoimg').attr('src', $('.produtoimgscroll').first().attr('src'));
        $("<div class='produtoimgtimer'></div>").insertBefore($('.produtoimg').closest('.produtoimginnerwrap'));
        imgscrollnumero = 0;
        velocidadevisualizacaoimg = 9000;
        visualizacaotimer = 0;
        visualizacao = setInterval(function() {
                clearInterval(visualizacaotimer);
                imgtimer = 0;
                $('.produtoimg').closest('.produtoimginnerwrap').find('.produtoimgtimer').css('width',imgtimer+'%');
                visualizacaotimer = setInterval(function(){
                        larguratimer = $('.produtoimg').parent().siblings('.produtoimgtimer').width();
                        $('.produtoimg').parent().siblings('.produtoimgtimer').css('width',imgtimer+'%');
                        if (imgtimer<100) {
                                imgtimer++;
                        }
                },velocidadevisualizacaoimg/100);
                (imgscrollnumero===(parseInt($('.produtoimgscroll').length)-1)) ? imgscrollnumero=0 : imgscrollnumero++;
                $('.produtoimg').attr('src', $('.produtoimgscroll').eq(imgscrollnumero).attr('src'));
        }, velocidadevisualizacaoimg);

        $('.produtoimgscroll').on('click', function() {
                clearInterval(visualizacao);
                clearInterval(visualizacaotimer);
                $('.produtoimg').parent().siblings('.produtoimgtimer').css('width','0%')
                imgscrollnumero = $('.produtoimgscroll').index($(this));
                $(this).closest('.produtoimgscrollinnerwrap').closest('.produtoimgscrollwrap').closest('.produtoimgscrollouterwrap').siblings('.produtoimginnerwrap').find('.produtoimg').attr('src', $(this).attr('src'));
        });

        if (window.innerWidth>=600) {
                $('.produtoimgscrollouterwrap').hover(
                        function() {
                                $(this).find('.imgscrollcntrl').animate({'opacity':'1'},340);
                        }, function() {
                                $(this).find('.imgscrollcntrl').animate({'opacity':'0'},340);
                        }
                );
        } else if (window.innerWidth<600) {
                $('.imgscrollcntrl').animate({'opacity':'1'},340);
        }

        $('.imgscrollcntrl').on('click',function() {
                event.preventDefault();
                largurascrollcontainer = $(this).siblings('.produtoimgscrollwrap').width();
                scrollada = largurascrollcontainer / 3;
                ($(this).hasClass('prosseguir')) ? quantidade = '+='+scrollada+'px' : quantidade = '-='+scrollada+'px';
                $(this).siblings('.produtoimgscrollwrap').animate({
                        scrollLeft: quantidade
                }, 340);
        });
});

function abreMenuTop() {
        menutopaberto = 1;
        $('#menutopwrap').addClass('slidein');
        $('#menutopwrap').removeClass('slideout');
        $('#menutopwrap').css('display','flex');
}

function fechaMenuTop() {
        menutopaberto = 0;
        $('#menutopwrap').removeClass('slidein');
        $('#menutopwrap').addClass('slideout');
        setTimeout(function(){
                $('#menutopwrap').css('display','none');
        },341);
}

$(document).ready(function() {
        $('.wrapitemloja').on('hover',function() {
                $(this).find('.botaoitemloja').css({'display':'block'});
        });
        $('.itemtitulocarrinho').on('click',function() {
                window.location.href='<?php echo $dominio ?>/loja/produto/'+$(this).data('url');
        });
});

$(document).ready(function () {
        var carrinho = document.getElementById('carrinho');
        interact('#franjacarrinho').draggable({
                inertia:true,
                restrict: {
                        restriction: document.getElementsByClassName('conteudo')[0],
                        endOnly: true,
                        elementRect: { top: 0.9, left: 0, bottom: 1, right: 1 }
                },
                startAxis: 'y',
                lockAxis: 'y',
                listeners: {
                        start (event) {

                        },
                        move (event) {
                                if (event.speed>=750) {
                                        if (event.y0>event.clientY) {
                                                podefecharmenutopporcausadocarrinho = 0;
                                                abreFranja();
                                        } else if (event.y0<event.clientY) {
                                                fechaCarrinho();
                                        }
                                }

                                carrinho.style.top = event.clientY+'px';
                                if (event.clientY>alturaHeader) {
                                        podefecharmenutopporcausadocarrinho = 1;
                                        if ($('#carrinho').height()<234) {
                                                fechaCarrinho();
                                        } else {
                                                $('.itenscarrinho').css({
                                                        'max-height':$('#carrinho').height()
                                                });
                                        }
                                } else if (event.clientY<alturaHeader) {
                                        podefecharmenutopporcausadocarrinho = 0;
                                        abreFranja();
                                }
                        },
                        end (event) {
                                if (event.clientY<(alturaHeader*3)) {
                                        podefecharmenutopporcausadocarrinho = 0;
                                        abreFranja();
                                }

                                if (carrinho.offsetTop<100) {
                                        podefecharmenutopporcausadocarrinho = 0;
                                        carrinho.style.top = alturaHeader+'px';
                                }
                        }
                }
        })
        .styleCursor(false)
})
/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */

function EnviarEntrada() {
        valemail = $('#email').val();
        valpwd = $('#pwd').val();
        valrequest = $('#request').val();

        $.ajax({
                type: 'POST',
                dataType: 'html',
                async: true,
                url: '<?php echo $dominio ?>/entrar/includes/entrar.inc.php',
                data: {
                        submitentrar: 1,
                        entraremail: valemail,
                        entrarpwd: valpwd,
                        entrarrequest: valrequest,
                },
                beforeSend: function() {
                        $('#enviando').css('display', 'block');
                        $('#resultentrar').empty();
                },
                success: function(entrando) {
                        if (entrando.includes('entrou') == true) {
                                $('#content').css('display', 'none');
                                window.location.href = '<?php echo $dominio ?>/';
                        } else {
                                $('#enviando').css('display', 'none');
                                $('#resultentrar').html(entrando);
                        }
                }
        });
}

$(document).ready(function() {
        $('#enviarentrar').click(function() {
                EnviarEntrada();
        });
});
