<?php
//nome do servidor
$host = "Localhost";
//usuário
$user = "root";
//senha
$password = "";
//nome do banco
$database = "mapphl";
//faz conexão com o Banco de Dados usando o mysqli
$con = mysqli_connect($host, $user, $password, $database);
//configura caracteres especiais 
mysqli_set_charset($con,"utf-8");

