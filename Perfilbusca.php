<?php
session_start();
//verifica se a sessão do usuário esta vazia ou deslogada
if(strlen($_SESSION["nome"])==0){
    header("Location:login.php");
    
}
require_once './Conexao.php';
//pega o id do usuário enviado pela URL
$id = mysqli_escape_string($con, filter_input(INPUT_GET, "id",FILTER_SANITIZE_FULL_SPECIAL_CHARS));
//pega os dados do banco
$buscadados = mysqli_query($con, "select nome,telefone from users where id ='$id'");
//transforma em array
$campobusca = mysqli_fetch_array($buscadados);

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
    <title>Perfil De Busca</title>
</head>
<!--Pagina de Perfil de Busca -->
<body>
     <header>
    
</header>
    <section>
     <?php 
     //pega o nome do usuário de busca e coloca em uma sessão
     $_SESSION["nomeb"] = $campobusca["nome"];
        //verifica se o usuario tem foto de perfil no banco
        $verificafoto = mysqli_query($con, "select foto from foto where iduser = '$id'");
        //transforma em um array
        $pegafoto = mysqli_fetch_array($verificafoto);
        //se tiver exibe a Foto de perfil do usuário de busca,OBS:Não é possivel o usuário logado excluir a foto 
        if(mysqli_num_rows($verificafoto)>0){
            
            echo "<img src=Fotop/".$pegafoto["foto"].">";
        }
        //se não tiver exibe uma mensagem simples
        else {
            echo '<p>Sem Foto<p>';
        }
        
        ?>

    <p>Nome : <?php /*pega o nome do usuário de busca no banco de dados */ echo $campobusca["nome"];?></p>
    <p>Telefone : <?php /*pega o telefone do usuário de busca no banco de dados */ echo $campobusca["telefone"];?></p>
    <a href="mensagem.php">Enviar Mensagem</a>
   </section>
    
<?php
//verifica se o usuário de busca tem postagens no banco
$pegapost = mysqli_query($con, "select * from postagem where idpostador='$id'");
   $row = mysqli_num_rows($pegapost);
   if($row>0){
       //se tiver apenas uma exibe essa mensagem
       if($row==1){
       echo "<section><p>".$row." Postagem </p></section>";
       }
       //se tiver mais de uma exibe essa mensagem
       if($row>1){
           echo "<section><p>".$row. " Postagens </p></section>";
       }
       //faz um loop com as postagens do usuário
       while ($campos = mysqli_fetch_array($pegapost)){
           echo '<main>';
           //mensagem escrita na postagem
           echo "<p> Mensagem :".$campos["mensagem"]." </p>";
           //verifica qual a extensão do arquivo da postagem
       $extensao=pathinfo($campos["arquivo"],PATHINFO_EXTENSION);
       //se for imagem exibe dentro da tag <img> 
           if($extensao=="jpg"||$extensao=="jpeg"||$extensao=="png"){
               echo "<p>Post :</p><p><img src=ArquivosPostagem//".$campos["arquivo"]."></p>";
           }
           //se for video exibe dentro da tag video 
           if($extensao == "mp4"||$extensao=="mov"||$extensao=="avi"||$extensao=="3gp"||$extensao=="mkv"){
                echo "<p>Post :</p><p><video src=ArquivosPostagem/".$campos["arquivo"]." controls></video></p>";
           }
           echo '</main>';
       }
   }
   //se não tiver postagens exibe uma mensagem em uma <section>
   else{
       
       echo "<section><p> Sem Postagens</p></section>";
   }
   
   
   
   ?>





   
    
    
    
    
    
    

</body>
</html>