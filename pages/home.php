<?php

    session_start();

    include_once('../config.php');

    if((!isset($_SESSION['user']) == true) and (!isset($_SESSION['senha']) == true)){

        unset($_SESSION['user']);
        unset($_SESSION['senha']);
        header('Location: ../index.php');
    }

    $user = $_SESSION['user'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
    

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../pages/home.php">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cadastro
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                        <a class="dropdown-item" href="../pages/cadastro_prod.php">Cadastro produtos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../pages/cadastro_clie.php">Cadastro clientes</a>
                        <a class="dropdown-item" href="../pages/cadastro_forn.php">Cadastro fornecedores</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Operações
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                        <a class="dropdown-item disabled" href="#">Venda</a>
                        <a class="dropdown-item disabled" href="#">Compra</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item disabled" href="#">Atualização de estoque</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Consultas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                        <a class="dropdown-item" href="../pages/consulta_prod.php">Produtos</a>
                        <a class="dropdown-item disabled" href="#">Historico de vendas</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../pages/consulta_clie.php">Clientes</a>
                        <a class="dropdown-item" href="../pages/consulta_forn.php">Fornecedores</a>
                    </div>
                </li>
            </ul>
        </div>
        <a href="../script/deslogar.php" class="btn btn-danger">Sair</a>
    </nav>
    
    <?php
        echo "<br>";
        echo "<h2 style='text-align: center'>Bem vindo $user</h2>";
    ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>
</html>