<?php 
    // include()
    include_once('../includes/header.php');

    if (isset($_GET['acao'])) {
        $acao = $_GET['acao'];
        switch ($acao) {
            case 'principal':
                include_once('principal.php');
                break;
            case 'relatorio':
                include_once('relatorio.php');
                break;
            case 'editar':
                include_once('editar.php');
                break;
            case 'perfil':
                include_once('perfil.php');
                break;
            default:
                include_once('error.php');
                break;
        }
    } else {
        include_once('principal.php');
    }

    include_once('../includes/rodape.php');
