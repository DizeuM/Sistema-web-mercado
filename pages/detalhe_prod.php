<?php

    session_start();

    include_once('../config.php');

    if((!isset($_SESSION['user']) == true) and (!isset($_SESSION['senha']) == true)){

        unset($_SESSION['user']);
        unset($_SESSION['senha']);
        header('Location: ../index.php');
    }

    $user = $_SESSION['user'];
    
    $id_produto = $_GET['id_produto'];
    
    $sql = $conexao->prepare("SELECT * FROM `produtos` WHERE id_produto=?");
    $sql->execute(array($id_produto));

    $result = $sql->fetchAll();

    foreach($result as $key => $data){

        $id_produto = $data["id_produto"];
        $nome = $data["nome"];
        $categoria_id_cat = $data["categoria_id_cat"];
        $quantidade = $data["quantidade"];
        $unidade = $data["unidade"];
        $data_criacao = $data["data_criacao"];
        $fornecedor_id_forn = $data["fornecedor_id_forn"];
        $preco = $data["preco"];
        
        $status_cod = $data["status"] == 1;

        if ($data["status"] == 1){
            $status = "Ativo";
        }
        
        else{
            $status = "Inativo";
        }

    }

    $sql = $conexao->prepare("SELECT * FROM `categoria` WHERE id_cat=? ");
    $sql->execute(array($categoria_id_cat));
    $result2 = $sql->fetch();
    $categoria =  $result2["nome_cat"];

    $sql = $conexao->prepare("SELECT * FROM `fornecedor` WHERE id_forn=? ");
    $sql->execute(array($fornecedor_id_forn));
    $result3 = $sql->fetch();
    $fornecedor =  $result3["razao_social"];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhe produto</title>

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

        <h3 class="box-border">Detalhes do produto</h3>

        <div class="box-border">
            
            <form action="#" method="">
                <div class="form-row btn-top">

                    <div class="form-group">
                        <a href="editar_prod.php?id_produto=<?= $id_produto; ?>" class="btn btn-primary">Editar</a>
                    </div>

                    <div class="form-group ml-auto">
                        <label for="">ㅤㅤㅤㅤ</label>
                        <a href="../pages/consulta_prod.php" class="btn btn-secondary">Voltar</a>
                    </div>

                </div>
                <div class="form-row">

                    <div class="form-group col-md-2">
                        <label for="id_produto">Código</label>
                        <input type="text" class="form-control" id="id_produto" placeholder="id_produto" value="<?php echo $id_produto; ?>" readonly>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" placeholder="Nome" value="<?php echo $nome; ?>" readonly>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="status_cod">Status</label>
                        <input type="text" class="form-control" id="status_cod" placeholder="Status" value="<?php echo $status; ?>" readonly>
                    </div>

                </div>
                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="categoria">Categoria</label>
                        <input type="text" class="form-control" id="categoria" placeholder="Categoria" value="<?php echo $categoria; ?>" readonly>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="unidade">Unidade</label>
                        <input type="text" class="form-control" id="unidade" placeholder="Unidade" value="<?php echo $unidade; ?>" readonly>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="quantidade">Quantidade</label>
                        <input type="text" class="form-control" id="quantidade" placeholder="Quantidade" value="<?php echo $quantidade; ?>" readonly>
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="fornecedor_id_forn">Fornecedor</label>
                        <input type="text" class="form-control" id="fornecedor_id_forn" placeholder="Fornecedor" value="<?php echo $fornecedor; ?>" readonly>
                    </div>


                    <div class="form-group col-md2">
                        <label for="preco">Preço</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">R$</div>
                            </div>
                            <input type="text" class="form-control" id="preco" placeholder="Preço" value="<?php echo $preco; ?>" readonly>
                        </div>

                    </div>
                </div>

            </form>

            <?php
                if(isset($_GET['sucess']) and $_GET['sucess'] == 1){

                    echo '<div class="alert alert-success alert-dismissible" role="alert">
                    Atualização realizada com sucesso.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                }
                if(isset($_GET['sucess']) and $_GET['sucess'] == 2){

                    echo '<div class="alert alert-danger alert-dismissible" role="alert">
                    <strong>Erro ao fazer a atualização do produto.</strong> Tente novamente em outro momento.
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
