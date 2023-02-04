<?php
    session_start();
    $_SESSION=array();

    //Destruir Sesion.
    session_destroy();
    header('Location: ../index.html');
?>