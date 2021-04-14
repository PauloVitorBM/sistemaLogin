<?php

include "sessao_adm.php";
    include 'funcoes.php';

    $email = isset($_GET['email'])?$_GET['email']:"";

    if( !filter_var($email,FILTER_VALIDATE_EMAIL) ){
        header("location: aviso.php?mt=ERRO&mc=Erro Desconhecido");
    }
    
    $c = getConnection();
    $s = "123mudar";

    $comando = "UPDATE USUARIOS SET senha=md5('$s') WHERE email='$email'";
    $ok = $c->query($comando);
    $c->close();
    if($ok){
        header("location: usuarios.php");
    }else{
        header("location: aviso.php?mt=ERRO&mc=Erro ao redefinir.");
    }

    



?>