<?php 
session_start();
//verifica se a sessão do usuário esta vazia ou deslogada
if(strlen($_SESSION["nome"])==0){
    header("Location:Login.php");
    
}
require_once './Conexao.php';
//pega a palavra enviada 
$busca = mysqli_escape_string($con, filter_input(INPUT_GET, "Busca",FILTER_SANITIZE_SPECIAL_CHARS));

//pega o id do usuário logado
$id = $_SESSION["idlog"];

?>

<!DOCTYPE html>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/Busca.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca</title>
</head>
<!--Pagina de Busca-->
<body>
     <header>
      <!--Formulário de Busca-->
        <form action="Busca.php" method="GET">
            <label for="busc">Buscar Usuários : </label>
            <input type="search" name="Busca" id="busc">
           <button type="submit">Buscar</button>
           
        </form>
        <nav>
            <a href="">Perfil</a>
            <a href="">Mensagens</a>
            <a href="">Configurações</a>
        </nav>
    </header>
      
       
       
  
    
    <?php 
    //consulta o banco/obs:usuários diferentes do usuário logado 
    $search = mysqli_query($con, "select * from users where nome like '$busca%' and id != '$id'");
    $row = mysqli_num_rows($search);
    //verifica se existe um usuário com a palavra
    if($row>0 && strlen($busca)>0){
        //Fala o numero de usuários encontrados
        echo "<p><h1> $row Registro(s) Encontrados Para $busca</h1></p> ";
        //Faz um loop com o nome de todos os usuários que ele achou
        while ($campos = mysqli_fetch_array($search)){
            
            //Faz um link de acesso com id ao perfil daquele usuário especifico
            echo "<p> <a href=Perfilbusca.php?id=".$campos["id"].">".$campos["nome"]."</a></p>";
            echo '<hr>';
        }
    }
 else {
     //Quando não encontra usuários
        echo "<p>Não Foram Encontrados Registros Para $busca!</p>";    
    }
    
    ?>
</body>
</html>
