<?php

    include_once('../config.php');
            
    if(isset($_POST['submit']) and !empty($_POST['nome']) and !empty($_POST['unidade']) and !empty($_POST['quantidade']) and !empty($_POST['preco'])){


        $id_produto = $_POST['id_produto'];
        $nome = $_POST['nome'];
        $status_cod = $_POST['status_cod'];
        $categoria = $_POST['categoria'];
        $unidade = $_POST['unidade'];
        $quantidade = $_POST['quantidade'];
        $fornecedor = $_POST['fornecedor'];
        $preco = $_POST['preco'];
        $sql = $conexao->prepare(" INSERT INTO `produtos` (nome, quantidade, unidade, preco, categoria_id_cat, status, fornecedor_id_forn) VALUES(?,?,?,?,?,?,?)");  

        $sql->execute((array($nome, $quantidade, $unidade, $preco, $categoria, $status_cod, $fornecedor)));

        header('Location: ../pages/cadastro_prod.php?sucess=1');

    }else{
    
        header('Location: ../pages/cadastro_prod.php?sucess=2');
        
    }
?>
