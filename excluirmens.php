<?php

require_once './Conexao.php';
//pega o id da mensagem via URL 
$idmens = mysqli_escape_string($con, filter_input(INPUT_GET, "idmens",FILTER_VALIDATE_INT,FILTER_SANITIZE_NUMBER_INT,FILTER_SANITIZE_SPECIAL_CHARS));
//deleta do banco
$delete  = mysqli_query($con, "delete from mensagem where idmens = '$idmens'");
//redireciona para a pagina principal
header("Location:logado.php");

