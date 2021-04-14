<?php
//IMPORTANDO ARQUIVOS
include "funcoes.php";
include "sessao_adm.php";
//CRIANDO VARIAVEIS IMPORTANTES
$msg_titulo = "";
$msg_conteudo = "";
$ok = true;

//RECEBENDO VALORES
$id = @$_POST["id"];
$senhaatual = @$_POST["senhaatual"];
$novasenha = @$_POST["novasenha"];
$confirma = @$_POST["confirma"];
//VERIFICANDO SE DADOS DOS FORMULÁRIOS ESTÃO CHEGANDO CORRETAMENTE


if (!filter_var($id, FILTER_VALIDATE_EMAIL)) {
    $msg_conteudo .= "Email inválido.<br>";
    $ok = false;
}
if (strlen($senhaatual) < 6) {
    $msg_conteudo .= "A senha atual não foi informada.<br>";
    $ok = false;
}
if (strlen($novasenha) < 6) {
    $msg_conteudo .= "A nova senha não foi informada.<br>";
    $ok = false;
}
if (strlen($novasenha) < 6 && $novasenha != $confirma) {
    $msg_conteudo .= "A confirmação da nova senha não confere.<br>";
    $ok = false;
}
echo $id . " " . $senhaatual . " " . $novasenha;

//ALTERANDO A SENHA
if ($ok) {
    //variaveis para conexao

    $conn = getConnection();
    //verificando se a senha atual é válida

    $sql = "SELECT * FROM USUARIOS WHERE email='$id' and senha=md5('$senhaatual')";
    $resp = $conn->query($sql);
    if ($resp->num_rows > 0) {
        $sql = "UPDATE USUARIOS SET senha=md5('$novasenha') WHERE email='$id';";

        if ($conn->query($sql) == true) {
            $msg_titulo = "SUCESSO!";
            $msg_conteudo = "Senha Alterada com Sucesso!";
        } else {
            $msg_titulo = "FALHA!";
            $msg_conteudo =  $conn->error;
        }
    } else {
        $msg_titulo = "ERRO!";
        $msg_conteudo = "Senha Atual não confere!";
    }
    $conn->close();

    header("location: aviso.php?mt=$msg_titulo&mc=$msg_conteudo");
}
?>

