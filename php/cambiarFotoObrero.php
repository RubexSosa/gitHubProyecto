<?php
include("validarSesionObrero.php");
$Ubicacion="../img/obreros/".$NombredeObrero."/perfil.jpg";
$archivo=$_FILES['archivo']['tmp_name'];
if(move_uploaded_file($archivo, $Ubicacion))
{
    echo "El Archivo se ha subido correctamente";
    header('Location: ../PerfilObrero.php');
}
else
{
    echo "Ha ocurrido un error cambiar, Intentelo nuevamente.";
    echo "<a href='../Perfil.php'>Volver.</a></div>";
}
?>
