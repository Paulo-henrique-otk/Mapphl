<?php 
session_start();

?>

<!DOCTYPE html>
<script src="js/jquery-3.5.1.min.js"></script>
    <script>
        //animaçao da página feita com jquery 
        $(document).ready(function(){
     $("form").hide().delay(1000).fadeIn(1000)
        })
    </script>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="css/mensagem.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensagem</title>
</head>
<!--Pagina de Envio de mensagens-->
<body>
    
<main>
    <!--Formulário de envio de mensagem -->
    <form action="enviarmens.php" method="POST">
        
        <input type="hidden" name="nome" value="<?php /*Pega o nome do usuário de busca*/ echo $_SESSION["nomeb"];?>" >
      <p>Mensagem : </p>
      <Textarea name="mens">


      </Textarea>

      <button type="submit">Enviar</button>

    </form>
</main>


</body>
</html>