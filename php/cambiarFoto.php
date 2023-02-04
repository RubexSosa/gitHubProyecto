<?php
include("validarSesion.php");
$Ubicacion="../img/".$NombredeUsuario."/perfil.jpg";
$archivo=$_FILES['archivo']['tmp_name'];
if(move_uploaded_file($archivo, $Ubicacion))
{
    echo "El Archivo se ha subido correctamente";
    header('Location: ../Perfil.php');
}
else
{
    echo "Ha ocurrido un error cambiar, Intentelo nuevamente.";
    echo "<a href='../Perfil.php'>Volver.</a></div>";
}
?>
