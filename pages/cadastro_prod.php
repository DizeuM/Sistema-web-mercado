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
    <title>Cadastrar produto</title>

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
    <br>
    <div class="content">

        <h3 class="box-border">Cadastrar produto</h3>

        <div class="box-border">
            
            <form action="../script/cadastrar_prod.php" method="post">
                                
                <div class="btn-top form-row">
            
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" name="submit" value="Cadastrar">
                    </div>
            
                </div>
            
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="id_produto">Código</label>
                        <input type="text" class="form-control" name="id_produto" placeholder="id_produto" value="" readonly>
                    </div>
            
                    <div class="form-group col-md-4">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" name="nome" placeholder="Nome">
                    </div>
            
                    <div class="form-group col-md-2">
                        <label for="status_cod">Status</label>
                        <select name="status_cod" class="form-control">
            
                            <option selected value="1">Ativo</option>
                            <option value="0">Inativo</option>
            
                        </select>
                    </div>
            
                </div>
            
                <div class="form-row">
            
                    <div class="form-group col-md-4">
                        <label for="categoria">Categoria</label>
                        <select name="categoria" class="form-control">
                            <?php
                            $sql = $conexao->prepare("SELECT * FROM `categoria`");
                            $sql->execute();
                            $result4 = $sql->fetchAll();
                            
                            echo '<option value="1" selected hidden>Categoria</option>';
                            
                            foreach ($result4 as $key => $data4){
                                $id_cat = $data4["id_cat"];
                                $nome_cat = $data4["nome_cat"];
            
                                echo '<option value="' . $id_cat . '">' . $nome_cat . '</option>';
                            }
                            ?>
                        </select>
            
                    </div>
            
                    <div class="form-group col-md-2">
                        <label for="unidade">Unidade</label>
                        <input type="text" class="form-control" name="unidade" placeholder="Unidade">
                    </div>
            
                    <div class="form-group col-md-2">
                        <label for="quantidade">Quantidade</label>
                        <input type="text" class="form-control" name="quantidade" placeholder="Quantidade">
                    </div>
            
                </div>
            
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="fornecedor">Fornecedor</label>
                        <select name="fornecedor" class="form-control">
                            <?php
                            $sql = $conexao->prepare("SELECT * FROM `fornecedor`");
                            $sql->execute();
                            $result5 = $sql->fetchAll();
            
                            echo '<option value="1" selected hidden >Fornecedor</option>';
            
                            foreach ($result5 as $key => $data5){
                                $id_forn = $data5["id_forn"];
                                $nome_forn = $data5["razao_social"];
            
                                echo '<option value="' . $id_forn . '">' . $nome_forn . '</option>';
                            }
                            ?>
                        </select>
                    </div>
            
            
                    <div class="form-group col-md-2">
                        <label for="preco">Preço</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">R$</div>
                            </div>
                            <input type="text" class="form-control" name="preco" placeholder="Preço">
                        </div>
                    </div>
                </div>
            </form>
            <?php
                if(isset($_GET['sucess']) and $_GET['sucess'] == 1){

                    echo '<div class="alert alert-success alert-dismissible" role="alert">
                    <strong>Produto cadastrado com sucesso.</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                }
                if(isset($_GET['sucess']) and $_GET['sucess'] == 2){

                    echo '<div class="alert alert-danger alert-dismissible" role="alert">
                    <strong>Erro ao cadastrar o produto.</strong>  Verifique se todos os campos estão preenchidos e tente novamente.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                }
            ?>
            
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>

</html>