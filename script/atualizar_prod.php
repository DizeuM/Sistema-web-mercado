<?php

    include_once('../config.php');
            
    if(isset($_POST['submit'])){


        $id_produto = $_POST['id_produto'];
        $nome = $_POST['nome'];
        $status_cod = $_POST['status_cod'];
        $categoria = $_POST['categoria'];
        $unidade = $_POST['unidade'];
        $quantidade = $_POST['quantidade'];
        $fornecedor = $_POST['fornecedor'];
        $preco = $_POST['preco'];
        
        $sql = $conexao->prepare(" UPDATE `produtos` SET nome=?, quantidade=? ,unidade=?, preco=?, categoria_id_cat=?, status=?, fornecedor_id_forn=?  WHERE id_produto=? ");  

        $sql->execute((array($nome, $quantidade, $unidade, $preco, $categoria, $status_cod, $fornecedor, $id_produto)));

        header("Location: ../pages/detalhe_prod.php?id_produto=$id_produto&sucess=1");

    }
?>
