<?php
require_once './Conexao.php';
session_start();
//pega o id do usuário logado
$idlog = $_SESSION["idlog"];
//pega o numero digitado
$novonumero = mysqli_escape_string($con, filter_input(INPUT_POST, "numero",FILTER_SANITIZE_FULL_SPECIAL_CHARS));
//verifica se o numero tem mais de 8 caracteres
if(strlen($novonumero)>8){
    //Faz a mudança no Banco de Dados e redireciona para a pagina principal 
    $muda = mysqli_query($con, "update users set telefone = '$novonumero' where id = '$idlog' ");
    header("Location:logado.php");
    
}
else{
    //se der erro redireciona para a pagina de configurações
    header("Location:config.php");
}
