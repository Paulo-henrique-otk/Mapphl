<?php
require_once './Conexao.php';
//pega o id da postagem via URL
$idpost = mysqli_escape_string($con, filter_input(INPUT_GET, "idpost",FILTER_SANITIZE_SPECIAL_CHARS,FILTER_SANITIZE_NUMBER_INT));
//deleta do banco
$deletepost = mysqli_query($con, "delete from postagem where idpost = '$idpost'");
//se tiver deletado volta para pagina prinipal
if($deletepost){
header("Location:logado.php");
}
//se não retorna para a pagina de perfil
else{
    header("Location:Perfil.php");
}
