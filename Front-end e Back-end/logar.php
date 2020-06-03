<?php

require_once './Conexao.php';
session_start();
//Pega os Dados Digitados
$email = mysqli_escape_string($con, filter_input(INPUT_POST, "email",FILTER_SANITIZE_EMAIL,FILTER_VALIDATE_EMAIL));
$senha = mysqli_escape_string($con,filter_input(INPUT_POST, "pass",FILTER_SANITIZE_SPECIAL_CHARS));

//Verifica os dados do usuário com o e-mail cadastrado
$verifica = mysqli_query($con, "select * from users where email='$email'");
//faz um array com os dados
$com = mysqli_fetch_array($verifica);
//pega a senha daquele usuário específico
$senhabd = $com["senha"];
//verifica se o email existe e se a senha esta compativel com o hash do banco
if(mysqli_num_rows($verifica )>0 && password_verify($senha, $senhabd)){
    //pega o nome do usuario e coloca em uma sessão
    $_SESSION["nome"] = $com["nome"];
    //pega o id do banco de dados e coloca em uma sessão
    $_SESSION["idlog"] = $com["id"];
    //redireciona para a pagina de logado
    header("Location:logado.php");
}
else{
    //se der erro ele redireciona de volta para a página de login
    $_SESSION["errolog"] = true;
    header("Location:login.php");
}
