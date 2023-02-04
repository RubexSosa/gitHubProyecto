<?php
include("conexion.php");
include("validarSesion.php");
$NombredeObreroA=$_GET['NombredeObrero'];
$consulta= "INSERT INTO Trabajo (NombredeUsuario, NombredeObrero) VALUES ('$NombredeUsuario', '$NombredeObreroA')";
if (mysqli_query($conexion, $consulta))
{
    /*$consulta="INSERT INTO Trabajo (NombredeObrero, NombredeUsuario) VALUES ('$NombredeObreroA', '$NombredeUsuario')";
    if(mysqli_query($conexion, $consulta))
    {*/
        echo "Ahora Puedes Contactar al Obrero";
        echo "<a href='../PerfilAgregar.php'>Solicitar contacto.</a></div>"
    /*}
    else{
        echo "Error 1".$consultaId."<br>".mysqli_error($conexion);
        echo "<a href='../Buscar.php'>Volver.</a></div>";
    }*/
}
else
{
    echo "Error 2";
    echo "Error: ".$consultaId."<br>".mysqli_error($conexion);
    echo "<a href='../Buscar.php'>Volver.</a></div>";
}
//header ("Location: /Obreros.php");
?>
