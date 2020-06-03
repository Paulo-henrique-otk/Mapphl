<!DOCTYPE html>
<?php 
session_start();
//verifica se a sessão do usuário esta vazia ou deslogada
if(strlen($_SESSION["nome"])==0){
    header("Location:login.php");
    
}
?>
<html lang="pt-BR">
<head>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script>
//animaçao da página feita com jquery 
        $(document).ready(function(){
            $("form,button,h1").hide().delay(1000).fadeIn(1000)
        })
    </script>
    <link rel="stylesheet" href="css/config.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações</title>
</head>
<!--Pagina de Configurações-->
<body>
    <h1>Configurações</h1>
    <section>
        <!-- Formulário para Mudar o nome -->
        <form action="MudaNome.php" method="POST">
<p>Mudar Nome :</p>
<input type="text" name="novo">
<button type="submit">Mudar</button>

</form>
    </section>
    <section>
        <!--Formulario para mudança do número -->
        <form action="Mudanum.php" method="POST">
    <p>Mudar Numero : </p>
    <input type="number" name="numero" >
    <button type="submit">Mudar</button>
</form>

    </section>
    <button><a href="Sair.php">Sair</a></button>
</body>
</html>