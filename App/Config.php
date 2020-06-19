<?php

if(!isset($_SESSION['autenticado']) && $_SESSION['autenticado'] != true || $_SESSION['permissao'] != 'adm') {
    header('Location: /logout');
}

$date = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));

?>