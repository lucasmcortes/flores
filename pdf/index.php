<?php

        require_once __DIR__.'/../includes/setup.inc.php';
        require_once __DIR__.'/../includes/dompdf.inc.php'; // Dompdf

        // Carrega o HTML pra dentro da classe
        $dompdf->loadHtml('<b>Olá mundo</b>');

        // ob_start();
        // require 'loja/index.php';
        // $html = ob_get_clean();
        // $dompdf->loadHtmlFile($html);

        // Página
        $dompdf->setPaper('A4','portrait');

        // Renderiza o arquivo PDF
        $dompdf->render();

        // Mostra
        header('Content-type:application/pdf');
        echo $dompdf->output();

        // Download
        // $dompdf->stream('documento.pdf');

        // Salvar arquivo em disco
        // file_put_contents(__DIR__.'/arquivo.pdf',$dompdf->output());
        // echo 'arquivo salvo';


?>
