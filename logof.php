<?php
    session_start();
    session_destroy();
    header ("location: aviso.php?mt=VOLTE SEMPRE!&mc=Sessão encerrada");
?>