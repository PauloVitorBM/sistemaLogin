<?php

session_start();
$email = isset($_SESSION["usuario"]) ? $_SESSION["usuario"] : "";
$tipo = isset($_SESSION["tipo"]) ? $_SESSION["tipo"] : "";
if ($tipo != "ADMINISTRADOR") {
    header('location:aviso.php?mt="AVISO"&mc="Acesso Negado!"');
}

include "caixa_usu.php";


?>


