<?php 

session_start();//Inicia o reanuda Sesion
$login=$_SESSION['login'];

if(!$login)
{
    header('Location: ../index.html');
}
else{
    $NombredeUsuario =$_SESSION['NombredeUsuario'];//variable
}

?>
