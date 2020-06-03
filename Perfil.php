<?php

require_once './Conexao.php';
session_start();
//pega o id do usuário logado
$idlog = $_SESSION["idlog"];
//pega o telefone 
$pegadados = mysqli_query($con, "select telefone from users where id='$idlog'");
//transforma em um array
 $campo = mysqli_fetch_array($pegadados);
 


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script>
        //animaçao da página feita com jquery 
        $(document).ready(function(){
     $("section").hide().delay(1000).fadeIn(1000)
        })
    </script>
    <link rel="stylesheet" href="css/Perfil.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de <?php /*Nome do usuário logado*/ echo $_SESSION["nome"]; ?></title>
</head>
<!--Pagina de Perfil -->
<body>
     <header>
    
</header>
    <section>
        <?php 
        
        //verifica se o usuário logado tem foto no banco
        $verificafoto = mysqli_query($con, "select foto,idfoto from foto where iduser = '$idlog'");
        //transorma em um array
        $pegafoto = mysqli_fetch_array($verificafoto);
        //se tiver uma foto ele exibe a tag img junto com a imagem pega na pasta Fotop,mas o nome é pego no banco de dados
        if(mysqli_num_rows($verificafoto)>0){
            //exibe a imagem junto com um link para excluir a imagem, OBS:Só apaga o nome no banco mas apaga o  arquivo da pasta
            echo "<img src=Fotop/".$pegafoto["foto"].' alt="" >';
            echo "<p><a href=Excuirfoto.php?idfoto=".$pegafoto["idfoto"].">Excluir</a></p>";
        }
        //se não tiver imagem exibe um formulário para o usuário escolher uma imagem
        else {
            echo  "<form action='upload.php' method='POST' enctype='multipart/form-data'>
             <input type='file' name='foto'> 
             <input type='submit' value='Salvar' >
             </form>";
        }
        
 

        //verifica se a sessão do usuário esta vazia ou deslogada
if(strlen($_SESSION["nome"])==0){
    header("Location:login.php");
    
}
        
        ?>
    
        
    <p>Nome : <?php /*Pega o nome do usuário pela sessão*/ echo  $_SESSION["nome"];?></p>
    <p>Telefone : <?php /*pega o teleone do usuário no banco de dados*/ echo $campo["telefone"];?></p>
    <a href="Postagem.php"> Fazer Postagem</a>
   </section>
    
   <?php 
   //verifica se o usuário logado tem postagens no banco de dados 
   $pegapost = mysqli_query($con, "select * from postagem where idpostador='$idlog'");
   $row = mysqli_num_rows($pegapost);
   if($row>0){
       //se tiver uma exibe essa mensagem
       if($row==1){
           echo '<section>';
       echo "<p>".$row." Postagem </p>";
       echo '</section>';
       }
       //se tiver mais de uma exibe essa mensagem
       if($row>1){
           echo '<section>';
           echo "<p>" >$row ."Mensagens </p>";
           echo '</section>';
       }
       //Faz um loop com as postagens que ele tiver e coloca dentro da tag <main>
       while ($campos = mysqli_fetch_array($pegapost)){
           echo '<main>';
           //mensagem escrita na postagem
           echo "<p> Mensagem :".$campos["mensagem"]." </p>";
           //pega a extensão do arquivo que o usuário postou  
       $extensao=pathinfo($campos["arquivo"],PATHINFO_EXTENSION);
       //verifica se é uma imagem
           if($extensao=="jpg"||$extensao=="jpeg"||$extensao=="png"){
               //se for exibe na tag <img>
               echo "<p>Post :</p><p><img src=ArquivosPostagem//".$campos["arquivo"]."></p>";
           }
           //verifica se é um video 
           if($extensao == "mp4"||$extensao=="mov"||$extensao=="avi"||$extensao=="3gp"||$extensao=="mkv"){
               //se for exibe na tag <video>
                echo "<p>Post :</p><p><video src=ArquivosPostagem/".$campos["arquivo"]."></video></p>";
           }
           //exibe um link para a exclusão de uma postagem
           echo '<p><a href=excluirpost.php?idpost='.$campos["idpost"]." > Excluir Post</a><p>";
           echo '</main>';
       }
   }
   else{
       //se não tiver postagens exibe essa mensagem dentro de uam <section>
       echo "<section><p> Sem Postagens,Que tal Fazer a sua primeira Postagem?</p></section>";
   }
   
   
   
   ?>
    
    
</body>
</html>