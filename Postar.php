<?php

require_once './Conexao.php';
session_start();
//pega o id do  usuário logado
$idlog = $_SESSION["idlog"];

//pega a mensagem enviada pelo usuário logado 
$mensagem = mysqli_escape_string($con, filter_input(INPUT_POST, "Mensagem",FILTER_SANITIZE_SPECIAL_CHARS));
//verifica se tem mais de 5 caracteres
if(strlen($mensagem)>5){
    //verifica se ele enviou um arquivo
   if(isset($_FILES["arquivo"])){
       //pega a extensão desse arquivo
     $extensao =   pathinfo($_FILES["arquivo"]["name"],PATHINFO_EXTENSION);
     //formatos permitdos para arquivos
       $formatos = array("jpg","png","jpeg","mp4","3gp","mkv","avi","mov");
       //verifica se a extensão é permitida 
       if(in_array($extensao, $formatos)){
           //criptografa o nome do arquivo
           $novonome = md5(uniqid($_FILES["arquivo"]["name"]));
           //diretorio onde ficam guardados os arquivos  
           $dir = "ArquivosPostagem/";
           //nome novo do arquivo
           $nomecompleto = $novonome.".".$extensao;
           //move para a pasta 
           move_uploaded_file($_FILES["arquivo"]["tmp_name"], $dir.$nomecompleto);
           //insere o nome no banco de dados
           $inserir = mysqli_query($con, "insert into postagem(mensagem,arquivo,idpostador) values('$mensagem','$nomecompleto','$idlog')");
           //redireciona para a pagina principal
           header("Location:logado.php");
       }
 else{
     //se não for um formato permitido redirecion para a pagina de postagem
           header("Location:Postagem.php");
 }
      
       
       
   }
   
  
}
else{
    //se a mensagem não tiver mais de 5 caracteres 
    header("Location:Postagem.php");
}

