
<?php
$email = @$_POST["email"];
$senha = @$_POST["senha"];

if ($email == "" || $senha == "") {
    //erro
    echo "ERRO INTERNO";
} else {
    include 'funcoes.php';
    $c = getConnection();

    $comando = "SELECT * FROM USUARIOS WHERE
        email='$email' and senha=md5('$senha')";

    $tabela = $c->query($comando);

    if ($tabela->num_rows == 0) {
        header("location: aviso.php?mt=ERRO&mc=Usuário e/ou senha invalidos");
    } else {
        $linha = $tabela->fetch_assoc();


        //INICIANDO SESSÃO
        session_start();
        $_SESSION["usuario"] = $linha["email"];
        $_SESSION["tipo"] = $linha["tipo"];

        //senha padrão para redefinir senhas.
        $_SESSION["senhapadrao"] = "123mudar";

        //REDIRECIONANDO DE ACORDO COM O TIPO DE USUÁRIO
        if ($linha["tipo"] == "ALUNO") {
            header("location: index_aluno.php");
        }
        if ($linha["tipo"] == "PROFESSOR") {
            header("location: index_professor.php");
        }
        if ($linha["tipo"] == "ADMINISTRADOR") {
            header("location: index_adm.php");
        }
        if ($linha["tipo"] == "SECRETARIA") {
            header("location: index_secretaria.php");
        }
    }
    //FECHANDO A CONEXÃO
    $c->close();
}
?>
