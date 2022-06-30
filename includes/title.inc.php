<?php

        $server_uri = $_SERVER['REQUEST_URI'];
        if (preg_match('/\?(?:.(?!\?))+$/', $server_uri, $server_uri, PREG_UNMATCHED_AS_NULL)) {
                $titulo_url = str_replace($server_uri[0],'',$_SERVER['REQUEST_URI']);
                $title_cru = explode('/', $titulo_url, -1);
                $title_anterior_cru = explode('/', $titulo_url, -2);
        } else {
                $title_cru = explode('/', $_SERVER['REQUEST_URI'], -1);
                $title_anterior_cru = explode('/', $_SERVER['REQUEST_URI'], -2);
        }// regex request uri
        $title = end($title_cru);

        $title_anterior = end($title_anterior_cru);

        $titulo_servidor = str_replace(array('http://', 'https://', '/', 'lucascortes', 'www', '.', '.com', '.br'), '', $dominio);

        $title_nomedaloja = str_replace(array('-'), array(' '), mb_strtoupper(mb_substr($nomedaloja, 0, 1)).mb_substr($nomedaloja, 1));
        $title_title = str_replace(array('-'), array(' '), mb_strtoupper(mb_substr($title, 0, 1)).mb_substr($title, 1));

        if ($title == $titulo_servidor) {
                // a index
                $title = $title_nomedaloja;
        } else if (strpos($title, 'sequencia') !== false) {
                // é o entrar com o get sequencia (edepois)
                $title =  'Área do cliente | ' . $title_nomedaloja;
        } else if ($title == 'entrar') {
                $title = 'Área do cliente | ' . $title_nomedaloja;
        } else if ($title == $nomedaloja) {
                $title =  'Flores Online';
        } else {
                // outros
                $title =  'Flores Online';
        }

        $head_desc = 'Flores Online';

        $robots = 'noindex, nofollow';

?>
