<?php
session_start();
require_once './Conexao.php';
//pega o nome do usuário que ira receber a mensagem
$nome = mysqli_escape_string($con, filter_input(INPUT_POST, "nome",FILTER_SANITIZE_SPECIAL_CHARS));
//pega a mensagem 
$mensagem = mysqli_escape_string($con, filter_input(INPUT_POST, "mens",FILTER_SANITIZE_SPECIAL_CHARS));
//pega os dados do usuário com o nome
$pegaiddest = mysqli_query($con, "select id from users where nome = '$nome'");
//transforma em um array 
$pegadados = mysqli_fetch_array($pegaiddest);
//pega o id do usuário
$iddest = $pegadados["id"];
//adiciona o nome de quem esta enviando a mensagem
$mensagem.= "<br> Enviado Por ".$_SESSION["nome"];
//id do usuário logado
$idem = $_SESSION["idlog"];
//insere no banco de dados  
$inserir = mysqli_query($con, "insert into mensagem(mensagem,iddest,idem) values('$mensagem','$iddest','$idem')");
//redireciona para a pagina principal 
header("Location:logado.php");


