<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="css/mens.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensagens Recebidas</title>
</head>
<!--Pagina de Mensagens Recebidas -->
<body>
    <h1>Mensagens Enviadas</h1>
    <?php 
require_once './Conexao.php';
session_start();
//pega a sessão que guarda o id do usuário
$idlog = $_SESSION["idlog"];
//pega as mensagens enviadas pelo usuário
$pegarmensagem = mysqli_query($con, "select mensagem,idmens from mensagem where idem = '$idlog'");
//verifica se tem mensagens
$row = mysqli_num_rows($pegarmensagem);

     ?>
    <?php 
    
    if($row>0){
        //se tiver uma mensagem
        if($row==1){
     echo "<h2>".$row ." Mensagem<h2>";
        }
        //se tiver mais de uma mensagem
        else{
            echo "<h2>".$row ." Mensagens<h2>";
        }
        //faz um loop das mensagens
        while ($campo = mysqli_fetch_array($pegarmensagem)){
            //exibe as mensagens  
            echo "<p>".$campo['mensagem']."</p>";
           
             
        }
}
//se não tiver mensagens exibe essa mensagem
else{
   echo "<p>Sem Mensagens</p>"; 
}
?>
        
</body>
</html>