<?php

$id = $_GET["id"];

include_once "conexao.php";

$cmd = $con ->prepare("DELETE FROM usuario WHERE id=$id");
$cmd->execute();
echo"<script>
alert('DADOS DELETADO COM SUCESSO!');
window.location='consultar.php';
</script>";  




?>