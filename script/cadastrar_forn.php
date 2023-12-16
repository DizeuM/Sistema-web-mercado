<?php

    include_once('../config.php');
            
    if(isset($_POST['submit']) and !empty($_POST['nome']) and !empty($_POST['CNPJ']) and !empty($_POST['email']) and !empty($_POST['telefone'])and !empty($_POST['endereco'])){

        $nome = $_POST['nome'];
        $CNPJ = $_POST['CNPJ'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
        $status = 1;
        

        $sql = $conexao->prepare(" INSERT INTO `fornecedor` (CNPJ, razao_social, email, telefone, endereco, status) VALUES(?,?,?,?,?,?)");  

        $sql->execute(array($CNPJ, $nome, $email, $telefone, $endereco, $status));

        header('Location: ../pages/cadastro_forn.php?sucess=1');

    }else{
    
        header('Location: ../pages/cadastro_forn.php?sucess=2');
        
    }
?>
