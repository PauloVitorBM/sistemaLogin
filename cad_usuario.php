
<?php
//IMPORTANDO ARQUIVOS
include "funcoes.php";
include "sessao_adm.php";
//CRIANDO VARIAVEIS IMPORTANTES
$msg_titulo = "";
$msg_conteudo = "";
$ok = true;

//VERIFICANDO SE DADOS DOS FORMULÁRIOS ESTÃO CHEGANDO CORRETAMENTE


if (!isset($_POST["email"]) || $_POST["email"] == "") {
    $msg_conteudo .= "O Email não foi informado.<br>";
    $ok = false;
}

if (!isset($_POST["senha"]) || $_POST["senha"] == "") {
    $msg_conteudo .= "Senha não foi informada.<br>";
    $ok = false;
} else {
    if (!isset($_POST["confirma"]) || $_POST["confirma"] == "") {
        $msg_conteudo .= "Confirmação não foi informada.<br>";
        $ok = false;
    } else {
        if ($_POST["senha"] !== $_POST["confirma"]) {
            $msg_conteudo .= "Senha e Conformação não conferem.<br>";
            $ok = false;
        }
    }
}

if (!isset($_POST["concordo"])) {
    $msg_conteudo .= "Termo não foi aceito.<br>";
    $ok = false;
}

//CADASTRANDO O USUARIO
if ($ok) {
    //atribuir valores a variaveis
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $tipo = $_POST["tipo"];

    //variaveis para conexao

    $conn = getConnection();

    $sql = "INSERT INTO USUARIOS (email,senha,tipo) VALUES ('$email',MD5('$senha'),'$tipo');";

    if ($conn->query($sql) === TRUE) {
        $msg_titulo = "SUCESSO!";
        $msg_conteudo = "Usuario Cadastrado com Sucesso!";
    } else {
        $msg_titulo = "FALHA!";
        $msg_conteudo =  $conn->error;
    }

    $conn->close();

    header("location: aviso.php?mt=$msg_titulo&mc=$msg_conteudo");
}
?>




