<?php 

session_start();//Inicia o reanuda Sesion
$login=$_SESSION['login'];

if(!$login)
{
    header('Location: ../RegistroObrero.html');
}
else{
    $NombredeObrero =$_SESSION['NombredeObrero'];//variable
}

?>
