<?php 

 session_start();?>

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
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/est.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<!--Pagina de Cadastro-->
    <body > 

        <input type="checkbox" name="" id="check" class="check">
       
        <div class="div">
        
    </div>
    
    <label for="check"class="lab">&#x2261</label >
       
    <header>

        <nav>
          <li><a href="index.html">Inicio</a></li>
          <li><a href="Login.php">Login</a></li>
          
          


        </nav>
    </header>
    <main>
       
        <form  action="cadastrar.php" method="POST"  >
            
            <h1>Cadastro</h1><p><img src="img/IMG-20200522-WA0003.jpg" alt="Imagem de Cadastro" class="imgcad"></p>
            <?php
        
        $_SESSION["erro"] = FALSE;
        //erro que avisa o usuário
        if($_SESSION["erro"]==true){
            echo 'Dados Já Cadastrados ou incorretos ';
        } ?>
        <label for="cte"><p>Nome:</p></label>
        <input type="text" name="nome" class="input" id="cte" placeholder=" Seu Nome " required minlength="3" maxlength="20">  
        <label for="cte"><p>Telefone:</p></label>
        
        <input type="number" name="telef" class="input" id="cte" placeholder=" Seu Número " required minlength="8" maxlength="11">  
        <label for="eml"><p>E-mail:</p></label>
        <input type="email" name="email" class="input" id="eml" placeholder=" Seu E-mail" required> 
        <label for="ctp"><p>Senha:</p></label>
        <input type="password" name="pass" class="input"  id="ctp" placeholder=" Sua Senha " required minlength="5" maxlength="20">
        <strong><a href="Login.php" class="link">Já Tem Conta?</a></strong>
        <input type="submit" value="Cadastrar" class="bot" >
        
        
        
        
        
        </form>  
    </main>

    <footer class="divnome">
      
        <strong><a href="http://facebook.com/profile.php?id=100006469440726&ref=content_filter" target="_blank" class="rede"><img src="img/IMG-20200522-WA0022.jpg" class="img" alt="Logo Facebook" srcset=""></a></strong>
<strong><a href="http://" target="_blank" class="rede"><img  class="img" alt="Logo Do instagram" src="img/IMG-20200522-WA0023.jpg"></a></strong>
<strong>P@ulo Henrique</strong>

    </footer>


    </body>
</html>