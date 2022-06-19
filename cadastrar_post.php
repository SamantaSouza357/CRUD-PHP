<?php

if(!empty($_POST)){// o cadastro foi enviado ?
    include_once "conexao.php";// conexão com o BD
    
    $cmd = $con ->prepare("INSERT INTO usuario (nome,telefone,email,senha)
    VALUES (:nome,:telefone,:email,:senha)");
    $cmd-> bindParam(":nome", $_POST["nome"]);
    $cmd-> bindParam(":telefone", $_POST["telefone"]);
    $cmd-> bindParam(":email", $_POST["email"]);
    $cmd-> bindParam(":senha", $_POST["senha"]);
    $cmd-> execute();// 
    echo"<script>
                alert('DADOS CADASTRADOS COM SUCESSO!');
                window.location='consultar.php';
                </script>";     
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lib/bootstrap-4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="lib/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="lib/sweetalert/sweetalert.css">
    <title>Cadastrar Post</title>
</head>
<body>
<div class=" container">
            <h1 class="textCadastrar text-center mt-4 mb-4 neo-euskal ">Cadastro de Usuários</h1>
          
            <div class="container">
                <form id="formUsuario" method="post">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="nome" class="nome disco-paradiso">Digite seu nome:</label>
                            <input type="text" class="form-control obrigatorio" id="nome" name="nome">
                        </div>
                    <div class="form-group col-6">
                        <label for="telefone"class="disco-paradiso">Digite seu Telefone:</label>
                        <input type="text" class="telefone form-control" id="telefone" name="telefone">
                    </div>
                    <div class="form-group col-6">
                        <label for="email"class="disco-paradiso">Digite seu email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group col-6">
                        <label for="senha"class="disco-paradiso">Digite sua senha:</label>
                        <input type="password" class="form-control obrigatorio" id="senha" name="senha">
                       
                    </div>
                </div>
                <footer class="mt-3">
                    <div class="row">
                        <div class="col">
                            <a href="consultar.php"><button type="button" class="btn btn-outline-secondary" name="voltar" >Voltar</button></a>
                        </div>
                        <div class="col text-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary mr-1" name="limpar" id="limpar">Limpar</button>
                                <input type='submit' value='Cadastrar' class="btn btn-success">
                            </div>
                        </div>
                    </div>
                </footer>
            </form>
        </div>
    </div>
</body>
</html>