<?php

include_once __DIR__.'/../includes/setup.inc.php';

if (isset($_SESSION['l_id'])) {
        $_SESSION['endereco'] = $_POST['eid'];
}

?>
