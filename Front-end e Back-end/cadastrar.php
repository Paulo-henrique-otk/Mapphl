
<?php

require_once './Conexao.php';
session_start();

//pega os dados digitados
$nome = mysqli_escape_string($con, filter_input(INPUT_POST, "nome",FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$telefone = mysqli_escape_string($con, filter_input(INPUT_POST, "telef",FILTER_SANITIZE_NUMBER_INT,FILTER_VALIDATE_INT));
$email = mysqli_escape_string($con, filter_input(INPUT_POST, "email",FILTER_SANITIZE_EMAIL,FILTER_VALIDATE_EMAIL));
$senha = mysqli_escape_string($con, filter_input(INPUT_POST, "pass"));
//verifica se ja existe usuário cadastrado com o e-mail ou telefone
$verificar = mysqli_query($con, "select * from users where '$telefone'=telefone or '$email'=email");
if(mysqli_num_rows($verificar)>0){
    //redireciona para a pagina de login caso ja tenha conta 
    header("Location:login.php");
    
}
//verifica o comprimento dos dados enviados  e envia de volta caso algum esteja menor
else if(strlen($nome)<3|| strlen($telefone)<8|| strlen($senha)<8){
    $_SESSION["erro"] = true;
    
    header("Location:Cadastro.php");
}
//cadastra os dados no banco
else{
    //criptografa a senha
    $password = password_hash($senha,PASSWORD_DEFAULT);
    $inserir = mysqli_query($con, "insert into users(nome,telefone,email,senha) values('$nome','$telefone','$email','$password')");
    //bota o nome em uma sessão e envia para a página de login
    $_SESSION["nome"] = $nome;
    header("Location:login.php");
    
}
