<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="css/mens.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensagens Enviadas</title>
</head>
<!--Pagina de Mensagens Enviadas-->
<body>
    <h1>Mensagens Recebidas</h1>
    <?php 
 
require_once './Conexao.php';
session_start();
//pega a a sessão onde armazena o id do usuário logado 
$idlog = $_SESSION["idlog"];
//pega as mensagens recebidas no banco de dados  
$pegarmensagem = mysqli_query($con, "select mensagem,idmens from mensagem where iddest = '$idlog'");
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
        //faz um loop das mensagens dentro de um parágrao
        while ($campo = mysqli_fetch_array($pegarmensagem)){
            //exibe a mensagem e um link para excluir a mensaggem
            echo "<p>".$campo['mensagem']."<br>"."<a href=excluirmens.php?idmens=".$campo["idmens"].">Excluir</a>"."</p>";
           
             
        }
        
}
//se não tiver mensagens exibe essa mensagem
else{
    
   echo "<p>Sem Mensagens</p>"; 
}
?>
       
</body>
</html>