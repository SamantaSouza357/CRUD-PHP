<?php
include_once "conexao.php";

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
        <link rel="stylesheet" href="css/style.css">
    <title>Consultar Post</title>
</head>
<body>
<div class="container">
            <h1 class="text-center mt-4 mb-4">Lista de Usuarios</h1>
            <h3 class="mt-4 mb-4" id="userName"></h3>
            <a href="cadastrar_post.php"><button class="btn btn-success" type="button" id="cadastrar"><i class="fa fa-plus mr-2" aria-hidden="true"></i>Cadastrar um usuário</button></a>
        </div>
            <div class="mt-5">
                <div class="container table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                            <th class="text-center">Nome</th>
                            <th class="text-center">Telefone</th>
                            <th class="text-center">E-mail</th>
                            <th class="text-center">Editar</th>
                            <th class="text-center">Excluir</th>
                            </tr>
                        </thead>
                    <tbody>
                            <?php
                            $cmd = $con->prepare("SELECT * FROM usuario");
                            $cmd->execute();
                            $dados = $cmd->fetchAll(PDO::FETCH_OBJ);

                            if($dados === []){
                                echo " <td colspan='12' class='text-center'>Nenhum cadastro encontrado!!</td>";
                            }
                          
                            foreach($dados as $value)
                            {
                               
                                echo "<tr>
                                        <td class='text-center'>$value->nome</td>
                                        <td class='text-center'>$value->telefone</td>
                                        <td class='text-center'>$value->email</td>
                                        <td class='text-center'><a href='visualizar.php?id=$value->id'class='icone-olho text-dark text-decoration-none fa fa-pencil'></a></td>
                                        <td class='text-center'><a class='icone-lapis text-dark text-decoration-none fa fa-trash' href='deletar.php?id=$value->id'></a></td>
                                </tr>";

                              
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                        </div>

            </div> 


    <script src="lib/jquery-3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="lib/bootstrap-4.4.1/js/bootstrap.min.js"></script>
        <script src="lib/handlebars-4.7.3/handlebars.js"></script>
        <script src="lib/sweetalert/sweetalert.min.js"></script>


        <script type="text/javascript">

            var codigo = "";
           
            
      
            $(document).on('click', '#abrirModal', function () {
                visualizarUsuario();
            });

         
           
          
            function visualizarUsuario(){
                $('#modalVisualizacao').modal();
            }
        </script>

</body>
</html>