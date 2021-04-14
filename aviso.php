<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta name="viewport" content="width=device-width, 
        initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/estilo.css">
    <meta charset="UTF-8">
    <title>Gerenciamento de Usuários</title>
</head>

<body>




    <?php
    $msg_titulo = @$_GET["mt"];
    $msg_conteudo = @$_GET["mc"];
    ?>

    <div class="aviso quadro">
        <h1><?= $msg_titulo ?></h1>
        <P>
            <?php
            echo $msg_conteudo;
            ?>
        </P>
        <div class="acoes">
            <a href="javascript:history.back()">
                <i class="material-icons">arrow_back</i>
                <span>VOLTAR</span>
            </a>

            <a href="index.php">
                <i class="material-icons">home</i>
                <span>HOME</span>
            </a>
        </div>
        <?php
            //INCLUINDO O RODAPÉ
            include 'rodape.php';
        ?>
    </div>

</html>