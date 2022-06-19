<?php

if(!empty($_POST)){// o cadastro foi enviado ?
    include_once "conexao.php";// conexão com o BD
    
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $id = $_POST['id'];

    $cmd = $con ->prepare("UPDATE usuario SET nome='$nome', telefone='$telefone', email='$email', senha='$senha' WHERE id=$id");
    $cmd->execute();
    echo"<script>
    alert('DADOS ALTERADOS COM SUCESSO!');
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
    <title>Alterar Post</title>
</head>

<body>

    <div class=" container">
        <h1 class="textCadastrar text-center mt-4 mb-4 neo-euskal ">Cadastro de Usuários</h1>

        <div class="container">
         <form id="formUsuario" method="post">

            <?php
            
            
            $id = $_GET["id"];
            
                    include_once "conexao.php";    
                 // conexão com o BD
                    $cmd = $con->prepare("SELECT * FROM usuario WHERE id=$id ");
                    $cmd->execute();
                    $dados = $cmd->fetchAll(PDO::FETCH_OBJ);
                    foreach($dados as $value)
                    {

                echo "
                        <div class='row'>
                        <input type='hidden' name='id' value='$value->id'>
                        <div class='form-group col-6'>
                            <label for='nome' class='nome disco-paradiso'>Digite seu nome:</label>
                            <input type='text' class='form-control obrigatorio' id='nome' name='nome' value='$value->nome'>
                        </div>
                    <div class='form-group col-6'>
                        <label for='telefone'class='disco-paradiso'>Digite seu Telefone:</label>
                        <input type='text' class='telefone form-control' id='telefone' name='telefone' value='$value->telefone'>
                    </div>
                    <div class='form-group col-6'>
                        <label for='email'class='disco-paradiso'>Digite seu email:</label>
                        <input type='email' class='form-control' id='email' name='email' value='$value->email'>
                    </div>
                    <div class='form-group col-6'>
                        <label for='senha'class='disco-paradiso'>Digite sua senha:</label>
                        <input type='password' class='form-control obrigatorio' id='senha' name='senha' value='$value->senha'>
                    </div>
                </div>
                <footer class='mt-3'>
                    <div class='row'>
                        <div class='col'>
                            <a href='consultar.php'><button type='button' class='btn btn-outline-secondary' name='voltar' >Voltar</button></a>
                        </div>
                        <div class='col text-right'>
                            <div class='btn-group'>
                                <input type='submit' value='Alterar' class='btn btn-success'>
                            </div>
                        </div>
                    </div>
                </footer>
                    ";
                }
                
                ?>


            </form>
        </div>
    </div>

</body>

</html>