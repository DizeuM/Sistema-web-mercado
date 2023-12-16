<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .content {
            text-align: center;
        }

        .box-border {
            border: 2px solid #dee2e6;
            border-radius: 10px;
            padding: 20px;
            width: 300px; /* Defina a largura desejada */
        }

        .box-border h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            margin-bottom: 10px;
        }

        .btn-primary {
            width: 100%;
        }
        
    </style>
</head>
<body>

    <div class="content">
        <div class="box-border">
            <form action="script/testLogin.php" method="post">
                <div class="form-group">
                    <h2>Login</h2>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="user" placeholder="Usuário">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="senha" placeholder="Senha">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="submit" value="Entrar">
                </div>
            </form>
        </div>
    </div>

</body>
</html>