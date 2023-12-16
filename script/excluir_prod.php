<?php

    include_once('../config.php');
            
    $id_produto = $_GET['id_produto'];

    $sql = $conexao->prepare("DELETE fROM `produtos` WHERE id_produto=?");
    $sql->execute(array($id_produto));

    header('Location: ../pages/consulta_prod.php');
?>