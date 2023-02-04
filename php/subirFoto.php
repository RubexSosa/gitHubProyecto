<?php
include("conexion.php");
include("validarSesion.php");

$consultaId="SELECT idFotos FROM fotos ORDER BY idFotos DESC LIMIT 1";
$consultaId=mysqli_query($conexion, $consultaId);
$consultaId=mysqli_fetch_array($consultaId);
$idFoto=$consultaId['idFotos'];

++$idFoto;

$Ubicacion = "/img/$NombredeUsuario/$idFoto.jpg";
$archivo = $_FILES['archivo']['tmp_name'];

if(move_uploaded_file($archivo, "../$Ubicacion"))
{
    // echo "El Archivo se ha subido";
    $consultaId="INSERT INTO fotos (idFotos, NombredeUsuario, Ubicacion) VALUES ('$idFoto', '$NombredeUsuario', '$Ubicacion')";
    if(mysqli_query($conexion, $consultaId))
    {
        echo "Tu imagen se guardo correctamente.";
        header('Location: ../Trabajos.php');
    }
    else
    {
        echo "Error: ".$consultaId."<br>".mysqli_error($conexion);
        echo "<a href='../Trabajos.php'>Volver.</a></div>";
    }
}else
{
    echo "Error 2, intenta de nuevo.".$consultaId."<br>".mysqli_error($conexion);;
    echo "<a href='../Trabajos.php'>Volver.</a></div>";
}

?>
