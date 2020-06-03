<!DOCTYPE html>
<html lang="pt-BR">
<head>
     <script src="js/jquery-3.5.1.min.js"></script>
    <script>
        //animaçao da página feita com jquery 
        $(document).ready(function(){
     $("form").hide().delay(1000).fadeIn(1000)
        })
    </script>
    <link rel="stylesheet" href="css/Postagem.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postagem</title>
</head>
<!--Pagina de Postagem-->
<body>
    
<main>
    <h1>Postagem</h1>
    <!-- Formulário de Postagem -->
    <form action="Postar.php" method="POST" enctype="multipart/form-data">

     
        <Textarea name="Mensagem" required minlength="5">


      </Textarea>
        <label for="file">Foto :</label><input type="file" name="arquivo" class="file" id="file" required>
      <button type="submit">Postar</button>

    </form>
</main>


</body>
</html>