<?php

require_once './Conexao.php';
//pega o id da foto via URL
$foto = mysqli_escape_string($con, filter_input(INPUT_GET, "idfoto",FILTER_SANITIZE_FULL_SPECIAL_CHARS));
//Deleta do banco de Dados
$delete = mysqli_query($con, "delete from foto where idfoto = '$foto'");
//redireciona para a pagina de perfil
header("Location:Perfil.php");
