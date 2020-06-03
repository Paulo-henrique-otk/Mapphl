<?php
require_once './Conexao.php';
session_start();
//pega o id do usuário logado
$idlog = $_SESSION["idlog"];
//pega o nome Digitado
$novonome = mysqli_escape_string($con, filter_input(INPUT_POST, "novo",FILTER_SANITIZE_FULL_SPECIAL_CHARS));
//verifica se o nome tem 3 ou mais caracteres
if(strlen($novonome)>=3){
    //faz a mundança no banco de Dados
    $mudanome = mysqli_query($con, "update users set nome ='$novonome' where id = '$idlog'");
    //Coloca o novo nome na sessão e redireciona para a pagina a principal
    $_SESSION["nome"] = $novonome;
    header("Location:logado.php");
}
else{
    //se der erro retorna para a página de configurações
    header("Location:config.php");
}

