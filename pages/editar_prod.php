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
    <title>Editar produto</title>

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

        <h3 class="box-border">Editar produto</h3>
        
        <div class="box-border">

            <div class="btn-top form-row ">
                


                <div class="form-group">
                    <form class="box-search" action="../script/atualizar_prod.php" method="post">
                </div> 

                <div class="form-group">
                    <input type="submit" class="btn btn-success" name="submit" value="Salvar">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Excluir</button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirme a exclusão do produto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-footer">
                                    <a href="../script/excluir_prod.php?id_produto=<?= $id_produto; ?>" class="btn btn-danger">Excluir</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group ml-auto">
                    <label for="">ㅤㅤㅤㅤ</label>
                    <a href="../pages/consulta_prod.php" class="btn btn-secondary">Voltar</a>
                </div> 

            </div>


            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="id_produto">Código</label>
                    <input type="text" class="form-control" name="id_produto" placeholder="id_produto" value="<?php echo $id_produto; ?>" readonly>
                </div>

                <div class="form-group col-md-4">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" placeholder="Nome" value="<?php echo $nome; ?>">
                </div>

                <div class="form-group col-md-2">
                    <label for="status_cod">Status</label>
                    <select name="status_cod" class="form-control">

                        <?php if ($status == "Ativo"):?>

                        <option selected value="1">Ativo</option>
                        <option value="0">Inativo</option>

                        <?php else: ?>

                        <option value="1">Ativo</option>
                        <option selected value="0">Inativo</option>

                        <?php endif; ?>
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

                        foreach ($result4 as $key => $data4){
                            $id_cat = $data4["id_cat"];
                            $nome_cat = $data4["nome_cat"];

                            if ($id_cat == $categoria_id_cat) {
                                echo '<option value="' . $categoria_id_cat . '" selected>' . $categoria . '</option>';
                            } else {
                                echo '<option value="' . $id_cat . '">' . $nome_cat . '</option>';
                            }
                        }
                        ?>
                    </select>

                </div>

                <div class="form-group col-md-2">
                    <label for="unidade">Unidade</label>
                    <input type="text" class="form-control" name="unidade" placeholder="Unidade" value="<?php echo $unidade; ?>">
                </div>

                <div class="form-group col-md-2">
                    <label for="quantidade">Quantidade</label>
                    <input type="text" class="form-control" name="quantidade" placeholder="Quantidade" value="<?php echo $quantidade; ?>">
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

                        foreach ($result5 as $key => $data5){
                            $id_forn = $data5["id_forn"];
                            $nome_forn = $data5["razao_social"];

                            if ($id_forn == $fornecedor_id_forn) {
                                echo '<option value="' . $fornecedor_id_forn . '" selected>' . $fornecedor . '</option>';
                            } else {
                                echo '<option value="' . $id_forn . '">' . $nome_forn . '</option>';
                            }
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
                        <input type="text" class="form-control" name="preco" placeholder="Preço" value="<?php echo $preco; ?>">
                    </div>
                </div>
            </div>
            </form>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>

</html>






