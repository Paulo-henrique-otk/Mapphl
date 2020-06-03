<?php
require_once './Conexao.php';
session_start();
//pega o nome do usuário logado
$nome = $_SESSION["nome"];
//pega o id do banco de dados
$pega = mysqli_query($con, "select id from users where nome='$nome'");
//transforma em array
$array = mysqli_fetch_array($pega);
$id = $array["id"];
//verifica se o usuário selecionou a foto
if(isset($_FILES["foto"])){
    //formatos permitidos 
$formatos = array("png","jpg","jpeg");
//pega formato do arquivo enviado
$ext = pathinfo($_FILES["foto"]["name"],PATHINFO_EXTENSION);
//verifica se o formato é válido 
if(in_array($ext, $formatos)){
    //criptografa o nome da foto
    $cripto = md5(uniqid($_FILES["foto"]["name"]));
    //novo nome da foto
    $novonome = $cripto.".".$ext;
    //diretorio para onde a foto irá ser mandada
    $dir = "Fotop/";
    //função que move a foto
    move_uploaded_file($_FILES["foto"]["tmp_name"],$dir.$novonome );
    //insere a foto e o id no banco de dados
    $inseririd = mysqli_query($con, "insert into foto(iduser) values('$id')");
   $insert = mysqli_query($con, "update foto set foto='$novonome' where iduser = '$id'");  
   //redireciona para a pagina principal
   header("Location:logado.php");
}
 else {
     //se der erro tambem redireciona para a pagina de perfil
     
    header("Location:Perfil.php");
}

}