<?php session_start();?>
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
    <title>Login</title>
</head>
<!--Pagina de Login -->
    <body>

        <input type="checkbox" name="" id="check" class="check">
       
        <div class="div">
       
    </div>
    
    <label for="check"class="lab">&#x2261</label >
       
    <header>

        <nav>
          <li><a href="index.html">Inicio</a></li>
          <li><a href="Cadastro.php">Cadastro</a></li>
          
          


        </nav>
    </header>
    <main>
        <form action="logar.php" method="POST" id="form" >
            <h1>Login</h1> <p><img src="img/IMG-20200522-WA0008.jpg" alt="Imagem de login" class="imglog"></p>
            <?php $_SESSION["errolog"] = false;
            //erro de aviso ao usuário
            if($_SESSION["errolog"]==true){
                echo 'Dados Incorretos';
            }
            
            ?>
        <label for="cte"><p>E-mail:</p></label>
        <input type="email" name="email" class="input" id="cte" placeholder=" Seu E-mail" required> 
        <label for="ctp"><p>Senha:</p></label>
        <input type="password" name="pass" class="input"  id="ctp" placeholder=" Sua Senha" required>
        <strong><a  class="link" href="Cadastro.php">Não Tem Cadastro?</a></strong>
        <input type="submit" value="Logar" class="bot" >
         
        
        
        </form>  
    </main>
    
    </body>
</html>