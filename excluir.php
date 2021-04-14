
<?php
    include "sessao_adm.php";
    include 'funcoes.php';

    $email = isset($_GET['email'])?$_GET['email']:"";

    if( !filter_var($email,FILTER_VALIDATE_EMAIL) ){
        header("location: aviso.php?mt=ERRO&mc=Erro Desconhecido");
    }
    
    $c = getConnection();

    $comando = "DELETE FROM USUARIOS WHERE email='$email'";
    $ok = $c->query($comando);
    $c->close();
    if($ok){
        header("location: usuarios.php");
    }else{
        header("location: aviso.php?mt=ERRO&mc=Erro ao excluir.");
    }


?>