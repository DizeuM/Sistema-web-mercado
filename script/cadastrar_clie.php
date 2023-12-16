<?php

    include_once('../config.php');
            
    if(isset($_POST['submit']) and !empty($_POST['nome']) and !empty($_POST['CPF']) and !empty($_POST['email']) and !empty($_POST['telefone'])){

        $nome = $_POST['nome'];
        $CPF = $_POST['CPF'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $status = 1;
        

        $sql = $conexao->prepare(" INSERT INTO `cliente` (CPF, nome, email, telefone, status) VALUES(?,?,?,?,?)");  

        $sql->execute((array($CPF, $nome, $email, $telefone, $status)));

        header('Location: ../pages/cadastro_clie.php?sucess=1');

    }else{
    
        header('Location: ../pages/cadastro_clie.php?sucess=2');
        
    }
?>
