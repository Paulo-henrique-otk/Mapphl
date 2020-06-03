<?php

require_once './Conexao.php';
//Desloga a sessão do usuário logado
session_start();
session_destroy();
session_abort();
session_unset();
//redireciona para a pagia inicial
header("Location:index.html");


