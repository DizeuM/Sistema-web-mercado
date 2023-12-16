<?php
    session_start();
    if(isset($_POST['submit']) and !empty($_POST['user']) and !empty($_POST['senha'])){
        
        include_once('../config.php');

        $user = $_POST['user'];
        $senha = $_POST['senha'];

        $sql = $conexao->prepare("SELECT  * FROM `funcionario` WHERE user=? and senha=?");  
        $sql->execute((array($user, $senha)));
 
        $result = $sql->fetchAll();

        if($result != null){
            $_SESSION['user'] = $user;
            $_SESSION['senha'] = $senha;
            header('Location: ../pages/home.php');
        }
        else{
            unset($_SESSION['user']);
            unset($_SESSION['senha']);
            header('Location: ../index.php');
        }
    }   

    else{
    
        header('Location: ../index.php');
    }
?>