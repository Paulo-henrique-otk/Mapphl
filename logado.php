<?php 
session_start();
//verifica se a sessão do usuário esta vazia ou deslogada
require_once './Conexao.php';
if(strlen($_SESSION["nome"])==0){
    header("Location:login.php");
    
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <script>
        alert('Seja Bem Vindo(a) <?php /* Pega o nome do usuário logado e exibe em um alerta */ echo $_SESSION["nome"]; ?>!')
    </script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script>
     //animaçao da página feita com jquery 
        $(document).ready(function(){
            $(".jq").hide().delay(1000).fadeIn(1200)
            
        })
    </script>
    <link rel="stylesheet" href="css/logado.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Principal</title>
</head>
<!--Pagina Principal-->
<body>

    <header>
      <!--Formulário de Busca-->
        <form action="Busca.php" method="GET">
            <label for="busc">Buscar Usuários : </label>
            <input type="search" name="Busca" id="busc">
           <button type="submit">Buscar</button>
           
        </form>
      <!--Links de Navegação da Pagina-->
        <nav>
            <a href="Perfil.php">Perfil</a>
           
            <a href="mensagensE.php" title="Mensagens Enviadas">ME</a>
            <a href="mensagensR.php" title="Mensagens Recebidas">MR</a>
            <a href="config.php">Configurações</a>
        </nav>
    </header>
<h1>Mapphl</h1>


<p class="jq">Olá <?php /*Nome do usuário logado*/ echo $_SESSION["nome"];?>,Seja Bem Vindo(a) Ao Mapphl!</p>

<p>Postagens : </p>


<?php 
//pega o id do usuário logado
$idlog = $_SESSION["idlog"];
//verifica se existem  postagens de pessoas diferentes de usuário logado no banco e do ultimo até o primeiro
$pegapost = mysqli_query($con, "select * from postagem where idpostador!='$idlog' order by idpostador desc");
if(mysqli_num_rows($pegapost)>0){
    //faz um loop com as postagens
while ($arraypost = mysqli_fetch_array($pegapost)){
   
    echo '<main>';
    echo "<a href=Perfilbusca.php?id=".$arraypost["idpostador"]."><p>Perfil</p></a>";
    echo "<p> Mensagem :" . $arraypost["mensagem"]."</p>";
    //verifica a extensão do arquivo
    $extensao = pathinfo($arraypost["arquivo"],PATHINFO_EXTENSION);
    //se for imagem exibe dentro da tag <img> 
    if($extensao=="jpg"||$extensao=="png"||$extensao=="jpeg"){
        echo "<p> Post :</p><p><img src=ArquivosPostagem/".$arraypost["arquivo"]."></p>"; 
    }
    //se for video exibe dentro da tag <video>
    if($extensao=="mp4"||$extensao=="3gp"||$extensao=="mkv"||$extensao=="avi"||$extensao=="mov"){
        echo "<p>Post :<p><p><video src=ArquivosPostagem/".$arraypost["arquivo"]." controls></video></p>"; 
    }
    echo '</main>';
    
    
    
}

}
//se não tiver postagens exibe essa mensagem 
else{
    echo "<p>Sem Postagens</p>";
}
?>




    
</body>
</html>