<?php

    $conexao = new PDO("mysql:host=localhost;dbname=loja", 'root', '');
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>