<?php
    session_start();

    include_once('../config.php');

    if((!isset($_SESSION['user']) == true) and (!isset($_SESSION['senha']) == true)){
        unset($_SESSION['user']);
        unset($_SESSION['senha']);
        header('Location: ../index.php');
    }

    $user = $_SESSION['user'];

    if(!empty($_GET['search'])){
        $search = $_GET['search'];
        $statusFilter = isset($_GET['status']) ? $_GET['status'] : '';
        $sql = $conexao->prepare("SELECT * FROM `fornecedor` WHERE (id_forn LIKE '$search%' or razao_social LIKE '$search%') AND (status = ? OR '' = ?) ORDER BY id_forn ASC");

    } else {   
        $statusFilter = isset($_GET['status']) ? $_GET['status'] : '';
        $sql = $conexao->prepare("SELECT * FROM `fornecedor` WHERE status = ? OR '' = ? ORDER BY id_forn DESC");
    }

    $sql->execute(array($statusFilter, $statusFilter));
    $result = $sql->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar fornecedores</title>

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

        <h3 class="box-border">Consultar fornecedores</h3>
        
        <div class="box-border">
            <div class="box-search form-row">
                
                <div class="form-group col-md-4">
                    <label for="pesquisar">Pesquisar:</label>
                    <div class="input-group">
                        <input type="search" class="form-control" placeholder="Pesquisar produto" value="<?php if(!empty($search)){echo $search;} ?>" id="pesquisar">
                        <div class="input-group-append">
                            <button name="pesquisar" type="button" class="btn btn-primary" onclick="searchData()">Pesquisar</button>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <form action="" method="get">
                        <label for="status">Status:</label>
                        <select class="form-control" id="status" name="status">

                            <?php if ($statusFilter == "1"):?>

                                <option value="">Todos</option>
                                <option selected value="1">Ativo</option>
                                <option value="0">Inativo</option>

                            <?php elseif ($statusFilter == "0"): ?>

                                <option value="">Todos</option>
                                <option value="1">Ativo</option>
                                <option selected value="0">Inativo</option>
                            
                            <?php else: ?>

                                <option selected value="">Todos</option>
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>

                            <?php endif; ?>
                        </select>
                    </form>
                </div>

                <div class="form-group ml-auto">
                    <br>
                    <a href="../pages/cadastro_forn.php" class="btn btn-success">Cadastrar fornecedor</a>
                </div>
            </div>

        
            <table class="table table-hover table ">

            <thead >
                <tr>
                    <th>Código</th>
                    <th>Razão social</th>
                    <th>CNPJ</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>ㅤ</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach($result as $key => $data): ?>

                <?php
                    $id_forn = $data["id_forn"];
                    $nome = $data["razao_social"];
                    $cnpj = $data["CNPJ"];
                    $email = $data["email"];


                    if ($data["status"] == 1){
                        $status = "Ativo";
                    }

                    else{
                        $status = "Inativo";
                    }

                    if($id_forn == 1){


                    }if($id_forn != 1):
                ?>

                    <tr>
                        <td> <?= $id_forn; ?> </td>
                        <td> <?= $nome; ?> </td>
                        <td> <?= $cnpj; ?> </td>
                        <td> <?= $email; ?> </td>
                        <td> <?= $status; ?> </td>
                        <!-- <td> <a href="detalhe_prod.php?id_forn=<?= $id_forn; ?>" class="btn btn-secondary btn-sm" >Ver tudo</a></td> -->
                        <td> <a href="#" class="btn btn-secondary btn-sm" >Detalhes</a></td>
                    </tr>
                    <?php endif?>
                <?php endforeach; ?>

            </tbody>
            </table>
        </div>
    </div>
    
    <script>
        var search = document.getElementById('pesquisar');
        var statusDropdown = document.getElementById('status');

        search.addEventListener("keydown", function(event) {
            if (event.key === "Enter") {
                searchData();
            }
        });

        // Adiciona um evento para detectar a alteração no dropdown de status
        statusDropdown.addEventListener("change", function() {
            searchData();
        });

        function searchData() {
            window.location = 'consulta_forn.php?search=' + search.value + '&status=' + statusDropdown.value;
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>
</html>