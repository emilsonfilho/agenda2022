<?php

try {
    DEFINE("HOST", "localhost");
    DEFINE("BD", "bd_agendaJMF");
    DEFINE("USER", "root");
    DEFINE("PASSWORD", "bdjmf");

    $conect = new PDO('mysql:host='.HOST.';dbname='.BD,USER,PASSWORD);
    $conect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo '<string>ERRO DE PDO = </string>' . $e -> getMessage();
}

