<?php
//IMPORTANDO ARQUIVOS
include "sessao_adm.php";
include "funcoes.php";
//CRIANDO VARIAVEIS IMPORTANTES
$msg_titulo = "";
$msg_conteudo = "";
$ok = true;

//VERIFICANDO SE DADOS DOS FORMULÁRIOS ESTÃO CHEGANDO CORRETAMENTE


if (!isset($_POST["email"]) || $_POST["email"] == "") {
    $msg_conteudo .= "O Email não foi informado.<br>";
    $ok = false;
}

//CADASTRANDO O USUARIO
if ($ok) {
    //atribuir valores a variaveis
    $email = $_POST["email"];
    $id = $_POST["id"];
    $tipo = $_POST["tipo"];

    //variaveis para conexao

    $conn = getConnection();

    $sql = "UPDATE USUARIOS SET email='$email', tipo='$tipo' WHERE email='$id';";

    if ($conn->query($sql) > 0) {
        $msg_titulo = "SUCESSO!";
        $msg_conteudo = "Usuario Alterado com Sucesso!";
    } else {
        $msg_titulo = "FALHA!";
        $msg_conteudo =  $conn->error;
    }

    $conn->close();

    header("location: aviso.php?mt=$msg_titulo&mc=$msg_conteudo");
}
?>
       



