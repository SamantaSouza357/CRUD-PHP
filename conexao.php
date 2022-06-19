<?php
$con = new PDO("mysql:hot=localhost;port=3306;dbname=bdblog","root","usbw");//configurando o acesso ao BD


$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Ativar recursos de exibição de erros de bamco de dados 
?>