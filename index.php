<?php

//REDIRECIONANDO PARA O INDEX DA SESSÃO ABERTA.
session_start();
$email = isset($_SESSION["usuario"]) ? $_SESSION["usuario"] : "";
$tipo = isset($_SESSION["tipo"]) ? $_SESSION["tipo"] : "";
if ($tipo == "ADMINISTRADOR") {
    header('location: index_adm.php');
}
if ($tipo == "ALUNO") {
    header('location: index_aluno.php');
}
if ($tipo == "PROFESSOR") {
    header('location: index_professor.php');
}
if ($tipo == "SECRETARIA") {
    header('location: index_secretaria.php');
}

?>




<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta name="viewport" content="width=device-width, 
        initial-scale=1">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <meta charset="UTF-8">
    <title>Aula 1 PHP</title>
</head>

<body>

    <div class="titulo">
        <i class="material-icons icone">
            <img class="logo-icon" src="img/logoicon.png">
        </i>

        <h1>
            SAFBM
            <a href="">
                <i class="material-icons close">close</i>
            </a>
        </h1>
    </div>

    <div class="quadro">

        <nav>
            <a href="login.php">Logar</a>
        </nav>
        <div class="content">
            <img class="logo" src="img/logo1.png">
            <h1>Sistema Acadêmico FAETERJ/BM</h1>
            <p>
                Nosso Sistema destina-se a atentender Alunos,
                Professores e comunidade acadêmica. Afim de promover
                melhor integração e maior qualidade de ensino e pesquisa.
            </p>
        </div>

        <?php
            //INCLUINDO O RODAPÉ
            include 'rodape.php';
        ?>

    </div>










</html>