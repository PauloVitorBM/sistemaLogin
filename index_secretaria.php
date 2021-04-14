<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta name="viewport" content="width=device-width, 
        initial-scale=1">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <meta charset="UTF-8">
    <title>Administrador</title>
</head>

<body>

    <?php
    include "sessao_sec.php";
    ?>

    <div class="titulo">
        <i class="material-icons icone">folder_shared</i>
        <h1>
            SAFBM
            <a href="">
                <i class="material-icons close">close</i>
            </a>
        </h1>
    </div>

    <div class="quadro">

        <nav>
            <a href="novo_usuario.php">Arquivos</a>
            <a href="conta.php?usu=<?= $email ?>">Conta</a>
            <a href="logof.php">Sair</a>
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